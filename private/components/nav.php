<a class="navbar-brand" href="#">Element</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse col-auto d-flex" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="?p=home">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php if(!(isset($_SESSION['user']['username']))): ?>
        <li class="nav-item">
            <a class="nav-link" href="?p=auth/login">Jelentkezz be</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?p=auth/register">Regisztrálj</a>
        </li>
        <?php else:?>
            <li class="nav-item">
                <a class="nav-link" href="?p=auth/logout">Kijelentkezés</a>
            </li>
        <?php endif;?>
        <?php if(!($PAGE === "receptek" || $PAGE === "file-upload")): ?>
        <li class="nav-item">
            <a class="nav-link" href="?p=receptek">Receptek</a>
        </li>
        <?php endif; ?>
        <?php if($PAGE === "receptek"): ?>
            <li class="nav-item">
                <a class="nav-link" href="?p=owned_recepies">Saját receptek</a>
            </li>
        <?php if(isset($_GET['submit'])): ?>
            <a class="btn btn-warning" href="?p=subreddit/search"></a> ?>
        <?php endif; ?>
            <form class="form-inline my-2 my-lg-0 justify-content-end" method="get" action="?p=search">
                <label for="search">Search</label>
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search" name="search">
                <input type="hidden" name="p" value="subreddit/search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="submit">Search</button>
            </form>
        <?php endif; ?>
        <?php if(isset($_SESSION['user']) && $PAGE === "receptek"): ?>
        <li class="nav-item">
            <a class="nav-link" href="?p=file-upload">Recept feltöltése</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link" href="?p=about">About</a>
        </li>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === 9): ?>
        <li class="nav-item">
            <a class="nav-link" href="?p=admin">Admin panel</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?p=export">Users export</a>
        </li>
        <?php endif;?>
    </ul>
</div>
