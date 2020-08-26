@extends('layouts.layout02')

@section('content')

  <!-- Ionicons -->

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Assigning Riders</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label>Parcels</label>
                        <select class="duallistbox" id="asparcels" onchange="alert(this)" multiple="multiple">
                            @foreach($ddparcels as $ddparcel)
                                <option value="{{$ddparcel->id.'-'.$ddparcel->item_name}}">{{$ddparcel->item_name.'- by '.$ddparcel->item_merchant_id}}</option>
                            @endforeach()
                        </select>
                        <label>Rider</label>
                        <select name="item_rider" id="iRider" onchange="parcelRider(this)">
                                @foreach($ddpriders as $ddprider)
                                    <option value="{{$ddprider->name.'-'.$ddprider->id}}">{{$ddprider->name}}</option>
                                @endforeach()
                            </select>
                        </div>
                        <input type="button" value="Save" />
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection