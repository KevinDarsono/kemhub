<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constants\HttpStatusCodes;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;
// models
use App\Models\User as TblUser;



class AuthController extends Controller
{

    public function login(Request $term) {
        return view('auth.login',[
            'title' => 'Masuk'
        ]);
    }

    public function logout(Request $term) {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function submitLogin(Request $term) {
        $validator = Validator::make($term->all(), [
            'email'     => 'required|email',
            'password'  => 'required|string|max:225'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => $validator->errors()->all()[0]
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }
        $findEmail = TblUser::where('email','=',$term->email)->first();
        if(!$findEmail) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => "Email belum terdaftar di sistem."
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }
        Auth::attempt([
            'email'     => $term->email,
            'password'  => $term->password
        ]);
        if(Auth::check()) {
            $user  = Auth::user();
            // if($user->email_verified_at == null) {
            //     Auth::logout();
            //     return response()->json([
            //         'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
            //         'error'         => true,
            //         'message'       => "Akun anda belum aktif."
            //     ], HttpStatusCodes::HTTP_BAD_REQUEST);
            // }
            if($user->active == false) {
                Auth::logout();
                return response()->json([
                    'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                    'error'         => true,
                    'message'       => "Akun anda telah dinonaktifkan, silahkan hubungi admin."
                ], HttpStatusCodes::HTTP_BAD_REQUEST);
            }
            $redirect_route = route_redirect_user(Auth::user()->code_role);

            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_OK,
                'error'         => false,
                'message'       => "Successfully",
                'data'          => array(
                    'route_redirect'    => $redirect_route
                )
            ], HttpStatusCodes::HTTP_OK);
        }
        return response()->json([
            'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
            'error'         => true,
            'message'       => "Email atau kata sandi salah."
        ], HttpStatusCodes::HTTP_BAD_REQUEST);

    }

    
    // end class
}
