<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rapports et Statistiques') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Graphiques Dynamiques</h3>
                    <canvas id="categoryChart" style="max-width: 300px; max-height: 300px; margin: 0 auto;"></canvas>

                    <h3 class="text-lg font-bold mt-8 mb-4">Produits à faible stock</h3>
                    @if ($lowStockProducts->isEmpty())
                        <p class="text-red-500">Aucun produit avec un stock faible.</p>
                    @else
                        <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
                            <thead class="bg-gray-700 text-white">
                                <tr>
                                    <th class="px-4 py-2 text-left">#</th>
                                    <th class="px-4 py-2 text-left">Nom</th>
                                    <th class="px-4 py-2 text-left">Quantité</th>
                                    <th class="px-4 py-2 text-left">Catégorie</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lowStockProducts as $product)
                                    <tr class="border-t hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="px-4 py-2">{{ $product->id }}</td>
                                        <td class="px-4 py-2">{{ $product->name }}</td>
                                        <td class="px-4 py-2">{{ $product->quantity }}</td>
                                        <td class="px-4 py-2">{{ $product->category->name ?? 'Aucune catégorie' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('categoryChart').getContext('2d');
        const categoryChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($categoryLabels) !!},
                datasets: [{
                    label: 'Nombre de produits par catégorie',
                    data: {!! json_encode($categoryValues) !!},
                    backgroundColor: [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'
                    ],
                    hoverOffset: 4
                }]
            },
        });
    </script>
</x-app-layout>
