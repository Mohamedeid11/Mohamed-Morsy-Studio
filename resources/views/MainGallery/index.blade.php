@extends('adminLte.main')

@section('title' , 'Main Gallery')

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

    {{--    DropZone Area--}}

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title text-center">Select Image</h3>
        </div>
        <div class="card-body">
            <form id="dropzoneForm" class="dropzone" action="{{route('mainGallery.store')}}">
                @csrf

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
                                <img src="{{asset('/Images/Main_Gallery/' . $image->image)}}" class="img-thumbnail" width="175" height="175" style="height:175px;" />

                                <form action="{{route('mainGallery.destroy' , $image->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="btn btn-link remove_image" onclick="return confirm('Are you sure You Want To Delete This Image?')"> Remove </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    End Of Drop Zone Area--}}
@endsection
