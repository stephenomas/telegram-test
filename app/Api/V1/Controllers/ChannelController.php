<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChannelController extends Controller
{

/**
 * @OA\Post(
 *     path="/api/subscribechannel",
 *     summary="Get the subscription URL for the channel",
 *     tags={"Channel"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"channel"},
 *             @OA\Property(property="channel", type="string", description="The channel name", example="mychannel")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Successfully retrieved the subscription URL",
 *         @OA\JsonContent(
 *             @OA\Property(property="subscribe_url", type="string", example="https://t.me/mychannel?start=hi")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="The channel field is required.")
 *         )
 *     )
 * )
 */
    public function index(Request $request){
        $this->validate($request, [
            'channel' => 'required'
        ]);

        $url = "https://t.me/{$request->channel}?start=hi";
        return response()->json(["subscribe_url" => $url], 201);
    }
}
