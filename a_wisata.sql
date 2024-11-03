-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2023 pada 15.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_ID` char(4) NOT NULL,
  `admin_NAMA` varchar(30) NOT NULL,
  `admin_EMAIL` varchar(60) NOT NULL,
  `admin_PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_NAMA`, `admin_EMAIL`, `admin_PASSWORD`) VALUES
('A001', 'Dimas', 'dimas@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `area`
--

CREATE TABLE `area` (
  `area_ID` char(4) NOT NULL,
  `area_nama` char(35) NOT NULL,
  `area_wilayah` char(35) NOT NULL,
  `area_keterangan` varchar(255) NOT NULL,
  `kabupaten_KODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `area`
--

INSERT INTO `area` (`area_ID`, `area_nama`, `area_wilayah`, `area_keterangan`, `kabupaten_KODE`) VALUES
('A01', 'WIsata Telaga Hijau dan BIru', 'Jl. Siliwangi delapan Belas', 'Banyak wisata air terjun atau curug disini, terdapat banyak hutan pinus juga', 'KB01'),
('A02', 'katup niagara', 'Jl. Pasopati', 'Wisata yang indah dan Bersih nan sejuk', 'KB02'),
('AR01', 'Bandungan', 'Kabupaten Semarang', 'Merupakan wilayah yang memiliki banyak tujuan detinasi wisata', '10'),
('AR02', 'Kawasan Candi', 'Sleman', 'Merupakan daerah dengan peninggalan sejarah kerajaan', '10'),
('AR04', 'Pantai Selatan Jawa', 'Gunungkidul', 'Pantai yang sangat luas dan panjang', '11'),
('AR05', 'Patuk', 'Gunungkidul', 'Daerah perbukitan yang berada di luar kota kebupaten bantul', '11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `berita_ID` char(4) NOT NULL,
  `berita_judul` varchar(60) NOT NULL,
  `berita_inti` varchar(1000) NOT NULL,
  `penulis` char(50) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `destinasi_ID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`berita_ID`, `berita_judul`, `berita_inti`, `penulis`, `penerbit`, `tanggal_terbit`, `destinasi_ID`) VALUES
('BR01', 'Inter Milan tenang di musim panas ', 'Inter Milan kemungkinan besar akan tenang di musim ini, karna memiliki pemain bintang yang merata ditiap lini', 'Okdwitya Septi', 'sport.detik.com', '2023-12-18', 'BR01'),
('BR02', 'Alasan RI Belum Perlu Perketat Syarat Perjalanan Meski Kasus', 'Peningkatan kasus COVID-19 di Indonesia kembali menjadi sorotan. Hal ini terjadi setelah sebelumnya Malaysia dan Singapura juga melaporkan peningkatan kasus yang cukup signifikan. Ketua Satgas COVID-19 Pengurus Besar Ikatan Dokter Indonesia (PB IDI) dr Erlina Burhan, SpP(K) menuturkan bahwa kejadian ini salah satunya dipicu oleh mobilitas masyarakat antar negara. Aturan perjalanan yang kini sudah longgar membuat risiko peningkatan kasus juga meningkat.  \"Jadi tantangan kita pada saat ini adalah terjadinya peningkatan kasus dalam dua bulan terakhir dan kita juga tahu mobilitas lintas negara ini juga sangat tinggi ya,\" ujar dr Erlina dalam konferensi pers virtual, Rabu (6/12/2023).  Pihak Kementerian Kesehatan RI (Kemenkes) mengungkapkan bahwa peningkatan kasus COVID-19 yang terjadi di Indonesia belakangan ini masih terkendali. Berdasarkan data terakhir 6 Desember rata-rata kasus harian COVID-19 sebanyak 35-40 kasus.  Jumlah tersebut masih tergolong rendah jika dibandingkan dengan masa p', 'Averus Kautsar', 'Detik Health', '2023-12-06', 'WS04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasi_ID` char(5) NOT NULL,
  `destinasi_nama` varchar(35) NOT NULL,
  `destinasi_alamat` varchar(255) NOT NULL,
  `kategori_ID` char(4) NOT NULL,
  `area_ID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`destinasi_ID`, `destinasi_nama`, `destinasi_alamat`, `kategori_ID`, `area_ID`) VALUES
('WS01', 'Pantai Kukup', 'Jl. Pantai Selatan Jawa ', 'KW03', 'AR04'),
('WS02', 'Pantai Indrayanti', 'Jl. Pantai Selatan Jawa ', 'KW03', 'AR04'),
('WS04', 'Pantai Krakal Selatan ', 'Jl. Pantai Selatan Jawa ', 'KW03', 'AR02'),
('WS05', 'Candi Prambanan', 'Jl. Raya Yogya - Solo', 'KW02', 'AR02'),
('WS06', 'Candi Plaosan', 'Jl. Desa Plaosan', 'KW02', 'AR02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimas`
--

CREATE TABLE `dimas` (
  `dimasID` char(5) NOT NULL,
  `dimasNEGARA` varchar(35) NOT NULL,
  `destinasi_ID` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dimas`
--

INSERT INTO `dimas` (`dimasID`, `dimasNEGARA`, `destinasi_ID`) VALUES
('D01', 'Swiss', 'WS01'),
('D02', 'Argentina', 'WS06'),
('D03', 'Belgia', 'WS05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `foto_ID` char(5) NOT NULL,
  `foto_nama` char(60) NOT NULL,
  `destinasi_ID` char(4) NOT NULL,
  `foto_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`foto_ID`, `foto_nama`, `destinasi_ID`, `foto_file`) VALUES
('F001', 'Waduk Jati Luhur', 'WS04', 'Jati_Luhur.jpg'),
('F002', 'Pulau Komodo', 'WS01', 'komodo.jpg'),
('F003', 'Foto Wisata 3', 'WS03', 'gwk-bali.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `hotel_ID` char(4) NOT NULL,
  `hotel_nama` varchar(60) NOT NULL,
  `hotel_alamat` varchar(255) NOT NULL,
  `hotel_keterangan` varchar(300) NOT NULL,
  `hotel_foto` text NOT NULL,
  `area_ID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`hotel_ID`, `hotel_nama`, `hotel_alamat`, `hotel_keterangan`, `hotel_foto`, `area_ID`) VALUES
('HT01', 'ARTOTEL Suites Mangkuluhur Jakarta', 'Jl. Gatot Subroto Kav 2-3, 12930 Jakarta, Indonesia ', 'Menawarkan akomodasi yang elegan di Segitiga Emas Jakarta, ARTOTEL Suites Mangkuluhur Jakarta menawarkan akses mudah ke Plaza Senayan dan Bursa Efek Jakarta. Hotel ini memiliki fasilitas kebugaran dan parkir gratis.  Terletak di samping Plaza Semanggi, ARTOTEL Suites Mangkuluhur Jakarta berjarak 2 k', 'Artotel Hotel.jpg', 'AR04'),
('HT02', 'JW Marriott Hotel ', ' Jl. Dr. Ide Anak Agung Gde Agung Kav. E 1.2 No 1 and 2, 12950 Jakarta, Indonesia ', 'JW Marriott Hotel Jakarta terletak di kawasan bisnis Mega Kuningan yang terkenal di kota dan hanya berjalan kaki sebentar ke pusat perbelanjaan. Akomodasi ini memiliki kolam renang outdoor, 5 pilihan tempat bersantap, dan WiFi gratis di seluruh areanya.  Setiap kamar dilengkapi dengan perabot klasik', 'JW Marriott Hotel Jakarta.jpg', 'HT02'),
('HT03', 'ARTOTEL Suites Mangkuluhur Jakarta', 'Jl. Gatot Subroto Kav 2-3, 12930 Jakarta, Indonesia ', 'Menawarkan akomodasi yang elegan di Segitiga Emas Jakarta, ARTOTEL Suites Mangkuluhur Jakarta menawarkan akses mudah ke Plaza Senayan dan Bursa Efek Jakarta. Hotel ini memiliki fasilitas kebugaran dan parkir gratis.  Terletak di samping Plaza Semanggi, ARTOTEL Suites Mangkuluhur Jakarta berjarak 2 k', 'Artotel Hotel.jpg', 'HT03'),
('HT04', 'Wyndham Casablanca Jakarta', 'Jl. Raya Casablanca No.18, RT.4/RW.12, Menteng Dalam, Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12870', 'Di Wyndham Casablanca Jakarta, kami menawarkan akomodasi kontemporer dan fasilitas utama tepat di dekat kedutaan besar kota dan Kawasan Pusat Bisnis, yang dikenal sebagai Segitiga Emas. Dari pintu kami, Anda dapat berjalan kaki ke pusat perbelanjaan Kota Kasablanka dan 30 kilometer dari Bandara Inte', 'Wyndham Casablanca Jakarta.jpg', 'AR01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kabupaten_KODE` char(4) NOT NULL,
  `kabupaten_NAMA` char(60) NOT NULL,
  `kabupaten_ALAMAT` varchar(255) NOT NULL,
  `kabupaten_KET` text NOT NULL,
  `kabupaten_FOTOICON` varchar(255) NOT NULL,
  `kabupaten_FOTOICONKET` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`kabupaten_KODE`, `kabupaten_NAMA`, `kabupaten_ALAMAT`, `kabupaten_KET`, `kabupaten_FOTOICON`, `kabupaten_FOTOICONKET`) VALUES
('KB01', 'Jembatan Ampera', 'Palembang, Sumatera Selatan', 'Nama Jembatan Ampera memiliki makna \"Amanat Penderitaan Rakyat\", dan telah berdiri sejak 1965 dengan dana pembangunan yang diambil dari hasil rampasan Jepang kala itu. Sejak berdirinya itulah, jembatan yang membentang di atas Sungai Musi dan menghubungkan antara Seberang Ulu dan Seberang Ilir itu menjadi landmark kebanggan masyarakat Palembang. Kini, jembatan ikonik ini juga telah dihiasi dengan lampu-lampu yang membuat penampilannya semakin indah dan menambah daya tarik tersendiri bagi para pengunjung yang singgah ke ibukota Provinsi Sumatera Selatan. ', 'ampera2.jpg', ' jembatan yang membentang di atas Sungai Musi dan menghubungkan antara Seberang Ulu dan Seberang Ilir itu menjadi landmark kebanggan masyarakat Palembang. '),
('KB02', 'Desa Wae Rebo', 'Nusa Tenggara Timur / NTT', 'Wae Rebo atau Waerebo adalah sebuah desa adat terpencil dan misterius di Kabupaten Manggarai, Nusa Tenggara Timur. Wae Rebo merupakan salah satu destinasi wisata budaya di Kabupaten Manggarai.[1] Terletak di ketinggian 1.200 meter di atas permukaan laut. Di kampung ini hanya terdapat 7 rumah utama atau yang disebut sebagai Mbaru Niang. Wae Rebo dinyatakan UNESCO sebagai Warisan Budaya Dunia pada Agustus 2012 dengan menyisihkan 42 negara lainnya.[2] Wae sendiri dalam bahasa manggarai artinya ialah ', 'wae_rebo2.jpg', 'Wae Rebo, desa terakhir yang masih mempertahankan rumah tradisional berbentuk kerucut sekaligus melestarikan warisan adatnya. Dihuni oleh sekitar 1.200 orang, desa ini dikelilingi oleh pegunungan indah dan hutan-hutan lebat.'),
('KB03', 'Purwakarta', 'Purwakarta, Jawa Barat', 'Waduk Jatiluhur memiliki luas area lebih dari 8 ribu hektare, membuatnya jadi waduk paling besar di Tanah Air. ', 'Jati_Luhur.jpg', 'Waduk Jatiluhur memiliki luas area lebih dari 8 ribu hektare, membuatnya jadi waduk paling besar di Tanah Air. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_ID` char(4) NOT NULL,
  `kategori_nama` char(30) NOT NULL,
  `kategori_keterangan` varchar(255) NOT NULL,
  `kategori_referensi` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_ID`, `kategori_nama`, `kategori_keterangan`, `kategori_referensi`) VALUES
('KW01', 'Alam', 'Wisata Dengan Pemandangan Pantai dan Gunung', 'Buku Wisata'),
('KW02', 'Budaya', 'Peninggalan Masa Lalu, serta Wisata Sejarah', 'Buku Wisata'),
('KW03', 'Pantai', 'Destinasi wisata yang berada pada kawasan pinggir ', 'Buku WIsata'),
('KW04', 'Religi', 'Wisata Rohani', 'Buku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoriberita`
--

CREATE TABLE `kategoriberita` (
  `kategoriberitaKODE` char(4) NOT NULL,
  `kategoriberitaNAMA` varchar(60) NOT NULL,
  `kategoriberitaKET` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategoriberita`
--

INSERT INTO `kategoriberita` (`kategoriberitaKODE`, `kategoriberitaNAMA`, `kategoriberitaKET`) VALUES
('BR01', 'Sport', 'MOTOGP Mandalika 2023'),
('BR02', 'Travel', '2 Arsitek Prancis Turun Tangan Perbaiki Museum Nasional yang Terbakar'),
('BR03', 'Otomotif', 'Robot Raksasa yang Bisa Dikemudikan Manusia Tampil di Japan Mobility Show');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `users_ID` char(4) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indeks untuk tabel `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_ID`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_ID`);

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasi_ID`);

--
-- Indeks untuk tabel `dimas`
--
ALTER TABLE `dimas`
  ADD PRIMARY KEY (`dimasID`);

--
-- Indeks untuk tabel `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`foto_ID`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_ID`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kabupaten_KODE`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_ID`);

--
-- Indeks untuk tabel `kategoriberita`
--
ALTER TABLE `kategoriberita`
  ADD PRIMARY KEY (`kategoriberitaKODE`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
