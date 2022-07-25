<x-layout displayFooter={{ false }}>
    <div class="go-back">
        <a href="/listings/{{ $listing->id }}">
            <span>
                <- Back to {{ $listing->title }} </span>
        </a>
    </div>
    <x-listingForm method='PUT' action='/listings/{{ $listing->id }}' :listing='$listing'></x-listingForm>

    <form action="/listings/{{ $listing->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">
            <span>Delete Listing</span>
        </button>
    </form>

</x-layout>
