@extends('layouts.tailwind')

@section('title', 'Modifier un Livre - ' . config('app.name'))

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-100 via-emerald-100 to-lime-100 flex flex-col py-8">

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-600 via-emerald-500 to-lime-500 text-white py-16 shadow-lg rounded-b-3xl">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h1 class="text-5xl font-extrabold tracking-tight drop-shadow-lg">✏️ Modifier le Livre</h1>
            <p class="mt-4 text-xl text-white/90 font-medium">Modifiez les informations de votre livre. Mettez à jour les détails, l'image et les paramètres.</p>
        </div>
    </div>

    <!-- Formulaire Section -->
    <div class="max-w-4xl mx-auto p-6 -mt-16">
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden border border-green-200">
            <!-- Header du formulaire -->
            <div class="bg-gradient-to-r from-green-500 via-emerald-400 to-lime-400 p-6 flex items-center gap-4">
                <div class="bg-white/40 rounded-full p-3 shadow mr-4">
                    <svg class="w-8 h-8 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white drop-shadow">Modification du Livre</h2>
                    <p class="text-white/90 text-sm">Mettez à jour les informations de votre livre</p>
                </div>
            </div>

            <!-- Contenu du formulaire -->
            <div class="p-10">
                <form method="POST" action="{{ route('livres.update', $livre->id_livre) }}" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Titre -->
                    <div class="space-y-2">
                        <label for="titre" class="block text-sm font-semibold text-gray-700">
                            <span class="text-red-500">*</span> Titre du livre
                        </label>
                <input type="text" name="titre" id="titre" value="{{ old('titre', $livre->titre) }}"
                               class="w-full border-2 border-gray-200 rounded-xl p-4 text-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 focus:outline-none transition-all duration-200 hover:border-gray-300"
                       placeholder="Ex: Les Misérables" required>
                @error('titre')
                            <p class="text-red-500 text-sm flex items-center mt-2">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                @enderror
            </div>

            <!-- Description -->
                    <div class="space-y-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700">
                            <span class="text-red-500">*</span> Description
                        </label>
                        <textarea name="description" id="description" rows="5"
                                  class="w-full border-2 border-gray-200 rounded-xl p-4 text-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 focus:outline-none transition-all duration-200 hover:border-gray-300 resize-none"
                          placeholder="Résumé du livre...">{{ old('description', $livre->description) }}</textarea>
                @error('description')
                            <p class="text-red-500 text-sm flex items-center mt-2">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                @enderror
            </div>

            <!-- Image -->
                    <div class="space-y-2">
                        <label for="image_url" class="block text-sm font-semibold text-gray-700">
                            Image du livre
                        </label>

                        <!-- Image actuelle -->
                @if($livre->image_url)
                            <div class="mb-4">
                                <p class="text-sm text-gray-600 mb-2">Image actuelle :</p>
                                <div class="relative inline-block">
                                    @if(filter_var($livre->image_url, FILTER_VALIDATE_URL))
                                        <!-- Image externe (URL) -->
                                        <img src="{{ $livre->image_url }}"
                                             alt="Image actuelle du livre"
                                             class="w-32 h-32 object-cover rounded-lg border-2 border-gray-200 shadow-sm">
                                    @else
                                        <!-- Image uploadée localement -->
                                        <img src="{{ asset('storage/'.$livre->image_url) }}"
                                             alt="Image actuelle du livre"
                                             class="w-32 h-32 object-cover rounded-lg border-2 border-gray-200 shadow-sm">
                                    @endif
                                    <div class="absolute top-2 right-2 bg-yellow-500 text-white text-xs px-2 py-1 rounded-full">
                                        Actuelle
                                    </div>
                                </div>
                            </div>
                @endif

                        <!-- Upload de nouvelle image -->
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-yellow-400 transition-colors duration-200">
                            <input type="file" name="image_url" id="image_url" accept="image/*"
                                   class="hidden" onchange="previewImage(this)">
                            <label for="image_url" class="cursor-pointer">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-600">Cliquez pour changer l'image</p>
                                <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF jusqu'à 10MB</p>
                            </label>
                        </div>

                        <!-- Prévisualisation de la nouvelle image -->
                        <div id="image-preview" class="hidden mt-4">
                            <p class="text-sm text-gray-600 mb-2">Nouvelle image :</p>
                            <img id="preview-img" class="w-32 h-32 object-cover rounded-lg border-2 border-yellow-200 shadow-sm">
                        </div>

                @error('image_url')
                            <p class="text-red-500 text-sm flex items-center mt-2">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                @enderror
            </div>

                    <!-- Prix et Stock -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Prix -->
                        <div class="space-y-2">
                            <label for="price" class="block text-sm font-semibold text-gray-700">
                                Prix (MAD)
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">MAD</span>
    <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price', $livre->price) }}"
                                       class="w-full border-2 border-gray-200 rounded-xl pl-16 pr-4 py-4 text-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 focus:outline-none transition-all duration-200 hover:border-gray-300"
                                       placeholder="0.00">
                            </div>
    @error('price')
                                <p class="text-red-500 text-sm flex items-center mt-2">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
    @enderror
</div>

            <!-- Stock -->
                        <div class="space-y-2">
                            <label for="stock" class="block text-sm font-semibold text-gray-700">
                                <span class="text-red-500">*</span> Stock disponible
                            </label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $livre->stock) }}"
                                   class="w-full border-2 border-gray-200 rounded-xl p-4 text-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 focus:outline-none transition-all duration-200 hover:border-gray-300"
                       placeholder="Ex: 10" required>
                @error('stock')
                                <p class="text-red-500 text-sm flex items-center mt-2">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                @enderror
                        </div>
            </div>

            <!-- Rating -->
                    <div class="space-y-2">
                        <label for="rating" class="block text-sm font-semibold text-gray-700">
                            ⭐ Note (0 - 5)
                        </label>
                        <div class="flex items-center space-x-4">
                            <input type="range" name="rating" id="rating" min="0" max="5" step="0.1" value="{{ old('rating', $livre->rating ?? 2.5) }}"
                                   class="flex-1 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer slider"
                                   oninput="updateRatingValue(this.value)">
                            <span id="rating-value" class="text-2xl font-bold text-yellow-500 min-w-[3rem] text-center">
                                {{ old('rating', $livre->rating ?? 2.5) }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-500">Glissez pour ajuster la note</p>
                @error('rating')
                            <p class="text-red-500 text-sm flex items-center mt-2">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                @enderror
            </div>

                    <!-- Boutons d'action -->
                    <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('livresindex') }}"
                           class="inline-flex items-center justify-center px-6 py-3 border-2 border-gray-300 text-gray-700 bg-white rounded-xl font-medium hover:bg-gray-50 hover:border-gray-400 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                    Annuler
                </a>
                        <button type="submit"
                                class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-xl font-semibold hover:from-yellow-600 hover:to-orange-700 transform hover:scale-105 transition-all duration-200 shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                    Mettre à jour le Livre
                </button>
            </div>
        </form>
            </div>
        </div>
    </div>


</div>

<!-- Scripts JavaScript -->
<script>
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function updateRatingValue(value) {
    document.getElementById('rating-value').textContent = parseFloat(value).toFixed(1);
}

// Style personnalisé pour le slider
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.slider');
    if (slider) {
        slider.style.background = `linear-gradient(to right, #f59e0b 0%, #f59e0b ${(slider.value / 5) * 100}%, #e5e7eb ${(slider.value / 5) * 100}%, #e5e7eb 100%)`;

        slider.addEventListener('input', function() {
            const value = (this.value / 5) * 100;
            this.style.background = `linear-gradient(to right, #f59e0b 0%, #f59e0b ${value}%, #e5e7eb ${value}%, #e5e7eb 100%)`;
        });
    }
});
</script>

<style>
.slider::-webkit-slider-thumb {
    appearance: none;
    height: 20px;
    width: 20px;
    border-radius: 50%;
    background: #f59e0b;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

.slider::-moz-range-thumb {
    height: 20px;
    width: 20px;
    border-radius: 50%;
    background: #f59e0b;
    cursor: pointer;
    border: none;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}
</style>

@endsection
