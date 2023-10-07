<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WishlistController extends Controller
{
    public function showWishlist()
    {   
        $wishlist_products = request()->session()->get('wishlist',[]);
        $products = Product::has('images')->with('images')->latest()->limit(10)->get();        
        
        return view('frontend.wishlist.index',compact('products','wishlist_products'));
    }
    /**
     * store a product in wishlist session
     * @return \Illuminate\Http\Response
     */
    public function addToWishlist(Request $request)
    {
        
        $product = Product::findOrFail($request->product_id);

        $wishlist = $request->session()->get('wishlist',[]);
        $wishlist[$request->product_id] = [
                "title" => $product->title,
                "quantity" => $request->quantity,
                "discount_price" => $product->discount_price,
                "strike_price" => $product->strike_price,
                "image" => $product->images[0]->url
            ];
        $request->session()->put('wishlist', $wishlist);    

        $wishlist_quantity = count($request->session()->get('wishlist'));

        return response()->json(['success'=>true,'wishlist_quantity'=>$wishlist_quantity]);  
    }
    /**
     * remove item from wishlist
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $id = $request->product_id;
        $wishlist = $request->session()->get('wishlist',[]);

        if (isset($wishlist[$id])) {
            
            unset($wishlist[$id]);
        }
        $request->session()->put('wishlist', $wishlist);
        $wishlist_quantity = count($request->session()->get('wishlist'));

        return response()->json(['success'=>true,'wishlist_quantity'=>$wishlist_quantity]);  
    }
}
