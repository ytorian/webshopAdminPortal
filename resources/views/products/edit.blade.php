<x-layouts.authenticated-layout>
    <div class="editContainer">
        <form method="post" action="{{route('products.update', ['product' => $product->id])}}" class="createForm">
            @method('put')
            @csrf
            <div id="productContainer" class="productContainer">
                <div class="createFormInput">
                    <label for="productName">product name</label>
                    <input type="text" id="productName" name="name" maxlength="45" value="{{$product->name}}">
                </div>
                <div class="createFormInput">
                    <label for="productDescription">description</label>
                    <input type="text" id="productDescription" name="description" maxlength="1000" value="{{$product->description}}">
                </div>
                <div class="createFormInput">
                    <label for="productPrice">price</label>
                    <input type="number" step="0.01" id="productPrice" name="price" value="{{$product->price}}">
                </div>
                <div class="createFormInput">
                    <label for="productCategory">category</label>
                    <select id="productCategory" name="category_ids[]" multiple>
                        @foreach($categories as $category)
                            @if(in_array($category->id, $productCategories))
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="createButtonContainer">
                <input type="submit" value="Submit" class="createButton">
            </div>

        </form>

        </div>
    </div>
    @error('name')
    <div style="color: yellow; text-align: center">{{$message}}</div>
    @enderror
    @error('description')
    <div style="color: yellow; text-align: center">{{$message}}</div>
    @enderror
    @error('price')
    <div style="color: yellow; text-align: center">{{$message}}</div>
    @enderror
    @error('category_ids')
    <div style="color: yellow; text-align: center">{{$message}}</div>
    @enderror
</x-layouts.authenticated-layout>
