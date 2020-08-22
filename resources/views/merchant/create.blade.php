@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ADD PARCEL') }}</div>
                <div class="card-body">
                    <a href="/merchant_parcels" class="btn btn-primary">Go back...</a>
                    <x-alert>
                    <hr>
                        <h3>System message:</h3>
                    </x-alert> 
                    <hr>
                    <form action="/merchant/create" method="post">
                        @csrf
                        <h4>Parcel information</h4>
                        <div class="form-group row">
                            <label for="item_name" class="col-md-4 col-form-label text-md-right">Parcel Name:</label>

                            <div class="col-md-6">
                                <input id="item_name" type="text" class="form-control" name="item_name" placeholder="Name" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_reference_number" class="col-md-4 col-form-label text-md-right">Parcel Reference Number (#):</label>

                            <div class="col-md-6">
                                <input id="item_reference_number" type="text" class="form-control" name="item_reference_number" value="{{ $rand }}" placeholder="Reference Number" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_price" class="col-md-4 col-form-label text-md-right">Package Value (&#x20B1;):</label>

                            <div class="col-md-6">
                                <input id="item_price" type="number" step="0.01" class="form-control" name="item_price" placeholder="Pesos" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_weight" class="col-md-4 col-form-label text-md-right">Weight (Kg):</label>

                            <div class="col-md-6">
                                <input id="item_weight" type="number" step="0.01" class="form-control" name="item_weight" value="0.00" placeholder="Kg" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_shipping_type" class="col-md-4 col-form-label text-md-right">Shipping Fee:</label>

                            <div class="col-md-6">
                                <select name="item_shipping_type" id="item_ShpTyp" class="form-control" >
                                <option value="CP-Consignee payment" selected>Consignee payment</option>
                                <option value="MP-Merchant payment" >Merchant payment</option>
                                <option value="CODD-COD deduction" >COD deduction</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_payment_method" class="col-md-4 col-form-label text-md-right">Payment Method:</label>

                            <div class="col-md-6">
                                <select name="item_payment_method" id="item_PayMethd" class="form-control" onchange="showCODAmmountBox(this)">
                                    <option value="COD-Cash on Deliver" selected>Cash on Deliver</option>
                                    <option value="NCOD-Non-Cash on Deliver" >Non-Cash on Deliver</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="codammount">
                            <label for="item_cod_ammount" class="col-md-4 col-form-label text-md-right">COD Ammount (&#x20B1;):</label>

                            <div class="col-md-6">
                                <input id="item_cod_ammount" type="number" step="0.01" class="form-control" value="0" name="item_cod_ammount" placeholder="Pesos" >
                            </div>
                        </div>
                        <h4>Total</h4>
                        <div class="form-group row">
                            <label for="item_valuation_fee" class="col-md-4 col-form-label text-md-right">Valuation Fee (&#x20B1;):</label>

                            <div class="col-md-6">
                                <input id="item_valuation_fee" type="number" step="0.01" class="form-control" name="item_valuation_fee" placeholder="Pesos" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_total_payment" class="col-md-4 col-form-label text-md-right">Total Payment (&#x20B1;):</label>

                            <div class="col-md-6">
                                <input id="item_total_payment" type="number" step="0.01" class="form-control" name="item_total_payment" placeholder="Pesos" readonly>
                            </div>
                        </div>
                        <hr>
                        <h4>Consignee information</h4>
                        <div class="form-group row">
                            <label for="item_consignee_fullname" class="col-md-4 col-form-label text-md-right">Consignee Fullname:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_fullname" type="text" class="form-control" name="item_consignee_fullname" placeholder="Consignee Fullname" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_consignee_contactno" class="col-md-4 col-form-label text-md-right">Contact number:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_contactno" type="number" step="0.01" class="form-control" name="item_consignee_contactno" placeholder="09XXXXXXXXXX" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_consignee_address" class="col-md-4 col-form-label text-md-right">Address:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_address" type="text" class="form-control" name="item_consignee_address" placeholder="Consignee Address" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_consignee_notes" class="col-md-4 col-form-label text-md-right">Notes:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_notes" type="text" class="form-control" name="item_consignee_notes" placeholder="Consignee Notes" required >
                            </div>
                        </div>
                        <hr>
                        <h4>Senders information</h4>
                        <div class="form-group row">
                            <label for="item_sender_fullname" class="col-md-4 col-form-label text-md-right">Senders Fullname:</label>

                            <div class="col-md-6">
                                <input id="item_sender_fullname" type="text" class="form-control" name="item_sender_fullname" placeholder="Senders Fullname" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_sender_contactno" class="col-md-4 col-form-label text-md-right">Contact number:</label>

                            <div class="col-md-6">
                                <input id="item_sender_contactno" type="number" step="0.01" class="form-control" name="item_sender_contactno" placeholder="09XXXXXXXXXX" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_sender_address" class="col-md-4 col-form-label text-md-right">Address:</label>

                            <div class="col-md-6">
                                <input id="item_sender_address" type="text" class="form-control" name="item_sender_address" placeholder="Senders Address" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_sender_notes" class="col-md-4 col-form-label text-md-right">Notes:</label>

                            <div class="col-md-6">
                                <input id="item_sender_notes" type="text" class="form-control" name="item_sender_notes" placeholder="Sender Notes" required >
                            </div>
                        </div>
                        <br>
                        <input type="text" name="item_merchant_id" placeholder="Pesos" value="{{Auth::id()}}" hidden readonly/>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit"  class="btn btn-primary" value="Create"/>
                                <a href="/merchant/" class="btn btn-warning">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
function showCODAmmountBox(selectObject){
    
    var value = selectObject.value.split("-");
    var codID = value[0];
    var codDesc = value[1];
    // alert("id:"+codID+"| Description:"+codDesc);

    if ($("#item_price").val().length == 0) {
        // alert("Package value required!");
        $('#item_price').css({backgroundColor:'#ff9999'});
    }
    
    if(codID === "NCOD"){
        $("#codammount").hide();
    }else{
        $("#codammount").show();
    }

    var packagevalue = $("#item_price").val();
    var codammount = $("#item_cod_ammount").val();
    
    var valuationfee = packagevalue * 0.01;
    $("#item_valuation_fee").val(valuationfee);
    
    // alert(packagevalue +","+codammount+","+valuationfee);
    var totalpayment = valuationfee + codammount + packagevalue;
    $("#item_total_payment").val(totalpayment);


};
</script>

@endsection