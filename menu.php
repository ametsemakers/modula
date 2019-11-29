<nav class="nav bg-dark">
    <a class="nav-link" href="index.php">Home</a>
    <a class="nav-link" href="contact.php">Contact</a>

    <?php if (!isset($_SESSION['login'])) { ?>

        <a class="nav-link" href="login.php">Login</a>

    <?php } else { ?>

        <a class="nav-link" href="admin.php">Admin</a>
        <a class="nav-link" href="deconnexion.php">Logout</a>

    <?php } ?>

</nav>