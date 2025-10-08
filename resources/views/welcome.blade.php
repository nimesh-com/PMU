@extends('layouts.app')

@section('content')

@if(Auth::check())

<!-- Services Section -->
<section id="services" class="services section">
    <!-- Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">



        <div class="services-tabs">


            <div class="tab-content" id="services-tabs-content">

                <div class="tab-pane fade show active" id="services-development" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="tab-service-card">
                                <div class="service-icon">
                                    <i class="bi bi-laptop"></i>
                                </div>
                                <h5>Create Activity Plan</h5>
                                <p>Modern, responsive websites built with cutting-edge technologies for optimal performance.</p>
                                <a href="{{route('activity.create')}}" class="tab-service-link">Get Started</a>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="tab-service-card">
                                <div class="service-icon">
                                    <i class="bi bi-phone"></i>
                                </div>
                                <h5>Change Activity Plan</h5>
                                <p>Native and cross-platform mobile applications that deliver exceptional user experiences.</p>
                                <a href="service-details.html" class="tab-service-link"> Change Plan</a>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="tab-service-card">
                                <div class="service-icon">
                                    <i class="bi bi-server"></i>
                                </div>
                                <h5>Update Progress</h5>
                                <p>Robust and scalable APIs that power your applications and enable seamless integrations.</p>
                                <a href="service-details.html" class="tab-service-link">Update Progress</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="services-marketing" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="tab-service-card">
                                <div class="service-icon">
                                    <i class="bi bi-megaphone"></i>
                                </div>
                                <h5>Show Pogress</h5>
                                <p>Strategic digital marketing campaigns that reach your target audience effectively.</p>
                                <a href="service-details.html" class="tab-service-link">View Details</a>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="tab-service-card">
                                <div class="service-icon">
                                    <i class="bi bi-search"></i>
                                </div>
                                <h5>SEO Optimization</h5>
                                <p>Comprehensive SEO strategies to improve your search engine rankings and visibility.</p>
                                <a href="service-details.html" class="tab-service-link">View Details</a>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="tab-service-card">
                                <div class="service-icon">
                                    <i class="bi bi-share"></i>
                                </div>
                                <h5>Social Media</h5>
                                <p>Engaging social media strategies that build brand awareness and drive customer engagement.</p>
                                <a href="service-details.html" class="tab-service-link">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="services-support" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="tab-service-card">
                                <div class="service-icon">
                                    <i class="bi bi-headset"></i>
                                </div>
                                <h5>24/7 Support</h5>
                                <p>Round-the-clock technical support to ensure your systems run smoothly at all times.</p>
                                <a href="service-details.html" class="tab-service-link">View Details</a>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="tab-service-card">
                                <div class="service-icon">
                                    <i class="bi bi-tools"></i>
                                </div>
                                <h5>System Maintenance</h5>
                                <p>Regular maintenance and updates to keep your systems secure and performing optimally.</p>
                                <a href="service-details.html" class="tab-service-link">View Details</a>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="tab-service-card">
                                <div class="service-icon">
                                    <i class="bi bi-person-check"></i>
                                </div>
                                <h5>Training</h5>
                                <p>Comprehensive training programs to help your team master our tools and platforms.</p>
                                <a href="service-details.html" class="tab-service-link">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</section><!-- /Services Section -->

@else
<!-- Hero Section -->
<section id="hero" class="hero section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">

            <div class="col-lg-8" data-aos="zoom-in" data-aos-delay="200">
                <div class="hero-content text-center">

                    <!-- Hero Badge -->
                    <div class="hero-badge" data-aos="fade-down" data-aos-delay="300">
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Planning & Monitoring Unit</span>
                    </div>

                    <!-- Hero Title -->
                    <h1 class="hero-title" data-aos="fade-up" data-aos-delay="400">
                        Empowering Data-Driven Decision Making
                    </h1>

                    <!-- Hero Description -->
                    <p class="hero-description" data-aos="fade-up" data-aos-delay="500">
                        The <strong>Planning and Monitoring Unit Data Collection Portal</strong> simplifies how organizations collect,
                        analyze, and monitor project information. Designed to improve transparency, efficiency, and real-time
                        performance tracking across multiple activities and departments.
                    </p>

                </div>
            </div>

        </div>


    </div>

</section><!-- /Hero Section -->
@endif
@endsection