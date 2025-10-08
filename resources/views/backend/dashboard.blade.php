@extends('layouts.BackEnd')

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        @foreach($Systems as $index => $System)
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">{{$System->name}}</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>145</h6>
                                <span class="text-success small pt-1 fw-bold">12%</span> 
                                <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            @if(($index + 1) % 2 == 0)
                </div><div class="row"> <!-- Close current row and start a new row after 3 cards -->
            @endif
        @endforeach
    </div>
</section>

@endsection