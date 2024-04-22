<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SIPSITA-PNP</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Hapus komen-nya jika pengen memakai logo  -->
                {{-- <<img src="assets/img/logo.png" alt=""> --}}
                <h1>SIPSITA</h1>
                <span>.</span>
            </a>
            <!-- Navbar Menu -->
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/#hero" class="active">Home</a></li>
                    <li><a href="/#about">About</a></li>
                    <li><a href="/#recent-posts">Berita</a></li`>
                    <li><a href="/#team">Team</a></li>
                    <li><a href="/#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <!-- End Navbar Menu -->
            <div class="btns-group">
                <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
                <a class="btn btn-outline-secondary btn-addon" href="{{ route('register') }}">Register</a>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <main id="main">
        <!-- Hero Section - Home Page -->
        <section id="hero" class="hero">
            <img src="images/login2.jpg" alt="" data-aos="fade-in">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <h2 data-aos="fade-up" data-aos-delay="100">Selamat datang di SIPSITA</h2>
                        <p data-aos="fade-up" data-aos-delay="200">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit.
                            Curabitur scelerisque nisi tincidunt rutrum tristique.
                            Praesent sed iaculis enim. Pellentesque mauris dui, consequat id vestibulum sit amet,
                            interdum a elit.
                            Mauris et dui vitae arcu imperdiet porttitor. Donec id turpis in lorem luctus egestas. Morbi
                            massa urna, facilisis ut tellus sed, hendrerit congue ipsum.
                            Nullam nisi metus, molestie sed nisl ac, sagittis maximus orci. Fusce viverra libero auctor
                            nisi tincidunt, sit amet laoreet dui semper.
                            Aenean lacinia feugiat ornare. Nunc luctus turpis vitae risus porta consectetur. In magna
                            felis, mollis vitae condimentum vel, facilisis ut nisi.
                        </p>
                    </div>
                    <div class="col-lg-5">
                    </div>
                </div>
            </div>
        </section>
        <!-- End Hero Section -->
        <!-- About Section - Home Page -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-xl-center gy-5">
                    <div class="col-xl-5 content">
                        <h3>Tentang Sistem Informasi Penjadwalan Tugas Akhir Jurusan Teknologi Informasi</h3>
                        <h2>Optimalkan Penjadwalan Tugas Akhir dengan Teknologi Informasi</h2>
                        <p>Sistem Informasi Penjadwalan Tugas Akhir Jurusan Teknologi Informasi (SIPSITA) adalah
                            platform yang dirancang khusus untuk membantu mahasiswa dan dosen dalam mengatur dan
                            memantau jadwal serta progres tugas akhir di Jurusan Teknologi Informasi.</p>
                        <p>Dengan menggunakan teknologi terkini, SIPSITA memungkinkan mahasiswa untuk melakukan
                            pendaftaran topik tugas akhir, mengajukan proposal, dan melacak progres pengerjaan tugas
                            akhir mereka secara efisien. Di sisi lain, dosen dapat dengan mudah meninjau proposal,
                            memberikan masukan, dan mengatur jadwal pertemuan serta presentasi.</p>
                        <a href="#" class="read-more"><span>Lebih Lanjut</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="col-xl-7">
                        <div class="row gy-4 icon-boxes">
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box">
                                    <i class="bi bi-book"></i>
                                    <h3>Manajemen Topik</h3>
                                    <p>Daftarkan topik tugas akhir Anda dan terapkan perubahan dengan mudah sesuai
                                        kebutuhan Anda.</p>
                                </div>
                            </div>
                            <!-- End Icon Box -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box">
                                    <i class="bi bi-calendar-check"></i>
                                    <h3>Jadwal Fleksibel</h3>
                                    <p>Rencanakan jadwal pertemuan dengan dosen pembimbing Anda secara fleksibel sesuai
                                        ketersediaan waktu.</p>
                                </div>
                            </div>
                            <!-- End Icon Box -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box">
                                    <i class="bi bi-chat-dots"></i>
                                    <h3>Komunikasi Efektif</h3>
                                    <p>Terhubung dengan dosen pembimbing Anda secara langsung melalui fitur komunikasi
                                        terintegrasi.</p>
                                </div>
                            </div>
                            <!-- End Icon Box -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon-box">
                                    <i class="bi bi-hourglass"></i>
                                    <h3>Pantau Progres</h3>
                                    <p>Lacak progres pengerjaan tugas akhir Anda dan tetap terinformasi tentang tenggat
                                        waktu yang harus dipenuhi.</p>
                                </div>
                            </div>
                            <!-- End Icon Box -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->
        <!-- Recent-posts Section - Home Page -->
        <section id="recent-posts" class="recent-posts">
            <!--  Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Artikel Terbaru</h2>
                <p>Berita terkini seputar penjadwalan tugas akhir dan perkembangan terbaru dalam dunia teknologi
                    informasi</p>
            </div>
            <!-- End Section Title -->
            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <article>
                            <div class="post-img">
                                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                            </div>
                            <p class="post-category">Tugas Akhir</p>
                            <h2 class="title">
                                <a href="blog-details.html">Teknik Penjadwalan Pengerjaan Tugas Akhir</a>
                            </h2>
                            <div class="d-flex align-items-center">
                                <img src="assets/img/blog/blog-author.jpg" alt=""
                                    class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author">John Doe</p>
                                    <p class="post-date">
                                        <time datetime="2024-03-22">22 Mar 2024</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- End post list item -->
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <article>
                            <div class="post-img">
                                <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
                            </div>
                            <p class="post-category">Informatika</p>
                            <h2 class="title">
                                <a href="blog-details.html">Penerapan Teknologi Informasi dalam Penelitian Sains</a>
                            </h2>
                            <div class="d-flex align-items-center">
                                <img src="assets/img/blog/blog-author-2.jpg" alt=""
                                    class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author">Jane Smith</p>
                                    <p class="post-date">
                                        <time datetime="2024-03-20">20 Mar 2024</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- End post list item -->
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <article>
                            <div class="post-img">
                                <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
                            </div>
                            <p class="post-category">Teknologi</p>
                            <h2 class="title">
                                <a href="blog-details.html">Perkembangan Terbaru dalam Teknologi Pemrograman Web</a>
                            </h2>
                            <div class="d-flex align-items-center">
                                <img src="assets/img/blog/blog-author-3.jpg" alt=""
                                    class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author">David Williams</p>
                                    <p class="post-date">
                                        <time datetime="2024-03-18">18 Mar 2024</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- End post list item -->
                </div>
                <!-- End recent posts list -->
            </div>
        </section>
        <!-- End Recent-posts Section -->
        <!-- Team Section - Home Page -->
        <section id="team" class="team">
            <!--  Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Team</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div>
            <!-- End Section Title -->
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="images/3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>Taufiqurrahman</h4>
                        </div>
                    </div>
                    <!-- End Team Member -->
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="200">
                        <div class="member-img">
                            <img src="images/3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>Cindy Stefani</h4>
                        </div>
                    </div>
                    <!-- End Team Member -->
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="300">
                        <div class="member-img">
                            <img src="images/3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>Zidan Prasetyo</h4>
                        </div>
                    </div>
                    <!-- End Team Member -->
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="400">
                        <div class="member-img">
                            <img src="images/3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>Athira Rahmadini</h4>
                        </div>
                    </div>
                    <!-- End Team Member -->
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="500">
                        <div class="member-img">
                            <img src="images/3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>M. Ar-Razi agazali</h4>
                        </div>
                    </div>
                    <!-- End Team Member -->
                </div>
            </div>
        </section>
        <!-- End Team Section -->
        <!-- Contact Section - Home Page -->
        <section id="contact" class="contact">
            <!--  Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Curabitur scelerisque nisi tincidunt rutrum tristique.
                </p>
            </div>
            <!-- End Section Title -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="200">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    <p>Politeknik Negeri Padang</p>
                                    <p>Padang, Sumatera Barat</p>
                                </div>
                            </div>
                            <!-- End Info Item -->
                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="300">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Call Us</h3>
                                    <p>083525765712</p>
                                    <p>081627165441</p>
                                </div>
                            </div>
                            <!-- End Info Item -->
                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="400">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>info@example.com</p>
                                    <p>contact@example.com</p>
                                </div>
                            </div>
                            <!-- End Info Item -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Your Email" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                    <button type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Contact Form -->
                </div>
            </div>
        </section>
        <!-- End Contact Section -->
    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>SIPSITA</span>
                    </a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Curabitur scelerisque nisi tincidunt rutrum tristique.
                    </p>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>Politeknik Negeri Padang</p>
                    <p>Padang</p>
                    <p>Sumatera Barat</p>
                    <p class="mt-4"><strong>Phone:</strong> <span>08095974234</span></p>
                    <p><strong>Email:</strong> <span>info@example.com</span></p>
                </div>
            </div>
        </div>
        <div class="container copyright text-center mt-4">
            <p>&copy; <span>Copyright</span> <strong class="px-1">SIPSITA</strong> <span>2024</span></p>
            <div class="credits">
                {{-- Designed by <a>BootstrapMade</a> --}}
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Scroll Top Button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Preloader -->
    <div id="preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>
