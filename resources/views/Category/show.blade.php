@extends('adminLte.main')

@section('title' , 'Category')

@section('content')

    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <nav class="navbar navbar-expand-lg navbar-wihte bg-dark ml-md-5 pl-lg-5">
                <a class="navbar-brand " >Categories </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @if (count($categories) > 0)
                            @foreach($categories as $category)
                                <li class="navbar-brand ml-5"> | </li>
                                <li class="nav-item active">
                                    <a class="navbar-brand ml-5" href="{{route('category.show', $category->id)}}"> {{$category->name}} </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    @include('Session.album')
@endsection
