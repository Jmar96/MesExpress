@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Status Details') }}</div>
                <div class="card-body">
                    <x-alert>
                        <h3>Edit message:</h3>
                    </x-alert> 
                    <hr>
                    <a href="/parcelstatuslist/" class="btn btn-primary">Status List</a>
                    <hr>
                    <form action="{{route('parcelstatuslist.update',$pstatus->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <label for="item_status" >Status Name:</label> <br>
                        <input type="text" name="item_status"  placeholder="Name" value="{{$pstatus->item_status}}"/> <br><br>
                        <label for="item_status_description" >Description:</label> <br>
                        <input type="text" name="item_status_description"  placeholder="Reference Number" value="{{$pstatus->item_status_description}}"/> <br><br>
                        <label for="item_status_group" >Group_1:</label> <br>
                        <input type="text" name="item_status_group" placeholder="Description" value="{{$pstatus->item_status_group}}"/><br><br>
                        <label for="item_status_group2" >Group_2:</label> <br>
                        <input type="text" name="item_status_group2" placeholder="Description" value="{{$pstatus->item_status_group2}}"/>
                        <br>
                        <br>
                        <input type="submit" value="Update"/>
                        <a href="/parcelstatuslist/" class="btn btn-warning">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection