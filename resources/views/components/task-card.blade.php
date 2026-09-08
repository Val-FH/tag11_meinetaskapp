@props(['task'])

<article class="card mb-4 bg-base-100 shadow-sm transition hover:shadow-md">
    <div class="card-body">
        <div class="flex items-start justify-between gap-4">
            <div>
                <a href="/tasks/{{ $task->id }}"
                class="text-lg font-semibold hover:text-primary">
                    {{ $task->title }}
                </a>
                <p class="text-sm opacity-70">
                    finished {{ $task->updated_at->diffForHumans() }}
                </p>
            </div>
            <span class="badge badge-success font-bold"> Done </span>
        </div>

        <p class="mt-1">{{ $task->description }}</p>

    </div>
</article>