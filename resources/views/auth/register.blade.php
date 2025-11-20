<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Cadastro — Etec</title>
  <style>
    :root{ --bg1:#f6f8fb; --card:#ffffff; --accent:#16a34a; --muted:#6b7280 }
    *{box-sizing:border-box}
    body{margin:0;height:100vh;display:flex;align-items:center;justify-content:center;font-family:Inter,system-ui,Arial;background:linear-gradient(180deg,#f8fbff,#eef6fb);color:#0f1724;padding:20px}
    .card{width:100%;max-width:520px;padding:28px;border-radius:12px;background:var(--card);box-shadow:0 12px 30px rgba(2,6,23,0.06)}
    h1{margin:0 0 6px;font-size:1.25rem}
    p.lead{margin:0 0 18px;color:var(--muted);font-size:0.95rem}
    .grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}
    input[type="text"],input[type="email"],input[type="password"]{padding:10px 12px;border-radius:10px;border:1px solid rgba(15,23,42,0.06);outline:none;font-size:0.95rem}
    .full{grid-column:1 / -1;display:flex;justify-content:space-between;align-items:center;margin-top:8px}
    .btn-primary{background:var(--accent);color:#fff;padding:10px 14px;border-radius:10px;border:0;font-weight:700;cursor:pointer}
    .link{color:var(--muted);text-decoration:none;font-size:0.95rem}
    .errors{background:#fee2e2;color:#7f1d1d;padding:10px;border-radius:8px;margin-bottom:12px;border:1px solid rgba(185,28,28,0.06)}
    @media(max-width:600px){.grid{grid-template-columns:1fr}}
  </style>
</head>
<body>
  <main class="card" role="main">
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:8px">
      <div style="width:44px;height:44px;border-radius:10px;background:linear-gradient(135deg,#34d399,#10b981);display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff">R</div>
      <div>
        <h1>Cadastro</h1>
        <p class="lead">Crie sua conta para acessar cursos e recursos</p>
      </div>
    </div>

    @if ($errors->any())
      <div class="errors">
        @foreach ($errors->all() as $e)
          <div>{{ $e }}</div>
        @endforeach
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="grid">
        <div>
          <label style="font-size:0.9rem;color:var(--muted)">Nome</label>
          <input type="text" name="name" required />
        </div>

        <div>
          <label style="font-size:0.9rem;color:var(--muted)">Email</label>
          <input type="email" name="email" required />
        </div>

        <div style="grid-column:1 / -1">
          <label style="font-size:0.9rem;color:var(--muted)">Senha</label>
          <input type="password" name="password" required />
        </div>
      </div>

      <div class="full">
        <a class="link" href="{{ route('login') }}">Já tenho conta</a>
        <button type="submit" class="btn-primary">Cadastrar</button>
      </div>
    </form>
  </main>
</body>
</html>