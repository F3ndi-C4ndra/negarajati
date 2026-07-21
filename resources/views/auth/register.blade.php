<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama Lengkap -->
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus placeholder="Masukkan nama lengkap">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Alamat Email -->
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email Admin</label>
            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="admin@desanegarajati.id">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required placeholder="Minimal 8 karakter">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required placeholder="Ulangi password">
        </div>

        <!-- Tombol Register -->
        <button type="submit" class="btn btn-success w-100 py-2 fw-bold mb-3">
            Daftar Akun Admin
        </button>

        <div class="text-center">
            <small class="text-muted">Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-success fw-bold text-decoration-none">Login di sini</a>
            </small>
        </div>
    </form>
</x-guest-layout>