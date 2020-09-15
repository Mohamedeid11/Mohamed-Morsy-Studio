<!DOCTYPE html>
<html lang="en">

@include('Home.head')
<body>
<!-- ======= Header ======= -->
@include('Home.header')
<!-- End Header -->

{{--  slide section --}}

{{--  end slide section--}}

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8">
                <h1> Welcome to<br> <span class="float-sm-right"> Mohamed Morsy Studio</span> </h1>
                <div class="btns">
                    <a href="#https://www.facebook.com/Mohamedmorsystudio/" class="btn-book animated fadeInUp scrollto ">Book Now </a>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="200">
                <a href="#" class="venobox play-btn" data-vbtype="video" data-autoplay="true"></a>
            </div>
        </div>
    </div>
</section><!-- End Hero -->
<!-- ======= Categories Section ======= -->
<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Category</h2>
            <p>Check Our Works</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="menu-flters">
                    @foreach($categories as $category)
                    <li data-filter=".{{$category->id}}">{{$category->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
            @foreach($sessions as $session)
            <div class="col-lg-3 menu-item {{$session->category_id}}">
                <div class="card">
                    <div class="card">
                        <a href="{{route('page.show' , $session->id)}}" >
                            <img class="card-img-top img-fluid" src="{{'Images/' . $session->Sname . '/' . $session->Simage}}" alt="Show More">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Categories Section -->
<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                    <div class="about-img">
                        <img src="Frontend/assets/img/me.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>Mohamed Morsy Studio</h3>
                    <p class="font-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                    </ul>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->


    <!-- ======= Events and Bakegs Section ======= -->
    <section id="events" class="events">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Events And Bakegs</h2>
                <p>Organize Your Events With US</p>
            </div>

            <div class="owl-carousel events-carousel" data-aos="fade-up" data-aos-delay="100">
                @foreach($events as $event)
                <div class="row event-item">
                    <div class="col-lg-6">
                        <img src="{{'Images/Event/' . $event->image}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h3>{{$event->name}}</h3>
                        <div class="price">
                            <p><span>{{$event->price}} L.E</span></p>
                        </div>
                        <p class="font-italic">
                            {{$event->info}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Events bakegs Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Gallery</h2>
                <p>Some photos from Our Studio</p>
            </div>
        </div>

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

            <div class="row no-gutters">
                @foreach($Gallery as $gallery)
                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{'Images/Main_Gallery/' . $gallery->image}}" class="venobox" data-gall="gallery-item">
                            <img src="{{'Images/Main_Gallery/' . $gallery->image}}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Gallery Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div>
        </div>

        <div data-aos="fade-up">
            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1709.3445569667583!2d31.36623088408188!3d31.034910196117792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f79dcd377f4253%3A0x8f05753d6f5fb1bc!2sMansoura%2C%20Mansoura%20Qism%202%2C%20Mansoura%2C%20Dakahlia%20Governorate!5e0!3m2!1sen!2seg!4v1597318234009!5m2!1sen!2seg" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container" data-aos="fade-up">

            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Location:</h4>
                            <p>Mansoura, Mansoura Qism 2, Mansoura, Dakahlia Governorate</p>
                        </div>

                        <div class="open-hours">
                            <i class="icofont-clock-time icofont-rotate-90"></i>
                            <h4>Open Hours:</h4>
                            <p>
                                Monday-Saturday:<br>
                                11:00 AM - 2300 PM
                            </p>
                        </div>

                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55s</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <div class=" col-lg-9 menu-item filter-Couples">
                        <img class="card-img-top img-fluid" src="Frontend/assets/img/white111.jpg" alt="Show More">
                    </div>
                    <h1 class="mx-lg-auto col-md-8">
                       <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    </h1>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('Home.footer')
<!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

@include('Home.foot')
</body>

</html>
