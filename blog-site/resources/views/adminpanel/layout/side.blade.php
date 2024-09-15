{{-- <div class="sidebar">
    <div class="category-list">
        <h4>Features</h4>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="{{ route('dashboard') }}">Posts</a></li>
            <li class="list-group-item"><a href="{{ route('category') }}">Categories</a></li>
            <li class="list-group-item"><a href="{{ route('user') }}">Users</a></li>
            <li class="list-group-item"><a href="">Settings</a></li>
        </ul>
    </div>
</div> --}}

<div class="sidebar">
    <div class="category-list">
        <h4>Features</h4>
        <ul class="list-group list-group-flush">
            @if(auth()->check())
                @php
                    $user = auth()->user();
                @endphp

                @if($user->role == 1) {{-- Admin --}}
                    <li class="list-group-item"><a href="{{ route('dashboard') }}">Posts</a></li>
                    <li class="list-group-item"><a href="{{ route('category') }}">Categories</a></li>
                    <li class="list-group-item"><a href="{{ route('user') }}">Users</a></li>
                    <li class="list-group-item"><a href="{{route('settings')}}">Settings</a></li>
                @elseif($user->role == 0) {{-- Contributor --}}
                    <li class="list-group-item"><a href="{{ route('dashboard') }}">My Posts</a></li>
                    <li class="list-group-item"><a href="{{ route('user') }}">My Account</a></li>
                @endif
            @endif
        </ul>
    </div>
</div>

