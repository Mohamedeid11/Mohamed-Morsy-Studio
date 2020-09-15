@extends('adminLte.main')

@section('title' , 'Sessions')

@section('content')

    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-wihte bg-dark ml-md-5 pl-lg-5">
                    <a class="navbar-brand" >Categories</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            @if (count($categories) > 0)
                                @foreach($categories as $category)

                                    <li class="nav-item active">
                                        <a class="navbar-brand ml-5" href="{{route('category.show', $category->id)}}"> {{$category->name}} </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <strong> <i class="fas fa-camera"> Categories  </i>  </strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>
    <section class="jumbotron text-center">
        @can('create-session')
            <span class="badge badge-info float-lg-left w-30 justify-content-center">
                    <button type="button" class="btn btn-info float-left" data-toggle="modal" data-target="#addSession">
                        <i class="fas fa-cloud-upload-alt"></i> Add New Session
                    </button>
                </span>
        @endcan
            <span class="card p-2 float-right">All Sessions  <br> < {{$count}} ></span>
            <div class="container">
            <h1>Album</h1>
        </div>
    </section>
    @include('Session.album')
@endsection
