<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebhookController extends Controller
{
   public function index(Request $request){
    $message = $request->data;

    $chat_id  = $message['chat_id'];
    $text = $message['text'];

    ////perform any required action

    return response()->json(200);

   }

}
