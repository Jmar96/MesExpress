@if(session()->has('uploadsuccess'))
<div class="alert alert-success">{{session()->get('uploadsuccess')}}</div>
@elseif(session()->has('uploaderror'))
<div class="alert alert-danger">{{session()->get('uploaderror')}}</div>
@endif