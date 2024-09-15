@extends('frontend.layout.main')
@section('main-section')
<body>
    <section class="navbar">
        <a href="">
            <h2>Bilal A.</h2>
        </a>
    </section>

    <!-- Header Section -->
    <section class="header bg-body-tertiary">
    @include('frontend.layout.sidebar')
        <div class="main">
            <h2 class="page-heading">Category Name</h2>
            <div class="card-list">
                <div class="card" style="width: 18rem;">
                    <img src="images/FULL STACK WEBSITE.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h4 class="card-title">Card title</h4>
                      <p class="card-text"><a href="read.html">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quam, consectetur a provident laboriosam necessitatibus?</a></p>
                      <div id="post-info">
                          <a href="">Politics</a>
                          <a href="">21-April-2024</a>
                      </div>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="images/FULL STACK WEBSITE.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h4 class="card-title">Card title</h4>
                      <p class="card-text"><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quam, consectetur a provident laboriosam necessitatibus?</a></p>
                      <div id="post-info">
                          <a href="">Politics</a>
                          <a href="">21-April-2024</a>
                      </div>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="images/FULL STACK WEBSITE.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h4 class="card-title">Card title</h4>
                      <p class="card-text"><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quam, consectetur a provident laboriosam necessitatibus?</a></p>
                      <div id="post-info">
                          <a href="">Politics</a>
                          <a href="">21-April-2024</a>
                      </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </section>

@endsection