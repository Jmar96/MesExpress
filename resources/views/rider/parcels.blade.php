@extends('layouts.layout03')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Parcels</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Parcel</th>
                        <th>Ref_Number</th>
                        <th>Consignee</th>
                        <th>Address</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($parcels as $parcel) 
                    <tr>
                        <td><p>{{$parcel->item_name}}</p></td>
                        <td><p>{{$parcel->item_reference_number}}</p></td>
                        <td><p>{{$parcel->item_consignee_fullname}}</p></td>
                        <td><p>{{$parcel->item_consignee_address}}</p></td>
                        <td><p>&#x20B1; {{$parcel->item_total_payment}}</p></td>
                        <td>
                            @if($parcel->item_status =='Delivered')         
                                {{$parcel->item_status}} 
                            @else
                                {{$parcel->item_status}} | <a href="{{'/rider/'.$parcel->id.'/edit'}}" class="jlink01" title="View Status">UPDATE</a>
                            @endif
                        </td>
                    </tr>             
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>


@endsection