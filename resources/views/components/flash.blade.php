@if (session()->has('message'))
    <div x-data="{ open: true }" x-show="open" x-init="(() => setTimeout(() => open = false, 3000))" x-transition.duration.800ms class="flashMsg">
        <span> {{ session('message') }} </span>
    </div>
@endif
