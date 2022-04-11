@extends('partials.html_admin')

@section('page_title')
    List of sub-categories
@endsection

@section('content')
    <div class="my-5">
        <a href="{{ route('sub_categories.create') }}" class="btn btn-secondary">Create sub-category</a>
    </div>

    <table class="text-white">
        <tr>
            <th>id</th>
            <th>label</th>
            <th>icon</th>
            <th>category</th>
            <th>actions</th>
        </tr>
        @foreach($sub_categories as $sub_category)
            <tr>
                <td>{{ $sub_category->id }}</td>
                <td>{{ $sub_category->label }}</td>
                <td><i class="{{ $sub_category->icon }}"></i></td>
                <td>{{ $sub_category->category()->label }}</td>
                <td>
                    <a href="{{ route('sub_categories.edit', ['sub_category' => $sub_category]) }}" class="btn btn-primary d-inline-block">EDIT</a>
                    <form method="POST" action="{{ route('sub_categories.destroy' , ['sub_category' => $sub_category]) }}" class="d-inline-block">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>
@endsection
