<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <style>
    /* General navbar styling */
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

    h2 {
        color: #333;
        font-weight: bold;
    }

    .fw-bold {
        font-weight: 600;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    .hover-effect {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .hover-effect:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .shadow-sm {
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .text-primary {
        color: #007bff !important;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    footer h5 {
        color: #f8f9fa;
        font-weight: bold;
    }

    footer ul li a {
        text-decoration: none;
        transition: color 0.3s ease;
    }

    footer ul li a:hover {
        color: #007bff;
    }

    footer form .form-control {
        border-radius: 0;
    }

    footer form .btn-primary {
        border-radius: 0;
        background-color: #007bff;
        border-color: #007bff;
    }

    footer form .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .social-icons a {
        font-size: 1.5rem;
        transition: color 0.3s ease;
    }

    .social-icons a:hover {
        color: #007bff;
    }

    .bg-dark {
        background-color: #343a40 !important;
    }

    .text-light {
        color: #f8f9fa !important;
    }
    </style>
</head>

<body>

    <?php
session_start();
?>

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
                        <a class="nav-link" href="#">Home</a>
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


    <!-- Carousel Section -->
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel"
        data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/library_img1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome to Our Library</h5>
                    <p>Explore a vast collection of books and resources.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/library_img2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Discover New Arrivals</h5>
                    <p>Check out the latest additions to our collection.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- Trending Books Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 text-center">Trending Books</h2>
            <div class="row g-4">
                <!-- Example Book Card -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img src="img/books/harrypotter.png" class="card-img-top img-fluid" alt="Harry Potter">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Harry Potter</h5>
                            <p class="card-text mt-auto fw-bold">$9.99</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img src="img/books/city on the edge.jpg" class="card-img-top img-fluid" alt="City on the Edge">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">City on the Edge</h5>
                            <p class="card-text mt-auto fw-bold">$9.99</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img src="img/books/dont look back.png" class="card-img-top img-fluid" alt="Don't Look Back">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Don't Look Back</h5>
                            <p class="card-text mt-auto fw-bold">$9.99</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img src="img/books/the dress and the girl.jpg" class="card-img-top img-fluid"
                            alt="The Dress and the Girl">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">The Dress and the Girl</h5>
                            <p class="card-text mt-auto fw-bold">$9.99</p>
                        </div>
                    </div>
                </div>

                <!-- Repeat for more books -->
            </div>
        </div>
    </section>



    <!-- Blog & Social Media Section -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="p-4 bg-white text-center shadow-sm rounded hover-effect">
                        <i class="fas fa-book-open fa-3x mb-3 text-primary"></i>
                        <h3>Read the Blog</h3>
                        <p>Stay updated with the latest library news, events, and book recommendations.</p>
                        <a href="#" class="btn btn-primary mt-3">Explore Blog</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4 bg-white text-center shadow-sm rounded hover-effect">
                        <i class="fas fa-hashtag fa-3x mb-3 text-primary"></i>
                        <h3>Follow Us on Social Media</h3>
                        <p>Connect with us on social media and join the conversation! #LibraryOnSocial</p>
                        <a href="#" class="btn btn-primary mt-3">Follow Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-dark text-light py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Account & Policies Section -->
                <div class="col-md-4">
                    <h5 class="mb-4">Account & Policies</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light d-block mb-2">Your Account</a></li>
                        <li><a href="#" class="text-light d-block mb-2">Borrowing Policies</a></li>
                        <li><a href="#" class="text-light d-block mb-2">Privacy Policy</a></li>
                        <li><a href="#" class="text-light d-block mb-2">Terms of Service</a></li>
                    </ul>
                </div>

                <!-- About Us Section -->
                <div class="col-md-4">
                    <h5 class="mb-4">About Us</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light d-block mb-2">Our Story</a></li>
                        <li><a href="#" class="text-light d-block mb-2">Contact Us</a></li>
                        <li><a href="#" class="text-light d-block mb-2">Careers</a></li>
                        <li><a href="#" class="text-light d-block mb-2">Press</a></li>
                    </ul>
                </div>

                <!-- Stay Informed Section -->
                <div class="col-md-4">
                    <h5 class="mb-4">Stay Informed</h5>
                    <p>Subscribe to our newsletter for updates and the latest book releases.</p>
                    <form class="d-flex">
                        <input type="email" class="form-control me-2" placeholder="Enter your email">
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col text-center">
                    <p class="mb-0">&copy; 2024 Your Library Name. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>