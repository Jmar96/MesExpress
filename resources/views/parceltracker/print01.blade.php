@extends('layouts.layout02')

@section('content')
<style>
    .printbarcodedetails {
        text-align: center;
        vertical-align: middle;
    }
    .printbarcodelogoright {
        text-align: right;
        vertical-align: right;
    }
    @media print {
        body * {
            visibility: hidden;
        }
        #section-to-print, #section-to-print * {
            visibility: visible;
        }
        #section-to-print {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('PRINT PARCEL DETAILS') }}</div>
                <div class="card-body">
                    <button class="btn btn-warning" onclick={window.print()}>PRINT</button>
                    @method('patch')
                    <div class='section-to-print' id='section-to-print'>
                        <div class="printbarcodedetails">
                            <hr>
                            <h4>{{$parcel->item_consignee_fullname}}</h5>
                            <h6>Contact #: {{$parcel->item_consignee_contactno}}</h4>
                            <h6>Address : {{$parcel->item_consignee_address}}</h6>
                            <hr>
                            <!-- {!! DNS1D::getBarcodeSVG('123', "C39", 1, 25, '#2A3239') !!} -->
                            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($parcel->item_reference_number, 'C39+',3,100,array(1,1,1), true) }}" alt="barcode" />
                            <h5>{{$parcel->item_name}}</h5>
                            <h5>&#x20B1; {{$parcel->item_total_payment}}</h5>
                        </div>
                        <div class="printbarcodelogoright">
                            <img src="{{ asset('/storage/images/MESXlogo.png') }}" alt="MES Express" class="brand-image img-circle elevation-3" style="opacity: .8;width: 50px;">
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- {{$parcel->item_name}} -->


@endsection