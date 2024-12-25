<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter une Catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nom de la catégorie</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full" required>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-500 text-white rounded-md">
                            Enregistrer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
