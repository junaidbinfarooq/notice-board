@props(['stories'])

@if ($stories->count() > 1)
    <div class="lg:grid lg:grid-cols-6 bg-gray-100">
        @foreach ($stories->skip(1) as $story)
            <x-story-card
                :story="$story"
                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"
            >
            </x-story-card>
        @endforeach
    </div>
@endif
