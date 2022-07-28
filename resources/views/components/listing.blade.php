<div class="listing">
    <div>
        <a href="/listings/{{ $id }}">
            <h3 class="listing-title"> {{ $title }} </h3>
        </a>
        <div class="listing-company-container">
            <span>by</span>
            <a href="/?company={{ $company }}" >
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
            <img height="30" width="30" src="{{ url('imgs/icons/globe.png') }}" alt="">
            <a href="/?location={{ $location }}"  class="listing-location"> {{ $location }} </a>
        </div>
    </div>
    <div>
        <a href="/listings/{{ $id }}">
            <img height="300" width="300" class="company-logo" src="{{ $logo ? asset('storage/' . $logo) : url('imgs/default.png') }}"
                alt="...">
        </a>
    </div>
</div>
