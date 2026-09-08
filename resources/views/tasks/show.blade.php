<x-layout title="{{ $task->title }}">



    <article  class="card mt-4 bg-base-100 shdow-sm">
        <div class="card-body">
            <div class="flex items-center justify-between gap-4">
                <h1 class="text-2xl font-bold"> {{ $task->title }} </h1>
                <span class="badge badge-success font-bold"> Done </span>
            </div>
            <p class="mt-6 leading-relaxed"> {{ $task->description }} </p>
        </div>
    </article>
</x-layout>