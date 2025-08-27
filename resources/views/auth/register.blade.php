@extends('layouts.tailwind')

@section('title', 'Inscription - Bibliothèque')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 via-white to-green-100 px-6">
    <div class="w-full max-w-lg">
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-green-200">
            <!-- Header -->
            <div class="px-8 py-6 text-center bg-gradient-to-r from-green-600 to-green-500">
                <svg class="mx-auto h-14 w-14 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.104-.896 2-2 2s-2-.896-2-2 .896-2 2-2 2 .896 2 2zM20 21v-2a4 4 0 00-3-3.87M4 21v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 010 7.75" />
                </svg>
                <h2 class="mt-3 text-2xl font-bold text-white">Créer un compte</h2>
                <p class="text-green-100 text-sm mt-1">Accédez à la bibliothèque en quelques clics</p>
            </div>

            <!-- Form -->
            <form class="px-8 py-8 space-y-6" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nom -->
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                    <input id="nom" name="nom" type="text" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 text-gray-900 placeholder-gray-400"
                        placeholder="Votre nom complet" value="{{ old('nom') }}">
                    @error('nom')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
                    <input id="email" name="email" type="email" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 text-gray-900 placeholder-gray-400"
                        placeholder="exemple@email.com" value="{{ old('email') }}">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mot de passe -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                    <input id="password" name="password" type="password" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 placeholder-gray-400"
                        placeholder="Minimum 8 caractères">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmation -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 placeholder-gray-400"
                        placeholder="Répétez le mot de passe">
                </div>

                <!-- Conditions -->
                <div class="flex items-start space-x-2">
                    <input id="terms" name="terms" type="checkbox" required
                        class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <label for="terms" class="text-sm text-gray-600">
                        J'accepte les <a href="#" class="text-green-600 hover:underline">conditions d'utilisation</a> et la <a href="#" class="text-green-600 hover:underline">politique de confidentialité</a>.
                    </label>
                </div>

                <!-- Newsletter -->
                <div class="flex items-start space-x-2">
                    <input id="newsletter" name="newsletter" type="checkbox"
                        class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <label for="newsletter" class="text-sm text-gray-600">
                        Recevoir les nouveautés et offres par email
                    </label>
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center items-center gap-2 py-3 px-4 rounded-lg font-medium text-white bg-green-600 hover:bg-green-700 shadow-md transition duration-200">
                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Créer mon compte
                    </button>
                </div>
            </form>

            <!-- Footer -->
            <div class="px-8 py-4 bg-gray-50 text-center text-sm">
                <p class="text-gray-600">Déjà un compte ?
                    <a href="{{ route('login') }}" class="text-green-600 hover:underline font-medium">Se connecter</a>
                </p>
                <a href="{{ url('/') }}" class="mt-2 inline-block text-gray-500 hover:text-green-600">← Retour à l'accueil</a>
            </div>
        </div>
    </div>
</div>
@endsection
