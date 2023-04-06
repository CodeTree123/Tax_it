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
        $request->validate([
            'HSCODE'=> 'required',
            'DESCRIPTION'=> 'required',
            'SU'=> 'required',

        ],[
            'HSCODE.required'=> 'Hs Code Is Required',
            'DESCRIPTION.required'=> 'DESCRIPTION Is Required',
            'SU.required'=> 'Unit Measurement Is Required'
        ]);
            Product::create([
                'HSCODE' => $request->HSCODE,
                'DESCRIPTION' => $request->DESCRIPTION,
                'SU' => $request->SU,
                'CD' => $request->CD,
                'RD' => $request->RD,
                'SD' => $request->SD,
                'VAT' => $request->VAT,
                'AT' => $request->AT,
                'AIT' => $request->AIT,
                'TTI' => $request->TTI,
                'SRO_Ref' => $request->SRO_Ref,

            ]);
            return redirect()->back()->with('success', 'Product Added Successfully');
    }
    public function product_edit($id)
    {
        $product = Product::find($id);
        return view('layout.product.update', compact('product'));
    }
    public function product_update(Request $request, $id)
    {

        $product = Product::find($id);
        $request->validate([
            'HSCODE'=> 'required',
            'DESCRIPTION'=> 'required',
            'SU'=> 'required',

        ],[
            'HSCODE.required'=> 'Hs Code Is Required',
            'DESCRIPTION.required'=> 'DESCRIPTION Is Required',
            'SU.required'=> 'Unit Measurement Is Required'
        ]);
        
            $product->update([
                'HSCODE' => $request->HSCODE,
                'DESCRIPTION' => $request->DESCRIPTION,
                'SU' => $request->SU,
                'CD' => $request->CD,
                'RD' => $request->RD,
                'SD' => $request->SD,
                'VAT' => $request->VAT,
                'AT' => $request->AT,
                'AIT' => $request->AIT,
                'TTI' => $request->TTI,
                'SRO_Ref' => $request->SRO_Ref,

            ]);
            return redirect()->back()->with('success', 'Product Updated Successfully');
     
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
