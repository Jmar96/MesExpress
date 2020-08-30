@extends('layouts.layout02')

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
                        <th>Consignee</th>
                        <th>Valuation Fee</th>
                        <th>COD Fee (&#x20B1;)</th>
                        <th>Total</th>
                        <th>Rider</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($parcels as $parcel) 
                    <tr>
                        <td><p>{{$parcel->item_name}}</p></td>
                        <td><p>{{$parcel->item_consignee_fullname}}</p></td>
                        <td><p>&#x20B1; {{$parcel->item_valuation_fee}}</p></td>
                        <td><p>&#x20B1; {{$parcel->item_cod_ammount}}</p></td>
                        <td><p>&#x20B1; {{$parcel->item_total_payment}}</p></td>
                        <td>
                            <select name="item_rider" id="iRider" onchange="parcelRider(this)">
                                <option value="" selected disabled>{{$parcel->ridername}}</option>
                                <option value="{{$parcel->id.'-0-0'}}" >#NA</option>
                                @foreach($ddpriders as $ddprider)
                                    <option value="{{$parcel->id.'-'.$ddprider->name.'-'.$ddprider->id}}">{{$ddprider->name}}</option>
                                @endforeach()
                            </select>
                        </td>
                        <td>
                            <select name="item_status" id="iStatus" onchange="parcelHistory(this)">
                                <option value="" selected disabled>{{$parcel->item_status}}</option>
                                @foreach($ddpstatus as $dpstatus)
                                    <option value="{{$parcel->id.'-'.$dpstatus->id.'-'.$parcel->item_merchant_id}}">{{$dpstatus->item_status}}</option>
                                @endforeach()
                            </select>
                        </td>
                        <td>
                            <a href="{{'/parceltracker/'.$parcel->id.'/edit'}}" class="jlink01" title="EDIT">Details</a>|
                            <a href="{{'/parceltracker/showHist/'.$parcel->id}}" class="jlink01" title="SHOW HISTORY">History</a>|
                            <a href="{{'/parceltracker/'.$parcel->id.'/print01'}}" class="jlink01" title="PRINT">Print</a>
                        </td>
                        <!-- <td>
                            @if($parcel->cancelled)
                                <span onclick="event.preventDefault();document.getElementById('form-ncancelled-{{$parcel->id}}').submit()" class="fas fa-check text-green-300 px-2"></span>
                                <form style="display:none" id="{{'form-ncancelled-'.$parcel->id}}" method="post" action="{{route('parceltracker.ncancelled',$parcel->id)}}">
                                    @csrf
                                    @method('put')
                                </form>
                            @else
                                <span onclick="event.preventDefault();document.getElementById('form-ycancelled-{{$parcel->id}}').submit()" class="fas fa-times text-green-300 px-2"></span>
                                <form style="display:none" id="{{'form-ycancelled-'.$parcel->id}}" method="post" action="{{route('parceltracker.ycancelled',$parcel->id)}}">
                                    @csrf
                                    @method('put')
                                </form>
                            @endif
                        </td> -->
                        <!-- <td>
                            @if($parcel->completed)
                                <span onclick="event.preventDefault();document.getElementById('form-ncompleted-{{$parcel->id}}').submit()" class="fas fa-check text-green-300 px-2"></span>
                                <form style="display:none" id="{{'form-ncompleted-'.$parcel->id}}" method="post" action="{{route('parceltracker.ncompleted',$parcel->id)}}">
                                    @csrf
                                    @method('put')
                                </form>
                            @else
                                <span onclick="event.preventDefault();document.getElementById('form-ycompleted-{{$parcel->id}}').submit()" class="fas fa-times text-gray-300 cursor-pointer px-2"></span>
                                <form style="display:none" id="{{'form-ycompleted-'.$parcel->id}}" method="post" action="{{route('parceltracker.ycompleted',$parcel->id)}}">
                                    @csrf
                                    @method('put')
                                </form>
                            @endif
                        </td> -->
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
    function parcelHistory(selectObject){
        
        var value = selectObject.value.split("-");
        var parcelID = value[0];
        var dpstatusID = value[1];
        var merchantID = value[2];
        // alert("parcelID:"+parcelID+"| dpstatusID:"+dpstatusID+"| merchantID:"+merchantID);
        $.ajax({
            url: "/ParcelHistory",
            type: "POST",
            data: {
                _token: $("#csrf").val(),
                parcel_id: parcelID,
                status_id: dpstatusID,
                merchant_id: merchantID
            },
            cache: false // ,
            // success: function(response){
            //     if(response.success){
            //         alert(response.message) //Message come from controller
            //     }else{
            //         alert("Error")
            //     }
            // }
        });
    };
    function parcelRider(selectObject){
        
        var value = selectObject.value.split("-");
        var parcelID = value[0];
        var ridername = value[1];
        var riderID = value[2];
        // alert("parcelID:"+parcelID+"| ridername:"+ridername+"| riderID:"+riderID);
        $.ajax({
            url: "/updateItemRider",
            type: "POST",
            data: {
                _token: $("#csrf").val(),
                parcel_id: parcelID,
                rider_name: ridername,
                rider_id: riderID
            },
            cache: false 
        });
    };
</script>


@endsection