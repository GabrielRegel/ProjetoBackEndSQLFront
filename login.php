<?php
session_start();

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once('config.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Seleciona o usuário com o nome de usuário fornecido
    $res = mysqli_query($conexao, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($res);

    // Verifica se o usuário existe e se a senha está correta
    if ($user && $password == $user['password']) {
        // Armazena o ID do usuário na sessão
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Nome de usuário ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .error-message {
            color: red;
            margin-top: 10px;
        }
        .bee-icon {
            color: #ffcc00;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2 class="mb-4"><i class="fas fa-bee bee-icon"></i> Login</h2>
        <?php if ($error_message): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="form-group text-left">
                <label for="username"><i class="fas fa-user"></i> Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Digite seu nome de usuário" value="" required>
            </div>
            <div class="form-group text-left">
                <label for="password"><i class="fas fa-lock"></i> Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" value="" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="submit">Entrar</button>
        </form>
        <p class="mt-3">Não tem uma conta? <a href="signup.php">SignUp</a></p>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>