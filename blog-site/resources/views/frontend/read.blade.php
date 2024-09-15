@extends('frontend.layout.main')

@section('main-section')
    <!-- Header Section -->
    <section class="header bg-body-tertiary">
        @include('frontend.layout.sidebar')
        <div class="main">
            <div class="card-list">
                <div class="card mb-3">
                    <img src="{{ asset($post->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <div id="post-info">
                            <a href="">{{ $post->category ? $post->category->name : 'Uncategorized' }}</a>
                            <a href="">{{ $post->created_at }}</a>
                        </div>
                        <p class="card-text" style="color: #1D2158;">{{ $post->description}}</p>
                        <h6 style="font-weight: 800; color:#1d215871">
                            Author : {{ $post->author }}
                        </h6>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection