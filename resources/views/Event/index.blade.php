@extends('adminLte.main')

@section('title' , 'Event')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1>Your Events</h1>
        </div>
        <a href="{{route('event.create')}}">
            <button type="button" class="btn btn-info justify-content-center">
                <i class="fas fa-cloud-upload-alt"></i> Add New Event
            </button>
        </a>
    </section>
    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">

                @foreach($events as $event)

                <div class="panel panel-default">
                    <div class="row mt-2">
                        <div class="col-md-6 col-xl-4">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="{{asset('/Images/Event/'.$event->image)}}" alt="Card image cap" style="width: 450px ; height: 450px ">
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-8">
                            <div class="col-md-6 col-xl-12">
                                <a href="{{route('event.edit' , $event->id)}}" class="btn btn-primary float-right"> <i class="fas fa-edit"></i> Edit</a>
                            <!-- Display the information of the Book -->
                            </div>
                            <div class="mt-4 mb-4">
                                <span class="font-24 font-weight-bolder " style="color: black ;"  > Event Name  : {{$event->name}} </span>
                                <span class=" ml-2 font-17">  </span>
                            </div>
                            <hr>
                            <div class="mb-4">
                                <span class="font-24 font-weight-bolder " style="color: black ;"  > price  : {{$event->price}} L.E </span>
                                <span class=" ml-2 font-17"> </span>
                            </div>
                            <hr>
                            <div class="mb-4">
                                <span class="font-24 font-weight-bolder " style="color: black ;"  > Description  : {{$event->info}} </span>
                                <p class="card-text ml-2 font-17">  </p>
                            </div>
                            <hr>
                            <div class="mb-4">
                                <span class="font-24 font-weight-bolder " style="color: black ;"> Uploaded at  </span>
                                <span class=" ml-2 font-17"> {{$event->created_at}} </span>
                            </div>
                            <hr>

                        </div>

                        <div class="col-md-6 col-xl-12">
                            <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteEvent" data-eventid="#">
                                <i class="fas fa-trash-alt"> Delete</i>
                            </button>
                        </div>

                        <!-- Modal for Delete Book -->
                        <div class="modal fade" id="deleteEvent" tabindex="-1" role="dialog" aria-labelledby="deleteEvent" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content text-center">
                                    <div class="modal-header">
                                        <h5 class="modal-tite" id="exampleModalLabel"> Delete Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('event.destroy' , $event->id)}}" method="post" >
                                        <div class="modal-body">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="event" id="Eid" value="">
                                            <h4> Are You Sure You Want To Delete This Event ??</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Yes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

{{--                            End Delete Book Model--}}
                    </div>
                    <hr>
                </div>

                @endforeach

            </div>
        </div>
    </main>





@endsection
