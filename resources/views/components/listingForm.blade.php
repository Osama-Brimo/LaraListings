{{-- 1 - make fields required or not based on method
        2 - display data in fields based on method 
        1/2 ... so something like: check method -> if put -> grab data to show in fields -> else leave blank --}}

<h1>
    @if ($method === 'POST')
        <span>Create a Listing</span>
    @else
        <span>Edit {{ $listing->title }}</span>
    @endif
</h1>

@php
    if (!isset($listing)) {
        $listing = null;
    }

    $decideFieldValue = function ($fieldName) use ($listing, $method) {
        if ($method === 'POST') {
            return old($fieldName);
        } else {
            return $listing->$fieldName;
        }
    }
@endphp

<form name="listingForm" id="listingForm" method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @method($method)
    <div class="form-block">
        <label for="title"><span>Job Title*</span></label>
        <input placeholder="Choose a title that best describes the job" type="text" name="title"
            value="{{ $decideFieldValue('title') }}">
        @error('title')
            <div class="form-error">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </div>

    <div class="form-block">

        <label for="company">Company Name*</label>
        <input placeholder="Enter your company name" type="text" name="company" value="{{ $decideFieldValue('company') }}">
        @error('company')
            <div class="form-error">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </div>

    <div class="form-block">

        <label for="company">Logo</label>
        <input  type="file" name="logo">
    </div>

    <div class="form-block">
        <label for="location">Job Location*</label>
        <input placeholder="Where the Job is based in" type="text" name="location" value="{{ $decideFieldValue('location') }}">
        @error('location')
            <div class="form-error">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </div>

    <div class="form-block">
        <label for="email">Company Email*</label>
        <input placeholder="Leave an Email for potential hires to get in touch with you." type="email" name="email"
            value="{{ $decideFieldValue('email') }}">
        @error('email')
            <div class="form-error">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </div>

    <div class="form-block">
        <label for="website">Company Website*</label>
        <input placeholder="Enter a company website to display" type="text" name="website"
            value="{{ $decideFieldValue('website') }}">
        @error('website')
            <div class="form-error">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </div>

    <div class="form-block">
        <label for="tags">Tags*</label>
        <input placeholder="Write a list of Tags, seperated by comma" type="text" name="tags"
            value="{{ $decideFieldValue('tags') }}">
        @error('tags')
            <div class="form-error">
                <small>At least one tag is required.</small>
            </div>
        @enderror
    </div>

    <div class="form-block">
        <label for="desc">Description*</label>
        <textarea placeholder="Describe the role" name="desc" id="" cols="30" rows="10"
            > {{ $decideFieldValue('desc') }} </textarea>
        @error('desc')
            <div class="form-error">
                <small>A description is required.</small>
            </div>
        @enderror
    </div>

    <button type="submit">Go</button>

</form>
