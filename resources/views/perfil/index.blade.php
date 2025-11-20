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
  <title>Meu Perfil</title>
  <style>
    :root{
      --bg:#f4f7fb;
      --card:#ffffff;
      --accent:#ff6b6b;
      --muted:#6b7280;
    }
    *{box-sizing:border-box}
    body{ margin:0; min-height:100vh; font-family:Inter,system-ui,Arial; background:linear-gradient(180deg,#f7fafc,#eef2f7); color:#111827; display:flex; align-items:center; justify-content:center; padding:30px;}
    .container{ width:100%; max-width:880px; }
    .header{ display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; }
    .brand{ display:flex; gap:12px; align-items:center; }
    .brand img{ height:40px; }
    .card{ background:var(--card); padding:24px; border-radius:12px; box-shadow:0 6px 24px rgba(15,23,42,0.06); display:flex; gap:20px; align-items:center; }
    .avatar{ width:92px; height:92px; border-radius:999px; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:28px; color:#fff; background:linear-gradient(135deg,#ff9e7a,#ff5b7a); }
    .meta{ color:var(--muted); font-size:0.95rem; margin-top:6px;}
    .actions{ display:flex; gap:10px; margin-top:12px; }
    .btn{ padding:8px 12px; border-radius:10px; text-decoration:none; font-weight:600; cursor:pointer; }
    .btn-edit{ background:linear-gradient(90deg,#ffd166,#ff7a59); color:#0b1220; box-shadow:0 8px 20px rgba(255,122,89,0.08);}
    .btn-ghost{ background:transparent; color:#374151; border:1px solid rgba(0,0,0,0.06); }
    .btn-danger{ background:#fee2e2; color:#b91c1c; border-radius:8px; padding:8px 10px; border:1px solid rgba(185,28,28,0.06); }
    .info{ flex:1; }
    .small{ color:var(--muted); font-size:0.85rem; }
    @media (max-width:720px){
      .card{ flex-direction:column; text-align:center; align-items:center; }
      .info{ width:100% }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <div class="brand">
        <a href="{{ route('site.principal') }}"><img src="{{ asset('img/logo.png') }}" alt="logo"></a>
      </div>
      <div>
        @php
          $usuarioLogado = session()->has('user_id') ? \App\Models\User::find(session('user_id')) : null;
        @endphp
        @if($usuarioLogado)
          <span class="small">Olá, {{ $usuarioLogado->name }}</span>
        @endif
      </div>
    </div>

    <div class="card" role="main">
      <div class="avatar">{{ strtoupper(substr($user->name,0,1)) }}</div>

      <div class="info">
        <h2 style="margin:0">{{ $user->name }}</h2>
        <div class="meta">{{ $user->email }}</div>
        <div class="small" style="margin-top:8px">ID: <strong>{{ $user->id }}</strong></div>

        <div class="actions">
          <a href="{{ route('perfil.editar') }}" class="btn btn-edit">Editar Perfil</a>
          <a href="{{ route('logout') }}" class="btn btn-ghost">Sair</a>
          <a href="#" class="btn btn-danger" onclick="confirmDelete(event)">Excluir Conta</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function confirmDelete(e){
      e.preventDefault();
      if(confirm('Tem certeza que deseja excluir sua conta? Esta ação é irreversível.')){
        window.location = "{{ route('perfil.excluir') }}";
      }
    }
  </script>
</body>

</html>