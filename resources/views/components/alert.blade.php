<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->

    
    @if(session()->has('success'))
    {{$slot}}
    <div class="alert alert-success">{{session()->get('success')}}</div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->