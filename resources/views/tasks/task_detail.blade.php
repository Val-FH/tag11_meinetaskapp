<x-layout title="Aufgabe Detail">
    <div class="mx-auto max-w-md">
        <h1> Aufgabendetails </h1>

        <p><strong>Name:</strong> {{ $task->title }}</p>
        <p><strong>Beschreibung:</strong> {{ $task->description }}</p>

        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-full">
                Aufgabe löschen
            </button>
        </form>
    </div>
</x-layout>