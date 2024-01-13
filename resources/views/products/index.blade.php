@foreach($products as $product)
    <div>
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <p>Price: ${{ $product->price }}</p>
        <a href="{{ route('products.edit', ['id' => $product->id]) }}">Edit</a>
    </div>
@endforeach