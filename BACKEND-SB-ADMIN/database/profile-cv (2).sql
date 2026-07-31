-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2026 pada 04.19
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profile-cv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `education`
--

CREATE TABLE `education` (
  `id_education` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `tahun_belajar` varchar(45) NOT NULL,
  `temapat_belajar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `education`
--

INSERT INTO `education` (`id_education`, `nama_jurusan`, `tahun_belajar`, `temapat_belajar`, `deskripsi`) VALUES
(1, 'teknik_otomotif', '2023', 'universitas lintang selatan', 'PENDIDIKAN AGAMA ISLAM'),
(2, 'pplg', '2002', 'SMKN NEGERI£ BANJAR', 'banyakkk belajar'),
(6, 'akl', '2023', 'SMKN NEGERI 3 BANJAR', 'Belajar keuangan'),
(7, 'pplg', '2024', 'SMKN NEGERI 3 BANJAR', 'bikin ppt'),
(9, 'pplg', '2024-2026', 'SMKN NEGERI 3 BANJAR', 'html,canva');

-- --------------------------------------------------------

--
-- Struktur dari tabel `familiar`
--

CREATE TABLE `familiar` (
  `id_familiar` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `icon` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `familiar`
--

INSERT INTO `familiar` (`id_familiar`, `nama`, `icon`) VALUES
(1, 'php', 'devicon-php-plain'),
(2, 'laravel', 'devicon-laravel-plain'),
(4, 'html', 'fab fa-html5'),
(5, 'css', 'fab fa-css3-alt'),
(6, 'boostrap', 'fab fa-bootstrap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `job`
--

CREATE TABLE `job` (
  `id_job` int(11) NOT NULL,
  `nama_pekerjaan` varchar(200) NOT NULL,
  `tahun_pekerjaan` varchar(200) NOT NULL,
  `tempat_pekerjaan` varchar(100) NOT NULL,
  `deskripsi` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `job`
--

INSERT INTO `job` (`id_job`, `nama_pekerjaan`, `tahun_pekerjaan`, `tempat_pekerjaan`, `deskripsi`) VALUES
(9, 'ojek', '2027', 'yogyakarta', 0x616e616b206d6173),
(13, 'guru', '2027', 'yogyakarta', 0x6d656d62696e616d7572696420736570656e75682068617469),
(14, 'guru', '20002', 'banjar', 0x6167616d61);

-- --------------------------------------------------------

--
-- Struktur dari tabel `language`
--

CREATE TABLE `language` (
  `id_language` int(11) NOT NULL,
  `bahasa` varchar(200) NOT NULL,
  `flag` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `language`
--

INSERT INTO `language` (`id_language`, `bahasa`, `flag`) VALUES
(1, 'indonesia', '1785378320.jpg'),
(3, '', '1785461725.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `email`, `password`) VALUES
(1, 'agustiandiki7@gmail.com', '1jamhhufhu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `loginn`
--

CREATE TABLE `loginn` (
  `id_login` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `loginn`
--

INSERT INTO `loginn` (`id_login`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobile`
--

CREATE TABLE `mobile` (
  `id_mobile` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mobile`
--

INSERT INTO `mobile` (`id_mobile`, `nama`, `icon`) VALUES
(3, 'Instagram', 'fab fa-instagram'),
(5, 'whatsapp', 'fab fa-whatsapp'),
(8, 'android', 'fab fa-android'),
(9, 'androind', 'devicon-android-plain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio`
--

CREATE TABLE `portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `judul_portfolio` varchar(256) NOT NULL,
  `img` varchar(200) NOT NULL,
  `link` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `portfolio`
--

INSERT INTO `portfolio` (`id_portfolio`, `judul_portfolio`, `img`, `link`, `deskripsi`, `jenis`) VALUES
(1, 'mancing ke pangandaran', '1785395881_1784865281.jpeg', 'https://github.com', 'main main aja', 'google');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `about` text NOT NULL,
  `website` varchar(100) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `linkedin` varchar(250) NOT NULL,
  `nationalty` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `nama`, `about`, `website`, `phone`, `email`, `address`, `linkedin`, `nationalty`) VALUES
(1, 'Diki agustian', 'Saya adalah siswa SMK jurusan Rekayasa Perangkat Lunak yang memiliki minat pada bidang Web Development. Saya terbiasa membangun website menggunakan HTML, CSS, Bootstrap, PHP, JavaScript, dan MySQL. Saya senang mempelajari teknologi baru serta terus mengembangkan kemampuan dalam membuat aplikasi web yang responsif, modern, dan mudah digunakan.', 'https://romantic-apology-letter-747094009745.asia-southeast1.run.app/', '081779940494', 'agustiandiki7@gmail.com', 'Yogyakarta, Indonesia', 'https://romantic-apology-letter-747094009745.asia-southeast1.run.app/', 'indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reference`
--

CREATE TABLE `reference` (
  `id_reperence` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `perusahaan` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reference`
--

INSERT INTO `reference` (`id_reperence`, `nama`, `jabatan`, `perusahaan`, `phone`, `email`) VALUES
(2, 'salomon', 'boss', 'mt media', '08887654', 'IYREWYIUFGEWI7F@GAMAIL.COM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekill`
--

CREATE TABLE `sekill` (
  `id_skill` int(11) NOT NULL,
  `nama_skill` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sekill`
--

INSERT INTO `sekill` (`id_skill`, `nama_skill`) VALUES
(1, 'masakk'),
(3, 'futsal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidebar_foto`
--

CREATE TABLE `sidebar_foto` (
  `id_sedebar_foto` int(11) NOT NULL,
  `sidebar_foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sidebar_foto`
--

INSERT INTO `sidebar_foto` (`id_sedebar_foto`, `sidebar_foto`) VALUES
(2, '1784855706.png'),
(3, '1785133814.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tols`
--

CREATE TABLE `tols` (
  `id_tols` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tols`
--

INSERT INTO `tols` (`id_tols`, `nama`, `icon`) VALUES
(1, 'vscode', 'devicon-vscode-plain'),
(3, 'html', 'devicon-html5-plain'),
(4, 'bosostrap', 'devicon-bootstrap-plain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `training`
--

CREATE TABLE `training` (
  `id_training` int(11) NOT NULL,
  `nama_training` varchar(200) NOT NULL,
  `tahun_training` varchar(200) NOT NULL,
  `tempat_training` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `training`
--

INSERT INTO `training` (`id_training`, `nama_training`, `tahun_training`, `tempat_training`, `deskripsi`) VALUES
(3, 'lddk', '2024', 'Smkn 3 banjar', 'pelatihan tni ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id_education`);

--
-- Indeks untuk tabel `familiar`
--
ALTER TABLE `familiar`
  ADD PRIMARY KEY (`id_familiar`);

--
-- Indeks untuk tabel `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indeks untuk tabel `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id_language`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `loginn`
--
ALTER TABLE `loginn`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `mobile`
--
ALTER TABLE `mobile`
  ADD PRIMARY KEY (`id_mobile`);

--
-- Indeks untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_portfolio`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indeks untuk tabel `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id_reperence`);

--
-- Indeks untuk tabel `sekill`
--
ALTER TABLE `sekill`
  ADD PRIMARY KEY (`id_skill`);

--
-- Indeks untuk tabel `sidebar_foto`
--
ALTER TABLE `sidebar_foto`
  ADD PRIMARY KEY (`id_sedebar_foto`);

--
-- Indeks untuk tabel `tols`
--
ALTER TABLE `tols`
  ADD PRIMARY KEY (`id_tols`);

--
-- Indeks untuk tabel `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id_training`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `education`
--
ALTER TABLE `education`
  MODIFY `id_education` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `familiar`
--
ALTER TABLE `familiar`
  MODIFY `id_familiar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `job`
--
ALTER TABLE `job`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `language`
--
ALTER TABLE `language`
  MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `loginn`
--
ALTER TABLE `loginn`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mobile`
--
ALTER TABLE `mobile`
  MODIFY `id_mobile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `reference`
--
ALTER TABLE `reference`
  MODIFY `id_reperence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sekill`
--
ALTER TABLE `sekill`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sidebar_foto`
--
ALTER TABLE `sidebar_foto`
  MODIFY `id_sedebar_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tols`
--
ALTER TABLE `tols`
  MODIFY `id_tols` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `training`
--
ALTER TABLE `training`
  MODIFY `id_training` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
