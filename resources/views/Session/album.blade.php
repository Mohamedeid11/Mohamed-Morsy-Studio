 <main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @if(count($sessions) > 0)
                    @foreach($sessions as $session)
                        <div class="col-md-3 col-xl-4">
                            <div class="card">
                                <p class="text-center text-bold"> {{$session->Sname}}'s Album</p>
                                <a href="{{route('session.show' , $session->id)}}" >
                                    <img class="card-img-top img-fluid" src="{{asset('/Images/' . $session->Sname . '/' . $session->Simage)}}" alt="Show More" style="width: 450px ; height: 450px ">
                                </a>
                                <div class="card-body">
                                    @can('delete-session')
                                    <a href="{{route('session.edit' , $session->id)}}" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit</a>
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
                    @endforeach
                    @endif
            </div>
            <div class="row justify-content-center">
                {{$sessions->links()}}
            </div>
        </div>
    </div>
 </main>


 <!-- Modal for Add Session -->
 <div class="modal fade" id="addSession" tabindex="-1" role="dialog" aria-labelledby="addSession" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel"> Adding New Session</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="{{route('session.store')}}" method="post" enctype="multipart/form-data">
                 <div class="modal-body">
                     @csrf
                     @include('Session.form')
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save</button>
                 </div>
             </form>

         </div>
     </div>
 </div>

{{--     End Add Session Model--}}

