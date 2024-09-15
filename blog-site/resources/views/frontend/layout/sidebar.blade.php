@php
    use App\Models\Category;
    use App\Models\Posts;
    use App\Models\Users;

    $categories = Category::all();
    $posts = Posts::with('category')->latest()->take(3)->get();
@endphp
<div class="sidebar">
    <div class="searchbar">
        <h4>Search Blogs:</h4>
        <form action="{{ route('home') }}" method="GET">
            <input type="search" name="search" id="search-box" placeholder="Search Here" value="{{ request('search') }}">
            <input type="submit" id="search-btn" value="Search">
            <a href="{{route('home')}}" id="search-btn" style="text-decoration: none; font-size:18px;   padding: 7px 12px;">Reset</a>
        </form>
    </div>
    

    <div class="category-list">
        <h4>Categories</h4>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="{{ route('home') }}">Home</a></li>
            @foreach ($categories as $category)
                <li class="list-group-item"><a href="{{ route('categorySearch', ['cid' => $category->cid]) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="top-post">
        <h4>Top Posts</h4>
        @php
            $i = 1;
        @endphp
        @foreach ($posts as $post)
            <div id="post">
                <h2>{{ $i++ }}</h2>
                <span>
                    <p>
                        <a href="{{route('readPost', ['pid' => $post->pid])}}">
                            {{ substr($post->description, 0, 100) }}
                            ...
                        </a>
                    </p>
                    <div id="post-info">
                        <a href="category.html">{{ $post->category ? $post->category->name : 'Uncategorized' }}</a>
                        <a href="">{{ $post->created_at }}</a>
                    </div>
                </span>
            </div>
            <br>
        @endforeach
    </div>
</div>
