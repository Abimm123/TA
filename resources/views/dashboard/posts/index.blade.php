@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-citems-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2">Create new post</a>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }} </td>
                        <td>
                            <a href="{{ route('posts.show', ['post' => $post->slug]) }}" class="badge bg-info"><span
                                    class="bi bi-eye"></span></a>
                            <a href="{{ route('posts.edit', ['post' => $post->slug]) }}" class="badge bg-warning"><span
                                    class="bi bi-pencil"></span></a>
                            <form action="{{ route('posts.destroy', ['post' => $post->slug]) }}" method="post"
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
