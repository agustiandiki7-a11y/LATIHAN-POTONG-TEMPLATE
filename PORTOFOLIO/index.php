<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - iPortfolio Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- Devicons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
  <link href="https://cdn.jsdelivr.net/gh/devicons/devicon@2.16.0/devicon.min.css" rel="stylesheet">
  
  <!-- Diperbaiki: Tag style ganda dihapus -->
  <style>
    /* Hero Style */
    #hero::before {
      content: "";
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 1;
    }
  </style>

</head>

<body>
  <?php
  // Diperbaiki: Mematikan exception agar tidak fatal error jika kolom/tabel tidak ada
  mysqli_report(MYSQLI_REPORT_OFF); 
  include "../BACKEND-SB-ADMIN/connection.php";

  // Fetch data profile
  $query_profile = mysqli_query($koneksi, "SELECT * FROM profile LIMIT 1");
  $p = $query_profile ? mysqli_fetch_object($query_profile) : null;

  // Fetch data foto sidebar
  $query_sidebar = mysqli_query($koneksi, "SELECT * FROM sidebar_foto LIMIT 1");
  $sb = $query_sidebar ? mysqli_fetch_object($query_sidebar) : null;

  // Set default gambar jika belum ada atau kosong di DB
  $foto_profile = ($sb && !empty($sb->sidebar_foto)) ? $sb->sidebar_foto : 'gg.png';
  ?>

  <!-- Mobile Nav Toggle -->
  <i class="header-toggle bi bi-list d-xl-none"></i>

  <!-- Header -->
  <header id="header">
    <div class="d-flex flex-column">

      <!-- Profile Image (Menggunakan foto dinamis $foto_profile) -->
      <div class="profile-img">
        <!-- Diperbaiki: Penulisan tag PHP di dalam atribut src -->
        <img src="../BACKEND-SB-ADMIN/foto/<?php echo $foto_profile; ?>"
          class="img-fluid rounded-circle"
          alt="Profile">
      </div>

      <!-- Nama Profile -->
      <h1 class="sitename">
        <a href="index.php"><?php echo htmlspecialchars($p->nama ?? 'Diki Agustian'); ?></a>
      </h1>

      <!-- Social Links -->
      <div class="social-links text-center">
        <a href="<?php echo htmlspecialchars($p->linkedin ?? '#'); ?>" class="linkedin" target="_blank">
          <i class="bi bi-linkedin"></i>
        </a>
      </div>

      <!-- Navbar Menu -->
      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bi bi-house"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bi bi-person"></i> <span>About / Overview</span></a></li>
          <li><a href="#skills" class="nav-link scrollto"><i class="bi bi-wrench"></i> <span>Proficiency</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bi bi-file-earmark-text"></i> <span>Education</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bi bi-briefcase"></i> <span>Experience</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bi bi-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bi bi-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav>

    </div>
  </header><!-- end header -->

  <main class="main">

    <!-- Hero Section -->
    <!--  <section id="hero" class="hero section dark-background">

      <img src="" alt="" data-aos="fade-in" class="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2>Diki agustian</h2>
        <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer">Designer</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
      </div>

    </section> --> <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Overview</h2>
        <p style="text-align: justify;">
          <?php echo $p->about ?? ''; ?>
        </p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">

          <div class="col-lg-4" data-aos="fade-right">
            <!-- Diperbaiki: Penulisan src gambar about -->
            <img src="../BACKEND-SB-ADMIN/foto/<?php echo !empty($sb->sidebar_photo) ? $sb->sidebar_photo : '1785395805.jpeg'; ?>"
              class="img-fluid rounded-circle"
              alt="">
          </div>

          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">

            <div class="section-title">
              <h2>INFORMASI PRIBADI</h2>
            </div>

            <br>

            <div class="row">
              <div class="col-lg">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><?php echo $p->website ?? ''; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?php echo $p->phone ?? ''; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Address:</strong> <span><?php echo $p->address ?? ''; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo $p->email ?? ''; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Nationality:</strong> <span><?php echo $p->nationalty ?? ''; ?></span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <!-- Diperbaiki: Komentar HTML yang tadinya rusak -->
        <!--
        <div class="row gy-4">
          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Happy Clients</strong> <span>consequuntur quae</span></p>
            </div>
          </div>
        </div>
        -->
      </div>
    </section>

    <!-- Section Title -->
    <div class="container">

      <div class="section-title mb-4" style="color: gray;">
        <h2>Keterampilan IT</h2>
        <h6 style="color: gray;">PROGRAMMING LANGUAGE & FRAMEWORKS</h6>

        <div class="keterampilan-it-wrapper">
          <p class="description mb-4">
            <?php
            $tampil_mobile = mysqli_query($koneksi, "SELECT * FROM mobile");
            if ($tampil_mobile && mysqli_num_rows($tampil_mobile) > 0) :
                while ($m = mysqli_fetch_object($tampil_mobile)) :
            ?>
                  <i style="font-size:35px; cursor: pointer;" 
                     class="icon-with-tooltip <?php echo htmlspecialchars($m->icon); ?> colored m-3" 
                     data-bs-toggle="tooltip" 
                     data-bs-placement="top" 
                     title="<?php echo htmlspecialchars($m->nama); ?>">
                  </i>
            <?php 
                endwhile;
            else :
            ?>
                <span class="text-muted d-block small">Belum ada data bahasa / framework.</span>
            <?php endif; ?>
          </p>

          <!-- 2. FAMILIAR WITH -->
          <h6 style="color: gray;" class="fw-bold">FAMILIAR WITH</h6>
          <p class="description mb-4">
            <?php
            $tampil_familiar = mysqli_query($koneksi, "SELECT * FROM familiar");
            if ($tampil_familiar && mysqli_num_rows($tampil_familiar) > 0) :
                while ($f = mysqli_fetch_object($tampil_familiar)) :
            ?>
                  <i style="font-size:35px; cursor: pointer;" 
                     class="icon-with-tooltip <?php echo htmlspecialchars($f->icon); ?> colored m-3" 
                     data-bs-toggle="tooltip" 
                     data-bs-placement="top" 
                     title="<?php echo htmlspecialchars($f->nama); ?>">
                  </i>
            <?php 
                endwhile;
            else :
            ?>
                <span class="text-muted d-block small">Belum ada data familiar with.</span>
            <?php endif; ?>
          </p>

          <!-- 3. TOOLS & PLATFORMS -->
          <h6 style="color: gray;" class="fw-bold">TOOLS & PLATFORMS</h6>
          <p class="description mb-4">
            <?php
            $tampil_tols = mysqli_query($koneksi, "SELECT * FROM tols");
            if ($tampil_tols && mysqli_num_rows($tampil_tols) > 0) :
                while ($t = mysqli_fetch_object($tampil_tols)) :
            ?>
                  <i style="font-size:35px; cursor: pointer;" 
                     class="icon-with-tooltip <?php echo htmlspecialchars($t->icon); ?> colored m-3" 
                     data-bs-toggle="tooltip" 
                     data-bs-placement="top" 
                     title="<?php echo htmlspecialchars($t->nama); ?>">
                  </i>
            <?php 
                endwhile;
            else :
            ?>
                <span class="text-muted d-block small">Belum ada data tools.</span>
            <?php endif; ?>
          </p>
        </div>

        <div class="section-title mb-4" style="color: gray;">
          <!-- Section Title Atas (Jika kosong, bisa diisi atau dihapus) -->
        </div>

        <?php
        $tampil_familiar = mysqli_query($koneksi, "SELECT * FROM familiar");
        if ($tampil_familiar) :
          while ($f = mysqli_fetch_object($tampil_familiar)) :
        ?>
            <i style="font-size:35px"
              class="icon-with-tooltip <?php echo $f->icon; ?> colored m-3"
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="<?php echo htmlspecialchars($f->nama); ?>">
            </i>
        <?php
          endwhile;
        endif;
        ?>

        <!-- ======= Services / Tools Section ======= -->
        <?php
        $tampil_tols = mysqli_query($koneksi, "SELECT * FROM tols");
        if ($tampil_tols) :
          while ($t = mysqli_fetch_object($tampil_tols)) :
        ?>
            <i style="font-size:35px"
              class="icon-with-tooltip <?php echo $t->icon; ?> colored m-3"
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="<?php echo htmlspecialchars($t->nama); ?>">
            </i>
        <?php
          endwhile;
        endif;
        ?>

        
        <div class="language-section">
        <?php
        // Ambil data dari tabel language
        $tampil_language = mysqli_query($koneksi, "SELECT * FROM language ORDER BY id_language DESC");

        if ($tampil_language && mysqli_num_rows($tampil_language) > 0) :
            while ($l = mysqli_fetch_object($tampil_language)) :
                // Path lokasi penyimpanan foto bendera
                $path_bendera = "../BACKEND-SB-ADMIN/fotobende/" . $l->flag;
        ?>
            <div class="d-flex align-items-center mb-3">
                <!-- Nama Bahasa -->
                <h6 class="m-0 me-3 fw-bold" style="color: gray; min-width: 120px;">
                    <?php echo htmlspecialchars($l->bahasa); ?>
                </h6>

                <!-- Gambar Bendera -->
                <?php if (!empty($l->flag) && file_exists($path_bendera)) : ?>
                    <img src="<?php echo $path_bendera; ?>" 
                         alt="<?php echo htmlspecialchars($l->bahasa); ?>" 
                         width="35" 
                         height="24"
                         class="rounded border shadow-sm style-flag">
                <?php else : ?>
                    <!-- Icon fallback jika gambar tidak ditemukan -->
                    <i class="bi bi-translate text-muted fs-4"></i>
                <?php endif; ?>
            </div>
        <?php 
            endwhile;
        else :
        ?>
            <p class="text-muted">Belum ada data bahasa.</p>
        <?php 
        endif; 
        ?>
        </div>

        <div>
          <section id="skills" class="skills section-bg">

            <!-- Section Title -->
            <div class="container">

              <div class="section-title mb-4" style="color: grey;">

                <?php
                $tampil_mobile = mysqli_query($koneksi, "SELECT * FROM mobile");
                if ($tampil_mobile) :
                  while ($m = mysqli_fetch_object($tampil_mobile)) :
                ?>
                    <i style="font-size:35px"
                      class="icon-with-tooltip <?php echo $m->icon; ?> colored m-3"
                      data-bs-toggle="tooltip"
                      data-bs-placement="top"
                      title="<?php echo htmlspecialchars($m->nama); ?>">
                    </i>
                <?php
                  endwhile;
                endif;
                ?>


                <div class="row skills-content skills-animation">

                  <div class="col-lg-6">

                    <div class="progress">
                      <span class="skill"><span>HTML</span> <i class="val">100%</i></span>
                      <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div><!-- End Skills Item -->

                    <div class="progress">
                      <span class="skill"><span>CSS</span> <i class="val">90%</i></span>
                      <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div><!-- End Skills Item -->

                    <div class="progress">
                      <span class="skill"><span>JavaScript</span> <i class="val">75%</i></span>
                      <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div><!-- End Skills Item -->

                  </div>

                  <div class="col-lg-6">

                    <div class="progress">
                      <span class="skill"><span>PHP</span> <i class="val">80%</i></span>
                      <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div><!-- End Skills Item -->

                    <div class="progress">
                      <span class="skill"><span>WordPress/CMS</span> <i class="val">90%</i></span>
                      <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div><!-- End Skills Item -->

                    <div class="progress">
                      <span class="skill"><span>Photoshop</span> <i class="val">55%</i></span>
                      <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div><!-- End Skills Item -->

                  </div>

                </div>

              </div>

          </section><!-- /Skills Section -->

          <!-- Resume Section -->
          <section id="resume" class="resume section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Resume</h2>
              <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div><!-- End Section Title -->

            <div class="container">

              <div class="row">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="resume-title">Education</h3>

                  <?php
                  // Menggunakan @ untuk mencegah fatal error jika tabel education belum ada
                  $tampil_education = @mysqli_query($koneksi, "SELECT * FROM education ORDER BY id_education DESC");

                  if ($tampil_education && mysqli_num_rows($tampil_education) > 0) :
                    while ($e = mysqli_fetch_object($tampil_education)) :
                  ?>
                      <div class="resume-item">
                        <h4><?php echo htmlspecialchars($e->nama_jurusan); ?></h4>
                        <h5><?php echo htmlspecialchars($e->tahun_belajar); ?></h5>
                        <p><em><?php echo htmlspecialchars($e->temapat_belajar); ?></em></p>
                        <p><?php echo htmlspecialchars($e->deskripsi); ?></p>
                      </div>
                  <?php
                    endwhile;
                  endif;
                  ?>
                  
                  <div class="resume-item">
                    <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
                    <h5>2010 - 2014</h5>
                    <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                    <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>
                  </div><!-- End Resume Item -->

                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                  <h3 class="resume-title">Training</h3>
                  <?php
                  $tampil_training = @mysqli_query($koneksi, "SELECT * FROM training ORDER BY id_training DESC");

                  if ($tampil_training && mysqli_num_rows($tampil_training) > 0) :
                    while ($t = mysqli_fetch_object($tampil_training)) :
                  ?>
                      <div class="resume-item">
                        <h4><?php echo htmlspecialchars($t->nama_training); ?></h4>
                        <h5><?php echo htmlspecialchars($t->tahun_training); ?></h5>
                        <p><em><?php echo htmlspecialchars($t->tempat_training); ?></em></p>
                        <p><?php echo htmlspecialchars($t->deskripsi ?? ''); ?></p>
                      </div>
                    <?php
                    endwhile;
                  else :
                    ?>
                    <p class="text-muted">Belum ada data training.</p>
                    <?php
                  endif;
                    ?>

                    <div class="resume-item">
                      <h4>Graphic design specialist</h4>
                      <h5>2017 - 2018</h5>
                      <p><em>Stepping Stone Advertising, New York, NY</em></p>
                      <ul>
                        <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>
                        <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                        <li>Recommended and consulted with clients on the most appropriate graphic design</li>
                        <li>Created 4+ design presentations and proposals a month for clients and account managers</li>
                      </ul>
                    </div><!-- End Resume Item -->

                </div>

              </div>

            </div>

          </section><!-- /Resume Section -->

          <!-- Portfolio Section -->
          <section id="portfolio" class="portfolio section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Portfolio</h2>
              
              <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div><!-- End Section Title -->

            <div class="container">

              <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                  <li data-filter="*" class="filter-active">All</li>
                  <li data-filter=".filter-app">App</li>
                  <li data-filter=".filter-product">Product</li>
                  <li data-filter=".filter-branding">Branding</li>
                  <li data-filter=".filter-books">Books</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <div class="portfolio-content h-100">
                      <img src="assets/img/portfolio/app-1.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/app-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->

                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                    <div class="portfolio-content h-100">
                      <img src="assets/img/portfolio/product-1.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Product 1</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/product-1.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->

                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                    <div class="portfolio-content h-100">
                      <img src="assets/img/portfolio/branding-1.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Branding 1</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/branding-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->

                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                    <div class="portfolio-content h-100">
                      <img src="assets/img/portfolio/books-1.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Books 1</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/books-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->

                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <div class="portfolio-content h-100">
                      <img src="assets/img/portfolio/app-2.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>App 2</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/app-2.jpg" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->

                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                    <div class="portfolio-content h-100">
                      <img src="assets/img/portfolio/product-2.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Product 2</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/product-2.jpg" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->

                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                    <div class="portfolio-content h-100">
                      <img src="assets/img/portfolio/branding-2.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Branding 2</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/branding-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->

                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                    <div class="portfolio-content h-100">
                      <img src="assets/img/portfolio/books-2.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Books 2</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/books-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->

                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <div class="portfolio-content h-100">
                      <img src="assets/img/portfolio/app-3.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>App 3</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/app-3.jpg" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->

                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                    <div class="portfolio-content h-100">
                      <img src="assets/img/portfolio/product-3.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Product 3</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/product-3.jpg" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->

                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                    <div class="portfolio-content h-100">
                      <img src="assets/img/portfolio/branding-3.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Branding 3</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/branding-3.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->

                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                    <div class="portfolio-content h-100">
                      <img src="assets/img/portfolio/books-3.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Books 3</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/books-3.jpg" title="Branding 3" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->

                </div><!-- End Portfolio Container -->

              </div>

            </div>

          </section><!-- /Portfolio Section -->

          <!-- Services Section -->
          <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Services</h2>
              <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div><!-- End Section Title -->

            <div class="container">

              <div class="row gy-4">

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                  <div>
                    <h4 class="title"><a href="service-details.html" class="stretched-link">Lorem Ipsum</a></h4>
                    <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                  </div>
                </div>
                <!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                  <div>
                    <h4 class="title"><a href="service-details.html" class="stretched-link">Dolor Sitema</a></h4>
                    <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
                  </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
                  <div>
                    <h4 class="title"><a href="service-details.html" class="stretched-link">Sed ut perspiciatis</a></h4>
                    <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                  </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
                  <div class="icon flex-shrink-0"><i class="bi bi-binoculars"></i></div>
                  <div>
                    <h4 class="title"><a href="service-details.html" class="stretched-link">Magni Dolores</a></h4>
                    <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                  </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
                  <div class="icon flex-shrink-0"><i class="bi bi-brightness-high"></i></div>
                  <div>
                    <h4 class="title"><a href="service-details.html" class="stretched-link">Nemo Enim</a></h4>
                    <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
                  </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="600">
                  <div class="icon flex-shrink-0"><i class="bi bi-calendar4-week"></i></div>
                  <div>
                    <h4 class="title"><a href="service-details.html" class="stretched-link">Eiusmod Tempor</a></h4>
                    <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
                  </div>
                </div><!-- End Service Item -->

              </div>

            </div>

          </section><!-- /Services Section -->

          <!-- Testimonials Section -->
          <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Testimonials</h2>
              <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                  {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                      "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                      "el": ".swiper-pagination",
                      "type": "bullets",
                      "clickable": true
                    },
                    "breakpoints": {
                      "320": {
                        "slidesPerView": 1,
                        "spaceBetween": 40
                      },
                      "1200": {
                        "slidesPerView": 3,
                        "spaceBetween": 1
                      }
                    }
                  }
                </script>
                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                      <h3>Saul Goodman</h3>
                      <h4>Ceo &amp; Founder</h4>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                      <h3>Sara Wilsson</h3>
                      <h4>Designer</h4>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                      <h3>Jena Karlis</h3>
                      <h4>Store Owner</h4>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                      <h3>Matt Brandon</h3>
                      <h4>Freelancer</h4>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                      <h3>John Larson</h3>
                      <h4>Entrepreneur</h4>
                    </div>
                  </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
              </div>

            </div>

          </section><!-- /Testimonials Section -->

          <!-- Contact Section -->
          <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Contact</h2>
              <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="row gy-4">

                <div class="col-lg-5">

                  <div class="info-wrap">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                      <i class="bi bi-geo-alt flex-shrink-0"></i>
                      <div>
                        <h3>Address</h3>
                        <p>A108 Adam Street, New York, NY 535022</p>
                      </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                      <i class="bi bi-telephone flex-shrink-0"></i>
                      <div>
                        <h3>Call Us</h3>
                        <p>+1 5589 55488 55</p>
                      </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                      <i class="bi bi-envelope flex-shrink-0"></i>
                      <div>
                        <h3>Email Us</h3>
                        <p>info@example.com</p>
                      </div>
                    </div><!-- End Info Item -->

                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                </div>

                <div class="col-lg-7">
                  <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">

                      <div class="col-md-6">
                        <label for="name-field" class="pb-2">Your Name</label>
                        <input type="text" name="name" id="name-field" class="form-control" required="">
                      </div>

                      <div class="col-md-6">
                        <label for="email-field" class="pb-2">Your Email</label>
                        <input type="email" class="form-control" name="email" id="email-field" required="">
                      </div>

                      <div class="col-md-12">
                        <label for="subject-field" class="pb-2">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject-field" required="">
                      </div>

                      <div class="col-md-12">
                        <label for="message-field" class="pb-2">Message</label>
                        <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                      </div>

                      <div class="col-md-12 text-center">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>

                        <button type="submit">Send Message</button>
                      </div>

                    </div>
                  </form>
                </div><!-- End Contact Form -->

              </div>

            </div>

          </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">iPortfolio</strong> <span>All Rights Reserved</span></p>
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> | <a href="https://bootstrapmade.com/tools/">DevTools</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Script Tooltip Bootstrap yang dirapikan menjadi satu di bagian bawah -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
      });
    });
  </script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>