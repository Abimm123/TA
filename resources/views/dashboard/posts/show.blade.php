@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col md-12">
                <h2 class="blog-post-title mb-3 text-center">{{ $post->title }}</h2>
                <div class="d-flex bd-highlight">
                    <a href="{{ route('posts.index', ['post' => $post->slug]) }}"
                        class="btn btn-primary me-auto bd-highlight p-2">
                        <span class="bi bi-backspace"></span> Back to all my posts</a>
                    <a href="{{ route('posts.edit', ['post' => $post->slug]) }}"
                        class="btn btn-warning bd-highlight p-2"><span class="bi bi-pencil"></span>
                        Edit</a>&nbsp;
                    <form action="{{ route('posts.destroy', ['post' => $post->slug]) }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger bd-highlight p-2" onclick="return confirm('Are you sure ?')"><span
                                class="bi bi-trash"></span>Delete</button>
                    </form>
                </div>
                @if ($post->image)
                    <div style="max-height: 500px; overflow:hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                            class="card-img-top mt-3">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="card-img-top mt-3">
                @endif
                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
    <footer class="blog-footer">

        <a href="{{ route('posts.show', ['post' => $post->slug]) }}">Back top post</a>
    </footer>
@endsection
