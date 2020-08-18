@extends('layouts.app')

@section('content')

<style>

/* Table Styles */

.table-wrapper{
    /* margin: 10px 70px 70px; */
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td{
    text-align: center;
    padding: 2px;
}
.fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 13px;
}

.fl-table thead th {
    color: #ffffff;
    background: #268267;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
.jlink01{
    font-weight: bold;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('PARCEL TRACKER') }}</div>
                <div class="card-body">
                    <a href="/merchant" class="btn btn-primary">Home</a>
                    <a href="/merchant/create" class="btn btn-primary">Add Parcel</a>
                    <a href="/merchant_parcels" class="btn btn-primary">Reload</a>
                    <hr>
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Parcel</th>
                                    <th>Ref_Number</th>
                                    <th>Price</th>
                                    <th>Deduction</th>
                                    <th>COD (&#x20B1;)</th>
                                    <th>Status</th>
                                    <th>Consignee Notes</th>
                                    <!-- <th>Cancelled?</th>
                                    <th>Completed?</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parcels as $parcel)
                                <tr>
                                    <td>
                                        <a href="{{'/merchantparcel/'.$parcel->id.'/details'}}" class="jlink01" title="View details">Details</a>
                                    </td>
                                    <td><p>{{$parcel->item_name}}</p></td>
                                    <td><p>{{$parcel->item_reference_number}}</p></td>
                                    <td><p>&#x20B1; {{$parcel->item_price}}</p></td>
                                    <td><p>&#x20B1; {{number_format($parcel->item_price * 0.01)}}</p></td>
                                    <td><p>&#x20B1; {{$parcel->item_cod_ammount}}</p></td>
                                    <td><p>{{$parcel->item_status}}</p></td>
                                    <td><p>{{$parcel->item_consignee_notes}}</p></td>
                                    <!-- <td><p>{{$parcel->cancelled}}</p></td>
                                    <td><p>{{$parcel->completed}}</p></td> -->
                                </tr>                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <x-alert>
                        <h3>System message:</h3>
                    </x-alert> 
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
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
        cache: false,
        success: function(dataResult){
            if(response.success){
                  alert(response.message) //Message come from controller
              }else{
                  alert("Error")
              }
        }
    });
};
// $("#iStatus").change(function() { 
//     var status =$("#iStatus").val();
//     alert(status);
//     // console.log(status + " " + id);
//     // $.ajax({
//     //     type: "GET",
//     //     url: "update/"+ id + "status/" + status,
//     //     success: function(data){
//     //     console.log(data);
//     //     $("#update").val(data);
//     //     },
//     // });
// });
</script>


@endsection