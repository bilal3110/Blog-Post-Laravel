@extends('adminpanel.layout.main')
@section('main-section')
    <!-- Header Section -->
    <section class="header bg-body-tertiary" style="min-height: 85vh;">
        {{-- sidebar --}}
        @include('adminpanel.layout.side')
        <div class="main">
            <div class="table-contents d-flex justify-content-between">
                <h4 style="color: #1D2158; font-size: 18px; font-weight: 700;">
                    @if (auth()->check() && auth()->user()->role == 0)
                    My Posts
                @else
                    All Posts
                @endif
                </h4>
                <a id="logout" href="{{ route('postPage') }}">Add Post</a>
            </div>
            <table class="table">
                <thead>
                    <tr id="t-heading">
                        <th scope="col">Sr No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Date</th>
                        <th scope="col">Author</th>
                        @if (auth()->check())
                            @php
                                $user = auth()->user();
                            @endphp

                            @if ($user->role == 1)
                                {{-- Admin --}}
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            @elseif ($user->role == 0)
                                <th scope="col">Edit</th>
                            @endif
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($posts as $post)
                        <tr id="t-data">
                            <th class='id' style="color: #1D2158;">{{ $i++ }}</th>
                            <td>{{ $post->title }}</td>
                            <td>
                                {{ $post->category ? $post->category->name : 'Uncategorized' }}
                            </td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                {{ $post->author ? $post->author : 'Guest' }}
                            </td>
                            @if (auth()->check())
                                @php
                                    $user = auth()->user();
                                @endphp

                                @if ($user->role == 1)
                                    {{-- Admin --}}
                                    <td class='edit'>
                                        <a href='{{ route('postUpdate', ['pid' => $post->pid]) }}'><i
                                                class='fa fa-edit'></i></a>
                                    </td>
                                    <td class='delete'>
                                        <a href='{{ route('postDel', ['pid' => $post->pid]) }}'><i
                                                class="fa-solid fa-trash"></i></a>
                                    </td>
                                @elseif ($user->role == 0)
                                    <td class='edit'>
                                        <a href='{{ route('postUpdate', ['pid' => $post->pid]) }}'><i
                                                class='fa fa-edit'></i></a>
                                    </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{-- Pagination  --}}
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($posts->onFirstPage())
                        <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $posts->previousPageUrl() }}">Previous</a></li>
                    @endif
                    @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                        @if ($page == $posts->currentPage())
                            <li class="page-item"><a class="page-link" href="#">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    @if ($posts->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item"><a class="page-link disabled" href="#">Next</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </section>
@endsection
