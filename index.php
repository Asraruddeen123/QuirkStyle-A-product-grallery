<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QuirkStyle</title>
 <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<header>
  <h1>&nbsp; QuirkStyle!</h1>
  <nav>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#about-us-anchor">About Us</a></li>
      <li><a href="#mailinglist-anchor">Join Us</a></li>
      <li><a href="#contact-anchor">Contact Us</a></li>
      <li class="admin"><a href="login.php" button id="loginBtn" class="separate-button">Admin</a></li>
    </ul>
  </nav>
</header>

<section id="hero" class="hero">
  <img src="images/indexbg.jpg" alt="Background Image">
  <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <h1>
          <span class="left">Welcome to</span> <span class="right">QUIRKSTYLE!</span>
        </h1>
        <p>Welcome to QuirkStyle, where uniqueness meets style. Explore our curated collection of delightful products.</p>
        <a href="#category-anchor" class="btn-get-started">Get Started</a>
      </div>
    </div>
  </div>
</section><!-- /Hero Section -->

<section id="category-anchor" class="container">
  <h2>PRODUCT CATEGORIES</h2>
  <div class="carousel-container">
    <div class="carousel">
      <div class="carousel-item">
        <a href="products.php?category=1">
          <img src="images/shoes.jpeg" alt="Shoes">
          <div class="overlay">Shoes</div>
        </a>
      </div>
      <div class="carousel-item">
        <a href="products.php?category=2">
          <img src="images/watches.jpeg" alt="Watches">
          <div class="overlay">Watches</div>
        </a>
      </div>
      <div class="carousel-item">
        <a href="products.php?category=3">
          <img src="images/mobile.jpeg" alt="Mobile">
          <div class="overlay">Mobile</div>
        </a>
      </div>
      <div class="carousel-item">
        <a href="products.php?category=4">
          <img src="images/cars.jpeg" alt="Cars">
          <div class="overlay">Cars</div>
        </a>
      </div>
      <div class="carousel-item">
        <a href="products.php?category=5">
          <img src="images/bikes.jpeg" alt="Bikes">
          <div class="overlay">Bikes</div>
        </a>
      </div>
      <div class="carousel-item">
        <a href="products.php?category=6">
          <img src="images/sunglass.jpeg" alt="Sunglass">
          <div class="overlay">Sunglass</div>
        </a>
      </div>
      <div class="carousel-item">
        <a href="products.php?category=7">
          <img src="images/laptop.jpeg" alt="Laptop">
          <div class="overlay">Laptop</div>
        </a>
      </div>
      <div class="carousel-item">
        <a href="products.php?category=8">
          <img src="images/cycle.jpeg" alt="Cycle">
          <div class="overlay">Cycle</div>
        </a>
      </div>
      <div class="carousel-item">
        <a href="products.php?category=9">
          <img src="images/cam.jpeg" alt="Camera">
          <div class="overlay">Camera</div>
        </a>
      </div>
    </div>
  </div>
</section><!-- /Categories Section -->

<!-- ----------aboutus -->

<section id="about-us-anchor" class="container">
  
  <iframe src="about-us.php" style="width: 100%; height: 4560px; border: none;"></iframe>
</section>
<!-- ----------- -->
<section id="mailinglist-anchor" class="container">
  
  <iframe src="mailinglist.php" style="width: 100%; height: 600px; border: none;"></iframe>
</section><!-- /Join Us Section -->

<section id="contact-anchor" class="container">

  <iframe src="contact.php" style="width: 100%; height: 600px; border: none;"></iframe>
</section><!-- /Contact Us Section -->

<footer class="footer">
<h1>Follow Us On</h1>
    <div class="social-media">
    <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-linkedin-in"></i></a>
    <a href="#"><i class="fab fa-youtube"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
    <div class="footer-content">
        &copy; 2024 QuirkStyle. All Rights Reserved.
    </div>
</footer>





<script>
  
  window.addEventListener('DOMContentLoaded', function() {
    const btnGetStarted = document.querySelector('.btn-get-started');
    
    if (btnGetStarted) {
      btnGetStarted.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default behavior of anchor tag
        const categorySection = document.getElementById('category-anchor');
        if (categorySection) {
          categorySection.scrollIntoView({ behavior: 'smooth' });
        }
      });
    }
  });
</script>
</body>
</html>

