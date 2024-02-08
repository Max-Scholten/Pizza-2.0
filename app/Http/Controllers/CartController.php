<?php

namespace App\Http\Controllers;

use App\Models\Menu;


class CartController extends Controller
{
    public function index()
    {
        $carts = Menu::all();
        return view('Pizza.cart', compact('carts'));
    }
}
