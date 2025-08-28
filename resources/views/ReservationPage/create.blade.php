@extends('layouts.tailwind')

@section('title', 'Nouvelle Réservation - Bibliothèque ISIC')

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

    @if(session('info'))
        <div class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
            <div class="bg-lime-100 border border-lime-300 text-lime-900 px-4 py-3 rounded-xl shadow-2xl ring-2 ring-lime-200">
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
    <div class="bg-gradient-to-r from-emerald-600 via-lime-500 to-green-600 text-white shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold sm:text-5xl md:text-6xl drop-shadow-lg">
                    <span class="bg-gradient-to-r from-lime-300 via-emerald-400 to-green-500 bg-clip-text text-transparent">Nouvelle Réservation</span>
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-emerald-100 font-medium">
                    @if(isset($livre))
                        Réservez le livre "{{ $livre->titre }}" qui n'est actuellement pas disponible
                    @else
                        Réservez un livre qui n'est actuellement pas disponible
                    @endif
                </p>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-gradient-to-br from-emerald-50 via-green-100 to-emerald-200 rounded-2xl shadow-2xl overflow-hidden border border-emerald-200 ring-1 ring-emerald-100">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-emerald-600 via-lime-500 to-green-600 px-6 py-4">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-white mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h2 class="text-2xl font-bold text-white">Détails de la réservation</h2>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-8">
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <h3 class="text-lg font-semibold text-red-800">Erreurs de validation</h3>
                        </div>
                        <ul class="list-disc list-inside text-red-700 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('reservations.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Book Selection -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="id_livre" class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                Livre à réserver
                            </label>

                            @if(isset($livre))
                                <!-- If a specific book is selected -->
                                <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4">
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ filter_var($livre->image_url, FILTER_VALIDATE_URL) ? $livre->image_url : asset('storage/'.$livre->image_url) }}"
                                             alt="{{ $livre->titre }}"
                                             class="w-20 h-28 object-cover rounded-xl shadow-lg border-2 border-emerald-200 bg-white"
                                             onerror="this.src='{{ asset('images/default-book.jpg') }}'">
                                        <div>
                                            <h3 class="text-xl font-bold text-emerald-900">{{ $livre->titre }}</h3>
                                            <p class="text-green-700">{{ $livre->auteur }}</p>
                                            <p class="text-sm text-green-700">Stock: <span class="font-semibold text-red-600">0</span> (Indisponible)</p>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_livre" value="{{ $livre->id_livre }}">
                                </div>
                            @else
                                <!-- If no specific book, show dropdown of unavailable books -->
                <select name="id_livre" id="id_livre" required
                    class="w-full border border-emerald-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200">
                                    <option value="">Sélectionnez un livre indisponible</option>
                                    @foreach($livres as $livre)
                                        <option value="{{ $livre->id_livre }}" {{ old('id_livre') == $livre->id_livre ? 'selected' : '' }}>
                                            {{ $livre->titre }} - {{ $livre->auteur }} (Stock: 0)
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <!-- Reservation Date -->
                        <div>
                            <label for="date_reservation" class="block text-sm font-semibold text-green-700 mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Date de réservation
                            </label>
                            <input type="date"
                                   name="date_reservation"
                                   id="date_reservation"
                                   value="{{ old('date_reservation', date('Y-m-d')) }}"
                                   required
                                   class="w-full border border-emerald-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200">
                        </div>
                    </div>

                    <!-- Informations supplémentaires -->
                    <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-emerald-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <h3 class="text-sm font-semibold text-emerald-800">Informations importantes</h3>
                        </div>
                        <ul class="text-sm text-green-700 space-y-1">
                            <li>• Vous ne pouvez réserver qu'un livre à la fois</li>
                            <li>• La réservation sera en attente jusqu'à ce que le livre soit disponible</li>
                            <li>• Vous recevrez une notification quand le livre sera de nouveau en stock</li>
                            <li>• Vous pouvez annuler votre réservation à tout moment</li>
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 pt-4">
                        <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-600 via-lime-500 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Créer la réservation
                        </button>
                        <a href="{{ route('reservations.index') }}" class="flex-1 bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-3 rounded-xl font-semibold transition-colors duration-200 text-center">
                            <svg class="w-5 h-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Retour aux réservations
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
