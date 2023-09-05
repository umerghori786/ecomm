<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function addToCart($id)
    {   

        $array = array();
        $array[1] = ['hola'];
        $array[2] = ['hola'];
        $array[3] = ['hola'];
        unset($array[3]);
        dd($array);
        $cart = session()->get('cart',[]);
        if(isset($cart[2])) {
            $cart[2]['quantity']++;
        } else {
            $cart[2] = [
                "name" => 'samsung',
                "quantity" => 1,
                "price" => 10000,
                
            ];
        }
        session()->put('cart', $cart);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
