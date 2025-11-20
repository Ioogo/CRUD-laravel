<style>
    .logo {
        padding-right: 1em;
    }

    .paragrafo {
        overflow-wrap: break-word;


    }
</style>
@php
    use App\Models\User;
    $usuarioLogado = null;

    if (session()->has('user_id')) {
        $usuarioLogado = User::find(session('user_id'));
    }
@endphp
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Editar Perfil</title>
  <style>
    :root{ --bg:#f6f8fb; --card:#fff; --accent:#7c5cff; --muted:#6b7280; }
    *{box-sizing:border-box}
    body{ margin:0; min-height:100vh; font-family:Inter,system-ui,Arial; background:var(--bg); display:flex; align-items:center; justify-content:center; padding:28px; color:#0f1724; }
    .wrap{ width:100%; max-width:720px; }
    .card{ background:var(--card); padding:28px; border-radius:12px; box-shadow:0 10px 40px rgba(2,6,23,0.06); }
    h1{ margin:0 0 8px 0; font-size:1.25rem; }
    p.lead{ margin:0 0 18px 0; color:var(--muted); }
    form{ display:grid; gap:12px; grid-template-columns:1fr 1fr; }
    label{ font-size:0.9rem; color:var(--muted); display:block; margin-bottom:6px; }
    input{ width:100%; padding:10px 12px; border-radius:10px; border:1px solid rgba(15,23,42,0.06); }
    .full{ grid-column:1/ -1; display:flex; gap:10px; align-items:center; justify-content:flex-end; }
    .btn{ padding:10px 14px; border-radius:10px; font-weight:600; cursor:pointer; text-decoration:none; }
    .btn-primary{ background:linear-gradient(90deg,var(--accent),#4aa6ff); color:#fff; border:0; }
    .btn-cancel{ background:transparent; border:1px solid rgba(15,23,42,0.06); color:#374151; }
    @media (max-width:720px){
      form{ grid-template-columns:1fr; }
      .full{ justify-content:stretch; flex-direction:column-reverse; }
    }
  </style>
</head>

<body>
  <div class="wrap">
    <div class="card">
      <h1>Editar Perfil</h1>
      <p class="lead">Altere seu nome, email ou senha. Deixe a senha em branco para manter a atual.</p>

      <form method="POST" action="{{ route('perfil.editar') }}">
        @csrf
        <div>
          <label for="name">Nome</label>
          <input id="name" name="name" type="text" value="{{ $user->name }}" required>
        </div>

        <div>
          <label for="email">Email</label>
          <input id="email" name="email" type="email" value="{{ $user->email }}" required>
        </div>

        <div class="full">
          <a href="{{ route('perfil') }}" class="btn btn-cancel">Cancelar</a>
          <button type="submit" class="btn btn-primary">Salvar alterações</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>