<div class="title m-b-md">
    You cannot access this page! This is for only '{{$role}}'"
    <br>
    Please re-login here ->
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>