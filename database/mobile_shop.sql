-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 11:43 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `contact` int(9) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `contact`, `email`) VALUES
(1, 'Guest', '', 0, ''),
(2, 'Indunil Dissanayaka', 'matale', 771234567, 'indunil@gmail.com'),
(3, 'Sandamali ', 'Hanwella', 712589574, 'sri123Sanda@gmail.com'),
(4, 'Rashini Amanda', 'Bentara', 778956234, 'Rashiniamd@gmail.com'),
(5, 'Rashmika', 'Kaduwela', 773697894, 'rashmi191@gmail.com'),
(6, 'Imashi Liyanage', 'Egodamulla, Ahungalla', 771234567, 'imashi@gmail.com'),
(7, 'Sachini Yureaka', 'Bentara', 778693641, 'test@gmail.com'),
(8, 'Imashi Liyanage', 'Egodamulla, Ahungalla', 77589785, 'imashi@gmail.com'),
(9, 'Imashi Liyanage', 'Egodamulla, Ahungalla', 778945617, 'imashi@gmail.com'),
(10, 'Dimashi Liyanage', 'Hikkaduwa', 771234458, 'dimashi123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_items`
--

CREATE TABLE `dashboard_items` (
  `item_id` int(11) NOT NULL,
  `item` varchar(250) NOT NULL,
  `min_price` double(10,2) NOT NULL,
  `max_price` double(10,2) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `stock_status` varchar(50) NOT NULL DEFAULT 'instock'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard_items`
--

INSERT INTO `dashboard_items` (`item_id`, `item`, `min_price`, `max_price`, `stock_qty`, `stock_status`) VALUES
(1, 'AAA', 1250.00, 1300.00, 250, 'instock');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `credit_period` varchar(100) NOT NULL,
  `customer` varchar(250) NOT NULL,
  `billing_address` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `cheque_dueDate` varchar(100) NOT NULL,
  `card_type` varchar(50) NOT NULL,
  `card_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `total`, `discount`, `payment`, `credit_period`, `customer`, `billing_address`, `date`, `payment_type`, `bank`, `cheque_no`, `cheque_dueDate`, `card_type`, `card_no`) VALUES
(1, '1745.00', '5.00', '5000.00', '', '', '', '2021-05-09', '', '', '', '', '', ''),
(2, '1750.00', '0.00', '5000.00', '', '', '', '2021-05-09', '', '', '', '', '', ''),
(3, '1750.00', '0.00', '5000.00', '', '', '', '2021-05-09', '', '', '', '', '', ''),
(4, '1750.00', '0.00', '5000.00', '', '', '', '2021-05-09', '', '', '', '', '', ''),
(5, '1750.00', '0.00', '5000.00', '', '', '', '2021-05-09', '', '', '', '', '', ''),
(6, '1750.00', '0.00', '5000.00', '', '7', '', '2021-05-09', 'cash', '', '', '', '', ''),
(7, '1750.00', '0.00', '5000.00', '', '', '', '2021-05-09', '', '', '', '', '', ''),
(8, '1750.00', '0.00', '5000.00', '', '', '', '2021-05-09', '', '', '', '', '', ''),
(9, '1750.00', '0.00', '5000.00', '', '', '', '2021-05-09', '', '', '', '', '', ''),
(10, '1750.00', '0.00', '5000.00', '', '', '', '2021-05-09', '', '', '', '', '', ''),
(11, '5200.00', '50.00', '5300.00', '', '', '', '2021-05-11', '', '', '', '', '', ''),
(12, '1750.00', '0.00', '2000.00', '', '', '', '2021-05-17', '', '', '', '', '', ''),
(13, '3495.00', '5.00', '5000.00', '', '', '', '2021-05-18', '', '', '', '', '', ''),
(14, '1300.00', '0.00', '1500.00', '', '7', '', '2021-05-20', '', '', '', '', '', ''),
(15, '3500.00', '0.00', '500.00', '7', '1', 'Hasitha Senanayaka,\r\n778945689,\r\nNo1 , Galkaduwa\r\nNeboda', '2021-05-20', '', '', '', '', '', ''),
(16, '1750.00', '0.00', '1750.00', '0', '1', 'Mr.Sahan,\n774578963,\nBambalapitiya', '2021-05-21', 'cheque', 'commercial', 'CH0080', '2021-05-31', 'visa', ''),
(17, '1750.00', '0.00', '1750.00', '0', '4', '', '2021-05-21', 'card', '', '', '', 'visa', '8794568798'),
(18, '2600.00', '0.00', '2600.00', '0', '3', '', '2021-05-21', '', 'BOC', 'NV09764', '2021-05-30', 'visa', ''),
(19, '1300.00', '0.00', '1300.00', '0', '5', '', '2021-05-21', 'cheque', 'commercial', 'BN147852', '2021-05-22', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product` varchar(300) NOT NULL,
  `warranty` varchar(250) NOT NULL DEFAULT '0',
  `serial_no` varchar(250) NOT NULL DEFAULT '0',
  `qty` varchar(300) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice_id`, `product`, `warranty`, `serial_no`, `qty`, `price`, `amount`) VALUES
(1, 1, 'Dell WM126 Wireless Optical Mouse', '0', '0', '1', '1750.00', '1750.00'),
(2, 2, 'Dell WM126 Wireless Optical Mouse', '0', '0', '1', '1750.00', '1750.00'),
(3, 3, 'Dell WM126 Wireless Optical Mouse', '0', '0', '1', '1750.00', '1750.00'),
(4, 4, 'Dell WM126 Wireless Optical Mouse', '0', '0', '1', '1750.00', '1750.00'),
(5, 5, 'Dell WM126 Wireless Optical Mouse', '0', '0', '1', '1750.00', '1750.00'),
(6, 6, 'Dell WM126 Wireless Optical Mouse', '0', '0', '1', '1750.00', '1750.00'),
(7, 7, 'Dell WM126 Wireless Optical Mouse', '0', '0', '1', '1750.00', '1750.00'),
(8, 8, 'Dell WM126 Wireless Optical Mouse', '0', '0', '1', '1750.00', '1750.00'),
(9, 9, 'Dell WM126 Wireless Optical Mouse', '0', '0', '1', '1750.00', '1750.00'),
(10, 10, 'Dell WM126 Wireless Optical Mouse', '0', '0', '1', '1750.00', '1750.00'),
(11, 11, 'Dell WM126 Wireless Optical Mouse', '0', '0', '3', '1750.00', '5250.00'),
(12, 12, 'Dell WM126 Wireless Optical Mouse', '0', '0', '1', '1750.00', '1750.00'),
(13, 13, 'Dell WM126 Wireless Optical Mouse', '360', '342RR', '2', '1750.00', '3500.00'),
(14, 14, 'AAA', '2 yrs', '1234', '1', '1300.00', '1300.00'),
(15, 15, 'Dell WM126 Wireless Optical Mouse', '45', 'EEE34343', '2', '1750.00', '3500.00'),
(16, 16, 'Dell WM126 Wireless Optical Mouse', '6 months', 'Wm1234', '1', '1750.00', '1750.00'),
(17, 17, 'Dell WM126 Wireless Optical Mouse', '1 yr', 'Wm123', '1', '1750.00', '1750.00'),
(18, 18, 'AAA', '6months', 'WM45789', '2', '1300.00', '2600.00'),
(19, 19, 'AAA', '6 month', 'AA09890', '1', '1300.00', '1300.00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobId` int(11) NOT NULL,
  `jobNo` int(11) NOT NULL,
  `billing_address` varchar(250) NOT NULL,
  `accessory` text NOT NULL,
  `brand` text NOT NULL,
  `model` text NOT NULL,
  `serial_no` varchar(100) NOT NULL,
  `request_date` varchar(50) NOT NULL,
  `delivery_date` varchar(50) NOT NULL,
  `job_desc` varchar(500) NOT NULL,
  `advance` double(10,2) NOT NULL DEFAULT '0.00',
  `user_desc` varchar(500) NOT NULL,
  `status` enum('request','reject','technician','complete','dispatch','finish') NOT NULL,
  `progress` int(11) NOT NULL DEFAULT '0',
  `service_cost` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL DEFAULT '0.00',
  `gross_amount` double(10,2) NOT NULL,
  `payable_amt` double(10,2) NOT NULL,
  `cash_payment` double(10,2) NOT NULL DEFAULT '0.00',
  `credit_payment` double(10,2) NOT NULL DEFAULT '0.00',
  `customerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobId`, `jobNo`, `billing_address`, `accessory`, `brand`, `model`, `serial_no`, `request_date`, `delivery_date`, `job_desc`, `advance`, `user_desc`, `status`, `progress`, `service_cost`, `discount`, `gross_amount`, `payable_amt`, `cash_payment`, `credit_payment`, `customerId`) VALUES
(1, 20212, '', 'Huawei GR3 Phone', '', '', '', '2021-04-28', '2021-05-03', 'Need to repair', 0.00, 'cant operate', 'technician', 50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2),
(2, 20212, '', 'DELL I3 LAPTOP', '', '', '', '2021-04-01', '2021-04-30', 'Lorem ipsum', 0.00, 'aaaaaaa', 'technician', 100, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10),
(3, 20213, '', 'HP pavilion X360', 'HP', 'i3', '', '2021-04-17', '2021-05-01', 'xxxxxxxxxxxxxxxxxxxxxx', 0.00, 'sasa', 'dispatch', 100, 1200.00, 0.00, 4875.00, 4875.00, 4000.00, 875.00, 4),
(4, 20214, '', 'HP I5 LAPTOP', '', '', '', '2021-04-28', '2021-05-04', 'To change the battery', 0.00, '', 'reject', 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3),
(5, 20215, 'Ranathunga,\r\n777852741,\r\nKegalle', 'Laptop', 'HP', 'i5 7gen', '741', '2021-04-29', '2021-05-05', 'For repairing', 0.00, '', 'request', 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5),
(6, 20216, '', 'Laptop', 'HP', 'i5 7gen', '', '2021-05-03', '2021-05-06', 'qqqqqqqq', 0.00, 'aaa', 'complete', 100, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5),
(7, 20217, '', 'I5 LAPTOP', 'HP', 'i5 7gen', '', '2021-05-15', '2021-05-20', 'xxxxxx', 500.00, 'ok', 'finish', 100, 2100.00, 0.00, 2100.00, 1600.00, 2500.00, 0.00, 5),
(8, 20218, '', 'I5 LAPTOP', 'Lenovo', 'xxxx', '', '2021-05-17', '2021-05-20', 'xxxx', 0.00, 'Ok', 'dispatch', 100, 1800.00, 0.00, 1800.00, 1800.00, 2000.00, 0.00, 7),
(9, 20219, 'Mrs. Iresha Sandamali,\r\n779789696,\r\nNo:01,Galle rd,Kalutara', 'Mobile', 'HP', 'i5 7gen', '14785', '2021-05-21', '2021-05-23', 'xxx', 0.00, '', 'finish', 0, 2000.00, 0.00, 2000.00, 2000.00, 2200.00, 0.00, 1),
(10, 202110, 'Mr.Nimal Rathnayaka,\r\n778945612,\r\nMiriswatta,Gampaha', 'Mobile', 'Samsung', 'A20S', 'M332', '2021-05-21', '2021-05-24', 'xxxx', 200.00, 'ok', 'dispatch', 100, 1000.00, 0.00, 1000.00, 800.00, 800.00, 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int(11) NOT NULL,
  `jobID` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `parts` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `imei` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `jobID`, `qty`, `parts`, `price`, `imei`) VALUES
(1, 2, 1, 'Keyboard', 1800.00, 'A1234'),
(2, 1, 1, 'aaaa', 0.00, '1111'),
(3, 0, 0, 'aaaa', 0.00, '111'),
(4, 0, 1, 'aaaa', 123.00, 'a1122'),
(5, 0, 1, 'as', 123.00, '1122'),
(6, 3, 1, 'Touch pad', 3500.00, 'A123'),
(7, 3, 1, 'aaaaa', 175.00, 'S1234234');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `jobID` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `parts` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `imei` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_pos`
--

CREATE TABLE `temp_pos` (
  `id` int(11) NOT NULL,
  `product` varchar(500) NOT NULL,
  `warranty` varchar(250) NOT NULL DEFAULT '0',
  `serial_no` varchar(250) NOT NULL DEFAULT '0',
  `qty` varchar(500) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `user_role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Emma Watson', '4535367f2f39b5a2ebaee0092f184a79', 1),
(3, 'Pubudu 123', 'c0006afd13ecc89b914b10fb7c51b4fb', 2),
(4, 'Kaviska', '202cb962ac59075b964b07152d234b70', 2),
(5, 'Amaya', 'b6a9aa2d969ff39152525950a9bcc621', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Technician'),
(3, 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2019-07-29 03:42:45', '2019-07-29 03:42:45', '<!-- wp:paragraph -->\n<p>Aliquam ut tortor sed erat tempor egestas eget non augue. Suspendisse ultrices lacus ac risus molestie, vel tincidunt sapien scelerisque. Fusce id ipsum odio. Aliquam maximus purus ipsum, ac cursus velit ultricies a. Etiam posuere scelerisque tortor, et luctus libero laoreet a. Donec porttitor ex id augue facilisis, non tincidunt diam commodo. Suspendisse malesuada felis quis ante hendrerit, sed vehicula dui molestie. Sed in lacus eros. Ut et purus viverra, pretium nisl ultricies, bibendum metus. Nullam nec sagittis dui. Maecenas cursus efficitur est, eu consectetur sem bibendum in. Proin sit amet dui eu nisl molestie sollicitudin. Duis ullamcorper fringilla fringilla. Nunc augue ex, mollis nec nibh ac, accumsan consectetur dui. Maecenas ut justo lacus.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nunc ullamcorper sapien vel nibh aliquam auctor. Mauris vitae sapien mauris. Etiam non mauris justo. Donec quis viverra velit. Vestibulum efficitur, neque pretium semper vestibulum, ipsum dolor lobortis purus, nec dapibus sem augue et ex. Praesent malesuada nulla ligula, at molestie est mollis vitae. Nulla rutrum quam ut sollicitudin semper. Vestibulum feugiat condimentum ligula.</p>\n<!-- /wp:paragraph -->', 'Aliquam ut tortor sed erat tempor egestas eget non augue.', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2019-07-29 03:42:45', '2019-07-29 03:42:45', '', 0, 'https://demo.themefarmer.com/newstore/?p=1', 0, 'post', '', 1),
(2, 1, '2020-12-12 09:51:33', '2020-12-12 09:51:33', '<!-- wp:paragraph -->\n<p>This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin'' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href="https://shadcomputers.lk/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2020-12-12 09:51:33', '2020-12-12 09:51:33', '', 0, 'https://shadcomputers.lk/?page_id=2', 0, 'page', '', 0),
(7, 1, '2019-07-30 05:34:47', '2019-07-30 05:34:47', '[tfwc_tool_wishilst]', 'Wishlist', '', 'publish', 'closed', 'closed', '', 'wishlist-2', '', '', '2019-07-30 05:34:47', '2019-07-30 05:34:47', '', 0, 'https://demo.themefarmer.com/newstore/wishlist/', 0, 'page', '', 0),
(10, 1, '2019-07-30 05:36:30', '2019-07-30 05:36:30', '', 'Shop', '', 'publish', 'closed', 'closed', '', 'shop-2', '', '', '2019-07-30 05:36:30', '2019-07-30 05:36:30', '', 0, 'https://demo.themefarmer.com/newstore/shop/', 0, 'page', '', 0),
(11, 1, '2019-07-30 05:36:30', '2019-07-30 05:36:30', '<!-- wp:shortcode -->[woocommerce_cart]<!-- /wp:shortcode -->', 'Cart', '', 'publish', 'closed', 'closed', '', 'cart-3', '', '', '2019-07-30 05:36:30', '2019-07-30 05:36:30', '', 0, 'https://demo.themefarmer.com/newstore/cart/', 0, 'page', '', 0),
(12, 1, '2019-07-30 05:36:30', '2019-07-30 05:36:30', '<!-- wp:shortcode -->[woocommerce_checkout]<!-- /wp:shortcode -->', 'Checkout', '', 'publish', 'closed', 'closed', '', 'checkout-2', '', '', '2019-07-30 05:36:30', '2019-07-30 05:36:30', '', 0, 'https://demo.themefarmer.com/newstore/checkout/', 0, 'page', '', 0),
(13, 1, '2019-07-30 05:36:30', '2019-07-30 05:36:30', '<!-- wp:shortcode -->[woocommerce_my_account]<!-- /wp:shortcode -->', 'My account', '', 'publish', 'closed', 'closed', '', 'my-account-2', '', '', '2019-07-30 05:36:30', '2019-07-30 05:36:30', '', 0, 'https://demo.themefarmer.com/newstore/my-account/', 0, 'page', '', 0),
(14, 1, '2020-12-12 10:07:59', '2020-12-12 10:07:59', '[tfwc_tool_wishilst]', 'Wishlist', '', 'publish', 'closed', 'closed', '', 'wishlist', '', '', '2020-12-12 10:07:59', '2020-12-12 10:07:59', '', 0, 'https://shadcomputers.lk/index.php/wishlist/', 0, 'page', '', 0),
(17, 1, '2020-12-12 10:09:02', '2020-12-12 10:09:02', '', 'HOME', '', 'publish', 'closed', 'closed', '', 'shop', '', '', '2020-12-15 10:42:16', '2020-12-15 05:12:16', '', 0, 'https://shadcomputers.lk/index.php/shop/', 0, 'page', '', 0),
(18, 1, '2020-12-12 10:09:02', '2020-12-12 10:09:02', '<!-- wp:shortcode -->[woocommerce_cart]<!-- /wp:shortcode -->', 'Cart', '', 'publish', 'closed', 'closed', '', 'cart', '', '', '2020-12-12 10:09:02', '2020-12-12 10:09:02', '', 0, 'https://shadcomputers.lk/index.php/cart/', 0, 'page', '', 0),
(19, 1, '2020-12-12 10:09:02', '2020-12-12 10:09:02', '<!-- wp:shortcode -->[woocommerce_checkout]<!-- /wp:shortcode -->', 'Checkout', '', 'publish', 'closed', 'closed', '', 'checkout', '', '', '2020-12-12 10:09:02', '2020-12-12 10:09:02', '', 0, 'https://shadcomputers.lk/index.php/checkout/', 0, 'page', '', 0),
(20, 1, '2020-12-12 10:09:02', '2020-12-12 10:09:02', '<!-- wp:shortcode -->[woocommerce_my_account]<!-- /wp:shortcode -->', 'My account', '', 'publish', 'closed', 'closed', '', 'my-account', '', '', '2020-12-12 10:09:02', '2020-12-12 10:09:02', '', 0, 'https://shadcomputers.lk/index.php/my-account/', 0, 'page', '', 0),
(21, 1, '2020-12-12 15:42:15', '2020-12-12 10:12:15', '&nbsp;\n\n\n\nConnectivity Technology Type\nWireless\n\n\nWeight\n299 g\n\n\nColor\nBlack\n\n\nMaterial\nPlastic\n\n\nWireless Receiver\n802.11 a/b/g/n, 2.4 GHz Radio Frequency\n\n\nProduct Dimensions\n8 x 7 x 1 cm\n\n\n\n', 'Dell WM126 Wireless Optical Mouse', '', 'publish', 'closed', 'closed', '', 'dell-wm126-wireless-optical-mouse', '', '', '2021-03-16 12:53:02', '2021-03-16 07:23:02', '', 0, 'https://shadcomputers.lk/?post_type=product&#038;p=21', 0, 'product', '', 0),
(22, 1, '2020-12-12 10:11:35', '2020-12-12 10:11:35', '', 'dell-wm126-wireless-optical-mouse-500x500', '', 'inherit', 'open', 'closed', '', 'dell-wm126-wireless-optical-mouse-500x500', '', '', '2020-12-12 10:11:35', '2020-12-12 10:11:35', '', 21, 'https://shadcomputers.lk/wp-content/uploads/2020/12/dell-wm126-wireless-optical-mouse-500x500-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(24, 1, '2020-12-12 10:21:42', '2020-12-12 10:21:42', '', 'SHAD', '', 'inherit', 'open', 'closed', '', 'shad', '', '', '2020-12-12 10:23:41', '2020-12-12 10:23:41', '', 0, 'https://shadcomputers.lk/wp-content/uploads/2020/12/SHAD.jpg', 0, 'attachment', 'image/jpeg', 0),
(25, 1, '2020-12-12 10:21:48', '2020-12-12 10:21:48', 'https://shadcomputers.lk/wp-content/uploads/2020/12/cropped-SHAD.jpg', 'cropped-SHAD.jpg', '', 'inherit', 'open', 'closed', '', 'cropped-shad-jpg', '', '', '2020-12-12 10:21:48', '2020-12-12 10:21:48', '', 0, 'https://shadcomputers.lk/wp-content/uploads/2020/12/cropped-SHAD.jpg', 0, 'attachment', 'image/jpeg', 0),
(29, 1, '2020-12-12 10:28:57', '2020-12-12 10:28:57', '', 'SHAD_300', '', 'inherit', 'open', 'closed', '', 'shad_300', '', '', '2020-12-12 10:28:57', '2020-12-12 10:28:57', '', 0, 'https://shadcomputers.lk/wp-content/uploads/2020/12/SHAD_300.jpg', 0, 'attachment', 'image/jpeg', 0),
(30, 1, '2020-12-12 10:29:14', '2020-12-12 10:29:14', 'https://shadcomputers.lk/wp-content/uploads/2020/12/cropped-SHAD_300.jpg', 'cropped-SHAD_300.jpg', '', 'inherit', 'open', 'closed', '', 'cropped-shad_300-jpg', '', '', '2020-12-12 10:29:14', '2020-12-12 10:29:14', '', 0, 'https://shadcomputers.lk/wp-content/uploads/2020/12/cropped-SHAD_300.jpg', 0, 'attachment', 'image/jpeg', 0),
(31, 1, '2020-12-12 10:32:34', '2020-12-12 10:32:34', '', 'png-phone-icon-27', '', 'inherit', 'open', 'closed', '', 'png-phone-icon-27', '', '', '2020-12-12 10:32:34', '2020-12-12 10:32:34', '', 0, 'https://shadcomputers.lk/wp-content/uploads/2020/12/png-phone-icon-27.png', 0, 'attachment', 'image/png', 0),
(35, 1, '2020-12-12 10:49:33', '2020-12-12 10:49:33', '', 'greentel-t10', '', 'inherit', 'open', 'closed', '', 'greentel-t10', '', '', '2020-12-12 10:49:33', '2020-12-12 10:49:33', '', 0, 'https://shadcomputers.lk/wp-content/uploads/2020/12/greentel-t10.jpg', 0, 'attachment', 'image/jpeg', 0),
(62, 1, '2020-12-14 20:05:07', '2020-12-14 20:05:07', '', 'Mobile', '', 'publish', 'closed', 'closed', '', 'mobile', '', '', '2020-12-14 20:05:07', '2020-12-14 20:05:07', '', 0, 'https://shadcomputers.lk/?page_id=62', 0, 'page', '', 0),
(65, 1, '2020-12-14 20:05:07', '2020-12-14 20:05:07', '', 'Mobile', '', 'inherit', 'closed', 'closed', '', '62-revision-v1', '', '', '2020-12-14 20:05:07', '2020-12-14 20:05:07', '', 62, 'https://shadcomputers.lk/index.php/2020/12/14/62-revision-v1/', 0, 'revision', '', 0),
(71, 1, '2020-12-14 20:08:35', '2020-12-14 20:08:35', '', 'Mobile Accessories', '', 'publish', 'closed', 'closed', '', 'mobile-accessories', '', '', '2020-12-14 20:08:35', '2020-12-14 20:08:35', '', 0, 'https://shadcomputers.lk/?page_id=71', 0, 'page', '', 0),
(72, 1, '2020-12-14 20:08:35', '2020-12-14 20:08:35', '', 'Computer', '', 'publish', 'closed', 'closed', '', 'computer', '', '', '2020-12-14 20:08:35', '2020-12-14 20:08:35', '', 0, 'https://shadcomputers.lk/?page_id=72', 0, 'page', '', 0),
(73, 1, '2020-12-14 20:08:35', '2020-12-14 20:08:35', '', 'Computer Accessories', '', 'publish', 'closed', 'closed', '', 'computer-accessories', '', '', '2020-12-14 20:08:35', '2020-12-14 20:08:35', '', 0, 'https://shadcomputers.lk/?page_id=73', 0, 'page', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_termmeta`
--

INSERT INTO `wp_termmeta` (`meta_id`, `term_id`, `meta_key`, `meta_value`) VALUES
(1, 15, 'product_count_product_cat', '54'),
(2, 16, 'order', '0'),
(3, 16, 'display_type', ''),
(4, 16, 'thumbnail_id', '1041'),
(5, 16, 'product_count_product_cat', '5'),
(6, 19, 'order', '0'),
(7, 20, 'order', '0'),
(8, 21, 'order', '0'),
(9, 19, 'product_count_product_cat', '2'),
(10, 22, 'product_count_product_tag', '1'),
(11, 23, 'product_count_product_tag', '1'),
(12, 20, 'product_count_product_cat', '3'),
(13, 21, 'product_count_product_cat', '3'),
(17, 27, 'product_count_product_tag', '1'),
(18, 28, 'order', '0'),
(19, 28, 'display_type', ''),
(20, 28, 'thumbnail_id', '1025'),
(21, 28, 'product_count_product_cat', '1'),
(22, 29, 'order', '0'),
(23, 29, 'display_type', ''),
(24, 29, 'thumbnail_id', '160'),
(25, 30, 'order', '0'),
(26, 30, 'display_type', ''),
(27, 30, 'thumbnail_id', '162'),
(28, 31, 'order', '0');

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'simple', 'simple', 0),
(3, 'grouped', 'grouped', 0),
(4, 'variable', 'variable', 0),
(5, 'external', 'external', 0),
(6, 'exclude-from-search', 'exclude-from-search', 0),
(7, 'exclude-from-catalog', 'exclude-from-catalog', 0),
(8, 'featured', 'featured', 0),
(9, 'outofstock', 'outofstock', 0),
(10, 'rated-1', 'rated-1', 0),
(11, 'rated-2', 'rated-2', 0),
(12, 'rated-3', 'rated-3', 0),
(13, 'rated-4', 'rated-4', 0),
(14, 'rated-5', 'rated-5', 0),
(15, 'All Product', 'all-product', 0),
(16, 'Mobile Phones &amp; Accessories', 'mobile-phones', 0),
(18, 'Navigation', 'navigation', 0),
(19, 'Computer Accessories', 'computer-accessories', 0),
(20, 'Computers &amp; Accessories', 'computer', 0),
(21, 'Mobile Phones Accessories', 'mobile-phones-accessories', 0),
(22, 'Pen 32gb', 'pen-32gb', 0),
(23, 'Kingston', 'kingston', 0),
(25, 'page', 'page', 0),
(26, 'section', 'section', 0),
(27, 'Greentel', 'greentel', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(21, 2, 0),
(21, 15, 0),
(74, 130, 0),
(77, 129, 0),
(79, 129, 0),
(104, 2, 0),
(104, 19, 0),
(104, 22, 0),
(104, 23, 0),
(106, 2, 0),
(106, 20, 0),
(114, 18, 0),
(115, 18, 0),
(116, 18, 0),
(117, 18, 0),
(122, 2, 0),
(122, 21, 0),
(138, 18, 0),
(139, 25, 0),
(140, 26, 0),
(145, 2, 0),
(145, 9, 0),
(145, 28, 0),
(149, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_category_lookup`
--

CREATE TABLE `wp_wc_category_lookup` (
  `category_tree_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_wc_category_lookup`
--

INSERT INTO `wp_wc_category_lookup` (`category_tree_id`, `category_id`) VALUES
(15, 15),
(16, 16),
(16, 21),
(16, 28),
(16, 31),
(16, 32),
(16, 38),
(19, 19),
(19, 30),
(19, 45),
(19, 46),
(19, 47),
(19, 94),
(19, 138),
(20, 19),
(20, 20),
(20, 30),
(20, 45),
(20, 46),
(20, 47),
(20, 94),
(20, 138),
(21, 21),
(21, 28),
(21, 31);

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_product_meta_lookup`
--

CREATE TABLE `wp_wc_product_meta_lookup` (
  `product_id` bigint(20) NOT NULL,
  `sku` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT '',
  `virtual` tinyint(1) DEFAULT '0',
  `downloadable` tinyint(1) DEFAULT '0',
  `min_price` decimal(19,4) DEFAULT NULL,
  `max_price` decimal(19,4) DEFAULT NULL,
  `onsale` tinyint(1) DEFAULT '0',
  `stock_quantity` double DEFAULT NULL,
  `stock_status` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT 'instock',
  `rating_count` bigint(20) DEFAULT '0',
  `average_rating` decimal(3,2) DEFAULT '0.00',
  `total_sales` bigint(20) DEFAULT '0',
  `tax_status` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT 'taxable',
  `tax_class` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_wc_product_meta_lookup`
--

INSERT INTO `wp_wc_product_meta_lookup` (`product_id`, `sku`, `virtual`, `downloadable`, `min_price`, `max_price`, `onsale`, `stock_quantity`, `stock_status`, `rating_count`, `average_rating`, `total_sales`, `tax_status`, `tax_class`) VALUES
(21, '', 0, 0, '1750.0000', '1750.0000', 1, 5, 'instock', 0, '0.00', 1, 'taxable', ''),
(34, '', 0, 0, '1990.0000', '1990.0000', 1, NULL, 'instock', 0, '0.00', 0, 'taxable', ''),
(104, '5', 0, 0, '2400.0000', '2400.0000', 1, 0, 'onbackorder', 0, '0.00', 0, 'taxable', ''),
(106, '', 0, 0, '85900.0000', '85900.0000', 1, NULL, 'instock', 0, '0.00', 0, 'taxable', ''),
(122, '104860129_LK-1011822523', 0, 0, '950.0000', '950.0000', 1, 5, 'instock', 0, '0.00', 0, 'taxable', ''),
(145, 'handfreesomicx10', 0, 0, '950.0000', '950.0000', 1, 0, 'outofstock', 0, '0.00', 0, 'taxable', ''),
(149, '', 0, 0, '1990.0000', '1990.0000', 1, 5, 'instock', 0, '0.00', 5, 'taxable', ''),
(190, '', 0, 0, '23990.0000', '23990.0000', 1, 1, 'instock', 1, '5.00', 0, 'taxable', ''),
(198, 'baseuspowerbankmini ja30000mah', 0, 0, '4990.0000', '4990.0000', 1, 1, 'instock', 0, '0.00', 0, 'taxable', ''),
(223, '105102800_LK-1012104684', 0, 0, '2499.0000', '2499.0000', 1, 4, 'instock', 0, '0.00', 0, 'taxable', ''),
(255, '', 0, 0, '3500.0000', '3500.0000', 1, NULL, 'instock', 0, '0.00', 1, 'taxable', ''),
(266, '', 0, 0, '3500.0000', '3500.0000', 1, 3, 'instock', 0, '0.00', 1, 'taxable', ''),
(282, '', 0, 0, '1000.0000', '1000.0000', 1, 2, 'instock', 1, '5.00', 0, 'taxable', ''),
(289, '', 0, 1, '3500.0000', '3500.0000', 1, NULL, 'instock', 0, '0.00', 0, 'taxable', ''),
(346, '6.93536E+12', 0, 0, '5500.0000', '5500.0000', 1, -1, 'onbackorder', 0, '0.00', 2, 'taxable', ''),
(353, '6.9707E+12', 0, 0, '3500.0000', '3500.0000', 1, 4, 'instock', 0, '0.00', 0, 'taxable', ''),
(360, '', 0, 0, '4500.0000', '4500.0000', 1, 2, 'instock', 0, '0.00', 0, 'taxable', ''),
(385, '6.93305E+12', 0, 0, '1350.0000', '1350.0000', 1, 5, 'instock', 0, '0.00', 0, 'taxable', ''),
(402, '3033', 0, 0, '3250.0000', '3250.0000', 1, 3, 'instock', 0, '0.00', 0, 'none', ''),
(426, '12V2A', 0, 0, '450.0000', '450.0000', 1, -3, 'onbackorder', 0, '0.00', 13, 'taxable', ''),
(430, '', 0, 0, '650.0000', '650.0000', 0, 7, 'instock', 0, '0.00', 3, 'taxable', ''),
(478, '', 0, 0, '450.0000', '450.0000', 0, NULL, 'instock', 0, '0.00', 0, 'taxable', ''),
(500, 'HBM-60CC', 0, 0, '1950.0000', '1950.0000', 1, 4, 'instock', 0, '0.00', 0, 'taxable', ''),
(511, '', 0, 0, '1999.0000', '1999.0000', 0, 13, 'instock', 0, '0.00', 7, 'taxable', ''),
(520, '', 0, 0, '1900.0000', '1900.0000', 0, 2, 'instock', 0, '0.00', 0, 'taxable', ''),
(526, '', 0, 0, '2800.0000', '2800.0000', 0, 2, 'instock', 0, '0.00', 0, 'none', ''),
(531, 'webcam1080p', 0, 0, '2500.0000', '2500.0000', 1, 9, 'instock', 0, '0.00', 0, 'none', ''),
(543, 'anycastm2plus', 0, 0, '2000.0000', '2000.0000', 0, 4, 'instock', 0, '0.00', 0, 'none', ''),
(555, '', 0, 0, '950.0000', '950.0000', 0, 5, 'instock', 1, '5.00', 0, 'none', ''),
(949, 'FANTECH HQ50', 0, 0, '2000.0000', '2000.0000', 1, 4, 'instock', 0, '0.00', 0, 'taxable', ''),
(1007, '', 0, 0, '7500.0000', '7500.0000', 0, 2, 'instock', 0, '0.00', 0, 'taxable', ''),
(1031, '', 0, 0, '2400.0000', '2400.0000', 0, 5, 'instock', 0, '0.00', 0, 'taxable', ''),
(1038, '', 0, 0, '5490.0000', '5490.0000', 1, 1, 'instock', 0, '0.00', 1, 'taxable', ''),
(1042, '', 0, 0, '2500.0000', '2500.0000', 0, 10, 'instock', 0, '0.00', 0, 'taxable', ''),
(1047, 'microusbcableH/Q1m', 0, 0, '400.0000', '400.0000', 0, 10, 'instock', 0, '0.00', 0, 'taxable', ''),
(1054, '', 0, 0, '120.0000', '120.0000', 0, 100, 'instock', 0, '0.00', 0, 'taxable', ''),
(1101, '', 0, 0, '2400.0000', '2400.0000', 1, 5, 'instock', 0, '0.00', 0, 'taxable', ''),
(1109, '', 0, 0, '1000.0000', '1000.0000', 1, 5, 'instock', 0, '0.00', 0, 'taxable', ''),
(1119, '', 0, 0, '750.0000', '750.0000', 0, 8, 'instock', 0, '0.00', 0, 'taxable', ''),
(1121, '', 0, 0, '750.0000', '750.0000', 0, NULL, 'instock', 0, '0.00', 0, 'taxable', 'parent'),
(1123, '', 0, 0, '750.0000', '750.0000', 0, NULL, 'instock', 0, '0.00', 0, 'taxable', 'parent'),
(1127, '', 0, 0, '750.0000', '750.0000', 1, 4, 'instock', 0, '0.00', 0, 'taxable', ''),
(1131, 'LdnioDL-C17iosCar', 0, 0, '750.0000', '750.0000', 1, 4, 'instock', 0, '0.00', 0, 'taxable', ''),
(1132, '', 0, 0, '900.0000', '900.0000', 0, 3, 'instock', 0, '0.00', 0, 'taxable', ''),
(1168, '', 0, 0, '1900.0000', '1900.0000', 1, 5, 'instock', 0, '0.00', 0, 'taxable', ''),
(1177, '', 0, 0, '400.0000', '400.0000', 1, 5, 'instock', 0, '0.00', 0, 'taxable', ''),
(1184, '', 0, 0, '2500.0000', '2500.0000', 1, 5, 'instock', 0, '0.00', 0, 'taxable', ''),
(1191, '', 0, 0, '850.0000', '850.0000', 1, 5, 'instock', 2, '5.00', 0, 'taxable', ''),
(1197, 'dialog4gp28router', 0, 0, '2990.0000', '2990.0000', 1, 10, 'instock', 0, '0.00', 0, 'taxable', ''),
(1202, '', 0, 0, '950.0000', '950.0000', 0, 10, 'instock', 0, '0.00', 0, 'taxable', ''),
(1210, '', 0, 0, '950.0000', '950.0000', 0, NULL, 'instock', 0, '0.00', 0, 'taxable', 'parent'),
(1211, '', 0, 0, '950.0000', '950.0000', 0, NULL, 'instock', 0, '0.00', 0, 'taxable', 'parent'),
(1215, '', 0, 0, '990.0000', '990.0000', 0, 5, 'instock', 0, '0.00', 0, 'taxable', ''),
(1219, '', 0, 0, '1490.0000', '1490.0000', 0, 5, 'instock', 0, '0.00', 0, 'none', ''),
(1222, 'OMSOM-403', 0, 0, '1450.0000', '1450.0000', 1, 5, 'instock', 1, '5.00', 0, 'taxable', ''),
(1225, '', 0, 0, '650.0000', '650.0000', 1, 10, 'instock', 0, '0.00', 0, 'taxable', ''),
(1229, '', 0, 0, '8000.0000', '8000.0000', 1, NULL, 'onbackorder', 0, '0.00', 0, 'taxable', ''),
(1238, '', 0, 0, '400.0000', '400.0000', 0, 5, 'instock', 0, '0.00', 0, 'none', ''),
(1269, '8.69896E+12', 0, 0, '850.0000', '850.0000', 0, 10, 'instock', 0, '0.00', 0, 'none', ''),
(1273, '8.64131E+12', 0, 0, '950.0000', '950.0000', 0, 10, 'instock', 0, '0.00', 0, 'none', ''),
(1277, '', 0, 0, '0.0000', '0.0000', 0, NULL, 'instock', 0, '0.00', 0, 'taxable', ''),
(1278, '', 0, 0, '2600.0000', '2600.0000', 0, 3, 'instock', 0, '0.00', 0, 'none', ''),
(1283, '', 0, 0, '3500.0000', '3500.0000', 0, 5, 'instock', 0, '0.00', 0, 'none', ''),
(1288, '6.97159E+12', 0, 0, '750.0000', '750.0000', 0, 4, 'instock', 0, '0.00', 0, 'taxable', ''),
(1308, 'usbbasickeyboard', 0, 0, '650.0000', '650.0000', 0, 20, 'instock', 0, '0.00', 0, 'none', ''),
(1319, '', 0, 0, '450.0000', '450.0000', 0, 5, 'instock', 0, '0.00', 0, 'none', ''),
(1329, '', 0, 0, '450.0000', '450.0000', 0, 5, 'instock', 0, '0.00', 0, 'taxable', ''),
(1337, 'NORMALRGBD1FAN', 0, 0, '900.0000', '900.0000', 0, 5, 'instock', 0, '0.00', 0, 'none', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard_items`
--
ALTER TABLE `dashboard_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_pos`
--
ALTER TABLE `temp_pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_wc_category_lookup`
--
ALTER TABLE `wp_wc_category_lookup`
  ADD PRIMARY KEY (`category_tree_id`,`category_id`);

--
-- Indexes for table `wp_wc_product_meta_lookup`
--
ALTER TABLE `wp_wc_product_meta_lookup`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `virtual` (`virtual`),
  ADD KEY `downloadable` (`downloadable`),
  ADD KEY `stock_status` (`stock_status`),
  ADD KEY `stock_quantity` (`stock_quantity`),
  ADD KEY `onsale` (`onsale`),
  ADD KEY `min_max_price` (`min_price`,`max_price`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dashboard_items`
--
ALTER TABLE `dashboard_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_pos`
--
ALTER TABLE `temp_pos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
