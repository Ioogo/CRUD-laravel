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
  <title>Cursos Técnicos — Etec</title>
  <style>
    :root {
      --bg: #fff;
      --card: #ffffff;
      --accent: #0ea5a4;
      --muted: #6b7280
    }

    * {
      box-sizing: border-box
    }

    body {
      margin: 0;
      font-family: Inter, system-ui, Arial;
      background: var(--bg);
      color: #0f1724
    }

    .wrap {
      max-width: 1100px;
      margin: 36px auto;
      padding: 18px
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px;
      margin-top: 18px
    }

    .course {
      background: linear-gradient(180deg, #fff, #fbfffe);
      padding: 14px;
      border-radius: 12px;
      border: 1px solid rgba(0, 0, 0, 0.04)
    }

    .course img {
      width: 100%;
      border-radius: 8px;
      height: 140px;
      object-fit: cover
    }

    .meta {
      color: var(--muted);
      font-size: 0.95rem
    }

    .btn {
      display: inline-block;
      padding: 8px 12px;
      background: var(--accent);
      color: #fff;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 700
    }

    @media (max-width: 900px) {
      .grid {
        grid-template-columns: 1fr
      }
    }
  </style>
</head>

<body>
  <div class="wrap">
    <header>
      <div>
        <h2 style="margin:0">Cursos Técnicos</h2>
        <div class="meta">Modalidade presencial — encontre o curso ideal</div>
      </div>
      <div>
        @if($usuarioLogado)
          <span class="meta">Olá, {{ $usuarioLogado->name }}</span>
        @endif
      </div>
    </header>

    <div class="grid">
      <div class="course">
        <img src="{{ asset('img/adm.png') }}" alt="Administração">
        <h3>Administração</h3>
        <p class="meta">Planejamento, gestão e processos administrativos.</p>
        <a class="btn" href="#">Ver Curso</a>
      </div>

      <div class="course">
        <img src="{{ asset('img/contabilidade.jpg') }}" alt="Contabilidade">
        <h3>Contabilidade</h3>
        <p class="meta">Controle financeiro, tributos e demonstrações contábeis.</p>
        <a class="btn" href="#">Ver Curso</a>
      </div>

      <div class="course">
        <img src="{{ asset('img/ds.jpg') }}" alt="Desenvolvimento de Sistemas">
        <h3>Desenvolvimento de Sistemas</h3>
        <p class="meta">Programação, testes e manutenção de software.</p>
        <a class="btn" href="#">Ver Curso</a>
      </div>

      <div class="course">
        <img src="{{ asset('img/financas.jpg') }}" alt="Finanças">
        <h3>Finanças</h3>
        <p class="meta">Mercado financeiro, investimentos e crédito.</p>
        <a class="btn" href="#">Ver Curso</a>
      </div>

      <div class="course">
        <img src="{{ asset('img/logistica.jpg') }}" alt="Logística">
        <h3>Logística</h3>
        <p class="meta">Operações de transporte, armazenamento e distribuição.</p>
        <a class="btn" href="#">Ver Curso</a>
      </div>

      <div class="course">
        <img src="{{ asset('img/rh.jpg') }}" alt="Recursos Humanos">
        <h3>Recursos Humanos</h3>
        <p class="meta">Gestão de pessoas e processos seletivos.</p>
        <a class="btn" href="#">Ver Curso</a>
      </div>
    </div>

    <footer style="margin-top:28px;color:var(--muted)">Etec da Zona Leste — contato: (11) 2045-4000</footer>
  </div>
</body>

</html>