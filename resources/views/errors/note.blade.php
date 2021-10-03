@if(Session::has('error'))
    <p class="message-error">{{Session::get('error')}}</p>
@endif