<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Reserva</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-slate-950 text-slate-100 min-h-screen p-6 md:p-12 flex justify-center items-center font-sans">

    <div
        class="max-w-lg w-full bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-2xl animate__animated animate__fadeInDown">

        <div class="mb-6 pb-4 border-b border-slate-800">
            <h1 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-500">
                Nueva Reserva
            </h1>
            <p class="text-slate-400 text-sm mt-1">Selecciona una sala y asigna los horarios</p>
        </div>

        <form action="{{ route('reservas.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Desplegable de Salas -->
            <div>
                <label for="sala_id" class="block text-xs font-semibold text-slate-300 mb-2">Sala de Reuniones</label>
                <select name="sala_id" id="sala_id" required
                    class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3.5 text-white text-sm focus:outline-none focus:border-emerald-500 transition-colors">
                    <option value="" disabled selected>Selecciona una sala...</option>
                    @foreach ($salas as $sala)
                        <option value="{{ $sala->id }}" {{ old('sala_id') == $sala->id ? 'selected' : '' }}>
                            {{ $sala->nombre }} (Capacidad: {{ $sala->capacidad }} pers.)
                        </option>
                    @endforeach
                </select>
                @error('sala_id')
                    <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Nombre del Cliente -->
            <div>
                <label for="cliente" class="block text-xs font-semibold text-slate-300 mb-2">Nombre del Cliente /
                    Empresa</label>
                <input type="text" name="cliente" id="cliente" value="{{ old('cliente') }}" required
                    placeholder="Ej: Acme Corp / Juan Pérez"
                    class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3.5 text-white text-sm focus:outline-none focus:border-emerald-500 transition-colors">
                @error('cliente')
                    <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Fechas Inicio y Fin -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="fecha_inicio" class="block text-xs font-semibold text-slate-300 mb-2">Fecha y Hora
                        Inicio</label>
                    <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}"
                        required
                        class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-colors">
                    @error('fecha_inicio')
                        <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="fecha_fin" class="block text-xs font-semibold text-slate-300 mb-2">Fecha y Hora
                        Fin</label>
                    <input type="datetime-local" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin') }}"
                        required
                        class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-colors">
                    @error('fecha_fin')
                        <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Acciones -->
            <div class="flex justify-end items-center gap-3 pt-4 border-t border-slate-800/80">
                <a href="{{ route('reservas.index') }}"
                    class="text-slate-400 hover:text-white text-xs font-semibold px-4 py-2.5 rounded-xl transition-colors">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-slate-950 font-bold py-2.5 px-6 rounded-xl shadow-lg shadow-emerald-500/20 text-xs transition-all duration-300 transform active:scale-95">
                    Guardar Reserva
                </button>
            </div>
        </form>

    </div>

</body>

</html>
