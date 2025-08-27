@extends('layouts.tailwind')

@section('title', 'Mes Emprunts - ' . config('app.name'))

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
                    @if(Auth::user()->role === 'admin')
                        📚 Gestion des Emprunts
                    @else
                        📚 Mes Emprunts
                    @endif
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-blue-100">
                    @if(Auth::user()->role === 'admin')
                        Gérez tous les emprunts de la bibliothèque et suivez les retours de livres.
                    @else
                        Suivez l'historique de vos emprunts et gérez vos retours de livres.
                    @endif
                </p>
            </div>
        </div>
    </div>

    <!-- Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if(Auth::user()->role === 'admin')
        <!-- Header with Stats for Admins -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                        <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                        </svg>
                        Vue d'ensemble des emprunts
                    </h2>
                    <p class="text-gray-600 mt-1">
                        Gérez tous les emprunts de la bibliothèque et suivez les retours
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="{{ route('livres.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Voir le catalogue
                    </a>
                </div>
            </div>
        </div>
        @endif

    @if($emprunts->isEmpty())
            <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    @if(Auth::user()->role === 'admin')
                        Aucun emprunt en cours
                    @else
                        Aucun emprunt en cours
                    @endif
                </h3>
                <p class="text-gray-600">
                    @if(Auth::user()->role === 'admin')
                        Il n'y a actuellement aucun emprunt dans la bibliothèque.
                    @else
                        Vous n'avez pas encore emprunté de livres. Commencez par explorer notre catalogue !
                    @endif
                </p>
                <div class="mt-6">
                    <a href="{{ route('livres.index') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-medium transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        @if(Auth::user()->role === 'admin')
                            Voir le catalogue
                        @else
                            Explorer le catalogue
                        @endif
                    </a>
                </div>
        </div>
    @else
            <!-- Table des emprunts -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-blue-50 to-indigo-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Livre</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Adhérent</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date d'emprunt</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date retour prévue</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date retour effectif</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Statut</th>
                    </tr>
                </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($emprunts as $emprunt)
                                <tr class="hover:bg-blue-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-12 w-12">
                                                @if($emprunt->livre && $emprunt->livre->image_url)
                                                    @if(filter_var($emprunt->livre->image_url, FILTER_VALIDATE_URL))
                                                        <img src="{{ $emprunt->livre->image_url }}"
                                                             alt="{{ $emprunt->livre->titre }}"
                                                             class="h-12 w-12 rounded-lg object-cover border-2 border-gray-200 shadow-sm">
                                                    @else
                                                        <img src="{{ asset('storage/'.$emprunt->livre->image_url) }}"
                                                             alt="{{ $emprunt->livre->titre }}"
                                                             class="h-12 w-12 rounded-lg object-cover border-2 border-gray-200 shadow-sm">
                                                    @endif
                                                @else
                                                    <div class="h-12 w-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-semibold text-gray-900">
                                                    {{ $emprunt->livre->titre ?? 'Livre supprimé' }}
                                                </div>
                                                @if($emprunt->livre && $emprunt->livre->auteur)
                                                    <div class="text-sm text-gray-500">{{ $emprunt->livre->auteur }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            @if($emprunt->adherent)
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                                        <svg class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="font-medium text-gray-900">{{ $emprunt->adherent->nom ?? 'Adhérent inconnu' }}</div>
                                                        <div class="text-xs text-gray-500">ID: {{ $emprunt->id_adherent ?? 'N/A' }}</div>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="text-gray-500">Adhérent supprimé</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($emprunt->date_emprunt)->translatedFormat('d F Y') }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ \Carbon\Carbon::parse($emprunt->date_emprunt)->format('H:i') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            @if($emprunt->date_retour_prevue)
                                                {{ \Carbon\Carbon::parse($emprunt->date_retour_prevue)->translatedFormat('d F Y') }}
                                            @else
                                                <span class="text-gray-400">Non définie</span>
                                            @endif
                                        </div>
                            </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            @if($emprunt->date_retour_effectif)
                                                {{ \Carbon\Carbon::parse($emprunt->date_retour_effectif)->translatedFormat('d F Y') }}
                                                <div class="text-xs text-gray-500">
                                                    {{ \Carbon\Carbon::parse($emprunt->date_retour_effectif)->format('H:i') }}
                                                </div>
                                            @else
                                                <span class="text-gray-400">Non retourné</span>
                                            @endif
                                        </div>
                            </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                @if($emprunt->statut === 'en_cours')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    En cours
                                                </span>

                                                <!-- Bouton pour marquer comme retourné -->
                                                <div x-data="{ showConfirm: false }" class="inline">
                                                    <button type="button"
                                                            @click="showConfirm = true"
                                                            class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-700 bg-green-100 border border-green-300 rounded-full hover:bg-green-200 transition-colors duration-200">
                                                        <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                        Retourner
                                                    </button>

                                                    <!-- Modal de confirmation -->
                                                    <div x-show="showConfirm"
                                                         x-transition:enter="transition ease-out duration-300"
                                                         x-transition:enter-start="opacity-0"
                                                         x-transition:enter-end="opacity-100"
                                                         x-transition:leave="transition ease-in duration-200"
                                                         x-transition:leave-start="opacity-100"
                                                         x-transition:leave-end="opacity-0"
                                                         class="fixed inset-0 z-50 overflow-y-auto"
                                                         style="display: none;">
                                                        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="showConfirm = false"></div>

                                                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                    <div class="sm:flex sm:items-start">
                                                                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                            <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                                                Confirmer le retour
                                                                            </h3>
                                                                            <div class="mt-2">
                                                                                <p class="text-sm text-gray-500">
                                                                                    Êtes-vous sûr de vouloir marquer cet emprunt comme retourné ?
                                                                                    Le livre sera remis en stock.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                    <form action="{{ route('emprunts.status', $emprunt->id_emprunt) }}" method="POST" class="inline">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="status" value="retourne">
                                                                        <button type="submit"
                                                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                            Confirmer
                                                                        </button>
                                                                    </form>
                                                                    <button type="button"
                                                                            @click="showConfirm = false"
                                                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                        Annuler
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Retourné
                                                </span>
                                @endif
                                        </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            </div>

            <!-- Actions -->
            <div class="mt-8 flex justify-center">
                <a href="{{ route('livres.index') }}"
                   class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-medium transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    @if(Auth::user()->role === 'admin')
                        Voir le catalogue
                    @else
            Retour au catalogue
                    @endif
        </a>
            </div>
        @endif
    </div>
</div>
@endsection
