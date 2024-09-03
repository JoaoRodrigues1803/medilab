<?php 
    // require_once "./connect.php";
    // $cx = new connect();
    // $dados = $cx->selectFor('SELECT * FROM `usuarios`');
    // var_dump($dados);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .alert {
            display: none;
        }
    </style>
</head>

<body>
    <div id="debug">

    </div>
    <div class="login-container">
        <h2 class="text-center mb-4">Login</h2>
        <div class="alert alert-danger" id="errorMessage"></div>
        <form id="loginForm">
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" name="login" id="login" placeholder="Digite seu login" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="senha" id="password" placeholder="Digite sua senha" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({                    
                    type: 'POST',
                    url: './logar.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: (response)=>{
                       if (response.success) {
                           window.location.href = 'home.php';
                       } else {
                           $('#errorMessage').text(response.message).show();
                       }

                       console.log($(this).serialize());
                   },
                    error: (erro)=>{
                       $('#errorMessage').text('Erro ao tentar se conectar ao servidor.').show();
                   }

                });
            });
        });
    </script>
</body>

</html>