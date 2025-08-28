@extends('layouts.tailwind')

@section('title', 'Nouvel Emprunt - Bibliothèque ISIC')

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
    <div class="bg-gradient-to-r from-green-700 via-emerald-600 to-lime-500 text-white py-16 shadow-2xl rounded-b-3xl">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-5xl font-extrabold tracking-tight drop-shadow-2xl flex items-center justify-center gap-3">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Nouvel Emprunt
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-white/90 font-medium">
                    Empruntez le livre "{{ $livre->titre }}" et profitez de votre lecture
                </p>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden border border-green-200">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-green-500 via-emerald-400 to-lime-400 px-8 py-6">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-white mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <h2 class="text-2xl font-extrabold text-white">Détails de l'emprunt</h2>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-10">
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

                <form action="{{ route('emprunts.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Livre (affiché mais non modifiable) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
                            <label for="id_livre_display" class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                Livre sélectionné
                            </label>
         <input type="text"
             id="id_livre_display"
             class="w-full border-2 border-green-200 rounded-2xl px-4 py-3 bg-green-50 text-green-700 cursor-not-allowed focus:outline-none font-bold"
             value="{{ $livre->titre }}"
             disabled>
            <!-- Champ caché envoyé -->
            <input type="hidden" name="id_livre" value="{{ $livre->id_livre }}">
        </div>

        <!-- Date d'emprunt (affichée mais non modifiable) -->
        <div>
                            <label for="date_emprunt_display" class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Date d'emprunt
                            </label>
         <input type="text"
             id="date_emprunt_display"
             class="w-full border-2 border-green-200 rounded-2xl px-4 py-3 bg-green-50 text-green-700 cursor-not-allowed focus:outline-none font-bold"
             value="{{ date('d/m/Y') }}"
             disabled>
            <!-- Champ caché envoyé -->
            <input type="hidden" name="date_emprunt" value="{{ date('Y-m-d') }}">
                        </div>
        </div>

                    <!-- Dates de retour -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Date retour prévue -->
        <div>
                            <label for="date_retour_prevue" class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Date de retour prévue
                            </label>
         <input type="date"
             name="date_retour_prevue"
             id="date_retour_prevue"
             min="{{ date('Y-m-d') }}"
             class="w-full border-2 border-green-200 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition-colors duration-200 bg-white/70 text-green-900 font-semibold">
        </div>

        <!-- Date retour effectif -->
        <div>
                            <label for="date_retour_effectif" class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Date de retour effectif
                            </label>
         <input type="date"
             name="date_retour_effectif"
             id="date_retour_effectif"
             min="{{ date('Y-m-d') }}"
             class="w-full border-2 border-green-200 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition-colors duration-200 bg-white/70 text-green-900 font-semibold">
                        </div>
                    </div>

                    <!-- Informations supplémentaires -->
                    <div class="bg-green-50 border border-green-200 rounded-2xl p-4">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-emerald-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <h3 class="text-sm font-bold text-green-800">Informations importantes</h3>
                        </div>
                        <ul class="text-sm text-green-700 space-y-1">
                            <li>• La date de retour prévue doit être postérieure à aujourd'hui</li>
                            <li>• Vous pouvez modifier la date de retour effectif plus tard</li>
                            <li>• Le statut sera automatiquement défini sur "En cours"</li>
                        </ul>
                    </div>

        <!-- Champs cachés : utilisateur et statut -->
        <input type="hidden" name="id_adherent" value="{{ Auth::id() }}">
        <input type="hidden" name="statut" value="en_cours">

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 pt-4">
                        <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white px-8 py-3 rounded-2xl font-extrabold transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            Confirmer l'emprunt
                        </button>
                        <a href="{{ route('livres.index') }}" class="flex-1 bg-gradient-to-r from-lime-400 to-green-500 hover:from-lime-500 hover:to-green-600 text-white px-8 py-3 rounded-2xl font-bold transition-colors duration-200 text-center">
                            <svg class="w-5 h-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Retour au catalogue
                        </a>
                    </div>
    </form>
            </div>
        </div>
    </div>
</div>
@endsection
