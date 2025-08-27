@extends('layouts.tailwind')

@section('title', 'Tous les livres - Bibliothèque ISIC')

@section('content')
<div class="min-h-screen bg-gray-50">

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                    <button @click="show = false" class="ml-auto text-green-600 hover:text-green-800">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium">{{ session('error') }}</span>
                    <button @click="show = false" class="ml-auto text-red-600 hover:text-red-800">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif

    @if(session('info'))
        <div class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
            <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium">{{ session('info') }}</span>
                    <button @click="show = false" class="ml-auto text-blue-600 hover:text-blue-800">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold sm:text-5xl md:text-6xl">
                    Catalogue complet
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-blue-100">
                    Découvrez notre collection complète de livres. Recherchez, explorez et trouvez votre prochaine lecture.
                </p>
            </div>
        </div>
    </div>

    <!-- Section Recommandations IA Personnalisées -->
    <div class="bg-gradient-to-br from-indigo-50 to-blue-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-3">
                    🤖 Besoin d'aide pour choisir votre prochain livre ?
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Dites-nous quels livres vous avez aimés et notre IA vous proposera des recommandations personnalisées.
                </p>
            </div>

            <!-- Formulaire de recommandations -->
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl shadow-xl p-6">
                    <form id="personalRecommendationForm" class="space-y-4">
                        @csrf

                        <!-- Container des livres -->
                        <div id="booksContainer" class="space-y-4">
                            <!-- Premier livre (toujours présent) -->
                            <div class="book-entry bg-gray-50 rounded-xl p-4 border-2 border-dashed border-gray-200">
                                <div class="flex items-center justify-between mb-3">
                                    <h3 class="text-lg font-semibold text-gray-900">Livre #1</h3>
                                    <button type="button" class="text-red-500 hover:text-red-700" onclick="removeBook(this)" style="display: none;">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Titre du livre *
                                        </label>
                                        <input type="text" name="books[0][title]" required
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                               placeholder="Ex: Le Petit Prince">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Description ou résumé *
                                        </label>
                                        <textarea name="books[0][description]" required rows="2"
                                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors resize-none"
                                                  placeholder="Décrivez brièvement l'histoire, le genre, les thèmes..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bouton Ajouter un livre -->
                        <div class="text-center">
                            <button type="button" onclick="addBook()"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Ajouter un autre livre
                            </button>
                        </div>

                        <!-- Bouton Soumettre -->
                        <div class="text-center pt-4">
                            <button type="submit" id="submitBtn"
                                    class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-colors font-semibold">
                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                                Obtenir mes recommandations
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Section de chargement -->
                <div id="loadingSection" class="hidden bg-white rounded-2xl shadow-xl p-6 text-center mt-6">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-indigo-600 mx-auto mb-3"></div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Analyse en cours...</h3>
                    <p class="text-gray-600">Notre IA analyse vos préférences pour trouver les meilleures recommandations.</p>
                </div>

                <!-- Section des résultats -->
                <div id="resultsSection" class="hidden mt-6">
                    <div class="bg-white rounded-2xl shadow-xl p-6">
                        <div class="text-center mb-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">🎯 Vos recommandations personnalisées</h3>
                            <p class="text-gray-600">Basé sur vos préférences, voici ce que nous vous suggérons :</p>
                        </div>

                        <div id="recommendationsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <!-- Les recommandations seront insérées ici -->
                        </div>

                        <div class="text-center mt-6">
                            <button onclick="resetForm()"
                                    class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Nouvelle recherche
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Section d'erreur -->
                <div id="errorSection" class="hidden bg-red-50 border border-red-200 rounded-2xl p-6 text-center mt-6">
                    <div class="text-red-600 mb-3">
                        <svg class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-red-900 mb-2">Erreur</h3>
                    <p id="errorMessage" class="text-red-700 mb-3"></p>
                    <button onclick="resetForm()"
                            class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        Réessayer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Search (optionnel) -->
        <div class="mb-6">
            <form method="GET" action="{{ route('livres.index') }}" class="max-w-xl">
                <div class="flex">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher un livre..." class="flex-1 px-4 py-2 rounded-l-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-r-md">Rechercher</button>
                </div>
            </form>
        </div>

        @if($livres->count() === 0)
            <div class="bg-white rounded-lg shadow p-6 text-center text-gray-600">Aucun livre trouvé.</div>
        @else
            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($livres as $livre)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="relative">
                            @if($livre->image_url)
                                @if(filter_var($livre->image_url, FILTER_VALIDATE_URL))
                                    <!-- Image externe (URL) -->
                                    <img src="{{ $livre->image_url }}"
                                         alt="{{ $livre->titre }}"
                                         class="w-full h-56 object-cover">
                                @else
                                    <!-- Image uploadée localement -->
                                    <img src="{{ asset('storage/'.$livre->image_url) }}"
                                         alt="{{ $livre->titre }}"
                                         class="w-full h-56 object-cover">
                                @endif
                            @else
                                <!-- Image par défaut -->
                                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=698&q=80"
                                     alt="Image par défaut"
                                     class="w-full h-56 object-cover">
                            @endif

                            <!-- Rating (en haut à droite) -->
                            @if(!is_null($livre->rating))
                                <div class="absolute top-2 right-2 bg-yellow-400 text-yellow-900 px-2 py-1 rounded-full text-xs font-semibold">
                                    ⭐ {{ number_format((float)$livre->rating, 1) }}
                                </div>
                            @endif

                            <!-- Prix (en bas à gauche) -->
                            @if(!is_null($livre->price) && $livre->price > 0)
                                <div class="absolute bottom-2 left-2 bg-green-500 text-white px-2 py-1 rounded-lg text-xs font-semibold shadow-lg">
                                    💰 {{ number_format((float)$livre->price, 2) }} (MAD)
                                </div>
                            @elseif(!is_null($livre->price) && $livre->price == 0)
                                <div class="absolute bottom-2 left-2 bg-blue-500 text-white px-2 py-1 rounded-lg text-xs font-semibold shadow-lg">
                                    🆓 Gratuit
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-1 line-clamp-1">{{ $livre->titre }}</h3>
                            <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ $livre->description }}</p>
                            <div class="flex justify-between items-center">
                                @php $disponible = (int)($livre->stock ?? 0) > 0; @endphp
                                <span class="{{ $disponible ? 'text-green-600' : 'text-orange-600' }} text-sm font-medium">
                                    {{ $disponible ? 'Disponible' : 'Stock épuisé' }}
                                </span>
                                <div class="flex space-x-2">
                                    <a href="{{ route('livres.show',$livre->id_livre) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm transition-colors duration-200">Détails</a>
                                    @if($disponible)
                                            <a href="{{ route('emprunts.create', $livre->id_livre) }}"
                                            class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm transition-colors duration-200">
                                            Emprunter
                                        </a>
                                    @else
                                        <a href="{{ route('reservation.create', $livre->id_livre) }}" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1 rounded text-sm transition-colors duration-200">
                                            Réserver
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

                         <!-- Pagination -->
             <div class="mt-12">
                 @if($livres->hasPages())
                     <div class="flex items-center justify-between">
                         <!-- Informations sur les résultats -->
                         <div class="text-sm text-gray-700">
                             Affichage de
                             <span class="font-medium">{{ $livres->firstItem() ?? 0 }}</span>
                             à
                             <span class="font-medium">{{ $livres->lastItem() ?? 0 }}</span>
                             sur
                             <span class="font-medium">{{ $livres->total() }}</span>
                             résultats
                         </div>

                         <!-- Navigation de pagination -->
                         <div class="flex items-center space-x-2">
                             <!-- Bouton Précédent -->
                             @if($livres->onFirstPage())
                                 <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-lg cursor-not-allowed">
                                     <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                     </svg>
                                     Précédent
                                 </span>
                             @else
                                 <a href="{{ $livres->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                     <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                     </svg>
                                     Précédent
                                 </a>
                             @endif

                             <!-- Numéros de pages -->
                             <div class="flex items-center space-x-1">
                                 @foreach($livres->getUrlRange(1, $livres->lastPage()) as $page => $url)
                                     @if($page == $livres->currentPage())
                                         <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-lg">
                                             {{ $page }}
                                         </span>
                                     @elseif($page == 1 || $page == $livres->lastPage() || ($page >= $livres->currentPage() - 2 && $page <= $livres->currentPage() + 2))
                                         <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                             {{ $page }}
                                         </a>
                                     @elseif($page == $livres->currentPage() - 3 || $page == $livres->currentPage() + 3)
                                         <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400">
                                             ...
                                         </span>
                                     @endif
                                 @endforeach
                             </div>

                             <!-- Bouton Suivant -->
                             @if($livres->hasMorePages())
                                 <a href="{{ $livres->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                     Suivant
                                     <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                     </svg>
                                 </a>
                             @else
                                 <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-lg cursor-not-allowed">
                                     Suivant
                                     <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                     </svg>
                                 </span>
                             @endif
                         </div>
                     </div>
                 @endif
             </div>
         @endif
     </div>
 </div>

 <!-- JavaScript pour les recommandations personnalisées -->
 <script>
 let bookCount = 1;

 function addBook() {
     bookCount++;
     const container = document.getElementById('booksContainer');
     const newBookEntry = document.createElement('div');
     newBookEntry.className = 'book-entry bg-gray-50 rounded-xl p-6 border-2 border-dashed border-gray-200';
     newBookEntry.innerHTML = `
         <div class="flex items-center justify-between mb-4">
             <h3 class="text-lg font-semibold text-gray-900">Livre #${bookCount}</h3>
             <button type="button" class="text-red-500 hover:text-red-700" onclick="removeBook(this)">
                 <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                 </svg>
             </button>
         </div>

         <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
             <div>
                 <label class="block text-sm font-medium text-gray-700 mb-2">
                     Titre du livre *
                 </label>
                 <input type="text" name="books[${bookCount-1}][title]" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                        placeholder="Ex: Le Petit Prince">
             </div>

             <div>
                 <label class="block text-sm font-medium text-gray-700 mb-2">
                     Description ou résumé *
                 </label>
                 <textarea name="books[${bookCount-1}][description]" required rows="3"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors resize-none"
                           placeholder="Décrivez brièvement l'histoire, le genre, les thèmes..."></textarea>
             </div>
         </div>
     `;
     container.appendChild(newBookEntry);

     // Afficher le bouton de suppression pour le premier livre s'il y en a plus d'un
     if (bookCount > 1) {
         const firstRemoveBtn = container.querySelector('.book-entry:first-child button[onclick="removeBook(this)"]');
         if (firstRemoveBtn) {
             firstRemoveBtn.style.display = 'block';
         }
     }
 }

 function removeBook(button) {
     const bookEntry = button.closest('.book-entry');
     bookEntry.remove();
     bookCount--;

     // Mettre à jour les numéros des livres
     const bookEntries = document.querySelectorAll('.book-entry');
     bookEntries.forEach((entry, index) => {
         const title = entry.querySelector('h3');
         title.textContent = `Livre #${index + 1}`;

         // Mettre à jour les noms des champs
         const inputs = entry.querySelectorAll('input, textarea');
         inputs.forEach(input => {
             const fieldName = input.name.split('[')[2].split(']')[0];
             input.name = `books[${index}][${fieldName}]`;
         });
     });

     // Masquer le bouton de suppression du premier livre s'il n'y en a qu'un
     if (bookCount === 1) {
         const firstRemoveBtn = document.querySelector('.book-entry:first-child button[onclick="removeBook(this)"]');
         if (firstRemoveBtn) {
             firstRemoveBtn.style.display = 'none';
         }
     }
 }

 function resetForm() {
     // Réinitialiser le formulaire
     document.getElementById('personalRecommendationForm').reset();

     // Supprimer tous les livres sauf le premier
     const container = document.getElementById('booksContainer');
     const bookEntries = container.querySelectorAll('.book-entry');
     for (let i = 1; i < bookEntries.length; i++) {
         bookEntries[i].remove();
     }

     // Réinitialiser le compteur
     bookCount = 1;

     // Masquer les sections de résultats et d'erreur
     document.getElementById('resultsSection').classList.add('hidden');
     document.getElementById('errorSection').classList.add('hidden');
     document.getElementById('loadingSection').classList.add('hidden');

     // Afficher le formulaire
     document.querySelector('.bg-white.rounded-2xl.shadow-xl.p-6').style.display = 'block';
 }

 // Gestionnaire de soumission du formulaire
 document.getElementById('personalRecommendationForm').addEventListener('submit', async function(e) {
     e.preventDefault();

     // Masquer les sections précédentes
     document.getElementById('resultsSection').classList.add('hidden');
     document.getElementById('errorSection').classList.add('hidden');

     // Afficher le chargement
     document.getElementById('loadingSection').classList.remove('hidden');

     // Récupérer les données du formulaire
     const formData = new FormData(this);
     const books = [];

     // Parcourir les entrées du formulaire pour construire le tableau des livres
     for (let i = 0; i < bookCount; i++) {
         const title = formData.get(`books[${i}][title]`);
         const description = formData.get(`books[${i}][description]`);

         if (title && description) {
             books.push({
                 title: title,
                 description: description
             });
         }
     }

     if (books.length === 0) {
         showError('Veuillez saisir au moins un livre avec son titre et sa description.');
         return;
     }

     try {
         // Envoyer la requête à Laravel
         const response = await fetch('{{ route("recommendations.personal.submit") }}', {
             method: 'POST',
             headers: {
                 'Content-Type': 'application/json',
                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
             },
             body: JSON.stringify({ books: books })
         });

         const data = await response.json();

         // Masquer le chargement
         document.getElementById('loadingSection').classList.add('hidden');

         if (data.success) {
             displayRecommendations(data.recommendations);
         } else {
             showError(data.message || 'Erreur lors de la génération des recommandations');
         }

     } catch (error) {
         console.error('Erreur:', error);
         document.getElementById('loadingSection').classList.add('hidden');
         showError('Erreur de connexion. Veuillez réessayer.');
     }
 });

 function displayRecommendations(recommendations) {
     const grid = document.getElementById('recommendationsGrid');
     grid.innerHTML = '';

     if (recommendations.length === 0) {
         grid.innerHTML = `
             <div class="col-span-full text-center py-8">
                 <div class="text-gray-500 mb-4">
                     <svg class="w-16 h-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.47-.881-6.08-2.33" />
                     </svg>
                 </div>
                 <h3 class="text-lg font-semibold text-gray-900 mb-2">Aucune recommandation trouvée</h3>
                 <p class="text-gray-600">Essayez avec d'autres livres ou descriptions plus détaillées.</p>
             </div>
         `;
     } else {
         recommendations.forEach(book => {
             const similarityPercent = Math.round(book.similarity_score * 100);
             const card = document.createElement('div');
             card.className = 'bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300';
             card.innerHTML = `
                 <div class="relative">
                     <img src="${book.image_url || '/images/default-book.jpg'}"
                          alt="${book.titre}"
                          class="w-full h-48 object-cover"
                          onerror="this.src='/images/default-book.jpg'">

                     <!-- Badge de similarité -->
                     <div class="absolute top-2 right-2 bg-indigo-600 text-white px-2 py-1 rounded-lg text-xs font-semibold">
                         ${similarityPercent}% similaire
                     </div>

                     <!-- Badge de disponibilité -->
                     <div class="absolute bottom-2 left-2 ${book.stock > 0 ? 'bg-green-500' : 'bg-orange-500'} text-white px-2 py-1 rounded-lg text-xs font-semibold">
                         ${book.stock > 0 ? 'Disponible' : 'Stock épuisé'}
                     </div>
                 </div>

                 <div class="p-4">
                     <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">${book.titre}</h3>
                     <p class="text-sm text-gray-600 mb-3 line-clamp-3">${book.description}</p>

                     <div class="flex justify-between items-center mb-3">
                         <div class="flex items-center">
                             <span class="text-yellow-500">★</span>
                             <span class="text-sm text-gray-600 ml-1">${book.rating}/5</span>
                         </div>
                         ${book.price > 0 ? `<span class="text-green-600 font-semibold">${book.price} MAD</span>` : '<span class="text-blue-600 font-semibold">Gratuit</span>'}
                     </div>

                     <div class="flex space-x-2">
                         <a href="/livres/${book.id_livre}"
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm transition-colors">
                             Détails
                         </a>
                         ${book.stock > 0 ?
                             `<a href="/emprunts/create/${book.id_livre}"
                                 class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm transition-colors">
                                 Emprunter
                             </a>` :
                             `<a href="/reservation/create/${book.id_livre}"
                                 class="flex-1 bg-orange-500 hover:bg-orange-600 text-white text-center py-2 px-3 rounded-lg text-sm transition-colors">
                                 Réserver
                             </a>`
                         }
                     </div>
                 </div>
             `;
             grid.appendChild(card);
         });
     }

     // Afficher la section des résultats
     document.getElementById('resultsSection').classList.remove('hidden');
 }

 function showError(message) {
     document.getElementById('errorMessage').textContent = message;
     document.getElementById('errorSection').classList.remove('hidden');
 }
 </script>

 <style>
 .line-clamp-2 {
     display: -webkit-box;
     -webkit-line-clamp: 2;
     -webkit-box-orient: vertical;
     overflow: hidden;
 }

 .line-clamp-3 {
     display: -webkit-box;
     -webkit-line-clamp: 3;
     -webkit-box-orient: vertical;
     overflow: hidden;
 }
 </style>
 @endsection


