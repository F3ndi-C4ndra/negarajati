<x-guest-layout>
    <!-- Session Status (Notifikasi) -->
    @if (session('status'))
        <div class="alert alert-success mb-3 small">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email Admin</label>
            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus placeholder="masukkan email admin">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required placeholder="masukkan password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
            <label class="form-check-label small text-muted" for="remember_me">Ingat Saya</label>
        </div>

        <!-- Tombol Login -->
        <button type="submit" class="btn btn-success w-100 py-2 fw-bold mb-3">
            Masuk ke Admin Panel
        </button>

        <div class="text-center">
            <small class="text-muted">Belum punya akun admin? 
                <a href="{{ route('register') }}" class="text-success fw-bold text-decoration-none">Daftar di sini</a>
            </small>
        </div>
    </form>
</x-guest-layout>