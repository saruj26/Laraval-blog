
@extends('layouts.master')
@section('content')
    <div class="container-fluid ">
        <div class="row my-2">
            <div class="col">
                <h2 >Latest Posts</h2>
            </div>
            <div class="col-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-light btn-primary " type="button" id="button-search">
                      <i class="bi bi-search"></i> <!-- Bootstrap Icons -->
                    </button>
                  </div>
            </div>
        </div>
        <div class="row m-3">
            @if ($posts)
                 @foreach ($posts as $post )
                <div class="col-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="https://via.placeholder.com/300" class="img-fluid" alt="...">
                            </div>
                            <div class="col-md-8">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->content }}</p>
                                <div class="d-flex justify-content-between">
                                     <a href="{{ route('post.detail', ['id' => $post->id]) }}">Read More</a>
                                    <a class="text-decoration-none text-dark fw-bold" href="#">Sports</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <div class="col-12">
                    <p>No posts available.</p>
                </div>
            @endif
           
            

            <div class="col-12 my-3">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="?page=1" aria-label="First">
                                <span aria-hidden="true">&laquo; first</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?page=1" aria-label="Previous">
                                <span aria-hidden="true">previous</span>
                            </a>
                        </li>
                        <li class="page-item"><span class="page-link">Page 3 of 20.</span></li>
                        <li class="page-item">
                            <a class="page-link" href="?page=4" aria-label="Next">
                                <span aria-hidden="true">next</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?page=20" aria-label="Last">
                                <span aria-hidden="true">last &raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                
            </div>
        </div>
        <div class="row">
           
        </div>
        
    </div>
@endsection
 