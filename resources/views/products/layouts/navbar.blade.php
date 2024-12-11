<nav class="bg-indigo-700 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white">
            @if (Auth::check())
                <span class="mr-4">Welcome, {{ Auth::user()->name }}</span>
            @endif
        </div>
        <div>
            <a href="{{ route('logout') }}" class="text-white hover:text-indigo-200">Logout</a>
        </div>
    </div>
</nav>
