<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Services\OrderService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Orders\MakeOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function make(MakeOrderRequest $request)
    {
        $response = OrderService::make($request);

        if (!$response['success']) {
            return $this->errorStatus($response['message']);
        }
        return $this->successStatus("Make order Successfully");
    }
}
