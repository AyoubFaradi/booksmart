@extends('layouts.tailwind')

@section('title', 'Gestion des livres - ' . config('app.name'))

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-100 via-emerald-100 to-lime-100">

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
    <div class="bg-gradient-to-r from-green-600 via-emerald-500 to-lime-500 text-white py-16 shadow-lg rounded-b-3xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-5xl font-extrabold tracking-tight drop-shadow-lg flex items-center justify-center gap-3">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6" />
                    </svg>
                    Gestion des Livres
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-white/90 font-medium">
                    Ajoutez, modifiez ou supprimez des livres de la bibliothèque. Gérez votre collection avec style !
                </p>
            </div>
        </div>
    </div>

    <!-- Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- Actions Header -->
    <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl p-8 mb-10 border border-green-200">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center space-y-4 lg:space-y-0 lg:space-x-6">
                <!-- Barre de recherche -->
                <form method="GET" action="{{ route('livresindex') }}" class="flex-1 max-w-md">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher un livre..."
                               class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all duration-200">
                    </div>
            </form>

                <!-- Boutons d'action -->
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                <a href="{{ route('livres.create') }}"
                       class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl font-semibold hover:from-green-600 hover:to-emerald-700 transform hover:scale-105 transition-all duration-200 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Ajouter un Livre
                    </a>

                <a href="{{ route('home') }}"
                       class="inline-flex items-center justify-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-xl font-medium transition-all duration-200 shadow-md">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>

        @if($livres->count() === 0)
            <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Aucun livre trouvé</h3>
                <p class="text-gray-600">Commencez par ajouter votre premier livre à la bibliothèque.</p>
            </div>
        @else
            <!-- Table CRUD -->
            <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl overflow-hidden border border-green-200">
            <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-green-100 to-lime-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-green-700 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Titre</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Image</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Stock</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Prix</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Note</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-green-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                        <tbody class="bg-white/80 divide-y divide-green-50">
                        @foreach($livres as $livre)
                                <tr class="hover:bg-green-50/60 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        #{{ $livre->id_livre }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-semibold text-gray-900">{{ $livre->titre }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-600 max-w-xs truncate" title="{{ $livre->description }}">
                                            {{ Str::limit($livre->description, 50) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    @if($livre->image_url)
                                            @if(filter_var($livre->image_url, FILTER_VALIDATE_URL))
                                                <!-- Image externe (URL) -->
                                                <img src="{{ $livre->image_url }}"
                                                     class="h-12 w-12 rounded-lg object-cover border-2 border-gray-200 shadow-sm"
                                                     alt="Image du livre">
                                            @else
                                                <!-- Image uploadée localement -->
                                                <img src="{{ asset('storage/'.$livre->image_url) }}"
                                                     class="h-12 w-12 rounded-lg object-cover border-2 border-gray-200 shadow-sm"
                                                     alt="Image du livre">
                                            @endif
                                    @else
                                            <div class="h-12 w-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                                <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                    @endif
                                </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    @if($livre->stock > 0)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                {{ $livre->stock }} disponible
                                            </span>
                                    @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Épuisé
                                            </span>
                                    @endif
                                </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                    {{ number_format($livre->price, 2, ',', ' ') }} MAD
                                </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 mr-1 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.176 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/>
                                            </svg>
                                            <span class="text-sm font-bold text-green-700">{{ $livre->rating }}/5</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('livres.show', $livre->id_livre) }}"
                                               class="inline-flex items-center px-3 py-1.5 bg-emerald-100 hover:bg-emerald-200 text-emerald-800 rounded-xl text-xs font-bold transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <circle cx="12" cy="12" r="10" stroke-width="2" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01" />
                                                </svg>
                                                Détails
                                            </a>
                                            <a href="{{route('livres.edit',$livre->id_livre)}}"
                                               class="inline-flex items-center px-3 py-1.5 bg-lime-100 hover:bg-lime-200 text-lime-800 rounded-xl text-xs font-bold transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.862 3.487a2.121 2.121 0 113 3L7 19.5 3 21l1.5-4L16.862 3.487z" />
                                                </svg>
                                                Modifier
                                            </a>
                                            <button onclick="openModal({{ $livre->id_livre }})"
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-800 rounded-xl text-xs font-bold transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Supprimer
                                            </button>
                                        </div>
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                <div class="bg-white rounded-2xl shadow-lg px-6 py-4">
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
                                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-lg cursor-not-allowed">
                                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                        Précédent
                                    </span>
                                @else
                                    <a href="{{ $livres->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-blue-500 transition-all duration-200 group">
                                        <svg class="w-4 h-4 mr-2 transition-transform duration-200 group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                        Précédent
                                    </a>
                                @endif

                                <!-- Numéros de pages -->
                                <div class="flex items-center space-x-1">
                                    @foreach($livres->getUrlRange(1, $livres->lastPage()) as $page => $url)
                                        @if($page == $livres->currentPage())
                                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-indigo-600 border border-blue-600 rounded-lg shadow-md">
                                                {{ $page }}
                                            </span>
                                        @elseif($page == 1 || $page == $livres->lastPage() || ($page >= $livres->currentPage() - 2 && $page <= $livres->currentPage() + 2))
                                            <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-blue-50 hover:border-blue-500 hover:text-blue-700 transition-all duration-200">
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
                                    <a href="{{ $livres->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-blue-500 transition-all duration-200 group">
                                        Suivant
                                        <svg class="w-4 h-4 ml-2 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                @else
                                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-lg cursor-not-allowed">
                                        Suivant
                                        <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Pagination mobile -->
                        <div class="mt-4 lg:hidden">
                            <div class="flex items-center justify-between">
                                <!-- Bouton Précédent Mobile -->
                                @if($livres->onFirstPage())
                                    <span class="px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-md cursor-not-allowed">
                                        Précédent
                                    </span>
                                @else
                                    <a href="{{ $livres->previousPageUrl() }}" class="px-3 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded-md hover:bg-blue-100 transition-colors duration-200">
                                        Précédent
                                    </a>
                                @endif

                                <!-- Page actuelle Mobile -->
                                <span class="text-sm text-gray-700">
                                    Page {{ $livres->currentPage() }} sur {{ $livres->lastPage() }}
                                </span>

                                <!-- Bouton Suivant Mobile -->
                                @if($livres->hasMorePages())
                                    <a href="{{ $livres->nextPageUrl() }}" class="px-3 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded-md hover:bg-blue-100 transition-colors duration-200">
                                        Suivant
                                    </a>
                                @else
                                    <span class="px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-md cursor-not-allowed">
                                        Suivant
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>

</div>

<!-- Modal de Confirmation Suppression -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-96 p-8 transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-4">
                <svg class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-900 mb-2">Confirmation de suppression</h2>
            <p class="text-gray-600 mb-6">Êtes-vous sûr de vouloir supprimer ce livre ? Cette action est irréversible.</p>
        </div>

        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-lg font-medium transition-colors duration-200">
                    Annuler
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors duration-200">
                    Supprimer
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(id) {
    let form = document.getElementById('deleteForm');
    form.action = "/Books/delete/" + id; // conforme à Route::resource

    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('modalContent');

    modal.classList.remove('hidden');

    // Animation d'entrée
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeModal() {
    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('modalContent');

    // Animation de sortie
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');

    setTimeout(() => {
        modal.classList.add('hidden');
    }, 200);
}

// Fermer le modal en cliquant à l'extérieur
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});
</script>
@endsection
