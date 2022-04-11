@extends('partials.html_admin')

@section('page_title')
    List of categories
@endsection

@section('content')
    <div class="my-5">
        <a href="{{ route('categories.create') }}" class="btn btn-secondary">Create category</a>
    </div>

    <table class="text-white">
        <tr>
            <th>id</th>
            <th>label</th>
            <th>icon</th>
            <th>actions</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->label }}</td>
                <td><i class="{{ $category->icon }}"></i></td>
                <td>
                    <a href="{{ route('categories.edit', ['category' => $category]) }}" class="btn btn-primary d-inline-block">EDIT</a>
                    <form method="POST" action="{{ route('categories.destroy' , ['category' => $category]) }}" class="d-inline-block">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>
@endsection
