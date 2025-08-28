@extends('layouts.tailwind')

@section('title', 'Dashboard Administrateur')

@section('content')


<div class="min-h-screen bg-gradient-to-br from-green-200 via-green-100 to-emerald-100 pb-12">
    <!-- Sticky Header -->
    <div class="sticky top-0 z-30 bg-white/80 backdrop-blur shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <h1 class="text-4xl font-extrabold text-emerald-700 tracking-tight drop-shadow">Dashboard Administrateur</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-green-700 font-medium">Connecté en tant qu'administrateur</span>
                    <a href="{{ route('home') }}" class="bg-gradient-to-r from-green-500 to-emerald-500 hover:from-emerald-600 hover:to-green-600 text-white px-5 py-2 rounded-xl shadow transition-all font-semibold">
                        Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Stat Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <div class="bg-white/70 backdrop-blur-lg rounded-2xl shadow-xl p-8 flex items-center hover:scale-105 transition-transform border border-green-200">
                <div class="p-4 rounded-full bg-green-200/60 text-green-700 shadow">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <div class="ml-6">
                    <p class="text-base font-semibold text-green-700">Total Adhérents</p>
                    <p class="text-3xl font-extrabold text-gray-900 mt-1">{{ $totalAdherents }}</p>
                </div>
            </div>
            <div class="bg-white/70 backdrop-blur-lg rounded-2xl shadow-xl p-8 flex items-center hover:scale-105 transition-transform border border-emerald-200">
                <div class="p-4 rounded-full bg-emerald-200/60 text-emerald-700 shadow">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-6">
                    <p class="text-base font-semibold text-emerald-700">Adhérents Actifs</p>
                    <p class="text-3xl font-extrabold text-gray-900 mt-1">{{ $adherentsActifs }}</p>
                </div>
            </div>
            <div class="bg-white/70 backdrop-blur-lg rounded-2xl shadow-xl p-8 flex items-center hover:scale-105 transition-transform border border-lime-200">
                <div class="p-4 rounded-full bg-lime-200/60 text-lime-700 shadow">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-6">
                    <p class="text-base font-semibold text-lime-700">Administrateurs</p>
                    <p class="text-3xl font-extrabold text-gray-900 mt-1">{{ $admins }}</p>
                </div>
            </div>
            <div class="bg-white/70 backdrop-blur-lg rounded-2xl shadow-xl p-8 flex items-center hover:scale-105 transition-transform border border-green-300">
                <div class="p-4 rounded-full bg-green-300/60 text-green-800 shadow">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="ml-6">
                    <p class="text-base font-semibold text-green-800">Total Emprunts</p>
                    <p class="text-3xl font-extrabold text-gray-900 mt-1">{{ $totalEmprunts }}</p>
                </div>
            </div>
        </div>

        <!-- Graphs -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-12">
            <div class="bg-white/70 backdrop-blur-lg rounded-2xl shadow-xl p-8">
                <h3 class="text-xl font-bold text-green-700 mb-6">Adhérents inscrits par mois</h3>
                <canvas id="adherentsChart" width="400" height="200"></canvas>
            </div>
            <div class="bg-white/70 backdrop-blur-lg rounded-2xl shadow-xl p-8">
                <h3 class="text-xl font-bold text-lime-700 mb-6">Répartition des rôles</h3>
                <canvas id="rolesChart" width="400" height="200"></canvas>
            </div>
        </div>

        <!-- Tables -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl">
                <div class="px-8 py-6 border-b border-green-200">
                    <h3 class="text-lg font-bold text-green-700">Top 5 des emprunteurs</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-green-100 rounded-xl overflow-hidden">
                        <thead class="bg-gradient-to-r from-green-100 to-emerald-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-700 uppercase tracking-wider">Emprunts</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white/80 divide-y divide-green-50">
                            @foreach($topEmprunteurs as $emprunteur)
                            <tr class="hover:bg-green-50/60 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $emprunteur->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $emprunteur->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-700 font-bold">{{ $emprunteur->total_emprunts }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl">
                <div class="px-8 py-6 border-b border-emerald-200">
                    <h3 class="text-lg font-bold text-emerald-700">Adhérents récents</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-emerald-100 rounded-xl overflow-hidden">
                        <thead class="bg-gradient-to-r from-emerald-100 to-green-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-emerald-700 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-emerald-700 uppercase tracking-wider">Date d'inscription</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white/80 divide-y divide-emerald-50">
                            @foreach($adherentsRecents as $adherent)
                            <tr class="hover:bg-emerald-50/60 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $adherent->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $adherent->date_inscription->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
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
                    'rgb(147, 51, 234)', // Purple for admin
                    'rgb(34, 197, 94)'   // Green for adherents
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
                }
            }
        }
    });
});
</script>
@endsection
