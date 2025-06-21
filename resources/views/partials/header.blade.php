<!-- Navbar -->
<nav class="navbar">

    <!-- Logo -->
    <div class="logo">
        <img src="{{asset('img/optimalTrajet.png')}}" style="font-size: 12px" alt="Logo OptimalTrajet">
    </div>

    <!-- Search Bar -->
    <div class="search-bar">
        <input type="text" placeholder="Rechercher produits, clients...">
        <button><i class="fas fa-search"></i></button>
    </div>

    <!-- Navigation Links -->
    <div class="menu-AVPC">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
            Accueil
        </a>

        <a href="{{ route('reservations.index') }}" class="{{ request()->routeIs('reservations.*') ? 'active' : '' }}">
            Reservation
        </a>

        <a href="{{ route('vehicules.index') }}" class="{{ request()->routeIs('vehicules.*') ? 'active' : '' }}">
            Vehicule
        </a>

        <a href="{{ route('chauffeurs.index') }}" class="{{ request()->routeIs('chauffeurs.*') ? 'active' : '' }}">
            Chauffeur
        </a>

        <a href="{{ route('trajets.index') }}" class="{{ request()->routeIs('trajets.*') ? 'active' : '' }}">
            Trajet
        </a>

        <a href="{{ route('administrations.index') }}" class="{{ request()->routeIs('administrations.*') ? 'active' : '' }}">
            Administration
        </a>

    </div>
    <!-- Mobile Menu Button -->
    <div class="mobile-menu-btn">
        <button id="mobile-menu-button"><i class="fas fa-bars"></i></button>
    </div>
    </div> <!-- fin de .container -->

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu d-md-none">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
            Accueil
        </a>

        <a href="{{ route('reservations.index') }}" class="{{ request()->routeIs('reservations.*') ? 'active' : '' }}">
            Reservation
        </a>

        <a href="{{ route('vehicules.index') }}" class="{{ request()->routeIs('vehicules.*') ? 'active' : '' }}">
            Vehicule
        </a>

        <a href="{{ route('chauffeurs.index') }}" class="{{ request()->routeIs('chauffeurs.*') ? 'active' : '' }}">
            Chauffeur
        </a>

        <a href="{{ route('trajets.index') }}" class="{{ request()->routeIs('trajets.*') ? 'active' : '' }}">
            Trajet
        </a>

        <a href="{{ route('administrations.index') }}" class="{{ request()->routeIs('administrations.*') ? 'active' : '' }}">
            Administration
        </a>
    </div>
</nav>