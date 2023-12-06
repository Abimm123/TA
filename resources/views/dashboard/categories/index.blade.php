@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-citems-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Categories</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">Create new category</a>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }} </td>
                        <td>
                            <a href="{{ route('category.index', ['category' => $category->slug]) }}"
                                class="badge bg-info"><span class="bi bi-eye"></span></a>
                            <form action="{{ route('categories.destroy', ['category' => $category->slug]) }}" method="post"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')"><span
                                        class="bi bi-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
