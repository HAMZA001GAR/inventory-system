<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste Des Produits') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end mb-4">
                    <a href="{{ route('products.create') }}" class="px-4 py-2 bg-green-600 hover:bg-green-500 text-white rounded-md shadow-sm">
                        Ajouter un produit
                    </a>
                </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
                            <thead>
                                <tr class="bg-gray-700 text-white">
                                    <th class="px-4 py-2 text-left">#</th>
                                    <th class="px-4 py-2 text-left">Nom</th>
                                    <th class="px-4 py-2 text-left">Description</th>
                                    <th class="px-4 py-2 text-left">Quantité</th>
                                    <th class="px-4 py-2 text-left">Prix</th>
                                    <th class="px-4 py-2 text-left">Catégorie</th>
                                    <th class="px-4 py-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr class="border-t hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="px-4 py-2">{{ $product->id }}</td>
                                        <td class="px-4 py-2">{{ $product->name }}</td>
                                        <td class="px-4 py-2">{{ $product->description }}</td>
                                        <td class="px-4 py-2">{{ $product->quantity }}</td>
                                        <td class="px-4 py-2">{{ $product->price }} MAD</td>
                                        <td class="px-4 py-2">{{ $product->category->name ?? 'Aucune catégorie' }}</td>
                                        <td class="px-4 py-2 text-center">
                                            <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded-full">Modifier</a>
                                            <button type="button" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded-full ml-2 delete-button" data-id="{{ $product->id }}" data-name="{{ $product->name }}">
                                               Supprimer
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">Aucun produit trouvé</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
