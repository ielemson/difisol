@extends('layouts.main') 
@section('title', 'Competition List')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
 


    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Data Table')}}</h5>
                            <span>{{ __('lorem ipsum dolor sit amet, consectetur adipisicing elit')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Tables</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Competiiton List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Data Table')}}</h3></div>
                    <div class="card-body">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>
                                    <th class="nosort">{{ __('Avatar')}}</th>
                                    <th>{{ __('Name')}}</th>
                                    <th>{{ __('Email')}}</th>
                                    <th>{{ __('Location')}}</th>
                                    <th class="nosort">{{ __('How you heard about us')}}</th>
                                    <th class="nosort">{{ __('Checkout Status')}}</th>
                                    <th class="nosort">{{ __('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($competitors as $competitor )
                                @php
                                $i++;
                                @endphp
                                     <tr>
                                    <td>{{ __($i)}}</td>
                                    <td><b class="fa fa-user"></b></td>
                                    <td>{{ __($competitor->name)}}</td>
                                    <td>{{ __($competitor->email)}}</td>
                                    <td>{{ __($competitor->location)}}</td>
                                    <td>{{ __($competitor->compinfo)}}</td>
                                    @if ($competitor->checkout_complete == 1)
                                    <td class="badge badge-primary mb-1 mt-1">{{ __('Checkout Complete')}}</td>
                                    @else
                                    <td class="badge badge-danger mb-1 mt-1">{{ __('Incomplete Checkout')}}</td>
                                    @endif
                                    
                                    <td>
                                        <div class="table-actions">
                                            <a href="#"><i class="ik ik-eye"></i></a>
                                            <a href="#"><i class="ik ik-edit-2"></i></a>
                                            <a href="#"><i class="ik ik-trash-2"></i></a>
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
               

    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
    @endpush
@endsection
      
