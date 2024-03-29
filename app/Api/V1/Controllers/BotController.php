<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Telegram\Bot\Laravel\Facades\Telegram;

class BotController extends Controller
{
    /**
 * @OA\Post(
 *     path="/api/subscribebot",
 *     summary="Get the subscription URL for the chat bot",
 *     tags={"Chat Bots"},
 *     @OA\Response(
 *         response=201,
 *         description="Successfully retrieved the subscription URL",
 *         @OA\JsonContent(
 *             @OA\Property(property="subscribe_url", type="string", example="https://t.me/mybot?start=hi")
 *         )
 *     )
 * )
 */
    public function index() {
        $token =env('TELEGRAM_BOT_TOKEN');
        $response = Http::get("https://api.telegram.org/bot{$token}/getMe");
        $username = $response->json()['result']['username'];
        $url = "https://t.me/{$username}?start=hi";
        return response()->json(["subscribe_url" => $url], 201);
    }
}
