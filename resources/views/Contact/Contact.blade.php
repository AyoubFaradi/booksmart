@extends('layouts.tailwind')

@section('title', 'Contact - Bibliothèque ISIC')

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

    <!-- Hero -->
    <div class="bg-gradient-to-r from-emerald-600 to-cyan-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold sm:text-5xl md:text-6xl">Contactez-nous</h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-emerald-100">Une question, une suggestion ? Envoyez-nous un message.</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <!-- Hero Card -->
                <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-600 to-cyan-600 text-white p-8">
                    <div class="absolute -top-12 -right-12 w-56 h-56 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-white/10 rounded-full blur-xl"></div>
                    <div class="relative">
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-white/20 text-white text-xs font-semibold tracking-wide">Support & Aide</span>
                        <h2 class="mt-4 text-3xl sm:text-4xl font-extrabold">Nous sommes là pour vous aider</h2>
                        <p class="mt-3 text-emerald-50 max-w-2xl">Questions sur les emprunts, réservations ou votre compte ? Contactez notre équipe — réponse rapide garantie.</p>
                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="mailto:{{ $supportEmail ?? 'simplon@gmail.com' }}" class="inline-flex items-center gap-2 bg-white text-emerald-700 hover:bg-emerald-50 px-4 py-2 rounded-lg font-medium transition-colors">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                Écrire un e‑mail
                            </a>
                            <a href="tel:{{ preg_replace('/\s+/', '', ($supportPhone ?? '+212600000000')) }}" class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg font-medium">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                Appeler le support
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Methods -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="rounded-2xl border border-emerald-100 bg-white p-6 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-lg bg-emerald-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </span>
                            <div>
                                <h3 class="font-semibold text-gray-900">Email</h3>
                                <p class="text-sm text-gray-600">{{ $supportEmail ?? 'simplon@gmail.com' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-emerald-100 bg-white p-6 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-lg bg-emerald-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </span>
                            <div>
                                <h3 class="font-semibold text-gray-900">Téléphone</h3>
                                <p class="text-sm text-gray-600">{{ $supportPhone ?? '+212 6 55 05 85 99' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-emerald-100 bg-white p-6 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-lg bg-emerald-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </span>
                            <div>
                                <h3 class="font-semibold text-gray-900">Adresse</h3>
                                <p class="text-sm text-gray-600">{{ $address ?? '04 Avenue des Abdelmoumen, Casablanca' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-emerald-100 bg-white p-6 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-lg bg-emerald-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            </span>
                            <div>
                                <h3 class="font-semibold text-gray-900">Réseaux sociaux</h3>
                                <p class="text-sm text-gray-600">Facebook, Twitter, Instagram</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats -->
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="rounded-2xl bg-white p-6 border border-emerald-100">
                        <p class="text-sm text-gray-500">Satisfaction</p>
                        <p class="mt-2 text-3xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-cyan-600">98%</p>
                        <p class="text-xs text-gray-500 mt-1">Basé sur les retours utilisateurs</p>
                    </div>
                    <div class="rounded-2xl bg-white p-6 border border-emerald-100">
                        <p class="text-sm text-gray-500">Temps de réponse</p>
                        <p class="mt-2 text-3xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-cyan-600">&lt; 2h</p>
                        <p class="text-xs text-gray-500 mt-1">En heures ouvrables</p>
                    </div>
                    <div class="rounded-2xl bg-white p-6 border border-emerald-100">
                        <p class="text-sm text-gray-500">Tickets résolus</p>
                        <p class="mt-2 text-3xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-cyan-600">1.2k+</p>
                        <p class="text-xs text-gray-500 mt-1">Depuis le lancement</p>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
                <div class="mb-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Informations de contact</h3>
                    <p class="text-gray-600">Notre équipe est là pour vous aider</p>
                </div>

                <div class="space-y-6">
                    <!-- Email -->
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900">Email</h4>
                            <p class="text-sm text-gray-600">{{ $supportEmail ?? 'support@isic.test' }}</p>
                        </div>
                    </div>

                    <!-- Téléphone -->
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900">Téléphone</h4>
                            <p class="text-sm text-gray-600">{{ $supportPhone ?? '+212 6 00 00 00 00' }}</p>
                        </div>
                    </div>

                    <!-- Adresse -->
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900">Adresse</h4>
                            <p class="text-sm text-gray-600">{{ $address ?? '123 Avenue des Lecteurs, Rabat' }}</p>
                        </div>
                    </div>

                    <!-- Horaires -->
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900">Horaires</h4>
                            <p class="text-sm text-gray-600">{{ $hours ?? 'Lun-Ven: 9h-18h' }}</p>
                        </div>
                    </div>
                </div>

                @if(!empty($popularSubjects ?? []))
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h4 class="text-sm font-semibold text-gray-900 mb-3">Sujets populaires</h4>
                        <div class="space-y-2">
                            @foreach($popularSubjects as $sujet)
                                <div class="flex items-center space-x-2 text-sm text-gray-600">
                                    <svg class="w-3 h-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ $sujet }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
