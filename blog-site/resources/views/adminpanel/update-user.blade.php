@extends('adminpanel.layout.main')
@section('main-section')
    <!-- Header Section -->
    <section class="header bg-body-tertiary align-items-center justify-content-center shadow-lg" style="min-height: 85vh;">
        <div class="main bg-body" style="width: 70%; padding: 20px;">
            <!-- Form -->
            <form action="{{route('editUser', $user->uid)}}" method="POST">
                @csrf
                {{-- @method('PUT') <!-- Add this for updating --> --}}
                <div class="form-group">
                    <label for="post_title">First Name</label>
                    <input type="text" name="fname" class="form-control" autocomplete="off" value="{{$user->fname}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Last Name</label>
                    <input type="text" name="lname" class="form-control" autocomplete="off" value="{{$user->lname}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" autocomplete="off"
                    value="{{$user->email}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Role</label>
                    <select name="role" class="form-control">
                        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
                        <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Contributor</option>
                    </select>
                </div>
                <input id="logout" type="submit" name="submit" class="btn my-3" value="Update" required />
            </form>
            <!--/Form -->
        </div>
    </section>
@endsection
