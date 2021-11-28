<x-layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">Publish New Story</h1>

        <main class="flex-1">
            <x-panel>
                <form method="POST" action="/admin/stories" enctype="multipart/form-data">
                    @csrf

                    <x-form.input name="title" required />
                    <x-form.textarea name="description" required />

                    <x-form.button>Publish</x-form.button>
                </form>
            </x-panel>
        </main>
        </div>
    </section>
</x-layout>
