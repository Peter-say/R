@extends('dashboard.layouts.app')

@section('contents')
    <style>
        .required-field {
            color: red;
        }

        .post-note {
            color: rgb(255, 251, 0);
        }

        h4 {
            color: white;
        }
    </style>

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">
                            Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Property</a></li>
                </ol>
            </div>
            <!-- row -->
            @include('notifications.flash-messages')
            <form action="{{ route('dashboard.property.update', $property->id) }}" enctype="multipart/form-data" method="post">
                @csrf @method('PUT')
                <input type="hidden" name="user_id" value="{{ $property->user->id }}">
                <input type="hidden" name="uuid" value="{{ $property->uuid }}">
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card bg-dark text-white">
                            <div class="card-header">
                                <h4 class="card-title text-white">Edit Property</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ $property->name }}"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <label>Category</label>
                                        <select name="category_id" id="category_id"
                                            class="form-control @error('status') is-invalid @enderror">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $property->category_id == $category->name ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Price <span class="required-field">*</span></label>

                                            <input type="number" name="price" required value="{{ $property->price }}"
                                                class="form-control @error('price') is-invalid @enderror">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Images(You can add multiple
                                                images)<span class="required-field">*</span></label>

                                            <input type="file" name="images[]" accept="image/*" multiple
                                                value="{{ $property->images }}"
                                                class="form-control @error('images') is-invalid @enderror">
                                            @error('images')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Property Video</label>
                                            <input type="file" name="type" value="{{ $property->property_video }}"
                                                class="form-control @error('property_video') is-invalid @enderror">
                                            @error('property_video')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Type <span class="required-field">*</span></label>
                                            <input type="text" name="type" required value="{{ $property->type }}"
                                                class="form-control @error('type') is-invalid @enderror">
                                            @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Size <span class="required-field">*</span></label>

                                            <input type="text" name="size" required value="{{ $property->size }}"
                                                class="form-control @error('size') is-invalid @enderror">
                                            @error('size')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Year Built<span class="required-field">*</span></label>

                                            <input type="date" name="year_built" required
                                                value="{{ $property->year_built }}"
                                                class="form-control @error('year_built') is-invalid @enderror">
                                            @error('year_built')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Number of Garage <span class="required-field">*</span></label>

                                            <input type="text" name="garage" required value="{{ $property->garage }}"
                                                class="form-control @error('garage') is-invalid @enderror">
                                            @error('garage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Garage Size <span class="required-field">*</span></label>

                                            <input type="text" name="garage_size" required
                                                value="{{ $property->garage_size }}"
                                                class="form-control @error('garage_size') is-invalid @enderror">
                                            @error('garage_size')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                   

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Number Of Bedroom(s) <span class="required-field">*</span></label>

                                            <input type="text" name="bedrooms" required
                                                value="{{ $property->bedrooms }}"
                                                class="form-control @error('bedrooms') is-invalid @enderror">
                                            @error('bedrooms')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Number Of Bathroom(s) <span class="required-field">*</span></label>

                                            <input type="text" name="bathrooms" required
                                                value="{{ $property->bathrooms }}"
                                                class="form-control @error('bathrooms') is-invalid @enderror">
                                            @error('bathrooms')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Description <span class="required-field">*</span></label>
                                            <textarea name="description" rows="10" required
                                                class="form-control @error('description') is-invalid @enderror">{{ $property->description }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 card-header d-flex">
                                        <strong>Additional Details</strong>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Floor Plan Images </span></label>
                                            <input type="file" name="floor_plan_images"
                                                value="{{ $property->floor_plan_images }}"
                                                class="form-control @error('floor_plan_images') is-invalid @enderror">
                                            @error('floor_plan_images')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Floor Plan Description <span class="required-field">*</span></label>
                                            <input type="text" name="floor_plan_description" required
                                                value="{{ $property->floor_plan_description }}"
                                                class="form-control @error('floor_plan_description') is-invalid @enderror">
                                            @error('floor_plan_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 card-header">
                                        <h4>SEO Optimization</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Meta Description (Post Sumamary) </span></label>
                                            <textarea name="meta_description" rows="2"
                                                class="form-control @error('meta_description') is-invalid @enderror">{{ $property->meta_description }}</textarea>
                                            <small class="post-note">A recommended meta description should not be more than 150 characters</small>

                                            @error('meta_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Permalink(URL) <span class="required-field">*</span></label>
                                            <input type="text" name="slug" required value="{{ $property->slug }}"
                                                class="form-control @error('slug') is-invalid @enderror">
                                            <small class="post-note">Use hyphen to join the in the url together</small>

                                            @error('slug')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Meta Keyword</label>
                                            <input type="text" name="meta_keyword"
                                                value="{{ $property->floor_plan_description }}"
                                                class="form-control @error('meta_keyword') is-invalid @enderror">
                                            @error('meta_keyword')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 card-header">
                                        <h4>Visability Option</h4>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Stock Status</label>
                                            <select name="stock_status" id="stock_status"
                                                class="form-control @error('stock_status') is-invalid @enderror">
                                                <option value="">Select Option</option>
                                                @foreach ($stockOptions as $key => $option)
                                                    <option value="{{ $key }}"
                                                        {{ $property->stock_status == $option ? 'selected' : '' }}>
                                                        {{ $option }}</option>
                                                @endforeach
                                            </select>
                                            @error('stock_status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" id="status"
                                                class="form-control @error('status') is-invalid @enderror">
                                                <option value="">Select Status</option>
                                                @foreach ($statusOptions as $key => $status)
                                                    <option value="{{ $key }}"
                                                        {{ $property->status == $status ? 'selected' : '' }}>
                                                        {{ $status }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Is_Featured</label>
                                            <select name="is_featured" id="is_featured"
                                                class="form-control @error('is_featured') is-invalid @enderror">
                                                <option value="">Select Option</option>
                                                @foreach ($boolOptions as $key => $option)
                                                    <option value="{{ $key }}"
                                                        {{ $property->is_featured == $option ? 'selected' : '' }}>
                                                        {{ $option }}</option>
                                                @endforeach
                                            </select>
                                            @error('is_featured')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Is Trending</label>
                                            <select name="is_trending" id="is_trending"
                                                class="form-control @error('is_trending') is-invalid @enderror">
                                                <option value="">Select Option</option>
                                                @foreach ($boolOptions as $key => $option)
                                                    <option value="{{ $key }}"
                                                        {{ $property->is_trending == $option ? 'selected' : '' }}>
                                                        {{ $option }}</option>
                                                @endforeach
                                            </select>
                                            @error('is_trending')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


                </div>

                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card bg-dark text-white">
                            <div class="card-header">
                                <h4 class="card-title">Edit Property Address</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Street Address</label>
                                            <input type="text" name="street_address" required
                                                value="{{ $property->address->street_address }}"
                                                class="form-control @error('street_address') is-invalid @enderror">
                                            @error('street_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" name="state" required
                                                value="{{ $property->address->state }}"
                                                class="form-control @error('state') is-invalid @enderror">
                                            @error('state')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Area</label>
                                            <input type="text" name="area" required
                                                value="{{ $property->address->area }}"
                                                class="form-control @error('area') is-invalid @enderror">
                                            @error('area')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" name="city" required
                                                value="{{ $property->address->city }}"
                                                class="form-control @error('city') is-invalid @enderror">
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>ZIP</label>
                                            <input type="text" name="zip" required
                                                value="{{ $property->address->zip }}"
                                                class="form-control @error('zip') is-invalid @enderror">
                                            @error('zip')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" name="country" required
                                                value="{{ $property->address->country }}"
                                                class="form-control @error('country') is-invalid @enderror">
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card bg-dark text-white">
                            <div class="card-header">
                                <h4 class="card-title">Enter Property Amenities</h4>
                            </div>
                            <div class="card-body" id="specification-container">
                                @foreach ($property->specifications as $index => $specification)
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 specification ">
                                        <div class="form-group">
                                            <label>Features</label>
                                            <input type="text" name="feature[]" value="{{ $specification->feature }}"
                                                class="form-control @error('feature' . $index) is-invalid @enderror">
                                            @error('feature' . $index)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach

                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-dark " type="button" id="add-specification">Add Another
                                        Specification</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-12">
                    <button class="btn btn-success">Save</button>
                </div>

            </form>


        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Counter to keep track of the number of specifications added
            let specificationCount = 1;

            // Handle click event for "Add Another Specification" button
            $('#add-specification').click(function() {
                // Clone the specification container and its contents
                const newSpecification = $('#specification-container .specification').first().clone();

                // Clear input values in the cloned specification
                newSpecification.find('input[type="text"]').val('');

                // Update the name attributes for each input field in the cloned specification
                newSpecification.find('input[name="name[]"]').attr('name', 'name[' + specificationCount +
                    ']');

                // Append the cloned specification to the container
                $('#specification-container').append(newSpecification);

                // Increment the specification count
                specificationCount++;
            });
        });
    </script>
@endsection
