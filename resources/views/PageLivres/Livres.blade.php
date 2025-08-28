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

    <!-- Hero Section - Glassmorphism, floating, unique style -->
    <div class="relative py-20 bg-gradient-to-br from-emerald-100 via-cyan-100 to-white overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">
            <svg width="100%" height="100%" class="absolute inset-0 opacity-30" style="z-index:0;" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <radialGradient id="bgPattern" cx="50%" cy="50%" r="80%">
                        <stop offset="0%" stop-color="#6ee7b7"/>
                        <stop offset="100%" stop-color="#a7f3d0" stop-opacity="0.2"/>
                    </radialGradient>
                </defs>
                <rect width="100%" height="100%" fill="url(#bgPattern)"/>
            </svg>
        </div>
        <div class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto bg-white/60 backdrop-blur-2xl rounded-3xl shadow-2xl border border-emerald-200 px-10 py-14 flex flex-col items-center gap-6" style="box-shadow: 0 8px 32px 0 rgba(16, 185, 129, 0.18);">
                <div class="flex items-center justify-center mb-4">
                    <span class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-emerald-400 via-cyan-400 to-emerald-200 shadow-lg">
                        <svg class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </span>
                </div>
                <h1 class="text-5xl sm:text-6xl font-black tracking-tight text-emerald-900 drop-shadow-xl text-center mb-2" style="letter-spacing: -0.03em;">
                    <span class="bg-gradient-to-r from-emerald-500 via-cyan-400 to-emerald-400 bg-clip-text text-transparent">Catalogue Premium</span>
                </h1>
                <p class="mt-2 max-w-xl mx-auto text-emerald-800 text-xl font-semibold text-center">
                    Plongez dans une expérience de lecture inédite. Découvrez, explorez et trouvez votre prochaine lecture dans un univers visuel unique.
                </p>
                <div class="mt-6 flex flex-wrap gap-3 justify-center">
                    <span class="px-4 py-1 rounded-full bg-gradient-to-r from-emerald-200 to-cyan-100 text-emerald-900 text-xs font-bold shadow">Nouveautés</span>
                    <span class="px-4 py-1 rounded-full bg-gradient-to-r from-fuchsia-200 to-pink-100 text-fuchsia-900 text-xs font-bold shadow">Tendances</span>
                    <span class="px-4 py-1 rounded-full bg-gradient-to-r from-yellow-200 to-amber-100 text-yellow-900 text-xs font-bold shadow">Recommandés IA</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Recommandations IA Personnalisées -->
    <div class="bg-gradient-to-br from-emerald-50 via-cyan-50 to-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-10">
                <div class="flex justify-center mb-4">
                    <span class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-br from-emerald-400 via-cyan-400 to-emerald-200 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-black text-emerald-900 mb-2 drop-shadow-xl">Besoin d'aide pour choisir ?</h2>
                <p class="text-lg text-emerald-800 max-w-2xl mx-auto font-semibold">Indiquez-nous vos lectures favorites et laissez notre IA vous surprendre avec des recommandations personnalisées et inédites.</p>
            </div>
            <!-- Formulaire de recommandations -->
            <div class="max-w-3xl mx-auto">
                <form id="personalRecommendationForm" class="bg-white/70 backdrop-blur-2xl rounded-3xl shadow-2xl border border-emerald-200 px-8 py-10 flex flex-col gap-8" style="box-shadow: 0 8px 32px 0 rgba(16, 185, 129, 0.18);">
                    @csrf
                    <div id="booksContainer" class="flex flex-col gap-6">
                        <!-- Premier livre (toujours présent) -->
                        <div class="book-entry relative bg-gradient-to-br from-emerald-50 via-cyan-50 to-white rounded-2xl border-2 border-dashed border-emerald-200 p-6 shadow group">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-emerald-400 to-cyan-400 text-white font-bold shadow">1</span>
                                <span class="text-lg font-extrabold text-emerald-900">Livre</span>
                                <button type="button" class="ml-auto text-red-400 hover:text-red-600 transition hidden group-hover:block" onclick="removeBook(this)" style="display: none;">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="book-title-0" class="block mb-2 text-emerald-700 text-sm font-bold">Titre du livre *</label>
                                    <input type="text" name="books[0][title]" required id="book-title-0" class="w-full px-4 py-3 border-2 border-emerald-200 rounded-xl bg-white/80 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 font-semibold transition" placeholder="Ex: Le Petit Prince" />
                                </div>
                                <div>
                                    <label for="book-desc-0" class="block mb-2 text-emerald-700 text-sm font-bold">Description ou résumé *</label>
                                    <textarea name="books[0][description]" required id="book-desc-0" rows="2" class="w-full px-4 py-3 border-2 border-emerald-200 rounded-xl bg-white/80 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 font-semibold transition resize-none" placeholder="Décrivez brièvement l'histoire, le genre, les thèmes..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4 justify-between items-center mt-2">
                        <button type="button" onclick="addBook()" class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-cyan-100 to-emerald-100 text-emerald-700 rounded-xl font-bold shadow hover:bg-emerald-200 transition-all">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Ajouter un autre livre
                        </button>
                        <button type="submit" id="submitBtn" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-emerald-500 to-cyan-500 hover:from-emerald-600 hover:to-cyan-600 text-white rounded-2xl font-extrabold text-lg shadow-xl uppercase tracking-wider transition-all border-2 border-white/60">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            Trouver mes recommandations
                        </button>
                    </div>
                </form>

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
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($livres as $livre)
                    <div class="relative group bg-white/70 backdrop-blur-2xl border-l-8 border-emerald-400 rounded-3xl shadow-2xl overflow-visible transition-transform duration-300 hover:scale-105 hover:shadow-emerald-400/40 hover:bg-white/90" style="box-shadow: 0 8px 32px 0 rgba(16, 185, 129, 0.18);">
                        <div class="flex flex-col items-center pt-8 pb-4 px-4 relative">
                            <div class="absolute -left-8 top-8 h-20 w-2 rounded-full bg-gradient-to-b from-emerald-400 to-lime-300 shadow-lg"></div>
                            <div class="-mt-12 mb-2 z-10">
                                @if($livre->image_url)
                                    @if(filter_var($livre->image_url, FILTER_VALIDATE_URL))
                                        <img src="{{ $livre->image_url }}" alt="{{ $livre->titre }}" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-lg bg-emerald-50">
                                    @else
                                        <img src="{{ asset('storage/'.$livre->image_url) }}" alt="{{ $livre->titre }}" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-lg bg-emerald-50">
                                    @endif
                                @else
                                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=698&q=80" alt="Image par défaut" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-lg bg-emerald-50">
                                @endif
                            </div>
                            @if(!is_null($livre->rating))
                                <div class="absolute top-4 right-4 bg-yellow-400/90 text-yellow-900 px-3 py-1 rounded-2xl text-xs font-extrabold shadow-lg border-2 border-yellow-200 flex items-center gap-1">
                                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                                    {{ number_format((float)$livre->rating, 1) }}
                                </div>
                            @endif
                            @if(!is_null($livre->price) && $livre->price > 0)
                                <div class="absolute top-4 left-4 bg-gradient-to-r from-emerald-400 to-lime-400 text-white px-3 py-1 rounded-2xl text-xs font-extrabold shadow-lg border-2 border-emerald-200 flex items-center gap-1">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 9c-3.866 0-7-3.134-7-7s3.134-7 7-7 7 3.134 7 7-3.134 7-7 7z"/></svg>
                                    {{ number_format((float)$livre->price, 2) }} MAD
                                </div>
                            @elseif(!is_null($livre->price) && $livre->price == 0)
                                <div class="absolute top-4 left-4 bg-gradient-to-r from-fuchsia-500 to-pink-400 text-white px-3 py-1 rounded-2xl text-xs font-extrabold shadow-lg border-2 border-fuchsia-200 flex items-center gap-1">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 9c-3.866 0-7-3.134-7-7s3.134-7 7-7 7 3.134 7 7-3.134 7-7 7z"/></svg>
                                    Gratuit
                                </div>
                            @endif
                            <h3 class="text-lg font-extrabold text-emerald-900 mt-2 mb-1 line-clamp-1 drop-shadow-lg text-center">{{ $livre->titre }}</h3>
                            <p class="text-sm text-gray-700 mb-2 line-clamp-2 font-medium text-center">{{ $livre->description }}</p>
                        </div>
                        <div class="flex flex-col gap-2 px-4 pb-4">
                            @php $disponible = (int)($livre->stock ?? 0) > 0; @endphp
                            <span class="mx-auto {{ $disponible ? 'bg-gradient-to-r from-emerald-200 to-lime-200 text-emerald-900' : 'bg-gradient-to-r from-orange-200 to-yellow-200 text-orange-900' }} px-4 py-1 rounded-2xl text-xs font-extrabold shadow border border-emerald-100 mb-2">{{ $disponible ? 'Disponible' : 'Stock épuisé' }}</span>
                        </div>
                        <div class="sticky bottom-0 left-0 w-full bg-white/80 backdrop-blur-lg rounded-b-3xl px-4 py-3 flex justify-center gap-3 border-t border-emerald-100 z-20">
                            <a href="{{ route('livres.show',$livre->id_livre) }}" class="bg-gradient-to-r from-fuchsia-500 to-pink-500 hover:from-fuchsia-600 hover:to-pink-600 text-white px-4 py-2 rounded-full text-sm font-bold uppercase shadow-md transition-all duration-200 border-2 border-white/60">Détails</a>
                            @if($disponible)
                                <a href="{{ route('emprunts.create', $livre->id_livre) }}"
                                    class="bg-gradient-to-r from-emerald-500 to-lime-500 hover:from-emerald-600 hover:to-lime-600 text-white px-4 py-2 rounded-full text-sm font-bold uppercase shadow-md transition-all duration-200 border-2 border-white/60">
                                    Emprunter
                                </a>
                            @else
                                <a href="{{ route('reservation.create', $livre->id_livre) }}" class="bg-gradient-to-r from-orange-500 to-yellow-400 hover:from-orange-600 hover:to-yellow-500 text-white px-4 py-2 rounded-full text-sm font-bold uppercase shadow-md transition-all duration-200 border-2 border-white/60">
                                    Réserver
                                </a>
                            @endif
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
            card.className = 'relative group bg-white/70 backdrop-blur-2xl border-l-8 border-emerald-400 rounded-3xl shadow-2xl overflow-visible transition-transform duration-300 hover:scale-105 hover:shadow-emerald-400/40 hover:bg-white/90';
            card.style.boxShadow = '0 8px 32px 0 rgba(16, 185, 129, 0.18)';
            card.innerHTML = `
                <div class="flex flex-col items-center pt-8 pb-4 px-4 relative">
                    <div class="absolute -left-8 top-8 h-20 w-2 rounded-full bg-gradient-to-b from-emerald-400 to-lime-300 shadow-lg"></div>
                    <div class="-mt-12 mb-2 z-10">
                        <img src="${book.image_url || 'https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=698&q=80'}"
                             alt="${book.titre}"
                             class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-lg bg-emerald-50"
                             onerror="this.src='https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=698&q=80'">
                    </div>
                    <div class="absolute top-4 right-4 bg-yellow-400/90 text-yellow-900 px-3 py-1 rounded-2xl text-xs font-extrabold shadow-lg border-2 border-yellow-200 flex items-center gap-1">
                        <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                        ${book.rating ? Number(book.rating).toFixed(1) : 'N/A'}
                    </div>
                    <div class="absolute top-4 left-4 ${book.price > 0 ? 'bg-gradient-to-r from-emerald-400 to-lime-400 text-white border-emerald-200' : 'bg-gradient-to-r from-fuchsia-500 to-pink-400 text-white border-fuchsia-200'} px-3 py-1 rounded-2xl text-xs font-extrabold shadow-lg border-2 flex items-center gap-1">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 9c-3.866 0-7-3.134-7-7s3.134-7 7-7 7 3.134 7 7-3.134 7-7 7z"/></svg>
                        ${book.price > 0 ? `${Number(book.price).toFixed(2)} MAD` : 'Gratuit'}
                    </div>
                    <h3 class="text-lg font-extrabold text-emerald-900 mt-2 mb-1 line-clamp-1 drop-shadow-lg text-center">${book.titre}</h3>
                    <p class="text-sm text-gray-700 mb-2 line-clamp-2 font-medium text-center">${book.description}</p>
                </div>
                <div class="flex flex-col gap-2 px-4 pb-4">
                    <span class="mx-auto ${book.stock > 0 ? 'bg-gradient-to-r from-emerald-200 to-lime-200 text-emerald-900' : 'bg-gradient-to-r from-orange-200 to-yellow-200 text-orange-900'} px-4 py-1 rounded-2xl text-xs font-extrabold shadow border border-emerald-100 mb-2">${book.stock > 0 ? 'Disponible' : 'Stock épuisé'}</span>
                </div>
                <div class="sticky bottom-0 left-0 w-full bg-white/80 backdrop-blur-lg rounded-b-3xl px-4 py-3 flex justify-center gap-3 border-t border-emerald-100 z-20">
                    <a href="/livres/${book.id_livre}" class="bg-gradient-to-r from-fuchsia-500 to-pink-500 hover:from-fuchsia-600 hover:to-pink-600 text-white px-4 py-2 rounded-full text-sm font-bold uppercase shadow-md transition-all duration-200 border-2 border-white/60">Détails</a>
                    ${book.stock > 0 ?
                        `<a href="/emprunts/create/${book.id_livre}"
                            class="bg-gradient-to-r from-emerald-500 to-lime-500 hover:from-emerald-600 hover:to-lime-600 text-white px-4 py-2 rounded-full text-sm font-bold uppercase shadow-md transition-all duration-200 border-2 border-white/60">
                            Emprunter
                        </a>` :
                        `<a href="/reservation/create/${book.id_livre}"
                            class="bg-gradient-to-r from-orange-500 to-yellow-400 hover:from-orange-600 hover:to-yellow-500 text-white px-4 py-2 rounded-full text-sm font-bold uppercase shadow-md transition-all duration-200 border-2 border-white/60">
                            Réserver
                        </a>`
                    }
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


