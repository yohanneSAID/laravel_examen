<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optimal Trajet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">





</head>

<body>
    @include('partials.header')

    <div class="main-content">
        @yield('content')
    </div>

    @include('partials.footer')
    @yield('scripts')
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        toggleBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
        });
    });
</script>



<script>
    // Toggle sidebar on desktop
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('sidebar-collapsed');
    });

    // Toggle sidebar on mobile
    document.getElementById('mobileMenuBtn').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('sidebar-active');
    });

    // Open modal with animation
    function openModal(orderId) {
        const modal = document.getElementById('modal');
        modal.classList.add('active');
        document.getElementById('modalOrderId').textContent = orderId;

        // Sample data - in a real app, this would come from an API
        let products = [];
        let status = '';
        let total = '';

        if (orderId.includes('ORD')) {
            if (orderId === 'ORD-2023-001') {
                products = [{
                        name: 'T-shirt Nini',
                        quantity: 1,
                        price: '$25.00'
                    },
                    {
                        name: 'Casquette Nini',
                        quantity: 1,
                        price: '$15.00'
                    },
                    {
                        name: 'Sac Nini',
                        quantity: 1,
                        price: '$80.00'
                    }
                ];
                status = 'Livré';
                total = '$120.00';
            } else if (orderId === 'ORD-2023-002') {
                products = [{
                        name: 'Mug Nini',
                        quantity: 2,
                        price: '$12.50'
                    },
                    {
                        name: 'Stickers Nini',
                        quantity: 1,
                        price: '$5.00'
                    },
                    {
                        name: 'Poster Nini',
                        quantity: 1,
                        price: '$55.00'
                    }
                ];
                status = 'En cours';
                total = '$85.50';
            } else {
                products = [{
                        name: 'Veste Nini',
                        quantity: 1,
                        price: '$120.00'
                    },
                    {
                        name: 'T-shirt Nini',
                        quantity: 3,
                        price: '$25.00'
                    }
                ];
                status = 'En attente';
                total = '$210.00';
            }
        }

        // Populate products list
        const productsList = document.getElementById('modalProducts');
        productsList.innerHTML = '';

        products.forEach(product => {
            const li = document.createElement('li');
            li.className = 'product-item';
            li.innerHTML = `
                    <span>${product.name} <span class="product-quantity">× ${product.quantity}</span></span>
                    <span class="product-price">${product.price}</span>
                `;
            productsList.appendChild(li);
        });

        // Set status and total
        document.getElementById('modalStatus').textContent = status;
        document.getElementById('modalTotal').textContent = total;
    }

    // Close modal
    function closeModal() {
        document.getElementById('modal').classList.remove('active');
    }

    // Edit buttons handler
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const orderId = this.getAttribute('data-order-id');
            openEditModal(orderId, 'edit');
        });
    });

    // Delete buttons handler
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const orderId = this.getAttribute('data-order-id');
            openDeleteModal(orderId);
        });
    });

    // Open edit modal
    function openEditModal(orderId, action = 'add') {
        const editModal = document.getElementById('editModal');
        editModal.classList.add('active');
        document.getElementById('modalAction').textContent = action === 'add' ? 'Ajouter' : 'Modifier';
        document.getElementById('confirmActionBtn').textContent = action === 'add' ? 'Ajouter' : 'Enregistrer';

        if (action === 'edit') {
            // In a real app, load data from API based on orderId
            console.log('Loading data for order:', orderId);
        }
    }

    function openAddModal() {
        openEditModal(null, 'add');
    }

    // Close edit modal
    function closeEditModal() {
        document.getElementById('editModal').classList.remove('active');
    }

    // Open delete modal
    function openDeleteModal(orderId) {
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.classList.add('active');
        // In real app, store orderId for deletion
        console.log('Preparing to delete order:', orderId);
    }

    // Close delete modal
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('active');
    }

    // Notification dropdown toggle
    const notificationBtn = document.getElementById('notificationBtn');
    const notificationDropdown = document.getElementById('notificationDropdown');

    notificationBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        notificationDropdown.style.display = notificationDropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function() {
        notificationDropdown.style.display = 'none';
    });

    // Mark notifications as read when clicked
    document.querySelectorAll('.notification-item').forEach(item => {
        item.addEventListener('click', function() {
            this.classList.remove('unread');
            // Update badge count
            const badge = document.querySelector('.notification-badge');
            if (badge) {
                const count = parseInt(badge.textContent);
                if (count > 0) {
                    badge.textContent = count - 1;
                    if (count === 1) {
                        badge.style.display = 'none';
                    }
                }
            }
        });
    });

    // Charts initialization
    document.addEventListener('DOMContentLoaded', function() {
        // Sales Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(salesCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                    label: 'Ventes',
                    data: [1200, 1900, 1500, 2000, 1800, 2200, 2400, 2100, 1900, 2300, 2500, 2800],
                    backgroundColor: 'rgba(128, 0, 32, 0.7)',
                    borderColor: 'rgba(128, 0, 32, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Categories Chart
        const categoriesCtx = document.getElementById('categoriesChart').getContext('2d');
        const categoriesChart = new Chart(categoriesCtx, {
            type: 'doughnut',
            data: {
                labels: ['Vêtements', 'Accessoires', 'Électronique', 'Maison', 'Autres'],
                datasets: [{
                    data: [35, 25, 20, 15, 5],
                    backgroundColor: [
                        'rgba(79, 70, 229, 0.7)',
                        'rgba(99, 102, 241, 0.7)',
                        'rgba(129, 140, 248, 0.7)',
                        'rgba(165, 180, 252, 0.7)',
                        'rgba(199, 210, 254, 0.7)'
                    ],
                    borderColor: [
                        'rgba(79, 70, 229, 1)',
                        'rgba(99, 102, 241, 1)',
                        'rgba(129, 140, 248, 1)',
                        'rgba(165, 180, 252, 1)',
                        'rgba(199, 210, 254, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            }
        });
    });

    // Navigation between pages
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active class from all items
            document.querySelectorAll('.nav-item').forEach(navItem => {
                navItem.classList.remove('active');
            });

            // Add active class to clicked item
            this.classList.add('active');

            const content = document.querySelector('.content');
            const text = this.querySelector('.nav-text').textContent;

            // Show different content based on clicked item
            if (text === 'Commandes') {
                content.innerHTML = `
                        <div class="orders-card">
                            <div class="orders-header">
                                <h2 class="orders-title">Toutes les commandes</h2>
                                <button onclick="openAddModal()" class="add-order-btn">
                                    <i class="fas fa-plus"></i> Ajouter une commande
                                </button>
                            </div>
                            <div class="orders-list">
                                <!-- The full orders table from dashboard would go here -->
                                <!-- For demo, we'll reuse the same table -->
                                ${document.querySelector('.orders-table').outerHTML}
                            </div>
                        </div>
                    `;
            } else if (text === 'Produits') {
                content.innerHTML = `
                        <div class="products-card">
                            <div class="products-header">
                                <h2 class="products-title">Tous les produits</h2>
                                <button class="add-product-btn">
                                    <i class="fas fa-plus"></i> Ajouter un produit
                                </button>
                            </div>
                            <div class="products-grid">
                                <div class="product-card">
                                    <img src="https://via.placeholder.com/300" alt="Product" class="product-image">
                                    <div class="product-info">
                                        <h3 class="product-name">T-shirt Nini</h3>
                                        <p class="product-price">25 Ar</p>
                                        <div class="product-actions">
                                            <a href="#" class="view-more-btn" onclick="showProductDetails('T-shirt Nini')">
                                                Voir plus <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- More product cards would go here -->
                            </div>
                        </div>

                        <!-- Product Details Modal -->
                        <div id="productModal" class="modal">
                            <div class="modal-overlay" onclick="closeProductModal()"></div>
                            <div class="modal-container animate-slide-in">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Détails du produit</h2>
                                        <button onclick="closeProductModal()" class="modal-close">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="product-details">
                                            <img src="https://via.placeholder.com/500" alt="Product" class="details-image">
                                            <div class="details-info">
                                                <h3 id="productModalName" class="details-name"></h3>
                                                <p id="productModalPrice" class="details-price"></p>
                                                <p id="productModalDesc" class="details-desc"></p>
                                                <div class="details-stock">
                                                    <span>En stock: </span>
                                                    <span id="productModalStock"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
            } else if (text === 'Clients') {
                content.innerHTML = `
                        <div class="customers-card">
                            <div class="customers-header">
                                <h2 class="customers-title">Tous les clients</h2>
                                <button class="add-customer-btn">
                                    <i class="fas fa-plus"></i> Ajouter un client
                                </button>
                            </div>
                            <div class="customers-list">
                                <div class="customer-item">
                                    <div class="customer-info">
                                        <h3 class="customer-name">Jean Martin</h3>
                                        <p class="customer-email">jean.martin@example.com</p>
                                        <p class="customer-phone">+33 6 12 34 56 78</p>
                                    </div>
                                    <div class="customer-actions">
                                        <a href="#" class="view-more-btn" onclick="showCustomerDetails('Jean Martin')">
                                            Voir plus <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- More customer items would go here -->
                            </div>
                        </div>

                        <!-- Customer Details Modal -->
                        <div id="customerModal" class="modal">
                            <div class="modal-overlay" onclick="closeCustomerModal()"></div>
                            <div class="modal-container animate-slide-in">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Détails du client</h2>
                                        <button onclick="closeCustomerModal()" class="modal-close">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="customer-details">
                                            <h3 id="customerModalName" class="details-name"></h3>
                                            <div class="details-section">
                                                <h4 class="section-title">Informations</h4>
                                                <p id="customerModalEmail"></p>
                                                <p id="customerModalPhone"></p>
                                                <p id="customerModalAddress"></p>
                                            </div>
                                            <div class="details-section">
                                                <h4 class="section-title">Historique des commandes</h4>
                                                <p id="customerModalOrders"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
            } else {
                // Show dashboard content
                content.innerHTML = document.querySelector('.content').innerHTML;
            }
        });
    });

    // Product details functions
    function showProductDetails(productName) {
        const modal = document.getElementById('productModal');
        modal.classList.add('active');

        // These values would normally come from an API/database
        document.getElementById('productModalName').textContent = productName;
        document.getElementById('productModalPrice').textContent = '$25.00';
        document.getElementById('productModalDesc').textContent = 'T-shirt de haute qualité avec le logo Nini. 100% coton.';
        document.getElementById('productModalStock').textContent = '45 en stock';
    }

    function closeProductModal() {
        document.getElementById('productModal').classList.remove('active');
    }

    // Customer details functions
    function showCustomerDetails(customerName) {
        const modal = document.getElementById('customerModal');
        modal.classList.add('active');

        // These values would normally come from an API/database
        document.getElementById('customerModalName').textContent = customerName;
        document.getElementById('customerModalEmail').textContent = 'Email: ' + customerName.toLowerCase().replace(' ', '.') + '@example.com';
        document.getElementById('customerModalPhone').textContent = 'Téléphone: +33 6 12 34 56 78';
        document.getElementById('customerModalAddress').textContent = 'Adresse: 12 Rue de la Paix, Paris, France';
        document.getElementById('customerModalOrders').textContent = '5 commandes au total';
    }

    function closeCustomerModal() {
        document.getElementById('customerModal').classList.remove('active');
    }
</script>