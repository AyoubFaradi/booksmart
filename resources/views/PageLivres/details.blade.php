@extends('layouts.tailwind')

@section('title', $livre->titre . ' - Bibliothèque ISIC')

@section('content')
<div class="min-h-screen bg-gray-100">

    <!-- Section Hero -->
    <div class="relative bg-gradient-to-br from-emerald-400 via-emerald-200 to-white text-emerald-900 shadow-2xl rounded-b-3xl overflow-hidden">
        <div class="absolute inset-0 bg-white/30 backdrop-blur-2xl"></div>
        <div class="relative max-w-7xl mx-auto px-6 py-16 flex flex-col items-center">
            <div class="mb-6 flex flex-col items-center">
                <div class="w-32 h-32 rounded-full border-8 border-white shadow-xl bg-emerald-50 flex items-center justify-center overflow-hidden">
                    @if($livre->image_url)
                        @if(filter_var($livre->image_url, FILTER_VALIDATE_URL))
                            <img src="{{ $livre->image_url }}" alt="{{ $livre->titre }}" class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('storage/'.$livre->image_url) }}" alt="{{ $livre->titre }}" class="w-full h-full object-cover">
                        @endif
                    @else
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=698&q=80" alt="Image par défaut" class="w-full h-full object-cover">
                    @endif
                </div>
            </div>
            <h1 class="text-4xl sm:text-5xl font-extrabold drop-shadow-lg text-center">{{ $livre->titre }}</h1>
            <p class="mt-3 text-lg text-emerald-800 text-center">
                Auteur : <span class="font-semibold">{{ $livre->auteur ?? 'Auteur inconnu' }}</span>
            </p>
        </div>
    </div>

    <!-- Contenu -->
    <div class="max-w-5xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Colonne infos -->
        <div class="md:col-span-2 bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl p-10 border-l-8 border-emerald-400 flex flex-col justify-between">
            <div>
                <h2 class="text-2xl font-extrabold text-emerald-900 mb-4 border-b pb-2 flex items-center gap-2">📖 À propos du livre</h2>
                <p class="text-gray-700 leading-relaxed mb-6 text-lg font-medium">{{ $livre->description ?? 'Aucune description disponible pour ce livre.' }}</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                    <div class="p-4 bg-emerald-50 rounded-xl shadow-sm">
                        <span class="text-sm font-semibold text-emerald-700">Auteur</span>
                        <p class="text-emerald-900 font-bold">{{ $livre->auteur ?? 'Auteur inconnu' }}</p>
                    </div>
                    <div class="p-4 bg-emerald-50 rounded-xl shadow-sm">
                        <span class="text-sm font-semibold text-emerald-700">Disponibilité</span>
                        @php $disponible = (int)($livre->stock ?? 0) > 0; @endphp
                        <p class="{{ $disponible ? 'text-emerald-600' : 'text-red-600' }} font-extrabold">
                            {{ $disponible ? '✅ Disponible' : '❌ Emprunté' }}
                        </p>
                    </div>
                    <div class="p-4 bg-emerald-50 rounded-xl shadow-sm">
                        <span class="text-sm font-semibold text-emerald-700">Note</span>
                        <p class="text-yellow-500 font-extrabold">
                            @if($livre->rating)
                                ⭐ {{ number_format((float)$livre->rating, 1) }}/5
                            @else
                                Non noté
                            @endif
                        </p>
                    </div>
                    <div class="p-4 bg-emerald-50 rounded-xl shadow-sm">
                        <span class="text-sm font-semibold text-emerald-700">Prix</span>
                        <p class="font-extrabold">
                            @if(!is_null($livre->price) && $livre->price > 0)
                                <span class="text-emerald-600">💰 {{ number_format((float)$livre->price, 2) }} (MAD)</span>
                            @elseif(!is_null($livre->price) && $livre->price == 0)
                                <span class="text-fuchsia-600">🆓 Gratuit</span>
                            @else
                                <span class="text-gray-500">Non spécifié</span>
                            @endif
                        </p>
                    </div>
                    <div class="p-4 bg-emerald-50 rounded-xl shadow-sm">
                        <span class="text-sm font-semibold text-emerald-700">Stock restant</span>
                        <p class="text-emerald-900 font-bold">{{ $livre->stock ?? 0 }} exemplaire(s)</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap gap-4 mt-6">
                @if($disponible)
                <a href="{{ route('emprunts.create', $livre->id_livre) }}"
                    class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-lime-500 hover:from-emerald-600 hover:to-lime-600 text-white font-extrabold rounded-full shadow-xl transition-all duration-200 transform hover:scale-105 inline-block uppercase tracking-wider border-2 border-white/60">
                    📚 Emprunter ce livre
                 </a>
                @else
                    <a href="{{ route('reservation.create', $livre->id_livre) }}"
                        class="px-6 py-3 bg-gradient-to-r from-orange-500 to-yellow-400 hover:from-orange-600 hover:to-yellow-500 text-white font-extrabold rounded-full shadow-xl transition-all duration-200 transform hover:scale-105 inline-block uppercase tracking-wider border-2 border-white/60">
                        📅 Réserver ce livre
                    </a>
                @endif
                <a href="{{ route('livres.index') }}"
                   class="px-6 py-3 bg-gradient-to-r from-fuchsia-500 to-pink-500 hover:from-fuchsia-600 hover:to-pink-600 text-white font-extrabold rounded-full shadow-xl transition-all duration-200 transform hover:scale-105 uppercase tracking-wider border-2 border-white/60">
                    🔙 Retour au catalogue
                </a>
            </div>
        </div>
        <!-- Colonne image -->
        <div class="flex justify-center items-start">
            <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden border-l-8 border-emerald-400 flex flex-col items-center p-6 w-full">
                @if($livre->image_url)
                    @if(filter_var($livre->image_url, FILTER_VALIDATE_URL))
                        <img src="{{ $livre->image_url }}" alt="{{ $livre->titre }}" class="w-60 h-80 object-cover rounded-2xl border-4 border-white shadow-lg bg-emerald-50">
                    @else
                        <img src="{{ asset('storage/'.$livre->image_url) }}" alt="{{ $livre->titre }}" class="w-60 h-80 object-cover rounded-2xl border-4 border-white shadow-lg bg-emerald-50">
                    @endif
                @else
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=698&q=80" alt="Image par défaut" class="w-60 h-80 object-cover rounded-2xl border-4 border-white shadow-lg bg-emerald-50">
                @endif
                @if(!is_null($livre->price) && $livre->price > 0)
                    <div class="mt-6 bg-gradient-to-r from-emerald-400 to-lime-400 text-white px-4 py-2 rounded-2xl text-lg font-extrabold shadow-lg border-2 border-emerald-200 flex items-center gap-2">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 9c-3.866 0-7-3.134-7-7s3.134-7 7-7 7 3.134 7 7-3.134 7-7 7z"/></svg>
                        {{ number_format((float)$livre->price, 2) }} MAD
                    </div>
                @elseif(!is_null($livre->price) && $livre->price == 0)
                    <div class="mt-6 bg-gradient-to-r from-fuchsia-500 to-pink-400 text-white px-4 py-2 rounded-2xl text-lg font-extrabold shadow-lg border-2 border-fuchsia-200 flex items-center gap-2">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 9c-3.866 0-7-3.134-7-7s3.134-7 7-7 7 3.134 7 7-3.134 7-7 7z"/></svg>
                        Gratuit
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Section Livres similaires -->
    <div class="max-w-7xl mx-auto px-6 py-12">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">
            🤖 Livres recommandés par IA
            @if(isset($recommendations) && count($recommendations) > 0)
                <span class="text-sm font-normal text-gray-500 ml-2">(basé sur la similarité du contenu)</span>
            @endif
        </h3>

        @if(isset($recommendations) && count($recommendations) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($recommendations as $rec)
                    <a href="{{ route('livres.show', $rec['id_livre']) }}"
                       class="relative group bg-white/70 backdrop-blur-2xl border-l-8 border-emerald-400 rounded-3xl shadow-2xl overflow-visible transition-transform duration-300 hover:scale-105 hover:shadow-emerald-400/40 hover:bg-white/90" style="box-shadow: 0 8px 32px 0 rgba(16, 185, 129, 0.18);">
                        <div class="flex flex-col items-center pt-8 pb-4 px-4 relative">
                            <div class="absolute -left-8 top-8 h-20 w-2 rounded-full bg-gradient-to-b from-emerald-400 to-lime-300 shadow-lg"></div>
                            <div class="-mt-12 mb-2 z-10">
                                @if($rec['image_url'])
                                    @if(filter_var($rec['image_url'], FILTER_VALIDATE_URL))
                                        <img src="{{ $rec['image_url'] }}" alt="{{ $rec['titre'] }}" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-lg bg-emerald-50">
                                    @else
                                        <img src="{{ asset('storage/'.$rec['image_url']) }}" alt="{{ $rec['titre'] }}" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-lg bg-emerald-50">
                                    @endif
                                @else
                                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=698&q=80" alt="Image par défaut" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-lg bg-emerald-50">
                                @endif
                            </div>
                            @if(isset($rec['similarity_score']))
                                <div class="absolute top-4 right-4 bg-indigo-500 text-white px-3 py-1 rounded-2xl text-xs font-extrabold shadow-lg border-2 border-indigo-200 flex items-center gap-1">
                                    {{ number_format($rec['similarity_score'] * 100, 1) }}% similaire
                                </div>
                            @endif
                            @if(!is_null($rec['price']) && $rec['price'] > 0)
                                <div class="absolute top-4 left-4 bg-gradient-to-r from-emerald-400 to-lime-400 text-white px-3 py-1 rounded-2xl text-xs font-extrabold shadow-lg border-2 border-emerald-200 flex items-center gap-1">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 9c-3.866 0-7-3.134-7-7s3.134-7 7-7 7 3.134 7 7-3.134 7-7 7z"/></svg>
                                    {{ number_format((float)$rec['price'], 2) }} MAD
                                </div>
                            @elseif(!is_null($rec['price']) && $rec['price'] == 0)
                                <div class="absolute top-4 left-4 bg-gradient-to-r from-fuchsia-500 to-pink-400 text-white px-3 py-1 rounded-2xl text-xs font-extrabold shadow-lg border-2 border-fuchsia-200 flex items-center gap-1">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 9c-3.866 0-7-3.134-7-7s3.134-7 7-7 7 3.134 7 7-3.134 7-7 7z"/></svg>
                                    Gratuit
                                </div>
                            @endif
                            <h4 class="text-lg font-extrabold text-emerald-900 mt-2 mb-1 line-clamp-1 drop-shadow-lg text-center">{{ $rec['titre'] }}</h4>
                            <p class="text-sm text-gray-700 mb-2 line-clamp-2 font-medium text-center">{{ Str::limit($rec['description'], 80) }}</p>
                        </div>
                        <div class="flex flex-col gap-2 px-4 pb-4">
                            <span class="mx-auto {{ ($rec['stock'] ?? 0) > 0 ? 'bg-gradient-to-r from-emerald-200 to-lime-200 text-emerald-900' : 'bg-gradient-to-r from-orange-200 to-yellow-200 text-orange-900' }} px-4 py-1 rounded-2xl text-xs font-extrabold shadow border border-emerald-100 mb-2">{{ ($rec['stock'] ?? 0) > 0 ? 'Disponible' : 'Stock épuisé' }}</span>
                        </div>
                        <div class="sticky bottom-0 left-0 w-full bg-white/80 backdrop-blur-lg rounded-b-3xl px-4 py-3 flex justify-center gap-3 border-t border-emerald-100 z-20">
                            <span class="text-xs text-gray-500">Stock: {{ $rec['stock'] }}</span>
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $rec['rating'])
                                        <svg class="w-3 h-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @else
                                        <svg class="w-3 h-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <div class="text-gray-400 mb-4">
                    <svg class="w-16 h-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <p class="text-gray-500">Aucune recommandation disponible pour le moment.</p>
                <p class="text-sm text-gray-400 mt-2">Le système de recommandation IA est en cours de chargement...</p>
            </div>
        @endif
    </div>
</div>
@endsection
@section('scripts')
<script>
    // Script pour les interactions supplémentaires si nécessaire
    document.addEventListener('DOMContentLoaded', function() {
        // Exemple : Afficher une alerte si le livre est emprunté
        @if(!$disponible)
            alert('Ce livre est actuellement emprunté.');
        @endif
    });
</script>
@endsection
