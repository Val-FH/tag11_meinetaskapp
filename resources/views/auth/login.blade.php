<x-layout title="Log in">

    <div class="mx-auto max-w-md">
        <h1> Wilkommen zurück </h1>


        <form action="{{ route('login') }}" method="POST">
            @csrf

            <fieldset class="fieldset">
                <legend>E-Mail</legend>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    class="input w-full {{ $errors->has('email') ? 'input-error' : '' }}">
                    @error('email') {{ $message }} @enderror
            </fieldset>

            <fieldset class="fieldset">
                <legend>Passwort</legend>
                <input id="password" type="password" name="password"
                    class="input w-full {{ $errors->has('passowrd') ? 'input-error' : '' }}">
                    @error('password') {{ $message }} @enderror
            </fieldset>

            <button type="submit" class="btn btn-primary w-full">
                Einloggen
            </button>
        </form>
    </div>
</x-layout>