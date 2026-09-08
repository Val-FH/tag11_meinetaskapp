<header class="bg-neutral text-neutral-content">
    <nav class="mx-auto flex max-w-5xl items-center justify-between px-4 py-4">
        <a href="{{ route('welcome') }}" 
            class="text-xl font-bold {{ request()->routeIs('welcome') ? '' : 'opacity-80 hover:opacity-100' }}"> Task<span class="text-primary">App</span> 
        </a>
        <div class="flex items-center gap-3">
            <a href="{{ route('tasks.index') }}"
                class="text-sm {{ request()->routeIs('tasks.index') || request()->is('tasks/*') ? 'font-medium' : 'opacity-50 hover:opacity-100' }}">
                Übersicht
            </a>
            @guest
                <a href="{{ route('login') }}" class="text-sm opacity-80"> Log in </span>
                <a href="{{ route('register') }}" class="btn btn-primary btn-sm"> Register </a></span>    
            @endguest

            @auth
                <span class="text-sm opacity-80"> Hi, {{ auth()->user()->name }} </span>
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm">
                        Log Out
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</header>