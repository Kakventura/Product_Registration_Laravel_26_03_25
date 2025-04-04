<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- SweetAlert2 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        <!-- Google Font: Boldonse -->
        <link href="https://fonts.googleapis.com/css2?family=Boldonse&display=swap" rel="stylesheet">

        <title>Cadastro de Produtos</title>
    </head>
    <body style="background-color:rgb(73, 73, 73);">
        <!-- Navbar -->
        <nav class="navbar bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/icone.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Cadastro de Produtos
                </a>
            </div>
        </nav>
        <div class="container mt-4">
            <h2 class="text-center text-white">Cadastro de Produtos</h2>
            <div> &nbsp; </div>
            <div class="row align-items-center mt-4">
                <!-- Coluna da Imagem -->
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/products.png') }}" alt="Imagem de Produtos" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>
                <!-- Coluna do Formulário -->
                <div class="col-md-6">
                    <form id="formCadastro" method="POST" action="/cadastrar-produto">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="campoNome" class="text-white">Nome:</label>
                            <input type="text" class="form-control" id="campoNome" name="nome" placeholder="Defina o nome do produto:" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="campoValor" class="text-white">Valor:</label>
                            <input type="text" class="form-control" id="campoValor" name="valor" placeholder="Defina o valor do produto:" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="campoQuantidade" class="text-white">Quantidade:</label>
                            <input type="text" class="form-control" id="campoQuantidade" name="quantidade" placeholder="Defina a quantidade do produto:" required>
                        </div>
                        <button type="submit" class="btn btn-outline-success">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

        <script>
            // Adiciona o evento de envio do formulário
            document.getElementById('formCadastro').addEventListener('submit', function(event) {
                event.preventDefault(); // Impede o envio automático do formulário

                // Pegando os valores digitados nos campos
                let nome = document.getElementById('campoNome').value;
                let valor = document.getElementById('campoValor').value;
                let quantidade = document.getElementById('campoQuantidade').value;

                // Verificando se os campos estão preenchidos
                if (!nome || !valor || !quantidade) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Atenção!',
                        text: 'Preencha todos os campos antes de cadastrar.',
                        confirmButtonColor: '#ffc107'
                    });
                    return;
                }

                // Exibe a caixa de diálogo de confirmação
                Swal.fire({
                    title: "Confirmar o cadastro?",
                    html: `🛒 <b>Nome:</b> ${nome}<br>📦 <b>Quantidade:</b> ${quantidade}<br>💰 <b>Valor:</b> R$${valor}`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Sim, cadastrar!",
                    cancelButtonText: "Cancelar",
                    confirmButtonColor: "#28a745",
                    cancelButtonColor: "#d33"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Envia o formulário se o usuário confirmar
                        document.getElementById('formCadastro').submit();
                    }
                });
            });
        </script>
    </body>
</html>
