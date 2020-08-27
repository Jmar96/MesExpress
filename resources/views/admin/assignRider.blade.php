@extends('layouts.layout02')

@section('content')

  <!-- Ionicons -->
<style type="text/css">
.subject-info-box-1,
.subject-info-box-2 {
    float: left;
    width: 45%;
    select {
        height: 200px;
        padding: 0;
        option
        {
            padding: 4px 10px 4px 10px;
        }
        option:hover {
            background: #EEEEEE;
        }
    }
}

.subject-info-arrows {
    /* border: 1px solid black; */
    float: left;
    width: 10%;
    input {
        width: 70%;
        margin-bottom: 5px;
    }
}

select.form-control[multiple], select.form-control[size] {
    height: 400px;
}
</style>
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
                        <div class="box-body col-lg-12">
                            <div id="aViewHolder" class="box-body col-lg-12">
                                <div class="subject-info-box-1">
                                <label>List of parcels</label>
                                    <select multiple="multiple" id='lstBox1' class="form-control slctBOX01">
                                    @foreach($ddparcels as $ddparcel)
                                        <option value="{{$ddparcel->id}}">{{$ddparcel->item_name.'- by '.$ddparcel->item_merchant_id}}</option>
                                    @endforeach()
                                    </select>
                                </div>
                                <div class="subject-info-arrows text-center">
                                    <br /><br /><br /><br />
                                    <input type="button" id="btnAllRight" value=">>" class="btn btn-default" /><br /><br />
                                    <input type="button" id="btnRight" value=">" class="btn btn-default" /><br />
                                    <input type="button" id="btnLeft" value="<" class="btn btn-default" /><br /><br />
                                    <input type="button" id="btnAllLeft" value="<<" class="btn btn-default" /><br /><br />
                                    <!-- <input type="button" id="btnRemove" value="X" class="btn btn-warning" title="Please move to Redundant List first to remove!"/> -->
                                </div>
                                <div class="subject-info-box-2">
                                <label>Choose Rider : </label>
                                    <select name="item_rider" id="iRider" style="width: 100px">
                                        @foreach($ddpriders as $ddprider)
                                            <option value="{{$ddprider->id}}">{{$ddprider->name}}</option>
                                        @endforeach()
                                    </select>
                                    <!--  -->
                                    <select multiple="multiple" id='lstBox2' class="form-control slctBOX01"></select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
//}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
(function () {

var sriderID = $( "#iRider option:selected" ).val();;
var nsriderID = 0;

    $('#btnRight').click(function (e) {
        var selectedOpts = $('#lstBox1 option:selected');
        var rSOval = [];
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }
        //
        $.each($("#lstBox1 option:selected"), function () {
            rSOval.push($(this).attr("value"));
        });
        var vrSoval = rSOval;
        alert(rSOval +sriderID);
        //
        $('#lstBox2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();

        $.ajax({
            url: "/UpdateRider",
            type: "POST",
            data: {
                _token: $("#csrf").val(),
                parcel_id: rSOval,
                rider_id: sriderID
            },
            cache: false 
        });
    });
    $('#btnAllRight').click(function (e) {
        var selectedOpts = $('#lstBox1 option');
        var rSOval = [];
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }
        //
        $.each($("#lstBox1 option"), function () {
            rSOval.push($(this).attr("value"));
        });
        var vrSoval = "'" + rSOval.join("', '") + "'";
        alert("'" + rSOval.join("', '") + "'"+sriderID);
        //
        $('#lstBox2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
        
        $.ajax({
            url: "/UpdateRider",
            type: "POST",
            data: {
                _token: $("#csrf").val(),
                parcel_id: rSOval,
                rider_id: sriderID
            },
            cache: false 
        });
    });
    $('#btnLeft').click(function (e) {
        var selectedOpts = $('#lstBox2 option:selected');
        var lSOval = [];
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }
        //
        $.each($("#lstBox2 option:selected"), function () {
            lSOval.push($(this).attr("value"));
        });
        alert("'" + lSOval.join("', '") + "'"+nsriderID);
        var vlSOval = "'" + lSOval.join("', '") + "'";
        //
        $('#lstBox1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();

        $.ajax({
            url: "/RemoveRider",
            type: "POST",
            data: {
                _token: $("#csrf").val(),
                parcel_id: rSOval,
                rider_id: nsriderID
            },
            cache: false 
        });
    });
    $('#btnAllLeft').click(function (e) {
        var selectedOpts = $('#lstBox2 option');
        var lSOval = [];
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }
        //
        $.each($("#lstBox2 option"), function () {
            lSOval.push($(this).attr("value"));
        });
        alert("'" + lSOval.join("', '") + "'"+nsriderID);
        var vlSOval = "'" + lSOval.join("', '") + "'";
        //
        //alert(vlSOval);
        $('#lstBox1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();

        $.ajax({
            url: "/RemoveRider",
            type: "POST",
            data: {
                _token: $("#csrf").val(),
                parcel_id: rSOval,
                rider_id: nsriderID
            },
            cache: false 
        });
    });
    $('#btnRemove').click(function (e) {
        var selectedOpts = $('#lstBox1 option:selected');
        var rSOval = [];
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }
        //
        $.each($("#lstBox1 option:selected"), function () {
            rSOval.push($(this).attr("value"));
        });
        var vrSoval = "'" + rSOval.join("', '") + "'";
        alert("'" + rSOval.join("', '") + "'"+nsriderID);
        
        //$('#lstBox2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
        
        $.post('/WMG/updatePRNull/', {'val01': vrSoval }, function () {
            //alert(vrSoval);
        });
    });
}(jQuery));
//}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
</script>
@endsection