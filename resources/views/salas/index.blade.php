<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reservas - Salas</title>
    <!-- Tailwind CSS, Animate.css y Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-950 text-slate-100 min-h-screen p-6 md:p-12 flex flex-col items-center font-sans">

    <div class="max-w-5xl w-full animate__animated animate__fadeInDown">

        <!-- Encabezado de resources/views/salas/index.blade.php -->
        <header
            class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 pb-6 border-b border-slate-800 gap-4">
            <div>
                <h1
                    class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-sky-500 to-blue-500">
                    Gestión de Salas
                </h1>
                <p class="text-slate-400 text-sm mt-1">Control visual de espacios y capacidades</p>
            </div>

            <div class="flex flex-wrap gap-3">
                <!-- Botón para ir a la vista de Reservas -->
                <a href="{{ route('reservas.index') }}"
                    class="bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold py-2.5 px-4 rounded-xl border border-slate-700 transition-all duration-300 text-sm flex items-center gap-2">
                    <span>📅</span> Ver Reservas
                </a>

                <!-- Botón para ir a Crear Nueva Sala -->
                <a href="{{ route('salas.create') }}"
                    class="bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-950 font-bold py-2.5 px-5 rounded-xl shadow-lg shadow-cyan-500/20 transition-all duration-300 text-sm font-bold flex items-center gap-2 transform hover:scale-105 active:scale-95">
                    <span>+</span> Nueva Sala
                </a>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="text-xs font-semibold text-rose-400 hover:text-rose-300 bg-rose-500/10 border border-rose-500/20 px-3 py-2 rounded-xl">
                    Cerrar Sesión
                </button>
            </form>
        </header>

        <!-- Rejilla de Tarjetas Animadas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($salas as $index => $sala)
                <div class="bg-slate-900 border border-slate-800 hover:border-cyan-500/40 rounded-2xl p-6 shadow-xl hover:shadow-2xl hover:shadow-cyan-500/10 transition-all duration-300 transform hover:-translate-y-2 animate__animated animate__fadeInUp group flex flex-col justify-between"
                    style="animation-delay: {{ $index * 0.1 }}s;">
                    <div>
                        <!-- Badge de ID -->
                        <div class="flex justify-between items-center mb-4">
                            <span
                                class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">
                                ID #{{ $sala->id }}
                            </span>
                            <span
                                class="flex items-center gap-1.5 text-xs font-semibold bg-slate-800 text-slate-300 px-3 py-1 rounded-lg border border-slate-700/50">
                                👥 {{ $sala->capacidad }} plazas
                            </span>
                        </div>

                        <!-- Nombre de la Sala -->
                        <h2
                            class="text-2xl font-bold text-white group-hover:text-cyan-300 transition-colors duration-200 mb-2">
                            {{ $sala->nombre }}
                        </h2>
                        <p class="text-slate-400 text-sm">Espacio equipado y listo para asociar a nuevas reservas.</p>
                    </div>

                    <!-- Acciones interactivas -->
                    <div class="flex justify-end items-center gap-2 mt-6 pt-4 border-t border-slate-800/80">

                        <a href="{{ route('salas.show', $sala->id) }}"
                            class="ext-slate-400 hover:text-amber-400 text-xs font-semibold px-3 py-2 rounded-lg hover:bg-slate-800 transition-all duration-200">
                            Ver
                        </a>
                        <!-- Botón Editar (Navega a edit.blade.php) -->
                        <a href="{{ route('salas.edit', $sala->id) }}"
                            class="text-slate-400 hover:text-amber-400 text-xs font-semibold px-3 py-2 rounded-lg hover:bg-slate-800 transition-all duration-200">
                            Editar
                        </a>

                        <!-- Formulario Eliminar -->
                        <form action="{{ route('salas.destroy', $sala->id) }}" method="POST"
                            onsubmit="return confirm('¿Seguro que deseas eliminar esta sala?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-slate-400 hover:text-rose-400 text-xs font-semibold px-3 py-2 rounded-lg hover:bg-slate-800 transition-all duration-200">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</body>

</html>
