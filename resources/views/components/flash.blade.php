@if (session()->has('message'))
    <div class="flashMsg">
        <span> {{ session('message') }} </span>
    </div>
@endif
