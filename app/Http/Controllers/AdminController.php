<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('layout.login');
    }

    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth()->user()->role_id;
            if ($user == 1) {
                return redirect()->route('dashboard')->with('success', 'Admin Login Successfully');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credential');
        }
    }
    public function dashboard()
    {
        $user = User::where('role_id', 2)->count();
        $product = Product::all()->count();
        return view('layout.dashboard', compact('user', 'product'));
    }
    public function user_list()
    {
        $users = User::all();
        return view('layout.user', compact('users'));
    }
    public function product_list()
    {
        $products = Product::all();
        return view('layout.product.list', compact('products'));
    }
    public function product_add()
    {
        return view('layout.product.create');
    }
    public function product_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hs_code'    => 'required|numeric',
            'name'   => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('add', 'sdljvnfsljvn');
        } else {
            Product::create([
                'hs_code' => $request->hs_code,
                'name' => $request->name,
                'CD' => $request->CD,
                'SD' => $request->SD,
                'VAT' => $request->VAT,
                'AIT' => $request->AIT,
                'RD' => $request->RD,
                'ATV' => $request->ATV,
                'TTI' => $request->TTI,
                'sCD' => $request->sCD,
                'sSD' => $request->sSD,
                'sVAT' => $request->sVAT,
                'sAIT' => $request->sAIT,
                'sRD' => $request->sRD,
                'sATV' => $request->sATV,
                'sTTI' => $request->sTTI,
                'TARIFF' => $request->TARIFF,
            ]);
            return redirect()->back()->with('success', 'Product Added Successfully');
        }
    }
    public function product_edit($id)
    {
        $product = Product::find($id);
        return view('layout.product.update', compact('product'));
    }
    public function product_update(Request $request, $id)
    {

        $product = Product::find($id);
        $validator = Validator::make($request->all(), [
            'hs_code'    => 'required|numeric',
            'name'   => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('add', 'sdljvnfsljvn');
        } else {
            $product->update([
                'hs_code' => $request->hs_code,
                'name' => $request->name,
                'CD' => $request->CD,
                'SD' => $request->SD,
                'VAT' => $request->VAT,
                'AIT' => $request->AIT,
                'RD' => $request->RD,
                'ATV' => $request->ATV,
                'TTI' => $request->TTI,
                'sCD' => $request->sCD,
                'sSD' => $request->sSD,
                'sVAT' => $request->sVAT,
                'sAIT' => $request->sAIT,
                'sRD' => $request->sRD,
                'sATV' => $request->sATV,
                'sTTI' => $request->sTTI,
                'TARIFF' => $request->TARIFF,
            ]);
            return redirect()->back()->with('success', 'Product Updated Successfully');
        }
    }
    public function product_delete($id)
    {
        $products = Product::findOrFail($id)->delete();

        return back()->with('success', 'Product Deleted Successfully');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('index')->with('success', 'Admin Logout Sucsessfully');
    }
}
