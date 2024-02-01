<x-layouts.authenticated-layout>
    <div class="center">
        <form method="post" action="{{route('products.store')}}" class="createForm">
            @csrf
            <div id="productContainer" class="productContainer">
                <div class="createFormInput">
                    <label for="productName">product name</label>
                    <input type="text" id="productName" name="name" maxlength="45">
                </div>
                <div class="createFormInput">
                    <label for="productDescription">description</label>
                    <input type="text" id="productDescription" name="description" maxlength="1000">
                </div>
                <div class="createFormInput">
                    <label for="productPrice">price</label>
                    <input type="number" step="0.01" id="productPrice" name="price">
                </div>
                <div class="createFormInput">
                    <label for="productCategory">category</label>
                    <select id="productCategory" name="category_ids[]" multiple>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    </select>
                </div>

            </div>
            <div class="createButtonContainer">
                <input type="submit" value="Submit" class="createButton">
            </div>

        </form>
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
