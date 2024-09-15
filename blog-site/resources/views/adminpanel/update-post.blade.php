@extends('adminpanel.layout.main')
@section('main-section')
    <!-- Header Section -->
    <section class="header bg-body-tertiary align-items-center justify-content-center shadow-lg" style="min-height: 85vh;">
        <div class="main bg-body" style="width: 70%; padding: 20px;">
            <!-- Form -->
            <form action="{{ route('editPost', $post->pid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="post_title">Title</label>
                    <input type="text" name="title" class="form-control" autocomplete="off" value="{{ $post->title }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea style="resize: none;" name="description" class="form-control" rows="5" required>{{ $post->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select name="category" class="form-control">
                        <option value="" selected> Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->cid }}" {{ $category->cid == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="post_title">Author</label>
                    <input type="text" name="author" class="form-control" autocomplete="off" value="{{ $post->author}}" required>
                </div>
                <div class="form-group my-3">
                    <label for="exampleInputPassword1">Post Image</label>
                    <input type="file" name="image">
                    @if($post->image)
                        <img src="{{ asset($post->image) }}" alt="Post Image" width="100">
                    @endif
                </div>
                <input id="logout" type="submit" name="submit" class="btn" value="Update" required />
                </form>
            
            <!--/Form -->
        </div>
    </section>
@endsection