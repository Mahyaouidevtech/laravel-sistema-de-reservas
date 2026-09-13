<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sala</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen p-6 md:p-12 flex justify-center items-center font-sans">

    <div class="max-w-lg w-full bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-2xl animate__animated animate__fadeInDown">

        <div class="mb-6 pb-4 border-b border-slate-800">
            <h1 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">
                Editar Sala #{{ $sala->id }}
            </h1>
            <p class="text-slate-400 text-sm mt-1">Actualiza los detalles de la sala registrada</p>
        </div>

        <form action="{{ route('salas.update', $sala->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="nombre" class="block text-xs font-semibold text-slate-300 mb-2">Nombre de la Sala</label>
                <input
                    type="text"
                    name="nombre"
                    id="nombre"
                    value="{{ old('nombre', $sala->nombre) }}"
                    required
                    class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3.5 text-white text-sm focus:outline-none focus:border-amber-500 transition-colors"
                >
                @error('nombre')
                    <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="capacidad" class="block text-xs font-semibold text-slate-300 mb-2">Capacidad (Personas)</label>
                <input
                    type="number"
                    name="capacidad"
                    id="capacidad"
                    value="{{ old('capacidad', $sala->capacidad) }}"
                    required
                    class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3.5 text-white text-sm focus:outline-none focus:border-amber-500 transition-colors"
                >
                @error('capacidad')
                    <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end items-center gap-3 pt-4 border-t border-slate-800/80">
                <a href="{{ route('salas.index') }}" class="text-slate-400 hover:text-white text-xs font-semibold px-4 py-2.5 rounded-xl transition-colors">
                    Cancelar
                </a>
                <button type="submit" class="bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-400 hover:to-orange-500 text-slate-950 font-bold py-2.5 px-6 rounded-xl shadow-lg shadow-amber-500/20 text-xs transition-all duration-300 transform active:scale-95">
                    Actualizar Sala
                </button>
            </div>
        </form>

    </div>

</body>
</html>
