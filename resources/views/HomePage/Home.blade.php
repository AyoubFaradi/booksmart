@extends('layouts.tailwind')

@section('title', 'Bibliothèque ISIC - ' . config('app.name'))

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
    <div class="bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
            <div class="text-center">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-semibold">Bibliothèque ISIC</span>
                <h1 class="mt-4 text-4xl sm:text-5xl font-extrabold tracking-tight text-gray-900">
                    Trouvez votre prochaine lecture
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                    Recherchez par titre, auteur ou thème et explorez nos sélections tendance.
                </p>
                <form method="GET" action="{{ route('livres.index') }}" class="mt-8 max-w-2xl mx-auto">
                    <div class="flex gap-3">
                        <input name="q" value="{{ request('q') }}" placeholder="Rechercher un livre, un auteur, un thème..." class="flex-1 px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 bg-white"/>
                        <button class="px-5 py-3 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700 transition-colors">Rechercher</button>
                    </div>
                </form>
                <div class="mt-6 flex flex-wrap gap-2 justify-center">
                    <span class="text-xs text-gray-500">Populaires :</span>
                    @foreach(["Science-fiction","Développement personnel","Romance","Technologie","Histoire"] as $tag)
                        <a href="{{ route('livres.index', ['q' => $tag]) }}" class="px-3 py-1 rounded-full text-xs bg-gray-100 hover:bg-gray-200 text-gray-700 transition">#{{ $tag }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Books Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Livres populaires</h2>
            <p class="text-lg text-gray-600">Découvrez nos livres les plus appréciés par nos lecteurs</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($livres as $livre)
                <div class="relative group bg-white/70 backdrop-blur-2xl border-l-8 border-emerald-400 rounded-3xl shadow-2xl overflow-visible transition-transform duration-300 hover:scale-105 hover:shadow-emerald-400/40 hover:bg-white/90" style="box-shadow: 0 8px 32px 0 rgba(16, 185, 129, 0.18);">
                    <div class="flex flex-col items-center pt-8 pb-4 px-4 relative">
                        <div class="absolute -left-8 top-8 h-20 w-2 rounded-full bg-gradient-to-b from-emerald-400 to-lime-300 shadow-lg"></div>
                        <div class="-mt-12 mb-2 z-10">
                            @if($livre->image_url)
                                @if(filter_var($livre->image_url, FILTER_VALIDATE_URL))
                                    <img src="{{ $livre->image_url }}" alt="{{ $livre->titre }}" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-lg bg-emerald-50">
                                @else
                                    <img src="{{ asset('storage/'.$livre->image_url) }}" alt="{{ $livre->titre }}" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-lg bg-emerald-50">
                                @endif
                            @else
                                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=698&q=80" alt="Image par défaut" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-lg bg-emerald-50">
                            @endif
                        </div>
                        @if(!is_null($livre->rating))
                            <div class="absolute top-4 right-4 bg-yellow-400/90 text-yellow-900 px-3 py-1 rounded-2xl text-xs font-extrabold shadow-lg border-2 border-yellow-200 flex items-center gap-1">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                                {{ number_format((float)$livre->rating, 1) }}
                            </div>
                        @endif
                        @if(!is_null($livre->price) && $livre->price > 0)
                            <div class="absolute top-4 left-4 bg-gradient-to-r from-emerald-400 to-lime-400 text-white px-3 py-1 rounded-2xl text-xs font-extrabold shadow-lg border-2 border-emerald-200 flex items-center gap-1">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 9c-3.866 0-7-3.134-7-7s3.134-7 7-7 7 3.134 7 7-3.134 7-7 7z"/></svg>
                                {{ number_format((float)$livre->price, 2) }} MAD
                            </div>
                        @elseif(!is_null($livre->price) && $livre->price == 0)
                            <div class="absolute top-4 left-4 bg-gradient-to-r from-fuchsia-500 to-pink-400 text-white px-3 py-1 rounded-2xl text-xs font-extrabold shadow-lg border-2 border-fuchsia-200 flex items-center gap-1">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 9c-3.866 0-7-3.134-7-7s3.134-7 7-7 7 3.134 7 7-3.134 7-7 7z"/></svg>
                                Gratuit
                            </div>
                        @endif
                        <h3 class="text-lg font-extrabold text-emerald-900 mt-2 mb-1 line-clamp-1 drop-shadow-lg text-center">{{ $livre->titre }}</h3>
                        <p class="text-sm text-gray-700 mb-2 line-clamp-2 font-medium text-center">{{ $livre->description }}</p>
                    </div>
                    <div class="flex flex-col gap-2 px-4 pb-4">
                        @php $disponible = (int)($livre->stock ?? 0) > 0; @endphp
                        <span class="mx-auto {{ $disponible ? 'bg-gradient-to-r from-emerald-200 to-lime-200 text-emerald-900' : 'bg-gradient-to-r from-orange-200 to-yellow-200 text-orange-900' }} px-4 py-1 rounded-2xl text-xs font-extrabold shadow border border-emerald-100 mb-2">{{ $disponible ? 'Disponible' : 'Stock épuisé' }}</span>
                    </div>
                    <div class="sticky bottom-0 left-0 w-full bg-white/80 backdrop-blur-lg rounded-b-3xl px-4 py-3 flex justify-center gap-3 border-t border-emerald-100 z-20">
                        <a href="{{ route('livres.show', $livre->id_livre) }}" class="bg-gradient-to-r from-fuchsia-500 to-pink-500 hover:from-fuchsia-600 hover:to-pink-600 text-white px-4 py-2 rounded-full text-sm font-bold uppercase shadow-md transition-all duration-200 border-2 border-white/60">Détails</a>
                        @if($disponible)
                            <a href="{{ route('emprunts.create', $livre->id_livre) }}"
                                class="bg-gradient-to-r from-emerald-500 to-lime-500 hover:from-emerald-600 hover:to-lime-600 text-white px-4 py-2 rounded-full text-sm font-bold uppercase shadow-md transition-all duration-200 border-2 border-white/60">
                                Emprunter
                            </a>
                        @else
                            <a href="{{ route('reservation.create', $livre->id_livre) }}" class="bg-gradient-to-r from-orange-500 to-yellow-400 hover:from-orange-600 hover:to-yellow-500 text-white px-4 py-2 rounded-full text-sm font-bold uppercase shadow-md transition-all duration-200 border-2 border-white/60">
                                Réserver
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('livres.index') }}" class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-lg text-lg font-medium transition-colors duration-200">
                Voir plus de livres
            </a>
        </div>
    </div>

    <!-- Section Recommandations IA Personnalisées -->
    <div class="bg-gradient-to-br from-indigo-50 via-sky-50 to-emerald-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Nouveau Header stylisé -->
            <div class="relative bg-white rounded-3xl shadow-2xl p-10 overflow-hidden mb-12">
                <!-- Déco en arrière-plan -->
                <div class="absolute -top-8 -right-8 w-40 h-40 bg-gradient-to-tr from-emerald-400 to-cyan-500 rounded-full blur-3xl opacity-20"></div>
                <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-gradient-to-tr from-indigo-400 to-purple-500 rounded-full blur-3xl opacity-20"></div>

                <div class="relative text-center">
                    <div class="flex justify-center mb-6">
                        <div class="bg-gradient-to-r from-emerald-500 to-cyan-500 p-4 rounded-2xl shadow-lg">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-4xl font-extrabold text-gray-900 mb-4">
                        Découvrez vos <span class="bg-gradient-to-r from-emerald-500 to-cyan-500 bg-clip-text text-transparent">prochaines lectures</span> avec l'IA
                    </h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                        Dites-nous ce que vous aimez lire et laissez notre intelligence artificielle vous guider vers vos futures découvertes littéraires. 📚✨
                    </p>
                </div>
            </div>

            <!-- Reste de la section -->
            <div class="max-w-4xl mx-auto">
                <!-- Loading, Results, Error sections (inchangés) -->
            </div>
        </div>
    </div>


</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection
