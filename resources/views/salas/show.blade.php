<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Sala - {{ $sala->nombre }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-slate-950 text-slate-100 min-h-screen p-6 md:p-12 flex justify-center items-center font-sans">

    <div
        class="max-w-2xl w-full bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-2xl animate__animated animate__fadeIn">

        <div class="flex justify-between items-start pb-6 border-b border-slate-800 mb-6">
            <div>
                <span
                    class="text-xs font-mono font-bold text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 px-3 py-1 rounded-full">
                    Sala #{{ $sala->id }}
                </span>
                <h1 class="text-3xl font-black text-white mt-2">{{ $sala->nombre }}</h1>
                <p class="text-slate-400 text-sm mt-1">Capacidad máxima: <strong
                        class="text-cyan-300">{{ $sala->capacidad }} personas</strong></p>
            </div>

            <a href="{{ route('salas.index') }}"
                class="text-slate-400 hover:text-white text-xs font-semibold px-3 py-2 bg-slate-800 rounded-xl transition-colors">
                ← Volver al listado
            </a>
        </div>

        <!-- Reservas asociadas a esta sala -->
        <h2 class="text-lg font-bold text-slate-200 mb-4">Reservas asignadas a esta sala</h2>

        <div class="space-y-3 mb-8">
            @forelse($sala->reservas as $reserva)
                <div
                    class="bg-slate-950 border border-slate-800/80 rounded-xl p-4 flex justify-between items-center text-sm">
                    <div>
                        <p class="font-bold text-emerald-400">👤 {{ $reserva->cliente }}</p>
                        <p class="text-xs text-slate-500 mt-1">
                            {{ $reserva->fecha_inicio }} — {{ $reserva->fecha_fin }}
                        </p>
                    </div>
                    <a href="{{ route('reservas.show', $reserva->id) }}"
                        class="text-xs text-slate-400 hover:text-cyan-400 underline">
                        Ver reserva
                    </a>
                </div>
            @empty
                <p class="text-slate-500 text-sm italic bg-slate-950/40 p-4 rounded-xl border border-slate-800/50">
                    No hay reservas activas registradas para esta sala.
                </p>
            @endforelse
        </div>

        <!-- Acciones principales -->
        <div class="flex justify-end gap-3 pt-4 border-t border-slate-800">
            <a href="{{ route('salas.edit', $sala->id) }}"
                class="bg-amber-500/10 border border-amber-500/30 hover:bg-amber-500/20 text-amber-400 font-bold px-4 py-2 rounded-xl text-xs transition-colors">
                Editar Sala
            </a>
        </div>

    </div>

</body>

</html>
