@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Merchant Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->
                    
                    <!-- @include('layouts.flashmssg') --> 
                    <!--use component alert (x-alert)-->
                    <x-alert>
                        <p>Uploading message:</p>
                    </x-alert> 
                    <hr>
                    <form action="/mupload" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image"/>
                        <input type="submit" value="Upload"/>
                    </form>
                    <br>
                    <hr>
                    @foreach($user as $user)
                        <p>{{$user->name}}</p>
                        <p>{{$user->email}}</p>
                        <p>{{$user->phone_number}}</p>
                        <p>{{$user->merchant_online_name}}</p>
                        <input type='button' value="edit" disable/>
                        <a href="/merchant" class="btn btn-warning">home</a>
                        <!-- <a href="{{'/user/'.$user->id.'/edit'}}" class="btn btn-warning">Edit Details</a> -->
                    @endforeach
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
