<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .forgot-card {
            width: 100%;
            max-width: 420px;
            background: #fff;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        }
        .forgot-card h3 {
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .btn-submit {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            border-radius: 10px;
            padding: 0.7rem;
            font-weight: 600;
        }
        .form-control {
            border-radius: 10px;
            padding: 0.7rem 1rem;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        }
    </style>
</head>
<body>
    <div class="forgot-card">
        <div class="text-center mb-4">
            <h3><i class="bi bi-mortarboard-fill"></i> SIAKAD</h3>
            <p class="text-muted small">Masukkan email Anda untuk mereset password.</p>
        </div>

        @if(session('status'))
            <div class="alert alert-success" role="alert">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4">
                <label class="form-label fw-medium">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-submit text-white w-100 mb-3">Kirim Link Reset Password</button>
            <p class="text-center"><a href="{{ route('login') }}" class="small text-decoration-none" style="color: #667eea;"><i class="bi bi-arrow-left"></i> Kembali ke Login</a></p>
        </form>
    </div>
</body>
</html>
