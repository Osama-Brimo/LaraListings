<div class="go-back">
    <a href="/">
        <span>
            <- Back to Listings </span>
    </a>
</div>

<div class="listing-full">



    <div class="top">
        <div class="top-left">
            <h3 class="listing-title"> {{ $title }} </h3>
            <div class="listing-company-container">
                <span>by</span>
                <a href="/?company={{ $company }}">
                    <h3 class="listing-company"> {{ $company }} </h3>
                </a>
            </div>
            <div class="listing-tags">
                @foreach ($tags as $tag)
                    <a href="/?tag={{ $tag }}" class="listing-tag">
                        <span>{{ $tag }}</span>
                    </a>
                @endforeach
            </div>
            <div class="listing-location-container">
                <img src="{{ url('imgs/icons/globe.png') }}" alt="">
                <a href="/?location={{ $location }}" class="listing-location"> {{ $location }} </a>
            </div>
        </div>
        <div class="top-right">
            <a href="/listings/edit/{{ $id }}">
                <span class="underline">Edit listing</span>
            </a>
            <img class="company-logo" src="{{ $logo ? asset('storage/' . $logo) : url('imgs/default.png') }}"
                alt="...">

        </div>
    </div>


    <div class="bottom">
        <div class="listing-desc">
            <h3>Job Description</h3>
            <p>
                {{ $desc }}
            </p>
        </div>

        <div class="listing-actions">
            <button class="button-fullwidth"> <span>Contact Employer</span> </button>
            <button class="button-fullwidth"> <span>Visit Website</span> </button>
        </div>
    </div>

</div>
