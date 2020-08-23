@extends('layouts.layout02')

@section('content')

  <!-- Ionicons -->

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    DASHBOARD
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
                        <h3 class="card-title">Todays Counts</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>Merchant</th>
                                <th>New Parcel</th>
                                <th>Pending</th>
                                <th>Success</th>
                                <th>Failed</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>NULL</td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                </tr>
                                <tr>
                                    <td>NULL</td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                </tr>
                                <tr>
                                    <td>NULL</td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                </tr>
                                <tr>
                                    <td>NULL</td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                </tr>
                                <tr>
                                    <td>NULL</td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                </tr>
                                <tr>
                                    <td>NULL</td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                    <td><span class="badge bg-danger">00</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>  
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection