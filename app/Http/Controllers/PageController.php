<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class PageController extends Controller
{
    /**
     * Product Listing Function
     */
    public function index(){
        $added_items = [];
        if(Cookie::get('basket_items'))
            $added_items = json_decode(Cookie::get('basket_items'),true);
        // dd($added_items);
        return view('pages.index',compact(['added_items']));
    }
    /**
     * Add Item to Basket Function
     */
    public function add_item_to_basket($id){
        $current_basket_items = [];
        if(Cookie::get('basket_items') && !empty(Cookie::get('basket_items'))){
            $current_basket_items = json_decode(Cookie::get('basket_items'),true);
        }
        if(!in_array($id,$current_basket_items)){
            array_push($current_basket_items,$id);
        }
        Cookie::queue('basket_items',json_encode($current_basket_items));
        return redirect()->route('home');
    }
    /**
     * Remove Item from Basket Function
     */
    public function remove_item_from_basket($id){
        $current_basket_items = [];
        if(Cookie::get('basket_items') && !empty(Cookie::get('basket_items'))){
            $current_basket_items = json_decode(Cookie::get('basket_items'),true);
        }
        if (($key = array_search($id, $current_basket_items)) !== false) {
            unset($current_basket_items[$key]);
        }
        Cookie::queue('basket_items',json_encode($current_basket_items));
        return redirect()->route('home');
    }
}
