<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class ApiController extends Controller
{
    function send_sms($m, $o)
    {
        $url = "https://smsportal.codetreebd.com/smsapi";
        $data = [
            "api_key" => "C200222865000fd8722d66.00608348",
            "type" => "unicode",
            "contacts" => "88" . $m,
            "senderid" => "8809612444653",
            "msg" => " আপনার ওটিপি হচ্ছে " . $o,
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
        $response = $this->send_sms($request->mobile, $otp);
        $phone = User::where('mobile', $request->mobile)->first();
        if ($phone == null) {
            $user = User::create([
                'mobile' => $request->mobile,
                'otp' => $otp
            ]);
            $mobile['mobile'] =  $user->mobile;
            $userOtp['otp'] =  $user->otp;
            $response = [
                'success' => true,
                'mobile' => $mobile,
                'otp' => $userOtp,
                "message" => 'Otp send successfully.'
            ];
            return response($response, 200);
        } else {
            $phone->update([
                'otp' => $otp
            ]);
            $mobile['mobile'] =  $phone->mobile;
            $userOtp['otp'] =  $phone->otp;
            $response = [
                'success' => true,
                'mobile' => $mobile,
                'otp' => $userOtp,
                "message" => 'Otp send successfully.'
            ];
            return response($response, 200);
        }
    }
    public function login_with_otp(Request $request)
    {
        $phone = User::where('mobile', $request->mobile)->first();

        if ($phone && $phone->otp == $request->otp) {
            $phone->otp = '';
            $phone->isverified = 1;
            $phone->save();
            $response = [
                'success' => true,
                "message" => 'Log in successful.',
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

    public function profileUpdate(Request $request, $mobile)
    {
        $validator = Validator::make($request->all(), [

            'name' => ['required'],
            'email' => ['required'],
            'company_name' => ['required'],
            'address' => ['required'],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 401);
        }

        $success = User::where('mobile', $mobile)->where('role_id', 2)->update([
            'password' => Hash::make($request->confirm_password),
            'name' => $request->name,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'address' => $request->address,
        ]);
        if ($success) {
            $response = [
                'success' => true,
                "message" => 'Profile Update successfully.'
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
                'company_name' => $request->company_name,
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

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
    public function product()
    {
        $product = Product::with('parentP')->paginate(5);
        $response = [
            'success' => true,
            'product' => $product,
            "message" => 'product view successfully'
        ];

        return response($response, 200);
    }
    public function search(Request $request)
    {
        $search = $request->id_or_name;
        if ($search) {
            $productP = Category::with('childP')->where('cat_hscode', 'like', '%' . $search . '%')->OrWhere('cat_name', 'like', '%' . $search . '%')->get();
            if ($productP->count() > 0) {
                $response = [
                    'success' => true,
                    'product ' => $productP,
                    "message" => 'product view successfully'
                ];
                return response($response, 200);
            } elseif ($productP->count() == 0) {
                $productC = Product::with('parentP')->where('HSCODE', 'like', '%' . $search . '%')->OrWhere('DESCRIPTION', 'like', '%' . $search . '%')->get();
                $response = [
                    'success' => true,
                    'product ' => $productC,
                    "message" => 'product view successfully'
                ];
                return response($response, 200);
            }
        } else {
            $response = [
                'success' => false,
                "message" => 'No Data Found'
            ];

            return response($response, 200);
        }
    }
    public function user($mobile)
    {
        $user = User::where('mobile', $mobile)->first();
        $response = [
            'success' => true,
            'user' => $user,
            "message" => 'user view successfully'
        ];

        return response($response, 200);
    }
}
