@extends('adminpanel.layout.main')
@section('main-section')
    <!-- Header Section -->
    <section class="header bg-body-tertiary" style="min-height: 85vh;">
        @include('adminpanel.layout.side')
        <div class="main">
            <div class="table-contents d-flex justify-content-between">
                @if (auth()->check())
                    @php
                        $user = auth()->user();
                    @endphp

                    @if ($user->role == 1)
                        <h4 style="color: #1D2158; font-size: 18px; font-weight: 700;">ALL USERS</h4>
                    @elseif ($user->role == 0)
                        <h4 style="color: #1D2158; font-size: 18px; font-weight: 700;">My Account</h4>
                    @endif
                @endif

                @if (auth()->check())
                    @php
                        $user = auth()->user();
                    @endphp

                    @if ($user->role == 1)
                        <a id="logout" href="{{ route('userPage') }}">Add User</a>
                    @endif
                @endif    
            </div>
            <table class="table">
                <thead>
                    <tr id="t-heading">
                        <th scope="col">Sr No</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        @if (auth()->check())
                            @php
                                $user = auth()->user();
                            @endphp

                            @if ($user->role == 1)
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
                    @foreach ($users as $user)
                        <tr id="t-data">
                            <th class='id' style="color: #1D2158;">{{ $i++ }}</th>
                            <td>{{ $user->fname }}</td>
                            <td>{{ $user->lname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->role == 1 ? 'Admin' : 'Contributor' }}
                            </td>
                            @if (auth()->check())
                                @php
                                    $user = auth()->user();
                                @endphp

                                @if ($user->role == 1)
                                    <td class='edit'>
                                        <a href='{{ route('updateUser', ['uid' => $user->uid]) }}'><i
                                                class='fa fa-edit'></i></a>
                                    </td>
                                    <td class='delete'>
                                        <a href='{{ route('delUser', ['uid' => $user->uid]) }}'><i
                                                class="fa-solid fa-trash"></i></a>
                                    </td>
                                @elseif ($user->role == 0)
                                    <td class='edit'>
                                        <a href='{{ route('updateUser', ['uid' => $user->uid]) }}'><i
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
                    @if ($users->onFirstPage())
                        <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a></li>
                    @endif
                    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                        @if ($page == $users->currentPage())
                            <li class="page-item"><a class="page-link" href="#">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    @if ($users->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item"><a class="page-link disabled" href="#">Next</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </section>
@endsection
