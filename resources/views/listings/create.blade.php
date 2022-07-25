<x-layout displayFooter={{ false }}>
    <form method="POST" action="/listings" enctype="multipart/form-data">
        @csrf
        <div class="form-block">
            <label for="title"><span>Job Title*</span></label>
            <input type="text" name="title">
            @error('title')
                <div class="form-error">
                    <small>A job title is required.</small>
                </div>
            @enderror
        </div>

        <div class="form-block">

            <label for="company">Company Name*</label>
            <input type="text" name="company">
            @error('company')
                <div class="form-error">
                    <small>A unique Company Name is required.</small>
                </div>
            @enderror
        </div>

        <div class="form-block">

            <label for="company">Logo</label>
            <input type="file" name="logo">
        </div>

        <div class="form-block">
            <label for="location">Job Location*</label>
            <input type="text" name="location">
            @error('location')
                <div class="form-error">
                    <small>Job Location is required.</small>
                </div>
            @enderror
        </div>

        <div class="form-block">
            <label for="email">Company Email*</label>
            <input type="email" name="email">
            @error('email')
                <div class="form-error">
                    <small>An Email is required.</small>
                </div>
            @enderror
        </div>

        <div class="form-block">
            <label for="website">Company Website*</label>
            <input type="text" name="website">
            @error('website')
                <div class="form-error">
                    <small>A Company Website is required.</small>
                </div>
            @enderror
        </div>

        <div class="form-block">
            <label for="tags">Tags*</label>
            <input type="text" name="tags">
            @error('tags')
                <div class="form-error">
                    <small>At least one tag is required.</small>
                </div>
            @enderror
        </div>

        <div class="form-block">
            <label for="desc">Description*</label>
            <textarea name="desc" id="" cols="30" rows="10"></textarea>
            @error('desc')
                <div class="form-error">
                    <small>A description is required.</small>
                </div>
            @enderror
        </div>

        <button type="submit">Create Listing</button>

    </form>
</x-layout>
