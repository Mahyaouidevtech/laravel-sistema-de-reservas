<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-2xl">
        <h1 class="text-2xl font-black text-center text-white mb-6">Iniciar Sesión</h1>

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Correo Electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-white text-sm focus:outline-none focus:border-cyan-500">
                @error('email')
                    <span class="text-rose-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Contraseña</label>
                <input type="password" name="password" required class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-white text-sm focus:outline-none focus:border-cyan-500">
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-950 font-bold py-3 rounded-xl text-sm transition-all duration-300 mt-2">
                Ingresar
            </button>
             <p class="text-xs text-center text-gray-400 mt-6">
            ¿No tienes cuenta? <a href="{{ route('register') }}" class="text-indigo-400 hover:underline">Registrate</a>
        </p>
        </form>
    </div>

</body>
</html>
