<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier le Produit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nom du produit</label>
                            <input type="text" name="name" id="name" class="form-control mt-1 block w-full" value="{{ old('name', $product->name) }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" class="form-control mt-1 block w-full" rows="4">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantité</label>
                            <input type="number" name="quantity" id="quantity" class="form-control mt-1 block w-full" value="{{ old('quantity', $product->quantity) }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Prix</label>
                            <input type="number" name="price" id="price" class="form-control mt-1 block w-full" value="{{ old('price', $product->price) }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
                            <select name="category_id" id="category_id" class="form-control mt-1 block w-full">
                                <option value="">Sélectionner une catégorie</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
