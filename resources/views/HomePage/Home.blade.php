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

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($livres as $livre)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="relative">
                    @if($livre->image_url)
                        @if(filter_var($livre->image_url, FILTER_VALIDATE_URL))
                            <img src="{{ $livre->image_url }}" alt="{{ $livre->titre }}" class="w-full h-56 object-cover">
                        @else
                            <img src="{{ asset('storage/'.$livre->image_url) }}" alt="{{ $livre->titre }}" class="w-full h-56 object-cover">
                        @endif
                    @else
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=698&q=80" alt="Image par défaut" class="w-full h-56 object-cover">
                    @endif

                    @if(!is_null($livre->rating))
                        <div class="absolute top-2 right-2 bg-yellow-400 text-yellow-900 px-2 py-1 rounded-full text-xs font-semibold">
                            ⭐ {{ number_format((float)$livre->rating, 1) }}
                        </div>
                    @endif

                    @if(!is_null($livre->price) && $livre->price > 0)
                        <div class="absolute bottom-2 left-2 bg-green-500 text-white px-2 py-1 rounded-lg text-xs font-semibold shadow-lg">
                            💰 {{ number_format((float)$livre->price, 2) }} (MAD)
                        </div>
                    @elseif(!is_null($livre->price) && $livre->price == 0)
                        <div class="absolute bottom-2 left-2 bg-blue-500 text-white px-2 py-1 rounded-lg text-xs font-semibold shadow-lg">
                            🆓 Gratuit
                        </div>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-1 line-clamp-1">{{ $livre->titre }}</h3>
                    <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ $livre->description }}</p>
                    <div class="flex justify-between items-center">
                        @php $disponible = (int)($livre->stock ?? 0) > 0; @endphp
                        <span class="{{ $disponible ? 'text-green-600' : 'text-orange-600' }} text-sm font-medium">
                            {{ $disponible ? 'Disponible' : 'Stock épuisé' }}
                        </span>
                        <div class="flex space-x-2">
                            <a href="{{ route('livres.show', $livre->id_livre) }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1 rounded text-sm transition-colors duration-200">Détails</a>
                            @if($disponible)
                                <a href="{{ route('emprunts.create', $livre->id_livre) }}" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm transition-colors duration-200">Emprunter</a>
                            @else
                                <a href="{{ route('reservation.create', $livre->id_livre) }}" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1 rounded text-sm transition-colors duration-200">Réserver</a>
                            @endif
                        </div>
                    </div>
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
