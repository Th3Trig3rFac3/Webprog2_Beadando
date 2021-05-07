<a class="navbar-brand" href="#">Element</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse col-auto" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="?p=home">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php if(isset($_SESSION)): ?>
        <li class="nav-item">
            <a class="nav-link" href="?p=auth/login">Jelentkezz be</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?p=auth/register">Regisztrálj</a>
        </li>
        <?php endif; ?>
        <?php if(!(isset($_SESSION))):?>
            <li class="nav-item">
                <a class="nav-link" href="?p=logout">Kijelentkezés</a>
            </li>
        <?php endif;?>
        <li class="nav-item">
            <a class="nav-link" href="?p=about">About</a>
        </li>
        <?php if ($_SESSION['role'] === 9): ?>
        <li class="nav-item">
            <a class="nav-link" href="?p=admin">Admin panel</a>
        </li>
        <?php endif; ?>
        <!--
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
    </ul>
    <!-- search mehetne ide -->
</div>
