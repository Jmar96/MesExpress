@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->
                </div>
                <div class="card-body">

                    <!-- @include('layouts.flashmssg') --> 
                    <!--use component alert (x-alert)-->
                    <x-alert>
                        <h3>Uploading message:</h3>
                    </x-alert> 
                    <hr>
                    <form action="/upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image"/>
                        <input type="submit" value="Upload"/>
                    </form>
                </div>
                <hr>
                <div class="card-body">
                    @foreach($user as $user)
                        <p>{{$user->name}}</p>
                        <br>
                        <p>{{$user->email}}</p>
                        <br>
                        <p>{{$user->phone_number}}</p>
                        <br>
                        <p>{{$user->merchant_online_name}}</p>
                        <a href="{{'/user/'.$user->id.'/edit'}}" class="btn btn-warning">Edit Details</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
