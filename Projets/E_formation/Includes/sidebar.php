<nav>
<!-- --------------------------------------------------------Menu-------------------------------------------------------- -->
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" 
                <?php if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] !== "")
                {
                    echo 'href="accueil.php"';
                }else{
                    echo 'href="index.php"';}
                ?> >Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Mes formations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Mes évaluations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="video_add.php">Ajout vidéos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="video_voir.php">Mes vidéos ajoutées</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="categorie_add.php">Ajout catégories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Mon compte</a>
            </li>
        </ul>
    </div>
</nav>

    <!-- <section>
        <article>
        <div class="sidebar2">
            <button class="navbar-dark navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ulSidebar2" id="navbarSupportedContent">
            <ul >
                <li>
                    <a href="#">Accueil</a>
                </li>
                <li>
                    <a href="#">Mes formations</a>
                </li>
                <li>
                    <a href="#">Mes évaluations</a>
                </li>
                <li>
                    <a href="#">Mon compte</a>
                </li>
            </ul>
            </div>
        </div> -->