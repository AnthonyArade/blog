                <article class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                    <!-- Post Header -->
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $article[0]->title }}</h1>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center text-sm text-gray-500 gap-4">
                            <div class="flex items-center">
                                <img class="w-8 h-8 rounded-full mr-2"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="Author">
                                <span>{{ $article[0]->user->name }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="far fa-calendar mr-1"></i>
                                <span>May 15, 2023</span>
                            </div>
                            <div class="flex items-center">
                                <i class="far fa-clock mr-1"></i>
                                <span>5 min read</span>
                            </div>
                            <div class="flex items-center">
                                <i class="far fa-comment mr-1"></i>
                                <span>{{ $comments->count() }} comments</span>
                            </div>
                            <span
                                class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <div
                        class="w-full h-64 bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center text-white text-2xl font-bold">
                        {{ $article[0]->title }}
                    </div>

                    <!-- Post Content -->
                    <div class="p-6 prose max-w-none">
                        <p class="text-lg text-gray-700 mb-4">
                            {!! nl2br(str_replace('.', '.<br>', $article[0]->content)) !!}
                        </p>


                    </div>

                    <!-- Post Actions -->
                    <div class="p-6 border-t border-gray-200 flex justify-between items-center">
                        <div class="flex space-x-4">
                            <button class="flex items-center text-gray-600 hover:text-blue-600 transition">
                                <i class="far fa-thumbs-up mr-1"></i>
                                <span>24</span>
                            </button>
                            <button class="flex items-center text-gray-600 hover:text-blue-600 transition">
                                <i class="far fa-thumbs-down mr-1"></i>
                                <span>2</span>
                            </button>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-gray-600 hover:text-blue-600 p-2 rounded-full hover:bg-blue-50">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button class="text-gray-600 hover:text-blue-600 p-2 rounded-full hover:bg-blue-50">
                                <i class="fab fa-facebook"></i>
                            </button>
                            <button class="text-gray-600 hover:text-blue-600 p-2 rounded-full hover:bg-blue-50">
                                <i class="fab fa-linkedin"></i>
                            </button>
                            <button class="text-gray-600 hover:text-blue-600 p-2 rounded-full hover:bg-blue-50">
                                <i class="fas fa-link"></i>
                            </button>
                        </div>
                    </div>
                </article>