<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\OrdersInterface;
use App\Order;
use App\ResponseWrapper;
use App\Traits\PayPal;
use BraintreeHttp\HttpException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use PayPal;

    protected $orders;

    public function __construct(OrdersInterface $orders)
    {
        $this->orders = $orders;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->orders->index();

        return view("orders.index", compact("orders"));
    }

    public function pending()
    {
        $orders = $this->orders->notCompleted();

        return view("orders.pending", compact("orders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        Log::info("ORDER REQUEST ::: " . json_encode($request->all()));

        $validator = Validator::make($request->all(), [
            "address" => "nullable",
            "promoCode" => "nullable",
            "mobile" => "required",
            "name" => "required",
            "shipping_price" => "required",
            "total" => "required",
            "type" => "required",
            "contact" => "required",
            "cart" => "required|json",
        ]);

        // set success as default response
        $response = new ResponseWrapper("00", "Success", "Order placed. Please make payment.");

        if ($validator->fails()) {

            $description = "";

            $description .= " {$validator->errors()->first("address")}";
            $description .= " {$validator->errors()->first("promoCode")}";
            $description .= " {$validator->errors()->first("mobile")}";
            $description .= " {$validator->errors()->first("name")}";
            $description .= " {$validator->errors()->first("total")}";
            $description .= " {$validator->errors()->first("shipping_price")}";
            $description .= " {$validator->errors()->first("type")}";
            $description .= " {$validator->errors()->first("contact")}";
            $description .= " {$validator->errors()->first("cart")}";

            $response->code = "01";
            $response->description = $description;

        } else {
            try {
                $order = new Order($request->all());

                $order->saveOrFail();

                $response->description = $order->id;
                $response->friendly = $order->id;
                $response->code = "00";

                // TODO persist

            } catch (QueryException $exception) {

                $response->code = "02";
                $response->description = $exception->getMessage();
                $response->friendly = "Failed to save order.";

            } catch (HttpException $exception) {

                Log::channel("paypal_logger")->info("RESPONSE ::: " . json_encode($exception->getMessage()));

                $response->code = "03";

                $error = json_decode($exception->getMessage());

                $message = "";

                if (isset($error->details)) {
                    foreach ($error->details as $detail) {
                        $message .= $detail->issue . "<br>";
                    }
                }

                $response->description = $message;
                $response->friendly = "Oops. Something went wrong. Please try again later.";
                $response->description = "Oops. Something went wrong. Please try again later.";

            }
        }

        Log::info("ORDER RESPONSE ::: " . json_encode($response->toArray()));

        return response()->json($response->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {

        Log::info("ORDER UPDATE REQUEST ::: " . json_encode($request->all()));

        $validator = Validator::make($request->all(), [
            "paypal_response" => "required|json",
        ]);

        // set success as default response
        $response = new ResponseWrapper("00", "Success", "Order Completed. Please check your email for confirmation.");

        if ($validator->fails()) {

            $description = "";

            $description .= " {$validator->errors()->first("paypal_response")}";

            $response->code = "01";
            $response->description = $description;

        } else {

            $order->paypal_response = $request->input("paypal_response");
            $order->status = "COMPLETE";

            try {
                $order->saveOrFail();

                $response->description = $order->id;

                Session::put('receipt', $order->id);

            } catch (QueryException $exception) {
                $response->code = "01";
                $response->description = $exception->getMessage();
                $response->description = "Oops. Something went wrong. Please try again later.";
            }
        }

        Log::info("ORDER UPDATE RESPONSE ::: " . json_encode($response));

        return response()->json($response->toArray());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function capture(Request $request) {

        Log::info("ORDER UPDATE REQUEST ::: " . json_encode($request->all()));

        $validator = Validator::make($request->all(), [
            "orderID" => "required",
        ]);


        // set success as default response
        $response = new ResponseWrapper("00", "Success", "Success");

        if ($validator->fails()) {

            $description = "";

            $description .= " {$validator->errors()->first("orderID")}";

            $response->code = "01";
            $response->description = $description;

        } else {
            try {

                $successResponse = $this->captureOrder($request->orderID);

                $response->description = json_encode($successResponse);
                $response->friendly = $successResponse->result->id;

                // set receipt id
                session()->put('receipt', $request->orderID);

                // TODO persist

            } catch (QueryException $exception) {

                $response->code = "02";
                $response->description = $exception->getMessage();
                $response->friendly = "Failed to save order.";

            } catch (HttpException $exception) {

                Log::channel("paypal_logger")->info("CAPTURE RESPONSE ::: " . $exception->getMessage());


                $response->code = "03";

                $error = json_decode($exception->getMessage());

                $message = "";

                if (isset($error->details)) {
                    foreach ($error->details as $detail) {
                        $message .= $detail->issue . "<br>";
                    }
                }

                $response->description = $message;
                $response->friendly = "Oops. Something went wrong. Please try again later.";
                $response->description = "Oops. Something went wrong. Please try again later.";

            }
        }

        Log::info("CAPTURE FINAL RESPONSE ::: " . json_encode($response));

        return response()->json($response->toArray());

    }
}
