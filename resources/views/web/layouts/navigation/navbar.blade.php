<nav class="navbar navbar-light bg-white navbar-static-top navbar-expand-lg header-sticky">
    <div class="container-fluid">
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
        <a class="navbar-brand" href="index.html">
            <img class="img-fluid" src="{{ $web_assets }}/images/logo.svg" alt="logo">
        </a>
        <div class="navbar-collapse collapse justify-content-center">
            <ul class="nav navbar-nav">
                <li class="nav-item dropdown active">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home<i class="fas fa-chevron-down fa-xs"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="active"><a class="dropdown-item" href="/">Home </a></li>
                    </ul>
                </li>
                {{-- <li class="dropdown nav-item">
                    <a href="properties.html" class="nav-link" data-bs-toggle="dropdown">Pages<i
                            class="fas fa-chevron-down fa-xs"></i></a>
                    <ul class="dropdown-menu megamenu dropdown-menu-lg">
                        <li>
                            <div class="row g-0 d-none d-lg-block">
                                <div class="col-12 mb-4">
                                    <div class="d-flex align-items-center p-4 bg-light">
                                        <div class="me-4">
                                            <i class="flaticon-pin display-4 text-primary"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-1">Find properties in these cities</h6>
                                            <p class="mb-0">To browse in your areas of interest, look for
                                                properties by location.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-3 nav-title">Pages </h6>
                                    <ul class="list-unstyled mt-lg-3">
                                        <li><a href="mortgage.html">Mortgage <span
                                                    class="badge bg-danger ms-2">Hot</span> </a></li>
                                        <li><a href="about-us.html">About </a></li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="submit-property.html">Submit property</a></li>
                                        <li><a href="advertising.html">Advertising</a></li>
                                        <li><a href="careers.html">careers</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3 nav-title">Pages</h6>
                                    <ul class="list-unstyled mt-lg-3">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-detail.html">Blog detail </a></li>
                                        <li><a href="contact-us.html">Contact us</a></li>
                                        <li><a href="faqs.html">Faqs</a></li>
                                        <li><a href="pricing.html">Pricing</a></li>
                                        <li><a href="compare-properties.html">Compare properties</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3 nav-title">Authentication</h6>
                                    <ul class="list-unstyled mt-lg-3">
                                        <li><a href="search-no-result.html">Search no result</a></li>
                                        <li><a href="login.html">login</a></li>
                                        <li><a href="coming-soon.html">Coming soon</a></li>
                                        <li><a href="error-404.html">Error 404</a></li>
                                        <li><a href="terms-and-conditions.html">T&C</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 mt-4 d-none d-lg-block">
                                    <div class="p-4 bg-holder bg-overlay-black-70"
                                        style="background-image: url(images/banner-01.jpg);">
                                        <div class="position-relative">
                                            <div class="position-relative d-flex align-items-center">
                                                <div class="pe-1">
                                                    <h6 class="text-white mb-0">Looking for Home to Buy?</h6>
                                                    <small class="text-white mb-0">We’ll help you find a place
                                                        you’ll love.</small>
                                                </div>
                                                <div class="ms-auto">
                                                    <a class="btn btn-light btn-sm" href="#">Get started</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Listing <i class="fas fa-chevron-down fa-xs"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('property.listing') }}">Property list</a></li>
                        <li><a class="dropdown-item" href="property-list-map.html">Property list with map</a></li>
                    </ul>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Property <i class="fas fa-chevron-down fa-xs"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="property-detail-style-01.html">property detail style
                                01</a></li>
                        <li><a class="dropdown-item" href="property-detail-style-02.html">property detail style
                                02</a></li>
                        <li><a class="dropdown-item" href="property-detail-style-03.html">property detail style
                                03</a></li>
                        <li><a class="dropdown-item" href="property-detail-style-04.html">property detail style
                                04</a></li>
                    </ul>
                </li> --}}
                {{--   --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Agent <i class="fas fa-chevron-down fa-xs"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('agent.listing') }}">Agent list</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        About <i class="fas fa-chevron-down fa-xs"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('web.about') }}">About Us</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Contact <i class="fas fa-chevron-down fa-xs"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('web.contact') }}">Contact Us</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Blog <i class="fas fa-chevron-down fa-xs"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('blog.index') }}">Blog 01</a></li>
                        <li><a class="dropdown-item" href="{{ route('blog.details') }}">Blog Details</a></li>
                    </ul>
                </li>
            </ul>
        </div>
       
        <div class="add-listing d-none d-sm-block">
            <a class="btn btn-primary btn-md" href="submit-property.html"> <i class="fa fa-plus-circle"></i>Buy/Sell
            </a>
        </div>
    </div>
</nav>
