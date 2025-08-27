@extends('layouts.tailwind')

@section('title', 'Gestion des adhérents - ' . config('app.name'))

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
    <div class="bg-gradient-to-r from-purple-600 to-pink-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold sm:text-5xl md:text-6xl">👥 Gestion des Adhérents</h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-purple-100">
                    Gérez votre communauté de lecteurs. Ajoutez, modifiez et suivez vos adhérents en toute simplicité.
                </p>
            </div>
        </div>
    </div>

    <!-- Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Actions Header -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center space-y-4 lg:space-y-0 lg:space-x-6">
                <!-- Barre de recherche -->
                <form method="GET" action="{{ route('adherentindex') }}" class="flex-1 max-w-md">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher un adhérent..."
                               class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all duration-200">
                    </div>
                </form>

                <!-- Boutons d'action -->
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                    <a href="{{ route('adherents.create') }}"
                       class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl font-semibold hover:from-green-600 hover:to-emerald-700 transform hover:scale-105 transition-all duration-200 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Ajouter un Adhérent
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

    @if($adherent->count() === 0)
            <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Aucun adhérent trouvé</h3>
                <p class="text-gray-600">Commencez par ajouter votre premier adhérent à la bibliothèque.</p>
        </div>
    @else
            <!-- Table CRUD -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-purple-50 to-pink-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date d'inscription</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($adherent as $a)
                                <tr class="hover:bg-purple-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        #{{ $a->id_adherent }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-semibold text-gray-900">{{ $a->nom }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600">{{ $a->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600">
                                            {{ \Carbon\Carbon::parse($a->date_inscription)->translatedFormat('d F Y') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex justify-center space-x-2">
                                <a href="{{ route('adherent.edit', $a->id_adherent) }}"
                                               class="inline-flex items-center px-3 py-1.5 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 rounded-lg text-xs font-medium transition-colors duration-200">
                                                <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Modifier
                                            </a>

                                            <button onclick="openDeleteModal({{ $a->id_adherent }}, '{{ $a->nom }}')"
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-800 rounded-lg text-xs font-medium transition-colors duration-200">
                                                <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
                     <!-- Informations sur les résultats -->
                     <div class="text-center mb-4 text-sm text-gray-600">
                         Affichage de <span class="font-semibold">{{ $adherent->firstItem() ?? 0 }}</span> à <span class="font-semibold">{{ $adherent->lastItem() ?? 0 }}</span>
                         sur <span class="font-semibold">{{ $adherent->total() }}</span> adhérent(s)
                     </div>

                     <!-- Navigation des pages -->
                     <div class="flex items-center justify-center space-x-2">
                         <!-- Bouton Précédent -->
                         @if ($adherent->onFirstPage())
                             <button disabled class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                 <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                 </svg>
                             </button>
                         @else
                             <a href="{{ $adherent->previousPageUrl() }}"
                                class="px-3 py-2 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 transform hover:scale-105">
                                 <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                 </svg>
                             </a>
                         @endif

                         <!-- Numéros de pages -->
                         <div class="flex items-center space-x-1">
                             @php
                                 $start = max(1, $adherent->currentPage() - 2);
                                 $end = min($adherent->lastPage(), $adherent->currentPage() + 2);
                             @endphp

                             <!-- Première page -->
                             @if ($start > 1)
                                 <a href="{{ $adherent->url(1) }}"
                                    class="px-3 py-2 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-purple-50 hover:border-purple-300 hover:text-purple-700 transition-all duration-200">
                                     1
                                 </a>
                                 @if ($start > 2)
                                     <span class="px-2 text-gray-400">...</span>
                                 @endif
                             @endif

                             <!-- Pages autour de la page courante -->
                             @for ($page = $start; $page <= $end; $page++)
                                 @if ($page == $adherent->currentPage())
                                     <span class="px-3 py-2 bg-purple-600 text-white rounded-lg font-semibold">
                                         {{ $page }}
                                     </span>
                                 @else
                                     <a href="{{ $adherent->url($page) }}"
                                        class="px-3 py-2 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-purple-50 hover:border-purple-300 hover:text-purple-700 transition-all duration-200">
                                         {{ $page }}
                                     </a>
                                 @endif
                             @endfor

                             <!-- Dernière page -->
                             @if ($end < $adherent->lastPage())
                                 @if ($end < $adherent->lastPage() - 1)
                                     <span class="px-2 text-gray-400">...</span>
                                 @endif
                                 <a href="{{ $adherent->url($adherent->lastPage()) }}"
                                    class="px-3 py-2 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-purple-50 hover:border-purple-300 hover:text-purple-700 transition-all duration-200">
                                     {{ $adherent->lastPage() }}
                                 </a>
                             @endif
                         </div>

                         <!-- Bouton Suivant -->
                         @if ($adherent->hasMorePages())
                             <a href="{{ $adherent->nextPageUrl() }}"
                                class="px-3 py-2 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 transform hover:scale-105">
                                 <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                 </svg>
                             </a>
                         @else
                             <button disabled class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                 <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                 </svg>
                             </button>
                         @endif
                     </div>

                     <!-- Pagination mobile -->
                     <div class="mt-4 lg:hidden">
                         <div class="flex justify-between items-center">
                             @if ($adherent->onFirstPage())
                                 <button disabled class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed text-sm">
                                     Précédent
                                 </button>
                             @else
                                 <a href="{{ $adherent->previousPageUrl() }}"
                                    class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-200 text-sm">
                                     Précédent
                                 </a>
                             @endif

                             <span class="text-sm text-gray-600">
                                 Page {{ $adherent->currentPage() }} sur {{ $adherent->lastPage() }}
                             </span>

                             @if ($adherent->hasMorePages())
                                 <a href="{{ $adherent->nextPageUrl() }}"
                                    class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-200 text-sm">
                                     Suivant
                                 </a>
                             @else
                                 <button disabled class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed text-sm">
                                     Suivant
                                 </button>
                             @endif
                         </div>
                     </div>
                 </div>
             </div>
        @endif
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
            <p class="text-gray-600 mb-6">Êtes-vous sûr de vouloir supprimer l'adhérent <strong id="adherentName"></strong> ? Cette action est irréversible.</p>
        </div>

        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeDeleteModal()"
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
function openDeleteModal(id, nom) {
    let form = document.getElementById('deleteForm');
    form.action = "{{ route('adherent.destroy', '') }}/" + id;

    document.getElementById('adherentName').textContent = nom;

    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('modalContent');

    modal.classList.remove('hidden');

    // Animation d'entrée
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeDeleteModal() {
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
        closeDeleteModal();
    }
});
</script>

@endsection
