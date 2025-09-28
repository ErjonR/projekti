<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike - Just Do It</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    
    <header>
        <div class="container">
            <div class="logo">
                <h1>Nike</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="shop.php">Products</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>

                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="#">Hi, <?php echo $_SESSION['username']; ?></a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    
    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Just Do It</h1>
            <p>Empower your game with Nike's latest collection.</p>
            <a href="shop.php" class="btn">Shop Now</a>
        </div>
    </section>

    
    <section id="products" class="products">
        <div class="container">
            <h2>Produkte për Meshkuj</h2>
            <div class="product-cards">
                <div class="product-card">
                    <img src="https://i5.walmartimages.com/seo/Nike-Sportswear-Club-Pullover-Fleece-Men-s-Hoodie-X-Small_0d3dc674-86fc-4de2-9586-63d8a05e5225.2fb8ff4c2ee625b5a6c3db9c5df6f8fe.jpeg" alt="Product 1">
                    <h3>Duksa</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <a href="DuksaM.php" class="btn">Shop Now</a>
                </div>
                <div class="product-card">
                    <img src="https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/2d2b14e8-f95e-41e2-95a9-cca6f5ecb9a6/custom-mercurial-superfly-9-elite-shoes-by-you.png" alt="Product 2">
                    <h3>Këpucë Futbolli</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <a href="KpucaFM.php" class="btn">Shop Now</a>
                </div>
                <div class="product-card">
                    <img src="https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/849566c0-f04e-4742-96f1-8f6ca677f246/AIR+JORDAN+1+RETRO+HIGH+OG.png" alt="Product 3">
                    <h3>Këpucë</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <a href="KpucaM.php" class="btn">Shop Now</a>
                </div>
            </div>

            <h2>Produkte për Femra</h2>
            <div class="product-cards">
                <div class="product-card">
                    <img src="https://customlogousa.com/cdn/shop/products/light_blue_ladies_Nike_team_hoodie_328x493.png?v=1586979708" alt="Product 1">
                    <h3>Duksa</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <a href="DuksaF.php" class="btn">Shop Now</a>
                </div>
                <div class="product-card">
                    <img src="https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/2ff5f7f0-05f2-4c0a-9cbf-a466b834762b/PHANTOM+GX+II+ELITE+FG.png" alt="Product 2">
                    <h3>Këpucë për Sport</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <a href="KpucaFF.php" class="btn">Shop Now</a>
                </div>
                <div class="product-card">
                    <img src="https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/69c35f99-e396-4e98-b2a2-0d9515bdd1f1/WMNS+AIR+JORDAN+1+MM+HIGH.png" alt="Product 3">
                    <h3>Këpucë</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <a href="KpucaF.php" class="btn">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    
    <section id="about" class="about">
        <div class="container">
            <h2>About Nike</h2>
            <p>For over 50 years, Nike has been inspiring athletes around the world with innovative products designed to help them achieve greatness. From footwear to apparel, our mission is to provide the highest-quality products for all athletes.</p>
        </div>
    </section>

    
    <section id="contact" class="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Have questions? Get in touch with us, and we’ll help you with anything you need.</p>
            <a href="contact.php" class="btn">Email Us</a>
        </div>
    </section>

    
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>Company</h3>
                <ul>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Refund Policy</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Newsletter</h3>
                <p>Subscribe to our newsletter for the latest updates and offers.</p>
                <form action="contact.php">
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>

            <div class="footer-column">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><img src="facebook-icon.png" alt="Facebook"></a>
                    <a href="#"><img src="twitter-icon.png" alt="Twitter"></a>
                    <a href="https://www.instagram.com/end.mehmeti/" target="_blank"><img src="instagram-icon.png" alt="Instagram"></a>
                    <a href="#"><img src="linkedin-icon.png" alt="LinkedIn"></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; Erjon Jashari.</p>
        </div>
    </footer>

    <script src="index.js"></script>
</body>
</html>
