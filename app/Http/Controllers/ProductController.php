<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use Session;

class ProductController extends Controller
{
    public function add(){
        $r=request(); //get data from html input
        if($r->file('productImage')!=''){
            $image=$r->file('productImage');
            $image->move('images',$image->getClientOriginalName());
            $imageName=$image->getClientOriginalName();
        }
        else{
            $imageName='empty.jpg';
        }

        $add=Product::create([ 
            //the front one is the database column name, and the back one from the blade's name 
            'name'=>$r->productName,  
            'description'=>$r->productDescription,
            'quantity'=>$r->productQuantity,
            'price'=>$r->productPrice,
            'categoryID'=>'1',
            'image'=>$imageName
        ]);
        Session::flash('success', "Product added successfully");
        return redirect()->route('showProduct');
    }

    public function view(){
        $viewProduct=Product::all(); //sql
        //select * from products
        return view('showProduct')->with('products', $viewProduct);
    }

    public function delete($id){
        $product=Product::find($id);
        $product->delete(); //SQL "delete from products where id="$id"
        Session::flash('success', "Product delete successfully");
        return redirect()->route('showProduct');
    }

    /*
    两种方式，如果使用这个，在editProduct就要有foreach & endforeach
    public function edit($id){
        $viewProduct=Product::all()->where('id', $id);
        return view('editProduct')->with('products',$viewProduct);
    }
    */

    public function edit($id){
        $products = Product::find($id);
        return view('editProduct', compact('products'));
    }

    //show Product
     public function productDetail($id){
        $viewProduct=Product::all()->where('id', $id);
        return view('showProductDetail')->with('products',$viewProduct);
    }

   public function update(){
       //request name from the edit.blade.php (the name must same)
        $r = request();
        $product = Product::find($r->id);

        if($r->file('productImage')!=''){
            $image=$r->file('productImage');        
            $image->move('images',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $product->image=$imageName;
        }    

        $product -> name = $r -> productName;
        $product -> description = $r -> productDescription;
        $product -> quantity = $r -> productQuantity;
        $product -> price = $r -> productPrice;
        $product -> categoryID = $r -> CategoryID;
        $product -> save();
        
        return redirect()->route('showProduct')->with('success','Product Updated Successfully.');
     }

    //view all product
    public function viewProduct() {
        // Retrieve all products from the "products" table 
        $viewProducts=Product::all(); // Equivalent to SQL: SELECT * FROM products
        // Return the "viewProducts" Blade view with the retrieved products passed as data
        Return view('viewProducts')->with('products',$viewProducts); 
    }

    //search product
    public function search(Request $request){
        // Validate the search query
        $request->validate([
            'search' => 'required',
        ]);

        // Get the search query from the request
        $query = $request->input('search');

        // Perform the search on the Product model
        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();

        // Pass the search results to the view
        return view('viewProducts', compact('products', 'query'));
    }
}


