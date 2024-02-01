<x-layouts.authenticated-layout>
    <div class="editContainer">
        <form method="post" action="{{route('categories.update', ['category' => $category->id])}}" class="createForm">
            @method('put')
            @csrf
            <div id="productContainer" class="productContainer">
                <div class="createFormInput">
                    <label for="categoryName">category name</label>
                    <input type="text" id="categoryName" name="name" maxlength="45" value="{{$category->name}}">
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
</x-layouts.authenticated-layout>
