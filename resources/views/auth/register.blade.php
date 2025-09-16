<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <div class="py-12 max-w-md mx-auto rounded p-6">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Título -->
            <h1 class="text-4xl font-extrabold text-center mb-2 text-green-400">
                Flash<span class="text-green-200">Cards</span>
            </h1>

            <!-- Subtítulo Cadastro -->
            <h2 class="text-white text-center mb-6" style="font-size: 1.8rem;">
                Cadastro
            </h2>

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block mb-1 font-bold">Nome</label>
                <input id="name" class="w-full border rounded px-2 py-1" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block mb-1 font-bold">Email</label>
                <input id="email" class="w-full border rounded px-2 py-1" type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block mb-1 font-bold">Senha</label>
                <input id="password" class="w-full border rounded px-2 py-1" type="password" name="password" required>
                @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block mb-1 font-bold">Confirmar Senha</label>
                <input id="password_confirmation" class="w-full border rounded px-2 py-1" type="password" name="password_confirmation" required>
            </div>

            <!-- Botões centralizados -->
            <div class="flex justify-center space-x-4">
                <button type="submit" class="px-6 py-2 bg-green-600 text-gray-800 rounded font-bold">
                    Registrar
                </button>
                <a href="{{ route('login') }}" class="px-6 py-2 bg-gray-400 text-gray-800 rounded font-bold">
                    Já registrado?
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
