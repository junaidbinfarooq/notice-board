<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($stories->count())
            <x-stories-grid :stories="$stories" />

            {{ $stories->links() }}
        @else
            <p class="text-center">No stories yet. Please check back later.</p>
        @endif
    </main>
</x-layout>
