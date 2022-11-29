-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 09:21 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_image`
--

CREATE TABLE `about_image` (
  `id` int(11) NOT NULL,
  `image` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_image`
--

INSERT INTO `about_image` (`id`, `image`, `status`) VALUES
(7, '7.jpg', 1),
(8, '8.png', 0),
(9, '9.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `about_me`
--

CREATE TABLE `about_me` (
  `id` int(11) NOT NULL,
  `about_me` varchar(50) NOT NULL,
  `desp` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_me`
--

INSERT INTO `about_me` (`id`, `about_me`, `desp`, `status`) VALUES
(3, 'Ex sapiente ab ratio', 'Aut hic et dolore er', 0),
(4, 'Nobis odit eum deser', 'Dolorum ut deleniti ', 0),
(5, 'Aut quis officia ill', 'Iure eum sapiente an', 0),
(6, 'Nam duis est molesti', 'Labore sequi cupidat', 0),
(7, 'About Me', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum doloribus nulla dolorum nihil assumenda similique sunt. Culpa, temporibus ea? Ab laborum vitae inventore beatae impedit quasi quo quos i', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner_img`
--

CREATE TABLE `banner_img` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner_img`
--

INSERT INTO `banner_img` (`id`, `image`, `status`) VALUES
(8, '8.png', 0),
(10, '10.jpg', 0),
(11, '11.png', 0),
(16, '16.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner_text`
--

CREATE TABLE `banner_text` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `desp` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner_text`
--

INSERT INTO `banner_text` (`id`, `sub_title`, `title`, `desp`, `status`) VALUES
(4, 'Dolor et dolor incid', 'Vitae perspiciatis ', 'Ut consectetur omni', 0),
(5, 'Itaque illum ullam ', 'Duis consequatur qua', 'Culpa sit consectet', 0),
(7, 'Hey,', 'Abu Hasnat Nobin', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus amet voluptate', 1),
(8, 'Hey', 'sdfgsdg dgbva', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui culpa, tempora autem tenetur dicta ipsa laborum eius aspernatur! Error debitis id eum hic aliquam molestias distinctio necessitatibus quide', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `desp` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `desp`, `address`, `phone`, `email`, `status`) VALUES
(1, 'Mollitia quis libero', 'Quia sed voluptas es', '+1 (969) 891-2145', 'bagope@mailinator.com', 0),
(3, 'Anim iure non ut tot', 'Temporibus tempor ad', '+1 (502) 536-5716', 'dilelazup@mailinator.com', 0),
(4, 'Voluptas alias sint', 'Reiciendis molestiae', '+1 (169) 658-3659', 'sapanupy@mailinator.com', 0),
(5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti explicabo voluptatem voluptas ab accusantium distinctio incidunt sequi, quia quod provident commodi pariatur nemo veritatis aut! Maxi', 'Plot 43 (New), Ground Floor, Road No. 2A, Satmasjid Road, Dhaka 1209', '+1 (709) 576-3797', 'kekudyr@mailinator.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `percentage` int(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `year`, `title`, `percentage`, `status`) VALUES
(2, '1986', 'Suscipit est similiq', 61, 0),
(3, '2009', 'Eaque id sapiente qu', 90, 0),
(4, '1994', 'Est ipsum voluptate ', 91, 1),
(5, '2013', 'Aliquid itaque labor', 67, 1),
(7, '2008', 'Beatae perspiciatis', 38, 1),
(9, '1981', 'Quia dolore maiores ', 83, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fact`
--

CREATE TABLE `fact` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `count` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fact`
--

INSERT INTO `fact` (`id`, `icon`, `count`, `title`, `status`) VALUES
(1, 'fa-apple', '231', 'lorem ipsume dollers', 0),
(2, 'fa-facebook', '308', 'Esse rerum aliqua P', 0),
(4, 'fa-twitter', '427', 'Ut assumenda quia mo', 0),
(5, 'fa-instagram', '119', 'Dolorum quia volupta', 1),
(6, 'fa-pinterest', '689', 'hjd oauid dvc ve', 1),
(7, 'fa-linkedin', '270', 'sdfipasf piusefgb esgseg', 0),
(9, 'fas fa-camera', '765', 'opujashdcfij cv', 1),
(11, 'fas fa-cubes', '450', 'Laravel Framework', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(11) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `logo`, `status`) VALUES
(29, '29.png', 0),
(33, '33.png', 0),
(34, '34.png', 1),
(36, '36.png', 0),
(37, '37.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `status`) VALUES
(2, 'Wynne Valencia', 'rokybofuko@mailinator.com', 'Reprehenderit in rec', 1),
(3, 'Demetrius Clements', 'gopozyrez@mailinator.com', 'Ea eveniet amet pa', 0),
(4, 'Colton Britt', 'sejukekywi@mailinator.com', 'Delectus et laborio', 0),
(7, 'Bo Walters', 'calo@mailinator.com', 'Molestiae cupiditate', 1),
(8, 'Clarke Nixon', 'xifubiby@mailinator.com', 'Enim voluptatum labo', 1),
(10, 'Darryl Conner', 'bylowu@mailinator.com', 'Quis est iusto pari', 0),
(11, 'Abu Hasnat Nobin', 'tafsanmahmudnobin090@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, laborum. Assumenda laboriosam perferendis, perspiciatis illum impedit adipisci ipsam ut expedita voluptatum consequuntur dolores pariatur', 1),
(12, 'Jamil Talukdar', 'jamiltalukdar84@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, laborum. Assumenda laboriosam perferendis, perspiciatis illum impedit adipisci ipsam ut expedita voluptatum consequuntur.', 0),
(13, 'Hayley Trevino', 'xafav@mailinator.com', 'Et do est eum dolore', 0),
(14, 'Melinda Sykes', 'najucisuhi@mailinator.com', 'Ea voluptatum dolore', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `title`, `comment`, `image`) VALUES
(3, 'Steven Rojas', 'Fugiat dolore dolore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nisi velit quasi ullam repellat illum magnam, sapiente repudiandae cumque, aliquam laborum eveniet, itaque possimus quam temporibus dolor! Adipisci, ex minima!', '3.jpg'),
(4, 'Walter Charles', 'Maxime et accusamus ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nisi velit quasi ullam repellat illum magnam, sapiente repudiandae cumque, aliquam laborum eveniet, itaque possimus quam temporibus dolor! Adipisci, ex minima!', '4.jpg'),
(5, 'Vivien Hull', 'Iusto quasi est volu', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nisi velit quasi ullam repellat illum magnam, sapiente repudiandae cumque, aliquam laborum eveniet, itaque possimus quam temporibus dolor! Adipisci, ex minima!', '5.jpg'),
(6, 'Lewis Fletcher', 'Distinctio Enim lab', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nisi velit quasi ullam repellat illum magnam, sapiente repudiandae cumque, aliquam laborum eveniet, itaque possimus quam temporibus dolor! Adipisci, ex minima!', '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `desp` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `name`, `desp`, `status`) VALUES
(1, 'fab fa-edge', 'Microsoft Edge', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur, placeat soluta. Autem libero incidunt cumque deleniti, esse sit in expedita unde assumenda ratione quaerat minima, maiores, itaqu', 1),
(2, 'fab fa-apple', 'Apple', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur, placeat soluta. Autem libero incidunt cumque deleniti, esse sit in expedita unde assumenda ratione quaerat minima, maiores, itaqu', 0),
(3, 'fab fa-paypal', 'Paypal', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur, placeat soluta. Autem libero incidunt cumque deleniti, esse sit in expedita unde assumenda ratione quaerat minima, maiores, itaqu', 1),
(4, 'fab fa-git', 'Git hub', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur, placeat soluta. Autem libero incidunt cumque deleniti, esse sit in expedita unde assumenda ratione quaerat minima, maiores, itaqu', 1),
(5, 'fas fa-database', 'Database', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur, placeat soluta. Autem libero incidunt cumque deleniti, esse sit in expedita unde assumenda ratione quaerat minima, maiores, itaqu', 1),
(6, 'fab fa-facebook-square', 'Facebook', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur, placeat soluta. Autem libero incidunt cumque deleniti, esse sit in expedita unde assumenda ratione quaerat minima, maiores, itaqu', 0),
(7, 'fas fa-rss', 'Wifi', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur, placeat soluta. Autem libero incidunt cumque deleniti, esse sit in expedita unde assumenda ratione quaerat minima, maiores, itaqu', 1),
(10, 'fab fa-apple', 'Apple', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur, placeat soluta. Autem libero incidunt cumque deleniti, esse sit in expedita unde assumenda ratione quaerat minima, maiores, itaqu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `icon`, `link`, `status`) VALUES
(7, 'fa-facebook', 'https://www.facebook.com/', 1),
(8, 'fa-twitter', 'https://twitter.com/', 1),
(9, 'fa-linkedin', 'https://www.linkedin.com/', 1),
(10, 'fa-youtube-play', 'https://www.youtube.com/', 0),
(13, 'fa-apple', 'https://www.apple.com/', 1),
(14, 'fa-instagram', 'https://www.instagram.com/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sponsers`
--

CREATE TABLE `sponsers` (
  `id` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsers`
--

INSERT INTO `sponsers` (`id`, `image`) VALUES
(2, '2.png'),
(3, '3.png'),
(4, '4.png'),
(6, '6.png'),
(7, '7.png'),
(12, '12.jpg'),
(13, '13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`) VALUES
(34, 'Bryar Glass', 'cadyvezu@mailinator.com', '$2y$10$GbAFBB7uPdImQp5QtTu2eeenDo43uXKVmUeFRiwlR1Aq5uLtlNuV6', '34.jpg'),
(35, 'Britanney Atkins', 'jakadyke@mailinator.com', '$2y$10$LsxrVVFufV8U/LuOPIJ2BuxBb7iVDcW7HhUtwNWFFHUEyPSWVp8La', '35.jpg'),
(36, 'Abu Hasnat Nobin', 'nobin@gmail.com', '$2y$10$/rGTJkg8D4Qvpftvzv8EfecyboMQUcrkG8GEVCZzDmm3H81QVC2j2', '36.jpg'),
(37, 'Jordan Washington', 'bisahu@mailinator.com', '$2y$10$ht1T648ueDCgZSGI83CRQet2CWGlPaP5vn0l1QVlpeywRC8Khay3i', '37.jpg'),
(38, 'Brent Kerr', 'zade@mailinator.com', '$2y$10$ZhxF2X0/m8vocbXi60La0.FcRTK3RBsAMLPoAiTA3MxbI/4ZqlqXC', '38.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `desp` varchar(500) NOT NULL,
  `image` varchar(30) NOT NULL,
  `author_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `category`, `sub_title`, `title`, `desp`, `image`, `author_id`) VALUES
(16, 'Soda', 'Pumpking Mead Wine', 'How To Make Pumpking Mead Wine', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non voluptas et, unde blanditiis, officiis exercitationem aperiam quisquam commodi aut ducimus velit veniam, quos illum minima similique deserunt? Accusamus, sed sequi! Quidem, consequatur voluptas. Itaque assumenda deleniti necessitatibus dolorum nihil beatae id, voluptatum laboriosam obcaecati ab cupiditate eum mollitia odio esse, distinctio modi quos rerum deserunt molestiae veritatis aut voluptatibus repudiandae libero! Labore praesent', '16.jpg', 36),
(17, 'Tea', 'Masala Tea', 'How To Make  Masala Tea', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non voluptas et, unde blanditiis, officiis exercitationem aperiam quisquam commodi aut ducimus velit veniam, quos illum minima similique deserunt? Accusamus, sed sequi! Quidem, consequatur voluptas. Itaque assumenda deleniti necessitatibus dolorum nihil beatae id, voluptatum laboriosam obcaecati ab cupiditate eum mollitia odio esse, distinctio modi quos rerum deserunt molestiae veritatis aut voluptatibus repudiandae libero! Labore praesent', '17.jpg', 34),
(18, 'Oil', 'Olive Oil', 'Benifits of Olive Oil', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non voluptas et, unde blanditiis, officiis exercitationem aperiam quisquam commodi aut ducimus velit veniam, quos illum minima similique deserunt? Accusamus, sed sequi! Quidem, consequatur voluptas. Itaque assumenda deleniti necessitatibus dolorum nihil beatae id, voluptatum laboriosam obcaecati ab cupiditate eum mollitia odio esse, distinctio modi quos rerum deserunt molestiae veritatis aut voluptatibus repudiandae libero! Labore praesent', '18.jpg', 36),
(19, 'Food', 'Pizza Burg', 'How to Make A Pizza', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non voluptas et, unde blanditiis, officiis exercitationem aperiam quisquam commodi aut ducimus velit veniam, quos illum minima similique deserunt? Accusamus, sed sequi! Quidem, consequatur voluptas. Itaque assumenda deleniti necessitatibus dolorum nihil beatae id, voluptatum laboriosam obcaecati ab cupiditate eum mollitia odio esse, distinctio modi quos rerum deserunt molestiae veritatis aut voluptatibus repudiandae libero! Labore praesent', '19.jpg', 38),
(20, 'Car', 'BMW x6 SUV', '2020 BMW x6 luxury SUV Unvield', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non voluptas et, unde blanditiis, officiis exercitationem aperiam quisquam commodi aut ducimus velit veniam, quos illum minima similique deserunt? Accusamus, sed sequi! Quidem, consequatur voluptas. Itaque assumenda deleniti necessitatibus dolorum nihil beatae id, voluptatum laboriosam obcaecati ab cupiditate eum mollitia odio esse, distinctio modi quos rerum deserunt molestiae veritatis aut voluptatibus repudiandae libero! Labore praesent', '20.jpg', 37),
(21, 'Photography', 'portrait photography', 'portrait photography Online class', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non voluptas et, unde blanditiis, officiis exercitationem aperiam quisquam commodi aut ducimus velit veniam, quos illum minima similique deserunt? Accusamus, sed sequi! Quidem, consequatur voluptas. Itaque assumenda deleniti necessitatibus dolorum nihil beatae id, voluptatum laboriosam obcaecati ab cupiditate eum mollitia odio esse, distinctio modi quos rerum deserunt molestiae veritatis aut voluptatibus repudiandae libero! Labore praesent', '21.jpg', 36);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_image`
--
ALTER TABLE `about_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_img`
--
ALTER TABLE `banner_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_text`
--
ALTER TABLE `banner_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fact`
--
ALTER TABLE `fact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsers`
--
ALTER TABLE `sponsers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_image`
--
ALTER TABLE `about_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `banner_img`
--
ALTER TABLE `banner_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `banner_text`
--
ALTER TABLE `banner_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fact`
--
ALTER TABLE `fact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sponsers`
--
ALTER TABLE `sponsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
