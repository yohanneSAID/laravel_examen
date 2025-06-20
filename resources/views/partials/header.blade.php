<body>
    <!-- Mobile Menu Button -->
    <button id="mobileMenuBtn" class="mobile-menu-btn">
        <i class="fas fa-bars"></i>
    </button>

    <div class="app-container">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <!-- Logo -->
            <div class="logo-container">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <span class="logo-text">MMC</span>
                </div>
                <button id="toggleSidebar" class="toggle-sidebar-btn">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>

            <!-- Navigation -->
            <div class="nav-container">
                <ul class="nav-list">
                    <li>
                        <a href="{{route('home')}}" class="nav-item active">
                            <i class="fas fa-tachometer-alt nav-icon"></i>
                            <span class="nav-text">Accueil</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('reservations.index')}}" class="nav-item">
                            <i class="fas fa-shopping-cart nav-icon"></i>
                            <span class="nav-text">Reservations</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('vehicules.index')}}" class="nav-item">
                            <i class="fas fa-tags nav-icon"></i>
                            <span class="nav-text">Véhicules</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('chauffeurs.index')}}" class="nav-item">
                            <i class="fas fa-users nav-icon"></i>
                            <span class="nav-text">Chauffeurs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('trajets.index')}}" class="nav-item">
                            <i class="fas fa-users nav-icon"></i>
                            <span class="nav-text">Trajets</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('administration.index')}}" class="nav-item">
                            <i class="fas fa-users nav-icon"></i>
                            <span class="nav-text">Administration</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            <header class="navbar">
                <div class="navbar-content">
                    <div class="search-container" style="margin: 0 auto;">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" placeholder="Rechercher..." class="search-input">
                    </div>
                    <div class="notification-container" style="margin-left: auto;">
                        <button id="notificationBtn" class="notification-btn">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                        </button>
                        <div id="notificationDropdown" class="notification-dropdown">
                            <div class="notification-header">
                                <h4>Notifications</h4>
                            </div>
                            <div class="notification-list">
                                <div class="notification-item unread">
                                    <i class="fas fa-shopping-cart notification-icon"></i>
                                    <div class="notification-content">
                                        <p>Nouvelle commande #2024-001 de Jean Dupont</p>
                                        <small>Il y a 5 min</small>
                                    </div>
                                </div>
                                <div class="notification-item">
                                    <i class="fas fa-users notification-icon"></i>
                                    <div class="notification-content">
                                        <p>Nouveau client enregistré : Marie Martin</p>
                                        <small>Il y a 1h</small>
                                    </div>
                                </div>
                                <div class="notification-item">
                                    <i class="fas fa-tags notification-icon"></i>
                                    <div class="notification-content">
                                        <p>Produit bientôt épuisé : T-shirt grenat</p>
                                        <small>Hier</small>
                                    </div>
                                </div>
                            </div>
                            <div class="notification-footer">
                                <a href="#">Voir toutes les notifications</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>