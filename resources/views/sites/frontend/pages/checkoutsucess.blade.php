@extends('layouts.front')


@section('content')
@section('title', 'Cancel Order')
@include('frontend.include.innerBanner', ['banner_title' => 'Cancel Order'])

<div class="coming-soon-area ptb-100">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container-fluid">
                <div class="coming-soon-content">
                    <h1>Oops!</h1>
                    <p>
                      Your order has been confirm with order ID : 1@334455 
                    </p>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection
