<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Reserva #{{ $reserva->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-slate-950 text-slate-100 min-h-screen p-6 md:p-12 flex justify-center items-center font-sans">

    <div
        class="max-w-xl w-full bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-2xl animate__animated animate__fadeIn">

        <div class="flex justify-between items-center pb-6 border-b border-slate-800 mb-6">
            <div>
                <span
                    class="text-xs font-mono font-bold text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-3 py-1 rounded-full">
                    Reserva #{{ $reserva->id }}
                </span>
                <h1 class="text-2xl font-bold text-white mt-3">👤 {{ $reserva->cliente }}</h1>
            </div>

            <a href="{{ route('reservas.index') }}"
                class="text-slate-400 hover:text-white text-xs font-semibold px-3 py-2 bg-slate-800 rounded-xl transition-colors">
                ← Volver
            </a>
        </div>

        <div class="space-y-4 mb-8">
            <div class="bg-slate-950 p-4 rounded-xl border border-slate-800">
                <span class="text-xs text-slate-500 font-semibold block mb-1">Sala Reservada:</span>
                <a href="{{ route('salas.show', $reserva->sala->id) }}"
                    class="text-lg font-bold text-cyan-400 hover:underline">
                    🏢 {{ $reserva->sala->nombre ?? 'Sin sala asignada' }}
                </a>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-slate-950 p-4 rounded-xl border border-slate-800">
                    <span class="text-xs text-slate-500 font-semibold block mb-1">Fecha de Inicio:</span>
                    <span class="text-sm font-mono text-emerald-400">{{ $reserva->fecha_inicio }}</span>
                </div>
                <div class="bg-slate-950 p-4 rounded-xl border border-slate-800">
                    <span class="text-xs text-slate-500 font-semibold block mb-1">Fecha de Fin:</span>
                    <span class="text-sm font-mono text-rose-400">{{ $reserva->fecha_fin }}</span>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-slate-800">
            <a href="{{ route('reservas.edit', $reserva->id) }}"
                class="bg-amber-500/10 border border-amber-500/30 hover:bg-amber-500/20 text-amber-400 font-bold px-4 py-2 rounded-xl text-xs transition-colors">
                Editar Reserva
            </a>
        </div>

    </div>

</body>

</html>
