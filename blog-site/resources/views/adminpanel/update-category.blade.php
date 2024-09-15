@extends('adminpanel.layout.main')
@section('main-section')
    <!-- Header Section -->
    <section class="header bg-body-tertiary align-items-center justify-content-center shadow-lg" style="min-height: 85vh;">
        <div class="main bg-body" style="width: 70%; padding: 20px;">
        <!-- Form for show edit-->
        <form action="{{route('editCategory',['cid' => $categories->cid])}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Category</label>
                <input type="text" name="name"  class="form-control" id="exampleInputUsername" value="{{$categories->name}}">
            </div>
            <input id="logout" type="submit" name="submit" class="btn my-3" value="Update" />
        </form>
        <!-- Form End -->
        </div>
    </section>

@endsection