@extends('web.layouts.app')

@section('contents')
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
                        <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="#">Library</a></li>
                        <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Agent Listing – list
                                view </span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-title mb-3 mb-lg-4">
                        <h2><span class="text-primary">{{$agents->count()}}</span> Results</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="property-filter-tag">
                        <ul class="list-unstyled">
                            <li><a href="#">Investment <i class="fas fa-times-circle"></i> </a></li>
                            <li><a class="filter-clear" href="#">Reset Search <i class="fas fa-redo-alt"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 mb-5 mb-md-0">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Featured property</h6>
                            </div>
                            <div class="property-item mb-0">
                                <div class="property-image bg-overlay-gradient-04">
                                    <img class="img-fluid" src="{{ asset('storage/property/images/' . (json_decode($featuredProperty->images)[0] ?? '' ))}}"
                                        alt="">
                                    <div class="property-lable">
                                        <span class="badge badge-md bg-primary">{{$featuredProperty->type}}</span>
                                        <span class="badge badge-md bg-info">New </span>
                                    </div>
                                    <div class="property-agent-popup">
                                        <a href="#"><i class="fas fa-camera"></i> 02</a>
                                    </div>
                                </div>
                                <div class="property-details">
                                    <div class="property-details-inner">
                                        <h5 class="property-title"><a href="property-detail-style-01.html">{{Str::limit($featuredProperty->name, 20)}}</a></h5>
                                        <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>{{ $featuredProperty->address->street_address}}</span>
                                        <span class="property-agent-date"><i class="far fa-clock fa-md"></i>{{$featuredProperty->created_at->diffForHumans()}}</span>
                                        <div class="property-price">${{number_format($featuredProperty->price)}}</div>
                                    </div>
                                    <div class="property-btn">
                                        <a class="property-link" href="{{route('property.details', $featuredProperty->id)}}">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Recently listed properties</h6>
                            </div>
                            @foreach ( $recentProperties as $property)                               
                            <div class="recent-list-item">
                                <img class="img-fluid" src="{{ asset('storage/property/images/' . (json_decode($property->images)[0] ?? '' ))}}" alt="">
                                <div class="recent-list-item-info">
                                    <a class="address mb-2" href="{{route('property.details' , $property->id)}}">{{Str::limit($property->name, 25)}}</a>
                                    <span class="text-primary">${{number_format($property->price)}} </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="property-filter d-sm-flex">
                        <ul class="property-short list-unstyled d-sm-flex mb-0">
                            <li>
                                <form class="form-inline">
                                    <div class="form-group d-lg-flex d-block">
                                        <label class="justify-content-start">Short by:</label>
                                        <div class="short-by">
                                            <select class="form-control basic-select">
                                                <option>Date new to old</option>
                                                <option>Price Low to High</option>
                                                <option>Price High to Low</option>
                                                <option>Date Old to New</option>
                                                <option>Date New to Old</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <ul class="property-view-list list-unstyled d-flex mb-0">
                            <li>
                                <form class="form-inline">
                                    <div class="form-group d-lg-flex d-block">
                                        <label class="justify-content-start pe-2">Sort by: </label>
                                        <div class="short-by">
                                            <select class="form-control basic-select">
                                                <option>12</option>
                                                <option>18 </option>
                                                <option>24 </option>
                                                <option>64 </option>
                                                <option>128</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li><a href="index-half-map.html"><i class="fas fa-map-marker-alt fa-lg"></i></a></li>
                            <li><a class="property-list-icon active" href="agent-list.html">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a></li>
                            <li><a class="property-grid-icon" href="agent-grid.html">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a></li>
                        </ul>
                    </div>
                    @foreach ($agents as $agent)
                        <div class="agent agent-03 mt-4">
                            <div class="row g-0">
                                <div class="col-lg-4 text-center border-end">
                                    <div class="d-flex flex-column h-100">
                                        <div class="agent-avatar p-3 my-auto">
                                            @if (!empty($agent->avatar))
                                                <img class="img-fluid"
                                                    src="{{ asset('storage/users/avatar/' . $agent->avatar) }}"
                                                    alt="{{ basename($agent->avatar) }}">
                                            @else
                                                <img class="img-fluid" src="{{ $web_assets }}/images/profile/avatar.jpeg" 
                                                    alt="avatar" />
                                            @endif
                                        </div>
                                        <div class="agent-listing text-center mt-auto">
                                            <a href="#"> <strong
                                                    class="text-primary d-inline-block me-2">{{$agent->property->count()}}</strong>Listed Properties
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="d-flex h-100 flex-column">
                                        <div class="agent-detail">
                                            <div class="d-sm-flex">
                                                <div class="agent-name">
                                                    <h5 class="mb-0"> <a href="#">{{$agent->full_name}}</a></h5>
                                                    <span>Pomegranate real estates</span>
                                                </div>
                                                <div class="agent-social ms-auto mt-2 mt-sm-0">
                                                    <ul class="list-unstyled list-inline">
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-facebook-f"></i> </a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-twitter"></i> </a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-linkedin"></i> </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="agent-info">
                                                <p class="mt-3 mb-3">{{$agent->bio}}.</p>
                                                <ul class="list-unstyled mb-0">
                                                    <li><strong>Office: </strong>(123) 345-6789</li>
                                                    <li><strong>Fax: </strong>(123) 345-6789</li>
                                                    <li><strong>Email: </strong>{{$agent->email}}</li>
                                                </ul>
                                                <ul class="list-unstyled mb-0">
                                                    <li><strong>Mobile: </strong>{{$agent->phone_number ?? 'Not Available'}}</li>
                                                    <li><strong>WhatsApp: </strong>(456) 478-2589</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="agent-button">
                                            <a class="btn btn-light btn-lg d-grid" href="{{route('agent.profile', $agent->uuid)}}">View
                                                Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination mt-5">
                                <li class="page-item disabled me-auto">
                                    <span class="page-link b-radius-none">Prev</span>
                                </li>
                                <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span
                                        class="sr-only">(current)</span></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item ms-auto">
                                    <a class="page-link b-radius-none" href="#">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
