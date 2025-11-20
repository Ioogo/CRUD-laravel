<style>
  .logo {
    padding-right: 1em;
  }

  .paragrafo {
    overflow-wrap: break-word;


  }
</style>
<!-- inicializa a variavel que carrega a sessão -->
@php
    use App\Models\User;
    $usuarioLogado = session()->has('user_id') ? User::find(session('user_id')) : null;
@endphp
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Contato — Etec</title>
  <style>
    :root{--bg:#fbfdff;--accent:#ef4444;--muted:#6b7280}
    body{margin:0;font-family:Inter,system-ui,Arial;background:var(--bg);color:#0f1724}
    .wrap{max-width:720px;margin:36px auto;padding:18px}
    h2{margin:0 0 8px}
    form{display:grid;gap:12px;margin-top:12px}
    input,textarea{padding:10px;border-radius:8px;border:1px solid rgba(15,23,42,0.06);width:100%;font-family:inherit}
    .btn{display:inline-block;padding:10px 14px;background:var(--accent);color:#fff;border-radius:8px;text-decoration:none;border:0}
    .meta{color:var(--muted);font-size:0.95rem}
  </style>
</head>
<body>
  <div class="wrap">
    <header style="display:flex;justify-content:space-between;align-items:center">
      <div>
        <h2>Contato</h2>
        <div class="meta">Envie sua mensagem — responderemos em breve.</div>
      </div>
      <div>@if($usuarioLogado)<span class="meta">Olá, {{ $usuarioLogado->name }}</span>@endif</div>
    </header>

    <form method="post" action="#">
      <input type="text" name="nome" placeholder="Nome completo">
      <input type="email" name="email" placeholder="Email para contato">
      <input type="text" name="assunto" placeholder="Assunto">
      <textarea name="mensagem" rows="6" placeholder="Mensagem"></textarea>
      <button class="btn" type="submit">Enviar</button>
    </form>

    <footer style="margin-top:20px;color:var(--muted)">Etec da Zona Leste — Avenida Águia de Haia, 2.633 — (11) 2045-4000</footer>
  </div>
</body>
</html>