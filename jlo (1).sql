-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 06:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jlo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'admin123', '2023-02-06 11:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(20) NOT NULL,
  `blog_name` varchar(200) NOT NULL,
  `slug` text NOT NULL,
  `blog_cover_image` text NOT NULL,
  `blog_code` varchar(200) NOT NULL,
  `blog_category_name` varchar(200) NOT NULL,
  `blog_category_code` varchar(200) NOT NULL,
  `blog_description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_name`, `slug`, `blog_cover_image`, `blog_code`, `blog_category_name`, `blog_category_code`, `blog_description`, `status`, `created_at`) VALUES
(4, 'larem Ipsum', 'larem-Ipsum', 'contact-bn.png', 'BLOGwpWxOmRMNYFJ', 'Family Law', 'BLOGCAT1CHcQr9jt5BA', '<p><span font-size:=\"\" open=\"\" style=\"color: rgb(21, 21, 21); font-family: \">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias hic animi eaque exercitationem illum facere voluptas reiciendis ad? Incidunt debitis delectus vitae sit quis enim magnam nobis saepe odit beatae odio dolores maxime voluptate nesciunt molestiae expedita quisquam, nulla id perferendis laborum hic porro. Aperiam debitis expedita similique aliquid sint?</span><br font-size:=\"\" open=\"\" style=\"box-sizing: border-box; color: rgb(21, 21, 21); font-family: \" />\r\n<br font-size:=\"\" open=\"\" style=\"box-sizing: border-box; color: rgb(21, 21, 21); font-family: \" />\r\n<span font-size:=\"\" open=\"\" style=\"color: rgb(21, 21, 21); font-family: \">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, placeat sed, quam vel pariatur praesentium aspernatur eum animi tempora quo ipsam odio impedit voluptatem itaque ea at exercitationem voluptatibus explicabo eos? Voluptas atque ad corrupti dicta minima possimus commodi reiciendis similique voluptatem molestias ducimus ut unde ea explicabo, enim dolores?</span></p>\r\n', 1, '2023-02-24 15:40:06'),
(5, 'Lorem Ipsum', 'Lorem-Ipsum', 'about-bn1.png', 'BLOGhbs5w3NXpLlI', 'Arbitration Law', 'BLOGCATW6wcgrK8SVsO', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias hic animi eaque exercitationem illum facere voluptas reiciendis ad? Incidunt debitis delectus vitae sit quis enim magnam nobis saepe odit beatae odio dolores maxime voluptate nesciunt molestiae expedita quisquam, nulla id perferendis laborum hic porro. Aperiam debitis expedita similique aliquid sint?</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, placeat sed, quam vel pariatur praesentium aspernatur eum animi tempora quo ipsam odio impedit voluptatem itaque ea at exercitationem voluptatibus explicabo eos? Voluptas atque ad corrupti dicta minima possimus commodi reiciendis similique voluptatem molestias ducimus ut unde ea explicabo, enim dolores?</p>\r\n', 1, '2023-02-24 15:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(20) NOT NULL,
  `blog_categ` varchar(200) NOT NULL,
  `blog_categ_code` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `blog_categ`, `blog_categ_code`, `image`, `created_at`) VALUES
(1, 'Family Law', 'BLOGCAT1CHcQr9jt5BA', '1.png', '2023-02-24 09:31:57'),
(5, 'Arbitration Law', 'BLOGCATW6wcgrK8SVsO', 'slider2.jpg', '2023-02-24 17:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_about_us`
--

CREATE TABLE `cms_about_us` (
  `id` int(11) NOT NULL,
  `cover_image` text NOT NULL,
  `heading` text NOT NULL,
  `content` text NOT NULL,
  `about_us_content_seq` varchar(255) NOT NULL,
  `table_content_type` text NOT NULL,
  `row_type` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_about_us`
--

INSERT INTO `cms_about_us` (`id`, `cover_image`, `heading`, `content`, `about_us_content_seq`, `table_content_type`, `row_type`, `created_at`) VALUES
(6, '', 'ABOUT JUS LAW OFFICES', '<p style=\"box-sizing: border-box; margin: 20px 0px 0px; color: rgb(21, 21, 21); font-family: &quot;Open Sauce&quot;, sans-serif, Arial, sans-serif; font-size: 14px; text-align: justify;\">Jus Law Offices is an ultramodern full legal service firm based in New Delhi, India. Associates of the firm are organized in accordance with the principles of team management so as to ensure and render composite and integrated professional service. The firm has alliances with associate lawyers in various states of India. This network of alliances gives the benefit to the clients of a single window service provider, to deal with all kind of matters across the country under one umbrella.</p>\r\n\r\n<p style=\"box-sizing: border-box; margin: 20px 0px 0px; color: rgb(21, 21, 21); font-family: &quot;Open Sauce&quot;, sans-serif, Arial, sans-serif; font-size: 14px; text-align: justify;\">We at Jus Law Offices put the quality of service that we offer our clients above all else. We know that, what is important to our clients and that knowledge and execution is what sets us apart from our competition. Our clients acknowledge and recognize Jus Law Offices for the professionalism and commercial perspective that we bring to transactions, our strong commercial acumen, our ability to manage transactions in an efficient and cost effective manner and our ability to address and resolve demanding transactional and legal issues. The firm&#39;s expertise coupled with effective, timely and practical solutions are the factors which are predominant in choosing the firm by the clients.</p>\r\n\r\n<p style=\"box-sizing: border-box; margin: 20px 0px 0px; color: rgb(21, 21, 21); font-family: &quot;Open Sauce&quot;, sans-serif, Arial, sans-serif; font-size: 14px; text-align: justify;\">The firm represents a law number of business houses across the country, banking &amp; financial institutions, Multinational Corporation and State and Central Government Authorities, NGOs as well as individuals.</p>\r\n\r\n<p style=\"box-sizing: border-box; margin: 20px 0px 0px; color: rgb(21, 21, 21); font-family: &quot;Open Sauce&quot;, sans-serif, Arial, sans-serif; font-size: 14px; text-align: justify;\">Jus Law Offices provide services diligently and with the highest level of professional integrity and we also ensure that our clients are satisfied with our services by treating them in a proper, fair, impartial and courteous manner; aiming, where possible to meet any exceptional needs for our clients; enhance speed, quality of our services, accuracy, efficiency and flexibility in provision of our services to our clients.</p>\r\n', 'Primary', '', 'Content', '2023-02-25 04:13:15'),
(22, 'about1.jpg', 'About us', '', '', '', 'Cover', '2023-02-25 03:44:46'),
(25, 'vision.jpg', 'Our Vission', '<p><span style=\"color: rgb(33, 37, 41); font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">Lorem ipsum dolor sit amet. Sit eveniet voluptatum et omnis maiores et accusantium itaque qui minima sequi 33 laboriosam omnis sed voluptatum adipisci est odit quam. Sit fuga sequi aut quis doloremque et fuga ratione qui internos doloremque aut illum autem.&nbsp;Hic eius impedit qui iusto sequi vel nisi ipsam aut repellat necessitatibus?&nbsp;</span></p>\r\n', 'Secondary', '', 'Content', '2023-02-25 04:17:46'),
(26, 'mission.jpg', 'Our Mission', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">Lorem ipsum dolor sit amet. Sit eveniet voluptatum et omnis maiores et accusantium itaque qui minima sequi 33 laboriosam omnis sed voluptatum adipisci est odit quam. Sit fuga sequi aut quis doloremque et fuga ratione qui internos doloremque aut illum autem. Hic eius impedit qui iusto sequi vel nisi ipsam aut repellat necessitatibus?&nbsp;</p>\r\n', 'Secondary', '', 'Content', '2023-02-25 04:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `cms_best_selling`
--

CREATE TABLE `cms_best_selling` (
  `id` int(20) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_best_selling`
--

INSERT INTO `cms_best_selling` (`id`, `product_name`, `product_code`, `created_at`) VALUES
(3, 'teddy', '#vino12ESRjBGX9W', '2023-02-09 13:01:19'),
(5, 'Dairy Milk', '#vinLc2jgbWDdVK8', '2023-02-10 11:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `cms_career`
--

CREATE TABLE `cms_career` (
  `id` int(11) NOT NULL,
  `cover_image` text NOT NULL,
  `heading` text NOT NULL,
  `content` text NOT NULL,
  `row_type` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_career`
--

INSERT INTO `cms_career` (`id`, `cover_image`, `heading`, `content`, `row_type`, `created_at`) VALUES
(6, '', 'ABOUT JUS LAW OFFICES', '<p style=\"box-sizing: border-box; margin: 20px 0px 0px; color: rgb(21, 21, 21); font-family: &quot;Open Sauce&quot;, sans-serif, Arial, sans-serif; font-size: 14px; text-align: justify;\">Jus Law Offices is an ultramodern full legal service firm based in New Delhi, India. Associates of the firm are organized in accordance with the principles of team management so as to ensure and render composite and integrated professional service. The firm has alliances with associate lawyers in various states of India. This network of alliances gives the benefit to the clients of a single window service provider, to deal with all kind of matters across the country under one umbrella.</p>\r\n\r\n<p style=\"box-sizing: border-box; margin: 20px 0px 0px; color: rgb(21, 21, 21); font-family: &quot;Open Sauce&quot;, sans-serif, Arial, sans-serif; font-size: 14px; text-align: justify;\">We at Jus Law Offices put the quality of service that we offer our clients above all else. We know that, what is important to our clients and that knowledge and execution is what sets us apart from our competition. Our clients acknowledge and recognize Jus Law Offices for the professionalism and commercial perspective that we bring to transactions, our strong commercial acumen, our ability to manage transactions in an efficient and cost effective manner and our ability to address and resolve demanding transactional and legal issues. The firm&#39;s expertise coupled with effective, timely and practical solutions are the factors which are predominant in choosing the firm by the clients.</p>\r\n\r\n<p style=\"box-sizing: border-box; margin: 20px 0px 0px; color: rgb(21, 21, 21); font-family: &quot;Open Sauce&quot;, sans-serif, Arial, sans-serif; font-size: 14px; text-align: justify;\">The firm represents a law number of business houses across the country, banking &amp; financial institutions, Multinational Corporation and State and Central Government Authorities, NGOs as well as individuals.</p>\r\n\r\n<p style=\"box-sizing: border-box; margin: 20px 0px 0px; color: rgb(21, 21, 21); font-family: &quot;Open Sauce&quot;, sans-serif, Arial, sans-serif; font-size: 14px; text-align: justify;\">Jus Law Offices provide services diligently and with the highest level of professional integrity and we also ensure that our clients are satisfied with our services by treating them in a proper, fair, impartial and courteous manner; aiming, where possible to meet any exceptional needs for our clients; enhance speed, quality of our services, accuracy, efficiency and flexibility in provision of our services to our clients.</p>\r\n', 'Content', '2023-02-25 04:13:15'),
(22, 'about1.jpg', 'About us', '', 'Cover', '2023-02-25 03:44:46'),
(25, 'vision.jpg', 'Our Vission', '<p><span style=\"color: rgb(33, 37, 41); font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">Lorem ipsum dolor sit amet. Sit eveniet voluptatum et omnis maiores et accusantium itaque qui minima sequi 33 laboriosam omnis sed voluptatum adipisci est odit quam. Sit fuga sequi aut quis doloremque et fuga ratione qui internos doloremque aut illum autem.&nbsp;Hic eius impedit qui iusto sequi vel nisi ipsam aut repellat necessitatibus?&nbsp;</span></p>\r\n', 'Content', '2023-02-25 04:17:46'),
(26, 'mission.jpg', 'Our Mission', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(33, 37, 41); font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">Lorem ipsum dolor sit amet. Sit eveniet voluptatum et omnis maiores et accusantium itaque qui minima sequi 33 laboriosam omnis sed voluptatum adipisci est odit quam. Sit fuga sequi aut quis doloremque et fuga ratione qui internos doloremque aut illum autem. Hic eius impedit qui iusto sequi vel nisi ipsam aut repellat necessitatibus?&nbsp;</p>\r\n', 'Content', '2023-02-25 04:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `cms_contact_us`
--

CREATE TABLE `cms_contact_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `row_type` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_contact_us`
--

INSERT INTO `cms_contact_us` (`id`, `title`, `content`, `row_type`, `created_at`) VALUES
(13, 'Mobile_no', '9811267045', 'Mobile', '2023-02-25 04:39:48'),
(14, 'Mobile_no', '011-47504672', 'Mobile', '2023-02-25 04:40:06'),
(15, 'Email', 'info@juslawoffices.com', 'Email', '2023-02-25 04:40:27'),
(16, 'Delhi', 'KD-113, Near Kohat Enclave Metro Station, Pitampura, Delhi-110034', 'Address', '2023-02-25 04:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `cms_logo`
--

CREATE TABLE `cms_logo` (
  `id` int(11) NOT NULL,
  `logo` text NOT NULL,
  `image_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_logo`
--

INSERT INTO `cms_logo` (`id`, `logo`, `image_type`, `created_at`) VALUES
(3, 'jlo-logo.png', 'Site Logo', '2023-02-25 06:06:31'),
(4, 'fav-icon.png', 'Favicon', '2023-02-25 06:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `cms_our_client`
--

CREATE TABLE `cms_our_client` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_logo` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_our_client`
--

INSERT INTO `cms_our_client` (`id`, `client_name`, `client_logo`, `created_at`) VALUES
(10, '1', '1.png', '2023-02-25 03:14:34'),
(11, '2', '2.png', '2023-02-25 03:14:46'),
(12, '3', '3.png', '2023-02-25 03:14:58'),
(13, '4', '4.png', '2023-02-25 03:15:08'),
(14, '5', '5.png', '2023-02-25 03:15:26'),
(15, '6', '6.png', '2023-02-25 03:15:36'),
(16, '7', '7.png', '2023-02-25 03:15:51'),
(17, '8', '8.png', '2023-02-25 03:16:02'),
(18, '9', '9.png', '2023-02-25 03:16:11'),
(19, '10', '10.png', '2023-02-25 03:16:21'),
(20, '11', '11.png', '2023-02-25 03:16:30'),
(21, '12', '12.png', '2023-02-25 03:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `cms_slider_banner`
--

CREATE TABLE `cms_slider_banner` (
  `id` int(11) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `banner_title_small` text NOT NULL,
  `banner_title_main` text NOT NULL,
  `redirect_link` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_slider_banner`
--

INSERT INTO `cms_slider_banner` (`id`, `banner`, `banner_title_small`, `banner_title_main`, `redirect_link`, `created_at`) VALUES
(2, 'slider-bg-5.jpg', 'Lorem', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. ', 'http://localhost/www/Tech%20Binge/JLO_Site/index.php', '2023-02-24 08:13:44'),
(3, 'slider-bg-4.jpg', 'Lorem', 'Fuga provident laborum?', 'http://localhost/www/Tech%20Binge/JLO_Site/index.php', '2023-02-24 08:14:06'),
(4, 'slider1.jpg', 'Lorem', 'Lorem Ipsum is simply dummy text', 'http://localhost/www/Tech%20Binge/JLO_Site/index.php', '2023-02-24 08:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `cms_social_media_links`
--

CREATE TABLE `cms_social_media_links` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `social_media_link` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_social_media_links`
--

INSERT INTO `cms_social_media_links` (`id`, `icon`, `social_media_link`, `created_at`) VALUES
(1, 'facebook', ' http://localhost/www/Tech%20Binge/JLO_Site/about.php', '2023-02-25 07:16:06'),
(3, 'instagram', ' http://localhost/www/Tech%20Binge/JLO_Site/about.php', '2023-02-25 07:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `cms_testimonials`
--

CREATE TABLE `cms_testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_testimonials`
--

INSERT INTO `cms_testimonials` (`id`, `name`, `feedback`, `image`, `created_at`) VALUES
(4, 'user 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga veniam esse soluta? Ducimus inventore modi minima alias quas asperiores consequuntur quis nostrum, vel ut, velit ipsa error reprehenderit, mollitia architecto?\r\n', 'test-1.jpg', '2023-02-24 17:37:15'),
(6, 'User 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga veniam esse soluta? Ducimus inventore modi minima alias quas asperiores consequuntur quis nostrum, vel ut, velit ipsa error reprehenderit, mollitia architecto?', 'test-2.jpg', '2023-02-24 17:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `image_type` varchar(200) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `image_type`, `product_code`, `created_at`) VALUES
(2, 'shoe-laces1.jpg', 'Thumb', '#vinLc2jgbWDdVK8', '2023-02-09 10:53:34'),
(3, 'shoe-laces3.jpg', 'Thumb', '#vinLc2jgbWDdVK8', '2023-02-09 10:53:34'),
(5, 'shoe-laces.jpg', 'Main', '#vinLc2jgbWDdVK8', '2023-02-09 12:24:20'),
(6, 'shoe-laces4.jpg', 'Thumb', '#vinLc2jgbWDdVK8', '2023-02-09 12:24:38'),
(16, 'product-1.jpg', 'Main', '#vino12ESRjBGX9W', '2023-02-09 12:51:48'),
(17, 'product-2.jpg', 'Thumb', '#vino12ESRjBGX9W', '2023-02-09 12:51:48'),
(18, 'product-3.jpg', 'Thumb', '#vino12ESRjBGX9W', '2023-02-09 12:51:48'),
(19, 'product-4.jpg', 'Thumb', '#vino12ESRjBGX9W', '2023-02-09 12:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `quiries`
--

CREATE TABLE `quiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` bigint(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiries`
--

INSERT INTO `quiries` (`id`, `name`, `mobile`, `email`, `message`, `created_at`) VALUES
(1, 'sunil kumar', 9560858330, 'test@gmail.com', 'testing', '2023-02-25 05:03:32'),
(2, 'sunil kumar', 9560858330, 'suneelkumarskm8@gmail.com', 'Testing', '2023-02-25 05:03:56'),
(3, 'eajfbb', 823402304023, 'skbfkb@gmail.com', 'Testing', '2023-02-25 05:06:11'),
(4, 'sunil kumar ', 9560858330, 'suneelkumarskm8@gmail.com', 'Testing', '2023-02-25 05:07:08'),
(5, '', 0, '', '', '2023-02-25 05:07:11'),
(6, 'sunil kumar ', 9560858330, 'pva224@yahoo.com', 'Testing', '2023-02-25 05:23:31'),
(7, 'sunil kumar ', 9560858330, 'pva224@yahoo.com', 'Testaldbcbfalbs', '2023-02-25 05:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `desg` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` text NOT NULL,
  `linkedin` text NOT NULL,
  `linkedin_link` text NOT NULL,
  `about` text NOT NULL,
  `profile` text NOT NULL,
  `experience` text NOT NULL,
  `qualification` text NOT NULL,
  `main_image` text NOT NULL,
  `thumb_image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `member_name`, `slug`, `desg`, `mobile`, `email`, `linkedin`, `linkedin_link`, `about`, `profile`, `experience`, `qualification`, `main_image`, `thumb_image`, `created_at`) VALUES
(1, 'Divya Gattani', 'Divya-Gattani', 'Managing Partner', 9560858330, 'pva224@yahoo.com', 'Testing', 'testing link      ', 'About member            ', '      Profile      ', '      Experience            ', '      Qualification      ', 'ser.jpg', '1-team.jpg', '2023-02-25 14:37:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_about_us`
--
ALTER TABLE `cms_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_best_selling`
--
ALTER TABLE `cms_best_selling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_career`
--
ALTER TABLE `cms_career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_contact_us`
--
ALTER TABLE `cms_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_logo`
--
ALTER TABLE `cms_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_our_client`
--
ALTER TABLE `cms_our_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_slider_banner`
--
ALTER TABLE `cms_slider_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_social_media_links`
--
ALTER TABLE `cms_social_media_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_testimonials`
--
ALTER TABLE `cms_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiries`
--
ALTER TABLE `quiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cms_about_us`
--
ALTER TABLE `cms_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cms_best_selling`
--
ALTER TABLE `cms_best_selling`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cms_career`
--
ALTER TABLE `cms_career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cms_contact_us`
--
ALTER TABLE `cms_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cms_logo`
--
ALTER TABLE `cms_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_our_client`
--
ALTER TABLE `cms_our_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cms_slider_banner`
--
ALTER TABLE `cms_slider_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_social_media_links`
--
ALTER TABLE `cms_social_media_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_testimonials`
--
ALTER TABLE `cms_testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `quiries`
--
ALTER TABLE `quiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
