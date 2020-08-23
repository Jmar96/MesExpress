@extends('layouts.layout01')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Parcel Details') }}</div>
                <div class="card-body">
                    <x-alert>
                    <hr>
                        <h3>System message:</h3>
                    </x-alert> 
                    <hr>
                    @method('patch')
                    <h4>Parcel information</h4>
                        <div class="form-group row">
                            <label for="item_name" class="col-md-4 col-form-label text-md-right">Parcel Name:</label>

                            <div class="col-md-6">
                                <input id="item_name" type="text" class="form-control" name="item_name" placeholder="Name"  value="{{$parcel->item_name}}" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_reference_number" class="col-md-4 col-form-label text-md-right">Parcel Reference Number:</label>

                            <div class="col-md-6">
                                <input id="item_reference_number" type="text" class="form-control" name="item_reference_number" placeholder="Reference Number" value="{{$parcel->item_reference_number}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_price" class="col-md-4 col-form-label text-md-right">Price Value (&#x20B1;):</label>

                            <div class="col-md-6">
                                <input id="item_price" type="number" step="0.01" class="form-control" name="item_price" placeholder="Pesos" value="{{$parcel->item_price}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_weight" class="col-md-4 col-form-label text-md-right">Weight (Kg):</label>

                            <div class="col-md-6">
                                <input id="item_weight" type="number" step="0.01" class="form-control" name="item_weight" placeholder="Kg" value="{{$parcel->item_weight}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_payment_method" class="col-md-4 col-form-label text-md-right">Payment Method:</label>

                            <div class="col-md-6">
                                <input id="item_payment_method" type="text" step="0.01" class="form-control" name="item_payment_method" placeholder="Kg" value="{{$parcel->item_payment_method}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_cod_ammount" class="col-md-4 col-form-label text-md-right">COD Ammount (&#x20B1;):</label>

                            <div class="col-md-6">
                                <input id="item_cod_ammount" type="number" step="0.01" class="form-control" name="item_cod_ammount" value="{{$parcel->item_cod_ammount}}" placeholder="Pesos" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_shipping_type" class="col-md-4 col-form-label text-md-right">Shipping Type:</label>

                            <div class="col-md-6">
                                <input id="item_shipping_type" type="text" step="0.01" class="form-control" name="item_shipping_type" placeholder="Kg" value="{{$parcel->item_shipping_type}}" disabled>
                            </div>
                        </div>
                        <hr>
                        <h4>Consignee information</h4>
                        <div class="form-group row">
                            <label for="item_consignee_fullname" class="col-md-4 col-form-label text-md-right">Consignee Fullname:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_fullname" type="text" class="form-control" name="item_consignee_fullname" placeholder="Consignee Fullname"  value="{{$parcel->item_consignee_fullname}}" disabled >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_consignee_contactno" class="col-md-4 col-form-label text-md-right">Contact number:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_contactno" type="number" step="0.01" class="form-control" name="item_consignee_contactno" placeholder="09XXXXXXXXXX"  value="{{$parcel->item_consignee_contactno}}" disabled >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_consignee_address" class="col-md-4 col-form-label text-md-right">Address:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_address" type="text" class="form-control" name="item_consignee_address" placeholder="Address" value="{{$parcel->item_consignee_address}}" disabled >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_consignee_notes" class="col-md-4 col-form-label text-md-right">Notes:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_notes" type="text" class="form-control" name="item_consignee_notes" placeholder="Notes"  value="{{$parcel->item_consignee_notes}}" disabled >
                            </div>
                        </div>
                    
                        <h4>Senders information</h4>
                        <div class="form-group row">
                            <label for="item_sender_fullname" class="col-md-4 col-form-label text-md-right">Senders Fullname:</label>

                            <div class="col-md-6">
                                <input id="item_sender_fullname" type="text" class="form-control" name="item_sender_fullname" value="{{$parcel->item_sender_fullname}}" placeholder="Senders Fullname" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_sender_contactno" class="col-md-4 col-form-label text-md-right">Contact number:</label>

                            <div class="col-md-6">
                                <input id="item_sender_contactno" type="number" step="0.01" class="form-control" name="item_sender_contactno" value="{{$parcel->item_sender_contactno}}" placeholder="09XXXXXXXXXX" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_sender_address" class="col-md-4 col-form-label text-md-right">Address:</label>

                            <div class="col-md-6">
                                <input id="item_sender_address" type="text" class="form-control" name="item_sender_address" value="{{$parcel->item_sender_address}}" placeholder="Senders Address" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_sender_notes" class="col-md-4 col-form-label text-md-right">Notes:</label>

                            <div class="col-md-6">
                                <input id="item_sender_notes" type="text" class="form-control" name="item_sender_notes" value="{{$parcel->item_sender_notes}}" placeholder="Sender Notes" readonly>
                            </div>
                        </div>
                        <hr>
                        <h4>Total Deductions</h4>
                        <div class="form-group row">
                            <label for="item_price_deduction" class="col-md-4 col-form-label text-md-right">Total (&#x20B1;):</label>

                            <div class="col-md-6">
                                <input id="item_price_deduction" type="text" class="form-control" name="item_price_deduction" placeholder="Pesos" value="{{number_format($parcel->item_price * 0.01)}}" disabled>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- {{$parcel->item_name}} -->


@endsection