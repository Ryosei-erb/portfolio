<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request) {
        $products = Product::all();
        return view("product.index", ["products" => $products]);
    }

    public function show($id) {
        $product = Product::find($id);
        return view("product.show", ["product" => $product]);
    }

    public function create() {
        return view("product.create");
    }

    public function store(Request $request) {
        $this->validate($request, Product::$rules);
        $product = new Product;

        $filename = $request->file("image")->getClientOriginalName();
        $img = Image::make($request->file("image"));
        $img->resize(500,500)->save( public_path() . "/images/" . $filename);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->pickup_times = $request->pickup_times;
        $product->price = $request->price;
        $product->image = $filename;
         $product->user_id = Auth::user()->id;
        $product->address = $request->address;
        $product->save();
        return redirect("/products");
    }
}
