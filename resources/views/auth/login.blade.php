<x-guest-layout>
    <div class="login-container">
        

        <!-- Área central -->
        <div class="login-box">
            <h1 class="text-4xl font-extrabold text-center mb-6 text-green-400">
                Flash<span class="text-green-200">Cards</span>
            </h1>
            <h2>Login</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    placeholder="Email"
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                >
                <x-input-error :messages="$errors->get('email')" class="error" />

                <!-- Senha -->
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    placeholder="Senha"
                    required 
                >
                <x-input-error :messages="$errors->get('password')" class="error" />

                <!-- Link cadastro -->
                <a href="{{ route('register') }}" class="register-link">
                    Não tenho conta
                </a>

                <!-- Botão -->
                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>
</x-guest-layout>
