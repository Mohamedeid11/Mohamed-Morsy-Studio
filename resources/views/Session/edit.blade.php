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
                                    <form action="{{route('session.update' ,$session->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <label for="exampleInputPassword1"> Select The Session Category </label>
                                        <select class="form-control" name="category" id="category">
                                            @if (count($categories) > 0)
                                                @foreach($categories as $category)
                                                    <option id="category" name="category" value="{{$category->id}}" {{$category->id == $session->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>

                                        <label for="exampleInputPassword1">Session Cover</label>
                                        @if ($session->Simage)

                                            <img src="{{asset('/Images/' . $session->Sname . '/' .$session->Simage)}}" alt="Book-image" class=" d-block m-1" style="width: 200px ; height: 200px ">

                                        @endif

                                        <input type="file" name="Simage" id="Simage" accept="image/*" class="form-control"/>
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


