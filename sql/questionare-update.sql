-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2019 at 05:05 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questionare`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_answer`
--

CREATE TABLE `tb_answer` (
  `answerID` int(11) NOT NULL,
  `responseID` varchar(5) NOT NULL,
  `formCode` varchar(15) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `question_detailID` int(11) NOT NULL,
  `value` text NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tb_answer_temp`
--

CREATE TABLE `tb_answer_temp` (
  `answerID` int(11) NOT NULL,
  `responseID` varchar(5) NOT NULL,
  `formCode` varchar(15) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `question_detailID` int(11) NOT NULL,
  `value` text NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_answer_temp`
--

INSERT INTO `tb_answer_temp` (`answerID`, `responseID`, `formCode`, `sectionID`, `questionID`, `question_detailID`, `value`, `createdDate`) VALUES
(162, 'wv47S', 'gTyluecT6G', 1, 1, 0, 'PT. Asuransi Astra Buana', '2019-03-10 20:55:39'),
(163, 'wv47S', 'gTyluecT6G', 1, 3, 0, 'Staff', '2019-03-10 20:55:39'),
(164, 'wv47S', 'gTyluecT6G', 1, 4, 0, 'Asuransi', '2019-03-10 20:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_form`
--

CREATE TABLE `tb_form` (
  `formID` int(11) NOT NULL,
  `formCode` varchar(15) NOT NULL,
  `link` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdBy` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_form`
--

INSERT INTO `tb_form` (`formID`, `formCode`, `link`, `title`, `description`, `isActive`, `createdDate`, `createdBy`) VALUES
(1, 'gTyluecT6G', 'kuantitatif', 'Kuesioner Kuantitatif Penelitian Digital Mastery', '<h4>Penelitian ini bertujuan untuk mengetahui tingkat digital mastery pada level individu dan organisasi dan untuk mengetahui seberapa besar pengaruh Digital Propensity, Digital Attitude, Digital Innovativeness, Digital Literacy, Digital Efficacy dan Action Readiness individu pada kemampuan digital Perusahaan.<br><p></p>\n\n                                        Bersama kuesioner ini, kami mohon kesediaan Bapak/Ibu untuk dapat berkontribusi melalui pengisian kuesioner secara lengkap. Adapun jika Bapak/Ibu memiliki pertanyaan lebih lanjut, silahkan hubungi kami di alamat email berikut:  <a href=\"mailto:reza@sbm-itb.ac.id\">reza@sbm-itb.ac.id</a>id.<br><br>\n                                        Demikian kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih. <br><br>\n\n                                        Salam,<br>\n                                        Tim Peneliti</h4>\n                                        <br><br>\n                                        <p style=\"color: red\">* Wajib diisi.</p>', 1, '2019-03-09 07:35:30', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_question`
--

CREATE TABLE `tb_question` (
  `questionID` int(11) NOT NULL,
  `formCode` varchar(15) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `questionType` varchar(15) NOT NULL,
  `question` text NOT NULL,
  `userfile` text NOT NULL,
  `isRequired` int(1) NOT NULL,
  `isOthers` int(1) NOT NULL,
  `rowStatus` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_question`
--

INSERT INTO `tb_question` (`questionID`, `formCode`, `sectionID`, `questionType`, `question`, `userfile`, `isRequired`, `isOthers`, `rowStatus`) VALUES
(1, 'gTyluecT6G', 1, 'Input', 'Nama Perusahaan Anda', '', 1, 0, 0),
(2, 'gTyluecT6G', 1, 'Multiple Choice', 'Jenis Kelamin', '', 1, 0, 0),
(3, 'gTyluecT6G', 1, 'Multiple Choice', 'Jabatan/Posisi Anda dalam Perusahaan adalah', '', 1, 1, 0),
(4, 'gTyluecT6G', 1, 'Multiple Choice', 'Industri/Bidang Perusahaan Anda adalah', '', 1, 1, 0),
(5, 'gTyluecT6G', 1, 'Input', 'No Induk Karyawan (Data ini hanya digunakan untuk mencocokkan antara kuesioner kualitatif dengan kuantitatif semata)', '', 1, 0, 0),
(6, 'gTyluecT6G', 1, 'Multiple Choice', 'Apakah Anda memiliki pengalaman dalam mengembangkan aplikasi digital?', '', 1, 0, 0),
(7, 'gTyluecT6G', 1, 'Input', 'Jika Ya, hal apa yang sudah Anda lakukan dalam mengembangkan aplikasi digital? (Jika Tidak, silahkan tuliskan N/A)', '', 1, 0, 0),
(8, 'gTyluecT6G', 1, 'Multiple Choice', 'Berapa lama Anda sudah mengembangkan aplikasi digital?', '', 1, 0, 0),
(9, 'gTyluecT6G', 2, 'Skala', 'Pimpinan di perusahaan kami memiliki visi yang jelas mengenai rencana penggunaan teknologi digital di perusahaan kami di masa depan ', '', 1, 0, 0),
(10, 'gTyluecT6G', 2, 'Skala', 'Pimpinan di seluruh jenjang di perusahaan kami memiliki visi yang sama mengenai transformasi digital di perusahaan kami', '', 1, 0, 0),
(11, 'gTyluecT6G', 2, 'Skala', 'Pimpinan di perusahaan kami memiliki visi untuk mencapai perubahan yang radikal/transformatif di perusahaan dengan menggunakan teknologi digital', '', 1, 0, 0),
(12, 'gTyluecT6G', 2, 'Skala', 'Pimpinan di perusahaan kami memiliki visi untuk meningkatkan pengalaman pelanggan dengan menggunakan teknologi digital', '', 1, 0, 0),
(13, 'gTyluecT6G', 2, 'Skala', 'Pimpinan di perusahaan kami memiliki visi mengubah proses operasional perusahaan dengan menggunakan teknologi digital untuk meningkatkan efisiensi dan performansi perusahaan', '', 1, 0, 0),
(14, 'gTyluecT6G', 2, 'Skala', 'Pimpinan di perusahaan kami memiliki visi untuk mengubah bisnis model perusahaan menjadi lebih agile/tangkas dengan menggunakan teknologi digital', '', 1, 0, 0),
(15, 'gTyluecT6G', 2, 'Skala', 'Pimpinan di perusahaan kami telah mengidentifikasi dengan jelas aset-aset strategis perusahaan yang dapat membantu terwujudnya transformasi digital di perusahaan kami (contoh: aset fisik seperti mesin produksi dan toko ritel, aset berbasis kompetensi seperti para ahli desain produk dan operasi bisnis yang efisien dan fleksibel, aset tidak berwujud/intangible seperti brand, reputasi dan kultur perusahaan, aset data seperti data penjualan, data produksi, data konsumen)', '', 1, 0, 0),
(16, 'gTyluecT6G', 2, 'Skala', 'Pimpinan di perusahaan kami menyatakan dengan jelas maksud (gambaran umum apa yang harus diubah) dan goal (manfaat/outcome yang dapat diukur bagi perusahaan, pelanggan, atau karyawan) yang ingin dicapai mengenai rencana penggunaan teknologi digital di perusahaan kami', '', 1, 0, 0),
(17, 'gTyluecT6G', 2, 'Skala', 'Pimpinan di perusahaan kami senantiasa memperbaharui visi transformasi digital perusahaan kami untuk mengikuti perkembangan teknologi', '', 1, 0, 0),
(18, 'gTyluecT6G', 2, 'Skala', 'Pimpinan di perusahaan kami mampu mendeteksi bottlenecks atau halangan-halangan yang mengganggu terwujudnya transformasi digital di perusahaan kami', '', 1, 0, 0),
(19, 'gTyluecT6G', 3, 'Skala', 'Pimpinan di perusahaan kami memberikan kesempatan yang luas bagi para karyawan untuk memberikan opini mengenai transformasi digital di perusahaan', '', 1, 0, 0),
(20, 'gTyluecT6G', 3, 'Skala', 'Pimpinan di perusahaan kami senantiasa menyampaikan inisiatif atau aktivitas digital yang sedang atau akan dijalankan perusahaan secara transparan kepada kami', '', 1, 0, 0),
(21, 'gTyluecT6G', 3, 'Skala', 'Pimpinan di perusahaan kami secara aktif mendorong percakapan/diskusi terbuka untuk memfasilitasi dialog strategis dan menciptakan kesempatan bagi semua orang untuk mengambil peran dalam mencapai visi transformasi digital perusahaan', '', 1, 0, 0),
(22, 'gTyluecT6G', 3, 'Skala', 'Pimpinan di perusahaan kami secara aktif memberikan feedback/umpan balik atau tindakan terhadap ide-ide atau opini karyawan mengenai transformasi digital di perusahaan', '', 1, 0, 0),
(23, 'gTyluecT6G', 3, 'Skala', 'Pimpinan di perusahaan kami menyediakan platform atau medium khusus bagi para karyawan untuk dapat berkomunikasi dan berinteraksi secara terbuka dengan para pimpinan dan sesama karyawan mengenai inisiatif digital di perusahaan kami. (Contoh: intranet, social network perusahaan, media sosial perusahaan)', '', 1, 0, 0),
(24, 'gTyluecT6G', 3, 'Skala', 'Pimpinan di perusahaan kami memberikan kesempatan bagi para karyawan untuk dapat berkolaborasi (co-creation) dengan para pimpinan dan sesama karyawan mengenai inisiatif dan solusi digital di perusahaan kami. (Contoh: intranet, social network perusahaan, media sosial perusahaan)', '', 1, 0, 0),
(25, 'gTyluecT6G', 3, 'Skala', 'Pimpinan di perusahaan kami mengenali dan memberikan dukungan penuh kepada para digital champion/savvy (yakni orang-orang yang memiliki visi dan kapabilitas untuk mewujudkan transformasi digital) di perusahaan kami untuk kemudian dimobilisasi sehingga mendorong perubahan yang lebih cepat di perusahaan.', '', 1, 0, 0),
(26, 'gTyluecT6G', 3, 'Skala', 'Pimpinan di perusahaan kami memiliki program khusus untuk para digital champion/savvy di perusahaan kami untuk mempermudah mereka mengajak para kolega atau bawahannya untuk aktif ikut serta dalam melaksanakan inisiatif atau aktivitas digital perusahaan menuju transformasi digital.', '', 1, 0, 0),
(27, 'gTyluecT6G', 3, 'Skala', 'Pimpinan di perusahaan kami mengenali dan memberikan bantuan bagi para karyawan yang memiliki kesulitan dalam melaksanakan inisiatif atau aktivitas digital perusahaan menuju transformasi digital.', '', 1, 0, 0),
(28, 'gTyluecT6G', 4, 'Skala', 'Pimpinan di perusahaan kami mendorong perubahan budaya yang dibutuhkan untuk transformasi digital di perusahaan', '', 1, 0, 0),
(29, 'gTyluecT6G', 4, 'Skala', 'Pimpinan di perusahaan kami mengkoordinasikan seluruh inisiatif digital yang berada di setiap divisi, fungsi dan area/wilayah tempat kami beroperasi', '', 1, 0, 0),
(30, 'gTyluecT6G', 4, 'Skala', 'Pimpinan di perusahaan kami mampu menjelaskan peran dan tanggung jawab setiap divisi dan individu dalam rangka mengatur inisiatif digital di perusahaan kami', '', 1, 0, 0),
(31, 'gTyluecT6G', 4, 'Skala', 'Pimpinan di perusahaan kami telah mengaitkan inisiatif transformasi digital ke dalam Key Performance Indicators (KPI) yang telah disetujui', '', 1, 0, 0),
(32, 'gTyluecT6G', 4, 'Skala', 'Pimpinan di perusahaan kami secara khusus menunjuk orang-orang ataupun membentuk tim khusus untuk memimpin aktivitas transformasi digital di perusahaan kami.', '', 1, 0, 0),
(33, 'gTyluecT6G', 4, 'Skala', 'Pimpinan di perusahaan kami menyediakan informasi data yang transparan untuk membantu pengambilan keputusan bisnis secara real time (waktu nyata)', '', 1, 0, 0),
(34, 'gTyluecT6G', 4, 'Skala', 'Pimpinan di perusahaan kami nyaman dengan tingkat ambiguitas/ketidakpastian tertentu (berani mengambil risiko) dalam hal pelaksanaan inisiatif digital di perusahaan.', '', 1, 0, 0),
(35, 'gTyluecT6G', 4, 'Skala', 'Pimpinan di perusahaan kami menetapkan standar aturan dan regulasi yang jelas tentang jenis kolaborasi mana yang benar dan tidak benar untuk menjalankan inisiatif digital di perusahaan', '', 1, 0, 0),
(36, 'gTyluecT6G', 4, 'Skala', 'Pimpinan di perusahaan kami senantiasa mengawasi kolaborasi yang terjadi dalam pelaksanaan inisiatif digital di perusahaan', '', 1, 0, 0),
(37, 'gTyluecT6G', 4, 'Skala', 'Pimpinan di perusahaan kami telah menetapkan aturan standar pada sistem, proses dan informasi berbasis digital di operasional bisnis perusahaan', '', 1, 0, 0),
(38, 'gTyluecT6G', 4, 'Skala', 'Pimpinan di perusahaan kami telah mengotomatisasi sistem, proses dan informasi pada operasional bisnis perusahaan', '', 1, 0, 0),
(39, 'gTyluecT6G', 4, 'Skala', 'Pimpinan di perusahaan kami telah membangun sistem berbasis digital yang mampu mempercepat pengambilan keputusan melalui informasi yang real time (waktu nyata)', '', 1, 0, 0),
(40, 'gTyluecT6G', 4, 'Skala', 'Pimpinan di perusahaan kami telah menetapkan peta jalan (road map) yang jelas mengenai transformasi digital di perusahaan', '', 1, 0, 0),
(41, 'gTyluecT6G', 5, 'Skala', 'Pimpinan dan Divisi teknologi informasi (IT) di perusahaan kami menjalankan inisiatif transformasi digital yang sesuai dengan kebutuhan perusahaan', '', 1, 0, 0),
(42, 'gTyluecT6G', 5, 'Skala', 'Pimpinan di perusahaan kami berinteraksi secara aktif dengan karyawan di divisi teknologi informasi (IT) sebagai bagian dari transformasi digital di perusahaan', '', 1, 0, 0),
(43, 'gTyluecT6G', 5, 'Skala', 'Pimpinan di perusahaan kami memberikan investasi yang sangat signifikan untuk mengembangkan keterampilan digital para karyawan yang sesuai dengan visi transformasi digital di perusahaan kami.', '', 1, 0, 0),
(44, 'gTyluecT6G', 5, 'Skala', 'Pimpinan di perusahaan kami memiliki hubungan dan kolaborasi yang sangat baik dengan divisi teknologi informasi (IT)', '', 1, 0, 0),
(45, 'gTyluecT6G', 5, 'Skala', 'Pimpinan di perusahaan kami menyediakan platform atau infrastruktur digital yang kokoh (memiliki struktur dan terintegrasi dengan baik) untuk mendukung model bisnis digital baru perusahaan', '', 1, 0, 0),
(46, 'gTyluecT6G', 5, 'Skala', 'Pimpinan di perusahaan kami senantiasa mengikuti dan mengantisipasi perkembangan tren dan inovasi IT yang dapat memberikan dampak kepada perusahaan', '', 1, 0, 0),
(47, 'gTyluecT6G', 5, 'Skala', 'Pimpinan di perusahaan kami senantiasa mencari cara baru untuk meningkatkan efektifitas penggunaan IT di perusahaan kami', '', 1, 0, 0),
(48, 'gTyluecT6G', 6, 'Skala', 'Perusahaan saya menggunakan berbagai jenis aplikasi digital untuk memasarkan dan menjual produk/jasa yang terkoneksi dengan baik di semua aplikasi yang digunakan', '', 1, 0, 0),
(49, 'gTyluecT6G', 6, 'Skala', 'Perusahaan saya menggunakan media digital untuk menyediakan layanan pada pelanggan', '', 1, 0, 0),
(50, 'gTyluecT6G', 6, 'Skala', 'Perusahaan saya menggunakan teknologi digital untuk meningkatkan kinerja atau memberikan nilai tambah pada produk atau layanan Perusahaan', '', 1, 0, 0),
(51, 'gTyluecT6G', 6, 'Skala', 'Perusahaan saya menggunakan teknologi digital (data analytics, social media, mobile apps, embedded services, dll) untuk lebih memahami pelanggan yang bertujuan untuk menciptakan pengalaman pelanggan yang lebih baik', '', 1, 0, 0),
(52, 'gTyluecT6G', 6, 'Skala', 'Proses inti dalam Perusahaan saya telah diotomatisasi', '', 1, 0, 0),
(53, 'gTyluecT6G', 6, 'Skala', 'Perusahaan saya menggunakan teknologi digital untuk mengintegrasikan proses operasional utama Perusahaan dengan informasi pelanggan', '', 1, 0, 0),
(54, 'gTyluecT6G', 6, 'Skala', 'Perusahaan saya menggunakan data analytics untuk membuat keputusan operasional yang lebih baik', '', 1, 0, 0),
(55, 'gTyluecT6G', 6, 'Skala', 'Perusahaan saya paham bagaimana caranya membangun pengalaman pelanggan dengan menggunakan berbagai aplikasi digital sehingga tercipta hubungan antar aplikasi yang baik', '', 1, 0, 0),
(56, 'gTyluecT6G', 6, 'Skala', 'Perusahaan saya mampu menggunakan teknologi digital untuk menciptakan kegiatan operasional yang inovatif', '', 1, 0, 0),
(57, 'gTyluecT6G', 6, 'Skala', 'Perusahaan saya mempunyai model bisnis baru yang disebabkan oleh penggunaan teknologi digital', '', 1, 0, 0),
(58, 'gTyluecT6G', 7, 'Multiple Choice', 'Melakukan komunikasi menggunakan aplikasi chat seperti Whatsapp', '', 1, 0, 0),
(59, 'gTyluecT6G', 7, 'Multiple Choice', 'Menggunakan bahasa pemrograman', '', 1, 0, 0),
(60, 'gTyluecT6G', 7, 'Multiple Choice', 'Menggunakan komputer untuk menyelesaikan pekerjaan', '', 1, 0, 0),
(61, 'gTyluecT6G', 7, 'Multiple Choice', 'Merancang software atau aplikasi', '', 1, 0, 0),
(62, 'gTyluecT6G', 7, 'Multiple Choice', 'Menggunakan search engines seperti Google', '', 1, 0, 0),
(63, 'gTyluecT6G', 7, 'Multiple Choice', 'Menggunakan informasi dari internet untuk membantu menyelesaikan pekerjaan', '', 1, 0, 0),
(64, 'gTyluecT6G', 7, 'Multiple Choice', 'Mengakses internet', '', 1, 0, 0),
(65, 'gTyluecT6G', 7, 'Multiple Choice', 'Mengakses website media sosial seperti Facebook, Twitter, Instagram', '', 1, 0, 0),
(66, 'gTyluecT6G', 7, 'Multiple Choice', 'Memperbaharui website atau media sosial pribadi', '', 1, 0, 0),
(67, 'gTyluecT6G', 7, 'Multiple Choice', 'Melakukan pembelian barang secara online', '', 1, 0, 0),
(68, 'gTyluecT6G', 7, 'Multiple Choice', 'Membagikan ide dan pengetahuan/informasi secara online', '', 1, 0, 0),
(69, 'gTyluecT6G', 7, 'Multiple Choice', 'Mengunduh (download) aplikasi dari Google playstore (android) atau Apple appstore (iOS)', '', 1, 0, 0),
(70, 'gTyluecT6G', 7, 'Multiple Choice', 'Menggunakan aplikasi mobile yang ada di handphone/tablet', '', 1, 0, 0),
(71, 'gTyluecT6G', 7, 'Multiple Choice', 'Melakukan ekplorasi/ekstrak data (data mining) atau analisis data dari media sosial', '', 1, 0, 0),
(72, 'gTyluecT6G', 7, 'Multiple Choice', 'Menggunakan internet sebagai media kolaborasi untuk menyelesaikan pekerjaan bersama team', '', 1, 0, 0),
(73, 'gTyluecT6G', 7, 'Multiple Choice', 'Menggunakan internet untuk berkomunikasi dengan atasan dan rekan kerja seperti email, video conference', '', 1, 0, 0),
(74, 'gTyluecT6G', 7, 'Multiple Choice', 'Mengatur meeting dengan rekan bisnis atau klien/pelanggan secara online', '', 1, 0, 0),
(75, 'gTyluecT6G', 7, 'Multiple Choice', 'Mengadakan meeting dengan rekan bisnis atau klien/pelanggan secara online', '', 1, 0, 0),
(76, 'gTyluecT6G', 7, 'Multiple Choice', 'Mengamati produk kompetitor beserta aktivitas mereka secara online', '', 1, 0, 0),
(77, 'gTyluecT6G', 7, 'Multiple Choice', 'Membuat mobile advertising (iklan digital mobile)', '', 1, 0, 0),
(78, 'gTyluecT6G', 7, 'Multiple Choice', 'Menggunakan media digital untuk mempromosikan dan menjual produk', '', 1, 0, 0),
(79, 'gTyluecT6G', 7, 'Multiple Choice', 'Menggunakan lebih dari satu marketing channel/media digital untuk memasarkan produk', '', 1, 0, 0),
(80, 'gTyluecT6G', 7, 'Multiple Choice', 'Menggunakan teknologi digital untuk melayani konsumen', '', 1, 0, 0),
(81, 'gTyluecT6G', 7, 'Multiple Choice', 'Menggunakan teknologi digital untuk memproduksi atau menambah nilai produk', '', 1, 0, 0),
(82, 'gTyluecT6G', 7, 'Multiple Choice', 'Mengadakan pengujian aplikasi digital baru?', '', 1, 0, 0),
(83, 'gTyluecT6G', 7, 'Multiple Choice', 'Terlibat dengan konsumen dalam perancangan aplikasi digital?', '', 1, 0, 0),
(84, 'gTyluecT6G', 7, 'Multiple Choice', 'Terlibat dengan unit lain dalam pengembangan aplikasi digital?', '', 1, 0, 0),
(85, 'gTyluecT6G', 7, 'Multiple Choice', 'Diikutsertakan dalam tim pengembangan aplikasi digital di perusahaan?', '', 1, 0, 0),
(86, 'gTyluecT6G', 7, 'Multiple Choice', 'Mencoba aplikasi digital baru terkait dengan peningkatan produktivitas kerja pribadi Anda?', '', 1, 0, 0),
(87, 'gTyluecT6G', 7, 'Multiple Choice', 'Mencoba aplikasi digital baru yang mengenalkan cara kerja baru bagi Anda?', '', 1, 0, 0),
(88, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital membuat segala sesuatu menjadi lebih mudah', '', 1, 0, 0),
(89, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital dapat meningkatkan hubungan interpersonal', '', 1, 0, 0),
(90, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital memberikan bantuan yang berarti bagi saya', '', 1, 0, 0),
(91, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital memungkinkan saya untuk melakukan aktivitas lebih banyak', '', 1, 0, 0),
(92, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital membuat saya lebih percaya diri', '', 1, 0, 0),
(93, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital berkontribusi terhadap kualitas hidup yang lebih baik', '', 1, 0, 0),
(94, 'gTyluecT6G', 8, 'Skala', 'Bekerja tanpa bantuan teknologi digital akan sulit', '', 1, 0, 0),
(95, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital memberikan saya kebebasan dalam beraktivitas/bergerak', '', 1, 0, 0),
(96, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital memberikan saya kebebasan dalam bekerja', '', 1, 0, 0),
(97, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital membantu manusia untuk meningkatkan fleksibitas dalam bekerja', '', 1, 0, 0),
(98, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital membuat saya lebih produktif', '', 1, 0, 0),
(99, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital membuat saya mampu bekerja dengan lebih efisien', '', 1, 0, 0),
(100, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital membantu saya untuk lebih kompetitif dalam bekerja', '', 1, 0, 0),
(101, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital memungkinkan saya bisa berkolaborasi lebih baik dengan rekan kerja', '', 1, 0, 0),
(102, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital memberikan jaminan keamanan pada kehidupan personal saya', '', 1, 0, 0),
(103, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital membantu orang untuk dapat berhubungan dengan orang lain', '', 1, 0, 0),
(104, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital cenderung membuat sesuatu menjadi lebih rumit', '', 1, 0, 0),
(105, 'gTyluecT6G', 8, 'Skala', 'Saya merasa kehadiran teknologi digital dapat mengurangi kualitas hubungan interpersonal', '', 1, 0, 0),
(106, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital membuat saya bingung/kewalahan', '', 1, 0, 0),
(107, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital cenderung mengurangi skill/keahlian saya', '', 1, 0, 0),
(108, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital hanya memperumit hidup saya saja', '', 1, 0, 0),
(109, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital membuat saya merasa gelisah', '', 1, 0, 0),
(110, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital menimbulkan banyak masalah bagi manusia', '', 1, 0, 0),
(111, 'gTyluecT6G', 8, 'Skala', 'Saya lebih memilih bekerja tanpa bantuan teknologi digital', '', 1, 0, 0),
(112, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital telah membatasi/merampas kebebasan saya', '', 1, 0, 0),
(113, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital telah merampas privasi saya', '', 1, 0, 0),
(114, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital membuat bekerja menjadi lebih kaku/tidak fleksibel', '', 1, 0, 0),
(115, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital telah mengurangi kontribusi saya dalam bekerja', '', 1, 0, 0),
(116, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital menyebabkan saya bekerja di luar jam kerja normal', '', 1, 0, 0),
(117, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital mengurangi peran saya dalam organisasi saya', '', 1, 0, 0),
(118, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital menimbulkan banyak kebingungan diantara orang-orang', '', 1, 0, 0),
(119, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital mengusik kehidupan personal orang-orang', '', 1, 0, 0),
(120, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital biasanya mengurangi intensitas seseorang dalam menghabiskan waktu dengan orang lain', '', 1, 0, 0),
(121, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital membuat perubahan yang mencemaskan saya', '', 1, 0, 0),
(122, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital mengharuskan saya untuk berubah ke arah yang tidak saya inginkan', '', 1, 0, 0),
(123, 'gTyluecT6G', 8, 'Skala', 'Teknologi digital membuat banyak ketidakpastian di dalam karir saya', '', 1, 0, 0),
(124, 'gTyluecT6G', 8, 'Skala', 'Sulit sekali merancang masa depan setelah kehadiran teknologi digital', '', 1, 0, 0),
(125, 'gTyluecT6G', 9, 'Skala', 'Orang lain menghubungi saya untuk meminta saran mengenai teknologi digital yang baru', '', 1, 0, 0),
(126, 'gTyluecT6G', 9, 'Skala', 'Sepertinya teman-teman saya mengetahui lebih banyak tentang teknologi digital terbaru dibandingkan saya', '', 1, 0, 0),
(127, 'gTyluecT6G', 9, 'Skala', 'Pada umumnya, saya adalah orang pertama dibandingkan teman-teman saya untuk memelajari teknologi digital baru ketika hal tersebut muncul', '', 1, 0, 0),
(128, 'gTyluecT6G', 9, 'Skala', 'Saya biasanya mampu mencari tahu produk dan servis dari teknologi digital baru tanpa bantuan orang lain', '', 1, 0, 0),
(129, 'gTyluecT6G', 9, 'Skala', 'Teknologi digital terbaru lebih nyaman untuk digunakan', '', 1, 0, 0),
(130, 'gTyluecT6G', 9, 'Skala', 'Saya mengikuti perkembangan teknologi digital terbaru di bidang yang saya minati', '', 1, 0, 0),
(131, 'gTyluecT6G', 9, 'Skala', 'Saya menyukai tantangan untuk memahami gadget berteknologi canggih', '', 1, 0, 0),
(132, 'gTyluecT6G', 9, 'Skala', 'Saya menemukan lebih sedikit masalah dibandingkan orang lain pada saat mengoperasikan teknologi digital', '', 1, 0, 0),
(133, 'gTyluecT6G', 9, 'Skala', 'Saya menghindari untuk mencoba gadget berteknologi canggih karena akan menghabiskan banyak waktu untuk memelajarinya', '', 1, 0, 0),
(134, 'gTyluecT6G', 9, 'Skala', 'Saya selalu terbuka untuk memelajari teknologi digital yang baru dan berbeda', '', 1, 0, 0),
(135, 'gTyluecT6G', 9, 'Skala', 'Tidak ada gunanya mencoba produk berteknologi digital canggih ketika produk yang saya miliki saat ini berfungsi dengan baik', '', 1, 0, 0),
(136, 'gTyluecT6G', 10, 'Skala', 'Saya mengerti dengan jelas tentang tujuan-tujuan dari setiap bentuk teknologi digital', '', 1, 0, 0),
(137, 'gTyluecT6G', 10, 'Skala', 'Saya mengerti dengan jelas tentang manfaat-manfaat dari setiap bentuk teknologi digital', '', 1, 0, 0),
(138, 'gTyluecT6G', 10, 'Skala', 'Saya memiliki skill/keterampilan yang baik dalam menggunakan berbagai bentuk teknologi digital', '', 1, 0, 0),
(139, 'gTyluecT6G', 10, 'Skala', 'Saya mengetahui banyak hal tentang berbagai bentuk teknologi digital', '', 1, 0, 0),
(140, 'gTyluecT6G', 10, 'Skala', 'Saya mempunyai skill/keterampilan teknis untuk mengoperasikan setiap bentuk teknologi digital dalam pekerjaan saya sehingga hasilnya memuaskan', '', 1, 0, 0),
(141, 'gTyluecT6G', 10, 'Skala', 'Saya selalu memaksimalkan fitur-fitur yang disediakan oleh setiap bentuk teknologi digital', '', 1, 0, 0),
(142, 'gTyluecT6G', 10, 'Skala', 'Saya tahu bagaimana menyelesaikan masalah teknis yang saya miliki', '', 1, 0, 0),
(143, 'gTyluecT6G', 10, 'Skala', 'Saya familiar dengan isu-isu yang berkaitan dengan aktivitas web-based (contohnya : cyber safety, search issues, plagiarism)', '', 1, 0, 0),
(144, 'gTyluecT6G', 10, 'Skala', 'Pegawai-pegawai baru yang direkrut oleh organisasi saya mengetahui setiap bentuk teknologi digital lebih baik dibandingkan saya', '', 1, 0, 0),
(145, 'gTyluecT6G', 10, 'Skala', 'Kesulitan dalam memelajari perangkat lunak disebabkan oleh buku manual yang ditulis dengan menggunakan bahasa yang sangat teknis', '', 1, 0, 0),
(146, 'gTyluecT6G', 10, 'Skala', 'Saya dapat menyelesaikan pekerjaan dengan menggunakan setiap bentuk teknologi digital meskipun tidak ada seorang pun yang memberitahu saya tentang apa yang harus dilakukan', '', 1, 0, 0),
(147, 'gTyluecT6G', 10, 'Skala', 'Saya dapat menyelesaikan pekerjaan dengan menggunakan setiap bentuk teknologi digital meskipun saya belum pernah menggunakan bentuk teknologi ini sebelumnya', '', 1, 0, 0),
(148, 'gTyluecT6G', 10, 'Skala', 'Saya dapat menyelesaikan pekerjaan dengan menggunakan setiap bentuk teknologi digital meskipun saya hanya memiliki buku manual sebagai referensinya', '', 1, 0, 0),
(149, 'gTyluecT6G', 10, 'Skala', 'Saya dapat menyelesaikan pekerjaan dengan menggunakan setiap bentuk teknologi digital jika saya telah melihat orang lain menggunakannya sebelum saya', '', 1, 0, 0),
(150, 'gTyluecT6G', 10, 'Skala', 'Saya dapat menyelesaikan pekerjaan dengan menggunakan setiap bentuk teknologi digital jika saya dapat menghubungi seseorang untuk membantu saya jika berada dalam kesulitan', '', 1, 0, 0),
(151, 'gTyluecT6G', 10, 'Skala', 'Saya dapat menyelesaikan pekerjaan dengan menggunakan setiap bentuk teknologi digital jika ada seseorang yang membantu saya untuk mulai mengoperasikannya', '', 1, 0, 0),
(152, 'gTyluecT6G', 10, 'Skala', 'Saya dapat menyelesaikan pekerjaan dengan menggunakan setiap bentuk teknologi digital jika saya memiliki banyak waktu untuk menyelesaikan pekerjaan dengan teknologi tersebut', '', 1, 0, 0),
(153, 'gTyluecT6G', 10, 'Skala', 'Saya dapat menyelesaikan pekerjaan dengan menggunakan setiap bentuk teknologi digital jika saya memiliki fasilitas bantuan dalam menggunakan teknologi tersebut', '', 1, 0, 0),
(154, 'gTyluecT6G', 10, 'Skala', 'Saya dapat menyelesaikan pekerjaan dengan menggunakan setiap bentuk teknologi digital jika ada seseorang yang menunjukkan pada saya bagaimana cara menggunakannya', '', 1, 0, 0),
(155, 'gTyluecT6G', 10, 'Skala', 'Saya dapat menyelesaikan pekerjaan dengan menggunakan setiap bentuk teknologi digital baru jika saya telah menggunakan aplikasi yang mirip sebelumnya', '', 1, 0, 0),
(156, 'gTyluecT6G', 10, 'Skala', 'Saya selalu dapat menyelesaikan masalah-masalah yang sulit dengan menggunakan setiap bentuk teknologi digital apabila saya mencobanya dengan cukup keras', '', 1, 0, 0),
(157, 'gTyluecT6G', 10, 'Skala', 'Saya percaya diri dengan kemampuan saya dalam menggunakan setiap bentuk teknologi digital dalam hal memperoleh informasi yang berharga', '', 1, 0, 0),
(158, 'gTyluecT6G', 10, 'Skala', 'Saya dapat menyelesaikan banyak masalah dengan menggunakan setiap bentuk teknologi digital apabila saya bersungguh-sungguh mengupayakannya', '', 1, 0, 0),
(159, 'gTyluecT6G', 10, 'Skala', 'Jika saya menemui masalah, saya biasa memikirkan solusi dengan menggunakan setiap bentuk teknologi digital', '', 1, 0, 0),
(160, 'gTyluecT6G', 11, 'Skala', 'Dibandingkan dengan orang lain, saya berada di posisi terdepan dalam pengembangan teknologi digital di perusahaan', '', 1, 0, 0),
(161, 'gTyluecT6G', 11, 'Skala', 'Saya menjalankan peran teknis dalam pengembangan aplikasi digital (misalnya sebagai programmer)', '', 1, 0, 0),
(162, 'gTyluecT6G', 11, 'Skala', 'Saya menjalankan peran non teknis dalam pengembangan aplikasi digital (semua peran yang tidak terkait langsung dengan teknologi informasi dan komputer, misalnya melakukan kerja sama atau berkomunikasi dengan unit lain di perusahaan)', '', 1, 0, 0),
(163, 'gTyluecT6G', 11, 'Skala', 'Saya menjalankan seluruh rencana pengembangan teknologi digital di perusahaan', '', 1, 0, 0),
(164, 'gTyluecT6G', 11, 'Skala', 'Saya menjalankan konsekuensi dari pengembangan teknologi digital (misalnya: perubahan job desk, dipindah ke bagian lain dsb)', '', 1, 0, 0),
(165, 'gTyluecT6G', 11, 'Skala', 'Saya menjalankan pencarian informasi untuk pengembangan teknologi digital di perusahaan', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_question_detail`
--

CREATE TABLE `tb_question_detail` (
  `id` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_question_detail`
--

INSERT INTO `tb_question_detail` (`id`, `questionID`, `value`) VALUES
(1, 2, 'Pria'),
(2, 2, 'Wanita'),
(3, 3, 'Staff'),
(4, 3, 'Supervisor'),
(5, 3, 'Manager'),
(6, 3, 'Asisten Senior Manager'),
(7, 3, 'Senior Manager'),
(8, 3, 'General Manager'),
(9, 3, 'Direktur'),
(10, 3, 'Vice Presiden'),
(11, 4, 'Asuransi'),
(12, 4, 'Engineering & Consultant'),
(13, 4, 'FinTech'),
(14, 4, 'Food & Beverage'),
(15, 4, 'Jasa'),
(16, 4, 'Lembaga Keuangan Non Bank'),
(17, 4, 'Logistics'),
(18, 4, 'Maintenance & Overhaul'),
(19, 4, 'Manufaktur'),
(20, 4, 'Pelayanan Jasa'),
(21, 4, 'Pembangkit Tenaga Listrik'),
(22, 4, 'Pembiayaan'),
(23, 4, 'Lembaga Pendidikan'),
(24, 4, 'Perbankan'),
(25, 4, 'Properti'),
(26, 4, 'Sales & Distribution'),
(27, 4, 'Sekuritas'),
(28, 4, 'Telekomunikasi'),
(29, 4, 'Transportasi'),
(30, 4, 'Yayasan NGO'),
(31, 6, 'Ya'),
(32, 6, 'Tidak'),
(33, 8, 'Tidak pernah'),
(34, 8, '<1 tahun'),
(35, 8, '1 - <3 tahun'),
(36, 8, '3 - <5 tahun'),
(37, 8, '5 - <7 tahun'),
(38, 8, '>7 tahun'),
(39, 58, 'Lebih dari 3x sehari'),
(40, 58, '1-2x sehari'),
(41, 58, '1x seminggu'),
(42, 58, '1x sebulan'),
(43, 58, 'Tidak pernah'),
(44, 59, 'Setiap hari'),
(45, 59, 'Setiap minggu'),
(46, 59, 'Setiap bulan'),
(47, 59, 'Tidak pernah'),
(48, 60, 'Setiap hari'),
(49, 60, 'Setiap minggu'),
(50, 60, 'Setiap bulan'),
(51, 60, 'Tidak pernah'),
(52, 61, 'Setiap hari'),
(53, 61, 'Setiap minggu'),
(54, 61, 'Setiap bulan'),
(55, 61, 'Tidak pernah'),
(56, 62, 'Lebih dari 3x sehari'),
(57, 62, '1-2x sehari'),
(58, 62, '1x seminggu'),
(59, 62, '1x sebulan'),
(60, 62, 'Tidak pernah'),
(61, 63, 'Lebih dari 3x sehari'),
(62, 63, '1-2x sehari'),
(63, 63, '1x seminggu'),
(64, 63, '1x sebulan'),
(65, 63, 'Tidak pernah'),
(66, 64, 'Lebih dari 3x sehari'),
(67, 64, '1-2x sehari'),
(68, 64, '1x seminggu'),
(69, 64, '1x sebulan'),
(70, 64, 'Tidak pernah'),
(71, 65, 'Lebih dari 3x sehari'),
(72, 65, '1-2x sehari'),
(73, 65, '1x seminggu'),
(74, 65, '1x sebulan'),
(75, 65, 'Tidak pernah'),
(76, 66, 'Lebih dari 3x sehari'),
(77, 66, '1-2x sehari'),
(78, 66, '1x seminggu'),
(79, 66, '1x sebulan'),
(80, 66, 'Tidak pernah'),
(81, 67, '2-3x seminggu'),
(82, 67, '1x seminggu'),
(83, 67, '1x sebulan'),
(84, 67, 'Tidak pernah'),
(85, 68, 'Lebih dari 3x sehari'),
(86, 68, '1-2x sehari'),
(87, 68, '1x seminggu'),
(88, 68, '1x sebulan'),
(89, 68, 'Tidak pernah'),
(90, 69, 'Lebih dari 3x sehari'),
(91, 69, '1-2x sehari'),
(92, 69, '1x seminggu'),
(93, 69, '1x sebulan'),
(94, 69, 'Tidak pernah/tidak menggunakan'),
(95, 70, 'Lebih dari 3x sehari'),
(96, 70, '1-2x sehari'),
(97, 70, '1x seminggu'),
(98, 70, '1x sebulan'),
(99, 70, 'Tidak pernah'),
(100, 71, 'Harian'),
(101, 71, 'Mingguan'),
(102, 71, 'Bulanan'),
(103, 71, 'Tidak pernah'),
(104, 72, 'Harian'),
(105, 72, 'Mingguan'),
(106, 72, 'Bulanan'),
(107, 72, 'Tidak pernah'),
(108, 73, 'Lebih dari 3x sehari'),
(109, 73, '1-2x sehari'),
(110, 73, '1x seminggu'),
(111, 73, '1x sebulan'),
(112, 73, 'Tidak pernah'),
(113, 74, '2-3x seminggu'),
(114, 74, '1x seminggu'),
(115, 74, '1x sebulan'),
(116, 74, 'Tidak pernah'),
(117, 75, '2-3x seminggu'),
(118, 75, '1x seminggu'),
(119, 75, '1x sebulan'),
(120, 75, 'Tidak pernah'),
(121, 76, 'Harian'),
(122, 76, 'Mingguan'),
(123, 76, 'Bulanan'),
(124, 76, 'Tidak pernah'),
(125, 77, 'Harian'),
(126, 77, 'Mingguan'),
(127, 77, 'Bulanan'),
(128, 77, 'Tidak pernah'),
(129, 78, 'Lebih dari 3x sehari'),
(130, 78, '1-2x sehari'),
(131, 78, '1-2x seminggu'),
(132, 78, '1x sebulan'),
(133, 78, 'Tidak pernah'),
(134, 79, 'Lebih dari 3x sehari'),
(135, 79, '1-2x sehari'),
(136, 79, '1-2x seminggu'),
(137, 79, '1x sebulan'),
(138, 79, 'Tidak pernah'),
(139, 80, 'Lebih dari 3x sehari'),
(140, 80, '1-2x sehari'),
(141, 80, '1x seminggu'),
(142, 80, '1x sebulan'),
(143, 80, 'Tidak pernah'),
(144, 81, 'Harian'),
(145, 81, 'Mingguan'),
(146, 81, 'Bulanan'),
(147, 81, 'Tidak pernah'),
(148, 82, 'Harian'),
(149, 82, 'Mingguan'),
(150, 82, 'Bulanan'),
(151, 82, 'Tidak pernah'),
(152, 83, 'Harian'),
(153, 83, 'Mingguan'),
(154, 83, 'Bulanan'),
(155, 83, 'Tidak pernah'),
(156, 84, 'Harian'),
(157, 84, 'Mingguan'),
(158, 84, 'Bulanan'),
(159, 84, 'Tidak pernah'),
(160, 85, 'Harian'),
(161, 85, 'Mingguan'),
(162, 85, 'Bulanan'),
(163, 85, 'Tidak pernah'),
(164, 86, '1-2x sehari'),
(165, 86, '1-2x seminggu'),
(166, 86, '1x sebulan'),
(167, 86, '1-3x setahun'),
(168, 86, 'Tidak pernah'),
(169, 87, '1-2x sehari'),
(170, 87, '1-2x seminggu'),
(171, 87, '1x sebulan'),
(172, 87, '1-3x setahun'),
(173, 87, 'Tidak pernah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_response`
--

CREATE TABLE `tb_response` (
  `responseID` varchar(5) NOT NULL,
  `formCode` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_response`
--

INSERT INTO `tb_response` (`responseID`, `formCode`, `status`, `createdDate`) VALUES
('0', '0', 0, '2019-03-10 21:20:57'),
('wv47S', 'gTyluecT6G', 0, '2019-03-10 20:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_section`
--

CREATE TABLE `tb_section` (
  `sectionID` int(11) NOT NULL,
  `formCode` varchar(15) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_section`
--

INSERT INTO `tb_section` (`sectionID`, `formCode`, `title`, `description`) VALUES
(1, 'gTyluecT6G', 'Bagian 1: Informasi Umum', ''),
(2, 'gTyluecT6G', 'Bagian Dua: Digital Vision', 'Keterangan:<br>\n1 = Sangat Tidak Setuju<br>\n2 = Tidak Setuju<br>\n3 = Tidak Tahu/Ragu-ragu<br>\n4 = Setuju<br>\n5 = Sangat Setuju<br>'),
(3, 'gTyluecT6G', 'Bagian Tiga: Digital Engagement', 'Keterangan:<br> 1 = Sangat Tidak Setuju<br> 2 = Tidak Setuju<br> 3 = Tidak Tahu/Ragu-ragu<br> 4 = Setuju<br> 5 = Sangat Setuju<br>'),
(4, 'gTyluecT6G', 'Bagian Empat: Digital Governance', 'Keterangan:<br> 1 = Sangat Tidak Setuju<br> 2 = Tidak Setuju<br> 3 = Tidak Tahu/Ragu-ragu<br> 4 = Setuju<br> 5 = Sangat Setuju<br>'),
(5, 'gTyluecT6G', 'Bagian Lima: Technology Leadership', 'Keterangan:<br> 1 = Sangat Tidak Setuju<br> 2 = Tidak Setuju<br> 3 = Tidak Tahu/Ragu-ragu<br> 4 = Setuju<br> 5 = Sangat Setuju<br>'),
(6, 'gTyluecT6G', 'Bagian Enam: Digital Capability', 'Kemukakanlah persepsi Anda mengenai penggunaan Teknologi dan Aplikasi Digital dalam Perusahaan Anda saat ini melalui pernyataan di bawah ini.'),
(7, 'gTyluecT6G', 'Bagian Tujuh: Digital Propensity', 'Seberapa sering ANDA..'),
(8, 'gTyluecT6G', 'Bagian Delapan : Digital Attitude', 'Keterangan:<br> 1 = Sangat Tidak Setuju<br> 2 = Tidak Setuju<br> 3 = Tidak Tahu/Ragu-ragu<br> 4 = Setuju<br> 5 = Sangat Setuju<br>'),
(9, 'gTyluecT6G', 'Bagian Sembilan: Digital Innovativeness', 'Keterangan:<br> 1 = Sangat Tidak Setuju<br> 2 = Tidak Setuju<br> 3 = Tidak Tahu/Ragu-ragu<br> 4 = Setuju<br> 5 = Sangat Setuju<br>'),
(10, 'gTyluecT6G', 'Bagian Sepuluh: Digital Literacy & Digital Efficacy', 'Keterangan:<br> 1 = Sangat Tidak Setuju<br> 2 = Tidak Setuju<br> 3 = Tidak Tahu/Ragu-ragu<br> 4 = Setuju<br> 5 = Sangat Setuju<br>'),
(11, 'gTyluecT6G', 'Bagian Sebelas: Action Readiness', 'Keterangan:<br> 1 = Sangat Tidak Setuju<br> 2 = Tidak Setuju<br> 3 = Tidak Tahu/Ragu-ragu<br> 4 = Setuju<br> 5 = Sangat Setuju<br>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`userID`, `username`, `password`, `role`, `createdDate`) VALUES
(1, 'user', '6ad14ba9986e3615423dfca256d04e3f', 2, '2019-03-09 00:00:00'),
(2, 'admin', '0192023a7bbd73250516f069df18b500', 1, '2019-03-09 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_answer`
--
ALTER TABLE `tb_answer`
  ADD PRIMARY KEY (`answerID`);

--
-- Indexes for table `tb_answer_temp`
--
ALTER TABLE `tb_answer_temp`
  ADD PRIMARY KEY (`answerID`);

--
-- Indexes for table `tb_form`
--
ALTER TABLE `tb_form`
  ADD PRIMARY KEY (`formID`);

--
-- Indexes for table `tb_question`
--
ALTER TABLE `tb_question`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `tb_question_detail`
--
ALTER TABLE `tb_question_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_response`
--
ALTER TABLE `tb_response`
  ADD PRIMARY KEY (`responseID`);

--
-- Indexes for table `tb_section`
--
ALTER TABLE `tb_section`
  ADD PRIMARY KEY (`sectionID`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_answer`
--
ALTER TABLE `tb_answer`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_answer_temp`
--
ALTER TABLE `tb_answer_temp`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `tb_form`
--
ALTER TABLE `tb_form`
  MODIFY `formID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_question`
--
ALTER TABLE `tb_question`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `tb_question_detail`
--
ALTER TABLE `tb_question_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `tb_section`
--
ALTER TABLE `tb_section`
  MODIFY `sectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
