@extends('adminLte.main')

@section('title' , 'Sessions\Gallery')

@section('content')

    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a  class="navbar-brand d-flex align-items-center">
                    <strong> <i class="fas fa-camera"> Album  </i>  </strong>
                </a>
            </div>
        </div>
    </header>

{{--    Cover Area --}}
    <div class="row justify-content-center m-3">
        <div class="col-md-3 col-xl-4">
            <div class="card">
                <p class="text-center text-bold"> {{$session->Sname}}'s Cover</p>
                    <img class="card-img-top img-fluid" src="{{asset('/Images/' . $session->Sname . '/' . $session->Simage)}}" alt="Show More" style="width: 450px ; height: 450px ">
                <div class="card-body">
                    <!-- EDit Button -->
                    <button type="button" class="btn btn-primary floeat-left"
                            data-toggle="modal"
                            data-target="#editC"
                            data-sessionname='{{$session->Sname}}'
                            data-category='{{$session->category_id}}'
                            data-coverImage='{{$session->category_id}}'
                            data-sessionid="{{$session->id}}">
                        <i class="fas fa-edit"></i>  Edit
                    </button>
                    <!-- End of Edit Button-->

                    @can('delete-session')
                        <form action="{{route('session.destroy' , $session->id)}}" method="post" class="float-right">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger float-right"
                                    onclick="return confirm('Are you sure You Want To Delete {{$session->Sname }} Album ?')">
                                <i class="fas fa-trash-alt"> </i> Delete
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>

{{--    End Of Cover Area--}}


{{--    DropZone Area--}}

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title text-center">Select Image</h3>
        </div>
        <div class="card-body">
            <form id="dropzoneForm" class="dropzone" action="{{ route('Gallery.store') }}">
                @csrf
                <input type="hidden" name="Sid" id="Sid" value="{{$session->id}}">
                <input type="hidden" name="Sname" id="Sname" value="{{$session->Sname}}">
            </form>
            <div align="center">
                <button type="button" class="btn btn-info" id="submit-all">Upload</button>
            </div>

            <br />
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title text-center">Uploaded Image</h3>
                </div>
                <div class="card-body" id="uploaded_image">
                    <div class="row">
                        @foreach($images  as $image)
                            <div class="col-md-2" style="margin-bottom:16px;" align="center">
                                <img src="{{asset('/Images/' . $session->Sname . '/' . $image->image)}}" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                                <a href="{{route('session.delete' ,[$session->id , $image->id])}}">
                                    <button type="button" class="btn btn-link remove_image" >Remove</button>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    End Of Drop Zone Area--}}



{{-- Edit Session Model--}}
    <div class="modal fade" id="editC" tabindex="-1" role="dialog" aria-labelledby="editC" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit The Cover</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('session.update' , $session)}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="session" id="Sid" value="">
                        @include('Session.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{--    End Of Edit Session model--}}
@endsection