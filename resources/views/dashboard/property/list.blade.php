@extends('dashboard.layouts.app')

@section('contents')

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

        <div class="row">
           
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Properties</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                @include('notifications.flash-messages')
                                <thead>
                                    <tr>
                                        <th class="width80"><strong>#</strong></th>
                                        <th class="width80"><strong>UUID</strong></th>
                                        <th><strong>CATEGORY</strong></th>
                                        <th><strong>CREATED BY</strong></th>
                                        <th><strong>ADDRESS LOCATED</strong></th>
                                        <th><strong>NAME</strong></th>
                                        <th><strong>IMAGE</strong></th>
                                        <th><strong>PRICE</strong></th>
                                        <th><strong>DESCRIPTION</strong></th>
                                        <th><strong>TYPE</strong></th>
                                        <th><strong>SIZE</strong></th>
                                        <th><strong>YEAR BUILT</strong></th>
                                        <th><strong>BATHROOMS</strong></th>
                                        <th><strong>BEDROOMS</strong></th>
                                        <th><strong>GARAGE</strong></th>
                                        <th><strong>GARAGE SIZE</strong></th>
                                        <th><strong>FLOOR PLAN</strong></th>
                                        <th><strong>STOCK STATUS</strong></th>
                                        <th><strong>STATUS</strong></th>
                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($properties as $property)
                                      @php
                                         $status_color = '';
                                          if( $property->status == 'Active'){
                                            $status_color  = 'badge light badge-success';
                                          }
                                          if( $property->status == 'Inactive'){
                                            $status_color  = 'badge light badge-danger';
                                          }
                                      @endphp
                                    <tr>
                                        <td><strong>{{$property->id}}</strong></td>
                                        <td><strong>{{$property->uuid ?? 'N/A'}}</strong></td>
                                        <td class="text-ov">{{$property->category->name}}</td>
                                        <td class="text-ov">{{$property->user->full_name}}</td>
                                        <td class="text-ov">{{$property->address->street_address}}</td>
                                        <td class="text-ov">{{$property->name}}</td>
                                        <td class="text-ov"><img class="img-fluid" src="{{ asset('storage/property/images/' . (json_decode($property->images)[0] ?? '')) }}" alt=""></td></td>
                                        <td>${{$property->price}}</td>
                                        <td>{{ Str::limit($property->description, 50)}}</td>
                                        <td>{{$property->type}}</td>
                                        <td>{{$property->garage_size}}</td>
                                        <td class="text-ov">{{$property->year_built}}</td>
                                        <td>{{$property->bathrooms}}</td>
                                        <td>{{$property->bedrooms}}</td>
                                        <td>{{$property->garage}}</td>
                                         <td class="text-ov">{{$property->garage_size}}</td>
                                         <td>{{$property->floor_plan_description}}</td>
                                         <td>{{$property->stock_status}}</td>
                                        <td><span class="{{$status_color}}">{{$property->status}}</span></td>
                                       
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-success light sharp"
                                                    data-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                        version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <circle fill="#000000" cx="5" cy="12" r="2" />
                                                            <circle fill="#000000" cx="12" cy="12" r="2" />
                                                            <circle fill="#000000" cx="19" cy="12" r="2" />
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('dashboard.property.edit', $property->id)}}">Edit</a>
                                                    <a class="dropdown-item" href="{{route('property.details', $property->id)}}">View</a>
                                                    <form action="{{route('dashboard.property.destroy', $property->id)}}" id="delete-product-form" method="post">
                                                        @csrf @method('DELETE')
                                                        <a style="cursor: pointer" class="dropdown-item" onclick="confirmDelete()">Delete</a>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
    function confirmDelete() {
        if (confirm("Are you sure you want to delete this property?")) {
            document.getElementById('delete-product-form').submit();
        }
    }
  
</script>
@endsection