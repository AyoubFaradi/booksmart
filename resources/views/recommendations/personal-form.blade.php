@extends('layouts.tailwind')

@section('title', 'Recommandations Personnalisées - Bibliothèque ISIC')

@section('content')


<div class="min-h-screen bg-gradient-to-br from-[#0f2027] via-[#2c5364] to-[#24243e] flex flex-col items-center justify-center py-0 px-0">
    <!-- Hero Section -->
    <div class="relative w-full bg-gradient-to-br from-fuchsia-400/30 via-cyan-400/20 to-emerald-400/30 py-20 flex flex-col items-center justify-center overflow-hidden">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-gradient-to-br from-fuchsia-400/40 to-cyan-400/30 rounded-full blur-3xl z-0 animate-pulse"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-gradient-to-tr from-emerald-400/40 to-pink-400/30 rounded-full blur-3xl z-0 animate-pulse"></div>
        <div class="relative z-10 flex flex-col items-center">
            <span class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gradient-to-br from-fuchsia-500 via-cyan-400 to-emerald-400 shadow-2xl mb-6 animate-float">
                <svg class="w-14 h-14 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </span>
            <h1 class="text-6xl font-black tracking-tight text-white drop-shadow-xl text-center mb-4 bg-gradient-to-r from-fuchsia-500 via-cyan-400 to-emerald-400 bg-clip-text text-transparent" style="letter-spacing: -0.03em;">
                IA Book Concierge
            </h1>
            <p class="mt-2 max-w-2xl mx-auto text-white/90 text-2xl font-semibold text-center backdrop-blur-sm rounded-xl px-6 py-3 shadow-lg">
                Découvrez des recommandations personnalisées grâce à notre IA premium. Parlez-nous de vos livres préférés et laissez-vous surprendre !
            </p>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="relative w-full max-w-4xl mx-auto -mt-24 z-20">
        <div class="bg-white/30 backdrop-blur-2xl rounded-3xl shadow-2xl border border-white/30 p-12 mb-10 ring-2 ring-fuchsia-400/20 hover:ring-cyan-400/30 transition-all duration-300">
            <form id="recommendationForm" class="space-y-10">
                @csrf
                <div id="booksContainer" class="space-y-8">
                    <!-- Book Step Card (first) -->
                    <div class="book-entry relative group">
                        <div class="absolute -top-4 -left-4 w-16 h-16 bg-gradient-to-br from-cyan-400/60 to-fuchsia-400/40 rounded-full blur-xl opacity-70 group-hover:scale-110 transition-transform"></div>
                        <div class="relative bg-white/80 backdrop-blur-xl border border-white/40 rounded-2xl shadow-xl px-8 py-7 flex flex-col gap-6 ring-1 ring-fuchsia-300/20 hover:ring-cyan-400/30 transition-all">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-fuchsia-400 to-cyan-400 flex items-center justify-center shadow-lg">
                                    <span class="text-white text-xl font-bold">1</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 tracking-wide">Livre préféré</h3>
                                <button type="button" class="ml-auto text-red-400 hover:text-red-600 opacity-0 group-hover:opacity-100 transition-opacity" onclick="removeBook(this)" style="display: none;">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="book-title-0" class="block mb-2 text-fuchsia-700 text-base font-bold">Titre du livre *</label>
                                    <input type="text" name="books[0][title]" required id="book-title-0"
                                           class="w-full px-5 py-4 bg-white/60 border border-fuchsia-300/40 rounded-xl focus:ring-2 focus:ring-fuchsia-400 focus:border-fuchsia-400 transition-colors font-semibold text-gray-900"
                                           placeholder="Ex: Le Petit Prince" autocomplete="off">
                                </div>
                                <div>
                                    <label for="book-desc-0" class="block mb-2 text-fuchsia-700 text-base font-bold">Description ou résumé *</label>
                                    <textarea name="books[0][description]" required rows="3" id="book-desc-0"
                                              class="w-full px-5 py-4 bg-white/60 border border-fuchsia-300/40 rounded-xl focus:ring-2 focus:ring-fuchsia-400 focus:border-fuchsia-400 transition-colors font-semibold text-gray-900 resize-none"
                                              placeholder="Décrivez brièvement l'histoire, le genre, les thèmes..." autocomplete="off"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Book Button -->
                <div class="flex justify-center">
                    <button type="button" onclick="addBook()"
                            class="inline-flex items-center gap-2 px-7 py-3 bg-gradient-to-r from-cyan-400 via-fuchsia-400 to-emerald-400 text-white font-bold rounded-xl shadow-lg hover:scale-105 hover:from-fuchsia-400 hover:to-cyan-400 transition-all duration-200 ring-2 ring-white/30">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Ajouter un autre livre
                    </button>
                </div>
                <!-- Submit Button -->
                <div class="flex justify-center pt-4">
                    <button type="submit" id="submitBtn"
                            class="inline-flex items-center gap-2 px-10 py-4 bg-gradient-to-r from-fuchsia-500 via-cyan-400 to-emerald-400 text-white font-extrabold rounded-2xl shadow-xl hover:scale-105 hover:from-cyan-400 hover:to-fuchsia-400 transition-all duration-200 text-xl ring-2 ring-white/30">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        Obtenir mes recommandations
                    </button>
                </div>
            </form>
        </div>
    </div>

            <!-- Loading Section -->
            <div id="loadingSection" class="hidden bg-white/30 backdrop-blur-2xl rounded-3xl shadow-2xl p-10 text-center border border-cyan-300/30">
                <div class="animate-spin rounded-full h-20 w-20 border-b-4 border-fuchsia-400 mx-auto mb-6"></div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Analyse en cours...</h3>
                <p class="text-gray-700">Notre IA analyse vos préférences pour trouver les meilleures recommandations.</p>
            </div>

            <!-- Results Section -->
            <div id="resultsSection" class="hidden">
                <div class="bg-white/30 backdrop-blur-2xl rounded-3xl shadow-2xl p-10 border border-emerald-300/30">
                    <div class="text-center mb-8">
                        <h2 class="text-4xl font-extrabold bg-gradient-to-r from-fuchsia-500 via-cyan-400 to-emerald-400 bg-clip-text text-transparent mb-2">🎯 Vos recommandations</h2>
                        <p class="text-lg text-gray-700">Basé sur vos préférences, voici ce que nous vous suggérons :</p>
                    </div>
                    <div id="recommendationsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Recommendations will be inserted here -->
                    </div>
                    <div class="text-center mt-8">
                        <button onclick="resetForm()"
                                class="inline-flex items-center gap-2 px-7 py-3 bg-gradient-to-r from-gray-200 via-gray-100 to-gray-300 text-gray-800 font-bold rounded-xl shadow-lg hover:scale-105 hover:from-gray-300 hover:to-gray-100 transition-all duration-200 ring-2 ring-white/30">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Nouvelle recherche
                        </button>
                    </div>
                </div>
            </div>

            <!-- Error Section -->
            <div id="errorSection" class="hidden bg-red-100/60 border border-red-300/40 rounded-3xl p-10 text-center shadow-2xl">
                <div class="text-red-600 mb-4">
                    <svg class="w-20 h-20 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-red-900 mb-2">Erreur</h3>
                <p id="errorMessage" class="text-red-700 mb-4"></p>
                <button onclick="resetForm()"
                        class="inline-flex items-center gap-2 px-7 py-3 bg-gradient-to-r from-red-500 via-pink-400 to-fuchsia-500 text-white font-bold rounded-xl shadow-lg hover:scale-105 hover:from-fuchsia-500 hover:to-red-500 transition-all duration-200 ring-2 ring-white/30">
                    Réessayer
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
let bookCount = 1;

function addBook() {
    bookCount++;
    const container = document.getElementById('booksContainer');
    const newBook = document.createElement('div');
    newBook.className = 'book-entry bg-gray-50 rounded-xl p-6 border-2 border-dashed border-gray-200';
    newBook.innerHTML = `
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Livre #${bookCount}</h3>
            <button type="button" class="text-red-500 hover:text-red-700" onclick="removeBook(this)">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Titre du livre *
                </label>
                <input type="text" name="books[${bookCount-1}][title]" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                       placeholder="Ex: Le Petit Prince">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Description ou résumé *
                </label>
                <textarea name="books[${bookCount-1}][description]" required rows="3"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors resize-none"
                          placeholder="Décrivez brièvement l'histoire, le genre, les thèmes..."></textarea>
            </div>
        </div>
    `;
    container.appendChild(newBook);

    // Show remove button for first book if we have more than one
    if (bookCount > 1) {
        const firstBook = container.querySelector('.book-entry');
        const firstRemoveBtn = firstBook.querySelector('button[onclick="removeBook(this)"]');
        firstRemoveBtn.style.display = 'block';
    }
}

function removeBook(button) {
    const bookEntry = button.closest('.book-entry');
    bookEntry.remove();
    bookCount--;

    // Renumber books
    const books = document.querySelectorAll('.book-entry');
    books.forEach((book, index) => {
        const title = book.querySelector('h3');
        title.textContent = `Livre #${index + 1}`;

        const inputs = book.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            const name = input.getAttribute('name');
            if (name) {
                input.setAttribute('name', name.replace(/\[\d+\]/, `[${index}]`));
            }
        });
    });

    // Hide remove button for first book if only one remains
    if (bookCount === 1) {
        const firstBook = document.querySelector('.book-entry');
        const firstRemoveBtn = firstBook.querySelector('button[onclick="removeBook(this)"]');
        firstRemoveBtn.style.display = 'none';
    }
}

function resetForm() {
    // Reset form
    document.getElementById('recommendationForm').reset();

    // Remove extra books
    const container = document.getElementById('booksContainer');
    const books = container.querySelectorAll('.book-entry');
    for (let i = 1; i < books.length; i++) {
        books[i].remove();
    }
    bookCount = 1;

    // Hide remove button for first book
    const firstRemoveBtn = books[0].querySelector('button[onclick="removeBook(this)"]');
    firstRemoveBtn.style.display = 'none';

    // Show form, hide other sections
    document.getElementById('recommendationForm').parentElement.style.display = 'block';
    document.getElementById('loadingSection').style.display = 'none';
    document.getElementById('resultsSection').style.display = 'none';
    document.getElementById('errorSection').style.display = 'none';
}

document.getElementById('recommendationForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    // Show loading
    document.getElementById('recommendationForm').parentElement.style.display = 'none';
    document.getElementById('loadingSection').style.display = 'block';
    document.getElementById('resultsSection').style.display = 'none';
    document.getElementById('errorSection').style.display = 'none';

    try {
        const formData = new FormData(this);
        const response = await fetch('{{ route("recommendations.personal.submit") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        });

        const data = await response.json();

        if (data.success) {
            displayRecommendations(data.recommendations);
        } else {
            throw new Error(data.message || 'Erreur lors de la génération des recommandations');
        }

    } catch (error) {
        showError(error.message);
    }
});

function displayRecommendations(recommendations) {
    const grid = document.getElementById('recommendationsGrid');
    grid.innerHTML = '';

    if (recommendations.length === 0) {
        grid.innerHTML = `
            <div class="col-span-full text-center py-8">
                <div class="text-gray-400 mb-4">
                    <svg class="w-16 h-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <p class="text-gray-500">Aucune recommandation trouvée pour le moment.</p>
                <p class="text-sm text-gray-400 mt-2">Essayez d'ajouter plus de détails sur vos livres préférés.</p>
            </div>
        `;
    } else {
        recommendations.forEach(book => {
            const card = document.createElement('div');
            card.className = 'relative group bg-gradient-to-br from-fuchsia-200/60 via-cyan-200/60 to-emerald-200/60 rounded-3xl shadow-2xl border-0 overflow-visible transition-transform duration-300 hover:scale-105 hover:shadow-fuchsia-400/40';
            card.innerHTML = `
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 z-10">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-fuchsia-400 via-cyan-400 to-emerald-400 shadow-xl flex items-center justify-center animate-float">
                        ${book.image_url ?
                            (book.image_url.startsWith('http') ?
                                `<img src="${book.image_url}" alt="${book.titre}" class="w-20 h-20 object-cover rounded-full border-4 border-white shadow-lg">`
                                : `<img src="/storage/${book.image_url}" alt="${book.titre}" class="w-20 h-20 object-cover rounded-full border-4 border-white shadow-lg">`)
                            : `<img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=698&q=80" alt="Image par défaut" class="w-20 h-20 object-cover rounded-full border-4 border-white shadow-lg">`
                        }
                    </div>
                </div>
                <div class="pt-20 pb-6 px-6 flex flex-col items-center gap-2 relative">
                    <div class="absolute top-4 right-4 bg-gradient-to-r from-fuchsia-500 via-cyan-400 to-emerald-400 text-white px-3 py-1 rounded-xl text-xs font-bold shadow-lg ring-2 ring-white/30 animate-pulse">
                        ${Math.round(book.similarity_score * 100)}% similaire
                    </div>
                    <h4 class="text-2xl font-extrabold bg-gradient-to-r from-fuchsia-500 via-cyan-400 to-emerald-400 bg-clip-text text-transparent truncate mb-1 drop-shadow-lg text-center">${book.titre}</h4>
                    <p class="text-base text-gray-800/80 mb-2 line-clamp-3 text-center">${book.description}</p>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold shadow border border-white/40 ${book.stock > 0 ? 'bg-gradient-to-r from-emerald-200 to-lime-200 text-emerald-900' : 'bg-gradient-to-r from-orange-200 to-yellow-200 text-orange-900'}">${book.stock > 0 ? 'Disponible' : 'Stock épuisé'}</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold shadow border border-white/40 bg-yellow-100 text-yellow-800 flex items-center gap-1">
                            <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                            ${book.rating ? Number(book.rating).toFixed(1) : 'N/A'}
                        </span>
                        ${book.price > 0 ? `<span class="px-3 py-1 rounded-full text-xs font-bold shadow border border-white/40 bg-gradient-to-r from-emerald-400 to-cyan-400 text-white flex items-center gap-1">💰 ${parseFloat(book.price).toFixed(2)} MAD</span>` : '<span class="px-3 py-1 rounded-full text-xs font-bold shadow border border-white/40 bg-gradient-to-r from-fuchsia-500 to-pink-400 text-white">Gratuit</span>'}
                    </div>
                </div>
                <div class="flex justify-center gap-3 px-6 pb-6">
                    <a href="/livres/${book.id_livre}" class="bg-gradient-to-r from-fuchsia-500 to-pink-500 hover:from-fuchsia-600 hover:to-pink-600 text-white px-5 py-2 rounded-full text-sm font-bold uppercase shadow-md transition-all duration-200 border-2 border-white/60">Détails</a>
                    ${book.stock > 0 ?
                        `<a href="/emprunts/create/${book.id_livre}" class="bg-gradient-to-r from-emerald-500 to-lime-500 hover:from-emerald-600 hover:to-lime-600 text-white px-5 py-2 rounded-full text-sm font-bold uppercase shadow-md transition-all duration-200 border-2 border-white/60">Emprunter</a>`
                        : `<a href="/reservation/create/${book.id_livre}" class="bg-gradient-to-r from-orange-500 to-yellow-400 hover:from-orange-600 hover:to-yellow-500 text-white px-5 py-2 rounded-full text-sm font-bold uppercase shadow-md transition-all duration-200 border-2 border-white/60">Réserver</a>`
                    }
                </div>
            `;
            grid.appendChild(card);
        });
    }

    // Show results
    document.getElementById('loadingSection').style.display = 'none';
    document.getElementById('resultsSection').style.display = 'block';
}

function showError(message) {
    document.getElementById('errorMessage').textContent = message;
    document.getElementById('loadingSection').style.display = 'none';
    document.getElementById('errorSection').style.display = 'block';
}
</script>

<style>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
/* Glassy floating effect for cards */
.book-entry .relative {
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
    border-radius: 1.5rem;
    border: 1.5px solid rgba(255,255,255,0.25);
    background: rgba(255,255,255,0.7);
    backdrop-filter: blur(12px);
}
/* Floating label effect */
input:focus + label, textarea:focus + label,
input:not(:placeholder-shown) + label, textarea:not(:placeholder-shown) + label {
    top: -0.75rem !important;
    left: 1.25rem !important;
    font-size: 0.85rem !important;
    color: #d946ef !important;
    background: rgba(255,255,255,0.7);
    padding: 0 0.25rem;
    border-radius: 0.5rem;
}
@keyframes float {
    0% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0); }
}
.animate-float {
    animation: float 3s ease-in-out infinite;
}
</style>
@endsection
