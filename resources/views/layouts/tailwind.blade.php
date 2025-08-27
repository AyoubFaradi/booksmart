<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('styles')
</head>
<body class="bg-gray-50">
    <nav class="bg-gradient-to-r from-emerald-600 to-cyan-600 shadow-lg sticky top-0 z-50 w-full">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center hover:opacity-80 transition-opacity duration-200">
                        <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.5 12.083 12.083 0 015.84 10.578L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l-9-5" />
                        </svg>
                        <h1 class="ml-2 text-2xl font-bold text-white">Bibliothèque ISIC</h1>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{route('home')}}" class="text-white/90 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-200">Accueil</a>
                    <a href="{{ route('livres.index') }}" class="text-white/90 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-200">Catalogue</a>
                    <a href="{{route('contact')}}" class="text-white/90 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-200">Contact</a>
                </div>

                <div class="flex items-center space-x-4">
                    <button onclick="toggleTheme()" title="Basculer le thème" class="hidden sm:inline-flex items-center justify-center w-9 h-9 rounded-full bg-white/20 hover:bg-white/30 text-white transition-colors duration-200">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3v1"/><path d="M12 20v1"/><path d="M3 12h1"/><path d="M20 12h1"/>
                            <path d="M5.6 5.6l.7.7"/><path d="M17.7 17.7l.7.7"/><path d="M5.6 18.4l.7-.7"/><path d="M17.7 6.3l.7-.7"/>
                            <path d="M12 18a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/>
                        </svg>
                    </button>

                    @auth
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 text-white/90 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <span class="hidden md:block">{{ Auth::user()->nom }}</span>
                                <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-56 rounded-xl shadow-2xl ring-1 ring-white/10 bg-gray-900/95 text-white py-1 z-50 overflow-hidden">
                                <div class="px-4 py-3 border-b border-white/10">
                                    <p class="text-sm font-semibold text-white">{{ Auth::user()->nom }}</p>
                                    <p class="text-xs text-white/70">{{ Auth::user()->email }}</p>
                                    <p class="text-xs text-white/60 capitalize">{{ Auth::user()->role }}</p>
                                </div>

                                @if(Auth::user()->role === 'admin')
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-white/90 hover:bg-white/10 transition-colors duration-200">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                                        </svg>
                                        Dashboard Admin
                                    </div>
                                </a>
                                <a href="{{ route('livresindex') }}" class="block px-4 py-2 text-sm text-white/90 hover:bg-white/10 transition-colors duration-200">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20l9-5-9-5-9 5 9 5z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l9-5-9-5-9 5 9 5z" />
                                        </svg>
                                        Gestion livre
                                    </div>
                                </a>
                                <a href="{{ route('adherentindex') }}" class="block px-4 py-2 text-sm text-white/90 hover:bg-white/10 transition-colors duration-200">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A7.5 7.5 0 0112 15a7.5 7.5 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Gestion adherent
                                    </div>
                                </a>
                                <a href="{{ route('reservations.index') }}" class="block px-4 py-2 text-sm text-white/90 hover:bg-white/10 transition-colors duration-200">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Gestion des réservations
                                    </div>
                                </a>
                                <a href="{{ route('emprunts.index') }}" class="block px-4 py-2 text-sm text-white/90 hover:bg-white/10 transition-colors duration-200">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Gestion des emprunts
                                    </div>
                                </a>
                                @endif

                                <a href="#" class="block px-4 py-2 text-sm text-white/90 hover:bg-white/10 transition-colors duration-200">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Mon Profil
                                    </div>
                                </a>
                                @if(Auth::user()->role === 'adherent')
                                <a href="{{route('emprunts.index')}}" class="block px-4 py-2 text-sm text-white/90 hover:bg-white/10 transition-colors duration-200">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                        Mes Emprunts
                                    </div>
                                </a>
                                <a href="{{route('reservations.index')}}" class="block px-4 py-2 text-sm text-white/90 hover:bg-white/10 transition-colors duration-200">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Mes Réservations
                                    </div>
                                </a>
                                @endif
                                <a href="#" class="block px-4 py-2 text-sm text-white/90 hover:bg-white/10 transition-colors duration-200">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Paramètres
                                    </div>
                                </a>

                                <div class="border-t border-white/10 my-1"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-red-300 hover:bg-red-500/10 transition-colors duration-200">
                                        <div class="flex items-center gap-3">
                                            <svg class="w-5 h-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            Déconnexion
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{route('login')}}" class="text-white/90 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-200">
                            Connexion
                        </a>
                        <a href="{{route('register')}}" class="bg-white hover:bg-emerald-50 text-emerald-700 px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                            Inscription
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="text-gray-800">
        <svg class="w-full block" viewBox="0 0 1440 90" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path fill="currentColor" d="M0,32L60,26.7C120,21,240,11,360,26.7C480,43,600,85,720,85.3C840,85,960,43,1080,26.7C1200,11,1320,21,1380,26.7L1440,32L1440,90L1380,90C1320,90,1200,90,1080,90C960,90,840,90,720,90C600,90,480,90,360,90C240,90,120,90,60,90L0,90Z" />
        </svg>
    </div>

    <footer class="text-white bg-gradient-to-r from-emerald-700 to-cyan-700 dark:from-gray-800 dark:to-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                <div class="md:col-span-5">
                    <div class="flex items-center mb-4">
                        <svg class="h-9 w-9 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <h3 class="ml-2 text-2xl font-extrabold tracking-tight">Bibliothèque ISIC</h3>
                    </div>
                    <p class="text-white/80 text-sm leading-relaxed">
                        Découvrez, empruntez et partagez votre passion pour la lecture. Une expérience moderne et fluide pour accéder à des milliers de livres.
                    </p>
                    <div class="mt-5 flex space-x-3">
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors" aria-label="Facebook">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12.06C22 6.48 17.52 2 11.94 2S2 6.48 2 12.06C2 17.08 5.66 21.2 10.44 22v-7.02H7.9v-2.92h2.54V9.41c0-2.5 1.49-3.88 3.77-3.88 1.09 0 2.23.2 2.23.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.77l-.44 2.92h-2.33V22C18.34 21.2 22 17.08 22 12.06Z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors" aria-label="Twitter">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M22 5.92c-.76.34-1.58.58-2.44.69a4.18 4.18 0 0 0 1.83-2.31 8.34 8.34 0 0 1-2.64 1.01 4.16 4.16 0 0 0-7.09 3.79 11.8 11.8 0 0 1-8.57-4.34 4.17 4.17 0 0 0 1.29 5.55 4.12 4.12 0 0 1-1.89-.52v.05c0 2 1.42 3.68 3.3 4.05a4.2 4.2 0 0 1-1.88.07 4.17 4.17 0 0 0 3.89 2.89A8.36 8.36 0 0 1 2 19.54a11.8 11.8 0 0 0 6.39 1.87c7.67 0 11.86-6.35 11.86-11.86 0-.18 0-.37-.01-.55A8.47 8.47 0 0 0 22 5.92Z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors" aria-label="Instagram">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm10 2H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm-5 3a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 2.2A2.8 2.8 0 1 0 12 16.8 2.8 2.8 0 0 0 12 9.2Zm5.5-.9a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z"/></svg>
                        </a>
                    </div>
                </div>

                <div class="md:col-span-3">
                    <h4 class="text-sm font-semibold tracking-wider uppercase mb-4">Liens rapides</h4>
                    <ul class="space-y-2 text-white/80">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Accueil</a></li>
                        <li><a href="{{ route('livres.index') }}" class="hover:text-white transition-colors">Catalogue</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Nouveautés</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div class="md:col-span-2">
                    <h4 class="text-sm font-semibold tracking-wider uppercase mb-4">Ressources</h4>
                    <ul class="space-y-2 text-white/80">
                        <li><a href="#" class="hover:text-white transition-colors">Aide</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Conditions</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Confidentialité</a></li>
                    </ul>
                </div>

                <div class="md:col-span-2">
                    <h4 class="text-sm font-semibold tracking-wider uppercase mb-4">Newsletter</h4>
                    <div x-data="{ submitted:false, loading:false, email:'', name:'', consent:false, submit(){ if(!this.email || !this.consent){ return; } this.loading=true; setTimeout(()=>{ this.loading=false; this.submitted=true; }, 800); } }">
                        <template x-if="!submitted">
                            <div>
                                <p class="text-white/80 text-sm mb-3">Recevez nos nouveautés, sélections et offres. Désinscription en un clic.</p>
                                <form @submit.prevent="submit" class="space-y-3">
                                    <div class="flex items-stretch">
                                        <input x-model="name" type="text" placeholder="Votre nom (optionnel)" class="hidden sm:block w-40 px-3 py-2 rounded-l-md text-gray-900 placeholder-gray-500 focus:outline-none">
                                        <input x-model="email" type="email" required placeholder="Votre e-mail" class="w-full px-3 py-2 sm:rounded-none sm:rounded-r-none rounded-l-md text-gray-900 placeholder-gray-500 focus:outline-none">
                                        <button type="submit" :disabled="loading || !email || !consent" class="px-4 py-2 bg-white/20 hover:bg-white/30 disabled:opacity-60 disabled:cursor-not-allowed sm:rounded-r-md rounded-r-md font-medium transition-colors flex items-center justify-center min-w-[112px]">
                                            <span x-show="!loading">S'inscrire</span>
                                            <svg x-show="loading" class="animate-spin h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke-width="4"></circle>
                                                <path class="opacity-75" d="M4 12a8 8 0 018-8" stroke-width="4"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <label class="flex items-start space-x-2 text-xs text-white/80">
                                        <input x-model="consent" type="checkbox" class="mt-0.5">
                                        <span>J'accepte de recevoir des e-mails de la Bibliothèque ISIC. <span class="opacity-80">(Politique de confidentialité)</span></span>
                                    </label>
                                </form>
                            </div>
                        </template>
                        <template x-if="submitted">
                            <div class="rounded-lg bg-white/10 px-4 py-3 text-sm">
                                Merci pour votre inscription<span x-show="name">, <span x-text="name"></span></span> ! Vérifiez votre boîte mail pour confirmer.
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-white/20 text-center text-white/80 text-sm">
                &copy; {{ date('Y') }} Bibliothèque ISIC — Tous droits réservés.
            </div>
        </div>
    </footer>

    <script>
    function toggleTheme(){
        const root = document.documentElement;
        root.classList.toggle('dark');
    }
    </script>

    @stack('scripts')
</body>
</html>
