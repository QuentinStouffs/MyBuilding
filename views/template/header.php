<header>
<!-- Fixed navbar -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">MyBuilding</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/MyBuilding/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/MyBuilding/ListCommunications">Communications</a>
            </li>
            <?php if(SecurityHelper::isAdmin()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/MyBuilding/ListUsers">Utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/MyBuilding/CreateCommunication">Nouvelle communication</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/MyBuilding/CreateBuilding">Nouvel Immeuble</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/MyBuilding/ListBuildings">Liste des Immeubles</a>
                </li>
            <?php endif; ?>
        </ul>
        <div class="form-inline mt-2 mt-md-0">
            <a class="nav-link" href="/MyBuilding/logout">logout</a>
        </div>
    </div>
</nav>
</header>
