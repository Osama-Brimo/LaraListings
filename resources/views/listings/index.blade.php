<x-layout>
    
    <h3 class="filter-msg">
        {{ $filterMsg }}
    </h3>

    <div class="listings">

        @if (!count($listings))
            <div class="go-back">
                <a href="/">
                    <span>
                        <- Back to Listings </span>
                </a>
            </div>
            <h2>no results found.</h2>
        @endif

        @foreach ($listings as $listing)
            <x-listing :logo='$listing->logo' :id='$listing->id' :title='$listing->title' :tags="explode(',', $listing->tags)" :company='$listing->company'
                :location='$listing->location'>
            </x-listing>
        @endforeach

    </div>

    <div class="pagination">
        {{ $listings->links() }}
    </div>

</x-layout>
