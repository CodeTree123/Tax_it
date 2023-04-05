<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\otptable;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;


class ApiController extends Controller
{
    function send_sms($phone, $otp)
    {
        $url = "http://202.164.208.226/smsapi";
        $data = [
            "api_key" => "C20013386235902a575991.44900461",
            "type" => "text",
            "contacts" => "88" . $phone,
            "senderid" => "8809612442105",
            "msg" => "Your ToletX verification code " . $otp,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }


    public function send_otp(Request $request)
    {
        $otp = rand(1000, 9999);
        $phone = otptable::where('mobile', $request->mobile)->first();
        $otp_sent = $this->send_sms($phone, $otp);
        if ($phone == null) {
            $user = otptable::create([
                'mobile' => $request->mobile,
                'otp' => $otp
            ]);
            $mobile['mobile'] =  $user->mobile;
            $response = [
                'success' => true,
                'mobile' => $mobile,
                "message" => 'Otp send successfully.'
            ];
            return response($response, 200);
        } else {
            $phone->update([
                'otp' => $otp
            ]);
            $mobile['mobile'] =  $phone->mobile;
            $response = [
                'success' => true,
                'mobile' => $mobile,
                "message" => 'Otp send successfully.'
            ];
            return response($response, 200);
        }
    }
    public function login_with_otp(Request $request)
    {
        $phone = otptable::where('mobile', $request->mobile)->first();

        if ($phone && $phone->otp == $request->otp) {
            $phone->update([
                'otp' => '',
                'isverified' => 1,

            ]);
            $response = [
                'success' => true,
                "message" => 'Number is verified.',

            ];
            return response($response, 200);
        } else {
            $response = [
                'success' => false,
                "message" => 'Unauthorized.'
            ];
            return response($response, 401);
        }
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 401);
        }
        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token['token'] =  $user->createToken('MyApp')->plainTextToken;
                $response = [
                    'success' => true,
                    'user' => $user,
                    "message" => 'successfully Log in.'
                ];
                return response($response, 200);
            } else {
                $response = [
                    'success' => false,
                    "message" => "Invalid Password."
                ];
                return response($response, 200);
            }
        } else {
            $response = [
                'success' => false,
                "message" => 'User does not exist.'
            ];
            return response($response, 200);
        }
    }


    public function login_update(Request $request, $phone)
    {
        $user = User::where('phone', $phone)->first();
        $user->update([
            'device_id' => $request->device_id,
            'device_model' => $request->device_model,
            'device_os' => $request->device_os,
        ]);

        $response = [
            'success' => true,
            'user' => $user,
            "message" => 'User register successfully.'
        ];

        return response($response, 200);
    }

    public function forgot(Request $request, $mobile)
    {
        $profile = User::where('phone', $mobile)->get();
        $validator = Validator::make($request->all(), [

            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 401);
        }

        $success = User::where('phone', $mobile)->update([
            'password' => Hash::make($request->confirm_password)
        ]);
        if ($success) {
            $response = [
                'success' => true,
                "message" => 'password reset successfully.'
            ];
            return response($response, 200);
        } else {
            $response = [
                'success' => false,
                "message" => 'something went wrong.'
            ];
    
            return response($response, 401);
        }
    }

    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $phone = User::where('phone', $request->phone)->first();
        if ($phone) {
            $response = [
                'success' => false,
                "message" => 'You already Have an Account.'
            ];
            return response($response, 401);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'Company_name' => $request->Company_name,
                'address' => $request->address,
                'device_id' => $request->device_id,
                'device_model' => $request->device_model,
                'device_os' => $request->device_os,
                'role_id' => 2
            ]);

            $response = [
                'success' => true,
                'user' => $user,
                "message" => 'User register successfully.'
            ];

            return response($response, 200);
        }
    }

    public function logout(Request $request)
    {
        $request->auth()->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
    public function product()
    {
        $product = Product::all();
        $response = [
            'success'=>true,
            'data' => $product,
            "message" => 'product view successfully'
        ];

        return response($response, 200);
    }
    public function user($phone)
    {
        $user = User::where('phone', $phone)->first();
        $response = [
            'success'=>true,
            'user' => $user,
            "message" => 'user view successfully'
        ];

        return response($response, 200);
    }
}
