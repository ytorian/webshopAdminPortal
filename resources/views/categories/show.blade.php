<x-layouts.authenticated-layout>
    <div class="center">
        <div class="showCategoryContainer">
            <div>
                <div>
                    <h2>{{$category->name}}</h2>
                </div>
            </div>
            <div class="showProductButtons">
                <a href="{{route('categories.edit', ['category' => $category->id])}}">edit</a>
                <form method="post" action='{{route('categories.destroy', ['category' => $category->id])}}'>
                    @csrf
                    @method('delete')
                    <button type="submit" style="width: 100%" onclick="return confirm('Are you sure you want to delete {{$category->name}}?')">delete</button>
                </form>
            </div>
        </div>
    </div>

</x-layouts.authenticated-layout>
