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
            <!--Wenn nicht eingeloggt ist guest sichtbar -->
            @guest
                <a href="{{ route('login') }}" class="btn btn-soft btn-secondary"> Log in</a> </span>
                <a href="{{ route('register') }}" class="btn btn-soft btn-primary"> Register </a></span>    
            @endguest
           <!--Wenn eingeloggt sieht man auth und so können nur autorisierte Leute an die Sieten -->
            @auth
                <span class="text-sm opacity-80"> Hi, {{ auth()->user()->name }} </span>
                
                 <a href="{{ route('tasks.create') }}"
                class="text-sm {{ request()->routeIs('tasks.create') || request()->is('tasks/*') ? 'font-medium' : 'opacity-50 hover:opacity-100' }}">
                Aufgabe erstellen
            </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-soft btn-primary">
                        Log Out
                    </button>
                </form>
            @endauth <!--endtag für auth -->
        </div>
    </nav>
</header>