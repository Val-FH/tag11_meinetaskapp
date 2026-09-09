<x-layout title="Task ändern">

    <h1>Aufgabe ändern</h1>
    <form action="/tasks/edit/{{ $task->user_id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titel</label>
            <input type="text" id="title" name="title" value="{{ old('title',$task->title) }}" 
            class="input input-secondary">
            <x-error name="title" />
        </div>

        <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beschreibung</label>
            <textarea id="description" name="description" rows="4" class="input input-secondary">{{ old('description', $task->description) }}</textarea>
          <x-error name="description" />
        </div>

        <button type="submit" class="btn btn-soft btn-primary">Aufgabe ändern</button>
</x-layout>