<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductEditController extends Controller
{
    public function edit($id)
    {
        // Fetch the product by ID from the database
        $product = DB::table('testing_dummy_product')->find($id);

        // Return the view with the product data
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data if needed

        // Update the product in the database
        DB::table('testing_dummy_product')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                // Add more fields as needed
            ]);

        // Redirect back to the product list or show updated product details
        return redirect()->route('showProduct')->with('success','Product Updated Successfully.');
    }
}