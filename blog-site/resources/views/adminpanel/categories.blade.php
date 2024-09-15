@extends('adminpanel.layout.main')
@section('main-section')
    <!-- Header Section -->
    <section class="header bg-body-tertiary" style="min-height: 85vh;">
       @include('adminpanel.layout.side')
        <div class="main">
            <div class="table-contents d-flex justify-content-between">
                <h4 style="color: #1D2158; font-size: 18px; font-weight: 700;">ALL Categories</h4>
                <a id="logout" href="{{route('addCategory')}}">Add Category</a>
            </div>
            <table class="table">
                <thead>
                  <tr id="t-heading">
                    <th scope="col">Sr No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">No of Posts</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $serial = 1;
                  @endphp
                  @foreach ($categories as  $category)
                  <tr id="t-data">
                    <th class='id' style="color: #1D2158;">{{$serial++}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->posts}}</td>
                    <td class='edit'>
                        <a href='{{ route('updateCategory', ['cid' => $category->cid]) }}'><i class='fa fa-edit'></i></a>
                    </td>
                    <td class='delete'>
                        <a href='{{ route('DelCategory', ['cid' => $category->cid]) }}'><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>

                    
                  @endforeach
                </tbody>
              </table>
              {{-- Pagination  --}}
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                @if ($categories->onFirstPage())
                  <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                @else
                  <li class="page-item"><a class="page-link" href="{{ $categories->previousPageUrl() }}">Previous</a></li>
              @endif
              @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                  @if ($page == $categories->currentPage())
                      <li class="page-item"><a class="page-link" href="#">{{ $page }}</a></li>
                  @else
                      <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                  @endif
              @endforeach
          
              @if ($categories->hasMorePages())
                  <li class="page-item"><a class="page-link" href="{{ $categories->nextPageUrl() }}">Next</a></li>
              @else
                  <li class="page-item"><a class="page-link disabled" href="#">Next</a></li>
              @endif
                </ul>
            </nav>
        </div>
    </section>

@endsection