<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Google Font: Boldonse -->
        <link href="https://fonts.googleapis.com/css2?family=Boldonse&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/listar.css') }}">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Listagem de Produtos</title>
    </head>
    <body style="background-color:rgb(73, 73, 73);">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/icone.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Cadastro de Produtos
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        <div class="container mt-4">
            <h1 class="titulo">Listagem de Produtos</h1>
            <div class="table-responsive">
                <table class="table table-dark table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nome do Produto</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Data da Compra</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop para exibir os produtos -->
                        @foreach($produtos as $produto)
                        <tr class="clickable-row" data-href="/editar-produtos/{{ $produto->id }}">
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>R${{ number_format($produto->valor, 2, ',', '.') }}</td>
                            <td>{{ $produto->quantidade }}</td>
                            <td>{{ $produto->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach

                        <!-- Caso não haja produtos -->
                        @if($produtos->isEmpty())
                        <tr>
                            <td colspan="5">Nenhum produto cadastrado no momento.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            // Torna cada linha clicável
            document.addEventListener('DOMContentLoaded', function () {
                var rows = document.querySelectorAll('.clickable-row');
                rows.forEach(function (row) {
                    row.addEventListener('click', function () {
                        window.location.href = row.getAttribute('data-href'); // Redireciona para o link armazenado
                    });
                });
            });
        </script>
    </body>
</html>