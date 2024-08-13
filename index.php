<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
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
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Contact
                            Us</a>
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
            <h2 class="mb-4 display-5 text-dark">Trending Books</h2>
            <div class="row g-4">
                <!-- Example Book Card -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <!--ETO PALITAN OR LAGYAN NYO NA LANG PARA MAKITA NYO YUNG OUTPUT-->
                        <img src="img/books/harrypotter.png" class="card-img-top img-fluid rounded" alt="Harry Potter">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center text-primary">Harry Potter</h5>
                            <p class="card-text text-center mt-auto fw-bold text-muted">$9.99</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="img/books/city on the edge.jpg" class="card-img-top img-fluid rounded"
                            alt="City on the Edge">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center text-primary">City on the Edge</h5>
                            <p class="card-text text-center mt-auto fw-bold text-muted">$9.99</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="img/books/dont look back.png" class="card-img-top img-fluid rounded"
                            alt="Don't Look Back">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center text-primary">Don't Look Back</h5>
                            <p class="card-text text-center mt-auto fw-bold text-muted">$9.99</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="img/books/the dress and the girl.jpg" class="card-img-top img-fluid rounded"
                            alt="The Dress and the Girl">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center text-primary">The Dress and the Girl</h5>
                            <p class="card-text text-center mt-auto fw-bold text-muted">$9.99</p>
                        </div>
                    </div>
                </div>

                <!-- Repeat for more books -->
            </div>
        </div>
    </section>

    <!-- Blog & Social Media Section / PWEDE NYO RIN TONG PALITAN-->
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


    <!-- Modal Structure -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="contactForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <div id="responseMessage" class="alert d-none mt-3"></div>
            </div>
        </div>
    </div>
</div>

    <!--<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 <?php if (isset($_GET['contact_success'])): ?>
                    <div class="alert alert-<?php echo $_GET['contact_success'] === 'true' ? 'success' : 'danger'; ?>"
                        role="alert">
                   <?php echo $_GET['contact_success'] === 'true' ? 'Thank you! Your message has been received.' : 'There was an error sending your message. Please try again.'; ?>
                    </div>
                    <?php endif; ?>
                    <form action="send_message.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->


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
    <script>
         document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        fetch('send_message.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            var responseMessage = document.getElementById('responseMessage');
            responseMessage.className = 'alert mt-3';
            
            if (data.status === 'success') {
                responseMessage.classList.add('alert-success');
                responseMessage.textContent = data.message;
                document.getElementById('contactForm').reset();
            } else {
                responseMessage.classList.add('alert-danger');
                responseMessage.textContent = data.message;
            }

            responseMessage.classList.remove('d-none');
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    </script>
    
</body>

</html>
