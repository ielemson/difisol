@extends('layouts.front')


@section('content')
@section('title', 'Coming Soon')
@include('frontend.include.innerBanner', ['banner_title' => 'Coming Soon'])


<div class="coming-soon-area ptb-100">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container-fluid">
                <div class="coming-soon-content">
                    <h1>Coming Soon</h1>
                    <p>
                        The page you are looking for is currently under construction
                        Please bear with us while our team is working on the page.
                    </p>
                  </div>
            </div>
        </div>
    </div>
</div>


@endsection
