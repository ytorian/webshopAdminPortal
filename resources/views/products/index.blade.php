<x-layouts.authenticated-layout>
    <div class="productsTableContainer">
        <div class="productsTable">
            <div class="productTableGrid">
                <div class="productName">Name</div>
                <div class="productDescription">Description</div>
                <div>Price</div>
            </div>
            <div class="productIndexContainer">
                @foreach($products as $product)
                    <a class='product' href={{route('products.show', ['product' => $product->id])}}>
                        <div class="productName"> {{$product->name}}</div>
                        <div class="productDescription">{{$product->description}}</div>
                        <div>${{$product->price}}</div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.authenticated-layout>
