@extends('adminLte.main')

@section('title' , 'Edit Event')

@section('content')
    <div class="container">
        <div class="row justify-content-center m-2 p-2">
            <div class="col-8">
                <div class="card-box">
                    <h4 class="m-t-0 header-title card-header bg-primary"> Edit Event </h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <div class="card-body bg-dark">
                                    <form action="{{route('event.update' ,$event->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        @include('Event.form')
                                        <div class="form-group mt-4">
                                            <button type="submit" name="edit" class="btn btn-info btn-block">Save Changes</button>
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

