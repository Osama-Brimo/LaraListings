<x-layout>
    <div class="user-info">
        <div>
            <span class="user-info-email">{{ $user->email }}</span>
            <h1 class="user-info-name">{{ $user->name }}</h1>
        </div>

        <div class="account-controls">
            @auth
                @if ($user->email === auth()->user()->email)
                    <form id="account-delete" action="/user/{{ $user->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete Account</button>
                    </form>
                @endif
            @endauth
        </div>
    </div>





    <div>
        <h3>Listings by {{ $user->name }}</h3>
        @if (count($user->listings) === 0)
            <small>No listings by this user.</small>
        @endif
        @foreach ($user->listings as $listing)
            <div class="user-listing">
                <x-listing :logo='$listing->logo' :id='$listing->id' :title='$listing->title' :tags="explode(',', $listing->tags)" :company='$listing->company'
                    :location='$listing->location'>
                </x-listing>
                @if ($user->email === auth()->user()->email)
                    <form id="user-listing-delete" action="/listings/{{ $listing->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="afterAction" value="{{Request::url()}}">
                        <button type="submit">Delete Listing</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</x-layout>
