<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="public/assets/css/style.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" />

    <title>Home & Hobbies</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light gradient-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home & Hobbies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <?php if (!session()->has('userId')): ?>
                    <!-- Visible only when logged out -->
                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() == '') ? 'active' : ''; ?>" aria-current="page" href="/">Home</a>
                    </li>
                <?php else: ?>
                    <!-- Visible only when logged in -->
                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() == 'supplier_registration') ? 'active' : ''; ?>" href="supplier_registration">Supplier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() == 'vendor_dashboard') ? 'active' : ''; ?>" href="vendor_dashboard">Dashboard</a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- Right-aligned Login/Logout Menu -->
            <ul class="navbar-nav ms-auto">
                <?php if (session()->has('userId')): ?>
                    <li class="nav-item">
                        <form action="<?= site_url('logout'); ?>" method="POST" style="display:inline;">
                            <?= csrf_field(); ?>
                            <button type="submit" class="btn nav-link" style="border: none; background: none; padding: 0; cursor: pointer;">Logout</button>
                        </form>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('login'); ?>">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>


    <?= $this->renderSection("content"); ?>

    <footer class="bg-primary py-2 gradient-custom footer-section">
        <div>
            <p class="text-center">&copy; 2024 All copy rights reserved</p>
        </div>
    </footer>

    <!-- Optional Javascript -->
    <!-- jQuery first then Bootstrap.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Include jQuery from a CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom JavaScript files -->
    <script src="public/assets/js/main.js"></script>

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
    const carouselElement = document.querySelector('#myCarousel');
    const nextButton = document.getElementById('nextButton');
    const prevButton = document.getElementById('prevButton');

    // Function to update button states
    function updateButtonStates() {
        const totalItems = carouselElement.querySelectorAll('.carousel-item').length;
        const currentIndex = Array.from(carouselElement.querySelectorAll('.carousel-item')).findIndex(item => item
            .classList.contains('active'));

        prevButton.disabled = currentIndex === 0; // Disable previous button if at first item
        nextButton.disabled = currentIndex === totalItems - 1; // Disable next button if at last item
    }

    // Initial state check
    updateButtonStates();

    // Listen for slide events to update button states
    carouselElement.addEventListener('slid.bs.carousel', updateButtonStates);
    </script>


</body>

</html>