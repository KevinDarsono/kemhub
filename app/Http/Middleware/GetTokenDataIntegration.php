<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;
use App\Constants\HttpStatusCodes;

class GetTokenDataIntegration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $getMe = Http::asForm()->post(env('BASE_URL_DATA_INTEGRATION')."/dev/auth-service/auth/open/token",[
            "email"         => env("DATA_INTEGRATION_USER"),
            "password"      => env("DATA_INTEGRATION_PASSWORD")
        ])->json();

        if($getMe['status_code'] == HttpStatusCodes::HTTP_OK) {
            $request->token_data_integration  = $getMe['data']['token'];
            return $next($request);
        }
        return response()->json([
            'status_code'       => HttpStatusCodes::HTTP_UNAUTHORIZED,
            'error'             => true,
            'message'           => HttpStatusCodes::getMessageForCode(HttpStatusCodes::HTTP_UNAUTHORIZED)
        ], HttpStatusCodes::HTTP_UNAUTHORIZED);
    }
}
