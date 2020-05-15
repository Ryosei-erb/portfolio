<?php

namespace App\Http\Controllers;

use App\Product;
use App\Membership;
use App\Room;
use App\Favorite;
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

        //ダイレクトメッセージ機能
        $user = $product->user;
        $room_id = [];
        if (Auth::check()):
            $memberships = Membership::where("user_id", Auth::user()->id)->get();
            foreach ($memberships as $membership):
                if ($membership->room->product_id == $product->id):
                    $room_id = $membership->room_id;
                endif;
            endforeach;
        endif;

        //お気に入り機能
        $favorite = [];
        if (Auth::check()):
            $favorite = Favorite::where("user_id", Auth::user()->id)->where("product_id", $product->id)->first();
        endif;

        return view("product.show", ["product" => $product, "user" => $user, "room_id" => $room_id, "favorite" => $favorite]);
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
