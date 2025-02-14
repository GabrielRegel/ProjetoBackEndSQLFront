<!-- filepath: /c:/xampp/htdocs/FormBD/sidebar.php -->
<div class="sidebar">
    <a href="index.php"><i class="fas fa-home"></i> Home</a>
    <a href="playlists.php"><i class="fas fa-heart"></i> Minhas Playlists</a>
    <a href="profile.php"><i class="fas fa-user"></i> Perfil</a>
    <a href="settings.php"><i class="fas fa-cog"></i> Configurações</a>
</div>

<style>
    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #FFFFFF;
        padding-top: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }
    .sidebar a {
        padding: 15px 20px;
        text-decoration: none;
        font-size: 18px;
        color: #333333;
        display: block;
    }
    .sidebar a:hover {
        background-color: #5D001E;
        color: white;
    }
    .sidebar a i {
        margin-right: 10px;
    }
</style>