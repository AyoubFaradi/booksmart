@extends('layouts.tailwind')

@section('title', 'Dashboard Administrateur')

@section('content')


<div class="min-h-screen flex bg-gradient-to-br from-gray-900 via-blue-950 to-emerald-900">
    <!-- Sidebar -->
    <aside class="w-72 bg-gradient-to-b from-blue-900/80 to-emerald-900/80 shadow-2xl flex flex-col justify-between py-10 px-6 sticky top-0 h-screen z-40">
        <div>
            <h2 class="text-3xl font-extrabold text-white mb-10 tracking-widest text-center">BookSmart</h2>
            <nav class="space-y-4">
                <a href="#stats" class="block py-3 px-5 rounded-xl text-lg font-semibold text-emerald-200 hover:bg-emerald-800/40 transition">Statistiques</a>
                <a href="#charts" class="block py-3 px-5 rounded-xl text-lg font-semibold text-blue-200 hover:bg-blue-800/40 transition">Graphiques</a>
                <a href="#tables" class="block py-3 px-5 rounded-xl text-lg font-semibold text-lime-200 hover:bg-lime-800/40 transition">Utilisateurs</a>
            </nav>
        </div>
        <div class="mt-10 text-center">
            <span class="block text-emerald-300 font-medium mb-2">Connecté en tant qu'administrateur</span>
            <a href="{{ route('home') }}" class="inline-block bg-gradient-to-r from-blue-700 to-emerald-700 hover:from-emerald-800 hover:to-blue-800 text-white px-6 py-2 rounded-xl shadow font-semibold transition-all">Retour à l'accueil</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 py-12 px-8 md:px-16 lg:px-24">
        <!-- Header -->
        <div class="mb-12 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <h1 class="text-5xl font-black bg-gradient-to-r from-blue-400 via-emerald-400 to-lime-300 bg-clip-text text-transparent drop-shadow-lg tracking-tight">Dashboard Administrateur</h1>
            <div class="flex items-center gap-4">
                <span class="inline-flex items-center px-4 py-2 bg-emerald-800/80 text-emerald-100 rounded-xl font-semibold shadow">Admin</span>
            </div>
        </div>

        <!-- Stat Cards -->
        <section id="stats" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-10 mb-16">
            <div class="bg-gradient-to-br from-blue-800/80 to-emerald-800/80 rounded-3xl shadow-2xl p-8 flex flex-col items-center border border-blue-900/40 hover:scale-105 transition-transform">
                <div class="p-5 rounded-full bg-emerald-900/60 text-emerald-300 shadow-lg mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <p class="text-lg font-semibold text-emerald-200">Total Adhérents</p>
                <p class="text-4xl font-extrabold text-white mt-1">{{ $totalAdherents }}</p>
            </div>
            <div class="bg-gradient-to-br from-emerald-800/80 to-blue-800/80 rounded-3xl shadow-2xl p-8 flex flex-col items-center border border-emerald-900/40 hover:scale-105 transition-transform">
                <div class="p-5 rounded-full bg-blue-900/60 text-blue-300 shadow-lg mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-lg font-semibold text-blue-200">Adhérents Actifs</p>
                <p class="text-4xl font-extrabold text-white mt-1">{{ $adherentsActifs }}</p>
            </div>
            <div class="bg-gradient-to-br from-lime-800/80 to-blue-800/80 rounded-3xl shadow-2xl p-8 flex flex-col items-center border border-lime-900/40 hover:scale-105 transition-transform">
                <div class="p-5 rounded-full bg-lime-900/60 text-lime-300 shadow-lg mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-lg font-semibold text-lime-200">Administrateurs</p>
                <p class="text-4xl font-extrabold text-white mt-1">{{ $admins }}</p>
            </div>
            <div class="bg-gradient-to-br from-emerald-800/80 to-lime-800/80 rounded-3xl shadow-2xl p-8 flex flex-col items-center border border-emerald-900/40 hover:scale-105 transition-transform">
                <div class="p-5 rounded-full bg-emerald-900/60 text-emerald-300 shadow-lg mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <p class="text-lg font-semibold text-emerald-200">Total Emprunts</p>
                <p class="text-4xl font-extrabold text-white mt-1">{{ $totalEmprunts }}</p>
            </div>
        </section>

        <!-- Graphs -->
        <section id="charts" class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-16">
            <div class="bg-gradient-to-br from-blue-900/80 to-emerald-900/80 rounded-3xl shadow-2xl p-10">
                <h3 class="text-2xl font-bold text-emerald-200 mb-8">Adhérents inscrits par mois</h3>
                <canvas id="adherentsChart" width="400" height="200"></canvas>
            </div>
            <div class="bg-gradient-to-br from-emerald-900/80 to-blue-900/80 rounded-3xl shadow-2xl p-10">
                <h3 class="text-2xl font-bold text-blue-200 mb-8">Répartition des rôles</h3>
                <canvas id="rolesChart" width="400" height="200"></canvas>
            </div>
        </section>

        <!-- Tables -->
        <section id="tables" class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="bg-gradient-to-br from-blue-900/80 to-emerald-900/80 rounded-3xl shadow-2xl">
                <div class="px-10 py-8 border-b border-blue-900/40">
                    <h3 class="text-xl font-bold text-emerald-200">Top 5 des emprunteurs</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-emerald-900/40 rounded-xl overflow-hidden">
                        <thead class="bg-gradient-to-r from-blue-900/60 to-emerald-900/60">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-emerald-200 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-emerald-200 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-emerald-200 uppercase tracking-wider">Emprunts</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white/10 divide-y divide-emerald-900/20">
                            @foreach($topEmprunteurs as $emprunteur)
                            <tr class="hover:bg-emerald-900/20 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-white">{{ $emprunteur->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-emerald-200">{{ $emprunteur->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-300 font-bold">{{ $emprunteur->total_emprunts }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-gradient-to-br from-emerald-900/80 to-blue-900/80 rounded-3xl shadow-2xl">
                <div class="px-10 py-8 border-b border-emerald-900/40">
                    <h3 class="text-xl font-bold text-blue-200">Adhérents récents</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-blue-900/40 rounded-xl overflow-hidden">
                        <thead class="bg-gradient-to-r from-emerald-900/60 to-blue-900/60">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-blue-200 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-blue-200 uppercase tracking-wider">Date d'inscription</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white/10 divide-y divide-blue-900/20">
                            @foreach($adherentsRecents as $adherent)
                            <tr class="hover:bg-blue-900/20 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-white">{{ $adherent->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-emerald-200">{{ $adherent->date_inscription->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Graphique des adhérents par mois
    const adherentsCtx = document.getElementById('adherentsChart').getContext('2d');
    const adherentsData = @json($adherentsParMois);

    new Chart(adherentsCtx, {
        type: 'line',
        data: {
            labels: adherentsData.map(item => item.mois),
            datasets: [{
                label: 'Adhérents inscrits',
                data: adherentsData.map(item => item.total),
                borderColor: 'rgb(34,197,94)',
                backgroundColor: 'rgba(34,197,94,0.1)',
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: { color: '#fff' }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        color: '#fff'
                    },
                    grid: { color: 'rgba(255,255,255,0.1)' }
                },
                x: {
                    ticks: { color: '#fff' },
                    grid: { color: 'rgba(255,255,255,0.1)' }
                }
            }
        }
    });

    // Graphique de répartition des rôles
    const rolesCtx = document.getElementById('rolesChart').getContext('2d');
    const rolesData = @json($repartitionRoles);

    new Chart(rolesCtx, {
        type: 'doughnut',
        data: {
            labels: rolesData.map(item => item.role === 'admin' ? 'Administrateurs' : 'Adhérents'),
            datasets: [{
                data: rolesData.map(item => item.total),
                backgroundColor: [
                    'rgb(59,130,246)', // Blue for admin
                    'rgb(16,185,129)'   // Emerald for adherents
                ],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { color: '#fff' }
                }
            }
        }
    });
});
</script>
@endsection
