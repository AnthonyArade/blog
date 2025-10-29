<main class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Blog Posts</h2>
    </div>

    <!-- Blog Posts Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Titre</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Contenu</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($articles as $article)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $article->title }}</div>
                            </td>
                            <td class="px-6 py-4">
                                {{-- <td class="px-6 py-4 mb-4 line-clamp-1 max-w-2xl "> --}}
                                <div class="text-sm text-gray-500 max-w-xs truncate">{{ $article->content }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('show', $article->id) }}">
                                        <button class="text-green-600 hover:text-green-900">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-6 flex justify-between items-center">
        <div class="text-sm text-gray-700">
            Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span
                class="font-medium">12</span> results
        </div>
        <div class="flex space-x-2">
            <button
                class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition">Previous</button>
            <button
                class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition">1</button>
            <button class="px-3 py-1 rounded border border-blue-500 bg-blue-500 text-white">2</button>
            <button
                class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition">3</button>
            <button
                class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition">Next</button>
        </div>
    </div>
</main>
