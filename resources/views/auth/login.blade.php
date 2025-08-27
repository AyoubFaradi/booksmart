@extends('layouts.tailwind')

@section('title', 'Connexion - Bibliothèque')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-700 via-emerald-600 to-lime-500 px-6">
    <div class="max-w-md w-full">
        <!-- Card -->
        <div class="bg-white shadow-2xl rounded-3xl px-10 py-12">
            <!-- Header -->
            <div class="text-center">
                <div class="flex justify-center mb-4">
                    <svg class="h-14 w-14 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.105-.895 2-2 2s-2-.895-2-2 .895-2 2-2 2 .895 2 2zM12 14v1m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-extrabold text-gray-900">Connexion</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Pas encore de compte ?
                    <a href="{{ route('register') }}" class="text-green-600 hover:text-green-500 transition">
                        Inscrivez-vous
                    </a>
                </p>
            </div>

            <!-- Form -->
            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-green-600">
                            <!-- Icône Email -->
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m8 0l-4-4m4 4l-4 4m12-6a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </span>
                        <input id="email" name="email" type="email" required autocomplete="email"
                            class="pl-10 pr-4 py-2 w-full rounded-lg border border-gray-300 placeholder-gray-400 
                                   focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none @error('email') border-red-500 @enderror"
                            placeholder="exemple@email.com"
                            value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-green-600">
                            <!-- Icône Lock -->
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c.667 0 1-.333 1-1V8a4 4 0 00-8 0v2c0 .667.333 1 1 1h6zM5 11v7a2 2 0 002 2h10a2 2 0 002-2v-7H5z"/>
                            </svg>
                        </span>
                        <input id="password" name="password" type="password" required autocomplete="current-password"
                            class="pl-10 pr-4 py-2 w-full rounded-lg border border-gray-300 placeholder-gray-400 
                                   focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none @error('password') border-red-500 @enderror"
                            placeholder="Votre mot de passe">
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center text-gray-700">
                        <input id="remember_me" name="remember" type="checkbox"
                               class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                        <span class="ml-2">Se souvenir de moi</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-green-600 hover:text-green-500 transition">
                        Mot de passe oublié ?
                    </a>
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="w-full py-3 rounded-lg bg-green-600 hover:bg-green-700 text-white font-bold shadow-md transition">
                        🔑 Se connecter
                    </button>
                </div>
            </form>
        </div>

        <!-- Back -->
        <div class="text-center mt-6">
            <a href="{{ url('/') }}" class="text-sm text-gray-200 hover:text-green-300 transition">
                ← Retour à l'accueil
            </a>
        </div>
    </div>
</div>
@endsection
