@extends('layouts.app')

@section('content')

  <!-- Ionicons -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @foreach($user as $user)
                        <h5>Welcome merchant {{$user->name}}!</h5>
                    @endforeach
                </div>
                <div class="card-body">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                            <div class="inner">
                                <h3>000</h3>

                                <p>Pending</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                            <div class="inner">
                                <h3>000</h3>

                                <p>Complete</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>000</h3>

                                <p>Re-schedule</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>000</h3>

                                <p>Cancelled</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    <!-- ./col -->
                    </div>
                    <div class="row">
                    <br>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3 col-3">
                                <h5>Go to</h5>
                            </div>
                            <div class="col-md-9 col-9">
                                <a href="/mprofile" class="btn btn-warning">Profile</a>
                                <a href="/merchant/create" class="btn btn-primary">New Parcel</a>
                                <a href="/merchant_parcels" class="btn btn-primary">Track Parcels</a>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
