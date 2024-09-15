@extends('adminpanel.layout.main')
@section('main-section')
    <!-- Header Section -->
    <section class="header bg-body-tertiary align-items-center justify-content-center shadow-lg" style="min-height: 85vh;">
        <div class="main bg-body" style="width: 70%; padding: 20px;">
            <div class="table-contents d-flex justify-content-center">
                <h4 style="color: #1D2158; font-size: 24px; font-weight: 700;">ADD USER</h4>
                <!-- <a id="logout" href="add-post.html">Add Post</a> -->
            </div>
            <!-- Form -->
            <form action="{{route('addUser')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="post_title">First Name</label>
                    <input type="text" name="fname" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Last Name</label>
                    <input type="text" name="lname" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Role</label>
                    <select name="role" class="form-control">
                        <option value="" selected> Select Category</option>
                        <option value="1"> Admin</option>
                        <option value="0"> Contributer</option>
                    </select>
                </div>
                <input id="logout" type="submit" name="submit" class="btn my-3" value="Save" required />
            </form>
            <!--/Form -->
        </div>
    </section>

@endsection