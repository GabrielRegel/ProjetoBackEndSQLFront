<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once('config.php');

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Removendo a criptografia

    $res = mysqli_query($conexao, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");

    if ($res) {
        header("Location: login.php");
        exit();
    } else {
        echo "Erro ao realizar cadastro: " . mysqli_error($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #fffbee;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin-top: 100px;
        }
        h2 {
            color: #ffcc00;
        }
        .form-group label {
            color: #333333;
        }
        .btn-primary {
            background-color: #ffcc00;
            border-color: #ffcc00;
        }
        .btn-primary:hover {
            background-color: #e6b800;
            border-color: #e6b800;
        }
        .bee-icon {
            color: #ffcc00;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2 class="mb-4"><i class="fas fa-bee bee-icon"></i> Sign Up</h2>
        <form action="signup.php" method="POST">
            <div class="form-group text-left">
                <label for="username"><i class="fas fa-user"></i> Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Digite seu username" required>
            </div>
            <div class="form-group text-left">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="form-group text-left">
                <label for="password"><i class="fas fa-lock"></i> Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
        </form>
        <p class="mt-3">Já tem uma conta? <a href="login.php">Login</a></p>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>