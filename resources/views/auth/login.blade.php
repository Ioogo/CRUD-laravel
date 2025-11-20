<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Entrar — Etec</title>
  <style>
    :root{ --bg1:#0f1724; --bg2:#071026; --card:rgba(255,255,255,0.04); --accent:#7c5cff; --muted:#9aa4b2; }
    *{box-sizing:border-box}
    body{margin:0;height:100vh;display:flex;align-items:center;justify-content:center;font-family:Inter,system-ui,Arial;background:linear-gradient(180deg,var(--bg1),var(--bg2));color:#eef2ff}
    .card{width:100%;max-width:420px;padding:28px;border-radius:14px;background:linear-gradient(180deg,rgba(255,255,255,0.03),rgba(255,255,255,0.02));box-shadow:0 12px 40px rgba(2,6,23,0.6);border:1px solid rgba(255,255,255,0.03)}
    h1{margin:0 0 6px;font-size:1.25rem}
    p.lead{margin:0 0 18px;color:var(--muted);font-size:0.95rem}
    .field{display:flex;flex-direction:column;gap:6px;margin-bottom:12px}
    input[type="email"],input[type="password"]{padding:10px 12px;border-radius:10px;border:1px solid rgba(255,255,255,0.06);background:transparent;color:#fff;outline:none}
    .actions{display:flex;gap:10px;align-items:center;justify-content:space-between;margin-top:14px}
    .btn-primary{background:linear-gradient(90deg,var(--accent),#4aa6ff);border:0;color:#fff;padding:10px 14px;border-radius:10px;font-weight:700;cursor:pointer}
    .link{color:var(--muted);text-decoration:none;font-size:0.95rem}
    .alert{background:rgba(255,90,90,0.08);color:#ffdede;padding:10px;border-radius:8px;margin-bottom:12px;border:1px solid rgba(255,90,90,0.12)}
    @media(max-width:480px){body{padding:18px}.card{padding:20px}}
  </style>
</head>
<body>
  <main class="card" role="main">
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:8px">
      <div style="width:44px;height:44px;border-radius:10px;background:linear-gradient(135deg,#7c5cff,#4aa6ff);display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff">E</div>
      <div>
        <h1>Entrar</h1>
        <p class="lead">Acesse sua conta — gerencie seu perfil e cursos</p>
      </div>
    </div>

    @if (session('error'))
      <div class="alert">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="field">
        <label for="email" style="font-size:0.9rem;color:var(--muted)">Email</label>
        <input id="email" name="email" type="email" required autocomplete="email" />
      </div>

      <div class="field">
        <label for="password" style="font-size:0.9rem;color:var(--muted)">Senha</label>
        <input id="password" name="password" type="password" required autocomplete="current-password" />
      </div>

      <div class="actions">
        <a class="link" href="{{ route('register') }}">Criar conta</a>
        <button class="btn-primary" type="submit">Entrar</button>
      </div>
    </form>
  </main>
</body>
</html>