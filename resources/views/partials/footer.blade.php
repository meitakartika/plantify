<style>
.footer {
    background-color: #243436;
    color: #ffffff;
    padding: 60px 0 40px;
}

.footer-container {
    max-width: 1200px;
    margin: auto;
    padding: 0 24px;
    display: flex;
    justify-content: space-between;
    gap: 80px;
}

/* DECORATION */
.footer-deco {
    height: 135px;
    background-image: url('/images/leaf-bg.png');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}

/* LEFT */
.footer-left {
    max-width: 420px;
}

.footer-logo {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 32px;
}

.footer-logo img {
    width: 172px;
    height: 50px;
}

.footer-left h2 {
    font-size: 44px;
    font-weight: 600;
    line-height: 1.2;
    color: #4CBA9B;
    margin-bottom: 48px;
}

.footer-left p {
    font-size: 14px;
    color: #EBF5F3;
}

/* RIGHT */
.footer-right {
    display: flex;
    gap: 80px;
}

.footer-column h4 {
    font-size: 18px;
    font-weight: 600;
    color: #4CBA9B;
    margin-bottom: 20px;
}

.footer-column a {
    display: block;
    text-decoration: none;
    color: #ffffff;
    margin-bottom: 14px;
    font-size: 15px;
}

.footer-column a:hover {
    color: #4CBA9B;
}

/* SOCIAL */
.social-icons {
    display: flex;
    align-items: center;
    flex-direction: column;
    gap: 12px;
}

.social-icons a {
    width: 42px;
    height: 42px;
    background: #7EC676;
    color: #1D2F33;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 16px;
    transition: 0.2s ease;
}

.social-icons a:hover {
    background: #ffffff;
}
</style>

<body>
<!-- Decorative Section -->
<section class="footer-deco"></section>
<footer class="footer">
    <div class="footer-container">
        <!-- LEFT -->
        <div class="footer-left">
            <div class="footer-logo">
                <img src="/images/logo-plantify2.png" alt="Plantify">
            </div>

            <h2>We help you find<br>your dream plant</h2>

            <p class="copyright">
                2025 all Right Reserved Term of use
            </p>
        </div>

        <!-- RIGHT -->
        <div class="footer-right">
            <div class="footer-column">
                <h4>Information</h4>
                <a href="#">About</a>
                <a href="#">Product</a>
                <a href="#">Article</a>
            </div>

            <div class="footer-column">
                <h4>Contact</h4>
                <a href="#">WhatsApp</a>
                <a href="#">Email</a>
                <a href="#">Resources</a>
            </div>

            <div class="footer-column">
                <h4>Follow Us</h4>
                <div class="social-icons">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>