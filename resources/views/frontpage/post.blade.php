@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col md-8">
                <h2 class="blog-post-title mb-3 text-center">{{ $post->title }}</h2>
                <p class="text-center">By. <a href="/authors/{{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}
                    </a> in <a href="/posts?category={{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}
                    </a>
                </p>
                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden">
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

        <a href="/posts">Back top Posts</a>
    </footer>
@endsection
