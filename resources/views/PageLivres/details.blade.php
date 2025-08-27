@extends('layouts.tailwind')

@section('title', $livre->titre . ' - Bibliothèque ISIC')

@section('content')
<div class="min-h-screen bg-gray-100">

    <!-- Section Hero -->
    <div class="relative bg-gradient-to-r from-indigo-700 via-purple-700 to-pink-600 text-white">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative max-w-7xl mx-auto px-6 py-16">
            <h1 class="text-4xl sm:text-5xl font-extrabold drop-shadow-lg">
                {{ $livre->titre }}
            </h1>
            <p class="mt-3 text-lg text-gray-200">
                Auteur : <span class="font-semibold">{{ $livre->auteur ?? 'Auteur inconnu' }}</span>
            </p>
        </div>
    </div>

    <!-- Contenu -->
    <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 lg:grid-cols-3 gap-10">

        <!-- Colonne image -->
        <div class="flex justify-center">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300 relative">
                @if($livre->image_url)
                    @if(filter_var($livre->image_url, FILTER_VALIDATE_URL))
                        <!-- Image externe (URL) -->
                        <img src="{{ $livre->image_url }}"
                             alt="{{ $livre->titre }}"
                             class="w-full h-[450px] object-cover">
                    @else
                        <!-- Image uploadée localement -->
                        <img src="{{ asset('storage/'.$livre->image_url) }}"
                             alt="{{ $livre->titre }}"
                             class="w-full h-[450px] object-cover">
                    @endif
                @else
                    <!-- Image par défaut -->
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=698&q=80"
                         alt="Image par défaut"
                         class="w-full h-[450px] object-cover">
                @endif

                <!-- Prix sur l'image -->
                @if(!is_null($livre->price) && $livre->price > 0)
                    <div class="absolute bottom-4 left-4 bg-green-500 text-white px-3 py-2 rounded-lg text-sm font-semibold shadow-lg">
                        💰 {{ number_format((float)$livre->price, 2) }} (MAD)
                    </div>
                @elseif(!is_null($livre->price) && $livre->price == 0)
                    <div class="absolute bottom-4 left-4 bg-blue-500 text-white px-3 py-2 rounded-lg text-sm font-semibold shadow-lg">
                        🆓 Gratuit
                    </div>
                @endif
            </div>
        </div>


        <!-- Colonne infos -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 border-b pb-2">📖 À propos du livre</h2>

            <p class="text-gray-700 leading-relaxed mb-6">
                {{ $livre->description ?? 'Aucune description disponible pour ce livre.' }}
            </p>

            <!-- Détails -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="p-4 bg-gray-50 rounded-lg shadow-sm">
                    <span class="text-sm font-semibold text-gray-500">Auteur</span>
                    <p class="text-gray-900 font-medium">{{ $livre->auteur ?? 'Auteur inconnu' }}</p>
                </div>
                <div class="p-4 bg-gray-50 rounded-lg shadow-sm">
                    <span class="text-sm font-semibold text-gray-500">Disponibilité</span>
                    @php $disponible = (int)($livre->stock ?? 0) > 0; @endphp
                    <p class="{{ $disponible ? 'text-green-600' : 'text-red-600' }} font-semibold">
                        {{ $disponible ? '✅ Disponible' : '❌ Emprunté' }}
                    </p>
                </div>
                <div class="p-4 bg-gray-50 rounded-lg shadow-sm">
                    <span class="text-sm font-semibold text-gray-500">Note</span>
                    <p class="text-yellow-500 font-semibold">
                        @if($livre->rating)
                            ⭐ {{ number_format((float)$livre->rating, 1) }}/5
                        </p>
                    @else
                        Non noté
                    </p>
                @endif
                </div>
                <div class="p-4 bg-gray-50 rounded-lg shadow-sm">
                    <span class="text-sm font-semibold text-gray-500">Prix</span>
                    <p class="font-semibold">
                        @if(!is_null($livre->price) && $livre->price > 0)
                            <span class="text-green-600">💰 {{ number_format((float)$livre->price, 2) }} (MAD)</span>
                        @elseif(!is_null($livre->price) && $livre->price == 0)
                            <span class="text-blue-600">🆓 Gratuit</span>
                        @else
                            <span class="text-gray-500">Non spécifié</span>
                        @endif
                    </p>
                </div>
                <div class="p-4 bg-gray-50 rounded-lg shadow-sm">
                    <span class="text-sm font-semibold text-gray-500">Stock restant</span>
                    <p class="text-gray-900 font-medium">{{ $livre->stock ?? 0 }} exemplaire(s)</p>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-10 flex flex-wrap gap-4">
                @if($disponible)
                <a href="{{ route('emprunts.create', $livre->id_livre) }}"
                    class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-lg transition-all duration-200 transform hover:scale-105 inline-block">
                    📚 Emprunter ce livre
                 </a>
                @else
                    <a href="{{ route('reservation.create', $livre->id_livre) }}"
                        class="px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-xl shadow-lg transition-all duration-200 transform hover:scale-105 inline-block">
                        📅 Réserver ce livre
                    </a>
                @endif

                <a href="{{ route('livres.index') }}"
                   class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-lg transition-all duration-200 transform hover:scale-105">
                    🔙 Retour au catalogue
                </a>
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
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($recommendations as $rec)
                    <a href="{{ route('livres.show', $rec['id_livre']) }}"
                       class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transform hover:scale-105 transition duration-300">
                       <div class="relative">
                           @if($rec['image_url'])
                               @if(filter_var($rec['image_url'], FILTER_VALIDATE_URL))
                                   <!-- Image externe (URL) -->
                                   <img src="{{ $rec['image_url'] }}"
                                        alt="{{ $rec['titre'] }}"
                                        class="w-full h-56 object-cover">
                               @else
                                   <!-- Image uploadée localement -->
                                   <img src="{{ asset('storage/'.$rec['image_url']) }}"
                                        alt="{{ $rec['titre'] }}"
                                        class="w-full h-56 object-cover">
                               @endif
                           @else
                               <!-- Image par défaut -->
                               <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=698&q=80"
                                    alt="Image par défaut"
                                    class="w-full h-56 object-cover">
                           @endif

                           <!-- Score de similarité -->
                           @if(isset($rec['similarity_score']))
                               <div class="absolute top-2 right-2 bg-indigo-500 text-white px-2 py-1 rounded-lg text-xs font-semibold shadow-lg">
                                   {{ number_format($rec['similarity_score'] * 100, 1) }}% similaire
                               </div>
                           @endif

                           <!-- Prix sur l'image -->
                           @if(!is_null($rec['price']) && $rec['price'] > 0)
                               <div class="absolute bottom-2 left-2 bg-green-500 text-white px-2 py-1 rounded-lg text-xs font-semibold shadow-lg">
                                   💰 {{ number_format((float)$rec['price'], 2) }} (MAD)
                               </div>
                           @elseif(!is_null($rec['price']) && $rec['price'] == 0)
                               <div class="absolute bottom-2 left-2 bg-blue-500 text-white px-2 py-1 rounded-lg text-xs font-semibold shadow-lg">
                                   🆓 Gratuit
                               </div>
                           @endif
                       </div>
                        <div class="p-4">
                            <h4 class="text-lg font-semibold text-gray-900 truncate">{{ $rec['titre'] }}</h4>
                            <p class="text-sm text-gray-600 mb-2">{{ Str::limit($rec['description'], 80) }}</p>
                            <div class="flex items-center justify-between">
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
