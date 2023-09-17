<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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
        $category = Category::all();
        return view('layout.product.create', compact('category'));
    }
    public function product_create(Request $request)
    {
        $request->validate([
            'cat_id' => 'required',
            'HSCODE' => 'required',
            'DESCRIPTION' => 'required',
            'SU' => 'required',

        ], [
            'cat_id.required' => 'Parent Product Is Required',
            'HSCODE.required' => 'Hs Code Is Required',
            'DESCRIPTION.required' => 'DESCRIPTION Is Required',
            'SU.required' => 'Unit Measurement Is Required'
        ]);

        $product = new Product();

        $product->cat_id = $request->cat_id;
        $product->HSCODE = $request->HSCODE;
        $product->DESCRIPTION = $request->DESCRIPTION;
        $product->SU = $request->SU;
        $product->CD = $request->CD;
        $product->RD = $request->RD;
        $product->SD = $request->SD;
        $product->VAT = $request->VAT;
        $product->AT = $request->AT;
        $product->AIT = $request->AIT;
        $product->TTI = $request->TTI;
        $product->SRO_Ref = $request->SRO_Ref;

        $product->save();
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
            'HSCODE' => 'required',
            'DESCRIPTION' => 'required|unique:products',
            'SU' => 'required',

        ], [
            'HSCODE.required' => 'Hs Code Is Required',
            'DESCRIPTION.required' => 'DESCRIPTION Is Required',
            'SU.required' => 'Unit Measurement Is Required'
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
        if ($request->cat_name && $request->cat_hscode) {
            $cat = Category::find($product->cat_id);
            $cat->cat_name = $request->cat_name;
            $cat->cat_hscode = $request->cat_hscode;
            $cat->save();
        }
        return redirect()->back()->with('success', 'Product Updated Successfully');
    }
    public function product_delete($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        return back()->with('success', 'Product Deleted Successfully');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('index')->with('success', 'Admin Logout Sucsessfully');
    }

    //category add

    public function catAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cat_name' => 'required|unique:categories|max:1000',
            'cat_hscode' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category = new Category();

        $category->cat_name = $request->cat_name;
        $category->cat_hscode = $request->cat_hscode;
        $category->save();
        return response()->json(['message' => 'Category added successfully'], 200);
    }

    public function getCats()
    {
        $cats = Category::orderBy('cat_name', 'asc')->get();
        return response()->json([
            'cats' => $cats,
        ]);
    }
}
