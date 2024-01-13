@extends('layout')
@section('content')
{{-- Toastr CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Category</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <!-- make sure the id, name, description... same as ur database's name -->
                    <td>{{$product->id}}</td>
                    <td><img src="{{asset('images/'.$product->image) }}" alt="" width="100" class="img-fluid"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->categoryID}}</td>
                    <td><a href="{{ url('editProduct', ['id'=>$product->id]) }}" class="btn btn-warning btn-xs" onClick="return confirm('Are you sure want to edit this product?')">Edit</a>&nbsp;
                        <a href="{{route('deleteProduct', ['id'=>$product->id]) }}" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete this product?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-6"></div>
</div>

{{-- Toastr JS --}}
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    @if(Session::has('success'))
        Toastify({ text: "{{ Session::get('success') }}", duration: 10000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
        }).showToast();

    @elseif (Session::has('fail'))
        Toastify({ text: "{{ Session::get('fail') }}", duration: 10000,
                style: { background: "linear-gradient(to right, #b90000, #c99396)" }
        }).showToast();
    @endif

    @if(Session::has('error'))
        Toastify({ text: "{{ Session::get('error') }}", duration: 10000,
            style: { background: "linear-gradient(to right, #b90000, #c99396)" }
        }).showToast();
    @endif

    @if($errors->any())
        @foreach ($errors->all() as $error)
            Toastify({ text: "{{ $error }}", duration: 10000,
                style: { background: "linear-gradient(to right, #b90000, #c99396)" }
            }).showToast();
        @endforeach
    @endif

</script>
@endsection

