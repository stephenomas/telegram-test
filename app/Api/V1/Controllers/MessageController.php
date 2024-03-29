<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{

    /**
    * @OA\Post(
        *     path="/api/sendmessage",
        *     summary="Send a message to a Telegram chat",
        *     tags={"Telegram"},
        *     @OA\RequestBody(
        *         required=true,
        *         @OA\JsonContent(
        *             required={"chat_id", "text"},
        *             @OA\Property(property="chat_id", type="string", description="The ID of the chat to send the message to"),
        *             @OA\Property(property="text", type="string", description="The text of the message to send")
        *         )
        *     ),
        *     @OA\Response(
        *         response=201,
        *         description="Successfully sent the message",
        *         @OA\JsonContent(
        *             type="object",
        *             @OA\Property(property="ok", type="boolean", example=true),
        *             @OA\Property(property="result", type="object")
        *         )
        *     ),
        *     @OA\Response(
        *         response=422,
        *         description="Validation error",
        *         @OA\JsonContent(
        *             @OA\Property(property="message", type="string", example="The chat_id field is required.")
        *         )
        *     )
        * )
        */
   public function index(Request $request){
    $token =env('TELEGRAM_BOT_TOKEN');
    $this->validate($request,[
        'chat_id' => 'required',
        'text' => 'required'
    ]);
    $response = Http::post("https://api.telegram.org/bot{$token}/sendMessage",
    ['chat_id' => $request->chat_id,
    'text' => $request->text
    ]
    );

    return response()->json($response->json(), 201);
   }

}
