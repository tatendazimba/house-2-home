<?php


namespace App\Http\Controllers\Repositories;


use App\Http\Controllers\Interfaces\RequestInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class RequestRepository implements RequestInterface
{

    protected $url;
    protected $timeout;
    protected $token;
    protected $count;

    public function __construct()
    {
        $this->timeout = 10.0;
        $this->token = "4477889696.1677ed0.ac8052a29fbb4a12939a6243292b0465";
        $this->count = 6; // number of images to fetch
        $this->url = "https://api.instagram.com/v1/users/self/media/recent/?access_token={$this->token}&count={$this->count}";
    }

    public function getInstagramPhotos()
    {
        return $this->makeRequest("GET");
    }

    protected function makeRequest($method) {
        $client = new Client([
            'base_uri' => $this->url,
            'timeout'  => $this->timeout,
        ]);

        try {
            $response = $client->request($method, "");

            $response = json_decode($response->getBody());

            if ($response->meta->code === 200) {

                $r = array(
                    "code" => "200",
                    "description" => "Success",
                    "data" => $response->data
                );

            } else {

                $r = array(
                    "code" => "92",
                    "description" => "Failed to fetch images",
                    "data" => []
                );

            }

            return (object) $r;

        } catch (GuzzleException $e) {
            $r = array(
                "code" => "92",
                "description" => "Error in connecting: {$e->getMessage()}",
                "data" => []
            );

            return (object) $r;
        }
    }
}
