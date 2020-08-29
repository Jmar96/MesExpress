@extends('layouts.layout03')

@section('content')

<style>
.divhidden{
    display: none;
}

.divtextRight {
        text-align: right;
        vertical-align: right;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Parcel Details') }}</div>
                <div class="card-body">
                    <form action="{{route('rider.update',$parcel->id)}}" method="post">
                        @csrf
                        @method('patch')
                    <h4>Parcel information</h4>
                        <div class="form-group row">
                            <label for="item_name" class="col-md-4 col-form-label text-md-right">Parcel Name:</label>

                            <div class="col-md-6">
                                <input id="item_name" type="text" class="form-control" name="item_name" placeholder="Name"  value="{{$parcel->item_name}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_consignee_fullname" class="col-md-4 col-form-label text-md-right">Consignee Fullname:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_fullname" type="text" class="form-control" name="item_consignee_fullname" placeholder="Consignee Fullname"  value="{{$parcel->item_consignee_fullname}}"  readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_reference_number" class="col-md-4 col-form-label text-md-right">Parcel Reference Number:</label>

                            <div class="col-md-6">
                                <input id="item_reference_number" type="text" class="form-control" name="item_reference_number" placeholder="Reference Number" value="{{$parcel->item_reference_number}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_price" class="col-md-4 col-form-label text-md-right">Total Value (&#x20B1;):</label>

                            <div class="col-md-6">
                                <input id="item_price" type="number" step="0.01" class="form-control" name="item_price" placeholder="Pesos" value="{{$parcel->item_total_payment}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_status_id" class="col-md-4 col-form-label text-md-right">Update Status:</label>

                            <div class="col-md-6">
                                <select name="item_status_id" id="item_status_id" class="form-control" >
                                    @foreach($ddpstatus as $dpstatus)
                                        <option value="{{$dpstatus->id}}">{{$dpstatus->item_status}}</option>
                                    @endforeach()
                                </select>
                            </div>
                        </div>
                        <div class="form-group row divhidden">
                            <label for="item_weight" class="col-md-4 col-form-label text-md-right">Weight (Kg):</label>

                            <div class="col-md-6">
                                <input id="item_weight" type="number" step="0.01" class="form-control" name="item_weight" placeholder="Kg" value="{{$parcel->item_weight}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row divhidden">
                            <label for="item_consignee_contactno" class="col-md-4 col-form-label text-md-right">Contact number:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_contactno" type="number" step="0.01" class="form-control" name="item_consignee_contactno" placeholder="09XXXXXXXXXX"  value="{{$parcel->item_consignee_contactno}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row divhidden">
                            <label for="item_consignee_address" class="col-md-4 col-form-label text-md-right">Address:</label>

                            <div class="col-md-6">
                                <input id="item_consignee_address" type="text" class="form-control" name="item_consignee_address" placeholder="Address" value="{{$parcel->item_consignee_address}}" readonly >
                            </div>
                        </div>
                        <div class="form-group row divhidden">
                            <label for="item_sender_fullname" class="col-md-4 col-form-label text-md-right">Senders Fullname:</label>

                            <div class="col-md-6">
                                <input id="item_sender_fullname" type="text" class="form-control" name="item_sender_fullname" value="{{$parcel->item_sender_fullname}}" placeholder="Senders Fullname" readonly >
                            </div>
                        </div>
                        <div class="form-group row divhidden">
                            <label for="item_sender_contactno" class="col-md-4 col-form-label text-md-right">Contact number:</label>

                            <div class="col-md-6">
                                <input id="item_sender_contactno" type="number" step="0.01" class="form-control" value="{{$parcel->item_sender_contactno}}" name="item_sender_contactno" placeholder="09XXXXXXXXXX" readonly >
                            </div>
                        </div>
                        <div class="form-group row divhidden">
                            <label for="item_sender_address" class="col-md-4 col-form-label text-md-right">Address:</label>

                            <div class="col-md-6">
                                <input id="item_sender_address" type="text" class="form-control" name="item_sender_address" value="{{$parcel->item_sender_address}}" placeholder="Senders Address" readonly >
                            </div>
                        </div>
                        <hr>
                        <div class="divtextRight">
                            <input type="text" name="item_merchant_id" placeholder="this is hidden" value="{{Auth::id()}}" hidden readonly/>
                            <br>
                            <input class="btn btn-success" type="submit" value="SAVE"/>
                            <a href="/rider_parcels/" class="btn btn-warning">CANCEL</a>
                        </div>
                    </form>
                    
                    <hr>
                    <x-alert>
                        <h3>Edit message:</h3>
                    </x-alert>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- {{$parcel->item_name}} -->


@endsection