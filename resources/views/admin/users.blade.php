@extends('layouts.layout02')

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
                <div class="card-header">{{ __('List of Users') }}</div>
                <div class="card-body">
                    
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>User Type</th>
                                    <th>Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td><p>{{$user->name}}</p></td>
                                    <td><p>{{$user->email}}</p></td>
                                    <td><p>{{$user->phone_number}}</p></td>
                                    <td>
                                        <select name="type_change" id="uType" onchange="userTypeChange(this)">
                                            <option selected disabled>{{$user->user_type}}</option>
                                            <option value="{{$user->id}}-admin">Admin</option>
                                            <option value="{{$user->id}}-rider">Rider</option>
                                            <option value="{{$user->id}}-merchant">Merchant</option>
                                        </select>
                                    </td>
                                    <!-- <td><p>{{$user->account_active}}</p></td> -->
                                    <td>
                                        @if($user->account_active)
                                            <p>Yes</p>
                                        @else
                                            <p>No</p>
                                        @endif
                                    </td>
                                </tr>                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <x-alert>
                        <h3>Create message:</h3>
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
function userTypeChange(selectObject){
    
    var value = selectObject.value.split("-");
    var userID = value[0];
    var typesID = value[1];
    alert("userID:"+userID+"| type:"+typesID);
    // /*
    $.ajax({
        url: "/updateUserType",
        type: "POST",
        data: {
            _token: $("#csrf").val(),
            user_id: userID,
            type_id: typesID
        },
        // cache: false,
        success: function(dataResult){
            if(response.success){
                  alert(response.message) //Message come from controller
              }else{
                  alert("Error")
              }
        }
    });
    // */
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