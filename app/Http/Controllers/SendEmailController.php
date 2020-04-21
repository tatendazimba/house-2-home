<?php

namespace App\Http\Controllers;

use App\Mail\GeneralEmail;
use App\ResponseWrapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Mail::to(["tatendazimba@gmail.com"])->send(new GeneralEmail($request->input("name"), $request->input("email"),$request->input("message")));

        $response = new ResponseWrapper("00", "Email sent successfully.", "Email sent successfully.");

        if(count(Mail::failures()) > 0){
            $response->code = "01";
            $response->description = "Failed to send email. Please try again.";
        }

        return response()->json($response);
    }
}
