@extends('layouts.app')

@section('content')

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Status List') }}</div>
                <div class="card-body">
                    <x-alert>
                        <h3>Create message:</h3>
                    </x-alert> 
                    <hr>
                    <a href="/admin" class="btn btn-primary">Home</a>
                    <a href="/parcelstatuslist/create" class="btn btn-primary">Add Status</a>
                    <hr>
                    <table>
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Status Name</th>
                                <th>Description</th>
                                <th>Group_1</th>
                                <th>Group_2</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pstatus as $pstatus)
                            <tr>
                                <td><a href="{{'/parcelstatuslist/'.$pstatus->id.'/edit'}}" class="btn btn-warning"><span class="fas fa-edit px-2"></span></a></td>
                                <td><p>{{$pstatus->item_status}}</p></td>
                                <td><p>{{$pstatus->item_status_description}}</p></td>
                                <td><p>{{$pstatus->item_status_group}}</p></td>
                                <td><p>{{$pstatus->item_status_group2}}</p></td>
                            </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection