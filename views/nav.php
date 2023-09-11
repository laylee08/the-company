<div class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
    <a href="dashboard.php" class="navbar-brand text-light">
        <h1 class="h5">The Company</h1>
    </a>
    <ul class="ms-auto navbar-nav">
        <li class="nav-item">
        <a href="profile.php" class="nav-link"><?= $_SESSION['username'] ?></a>
        </li>
        <li class="nav-item">
            <a href="../actions/logout.php" class="nav-link text-danger">Log out</a>
        </li>
    </ul>
</div>