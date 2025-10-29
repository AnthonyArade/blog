 <!-- Comments Section -->
 <div class="bg-white rounded-lg shadow-md p-6">
     <h2 class="text-2xl font-bold text-gray-900 mb-6">Commentaire ({{ $comments->count() }})</h2>

     <!-- Comment Form -->
     @auth
         <div class="mb-8 p-4 bg-gray-50 rounded-lg">
             <h3 class="text-lg font-semibold text-gray-900 mb-4">Partager votre avis</h3>
             <form action="{{ route('store.comment', $comments[0]->article->id) }}" method="POST">
                 @csrf
                  @method('POST')
                 <div class="mb-4">
                     <textarea
                         class="w-full px-4 py-3 border  border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                         rows="4" placeholder="Dites-nous tout" name="content" required></textarea>
                 </div>

                 <div class="flex justify-between items-center">
                     <div class="text-sm text-gray-500">
                         <i class="fas fa-info-circle mr-1"></i>
                         Votre adresse email ne sera pas partagée.
                     </div>

                     <button type="submit"
                         class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                         Publier votre commentaire
                     </button>
                 </div>
             </form>
         </div>
     @else
         <div class="mb-8 p-6 bg-gray-100 border border-gray-300 rounded-lg text-center">
             <h3 class="text-lg font-semibold text-gray-800 mb-2">Connectez-vous pour partager votre avis
             </h3>
             <p class="text-gray-600 mb-4">
                 Vous devez être connecté pour laisser un commentaire sur ce produit.
             </p>
             <a href="{{ route('login') }}"
                 class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                 Se connecter
             </a>
         </div>
     @endauth

     <!-- Comments List -->
     <div class="space-y-6">
         <!-- Comment 1 -->
         @foreach ($comments as $comment)
             <div class="border-b border-gray-200 pb-6">
                 <div class="flex justify-between items-start mb-2">
                     <div class="flex items-center">
                         <img class="w-10 h-10 rounded-full mr-3"
                             src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                             alt="Sarah Johnson">
                         <div>
                             <h4 class="font-semibold text-gray-900">{{ $comment->user->name }}</h4>
                         </div>
                     </div>
                     <button class="text-gray-400 hover:text-gray-600">
                         <i class="fas fa-ellipsis-h"></i>
                     </button>
                 </div>
                 <p class="text-gray-700 mb-3">
                     {{ $comment->content }}
                 </p>
                 <div class="flex items-center text-sm text-gray-500">
                     <button class="flex items-center mr-4 text-gray-500 hover:text-blue-600">
                         <i class="far fa-thumbs-up mr-1"></i>
                         <span>8</span>
                     </button>
                     <button class="flex items-center mr-4 text-gray-500 hover:text-blue-600">
                         <i class="far fa-thumbs-down mr-1"></i>
                     </button>
                     <button class="text-gray-500 hover:text-blue-600">
                         Reply
                     </button>
                 </div>
             </div>
         @endforeach
     </div>
 </div>
