@extends('web.layouts.app')

@section('contents')
<!--=================================
breadcrumb -->
<div class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
            <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="#">Library</a></li>
            <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span>Agent detail </span></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--=================================
  breadcrumb -->
  
  <!--=================================
  Listing – grid view -->
  <section class="space-ptb">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="agent agent-03 mb-5">
            <div class="row g-0">
              <div class="col-md-3 text-center border-end">
                <div class="d-flex flex-column h-100">
                  <div class="agent-avatar p-3 my-auto">
                    <img class="img-fluid rounded-circle" src="{{asset('storage/users/avatar/' . $agent->avatar)}}" alt="">
                  </div>
                  <div class="agent-listing text-center mt-auto">
                    <a href="#"><strong class="text-primary me-2 d-inline-block">{{$agent->property->count()}}</strong>Listed Properties </a>
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="d-flex h-100 flex-column">
                  <div class="agent-detail">
                    <div class="d-block d-sm-flex">
                      <div class="agent-name mb-3 mt-sm-0">
                        <h2> <a href="#">{{$agent->full_name}} </a></h2>
                        <span>Farm and land brokerage</span>
                      </div>
                      <div class="agent-social ms-auto">
                        <ul class="list-unstyled list-inline">
                          <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i> </a></li>
                          <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i> </a></li>
                          <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="agent-info">
                      {{$agent->bio}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 mt-sm-5">
          <div class="p-4 bg-light">
            <div class="section-title mb-4">
              <h4>Contact Detail</h4>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="mb-2"><strong class="text-dark d-inline-block me-2">Address:</strong>{{$agent->address()}}</li>
              <li class="mb-2"><strong class="text-dark d-inline-block me-2">Website:</strong>{{$agent->website ?? 'N/A'}}</li>
              <li class="mb-2"><strong class="text-dark d-inline-block me-2">Agency:</strong>{{$agent->job_title ?? 'N/A'}}</li>
              <li class="mb-2"><strong class="text-dark d-inline-block me-2">Licenses:</strong>A42C3326</li>
              <li class="mb-2"><strong class="text-dark d-inline-block me-2">Phone:</strong>{{$agent->phone_number}}</li>
              <li class="mb-2"><strong class="text-dark d-inline-block me-2">Company:</strong>Real villa</li>
              <li><strong class="text-dark d-inline-block me-2">Office Number:</strong>(456) 478-2589</li>
            </ul>
          </div>
        </div>
        <div class="col-md-8 mt-5">
          <div class="section-title mb-4">
            <h4>Contact Alice Williams</h4>
          </div>
          <form>
            <div class="row">
              <div class="form-group col-md-4 mb-3">
                <input type="text" class="form-control" id="name" placeholder="Your name">
              </div>
              <div class="form-group col-md-4 mb-3">
                <input type="text" class="form-control" id="phone" placeholder="Your phone">
              </div>
              <div class="form-group col-md-4 mb-3">
                <input type="email" class="form-control" id="inputEmail4" placeholder="Your email">
              </div>
              <div class="form-group col-md-12 mb-3">
                <textarea class="form-control" rows="4" placeholder="Your message"></textarea>
              </div>
              <div class="col-md-12">
                <a class="btn btn-primary" href="#">Send message</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  Listing – grid view -->
  
  <div class="container">
    <hr class="m-0 p-0" />
  </div>
  
  <!--=================================
  Property -->
  <section class="space-pt">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title">
            <h4>Listing by {{$agent->full_name}}</h4>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($agent->property as $property)
        <div class="col-sm-6 col-md-4">
          <div class="property-item">
            <div class="property-image bg-overlay-gradient-04">
              <img class="img-fluid" src="{{asset('storage/property/images/' . (json_decode($property->images)[0] ?? 'web/images/profile/1.jpg'))}}" alt="">
              <div class="property-lable">
                <span class="badge badge-md bg-primary">{{$property->type}}</span>
                <span class="badge badge-md bg-info">{{$property->stock_status}} </span>
              </div>
              <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
             
            </div>
            <div class="property-details">
              <div class="property-details-inner">
                <h5 class="property-title"><a href="property-detail-style-01.html">{{$property->name}} </a></h5>
                <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>
                    @foreach ($agent->property as $property)
                    {{ $property->address->street_address ?? 'No Address Available' }}
                    @endforeach
                </span>
                <span class="property-agent-date">
                    <i class="far fa-clock fa-md"></i>{{ $property->created_at->diffForHumans() }}
                </span>
                <div class="property-price">${{number_format($property->price)}}<span> / month</span> </div>
                <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>{{ $property->bedrooms }}</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>{{ $property->bathrooms }}</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>{{$property->square_ft}}m</span></li>
                </ul>
              </div>
              <div class="property-btn">
                <a class="property-link" href="{{ route('property.details', $property->id) }}">See Details</a>
                <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-compare">
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a>
                    </li>
                    <li class="property-favourites">
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a>
                    </li>
                </ul>
            </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!--=================================
  Property -->
  
  <!--=================================
  review -->
  <section class="space-pt">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title">
            <h4>Leave a review for Alice Williams</h4>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="review d-flex">
            <div class="review-avatar avatar avatar-lg me-3">
              <img class="img-fluid rounded-circle" src="images/avatar/01.jpg" alt="">
            </div>
            <div class="review-info flex-grow-1">
              <span>Rating:</span>
              <ul class="list-unstyled list-inline">
                <li class="list-inline-item m-0 text-warning"><i class="fas fa-star"></i></li>
                <li class="list-inline-item m-0 text-warning"><i class="fas fa-star"></i></li>
                <li class="list-inline-item m-0 text-warning"><i class="fas fa-star"></i></li>
                <li class="list-inline-item m-0 text-warning"><i class="fas fa-star-half-alt"></i></li>
                <li class="list-inline-item m-0 text-warning"><i class="far fa-star"></i></li>
              </ul>
              <div class="mb-3">
                <span class="mb-2 d-block">Rating comment:</span>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
              </div>
              <span> <a href="login.html"> <b>Login</b> </a> to leave a review</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  review -->
  
  <!--=================================
  See Similar Agent -->
  <section class="space-ptb">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title">
            <h4>See Similar Agent</h4>
          </div>
        </div>
      </div>
      <div class="row g-0">
        <div class="col-lg-3 col-sm-6 mb-3 mb-sm-0">
          <div class="agent text-center">
            <div class="agent-detail">
              <div class="agent-avatar avatar avatar-xllll">
                <img class="img-fluid rounded-circle" src="images/agent/01.jpg" alt="">
              </div>
              <div class="agent-info">
                <h6 class="mb-0"> <a href="agent-detail.html">Alice Williams </a></h6>
                <span class="text-primary font-sm">Founder & CEO </span>
                <p class="mt-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</p>
              </div>
            </div>
            <div class="agent-button">
              <a class="btn btn-light d-grid" href="agent-detail.html">View Profile</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3 mb-sm-0">
          <div class="agent text-center">
            <div class="agent-detail">
              <div class="agent-avatar avatar avatar-xllll">
                <img class="img-fluid rounded-circle" src="images/agent/02.jpg" alt="">
              </div>
              <div class="agent-info">
                <h6 class="mb-0"> <a href="agent-detail.html">Felica queen </a></h6>
                <span class="text-primary font-sm">Construction</span>
                <p class="mt-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</p>
              </div>
            </div>
            <div class="agent-button">
              <a class="btn btn-light d-grid" href="agent-detail.html">View Profile</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3 mb-sm-0">
          <div class="agent text-center">
            <div class="agent-detail">
              <div class="agent-avatar avatar avatar-xllll">
                <img class="img-fluid rounded-circle" src="images/agent/03.jpg" alt="">
              </div>
              <div class="agent-info">
                <h6 class="mb-0"> <a href="agent-detail.html">Paul flavius </a></h6>
                <span class="text-primary font-sm">Investment</span>
                <p class="mt-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</p>
              </div>
            </div>
            <div class="agent-button">
              <a class="btn btn-light d-grid" href="agent-detail.html">View Profile</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="agent text-center">
            <div class="agent-detail">
              <div class="agent-avatar avatar avatar-xllll">
                <img class="img-fluid rounded-circle" src="images/agent/04.jpg" alt="">
              </div>
              <div class="agent-info">
                <h6 class="mb-0"> <a href="agent-detail.html">Sara lisbon  </a></h6>
                <span class="text-primary font-sm">Land development</span>
                <p class="mt-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</p>
              </div>
            </div>
            <div class="agent-button">
              <a class="btn btn-light d-grid" href="agent-detail.html">View Profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  See Similar Agent -->
  
  <!--=================================
  newsletter -->
  <section class="py-5 bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h3 class="text-white mb-0">Sign up to our newsletter to get the latest news and offers.</h3>
        </div>
        <div class="col-md-7 mt-3 mt-md-0">
          <div class="newsletter">
            <form>
              <div class="form-group mb-0">
                <input type="email" class="form-control" placeholder="Enter email">
              </div>
              <button type="submit" class="btn btn-dark b-radius-left-none">Get notified</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  newsletter -->
@endsection