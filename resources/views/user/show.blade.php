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
                        <form action="/user/{{ $user->id }}" method="POST">
                            @method('DELETE')
                            @csrf

                            <button type="submit">Delete Account</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    @endauth
</x-layout>
