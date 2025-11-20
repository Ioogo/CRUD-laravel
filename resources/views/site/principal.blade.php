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
  <title>Início — Etec Zona Leste</title>
  <style>
    :root{
      --bg:#f6f8fb; --card:#fff; --accent:#2b6cb0; --muted:#6b7280;
    }
    *{box-sizing:border-box}
    body{margin:0;font-family:Inter,system-ui,Arial;background:linear-gradient(180deg,#f8fbff,#eef6fb);color:#0f1724}
    .site{max-width:1100px;margin:36px auto;padding:20px}
    header{display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:18px}
    .brand{display:flex;align-items:center;gap:12px}
    .brand img{height:46px}
    nav a{margin-left:12px;color:var(--muted);text-decoration:none;font-weight:600}
    .hero{display:grid;grid-template-columns:1fr 320px;gap:20px;align-items:start;margin-bottom:20px}
    .hero-card{background:var(--card);padding:24px;border-radius:12px;box-shadow:0 8px 24px rgba(15,23,42,0.06)}
    .hero .title{font-size:1.45rem;margin:0 0 8px}
    .hero .lead{color:var(--muted);margin:0}
    .tiles{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:16px}
    .tile{background:linear-gradient(180deg, #fff, #fbfdff);padding:16px;border-radius:10px;border:1px solid rgba(15,23,42,0.04)}
    .tile h4{margin:0 0 8px}
    .carousel{background:linear-gradient(90deg,#eef6ff,#fff);border-radius:10px;padding:8px;text-align:center}
    footer{margin-top:28px;padding:18px;border-top:1px solid rgba(15,23,42,0.04);text-align:center;color:var(--muted)}
    .btn{display:inline-block;padding:8px 12px;border-radius:10px;text-decoration:none;font-weight:700;color:#fff;background:var(--accent)}
    @media (max-width:880px){
      .hero{grid-template-columns:1fr}
      .tiles{grid-template-columns:1fr}
    }
  </style>
</head>
<body>
  <div class="site">
    <header>
      <div class="brand">
        <a href="{{ route('site.principal') }}"><img src="{{ asset('img/logo.png') }}" alt="logo"></a>
        <div>
          <div style="font-weight:700">Etec Zona Leste</div>
          <div style="font-size:0.85rem;color:var(--muted)">Educação técnica e profissional</div>
        </div>
      </div>

      <nav>
        <a href="{{ route('site.principal') }}">Home</a>
        <a href="{{ route('site.tecnico') }}">Cursos</a>
        <a href="{{ route('site.contato') }}">Contato</a>
        @if($usuarioLogado)
          <a href="{{ route('perfil') }}">Olá, {{ $usuarioLogado->name }}</a>
        @else
          <a href="{{ route('login') }}">Entrar</a>
          <a class="btn" href="{{ route('register') }}">Cadastrar</a>
        @endif
      </nav>
    </header>

    <section class="hero">
      <div class="hero-card">
        <h2 class="title">Bem-vindo à Etec Zona Leste</h2>
        <p class="lead">Cursos técnicos, modalidades M‑Tec e AMS. Notícias, eventos e oportunidades para estudantes.</p>

        <div class="tiles" style="margin-top:18px">
          <div class="tile">
            <h4>Oportunidades</h4>
            <p style="color:var(--muted);margin:0">Concursos, estágios e parcerias com empresas locais.</p>
          </div>
          <div class="tile">
            <h4>Vestibulinho</h4>
            <p style="color:var(--muted);margin:0">Informações sobre inscrições e provas.</p>
          </div>
          <div class="tile">
            <h4>Eventos</h4>
            <p style="color:var(--muted);margin:0">Feira tecnológica e apresentação de projetos.</p>
          </div>
        </div>
      </div>

      <aside class="carousel hero-card">
        <img src="{{ asset('img/Frente_Etec.png') }}" alt="frente" style="width:100%;border-radius:8px;margin-bottom:10px">
        <div style="font-weight:700">Visite nossa infraestrutura</div>
        <p style="color:var(--muted);font-size:0.95rem">Laboratórios, bibliotecas e salas equipadas.</p>
      </aside>
    </section>

    <section class="hero-card">
      <h3 style="margin-top:0">Destaques</h3>
      <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:12px">
        <div style="flex:1;min-width:220px">
          <img src="{{ asset('img/concurso.png') }}" alt="" style="width:100%;border-radius:8px">
        </div>
        <div style="flex:2;min-width:220px">
          <h4>Feira Tecnológica</h4>
          <p style="color:var(--muted)">Alunos apresentam projetos e TCCs em um evento aberto ao público.</p>
          <a href="#" class="btn" style="background:#1f8ed6">Saiba mais</a>
        </div>
      </div>
    </section>

    <footer>
      Etec da Zona Leste — Avenida Águia de Haia, 2.633 — (11) 2045-4000
    </footer>
  </div>
</body>
</html>