<?php
session_start();
include_once('config.php');

// Supondo que o usuário esteja logado e o ID do usuário esteja armazenado na sessão
$user_id = $_SESSION['user_id'];

// Obtém os dados do usuário do banco de dados
$res = mysqli_query($conexao, "SELECT * FROM users WHERE id='$user_id'");
$user = mysqli_fetch_assoc($res);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pais = $_POST['pais'];

    // Atualiza os dados do usuário no banco de dados
    if (!empty($password)) {
        $query = "UPDATE users SET username='$username', password='$password', pais='$pais' WHERE id='$user_id'";
    } else {
        $query = "UPDATE users SET username='$username', pais='$pais' WHERE id='$user_id'";
    }
    mysqli_query($conexao, $query);

    // Redireciona para a mesma página para exibir os dados atualizados
    header("Location: settings.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #2c2c2c; /* Fundo cinza chumbo */
            margin-left: 250px; /* Espaço para a barra lateral */
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-top: 50px;
        }
        h2 {
            color: #ffcc00;
        }
        .form-group label {
            color: #ffffff;
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
    <?php include 'sidebar.php'; ?>
    <div class="container text-center">
        <h2 class="mb-4"><i class="fas fa-bee bee-icon"></i> Configurações</h2>
        <p>ID do Usuário: <?php echo $user_id; ?></p>
        <form action="settings.php" method="POST" id="settingsForm">
            <div class="form-group text-left">
                <label for="username"><i class="fas fa-user"></i> Nome de Usuário</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" required>
            </div>
            <div class="form-group text-left">
                <label for="password"><i class="fas fa-lock"></i> Nova Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua nova senha">
            </div>
            <div class="form-group text-left">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" readonly>
            </div>
            <div class="form-group text-left">
                <label for="pais"><i class="fas fa-globe"></i> País</label>
                <input type="text" class="form-control" id="pais" name="pais" value="<?php echo $user['pais']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="saveButton" style="display: none;">Salvar</button>
        </form>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Exibe o botão "Salvar" apenas se alguma modificação for feita
        const form = document.getElementById('settingsForm');
        const saveButton = document.getElementById('saveButton');
        form.addEventListener('input', () => {
            saveButton.style.display = 'block';
        });
    </script>
</body>
</html>