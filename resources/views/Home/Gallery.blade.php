<!DOCTYPE html>
<html lang="en">
@include('Home.head')

<html lang="en">

<style>
    body {
        background: url("../../AdminLTE/Images/IMG_1571.png") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
    }

</style>
<body>
<!-- ======= Header ======= -->
@include('Home.header')
<div class="account-pages mt-5 mb-5">
{{--    <div class="container">--}}
        {{--    Cover Area --}}
        <div class="row justify-content-center">

                <div class="card">
                    <p class="text-center text-bold"> {{$session->Sname}}'s Cover</p>
                    <img class="card-img-top img-fluid" src="{{'Images/' . $session->Sname . '/' . $session->Simage}}" alt="Show More" style="width: 450px ; height: 450px ">
                    <div class="card-body">
                    </div>
                </div>


        </div>
    {{--    End Of Cover Area--}}

        <main role="main">
            <div class="album">
                <div class="row">
                    @foreach($images as $image)
                        <div class="col-md-3 col-xl-3">
                            <div class="card my-2">
                                <a href="{{'Images/' . $session->Sname . '/' . $image->image}}" class="venobox" data-gall="gallery-item">
                                    <img class="card-img-top img-fluid" src="{{'Images/' . $session->Sname . '/' . $image->image}}" alt="Show More" style="width: 450px ; height: 450px ">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>

        <!-- end row -->
{{--    </div>--}}
    <!-- end container -->
</div>
<!-- end page -->

<!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>

<!-- App js-->
<script src="assets/js/app.min.js"></script>
<!-- ======= Footer ======= -->
@include('Home.footer')
<!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

@include('Home.foot')
</body>
</html>
