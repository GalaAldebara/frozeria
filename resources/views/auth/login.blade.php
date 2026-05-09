<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Frozeria</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --green-50: #edfaf3;
            --green-100: #c6f0d9;
            --green-400: #2eb872;
            --green-500: #1d9e5e;
            --green-600: #147a47;
            --green-800: #0a3d24;
            --gray-100: #f4f3f0;
            --gray-200: #e8e6e0;
            --gray-400: #a8a39a;
            --gray-600: #6b6560;
            --gray-900: #1c1917;
            --red-100: #fee2e2;
            --red-600: #dc2626;
            --white: #ffffff;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--gray-100);
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* ── LEFT PANEL ── */
        .left-panel {
            background: var(--green-800);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 64px 56px;
            position: relative;
            overflow: hidden;
        }

        /* decorative circles */
        .left-panel::before {
            content: '';
            position: absolute;
            width: 340px;
            height: 340px;
            border-radius: 50%;
            border: 48px solid rgba(255, 255, 255, 0.05);
            top: -80px;
            right: -80px;
        }

        .left-panel::after {
            content: '';
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            border: 32px solid rgba(255, 255, 255, 0.05);
            bottom: -40px;
            left: -40px;
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            background: var(--green-500);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 32px;
        }

        .brand-icon svg {
            width: 28px;
            height: 28px;
            stroke: white;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .left-panel h1 {
            font-family: 'Fraunces', serif;
            font-size: 38px;
            font-weight: 600;
            color: white;
            line-height: 1.2;
            letter-spacing: -0.5px;
            margin-bottom: 16px;
        }

        .left-panel h1 em {
            font-style: italic;
            color: var(--green-400);
        }

        .left-panel p {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.55);
            line-height: 1.6;
            max-width: 320px;
        }

        .feature-list {
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
        }

        .feature-item svg {
            width: 18px;
            height: 18px;
            stroke: var(--green-400);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        /* ── RIGHT PANEL ── */
        .right-panel {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 48px 40px;
        }

        .login-card {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: 16px;
            padding: 40px 36px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
        }

        .login-card-header {
            margin-bottom: 28px;
        }

        .login-card-header h2 {
            font-family: 'Fraunces', serif;
            font-size: 24px;
            font-weight: 600;
            color: var(--gray-900);
            letter-spacing: -0.3px;
            margin-bottom: 4px;
        }

        .login-card-header p {
            font-size: 14px;
            color: var(--gray-400);
        }

        /* error */
        .alert-error {
            display: flex;
            align-items: center;
            gap: 9px;
            background: var(--red-100);
            color: var(--red-600);
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 11px 14px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .alert-error svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        /* form */
        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--gray-600);
            margin-bottom: 6px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap svg {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            stroke: var(--gray-400);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            pointer-events: none;
        }

        .input-wrap input {
            width: 100%;
            padding: 11px 14px 11px 40px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--gray-900);
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: 8px;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
        }

        .input-wrap input:focus {
            border-color: var(--green-400);
            box-shadow: 0 0 0 3px rgba(46, 184, 114, 0.15);
        }

        .input-wrap input::placeholder {
            color: var(--gray-400);
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            background: var(--green-500);
            color: white;
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.15s, transform 0.1s;
            letter-spacing: 0.01em;
        }

        .btn-submit:hover {
            background: var(--green-600);
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        .login-footer {
            text-align: center;
            margin-top: 32px;
            font-size: 12px;
            color: var(--gray-400);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 720px) {
            body {
                grid-template-columns: 1fr;
            }

            .left-panel {
                display: none;
            }

            .right-panel {
                padding: 40px 20px;
            }
        }
    </style>
</head>

<body>

    {{-- LEFT PANEL --}}
    <div class="left-panel">

        <div class="brand-icon">
            <svg viewBox="0 0 24 24">
                <path d="M12 2v20M2 12h20M4.93 4.93l14.14 14.14M19.07 4.93L4.93 19.07" />
            </svg>
        </div>

        <h1>Kelola stok<br><em>lebih mudah.</em></h1>

        <p>Pantau bahan makanan, cegah kehabisan stok, dan kurangi pemborosan dalam satu dasbor.</p>

        <div class="feature-list">
            <div class="feature-item">
                <svg viewBox="0 0 24 24">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                Monitor stok real-time per kategori
            </div>
            <div class="feature-item">
                <svg viewBox="0 0 24 24">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                Notifikasi otomatis stok menipis
            </div>
            <div class="feature-item">
                <svg viewBox="0 0 24 24">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                Lacak tanggal kadaluarsa produk
            </div>
        </div>

    </div>

    {{-- RIGHT PANEL --}}
    <div class="right-panel">

        <div class="login-card">

            <div class="login-card-header">
                <h2>Selamat datang</h2>
                <p>Masuk ke akun Frozeria Anda</p>
            </div>

            @if ($errors->any())
                <div class="alert-error">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrap">
                        <svg viewBox="0 0 24 24">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                            <polyline points="22,6 12,13 2,6" />
                        </svg>
                        <input type="email" id="email" name="email" placeholder="nama@email.com"
                            value="{{ old('email') }}" required autocomplete="email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                            <path d="M7 11V7a5 5 0 0110 0v4" />
                        </svg>
                        <input type="password" id="password" name="password" placeholder="••••••••" required
                            autocomplete="current-password">
                    </div>
                </div>

                <button type="submit" class="btn-submit">Masuk</button>

            </form>

        </div>

        <div class="login-footer">&copy; {{ date('Y') }} Frozeria</div>

    </div>

</body>

</html>
