@extends('adminpanel.layout.main')
@section('main-section')
    <!-- Header Section -->
    <section class="header bg-body-tertiary" style="min-height: 85vh;">
        {{-- sidebar --}}
        @include('adminpanel.layout.side')
        <div class="main">
              <div class="card p-4">
                <h3>Settings</h3>
                <form action="{{ route('settingInfo') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label for="blog_name">Blog Name</label>
                      <input type="text" name="blog_name" class="form-control" id="blog_name" value="{{ $settings->blog_name ?? '' }}">
                  </div>
                  <div class="form-group my-3">
                    <label for="blog_icon">Blog Icon</label>
                    <input type="file" name="blog_icon" class="form-control">
                    @if($settings->blog_icon)
                    <img src="{{ asset($settings->blog_icon) }}" alt="Blog Icon" width="100">
                    @endif
                  </div>
                  <input id="logout" type="submit" name="submit" class="btn my-3" value="Save" />
              </form>
              </div>
        </div>
    </section>
@endsection
