<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste des Catégories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('categories.create') }}" class="px-4 py-2 bg-green-600 hover:bg-green-500 text-white rounded-md shadow-sm">
                    Ajouter une catégorie
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-700 text-white">
                                <th class="px-4 py-2 text-left">#</th>
                                <th class="px-4 py-2 text-left">Nom</th>
                                <th class="px-4 py-2 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr class="border-t hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2">{{ $category->id }}</td>
                                    <td class="px-4 py-2">{{ $category->name }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded-full">
                                            Modifier
                                        </a>
                                        <button 
                                           class="delete-category-button bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded-full" 
                                           data-id="{{ $category->id }}" 
                                           data-name="{{ $category->name }}">
                                             Supprimer
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4">Aucune catégorie trouvée.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
