<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Estilo personalizado -->
    <link rel="stylesheet" href="{{ asset('css/editar.css') }}">

    <!-- Fonte Boldonse -->
    <link href="https://fonts.googleapis.com/css2?family=Boldonse&display=swap" rel="stylesheet">

    <title>Edição de Produtos</title>
</head>
<body style="background-color:rgb(73, 73, 73);">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/icone.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Cadastro de Produtos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/listar-produtos">Listar Produtos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Título -->
    <h1 class="titulo">Edição de Produtos</h1>

    <!-- Formulário -->
    <form action="/editar-produtos/{{ $produto->id }}" method="POST" class="formulario">
        @csrf
         <div class="mb-3">
            <label for="campoNome" class="form-label text-white">Nome</label>
            <input type="text" class="form-control" id="campoNome" name="nome" value="{{ $produto->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="campoValor" class="form-label text-white">Valor</label>
            <input type="text" class="form-control" id="campoValor" name="valor" value="{{ $produto->valor }}" required>
        </div>

        <div class="mb-3">
            <label for="campoQuantidade" class="form-label text-white">Quantidade</label>
            <input type="text" class="form-control" id="campoQuantidade" name="quantidade" value="{{ $produto->quantidade }}" required>
        </div>

        <div class="btn-container">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-danger" id="btnExcluir">Excluir Produto</button>
        </div>
    </form>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>
        document.getElementById('btnExcluir').addEventListener('click', function () {
            Swal.fire({
                title: 'Tem certeza?',
                text: "Você quer mesmo excluir este produto?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/excluir-produtos/{{ $produto->id }}";
                }
            });
        });
    </script>
</body>
</html>
