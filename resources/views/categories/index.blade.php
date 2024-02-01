<x-layouts.authenticated-layout>
<h1 style="font-size: xx-large; color: white; text-align: center; padding-top: 50px">
    <div class="productsTableContainer">
        <div class="categoryTable">
            <div class="categoryName">Category Name</div>
            @foreach($categories as $category)
                <a class="categoryNames" href="{{route('categories.show', ['category' => $category->id])}}">
                <div >{{$category->name}}</div>
                </a>
            @endforeach
        </div>
    </div>
</h1>
</x-layouts.authenticated-layout>
