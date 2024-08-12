<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Menu</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .navbar {
        background-color: #ffffff;
        padding: 0.5rem 1rem;
    }

    .navbar-logo {
        height: 40px;
        width: auto;
    }

    .navbar-nav {
        margin-left: auto;
        margin-right: auto;
    }

    .nav-link {
        color: #333;
        font-size: 16px;
        font-weight: 500;
        transition: color 0.3s ease, background-color 0.3s ease;
    }

    .nav-link:hover,
    .nav-link:focus {
        color: #007bff;
        background-color: #f8f9fa;
        border-radius: 0.25rem;
    }

    .navbar-toggler {
        border: none;
    }

    .navbar-toggler-icon {
        background-image: url('data:image/svg+xml;base64,...');
        /* Use your own icon if needed */
    }

    /* Additional styling for responsiveness and shadow */
    .navbar-light .navbar-nav .nav-link {
        padding: 0.5rem 1rem;
    }

    .navbar-light .navbar-nav .nav-item {
        margin: 0;
    }

    .shadow-sm {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }

    /* Books Styling */
    .card {
        height: 100%;
    }

    .card-img-top {
        height: 300px;
        /* Adjust to your preference */
        width: 100%;
        object-fit: cover;
    }

    .card-body {
        display: flex;
        flex-direction: column;
    }

    .card-title {
        flex-grow: 1;
        /* Ensures the title takes up space */
    }

    .card-text {
        margin-top: auto;
        /* Pushes the price to the bottom */
    }

    .card {
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        object-fit: cover;
        height: 250px;
    }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header class="bg-light py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="img/logo.png" alt="Library Logo" class="logo" width="200">
            <form class="d-flex w-50">
                <input class="form-control me-2" type="search" placeholder="Search for books" aria-label="Search">
            </form>
            <div>
                <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
                <span class="me-3">Welcome, <?php echo htmlspecialchars($_SESSION['user_first_name']); ?>!</span>
                <a href="logout.php" class="me-3">Log Out</a>
                <?php else: ?>
                <a href="login.php" class="me-3">Sign In</a>
                <?php endif; ?>
                <a href="#"><i class="bi bi-cart"></i> My Borrowed Books</a>
            </div>
        </div>
    </header>


    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <!--<a class="navbar-brand" href="#"><img src="library-logo.png" alt="Library Logo" class="navbar-logo"></a>-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="books.php">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Books Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4">Books Menu</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img src="img/books/harrypotter.png" class="card-img-top" alt="Harry Potter">
                        <div class="card-body">
                            <h5 class="card-title">Harry Potter</h5>
                            <p class="card-text">$9.99</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="img/books/city on the edge.jpg" class="card-img-top" alt="City on the Edge">
                        <div class="card-body">
                            <h5 class="card-title">City on the Edge</h5>
                            <p class="card-text">$9.99</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="img/books/dont look back.png" class="card-img-top" alt="Don't Look Back">
                        <div class="card-body">
                            <h5 class="card-title">Don't Look Back</h5>
                            <p class="card-text">$9.99</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="img/books/the dress and the girl.jpg" class="card-img-top"
                            alt="The Dress and the Girl">
                        <div class="card-body">
                            <h5 class="card-title">The Dress and the Girl</h5>
                            <p class="card-text">$9.99</p>
                        </div>
                    </div>
                </div>
                <!-- Add more cards as needed -->
            </div>
        </div>
    </section>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>