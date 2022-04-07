<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function processPost(Request $request) {
        /** @var \stdClass $product */
        $product = json_decode($request->get('item'));

    }
}
