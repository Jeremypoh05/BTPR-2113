@extends('layout') 
@section('content')

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br> 
        <h3>Edit Product</h3>
<form action="{{ route('updateProduct' )}}" method="post" enctype='multipart/form-data' >            @csrf
            <div class="form-group">
                <img src="" alt="" width="100" class="img-fluid"><br>
            <label for="productname">Product Name</label>
            <input type="hidden" name="id" value="{{$products -> id }}">
            <input class="form-control" type="text" id="productName" name="productName" required value="{{ $products->name }}"> 
            
            </div>
            <div class="form-group">
            <label for="productDescription">Description</label>
            <input class="form-control" type="text" id="productDescription" name="productDescription" required value="{{ $products->description }}">
            </div>
            <div class="form-group">
            <label for="productPrice">Price</label>
            <input class="form-control" type="number" id="productPrice" name="productPrice" min="0" required value="{{ $products->price }}">
            </div>
            <div class="form-group">
            <label for="productQuantity">Quantity</label>
            <input class="form-control" type="number" id="productQuantity" name="productQuantity" min="0" required value="{{ $products->quantity }}">
            </div>
            <div class="form-group">
            <label for="productImage">Image</label>
            <input class="form-control" type="file" id="productImage" name="productImage" required value="{{ $products->image }}>
            </div>
            <div class="form-group">
            <label for="Category">Category</label>
            <select name="CategoryID" id="CategoryID" class="form-control">                    
                        <option value="{{ $products->categoryID }}">                        
                        </option>                    
                </select>  
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection
