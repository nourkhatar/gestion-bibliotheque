<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Connexion - Bibliothèque</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
    body{background:#f0f0f0;font-family:sans-serif;display:flex;align-items:center;justify-content:center;min-height:100vh;margin:0}
    .login-container{width:100%;max-width:420px;background:#fff;padding:28px;border-radius:12px;box-shadow:0 10px 25px rgba(0,0,0,.08)}
    h2{margin:0 0 18px;text-align:center}
    .form-group{margin-bottom:14px}
    input[type="email"],input[type="password"]{width:100%;padding:9px 10px;border:1px solid #d1d5db;border-radius:8px;box-sizing:border-box}
    .row-between{display:flex;align-items:center;justify-content:space-between}
    .help{font-size:.9em;color:#6b7280}
    .error{color:#dc2626;font-size:.9em;margin-top:6px}
    button{width:100%;padding:10px;background:#0a58ca;color:#fff;border:0;border-radius:8px;cursor:pointer;transition:.2s}
    button:hover{background:#084298}
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Connexion</h2>

    @if ($errors->any())
      <div class="error" role="alert">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
      @csrf

      <div class="form-group">
        <label for="email">Adresse email</label>
        <input
          id="email"
          type="email"
          name="email"
          value="{{ old('email') }}"
          required
          autofocus
          autocomplete="email"
        >
        @error('email') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="form-group">
        <label for="password">Mot de passe</label>
        <div style="position:relative">
          <input
            id="password"
            type="password"
            name="password"
            required
            autocomplete="current-password"
          >
          <button type="button" id="togglePwd"
                  style="position:absolute;right:8px;top:50%;transform:translateY(-50%);background:transparent;color:#0a58ca;padding:2px 6px;border-radius:6px">
            Afficher
          </button>
        </div>
        @error('password') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="row-between" style="margin:10px 0 16px">
        <label class="help">
          <input type="checkbox" name="remember"> Se souvenir de moi
        </label>
        {{-- <a href="{{ route('password.request') }}" class="help">Mot de passe oublié ?</a> --}}
      </div>

      <button type="submit">Se connecter</button>
    </form>
  </div>

  <script>
    const btn = document.getElementById('togglePwd');
    const input = document.getElementById('password');
    btn?.addEventListener('click', () => {
      const t = input.type === 'password' ? 'text' : 'password';
      input.type = t;
      btn.textContent = t === 'password' ? 'Afficher' : 'Masquer';
    });
  </script>
</body>
</html>
