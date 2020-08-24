@extends('layouts.layout02')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Profile') }}</div>

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
                    @if(Auth::user()->avatar)
                        <img src="{{asset('/storage/'.Auth::user()->id.'_images/'.Auth::user()->avatar)}}" alt="avatar" width="30"/>
                    @endif
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <form action="/aupload" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image"/>
                                <input type="submit" value="Upload"/>
                            </form>
                        </div>
                    </div>
                    <hr>
                    @foreach($user as $user)
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$user->name}}" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" value="{{$user->email}}" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile No.</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$user->phone_number}}" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$user->current_address}}" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bank Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$user->bank_name}}" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bank</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$user->bank_account_number}}" placeholder="Enter email">
                    </div>
                    @endforeach
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
