<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)


    @unless($formType === 'login')
        <div class="form-block">
            <label for="name"><span>Full Name*</span></label>
            <input placeholder="Enter your full name." type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="form-error">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </div>
    @endunless

    <div class="form-block">
        <label for="email">Email*</label>
        <input placeholder="Leave an Email for potential employers to get in touch with you." type="email"
            name="email" value="{{ old('email') }}">
        @error('email')
            <div class="form-error">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </div>

    <div class="form-block">
        <label for="password">Password*</label>
        <input placeholder="Enter a password." type="password" name="password" value="{{ old('password') }}">
        @error('password')
            <div class="form-error">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </div>

    @unless($formType === 'login')
        <div class="form-block">
            <label for="password_confirmation">Confirm Password*</label>
            <input placeholder="Enter a password." type="password" name="password_confirmation">
            @error('password_confirmation')
                <div class="form-error">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </div>

        <input type="hidden" value="seeking" name="type">
    @endunless

    <button type="submit">Go</button>

</form>
