<x-layouts.authenticated-layout>
<div class="center">
    <div class="showProductContainer">
        <div>
            <div>
                <h2>{{$product->name}}</h2>
                <div style="font-size: large; font-weight: bold">Description :</div>
                <div style="font-size: medium">{{$product->description}}</div>
            </div>
            <div class="showProductPrice">
                <div style="font-size: large; font-weight: bold">Price :</div>
                <div style="font-size: medium">${{$product->price}}</div>
            </div>
            <div class="showProductPrice">
                <div style="font-size: large; font-weight: bold">Linked categories :</div>
                @foreach($categories as $category)
                    <div style="font-size: medium">{{$category['name']}}</div>
                @endforeach
            </div>
        </div>
        <div class="showProductButtons">
            <a href="{{route('products.edit', ['product' => $product->id])}}">edit</a>
            <form method="post" action='{{route('products.destroy', ['product' => $product->id])}}'>
                @csrf
                @method('delete')
                <button type="submit" style="width: 100%" onclick="return confirm('Are you sure you want to delete {{$product->name}}?')">delete</button>
            </form>
        </div>
    </div>
</div>

</x-layouts.authenticated-layout>
