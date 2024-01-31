@extends('layouts.main') 
@section('title', 'Our Services')
@section('content')
    <!-- push external head elements to head -->
  

    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __(' Service List ')}}</h5>
                            <span>{{ __('Our Services')}}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Add Service')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
          
        </div>
        <div class="row">
            <div class="col-md-12">
               
                <h5 class="mb-4">{{ __('Service Card')}}</h5>
                <div class="row">
                   @if (count($services) > 0)
                       @foreach ($services as $service)
                       <div class="col-xs-6 col-lg-3 col-12">
                        <div class="card">
                            <div class="position-relative">
                                <img class="card-img-top" src="{{asset('assets/images/services')}}/{{$service->image}}" alt="Card image cap">
                                @if ($service->status == 1)
                                <span
                                    class="badge badge-pill badge-success position-absolute badge-top-left">{{ __('Active') }}
                                </span>
                            @else
                                <span
                                    class="badge badge-pill badge-warning position-absolute badge-top-left">{{ __('Unpublished') }}</span>
                            @endif
                            </div>
                            <div class="card-body">
                                <p class="list-item-heading mb-4">{{$service->header}}</p>
                                <footer>
                                    <p class="text-muted text-small mb-0 font-weight-light">{{ \Carbon\Carbon::parse($service->created_at)->diffForHumans() }}</p>
                                    <a href="{{ route('service.edit', $service->id) }}">
                                        <i
                                        class="ik ik-edit-2 fa-2x text-info"></i></a>
                                <a href="#" class="list-delete text-danger fa-2x" data-id="{{ $service->id }}"><i class="ik ik-trash-2"></i></a>
                                </footer>
                            </div>
                        </div>
                    </div>
                       @endforeach
                   @endif
                   
                </div>

            </div>
        </div>
    </div>
  
@endsection
