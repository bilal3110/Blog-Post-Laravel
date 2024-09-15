@extends('adminpanel.layout.main')
@section('main-section')

    <!-- Header Section -->
    <section class="header bg-body-tertiary align-items-center justify-content-center shadow-lg" style="min-height: 85vh;">
        <div class="main bg-body" style="width: 70%; padding: 20px;">
            <div class="table-contents d-flex justify-content-center">
                <h4 style="color: #1D2158; font-size: 24px; font-weight: 700;">ADD CATEGORY</h4>
                <!-- <a id="logout" href="add-post.html">Add Post</a> -->
            </div>
            <!-- Form -->
            <form action="{{route('addCategoryPage')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputTile">Category</label>
                    <input type="text" name="name"  class="form-control" id="exampleInputUsername">
                </div>
                <input id="logout" type="submit" name="submit" class="btn my-3" value="Add" />
            </form>
            <!--/Form -->
        </div>
    </section>

@endsection