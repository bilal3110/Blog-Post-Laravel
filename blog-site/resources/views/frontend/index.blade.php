@extends('frontend.layout.main')

@section('main-section')

    <!-- Header Section -->
    <section class="header bg-body-tertiary">

        {{--  side bar  --}}
        @include('frontend.layout.sidebar')
        <div class="main">
            <div class="card-list">
                @foreach ($posts as $post )               
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset($post->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h4 class="card-title">{{$post->title}}</h4>
                      <p class="card-text"><a href="{{ route('readPost', ['pid' => $post->pid]) }}">{{ substr($post->description, 0, 130)}}
                    <br>
                    <span style="font-size: 13px; font-wieght: 800 ; color:rgba(0, 0, 0, 0.338)">
                        read more...    
                    </span>
                </a></p>
                      <div id="post-info">
                          <a href="">{{ $post->category ? $post->category->name : 'Uncategorized' }}
                        </a>
                          <a href="">{{ $post->created_at }}</a>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- Pagination  --}}
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($posts->onFirstPage())
                        <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $posts->appends(['search' => request('search')])->previousPageUrl() }}">Previous</a></li>
                    @endif
            
                    @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                        @if ($page == $posts->currentPage())
                            <li class="page-item"><a class="page-link" href="#">{{ $page }}</a></li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url . '&search=' . request('search') }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
            
                    @if ($posts->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $posts->appends(['search' => request('search')])->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item"><a class="page-link disabled" href="#">Next</a></li>
                    @endif
                </ul>
            </nav>
            
        </div>
    </section>
@endsection
