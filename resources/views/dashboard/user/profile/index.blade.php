@extends('dashboard.layouts.app')

@section('contents')

  <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
                        <!-- row -->
			<div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo"></div>
                                </div>
                                <div class="profile-info">
									<div class="profile-photo">
										<img  src="{{asset('users/avatar/' . $user->avatar)}}" class="img-fluid rounded-circle" alt="">
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0">{{$user->full_name}}</h4>
											<p>{{$user->role}}</p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0">{{$user->email}}</h4>
											<p>Email</p>
										</div>
										<div class="dropdown ml-auto">
											<a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
												<li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
												<li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
												<li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
											</ul>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="profile-statistics">
											<div class="text-center">
												<div class="row">
													<div class="col">
														<h3 class="m-b-0">150</h3><span>Follower</span>
													</div>
													<div class="col">
														<h3 class="m-b-0">140</h3><span>Place Stay</span>
													</div>
													<div class="col">
														<h3 class="m-b-0">45</h3><span>Reviews</span>
													</div>
												</div>
												<div class="mt-4">
													<a href="javascript:void()" class="btn btn-primary mb-1 mr-1">Follow</a> 
													<a href="javascript:void()" class="btn btn-primary mb-1">Send Message</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="text-black">Today Highlights</h4>
									</div>
									<div class="card-body pt-3">
										<div class="profile-blog">
											<img  src="{{$dashboard_assets}}/images/profile/1.jpg" alt="" class="img-fluid mb-4 w-100">
											<h4><a href="post-details.html" class="text-black">Darwin Creative Agency Theme</a></h4>
											<p class="mb-0">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="text-black">Interest</h4>
									</div>
									<div class="card-body pt-3">
										<div class="profile-interest">
											<h5 class="text-primary d-inline"></h5>
											<div class="row sp4" id="lightgallery">
												<a href="public/images/profile/2.jpg" data-exthumbimage="images/profile/2.jpg" data-src="images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="{{$dashboard_assets}}/images/profile/2.jpg" alt="" class="img-fluid">
												</a>
												<a href="public/images/profile/3.jpg" data-exthumbimage="images/profile/3.jpg" data-src="images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="{{$dashboard_assets}}/images/profile/3.jpg" alt="" class="img-fluid">
												</a>
												<a href="public/images/profile/4.jpg" data-exthumbimage="images/profile/4.jpg" data-src="images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="{{$dashboard_assets}}/images/profile/4.jpg" alt="" class="img-fluid">
												</a>
												<a href="public/images/profile/3.jpg" data-exthumbimage="images/profile/3.jpg" data-src="images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="{{$dashboard_assets}}/images/profile/2.jpg" alt="" class="img-fluid">
												</a>
												<a href="public/images/profile/4.jpg" data-exthumbimage="images/profile/4.jpg" data-src="images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="{{$dashboard_assets}}/images/profile/3.jpg" alt="" class="img-fluid">
												</a>
												<a href="public/images/profile/2.jpg" data-exthumbimage="images/profile/2.jpg" data-src="images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="{{$dashboard_assets}}/images/profile/4.jpg" alt="" class="img-fluid">
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">							
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="text-black">Our Latest News</h4>
									</div>
									<div class="card-body pt-3">
										<div class="profile-news">
											<div class="media pt-3 pb-3">
												<img  src="{{$dashboard_assets}}/images/profile/5.jpg" alt="image" class="mr-3 rounded" width="75">
												<div class="media-body">
													<h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of textile samples</a></h5>
													<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
												</div>
											</div>
											<div class="media pt-3 pb-3">
												<img  src="{{$dashboard_assets}}/images/profile/6.jpg" alt="image" class="mr-3 rounded" width="75">
												<div class="media-body">
													<h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of textile samples</a></h5>
													<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
												</div>
											</div>
											<div class="media pt-3">
												<img  src="{{$dashboard_assets}}/images/profile/7.jpg" alt="image" class="mr-3 rounded" width="75">
												<div class="media-body">
													<h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of textile samples</a></h5>
													<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">Properties</a>
                                            </li>
                                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">About Me</a>
                                            </li>
                                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Setting</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="my-posts" class="tab-pane fade active show">
                                                <div class="my-post-content pt-3">
                                                    <div class="post-input">
                                                        <textarea name="textarea" id="textarea" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."></textarea> 
														<a href="javascript:void()" class="btn btn-primary light px-3"><i class="fa fa-link"></i> </a>
                                                        <a href="javascript:void()" class="btn btn-primary light mr-1 px-3"><i class="fa fa-camera"></i> </a><a href="javascript:void()" class="btn btn-primary">Post</a>
                                                    </div>
                                                   @foreach ($user->property as $property)
                                                   <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                    <img  src="{{asset('property/images/'. (json_decode($property->images)[0] ?? ''))}}" alt="" class="img-fluid">
                                                    <a class="post-title" href="post-details.html">
                                                        <h3 class="text-black">{{$property->name}}</h3>
                                                    </a>
                                                    <p>{{$property->description}}.</p>
                                                    <button class="btn btn-primary mr-2"><span class="mr-2"><i
                                                                class="fa fa-heart"></i></span>View</button>
                                                    <a href="#" class="btn btn-secondary">
                                                        <span class="mr-2"><i class="fa fa-reply"></i></span>Edit
                                                    </a>
                                                </div>
                                                   @endforeach
                                                    
                                                </div>
                                            </div>
                                            <div id="about-me" class="tab-pane fade">
                                                <div class="profile-about-me">
                                                    <div class="pt-4 border-bottom-1 pb-3">
                                                        <h4 class="text-primary">About Me</h4>
                                                        <p > {{$user->bio}}</p>
                                                    </div>
                                                </div>
                                               
                                                <div class="profile-lang  mb-5">
                                                    <h4 class="text-primary mb-2">Language</h4>
													<a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-us"></i> English</a> 
													<a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-fr"></i> French</a>
                                                    <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-bd"></i> Bangla</a>
                                                </div>
                                                <div class="profile-personal-info">
                                                    <h4 class="text-primary mb-4">Personal Information</h4>
                                                    <div class="row mb-4 mb-sm-4">
                                                        <div class="col-sm-3">
                                                            <h5 class="f-w-500">Name <span class="pull-right d-none d-sm-block">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9"><span>{{$user->full_name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4 mb-sm-4">
                                                        <div class="col-sm-3">
                                                            <h5 class="f-w-500">Email <span class="pull-right d-none d-sm-block">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9"><span>{{$user->email}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4 mb-sm-4">
                                                        <div class="col-sm-3">
                                                            <h5 class="f-w-500">Availability <span class="pull-right d-none d-sm-block">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9"><span>Full Time (Free Lancer)</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4 mb-sm-4">
                                                        <div class="col-sm-3">
                                                            <h5 class="f-w-500">Age <span class="pull-right d-none d-sm-block">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9"><span>{{$user->age ?? 'N/A'}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4 mb-sm-4">
                                                        <div class="col-sm-3">
                                                            <h5 class="f-w-500">Location <span class="pull-right d-none d-sm-block">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9"><span>{{$user->street_address ?? 'N/A'}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4 mb-sm-4">
                                                        <div class="col-sm-3">
                                                            <h5 class="f-w-500">Year Experience <span class="pull-right d-none d-sm-block">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9"><span>{{$user->year_of_experience ?? 'N/A'}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="profile-settings" class="tab-pane fade">
                                                <div class="pt-3">
                                                    @include('notifications.flash-messages')
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">Account Setting</h4>
                                                        <form action="{{route('dashboard.profile.update', $user->id)}}" enctype="multipart/form-data" method="post">
                                                            @csrf @method('put')
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label>First Name</label>
                                                                    <input type="text" name="first_name"
                                                                        value="{{ $user->first_name }}"
                                                                        class="form-control @error('first_name') is-invalid @enderror">
                                                                    @error('first_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Last Name</label>
                                                                    <input type="text" name="last_name"
                                                                        value="{{ $user->last_name }}"
                                                                        class="form-control @error('last_name') is-invalid @enderror">
                                                                    @error('last_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
    
                                                                <div class="form-group col-md-6">
                                                                    <label>Phone Number</label>
                                                                    <input type="text" name="phone_number"
                                                                        name="{{ $user->phone_number }}"
                                                                        class="form-control @error('phone_number') is-invalid @enderror">
                                                                    @error('phone_number')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Age</label>
                                                                    <input type="text" name="age"
                                                                        name="{{ $user->phone_number }}"
                                                                        class="form-control @error('age') is-invalid @enderror">
                                                                    @error('age')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Year OF Expirience</label>
                                                                    <input type="text" name="year_of_expirience"
                                                                        name="{{ $user->phone_number }}"
                                                                        class="form-control @error('year_of_expirience') is-invalid @enderror">
                                                                    @error('year_of_expirience')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Upload Avatar</label>
                                                                    <input type="file" name="avatar"
                                                                        value="{{ $user->avatar }}" class="form-control"
                                                                        @error('avatar') is-invalid @enderror>
                                                                    @error('avater')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label>Bio</label>
                                                                    <textarea name="bio" rows="10" cols="" class="form-control @error('bio') is-invalid @enderror">{{ $user->bio }}</textarea>
                                                                    @error('bio')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Company</label>
                                                                    <input type="text" name="company"
                                                                        value="{{ $user->company }}"
                                                                        class="form-control @error('company') is-invalid @enderror">
                                                                    @error('company')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Website</label>
                                                                    <input type="text" name="website"
                                                                        value="{{ $user->website }}"
                                                                        class="form-control @error('website') is-invalid @enderror">
                                                                    @error('website')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Social Links</label>
                                                                    <input type="text" name="social_links"
                                                                        value="{{ $user->social_links }}"
                                                                        class="form-control @error('social_links') is-invalid @enderror">
                                                                    @error('social_link')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
    
                                                                <div class="form-group col-md-6">
                                                                    <label>Street Address</label>
                                                                    <input type="text" name="street_address"
                                                                        value="{{ $user->street_address }}"
                                                                        class="form-control @error('street_address') is-invalid @enderror">
                                                                    @error('street_address')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>City</label>
                                                                    <input type="text" name="city"
                                                                        value="{{ $user->city }}"
                                                                        class="form-control @error('city') is-invalid @enderror">
                                                                    @error('city')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
    
                                                                <div class="form-group col-md-6">
                                                                    <label>State</label>
                                                                    <input type="text"  name="state"
                                                                        value="{{ $user->state }}"
                                                                        class="form-control @error('state') is-invalid @enderror">
                                                                    @error('state')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Zip Code</label>
                                                                    <input type="text" 
                                                                        name="zip_code" value="{{ $user->zip_code }}"
                                                                        class="form-control @error('zip_code') is-invalid @enderror">
                                                                    @error('zip_code')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Country</label>
                                                                    <input type="text"
                                                                        name="country" value="{{ $user->country }}"
                                                                        class="form-control @error('country') is-invalid @enderror">
                                                                    @error('country')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
    
    
    
                                                                <div class="form-group col-md-6 d-flex justify-content-center">
                                                                    <button class="btn btn-primary w-100" type="submit">Update
                                                                        Profile</button>
                                                                </div>
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
                    </div>
                </div>
            </div>
			
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

@endsection