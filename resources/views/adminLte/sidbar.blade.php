<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link">
        <img src="{{asset('Frontend/assets/img/white copy - Copy.png')}}" alt="Mohamed Morsy Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"> Mohamed Morsy <h5>Studio</h5></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            @if (Auth::guest())
            @else
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name}}</a>
            <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
            @endif
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                {{--                    The Category--}}
                <li class="nav-item">
                    <a href="{{route('category.index')}}" class="nav-link">
                        <i class="fas fa-list-alt"></i>
                        <p>Category</p>
                    </a>
                </li>


                {{--                    The Session--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-camera"></i>
                        <p>
                            Sessions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <ul class="nav-item right">
                            <a href="{{route('session.index')}}" class="nav-link">
                                <i class="fas fa-images"></i>
                                <p> Gallery </p>
                            </a>
                        </ul>
                        <ul class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>Upload New Session</p>
                            </a>
                        </ul>
                    </ul>
                </li>

{{--            the Event bar--}}

                <li class="nav-item">
                    <a href="{{route('event.index')}}" class="nav-link">
                        <i class="fab fa-adversal"></i>
                        <p> Events</p>
                    </a>
                </li>

{{--                Main Gallery--}}
                <li class="nav-item">
                    <a href="{{route('mainGallery.index')}}" class="nav-link">
                        <i class="fas fa-images"></i>
                        <p> Gallery</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
