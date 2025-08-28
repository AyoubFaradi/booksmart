@extends('layouts.tailwind')

@section('title', 'Mes Réservations - Bibliothèque ISIC')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 via-green-100 to-emerald-200">
    <!-- Flash Messages -->
    @if(session('success'))
        <div class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
            <div class="bg-emerald-100 border border-emerald-300 text-emerald-900 px-4 py-3 rounded-xl shadow-2xl ring-2 ring-emerald-200">
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
            <div class="bg-red-100 border border-red-300 text-red-900 px-4 py-3 rounded-xl shadow-2xl ring-2 ring-red-200">
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

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-emerald-600 via-lime-500 to-green-600 text-white shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold sm:text-5xl md:text-6xl drop-shadow-lg">
                    <span class="bg-gradient-to-r from-lime-300 via-emerald-400 to-green-500 bg-clip-text text-transparent">Mes Réservations</span>
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-emerald-100 font-medium">
                    Gérez vos réservations de livres et suivez leur statut en toute simplicité
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header with Stats -->
    <div class="bg-gradient-to-br from-emerald-50 via-green-100 to-emerald-200 rounded-2xl shadow-2xl p-8 mb-10 border border-emerald-200 ring-1 ring-emerald-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-2xl font-extrabold text-emerald-900 flex items-center tracking-tight">
                        @if(Auth::user()->role === 'admin')
                            <svg class="w-8 h-8 text-emerald-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Gestion des réservations
                        @else
                            <svg class="w-8 h-8 text-emerald-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Vos réservations
                        @endif
                    </h2>
                    <p class="text-green-700 mt-1">
                        @if(Auth::user()->role === 'admin')
                            Consultez et gérez toutes les réservations de la bibliothèque
                        @else
                            Consultez et gérez toutes vos réservations
                        @endif
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="{{ route('livres.index') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg shadow-md transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Voir le catalogue
                    </a>
                </div>
            </div>
        </div>

        <!-- Reservations List -->
        @if($reservations->count() > 0)
            <div class="grid gap-8">
                @foreach($reservations as $reservation)
                    <div class="bg-gradient-to-br from-emerald-50 via-green-100 to-emerald-200 rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl border border-emerald-200 ring-1 ring-emerald-100 transition-shadow duration-300">
                        <div class="p-8">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                <!-- Book Info -->
                                <div class="flex items-start space-x-4 flex-1">
                                    <!-- Book Image -->
                                    <div class="flex-shrink-0">
                                        <img src="{{ filter_var($reservation->livre->image_url, FILTER_VALIDATE_URL) ? $reservation->livre->image_url : asset('storage/'.$reservation->livre->image_url) }}"
                                             alt="{{ $reservation->livre->titre }}"
                                             class="w-20 h-28 object-cover rounded-xl shadow-lg border-2 border-emerald-200 bg-white"
                                             onerror="this.src='{{ asset('images/default-book.jpg') }}'">
                                    </div>

                                    <!-- Book Details -->
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-xl font-bold text-emerald-900 mb-1">{{ $reservation->livre->titre }}</h3>
                                        <p class="text-green-700 mb-2">{{ $reservation->livre->auteur }}</p>

                                        <!-- Reservation Details -->
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                                            <div>
                                                <span class="text-green-700">Date de réservation :</span>
                                                <span class="font-semibold text-emerald-900">{{ \Carbon\Carbon::parse($reservation->date_reservation)->format('d/m/Y') }}</span>
                                            </div>
                                            <div>
                                                <span class="text-green-700">Statut :</span>
                                                @if($reservation->status === 'en_attente')
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800 shadow-sm">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        En attente
                                                    </span>
                                                @elseif($reservation->status === 'confirmee')
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 shadow-sm">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                        Confirmée
                                                    </span>
                                                @elseif($reservation->status === 'annulee')
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-800 shadow-sm">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293-4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        Annulée
                                                    </span>
                                                @endif
                                            </div>

                                            @if(Auth::user()->role === 'admin')
                                            <div>
                                                <span class="text-green-700">Adhérent :</span>
                                                <div class="flex items-center mt-1">
                                                    <div class="w-6 h-6 bg-emerald-100 rounded-full flex items-center justify-center mr-2">
                                                        <svg class="w-3 h-3 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                        </svg>
                                                    </div>
                                                    <span class="font-semibold text-emerald-900">{{ $reservation->adherent->nom ?? 'Adhérent inconnu' }}</span>
                                                    <span class="text-xs text-green-700 ml-2">(ID: {{ $reservation->id_adherent }})</span>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                                                 <!-- Actions -->
                                 <div class="flex flex-col sm:flex-row gap-2 mt-4 lg:mt-0 lg:ml-6">
                                                 <a href="{{ route('livres.show', $reservation->livre->id_livre) }}"
                                                     class="inline-flex items-center justify-center px-4 py-2 border border-emerald-300 rounded-lg text-sm font-semibold text-emerald-700 bg-white hover:bg-emerald-50 shadow transition-colors duration-200">
                                         <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                         </svg>
                                         Voir détails
                                     </a>

                                     @if(Auth::user()->role === 'admin')
                                         <!-- Actions pour les admins -->
                                         @if($reservation->status === 'en_attente')
                                             <!-- Bouton Accepter -->
                                             <div x-data="{ showConfirmAccept: false }" class="inline">
                                                 <button type="button"
                                                         @click="showConfirmAccept = true"
                                                         class="inline-flex items-center justify-center px-4 py-2 border border-emerald-400 rounded-lg text-sm font-semibold text-emerald-700 bg-white hover:bg-emerald-50 shadow transition-colors duration-200">
                                                     <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                     </svg>
                                                     Accepter
                                                 </button>

                                                 <!-- Modal de confirmation pour accepter -->
                                                 <div x-show="showConfirmAccept"
                                                      x-transition:enter="transition ease-out duration-300"
                                                      x-transition:enter-start="opacity-0"
                                                      x-transition:enter-end="opacity-100"
                                                      x-transition:leave="transition ease-in duration-200"
                                                      x-transition:leave-start="opacity-100"
                                                      x-transition:leave-end="opacity-0"
                                                      class="fixed inset-0 z-50 overflow-y-auto"
                                                      style="display: none;">
                                                     <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                         <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="showConfirmAccept = false"></div>

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
                                                                             Confirmer l'acceptation
                                                                         </h3>
                                                                         <div class="mt-2">
                                                                             <p class="text-sm text-gray-500">
                                                                                 Êtes-vous sûr de vouloir accepter cette réservation ?
                                                                                 Le livre sera réservé pour cet adhérent.
                                                                             </p>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                 <form action="{{ route('reservations.status', $reservation->livre->id_livre) }}" method="POST" class="inline">
                                                                     @csrf
                                                                     @method('PUT')
                                                                     <input type="hidden" name="status" value="confirmee">
                                                                     <button type="submit"
                                                                             class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                         Confirmer
                                                                     </button>
                                                                 </form>
                                                                 <button type="button"
                                                                         @click="showConfirmAccept = false"
                                                                         class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                     Annuler
                                                                 </button>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endif

                                         @if($reservation->status === 'confirmee')
                                             <!-- Bouton Remettre en attente -->
                                             <div x-data="{ showConfirmRemettre: false }" class="inline">
                                                 <button type="button"
                                                         @click="showConfirmRemettre = true"
                                                         class="inline-flex items-center justify-center px-4 py-2 border border-lime-400 rounded-lg text-sm font-semibold text-lime-700 bg-white hover:bg-lime-50 shadow transition-colors duration-200">
                                                     <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                     </svg>
                                                     Remettre en attente
                                                 </button>

                                                 <!-- Modal de confirmation pour remettre en attente -->
                                                 <div x-show="showConfirmRemettre"
                                                      x-transition:enter="transition ease-out duration-300"
                                                      x-transition:enter-start="opacity-0"
                                                      x-transition:enter-end="opacity-100"
                                                      x-transition:leave="transition ease-in duration-200"
                                                      x-transition:leave-start="opacity-100"
                                                      x-transition:leave-end="opacity-0"
                                                      class="fixed inset-0 z-50 overflow-y-auto"
                                                      style="display: none;">
                                                     <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                         <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="showConfirmRemettre = false"></div>

                                                         <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                             <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                 <div class="sm:flex sm:items-start">
                                                                     <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                         <svg class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                         </svg>
                                                                     </div>
                                                                     <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                         <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                                             Remettre en attente
                                                                         </h3>
                                                                         <div class="mt-2">
                                                                             <p class="text-sm text-gray-500">
                                                                                 Êtes-vous sûr de vouloir remettre cette réservation en attente ?
                                                                                 L'adhérent devra attendre que le livre soit disponible.
                                                                             </p>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                 <form action="{{ route('reservations.status', $reservation->livre->id_livre) }}" method="POST" class="inline">
                                                                     @csrf
                                                                     @method('PUT')
                                                                     <input type="hidden" name="status" value="en_attente">
                                                                     <button type="submit"
                                                                             class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-600 text-base font-medium text-white hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                         Confirmer
                                                                     </button>
                                                                 </form>
                                                                 <button type="button"
                                                                         @click="showConfirmRemettre = false"
                                                                         class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                     Annuler
                                                                 </button>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endif

                                         @if($reservation->status !== 'annulee')
                                             <!-- Bouton Annuler -->
                                             <div x-data="{ showConfirmAnnuler: false }" class="inline">
                                                 <button type="button"
                                                         @click="showConfirmAnnuler = true"
                                                         class="inline-flex items-center justify-center px-4 py-2 border border-red-400 rounded-lg text-sm font-semibold text-red-700 bg-white hover:bg-red-50 shadow transition-colors duration-200">
                                                     <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                     </svg>
                                                     Annuler
                                                 </button>

                                                 <!-- Modal de confirmation pour annuler -->
                                                 <div x-show="showConfirmAnnuler"
                                                      x-transition:enter="transition ease-out duration-300"
                                                      x-transition:enter-start="opacity-0"
                                                      x-transition:enter-end="opacity-100"
                                                      x-transition:leave="transition ease-in duration-200"
                                                      x-transition:leave-start="opacity-100"
                                                      x-transition:leave-end="opacity-0"
                                                      class="fixed inset-0 z-50 overflow-y-auto"
                                                      style="display: none;">
                                                     <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                         <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="showConfirmAnnuler = false"></div>

                                                         <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                             <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                 <div class="sm:flex sm:items-start">
                                                                     <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                         <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                         </svg>
                                                                     </div>
                                                                     <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                         <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                                             Confirmer l'annulation
                                                                         </h3>
                                                                         <div class="mt-2">
                                                                             <p class="text-sm text-gray-500">
                                                                                 Êtes-vous sûr de vouloir annuler cette réservation ?
                                                                                 Cette action peut être réversible.
                                                                             </p>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                 <form action="{{ route('reservations.status', $reservation->livre->id_livre) }}" method="POST" class="inline">
                                                                     @csrf
                                                                     @method('PUT')
                                                                     <input type="hidden" name="status" value="annulee">
                                                                     <button type="submit"
                                                                             class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                         Confirmer
                                                                     </button>
                                                                 </form>
                                                                 <button type="button"
                                                                         @click="showConfirmAnnuler = false"
                                                                         class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                     Annuler
                                                                 </button>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endif


                                     @else
                                         <!-- Actions pour les adhérents - seulement annuler -->
                                         @if($reservation->status !== 'annulee')
                                             <!-- Bouton Annuler (changer le statut) -->
                                             <div x-data="{ showConfirmAnnulerAdherent: false }" class="inline">
                                                 <button type="button"
                                                         @click="showConfirmAnnulerAdherent = true"
                                                         class="inline-flex items-center justify-center px-4 py-2 border border-lime-400 rounded-lg text-sm font-semibold text-lime-700 bg-white hover:bg-lime-50 shadow transition-colors duration-200">
                                                     <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                     </svg>
                                                     Annuler
                                                 </button>

                                                 <!-- Modal de confirmation pour annuler (adhérent) -->
                                                 <div x-show="showConfirmAnnulerAdherent"
                                                      x-transition:enter="transition ease-out duration-300"
                                                      x-transition:enter-start="opacity-0"
                                                      x-transition:enter-end="opacity-100"
                                                      x-transition:leave="transition ease-in duration-200"
                                                      x-transition:leave-start="opacity-100"
                                                      x-transition:leave-end="opacity-0"
                                                      class="fixed inset-0 z-50 overflow-y-auto"
                                                      style="display: none;">
                                                     <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                         <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="showConfirmAnnulerAdherent = false"></div>

                                                         <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                             <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                 <div class="sm:flex sm:items-start">
                                                                     <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-orange-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                         <svg class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                         </svg>
                                                                     </div>
                                                                     <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                         <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                                             Confirmer l'annulation
                                                                         </h3>
                                                                         <div class="mt-2">
                                                                             <p class="text-sm text-gray-500">
                                                                                 Êtes-vous sûr de vouloir annuler cette réservation ?
                                                                                 Vous pourrez la réactiver plus tard si nécessaire.
                                                                             </p>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                 <form action="{{ route('reservations.status', $reservation->livre->id_livre) }}" method="POST" class="inline">
                                                                     @csrf
                                                                     @method('PUT')
                                                                     <input type="hidden" name="status" value="annulee">
                                                                     <button type="submit"
                                                                             class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-orange-600 text-base font-medium text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                         Confirmer
                                                                     </button>
                                                                 </form>
                                                                 <button type="button"
                                                                         @click="showConfirmAnnulerAdherent = false"
                                                                         class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                     Annuler
                                                                 </button>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endif
                                     @endif

                                 </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($reservations->hasPages())
                <div class="mt-8">
                    <div class="flex items-center justify-between">
                        <!-- Informations sur les résultats -->
                        <div class="text-sm text-gray-700">
                            Affichage de
                            <span class="font-medium">{{ $reservations->firstItem() ?? 0 }}</span>
                            à
                            <span class="font-medium">{{ $reservations->lastItem() ?? 0 }}</span>
                            sur
                            <span class="font-medium">{{ $reservations->total() }}</span>
                            réservation(s)
                        </div>

                        <!-- Navigation de pagination -->
                        <div class="flex items-center space-x-2">
                            <!-- Bouton Précédent -->
                            @if($reservations->onFirstPage())
                                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-lg cursor-not-allowed">
                                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                    Précédent
                                </span>
                            @else
                                <a href="{{ $reservations->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                    Précédent
                                </a>
                            @endif

                            <!-- Numéros de pages -->
                            <div class="flex items-center space-x-1">
                                @foreach($reservations->getUrlRange(1, $reservations->lastPage()) as $page => $url)
                                    @if($page == $reservations->currentPage())
                                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-purple-600 border border-purple-600 rounded-lg">
                                            {{ $page }}
                                        </span>
                                    @elseif($page == 1 || $page == $reservations->lastPage() || ($page >= $reservations->currentPage() - 2 && $page <= $reservations->currentPage() + 2))
                                        <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                            {{ $page }}
                                        </a>
                                    @elseif($page == $reservations->currentPage() - 3 || $page == $reservations->currentPage() + 3)
                                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400">
                                            ...
                                        </span>
                                    @endif
                                @endforeach
                            </div>

                            <!-- Bouton Suivant -->
                            @if($reservations->hasMorePages())
                                <a href="{{ $reservations->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
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
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 bg-emerald-100 rounded-full flex items-center justify-center mb-6 shadow-lg">
                    <svg class="w-12 h-12 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-emerald-900 mb-2">Aucune réservation</h3>
                <p class="text-green-700 mb-6">Vous n'avez pas encore de réservations. Parcourez notre catalogue pour réserver des livres !</p>
                <a href="{{ route('livres.index') }}" class="inline-flex items-center px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg shadow-md transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Parcourir le catalogue
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
