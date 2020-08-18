@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ADD PARCEL STATUS') }}</div>
                <div class="card-body">
                    <x-alert>
                        <h3>System message:</h3>
                    </x-alert> 
                    <hr><a href="/parcelstatuslist/" >Go back...</a><hr>
                    <form action="/parcelstatuslist/create" method="post">
                        @csrf
                        <label for="item_status" >Status Name:</label> <br>
                        <input type="text" name="item_status"  placeholder="Status"/> <br><br>
                        <label for="item_status_description" >Description:</label> <br>
                        <input type="text" name="item_status_description"  placeholder="Description"/> <br><br>
                        <label for="item_status_group" >Group_1:</label> <br>
                        <input type="text" name="item_status_group"  placeholder="Group_1"/> <br><br>
                        <label for="item_status_group2" >Group_2:</label> <br>
                        <input type="text" name="item_status_group2" placeholder="Group_2"/>
                        <br>
                        <br>
                        <input type="submit"  class="btn btn-primary" value="Create"/>
                        <a href="/parcelstatuslist/" class="btn btn-warning">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection