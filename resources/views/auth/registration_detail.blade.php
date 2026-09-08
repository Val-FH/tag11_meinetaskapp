<x-layout title="Profil Details">
  <h1> Hallo {{ $registration->name }}! </h1>
  <p> Herzlich Willkommewn bei der Task App!<br>
    Deine Daten sind: <br>
    Name: {{ $registration->name }} <br>
    E-Mail: {{ $registration->email }} <br>

  </p>
  <p>Deine Tasks:</p>
  <ul>
    
   <li>Task</li>
  </ul>
   <form action="{{ route('registration.destroy', $registration) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-full">
                Profil löschen
            </button>
        </form>

</x-layout>