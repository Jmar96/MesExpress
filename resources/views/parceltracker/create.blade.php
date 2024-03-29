@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ADD PARCEL') }}</div>
                <div class="card-body">
                    <a href="/parceltracker/"  class="btn btn-primary">Go back...</a>
                    <x-alert>
                    <hr>
                        <h3>System message:</h3>
                    </x-alert> 
                    <hr>
                    <form action="/parceltracker/create" method="post">
                        @csrf
                        <h4>Parcel information</h4>
                        <div class="form-group row">
                            <label for="item_name" class="col-md-4 col-form-label text-md-right">Parcel Name:</label>

                            <div class="col-md-6">
                                <input id="item_name" type="text" class="form-control" name="item_name" placeholder="Name" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_reference_number" class="col-md-4 col-form-label text-md-right">Parcel Reference Number:</label>

                            <div class="col-md-6">
                                <input id="item_reference_number" type="text" class="form-control" name="item_reference_number" placeholder="Reference Number"  >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_price" class="col-md-4 col-form-label text-md-right">Price Value (&#x20B1;):</label>

                            <div class="col-md-6">
                                <input id="item_price" type="number" step="0.01" class="form-control" name="item_price" placeholder="Pesos" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_weight" class="col-md-4 col-form-label text-md-right">Weight (Kg):</label>

                            <div class="col-md-6">
                                <input id="item_weight" type="number" step="0.01" class="form-control" name="item_weight" placeholder="Kg" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_payment_method" class="col-md-4 col-form-label text-md-right">Payment Method:</label>

                            <div class="col-md-6">
                                <select name="item_payment_method" id="item_PayMethd" class="form-control" >
                                    <option value="COD" selected>Cash on Deliver</option>
                                    <option value="NCOD" >Non-Cash on Deliver</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_shipping_type" class="col-md-4 col-form-label text-md-right">Shipping Type:</label>

                            <div class="col-md-6">
                                <select name="item_shipping_type" id="item_ShpTyp" class="form-control" >
                            <option value="CP" selected>Consignee payment</option>
                            <option value="MP" >Merchant payment</option>
                            <option value="CODD" >COD deduction</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_description" class="col-md-4 col-form-label text-md-right">Description:</label>

                            <div class="col-md-6">
                                <input id="item_description" type="text" class="form-control" name="item_description" placeholder="Item Description"  >
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
                            <label for="item_consignee_bankaccount" class="col-md-4 col-form-label text-md-right">Consignee Bank Account:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_bankaccount" type="text" class="form-control" name="item_consignee_bankaccount" placeholder="XXXXXXXXXXXXXXXX"  >
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
                                <input id="item_consignee_address" type="text" class="form-control" name="item_consignee_address" placeholder="Address" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_consignee_pickup_address" class="col-md-4 col-form-label text-md-right">Pickup Address:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_pickup_address" type="text" class="form-control" name="item_consignee_pickup_address" placeholder="Pickup Address" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_consignee_notes" class="col-md-4 col-form-label text-md-right">Notes:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_notes" type="text" class="form-control" name="item_consignee_notes" placeholder="Notes" required >
                            </div>
                        </div>
                        <br>
                        <input type="text" name="item_merchant_id" placeholder="Pesos" value="{{Auth::id()}}" hidden readonly/>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit"  class="btn btn-primary" value="Create"/>
                                <a href="/parceltracker/" class="btn btn-warning">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection