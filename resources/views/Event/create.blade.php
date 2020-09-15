@extends('adminLte.main')

@section('title' , 'Create Event')

@section('content')
    <div class="container">
        <div class="row justify-content-center m-2 p-2">
            <div class="col-8">
                <div class="card-box">
                    <h4 class="m-t-0 header-title card-header bg-primary"> Upload A New Event </h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <div class="card-body bg-dark">
                                    <form action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @include('Event.form')
                                        <div class="form-group mt-4">
                                            <button type="submit" name="uplaod" class="btn btn-info btn-block">Upload Event</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
