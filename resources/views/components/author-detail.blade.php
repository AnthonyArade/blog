<!-- Sidebar -->
<div class="lg:w-1/3 mt-8 lg:mt-0">
    <!-- Author Card -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="text-center">
            <img class="w-24 h-24 rounded-full mx-auto mb-4"
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt="John Doe">

            <h3 class="text-xl font-bold text-gray-900">{{ $article[0]->user->name }}</h3>
            <div class="flex justify-center space-x-3">
                <button class="text-gray-600 hover:text-blue-600">
                    <i class="fab fa-twitter"></i>
                </button>
                <button class="text-gray-600 hover:text-blue-600">
                    <i class="fab fa-github"></i>
                </button>
                <button class="text-gray-600 hover:text-blue-600">
                    <i class="fab fa-linkedin"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Related Posts -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Autre articles</h3>
        <div class="space-y-4">
            @foreach ($article[0]->user->article->filter(function ($autor_article) use ($article) {
        return $autor_article->id !== $article[0]->id;
    }) as $autor_article)
                <div class="flex items-start">
                    <div
                        class="flex-shrink-0 w-16 h-16 bg-gradient-to-r from-green-400 to-blue-500 rounded-lg mr-4 flex items-center justify-center text-white font-bold text-xs">
                        {{ $autor_article->title }}
                    </div>
                    <div>
                        <a href="{{ route('show', $autor_article->id) }}">
                            <h4 class="font-semibold text-gray-900 hover:text-blue-600 cursor-pointer">
                                {{ $autor_article->title }}
                            </h4>
                        </a>
                        <p class="text-sm text-gray-500">April 28, 2023</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
