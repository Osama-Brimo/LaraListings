<x-layout>
    <div>
        <h1>{{ $user->name }}</h1>
        <span>{{ $user->email }}</span>
    </div>



    @auth
        @if ($user->email === auth()->user()->email)
            <div id='account-controls'>
                <ul>
                    <li><a href="/user/logout"> Logout </a></li>
                    <li>
                        <form id="account-delete" action="/user/{{ $user->id }}" method="POST">
                            @method('DELETE')
                            @csrf

                        </form>
                        <button x-data x-on:click="document.querySelector('#account-delete').submit();">Delete Account</button>


                    </li>
                </ul>
            </div>
        @endif
    @endauth

    <div>
        <h3>Listings by {{ $user->name }}</h3>
        @foreach ($user->listings as $listing)
            <x-listing :logo='$listing->logo' :id='$listing->id' :title='$listing->title' :tags="explode(',', $listing->tags)" :company='$listing->company'
                :location='$listing->location'>
            </x-listing>
        @endforeach
    </div>
</x-layout>
