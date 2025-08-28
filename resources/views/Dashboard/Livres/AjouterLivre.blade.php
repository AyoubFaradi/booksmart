@extends('layouts.tailwind')

@section('title', 'Ajouter un Livre - ' . config('app.name'))

@section('content')

<div class="min-h-screen bg-gradient-to-br from-green-100 via-emerald-100 to-lime-100 flex flex-col py-8">
    <!-- Hero / Header -->
    <div class="bg-gradient-to-r from-green-600 via-emerald-500 to-lime-500 text-white py-16 shadow-lg rounded-b-3xl">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h1 class="text-5xl font-extrabold tracking-tight drop-shadow-lg">Ajouter un Nouveau Livre</h1>
            <p class="mt-4 text-xl text-white/90 font-medium">Enrichissez notre collection en ajoutant de nouveaux livres à notre bibliothèque</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="max-w-4xl mx-auto p-6 -mt-16">
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden border border-green-200">
            <!-- Header Form -->
            <div class="bg-gradient-to-r from-green-500 via-emerald-400 to-lime-400 p-6 flex items-center gap-4">
                <div class="bg-white/40 rounded-full p-3 shadow">
                    <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white drop-shadow">📚 Nouveau Livre</h2>
                    <p class="text-white/90 text-sm">Remplissez les informations du livre</p>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-10 space-y-8">
                <form method="POST" action="{{ route('livres.store') }}" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <!-- Titre -->
                    <div>
                        <label for="titre" class="block text-green-800 font-semibold mb-2">Titre <span class="text-red-500">*</span></label>
                        <input type="text" id="titre" name="titre" value="{{ old('titre') }}"
                               class="w-full rounded-2xl border-2 border-green-200 p-4 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 bg-white/70 placeholder-gray-400 text-green-900 font-medium transition duration-200"
                               placeholder="Ex: Les Misérables" required>
                        @error('titre')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-green-800 font-semibold mb-2">Description <span class="text-red-500">*</span></label>
                        <textarea id="description" name="description" rows="4"
                                  class="w-full rounded-2xl border-2 border-green-200 p-4 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 bg-white/70 placeholder-gray-400 text-green-900 font-medium transition duration-200 resize-none"
                                  placeholder="Résumé du livre..." required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-green-800 font-semibold mb-2">Image du livre</label>
                        <div class="border-2 border-dashed border-green-300 rounded-2xl p-8 text-center cursor-pointer hover:border-emerald-400 transition-colors duration-200 bg-white/60">
                            <input type="file" name="image_url" id="image_url" accept="image/*" class="hidden" onchange="previewImage(this)">
                            <label for="image_url" class="cursor-pointer flex flex-col items-center gap-2">
                                <svg class="w-14 h-14 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"/>
                                </svg>
                                <span class="text-green-600 text-sm">Cliquez pour sélectionner une image</span>
                            </label>
                        </div>
                        <div id="image-preview" class="hidden mt-4">
                            <img id="preview-img" class="w-32 h-32 object-cover rounded-xl border-2 border-green-200">
                        </div>
                        @error('image_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Prix et Stock -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label for="price" class="block text-green-800 font-semibold mb-2">Prix (MAD)</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-green-400 font-bold">MAD</span>
                                <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price') }}"
                                       class="w-full border-2 border-green-200 rounded-2xl pl-16 pr-4 py-4 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 bg-white/70 placeholder-gray-400 text-green-900 font-medium transition duration-200"
                                       placeholder="0.00">
                            </div>
                            @error('price')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="stock" class="block text-green-800 font-semibold mb-2">Stock disponible <span class="text-red-500">*</span></label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
                                   class="w-full border-2 border-green-200 rounded-2xl p-4 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 bg-white/70 placeholder-gray-400 text-green-900 font-medium transition duration-200"
                                   placeholder="Ex: 10" required>
                            @error('stock')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Rating -->
                    <div>
                        <label for="rating" class="block text-green-800 font-semibold mb-2">⭐ Note (0 - 5)</label>
                        <div class="flex items-center gap-4">
                            <input type="range" name="rating" id="rating" min="0" max="5" step="0.1" value="{{ old('rating', 2.5) }}"
                                   class="flex-1 h-2 bg-green-200 rounded-lg appearance-none cursor-pointer slider" oninput="updateRatingValue(this.value)">
                            <span id="rating-value" class="text-yellow-500 font-bold text-xl">{{ old('rating', 2.5) }}</span>
                        </div>
                        <p class="text-green-600 text-sm mt-1">Glissez pour ajuster la note</p>
                        @error('rating')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row justify-end gap-4 pt-8 border-t border-green-200">
                        <a href="{{ route('livresindex') }}"
                           class="inline-flex items-center justify-center px-6 py-3 border-2 border-green-300 text-green-700 bg-white/80 rounded-2xl font-semibold hover:bg-green-50 transition-all duration-200">
                            Annuler
                        </a>
                        <button type="submit"
                                class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-green-500 via-emerald-500 to-lime-500 text-white rounded-2xl font-bold hover:from-green-600 hover:to-lime-600 transform hover:scale-105 transition-all duration-200 shadow-lg">
                            Ajouter le Livre
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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

document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.slider');
    if (slider) {
        const setSliderBg = (val) => {
            const percent = (val / 5) * 100;
            slider.style.background = `linear-gradient(to right, #fbbf24 0%, #fbbf24 ${percent}%, #e5e7eb ${percent}%, #e5e7eb 100%)`;
        }
        setSliderBg(slider.value);
        slider.addEventListener('input', () => setSliderBg(slider.value));
    }
});
</script>

<style>
.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    height: 20px;
    width: 20px;
    border-radius: 50%;
    background: #fbbf24;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}
.slider::-moz-range-thumb {
    height: 20px;
    width: 20px;
    border-radius: 50%;
    background: #fbbf24;
    cursor: pointer;
    border: none;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}
</style>
@endsection
