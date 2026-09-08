<x-layout title="Index">
    <section class="mb-8 text-center">
        <h1 class="text-3xl font-bold"> Liste aller Aufgaben </h1>
    </section>
    @forelse($tasks as $task)
        <x-task-card :task="$task" />
    @empty
    Noch keine abgeschlossenen Aufgaben
    @endforelse

    {{ $tasks->links() }}

</x-layout>