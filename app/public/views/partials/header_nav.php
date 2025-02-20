<nav class="site-header bg-light border-bottom py-2">
    <div class="container d-flex align-items-center justify-content-between">
        <!-- Logo Section -->
        <div class="header-logo">
            <a href="/" class="text-decoration-none text-dark fs-3 fw-bold">Kitchen Chronicles</a>
        </div>

        <!-- Navigation Links -->
        <nav>
            <ul class="nav-links d-flex list-unstyled mb-0">
                <li class="nav-item"><a href="/" class="nav-link px-3">Home</a></li>
                <li class="nav-item"><a href="/views/pages/recipes.php" class="nav-link px-3">Recipes</a></li>
                <li class="nav-item"><a href="/views/pages/about.php" class="nav-link px-3">About</a></li>
                <li class="nav-item"><a href="/views/pages/contact.php" class="nav-link px-3">Contact</a></li>
            </ul>
        </nav>

        <!-- User Authentication Links -->
        <div class="d-flex">
            <?php if (isset($_SESSION['user'])): ?>
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="/includes/logout.php" class="btn btn-danger btn-sm px-3 shadow-sm d-flex align-items-center">
                        <i class="fas fa-sign-out-alt me-1"></i> Log Out
                    </a>
                <?php endif; ?>
            <?php else: ?>
                <!-- If Not Logged In -->
                <a href="/login"
                    id="showLoginButton1"
                    class="btn btn-primary btn-sm px-3 shadow-sm d-flex align-items-center me-3">
                    <i class="fas fa-sign-in-alt me-1"></i> Log In
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<script src="../../assets/js/login.js"></script>