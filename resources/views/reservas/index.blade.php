<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reservas - Reservas</title>
    <!-- Tailwind CSS, Animate.css y Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-950 text-slate-100 min-h-screen p-6 md:p-12 flex flex-col items-center font-sans">

    <div class="max-w-5xl w-full animate__animated animate__fadeInDown">

        <!-- Encabezado dinámico -->
        <header
            class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 pb-6 border-b border-slate-800 gap-4">
            <div>
                <h1
                    class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-500 to-cyan-500">
                    Historial de Reservas
                </h1>
                <p class="text-slate-400 text-sm mt-1">Consulta y control visual de ocupación de salas</p>
            </div>

            <div class="flex gap-3">
                <a href="/salas"
                    class="bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold py-2.5 px-4 rounded-xl border border-slate-700 transition-all duration-300 text-sm flex items-center">
                    ← Ver Salas
                </a>
                <a href="{{ route('reservas.create') }}"
                    class="bg-gradient-to-r from-emerald-500 to-teal-600 text-slate-950 font-bold py-2.5 px-5 rounded-xl shadow-lg shadow-emerald-500/20 transition-all duration-300 transform hover:scale-105 active:scale-95 inline-flex items-center gap-2">
                    <span>+</span> Nueva Reserva
                </a>
            </div>
        </header>

        <!-- Listado de Tarjetas de Reserva -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($reservas as $index => $reserva)
                <div class="bg-slate-900 border border-slate-800 hover:border-emerald-500/40 rounded-2xl p-6 shadow-xl hover:shadow-2xl hover:shadow-emerald-500/10 transition-all duration-300 transform hover:-translate-y-1 animate__animated animate__fadeInUp group flex flex-col justify-between"
                    style="animation-delay: {{ $index * 0.1 }}s;">
                    <div>
                        <!-- Encabezado de la Tarjeta -->
                        <div class="flex justify-between items-center mb-4">
                            <span
                                class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                Reserva #{{ $reserva->id }}
                            </span>
                            <span
                                class="text-xs font-semibold px-3 py-1 rounded-lg bg-slate-800 text-cyan-300 border border-slate-700">
                                🏢 {{ $reserva->sala->nombre ?? 'Sin Sala' }}
                            </span>
                        </div>

                        <!-- Detalle del Cliente -->
                        <h2
                            class="text-2xl font-bold text-white group-hover:text-emerald-300 transition-colors duration-200 mb-4">
                            👤 {{ $reserva->cliente }}
                        </h2>

                        <!-- Fechas y Horarios -->
                        <div class="space-y-2 bg-slate-950/60 p-3.5 rounded-xl border border-slate-800/80 text-xs">
                            <div class="flex justify-between text-slate-300">
                                <span class="text-slate-500 font-medium">Inicio:</span>
                                <span class="font-mono text-emerald-400">{{ $reserva->fecha_inicio }}</span>
                            </div>
                            <div class="flex justify-between text-slate-300">
                                <span class="text-slate-500 font-medium">Fin:</span>
                                <span class="font-mono text-rose-400">{{ $reserva->fecha_fin }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Acciones -->
                    <div class="flex justify-end items-center gap-2 mt-6 pt-4 border-t border-slate-800/80">
                        <a href="{{ route('reservas.show', $reserva->id) }}"
                            class="text-slate-400 hover:text-amber-400 text-xs font-semibold px-3 py-2 rounded-lg hover:bg-slate-800 transition-all duration-200">
                            👤 Ver
                        </a>

                        <a href="{{ route('reservas.edit', $reserva->id) }}"
                            class="text-slate-400 hover:text-amber-400 text-xs font-semibold px-3 py-2 rounded-lg hover:bg-slate-800 transition-all duration-200">
                            Editar
                        </a>

                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST"
                            onsubmit="return confirm('¿Deseas cancelar esta reserva?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-slate-400 hover:text-rose-400 text-xs font-semibold px-3 py-2 rounded-lg hover:bg-slate-800 transition-all duration-200">
                                Cancelar
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div
                    class="col-span-full bg-slate-900 border border-slate-800 rounded-2xl p-12 text-center text-slate-500">
                    <p class="text-lg font-semibold">No hay reservas registradas en este momento.</p>
                </div>
            @endforelse
        </div>

    </div>

</body>

</html>
