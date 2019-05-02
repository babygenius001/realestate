-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 10:52 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(99, '2014_10_12_000000_create_users_table', 1),
(100, '2014_10_12_100000_create_password_resets_table', 1),
(101, '2019_04_04_122720_create_m_managers_table', 1),
(102, '2019_04_04_123042_create_m_permissions_table', 1),
(103, '2019_04_04_123300_create_m_managers_permissions_table', 1),
(104, '2019_04_04_123709_create_m_slides_categories_table', 1),
(105, '2019_04_04_124211_create_m_slides_table', 1),
(106, '2019_04_04_124711_create_m_searchs_table', 1),
(107, '2019_04_04_124926_create_m_menu_groups_table', 1),
(108, '2019_04_04_125059_create_m_menu_items_table', 1),
(109, '2019_04_04_125627_create_m_news_categories_table', 1),
(110, '2019_04_04_130325_create_m_news_table', 1),
(111, '2019_04_04_131230_create_m_customers_table', 1),
(112, '2019_04_04_132355_create_m_customers_addresses_table', 1),
(113, '2019_04_04_133044_create_m_customers_messages_table', 1),
(114, '2019_04_04_140552_create_m_news_comments_table', 1),
(115, '2019_04_04_141226_create_m_news_likes_table', 1),
(116, '2019_04_04_142557_create_m_news_images_groups_table', 1),
(117, '2019_04_04_142823_create_m_news_images_table', 1),
(118, '2019_04_04_144108_create_m_products_colours_table', 1),
(119, '2019_04_04_152929_create_m_products_videos_table', 1),
(120, '2019_04_04_155101_create_m_products_brands_table', 1),
(121, '2019_04_04_155820_create_m_products_categories_table', 1),
(122, '2019_04_04_161404_create_m_products_types_table', 1),
(123, '2019_04_04_162546_create_m_products_table', 1),
(124, '2019_04_04_170345_create_m_products_posters_table', 1),
(125, '2019_04_04_171524_create_m_products_posters_images_table', 1),
(126, '2019_04_04_172116_create_m_products_posters_comments_table', 1),
(127, '2019_04_04_172610_create_m_products_posters_details_table', 1),
(128, '2019_04_04_174225_create_m_customers_carts_table', 1),
(129, '2019_04_04_175804_create_m_customers_orders_table', 1),
(130, '2019_04_05_011725_create_m_customers_orders_details_table', 1),
(131, '2019_04_25_174703_create_m_strengs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_customers`
--

CREATE TABLE `m_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'images/noimages.jpg',
  `description` longtext COLLATE utf8_unicode_ci,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_customers`
--

INSERT INTO `m_customers` (`id`, `name`, `email`, `password`, `tel`, `date_of_birth`, `gender`, `image`, `description`, `banned`, `published`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Tunghoang', 'state@gmail.com', '$2y$10$8l2fVXffjBGkHC/66SzLMeDj/rDY.SPGtZJVhMxciu1Mue7Qrvspe', '0963936443', '1996-08-02', 1, 'images/noimages.jpg', NULL, 0, 1, NULL, NULL, NULL),
(2, 'Tung Thanh Hoang', 'babygenius@gmail.com', '$2y$10$tsj4bDSAh.3dJ9WEFNwsCuZSZHiSosb41pD8cwgCwo1GuzXVlJvPq', '0963936443', '2019-04-15', 1, 'images/Crystal_personal.png', 'No description', 0, 1, '2019-04-24 06:01:48', '2019-04-24 06:01:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_customers_addresses`
--

CREATE TABLE `m_customers_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_customers_carts`
--

CREATE TABLE `m_customers_carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `products_posters_details_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_customers_messages`
--

CREATE TABLE `m_customers_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customers_id_send` int(10) UNSIGNED NOT NULL,
  `custommer_id_receive` int(10) UNSIGNED NOT NULL,
  `context` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'images/noimages.jpg',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'send',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_customers_orders`
--

CREATE TABLE `m_customers_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `customers_addresses_id` int(10) UNSIGNED NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `checking` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'request'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_customers_orders_details`
--

CREATE TABLE `m_customers_orders_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customers_orders_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `products_posters_details_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_managers`
--

CREATE TABLE `m_managers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_managers`
--

INSERT INTO `m_managers` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `remember_token`, `banned`, `published`) VALUES
(1, 'admin', 'realestate@gmail.com', '$2y$10$B8ImFQeqZnLGXrCD.6tSeeTdo3evicPU6Q5qnMG4pHLfLm8eUYd2C', NULL, NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_managers_permissions`
--

CREATE TABLE `m_managers_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `managers_id` int(10) UNSIGNED NOT NULL,
  `permissions_id` int(10) UNSIGNED NOT NULL,
  `check_action` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_menu_groups`
--

CREATE TABLE `m_menu_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_menu_items`
--

CREATE TABLE `m_menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'images/noimages.jpg',
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `list_parent` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '_blank',
  `menu_groups_id` int(10) UNSIGNED NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `description` longtext COLLATE utf8_unicode_ci,
  `description_short` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_news`
--

CREATE TABLE `m_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `description_short` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_categories_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'images/noimages.jpg',
  `creator` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source_website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show_in_homepage` tinyint(1) NOT NULL DEFAULT '1',
  `hit` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `keyword` text COLLATE utf8_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keyword` text COLLATE utf8_unicode_ci,
  `seo_description` longtext COLLATE utf8_unicode_ci,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `is_hot` tinyint(1) NOT NULL DEFAULT '1',
  `new_related` date DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_news`
--

INSERT INTO `m_news` (`id`, `name`, `alias`, `title`, `summary`, `content`, `description_short`, `description`, `tag`, `news_categories_id`, `image`, `creator`, `source_website`, `created_at`, `updated_at`, `show_in_homepage`, `hit`, `published`, `ordering`, `keyword`, `seo_title`, `seo_keyword`, `seo_description`, `is_new`, `is_hot`, `new_related`, `action_id`) VALUES
(1, 'Zoë Kravitz Puts An Alternative Spin On The Grandma Pump', 'zo-kravitz-puts-an-alternative-spin-on-the-grandma-pump', 'Zoë Kravitz Puts An Alternative Spin On The Grandma Pump', 'Zoë Kravitz was spotted in New York on May 1 en route to the Hulu Upfronts Convention. She brought her signature SoCal vibe to the streets of Manhattan, stepping out in a midriff-baring cropped white tank top, over which she threw a polished camel coat. Her kicky low-slung flares were in an eye-popping shade of lime green, a colour that’s making the rounds with several other celebrities, including Kendall and Kylie Jenner.', '<p><img src=\"https://vg-images.condecdn.net/image/ob4jvJnlDKd/crop/405/f/gettyimages-1140644743.jpg\" /><img src=\"https://vg-images.condecdn.net/image/ob4jvJnlDKd/crop/405/f/gettyimages-1140644743.jpg\" /></p>\r\n\r\n<p><img src=\"https://vg-images.condecdn.net/image/YPeZooDBxoP/crop/405/f/gettyimages-1140644743.jpg\" /></p>\r\n\r\n<p>GETTY IMAGES</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"250\" id=\"google_ads_iframe_/5574/uk.n5574.vogue/dailynews/articles_1\" name=\"google_ads_iframe_/5574/uk.n5574.vogue/dailynews/articles_1\" scrolling=\"no\" title=\"3rd party ad content\" width=\"300\"></iframe></p>\r\n\r\n<p>The most surprising element of her look? The classic dark pumps on her feet. Usually the reserve of bourgeois Parisian grandmas, the low-heeled silhouette was a surprisingly conservative choice for the actor who is famous for her laidback aesthetic. Still, in Kravitz&rsquo;s hands it was anything but prim or proper. In fact, we wouldn&rsquo;t be surprised if this was the beginnings of a new sensible shoe craze.</p>\r\n\r\n<p><img src=\"https://vg-images.condecdn.net/image/BQDlVdNxLJe/crop/405/f/shutterstock_editorial_10225687u_huge.jpg\" /></p>\r\n\r\n<p>SHUTTERSTOCK</p>\r\n\r\n<p><em>This is article was originally published on&nbsp;<a href=\"https://www.vogue.com/vogueworld/article/zoe-kravitz-grandma-pump-hulu-upfronts-nyc\">Vogue.com</a></em></p>', NULL, NULL, NULL, 8, 'images/news/news/2019/2019-05-02/20190502185645_gettyimages1140644743.jpg', 'LIANA SATENSTEIN', 'https://www.vogue.co.uk/article/zoe-kravitz-puts-a-cool-spin-on-the-grandma-pump', '2019-05-02 11:56:45', '2019-05-02 11:56:45', 1, 0, 1, 1, NULL, NULL, NULL, NULL, 1, 1, '2019-05-02', NULL),
(2, 'Anya Hindmarch Is Heading Up Her Own Business Once More', 'anya-hindmarch-is-heading-up-her-own-business-once-more', 'Anya Hindmarch Is Heading Up Her Own Business Once More', 'Anya Hindmarch is back at the helm of her namesake brand. As well as maintaining her position as creative director and board member, she is reprising the role of managing director, a title she held until 2011, when she made way for her then-chief executive officer, James McArthur.', '<p>&ldquo;In a rapidly changing retail and global environment, it&rsquo;s time for businesses to be brave and decisive,&rdquo; Hindmarch said in a statement. &ldquo;We have been transforming our business model since 2017, taking advantage of our strengths in creativity, experiential and direct-to-consumer [communication], and I&rsquo;m incredibly excited for the next phase.&rdquo;</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"600\" id=\"google_ads_iframe_/5574/uk.n5574.vogue/dailynews/articles_1\" name=\"google_ads_iframe_/5574/uk.n5574.vogue/dailynews/articles_1\" scrolling=\"no\" title=\"3rd party ad content\" width=\"300\"></iframe></p>\r\n\r\n<p><a href=\"https://www.vogue.co.uk/article/valentines-day-anya-hindmarch-chubby-hearts\">Anya Hindmarch&#39;s Chubby Hearts Are Back For Valentine&#39;s Day</a></p>\r\n\r\n<p><img src=\"https://vg-images.condecdn.net/image/8dvXK5Pkk9X/crop/200/square/f/dmb_chubby_heats_015_b.jpg\" /></p>\r\n\r\n<h3>Anya Hindmarch&#39;s Chubby Hearts Are Back For Valentine&#39;s Day</h3>\r\n\r\n<ul>\r\n	<li>ANYA HINDMARCH</li>\r\n	<li>&nbsp;</li>\r\n	<li>14 Feb 2019</li>\r\n</ul>\r\n\r\n<p>The moves comes after Hindmarch&rsquo;s Qatari backer, Mayhoola For Investments &ndash; who had gradually built up a 75 per cent stake in the company after acquiring a portion of it in 2012 &ndash; sold the business to Iranian-born entrepreneur Javad Marandi in March. Hindmarch&#39;s first motion as managing director will be to &ldquo;turn around the business,&rdquo; she said. &ldquo;I want to make sure it&rsquo;s a bit more future-proof&hellip; Ultimately getting it to the stage where it&rsquo;s a success.&rdquo;</p>\r\n\r\n<p><a href=\"https://www.vogue.co.uk/article/anya-hindmarch-chubby-cloud-london-fashion-week\">First She Gave London Chubby Hearts, Now Anya Hindmarch Is Introducing Chubby Clouds</a></p>\r\n\r\n<p><img src=\"https://vg-images.condecdn.net/image/3WpY1oxNvyg/crop/200/square/f/bh_chubby_cloud_press.jpg\" /></p>\r\n\r\n<h3>First She Gave London Chubby Hearts, Now Anya Hindmarch Is Introducing Chubby Clouds</h3>\r\n\r\n<ul>\r\n	<li>NEWS</li>\r\n	<li>&nbsp;</li>\r\n	<li>31 Aug 2018</li>\r\n</ul>\r\n\r\n<p>In 2017, the London-based brand reported a pre-tax loss of &pound;28 million, according to&nbsp;<em><a href=\"https://www.businessoffashion.com/articles/news-bites/anya-hindmarch-to-take-back-reins-of-her-business\">Business of Fashion</a></em>. The company closed eight of its smaller stores and concessions in the UK and Japan in a bid to minimise losses, and&nbsp;<a href=\"https://www.vogue.co.uk/article/anya-hindmarch-london-fashion-week-consumer-events\">changed its presentation strategy</a>&nbsp;to better suit the business. Rather than staging a catwalk show on the London Fashion Week schedule, Hindmarch began orchestrating a series of innovative and unusual activations. 2017&rsquo;s Chubby Cloud and 2018&rsquo;s Weave Project proved valuable Instagram fodder for the attending press and buyers, and arguably garnered the label as much publicity as Hindmarch&#39;s once-fabulous shows, which involved fairground rides and human conveyor belts.</p>', NULL, NULL, NULL, 9, 'images/news/news/2019/2019-05-02/20190502190311_gettyimages1130272688.jpg', 'ALICE NEWBOLD', 'https://www.vogue.co.uk/article/anya-hindmarch-managing-director', '2019-05-02 12:03:11', '2019-05-02 12:03:11', 1, 0, 1, 1, NULL, NULL, NULL, NULL, 1, 1, '2019-05-02', NULL),
(3, 'Sophie Turner And Joe Jonas Marry In Surprise Las Vegas Wedding', 'sophie-turner-and-joe-jonas-marry-in-surprise-las-vegas-wedding', 'Sophie Turner And Joe Jonas Marry In Surprise Las Vegas Wedding', 'Sophie Turner and Joe Jonas might have pulled off the best surprise wedding of the year so far. After attending the annual Billboard Music Awards on May 1, the couple appeared to exchange vows in front of an intimate crowd at the Little White Chapel in Las Vegas.', '<p><img src=\"https://vg-images.condecdn.net/image/DJEZLEvron6/crop/405/f/screen-shot-2019-05-02-at-92007-am-2.jpg\" /></p>\r\n\r\n<p>INSTAGRAM: @DIPLO</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"250\" id=\"google_ads_iframe_/5574/uk.n5574.vogue/dailynews/articles_1\" name=\"google_ads_iframe_/5574/uk.n5574.vogue/dailynews/articles_1\" scrolling=\"no\" title=\"3rd party ad content\" width=\"300\"></iframe></p>\r\n\r\n<p>The pair, who got engaged in October 2017 and had reportedly been planning a wedding ceremony this summer in France, opted for a low-key affair conducted by an Elvis Presley impersonator. They were surrounded by their family and friends &ndash; including Kevin and Nick Jonas.</p>\r\n\r\n<p><img src=\"https://vg-images.condecdn.net/image/1e4NlwVP3PZ/crop/405/f/joe.jpg\" /></p>\r\n\r\n<p>INSTAGRAM: @DIPLO</p>\r\n\r\n<h4>READ NEXT</h4>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.vogue.co.uk/article/zoe-kravitz-puts-a-cool-spin-on-the-grandma-pump\">Zo&euml; Kravitz Puts An Alternative Spin On The Grandma Pump</a>\r\n\r\n	<p><img src=\"https://vg-images.condecdn.net/image/ob4jvJnlDKd/crop/200/square/f/gettyimages-1140644743.jpg\" /></p>\r\n\r\n	<h3>Zo&euml; Kravitz Puts An Alternative Spin On The Grandma Pump</h3>\r\n\r\n	<p>by&nbsp;LIANA SATENSTEIN</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Captured on Diplo&rsquo;s Instagram&nbsp;<a href=\"https://www.instagram.com/diplo/?hl=en\">@diplo</a>, the livestream video shows country stars Dan + Shay playing their hit&nbsp;<em>Speechless</em>&nbsp;before the ceremony. Turner, who wore an all-white jumpsuit and veil, walked down the aisle with a friend while carrying a bouquet of flowers. Jonas, who wore a grey suit, stood side-by-side with his brothers. Priyanka Chopra acted as Turner&rsquo;s maid of honour.</p>\r\n\r\n<p><img src=\"https://vg-images.condecdn.net/image/Llb2LqXXoMz/crop/405/f/screen-shot-2019-05-02-at-90538-am.jpg\" /></p>\r\n\r\n<p>INSTAGRAM: @DIPLO</p>\r\n\r\n<p>After the ceremony, the pair posed for photos on a pink Cadillac while wearing rose-tinted shades, and then jumped into a pool fully clothed.</p>', NULL, NULL, NULL, 9, 'images/news/news/2019/2019-05-02/20190502190436_gettyimages1146419074.jpg', NULL, NULL, '2019-05-02 12:04:36', '2019-05-02 12:04:36', 1, 0, 1, 1, NULL, NULL, NULL, NULL, 1, 1, '2019-05-02', NULL),
(4, 'The Medea Sisters’ New Italian It Bag Is Inspired by a German Icon', 'the-medea-sisters-new-italian-it-bag-is-inspired-by-a-german-icon', 'The Medea Sisters’ New Italian It Bag Is Inspired by a German Icon', NULL, '<p>When Camilla and Giulia Venturini, the Italian twin sisters behind&nbsp;<a href=\"https://www.vogue.com/article/medea-leather-shopping-bags-giulia-camilla-venturini\">Medea</a>, first saw a photo of their tiny tote on&nbsp;<a href=\"https://www.instagram.com/p/Bt4wktGhHV2/\" rel=\"noopener noreferrer\" target=\"_blank\">Rihanna&rsquo;s Instagram page</a>, a drooping red rose held within, their reaction was nothing short of shock. &ldquo;It gave us a little bit of a heart attack,&rdquo; Giulia says. Yet Bad Gal RiRi&rsquo;s badge of approval is just one of many milestones. In the eight months since its launch, the Milan-based It bag label, which is named after Pier Paolo Pasolini&#39;s 1969 film, has been picked up by Dover Street Market, Selfridges, and&nbsp;<a href=\"https://www.vogue.com/fashion-shows/fall-2019-ready-to-wear/opening-ceremony\">Opening Ceremony</a>, and launched a limited-edition collection with the artist&nbsp;<a href=\"https://www.vogue.com/article/medea-sisters-bags-nan-goldin-collaboration\">Nan Goldin</a>. (Not to mention the list of celebrities and street style stars seen carrying the minimal bags, of which there are too many to name here.)</p>\r\n\r\n<p><img alt=\"See the Latest RihannaApproved It Bag from Two Italian Sisters\" src=\"https://assets.vogue.com/photos/5c6dd8bf0a980d2d39d5a905/master/w_1600,c_limit/medea-1.jpg\" /></p>\r\n\r\n<p>PHOTO: BUNNY KINNEY</p>\r\n\r\n<p>Now, the Venturinis have unveiled their latest creation: the Hanna, made to fill the size gap between their XXS and XXL totes. &quot;It feels more like a proper day bag,&quot; Camilla says of its wider proportions, which perfectly house her essentials: &ldquo;a wallet, phone, keys, and a camera.&rdquo; Though made in Verona, the style was inspired by the iconic German actress and Rainer Werner Fassbinder muse Hanna Schygulla and her &ldquo;strong but feminine&rdquo; style. It comes in crocodile-printed calfskin and in Medea&rsquo;s signature candy-bright colors, such as fiery orange, emerald, and Pepto-Bismol pink.</p>\r\n\r\n<p><img alt=\"See the Latest RihannaApproved It Bag from Two Italian Sisters\" src=\"https://assets.vogue.com/photos/5c6dd8bf7462bf2db5bafd45/master/w_1600,c_limit/medea-4.jpg\" /></p>\r\n\r\n<p>PHOTO: BUNNY KINNEY</p>\r\n\r\n<p>But the designers&rsquo; cinematic impulses don&rsquo;t stop there. To shoot their Surrealist campaign, the Venturinis transformed themselves into a pair of witches. (Medea herself is considered to be the great witch of Greek mythology.) Dressed in vintage Alexander McQueen, John Galliano, and Givenchy, the sisters took to the streets of London&rsquo;s Hyde Park neighborhood with prismatic eyeshadow and pointy prosthetic noses, whipped up by wunderkind makeup artist&nbsp;<a href=\"https://www.vogue.com/article/halpern-gold-foil-disco-lids-2019-london-fashion-week-isamaya-ffrench\">Isamaya Ffrench</a>. &ldquo;There&rsquo;s this vibe of &lsquo;What&rsquo;s going on?&rsquo; The only part that stands out is the nose,&rdquo; Giulia notes, to which Camilla adds, with a discernible note of mischief in her voice, &ldquo;We like to surprise people.&rdquo; An Italian It bag, inspired by a German screen siren and immortalized in London, ticks that box and then some.</p>\r\n\r\n<p><img alt=\"See the Latest RihannaApproved It Bag from Two Italian Sisters\" src=\"https://assets.vogue.com/photos/5c6dd8bf0a980d2d39d5a904/master/w_1600,c_limit/medea-3.jpg\" /></p>', NULL, NULL, NULL, 10, 'images/news/news/2019/2019-05-02/20190502220004_gettyimages1140644743.jpg', 'ZOE RUFFNER', 'https://www.vogue.com/vogueworld/article/medea-sisters-crocodile-bags-hanna-schygulla', '2019-05-02 15:00:04', '2019-05-02 15:00:04', 1, 0, 1, 1, NULL, NULL, NULL, NULL, 1, 1, '2019-05-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_news_categories`
--

CREATE TABLE `m_news_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '---',
  `list_parent` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `icon` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show_in_homepage` tinyint(1) NOT NULL DEFAULT '1',
  `action_id` int(11) DEFAULT NULL,
  `description_short` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keyword` text COLLATE utf8_unicode_ci,
  `seo_description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_news_categories`
--

INSERT INTO `m_news_categories` (`id`, `name`, `alias`, `parent_id`, `list_parent`, `published`, `ordering`, `icon`, `image`, `created_at`, `updated_at`, `show_in_homepage`, `action_id`, `description_short`, `description`, `seo_title`, `seo_keyword`, `seo_description`) VALUES
(1, 'men', 'men', '---', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:13:20', '2019-04-24 06:13:20', 1, 1, NULL, NULL, NULL, NULL, NULL),
(2, 'women', 'women', '---', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:13:25', '2019-04-24 06:13:25', 1, 1, NULL, NULL, NULL, NULL, NULL),
(3, 'boys', 'boys', '---', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:13:28', '2019-04-24 06:13:28', 1, 1, NULL, NULL, NULL, NULL, NULL),
(4, 'girls', 'girls', '---', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:13:31', '2019-04-24 06:13:31', 1, 1, NULL, NULL, NULL, NULL, NULL),
(5, 'customise', 'customise', '---', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:13:40', '2019-04-24 06:13:40', 1, 1, NULL, NULL, NULL, NULL, NULL),
(6, 'collections', 'collections', '---', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:13:45', '2019-04-24 06:13:45', 1, 1, NULL, NULL, NULL, NULL, NULL),
(7, 'launch calendar', 'launch-calendar', '---', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:13:54', '2019-04-24 06:13:54', 1, 1, NULL, NULL, NULL, NULL, NULL),
(8, 'shoes', 'shoes', '1', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:14:33', '2019-04-24 06:14:33', 1, 1, NULL, NULL, NULL, NULL, NULL),
(9, 'clothing', 'clothing', '1', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:15:31', '2019-04-24 06:15:31', 1, 1, NULL, NULL, NULL, NULL, NULL),
(10, 'shoes', 'shoes', '2', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:17:17', '2019-04-24 06:17:17', 1, 1, NULL, NULL, NULL, NULL, NULL),
(11, 'clothing', 'clothing', '2', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:17:25', '2019-04-24 06:17:25', 1, 1, NULL, NULL, NULL, NULL, NULL),
(12, 'shoes', 'shoes', '3', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:17:38', '2019-04-24 06:17:38', 1, 1, NULL, NULL, NULL, NULL, NULL),
(13, 'clothing', 'clothing', '3', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:17:47', '2019-04-24 06:17:47', 1, 1, NULL, NULL, NULL, NULL, NULL),
(14, 'shoes', 'shoes', '4', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:17:54', '2019-04-24 06:17:54', 1, 1, NULL, NULL, NULL, NULL, NULL),
(15, 'clothing', 'clothing', '4', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:18:02', '2019-04-24 06:18:02', 1, 1, NULL, NULL, NULL, NULL, NULL),
(16, 'Made by you', 'made-by-you', '5', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:18:18', '2019-04-24 06:18:18', 1, 1, NULL, NULL, NULL, NULL, NULL),
(17, 'By sport', 'by-sport', '5', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:18:33', '2019-04-24 06:18:33', 1, 1, NULL, NULL, NULL, NULL, NULL),
(18, 'Life style', 'life-style', '6', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:18:47', '2019-04-24 06:18:47', 1, 1, NULL, NULL, NULL, NULL, NULL),
(19, 'Running', 'running', '6', '0', 1, 1, 'images/noimages.jpg', 'images/noimages.jpg', '2019-04-24 06:18:58', '2019-04-24 06:18:58', 1, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_news_comments`
--

CREATE TABLE `m_news_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `news_id` int(10) UNSIGNED NOT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `context` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_news_images`
--

CREATE TABLE `m_news_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `news_images_groups_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'images/noimages.jpg',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_news_images_groups`
--

CREATE TABLE `m_news_images_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `description_short` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_news_likes`
--

CREATE TABLE `m_news_likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `news_id` int(10) UNSIGNED NOT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `reaction` tinyint(1) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_permissions`
--

CREATE TABLE `m_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_products`
--

CREATE TABLE `m_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `width` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `depth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_related` date DEFAULT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `is_hot` tinyint(1) NOT NULL DEFAULT '1',
  `tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'images/noimages.jpg',
  `products_types_id` int(10) UNSIGNED NOT NULL,
  `products_brands_id` int(10) UNSIGNED NOT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `description_short` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keyword` text COLLATE utf8_unicode_ci,
  `seo_description` longtext COLLATE utf8_unicode_ci,
  `checking` tinyint(1) NOT NULL DEFAULT '0',
  `action_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_products`
--

INSERT INTO `m_products` (`id`, `created_at`, `updated_at`, `name`, `alias`, `height`, `width`, `depth`, `weight`, `new_related`, `is_new`, `is_hot`, `tag`, `keyword`, `image`, `products_types_id`, `products_brands_id`, `customers_id`, `description_short`, `description`, `ordering`, `published`, `seo_title`, `seo_keyword`, `seo_description`, `checking`, `action_id`) VALUES
(1, '2019-05-02 13:00:32', '2019-05-02 13:34:43', 'Timber Land', 'timber-land', NULL, NULL, NULL, NULL, '2019-05-02', 1, 1, NULL, NULL, 'images/products/products/2019/2019-05-02/20190502203443__MG_3813.JPG', 2, 2, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 1),
(2, '2019-05-02 13:01:29', '2019-05-02 13:35:00', 'Adias a', 'adias-a', NULL, NULL, NULL, NULL, '2019-05-02', 1, 1, NULL, NULL, 'images/products/products/2019/2019-05-02/20190502203500__MG_3819.JPG', 3, 3, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0),
(3, '2019-05-02 13:06:18', '2019-05-02 13:35:08', '123123123', '123123123', NULL, NULL, NULL, NULL, '2019-05-02', 1, 1, NULL, NULL, 'images/noimages.jpg', 1, 1, 1, NULL, NULL, 1, 0, NULL, NULL, NULL, 0, 1),
(4, '2019-05-02 13:35:59', '2019-05-02 13:35:59', 'Adidas All star', 'adidas-all-star', NULL, NULL, NULL, NULL, '2019-05-02', 1, 1, NULL, NULL, 'images/products/products/2019/2019-05-02/20190502203559__MG_3843.JPG', 1, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0),
(5, '2019-05-02 13:36:30', '2019-05-02 13:36:30', 'Adidas AlphaBoune', 'adidas-alphaboune', NULL, NULL, NULL, NULL, '2019-05-02', 1, 1, NULL, NULL, 'images/products/products/2019/2019-05-02/20190502203630__MG_3861.JPG', 3, 4, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0),
(6, '2019-05-02 13:37:04', '2019-05-02 13:37:04', 'NewBlane Limited Editon 2017', 'newblane-limited-editon-2017', NULL, NULL, NULL, NULL, '2019-05-02', 1, 1, NULL, NULL, 'images/products/products/2019/2019-05-02/20190502203704__MG_3899.JPG', 1, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0),
(7, '2019-05-02 13:37:30', '2019-05-02 13:37:30', 'Nike Flyknit', 'nike-flyknit', NULL, NULL, NULL, NULL, '2019-05-02', 1, 1, NULL, NULL, 'images/products/products/2019/2019-05-02/20190502203730__MG_3904.JPG', 3, 9, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0),
(8, '2019-05-02 13:38:07', '2019-05-02 13:38:07', 'Van Slipon 2016', 'van-slipon-2016', NULL, NULL, NULL, NULL, '2019-05-02', 1, 1, NULL, NULL, 'images/products/products/2019/2019-05-02/20190502203807__MG_4064.JPG', 2, 8, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0),
(9, '2019-05-02 13:38:38', '2019-05-02 13:38:38', 'Adidas Flux All black', 'adidas-flux-all-black', NULL, NULL, NULL, NULL, '2019-05-02', 1, 1, NULL, NULL, 'images/products/products/2019/2019-05-02/20190502203838__MG_3977.JPG', 3, 4, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0),
(10, '2019-05-02 13:39:11', '2019-05-02 13:39:11', 'NewBlane All Black classical', 'newblane-all-black-classical', NULL, NULL, NULL, NULL, '2019-05-02', 1, 1, NULL, NULL, 'images/products/products/2019/2019-05-02/20190502203911__MG_4153.JPG', 3, 7, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_products_brands`
--

CREATE TABLE `m_products_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abbreviation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'images/noimages.jpg',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'images/noimages.jpg',
  `description_short` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `keyword` text COLLATE utf8_unicode_ci,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keyword` text COLLATE utf8_unicode_ci,
  `seo_description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_products_brands`
--

INSERT INTO `m_products_brands` (`id`, `created_at`, `updated_at`, `name`, `alias`, `abbreviation`, `url`, `image`, `icon`, `description_short`, `description`, `keyword`, `published`, `ordering`, `seo_title`, `seo_keyword`, `seo_description`) VALUES
(1, '2019-04-24 06:08:27', '2019-04-24 06:08:27', 'A.S.98', 'a-s-98', NULL, NULL, 'images/products/brands/20190424200827_as98.jpg', 'images/noimages.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(2, '2019-04-24 06:08:35', '2019-04-24 06:08:35', 'Acorn', 'acorn-', NULL, NULL, 'images/products/brands/20190424200835_acorn.jpg', 'images/noimages.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(3, '2019-04-24 06:08:46', '2019-04-24 06:08:46', 'Adam Tucker', 'adam-tucker', NULL, NULL, 'images/products/brands/20190424200846_adamtucker.jpg', 'images/noimages.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(4, '2019-04-24 06:08:54', '2019-04-24 06:08:54', 'Adidas', 'adidas', NULL, NULL, 'images/products/brands/20190424200854_adidas.jpg', 'images/noimages.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(5, '2019-04-24 06:09:02', '2019-04-24 06:09:02', 'Alan Payne', 'alan-payne', NULL, NULL, 'images/products/brands/20190424200902_alanpayne.jpg', 'images/noimages.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(6, '2019-04-24 06:09:11', '2019-04-24 06:09:11', 'Alegria', 'alegria-', NULL, NULL, 'images/products/brands/20190424200911_alegria.jpg', 'images/noimages.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(7, '2019-04-24 06:09:20', '2019-04-24 06:09:20', 'ALL BLACK', 'all-black', NULL, NULL, 'images/products/brands/20190424200920_allblack.jpg', 'images/noimages.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(8, '2019-04-24 06:09:27', '2019-04-24 06:09:27', 'Altra Running', 'altra-running', NULL, NULL, 'images/products/brands/20190424200927_altra.jpg', 'images/noimages.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(9, '2019-04-24 06:09:34', '2019-04-24 06:09:34', 'Arche', 'arche-', NULL, NULL, 'images/products/brands/20190424200934_arche.jpg', 'images/noimages.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(10, '2019-04-24 06:09:43', '2019-04-24 06:09:43', 'Arcopedico', 'arcopedico-', NULL, NULL, 'images/products/brands/20190424200943_arcopedico.jpg', 'images/noimages.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(11, '2019-04-24 06:09:50', '2019-04-24 06:09:50', 'Asics', 'asics-', NULL, NULL, 'images/products/brands/20190424200950_asics.jpg', 'images/noimages.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(12, '2019-04-24 06:10:00', '2019-04-24 06:10:15', 'Astral Designs', 'astral-designs', NULL, NULL, 'images/products/brands/20190424201015_astral.jpg', 'images/noimages.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_products_categories`
--

CREATE TABLE `m_products_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'images/noimages.jpg',
  `icon` text COLLATE utf8_unicode_ci,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `description_short` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_products_categories`
--

INSERT INTO `m_products_categories` (`id`, `created_at`, `updated_at`, `name`, `alias`, `image`, `icon`, `published`, `ordering`, `description_short`, `description`) VALUES
(1, '2019-04-24 06:04:02', '2019-04-24 06:04:02', 'Shoes', 'shoes', 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(2, '2019-04-24 06:04:08', '2019-04-24 06:04:08', 'Clothing', 'clothing', 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(3, '2019-04-24 06:04:20', '2019-04-24 06:04:20', 'Shop by sport', 'shop-by-sport', 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_products_colours`
--

CREATE TABLE `m_products_colours` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_short` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `hex_colour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_products_colours`
--

INSERT INTO `m_products_colours` (`id`, `created_at`, `updated_at`, `name`, `description_short`, `description`, `hex_colour`, `ordering`, `published`) VALUES
(1, '2019-04-24 05:59:49', '2019-04-24 05:59:49', 'White', NULL, NULL, '#ffffff', 1, 1),
(2, '2019-04-24 06:00:00', '2019-04-24 06:00:00', 'Red', NULL, NULL, '#ff0000', 1, 1),
(3, '2019-04-24 06:00:08', '2019-04-24 06:00:08', 'Blue', NULL, NULL, '#0000ff', 1, 1),
(4, '2019-04-24 06:00:17', '2019-04-24 06:00:17', 'Green', NULL, NULL, '#00ff00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_products_posters`
--

CREATE TABLE `m_products_posters` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `new_related` date DEFAULT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `is_hot` tinyint(1) NOT NULL DEFAULT '1',
  `tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `products_videos_id` int(10) UNSIGNED NOT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `description_short` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keyword` text COLLATE utf8_unicode_ci,
  `seo_description` longtext COLLATE utf8_unicode_ci,
  `checking` tinyint(1) NOT NULL DEFAULT '0',
  `action_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_products_posters`
--

INSERT INTO `m_products_posters` (`id`, `created_at`, `updated_at`, `name`, `alias`, `title`, `summary`, `content`, `new_related`, `is_new`, `is_hot`, `tag`, `keyword`, `image`, `products_id`, `products_videos_id`, `customers_id`, `description_short`, `description`, `ordering`, `published`, `seo_title`, `seo_keyword`, `seo_description`, `checking`, `action_id`) VALUES
(5, '2019-05-02 13:48:02', '2019-05-02 13:48:02', 'Xả lô hàng sale up to 30%', 'xa-lo-hang-sale-up-to-30-', 'Xả lô hàng sale up to 30%', 'Xả lô hàng sale up to 30%', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, qui, omnis! Aspernatur voluptatem blanditiis assumenda tempora nisi quasi neque perspiciatis porro ad! Blanditiis voluptatem deleniti architecto, quibusdam at unde dicta recusandae. Quisquam ullam, libero quaerat, placeat ab id, repellat facere iusto aperiam laborum esse soluta. Quaerat perferendis vel doloribus odio delectus ex tenetur saepe reprehenderit veritatis, vero fugit quia, ratione repudiandae esse in iure modi molestias corporis, placeat labore. Aperiam est neque nostrum voluptatum consectetur fuga minima quam quasi repellendus tempora placeat delectus perferendis non alias repellat voluptatibus, perspiciatis dolor eveniet quibusdam, pariatur accusamus ut modi quidem, amet. Inventore maiores reprehenderit doloremque vero ad officia soluta doloribus nam magni deserunt, cupiditate quis aut saepe beatae ab. Enim vero ipsam ab sunt, harum nulla eveniet suscipit. Blanditiis doloremque tenetur perspiciatis ea praesentium deserunt, reiciendis dignissimos pariatur molestiae, obcaecati voluptatum corporis provident, necessitatibus quod laudantium architecto officia repudiandae quis. Quibusdam nesciunt consequuntur, eaque consectetur officiis culpa perferendis architecto nisi est facilis ea odio, at commodi eum cum atque illum dolores. Molestiae beatae et, voluptates mollitia esse recusandae quaerat vitae aperiam nisi, quibusdam provident quas reprehenderit eligendi voluptas voluptatibus qui. Odio molestiae ex sapiente accusamus possimus perspiciatis architecto itaque maxime fugit? Totam corporis quas natus sed est eos odio, at sit obcaecati fugiat. Delectus inventore ullam laudantium est eius, sapiente natus nobis harum eaque nostrum fugit hic voluptatem reprehenderit enim. Quasi recusandae explicabo assumenda vitae quisquam non, asperiores, temporibus optio doloribus eius perferendis nesciunt. Ab unde tempore omnis accusamus autem, necessitatibus soluta error ipsam, nam qui molestiae voluptas. Nemo nulla eligendi necessitatibus earum placeat expedita ad temporibus, reprehenderit alias! Delectus corrupti error beatae soluta optio obcaecati, natus architecto perferendis, aliquam ut. Doloremque alias modi beatae ipsa velit facilis nostrum mollitia in deserunt consequatur nobis, asperiores nemo maxime, placeat. Qui voluptate explicabo repellat reiciendis enim dignissimos similique voluptatum adipisci, excepturi vel, sint illo iure unde, animi possimus! Quidem ut, sed voluptas alias, nihil quisquam consectetur, officia perspiciatis omnis minus magnam deserunt ex! Animi cupiditate, id est! Dolorem nostrum, adipisci et debitis maiores ut iste vel vitae nemo, doloribus, odit tenetur minus earum. Voluptatum nobis tenetur, quo facere quaerat molestiae perferendis explicabo ea, soluta, recusandae maxime sit dolorum. Quisquam corrupti vel ullam, voluptates quibusdam ipsa consequuntur! Recusandae, inventore? Fugit reprehenderit accusantium nesciunt necessitatibus aliquam rerum pariatur incidunt veritatis dolor sed, aliquid laudantium a voluptate consectetur distinctio, similique accusamus, eum quisquam nihil odit ipsam, dolore iure repellendus cum. A consequuntur odit obcaecati magnam totam modi culpa ab error incidunt. Maiores ratione, voluptatem eveniet sequi quae. Culpa magni, nihil, explicabo veritatis aspernatur ipsum laudantium! Suscipit sequi, natus animi quidem laboriosam alias dicta maiores atque officia cupiditate sunt pariatur aperiam provident ab perspiciatis autem aut veniam ipsa rerum, beatae voluptatem modi deserunt! Voluptatibus et explicabo nam itaque! Quibusdam consequuntur amet libero eos animi rem dolore eum velit facere totam temporibus vero iure, ratione harum odit, laborum possimus mollitia! Perferendis facere error vero itaque aperiam dolores aliquid expedita soluta amet nobis corporis dolorem et laudantium qui eius dicta doloremque sequi, eum temporibus modi, minus sapiente iusto consequuntur. Dicta itaque recusandae saepe vitae facere dolore ducimus obcaecati, et harum magni nostrum voluptatum enim, doloribus dolores accusamus delectus, provident expedita quidem. Modi quidem est error velit provident ut eveniet necessitatibus ullam harum, debitis voluptatem nostrum voluptatum et architecto laboriosam iusto placeat! Soluta rerum harum enim perspiciatis. Dolor veritatis dolores placeat error repellendus quidem doloribus, quis voluptatibus accusamus? Eveniet unde ex sit, quidem blanditiis nesciunt voluptate in porro animi soluta molestias minima quae earum tenetur minus explicabo laborum accusamus dolor officia dignissimos ullam ipsum doloribus, rem. Nihil illum velit quisquam quis, provident culpa eius quo consequatur blanditiis veritatis dicta perferendis assumenda illo, nam mollitia, distinctio repudiandae dolores non? Natus consectetur incidunt magnam sapiente similique, nostrum corrupti odio. Deleniti numquam consequatur totam maxime, labore, nam, assumenda aliquam placeat fugit quasi quas modi voluptatem adipisci ea incidunt recusandae tempore. Culpa, pariatur dolore expedita, dignissimos magni eius numquam sint ipsam rem nulla beatae, nemo cupiditate reprehenderit ex obcaecati non cum praesentium hic, minima optio eligendi sit vero. Distinctio perferendis nobis, ea porro iusto corrupti tempora. Eius repudiandae recusandae, tempore minima animi perspiciatis maiores unde et accusamus repellat quia quas, autem beatae alias totam, laboriosam tenetur numquam culpa laudantium ad inventore nihil nostrum ea. Repellendus autem voluptates quis nobis aperiam asperiores cum non incidunt eos ratione, excepturi velit molestiae, dolor saepe voluptate at commodi ab architecto! Nostrum commodi obcaecati minima nulla eligendi alias ullam, vero porro, repellendus, explicabo esse voluptatem recusandae deleniti, accusamus fuga saepe eius nemo! Laborum, sint ab! Et sapiente praesentium officia accusamus quas molestias! Ab fugiat veniam, facere quo temporibus maxime culpa modi harum in. Ea, est sed optio adipisci numquam distinctio. Nam porro necessitatibus, temporibus, similique expedita illo repellendus, enim veritatis accusamus amet placeat debitis, est nobis sint maiores velit minus quidem et ipsum repudiandae. Deleniti dolores, facilis cupiditate in numquam perspiciatis quo, eligendi, neque doloremque excepturi sit autem quos qui velit officia ex. Adipisci, temporibus, consectetur ea, quia nesciunt ab sapiente est culpa nostrum unde quam incidunt, esse maiores labore. Maxime sapiente omnis, delectus totam vel in ad, dolor, qui nostrum, incidunt soluta aliquam magni. Dolore odio quaerat eaque dolorem, accusamus nihil veniam enim incidunt modi natus necessitatibus dignissimos unde culpa assumenda facere laboriosam ex quisquam laudantium nemo minus magni! Non officia eligendi fuga praesentium veritatis nam, at quam. Vel vitae quod nostrum nesciunt quas vero, amet corporis sint consectetur iure. Quibusdam possimus sequi laudantium, suscipit obcaecati voluptates repellat accusamus quam eos, dolorum, at repellendus sunt a iure ab. Totam fugiat ipsa pariatur qui, fugit debitis exercitationem eaque, nemo non consequuntur incidunt doloremque rem quos assumenda esse maiores excepturi, adipisci nisi nostrum! Provident libero, error aliquam molestiae qui reiciendis accusamus, adipisci, ex fugiat quasi maiores neque fuga numquam minima, quaerat. Temporibus dignissimos excepturi facere, dolores, aliquid provident atque, qui ducimus ea cupiditate magnam. Ullam a eum dignissimos officia aspernatur nisi eligendi exercitationem deserunt fugiat vitae odit suscipit in ducimus, natus sequi vel debitis maiores repellendus iure totam optio est odio iusto?</p>', '2019-05-02', 1, 0, NULL, 'Xả lô hàng sale up to 30%', 'images/poster/poster/2019/2019-05-02/20190502204802__MG_3799.JPG', 1, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0),
(6, '2019-05-02 13:48:16', '2019-05-02 13:48:31', 'Xả lô hàng sale up to 30%', 'xa-lo-hang-sale-up-to-30-', 'Xả lô hàng sale up to 30%', 'Xả lô hàng sale up to 30%', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, qui, omnis! Aspernatur voluptatem blanditiis assumenda tempora nisi quasi neque perspiciatis porro ad! Blanditiis voluptatem deleniti architecto, quibusdam at unde dicta recusandae. Quisquam ullam, libero quaerat, placeat ab id, repellat facere iusto aperiam laborum esse soluta. Quaerat perferendis vel doloribus odio delectus ex tenetur saepe reprehenderit veritatis, vero fugit quia, ratione repudiandae esse in iure modi molestias corporis, placeat labore. Aperiam est neque nostrum voluptatum consectetur fuga minima quam quasi repellendus tempora placeat delectus perferendis non alias repellat voluptatibus, perspiciatis dolor eveniet quibusdam, pariatur accusamus ut modi quidem, amet. Inventore maiores reprehenderit doloremque vero ad officia soluta doloribus nam magni deserunt, cupiditate quis aut saepe beatae ab. Enim vero ipsam ab sunt, harum nulla eveniet suscipit. Blanditiis doloremque tenetur perspiciatis ea praesentium deserunt, reiciendis dignissimos pariatur molestiae, obcaecati voluptatum corporis provident, necessitatibus quod laudantium architecto officia repudiandae quis. Quibusdam nesciunt consequuntur, eaque consectetur officiis culpa perferendis architecto nisi est facilis ea odio, at commodi eum cum atque illum dolores. Molestiae beatae et, voluptates mollitia esse recusandae quaerat vitae aperiam nisi, quibusdam provident quas reprehenderit eligendi voluptas voluptatibus qui. Odio molestiae ex sapiente accusamus possimus perspiciatis architecto itaque maxime fugit? Totam corporis quas natus sed est eos odio, at sit obcaecati fugiat. Delectus inventore ullam laudantium est eius, sapiente natus nobis harum eaque nostrum fugit hic voluptatem reprehenderit enim. Quasi recusandae explicabo assumenda vitae quisquam non, asperiores, temporibus optio doloribus eius perferendis nesciunt. Ab unde tempore omnis accusamus autem, necessitatibus soluta error ipsam, nam qui molestiae voluptas. Nemo nulla eligendi necessitatibus earum placeat expedita ad temporibus, reprehenderit alias! Delectus corrupti error beatae soluta optio obcaecati, natus architecto perferendis, aliquam ut. Doloremque alias modi beatae ipsa velit facilis nostrum mollitia in deserunt consequatur nobis, asperiores nemo maxime, placeat. Qui voluptate explicabo repellat reiciendis enim dignissimos similique voluptatum adipisci, excepturi vel, sint illo iure unde, animi possimus! Quidem ut, sed voluptas alias, nihil quisquam consectetur, officia perspiciatis omnis minus magnam deserunt ex! Animi cupiditate, id est! Dolorem nostrum, adipisci et debitis maiores ut iste vel vitae nemo, doloribus, odit tenetur minus earum. Voluptatum nobis tenetur, quo facere quaerat molestiae perferendis explicabo ea, soluta, recusandae maxime sit dolorum. Quisquam corrupti vel ullam, voluptates quibusdam ipsa consequuntur! Recusandae, inventore? Fugit reprehenderit accusantium nesciunt necessitatibus aliquam rerum pariatur incidunt veritatis dolor sed, aliquid laudantium a voluptate consectetur distinctio, similique accusamus, eum quisquam nihil odit ipsam, dolore iure repellendus cum. A consequuntur odit obcaecati magnam totam modi culpa ab error incidunt. Maiores ratione, voluptatem eveniet sequi quae. Culpa magni, nihil, explicabo veritatis aspernatur ipsum laudantium! Suscipit sequi, natus animi quidem laboriosam alias dicta maiores atque officia cupiditate sunt pariatur aperiam provident ab perspiciatis autem aut veniam ipsa rerum, beatae voluptatem modi deserunt! Voluptatibus et explicabo nam itaque! Quibusdam consequuntur amet libero eos animi rem dolore eum velit facere totam temporibus vero iure, ratione harum odit, laborum possimus mollitia! Perferendis facere error vero itaque aperiam dolores aliquid expedita soluta amet nobis corporis dolorem et laudantium qui eius dicta doloremque sequi, eum temporibus modi, minus sapiente iusto consequuntur. Dicta itaque recusandae saepe vitae facere dolore ducimus obcaecati, et harum magni nostrum voluptatum enim, doloribus dolores accusamus delectus, provident expedita quidem. Modi quidem est error velit provident ut eveniet necessitatibus ullam harum, debitis voluptatem nostrum voluptatum et architecto laboriosam iusto placeat! Soluta rerum harum enim perspiciatis. Dolor veritatis dolores placeat error repellendus quidem doloribus, quis voluptatibus accusamus? Eveniet unde ex sit, quidem blanditiis nesciunt voluptate in porro animi soluta molestias minima quae earum tenetur minus explicabo laborum accusamus dolor officia dignissimos ullam ipsum doloribus, rem. Nihil illum velit quisquam quis, provident culpa eius quo consequatur blanditiis veritatis dicta perferendis assumenda illo, nam mollitia, distinctio repudiandae dolores non? Natus consectetur incidunt magnam sapiente similique, nostrum corrupti odio. Deleniti numquam consequatur totam maxime, labore, nam, assumenda aliquam placeat fugit quasi quas modi voluptatem adipisci ea incidunt recusandae tempore. Culpa, pariatur dolore expedita, dignissimos magni eius numquam sint ipsam rem nulla beatae, nemo cupiditate reprehenderit ex obcaecati non cum praesentium hic, minima optio eligendi sit vero. Distinctio perferendis nobis, ea porro iusto corrupti tempora. Eius repudiandae recusandae, tempore minima animi perspiciatis maiores unde et accusamus repellat quia quas, autem beatae alias totam, laboriosam tenetur numquam culpa laudantium ad inventore nihil nostrum ea. Repellendus autem voluptates quis nobis aperiam asperiores cum non incidunt eos ratione, excepturi velit molestiae, dolor saepe voluptate at commodi ab architecto! Nostrum commodi obcaecati minima nulla eligendi alias ullam, vero porro, repellendus, explicabo esse voluptatem recusandae deleniti, accusamus fuga saepe eius nemo! Laborum, sint ab! Et sapiente praesentium officia accusamus quas molestias! Ab fugiat veniam, facere quo temporibus maxime culpa modi harum in. Ea, est sed optio adipisci numquam distinctio. Nam porro necessitatibus, temporibus, similique expedita illo repellendus, enim veritatis accusamus amet placeat debitis, est nobis sint maiores velit minus quidem et ipsum repudiandae. Deleniti dolores, facilis cupiditate in numquam perspiciatis quo, eligendi, neque doloremque excepturi sit autem quos qui velit officia ex. Adipisci, temporibus, consectetur ea, quia nesciunt ab sapiente est culpa nostrum unde quam incidunt, esse maiores labore. Maxime sapiente omnis, delectus totam vel in ad, dolor, qui nostrum, incidunt soluta aliquam magni. Dolore odio quaerat eaque dolorem, accusamus nihil veniam enim incidunt modi natus necessitatibus dignissimos unde culpa assumenda facere laboriosam ex quisquam laudantium nemo minus magni! Non officia eligendi fuga praesentium veritatis nam, at quam. Vel vitae quod nostrum nesciunt quas vero, amet corporis sint consectetur iure. Quibusdam possimus sequi laudantium, suscipit obcaecati voluptates repellat accusamus quam eos, dolorum, at repellendus sunt a iure ab. Totam fugiat ipsa pariatur qui, fugit debitis exercitationem eaque, nemo non consequuntur incidunt doloremque rem quos assumenda esse maiores excepturi, adipisci nisi nostrum! Provident libero, error aliquam molestiae qui reiciendis accusamus, adipisci, ex fugiat quasi maiores neque fuga numquam minima, quaerat. Temporibus dignissimos excepturi facere, dolores, aliquid provident atque, qui ducimus ea cupiditate magnam. Ullam a eum dignissimos officia aspernatur nisi eligendi exercitationem deserunt fugiat vitae odit suscipit in ducimus, natus sequi vel debitis maiores repellendus iure totam optio est odio iusto?</p>', '2019-05-02', 1, 0, NULL, 'Xả lô hàng sale up to 30%', 'images/poster/poster/2019/2019-05-02/20190502204816__MG_3799.JPG', 1, 1, 1, NULL, NULL, 1, 0, NULL, NULL, NULL, 0, 0),
(7, '2019-05-02 13:56:09', '2019-05-02 13:56:09', 'Sale Adidas Allstar up to 20%', 'sale-adidas-allstar-up-to-20-', 'Sale Adidas Allstar up to 20%', 'Sale Adidas Allstar up to 20%', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam sunt a quae soluta atque omnis non natus, repudiandae fugit illum distinctio sequi, provident magni quibusdam nihil sit consequatur minus commodi, aliquid voluptates eius quo excepturi aspernatur. Unde ad minus fugiat et suscipit officiis libero facilis fuga eligendi deserunt. Nemo consectetur vero aliquid accusantium voluptatum in harum debitis voluptatem minus, delectus numquam et perspiciatis animi pariatur quod soluta, reiciendis dolorum fugiat praesentium labore, rerum blanditiis assumenda unde ea dicta. Incidunt, modi inventore quis in eaque dolorem voluptatibus, repudiandae, libero distinctio expedita non odio, officia possimus. Voluptate id commodi, provident sint quidem, reiciendis ratione voluptas asperiores ipsum enim molestias temporibus obcaecati, illum vitae eius quam facilis sequi debitis, assumenda! Ipsum qui laboriosam debitis corrupti consequuntur incidunt perspiciatis suscipit mollitia nobis at veritatis maiores non illum quisquam repellendus, earum soluta! Doloremque impedit quidem vitae unde corporis! Vero commodi et adipisci, odio delectus, accusamus distinctio voluptatem, magnam sit ut facilis dolore? Esse quam pariatur suscipit accusamus, provident in beatae accusantium quod quidem facilis voluptatem iure repellat magni sapiente inventore. Fugiat maiores rerum, facere dolor quae repellendus ex cupiditate, esse, quas nemo numquam temporibus. Quaerat officiis, accusamus quasi iure corporis facere iste, voluptas maxime rerum. Perspiciatis inventore, eveniet, molestiae quae blanditiis ea, natus, accusamus optio voluptas eos ut laboriosam vero officiis aspernatur eius repudiandae adipisci numquam ratione maxime nesciunt nihil? Nostrum qui laboriosam repellendus, quod doloribus voluptas asperiores soluta illum dicta incidunt beatae labore cupiditate, dolorum libero, architecto provident odit. A labore, laudantium commodi sapiente accusantium numquam est illo minima iusto esse doloremque optio non nihil, itaque velit doloribus aspernatur cumque praesentium, sequi blanditiis, consectetur explicabo ipsam sed. Illo repellendus veniam maxime cum, itaque eveniet quasi repellat deleniti harum dignissimos labore voluptatum, pariatur dolore ipsum nihil asperiores quia eius nemo. Quod animi voluptate sit sapiente error earum ratione perferendis incidunt, eaque vero. Blanditiis facilis officiis corrupti iusto facere eligendi error earum aliquid atque cum nam sapiente et harum, unde assumenda iste delectus quisquam. Voluptates molestiae praesentium odit? Omnis quia officiis animi ipsam aut obcaecati odit harum dolore in nihil sapiente temporibus, quod eligendi esse ipsa deserunt fuga suscipit unde sed molestiae sint, voluptatibus cupiditate, consequatur architecto! Alias, aut enim ea cumque cupiditate delectus molestias at, culpa ducimus, ipsam pariatur perferendis illum deserunt iste, qui quidem minima deleniti omnis. Perspiciatis ab labore reiciendis dolore cum laudantium vero alias ducimus quos magni possimus veniam ullam, eum delectus, aut optio commodi. Aliquid ipsa, iste perspiciatis ratione. Consectetur minima ipsum voluptates dolor veniam sequi eaque nam rerum expedita velit sed eligendi, iusto ut nobis magni sapiente nihil quia dolores optio atque? Porro natus doloribus, ad neque. Magni saepe fugiat maiores accusantium explicabo quibusdam nulla asperiores eos, aperiam consectetur nesciunt facere a quis sequi commodi dolorum eaque. Assumenda cupiditate quae est vel nulla soluta, rem maiores numquam. Quas natus modi ipsa voluptates totam ullam maiores veritatis consequatur error vero officiis atque, nihil perferendis dicta ut, dignissimos, soluta labore architecto fuga quasi nisi nulla dolor! Temporibus exercitationem, alias voluptas fugiat aliquid, laboriosam aspernatur? Corporis voluptatum eum nam, dolore impedit corrupti nobis adipisci perspiciatis illum dolores cupiditate voluptate laudantium, expedita reprehenderit quis accusantium! Eos ipsam, neque harum ducimus nobis facere quisquam amet, iure cum laborum ut odio veritatis, aliquam distinctio quaerat sunt! Quas quidem eum voluptatibus aliquid eligendi, debitis eius! Eum dicta magnam nihil, nobis, consequatur ipsa exercitationem pariatur rem! Sapiente sunt blanditiis ea unde nemo magni, cum et aut quas nisi, sequi voluptatem rem reiciendis repellendus consequatur, officia beatae quasi vel cupiditate quam odio voluptatum officiis rerum. Omnis non architecto odio, reiciendis corporis ad modi nobis molestiae doloribus commodi rerum vitae, impedit expedita. Quam blanditiis rerum natus assumenda molestias doloribus enim, ipsam accusantium excepturi. Adipisci minus quas distinctio quaerat quia expedita assumenda sed corrupti maiores beatae odit totam, voluptate cum perspiciatis nulla. Dolorem quos corrupti quasi optio veniam molestias soluta, deleniti non adipisci rerum cumque incidunt illum! Nulla, minus, tenetur dignissimos quae quibusdam dolorum, et veniam iure nemo explicabo maiores magni praesentium enim. Assumenda alias doloremque debitis incidunt beatae suscipit, reprehenderit temporibus, dicta non? Rerum ipsum consequuntur provident laudantium distinctio architecto modi. Molestias perspiciatis nobis cum nostrum nesciunt in, saepe dicta blanditiis impedit. Eos deleniti ad amet ratione qui explicabo aperiam aut, obcaecati, voluptas, enim illo accusantium laborum fugiat ut nemo. Blanditiis sequi tempora consectetur odit illo perspiciatis veniam itaque voluptate modi totam aspernatur doloribus provident corporis commodi ducimus, earum consequatur nam, impedit dolores optio. Quam iste ex magni excepturi beatae quis delectus ducimus maxime obcaecati ipsa doloremque sit eos, saepe hic et distinctio accusantium cumque? Atque impedit labore quasi ex quaerat quidem voluptatum, quia, recusandae voluptas voluptates? Provident quasi impedit, dolores totam. Ut fugit libero quae tempora officiis, tenetur at earum impedit cupiditate mollitia debitis, ipsa consequatur molestiae exercitationem. Dolor, qui odit libero esse ea laudantium unde! Numquam totam rerum ducimus quidem fugit hic recusandae veritatis accusantium, cumque a vel unde optio saepe, vero harum dolorum esse distinctio eos voluptatum perferendis! Aspernatur ut dignissimos harum ullam, neque corporis obcaecati repellat nihil. Repudiandae enim magni necessitatibus, esse non odit consectetur sint sapiente, accusantium rerum quis quia, impedit porro fugit libero! Tempore porro repellat qui soluta optio ab doloribus alias impedit vitae accusamus velit deleniti nisi, cupiditate odio officiis nam deserunt perferendis nihil mollitia expedita! Eaque fugiat temporibus at, odit voluptatem perspiciatis quisquam in libero, similique obcaecati fuga quos consectetur nobis atque? Vel, aspernatur accusantium harum. Eius autem veniam perspiciatis, animi neque nemo, recusandae rem, fuga saepe placeat tempora aspernatur itaque assumenda at eligendi earum. Accusamus atque, dolor ab molestiae iure pariatur iste, cupiditate consequuntur sit quos fugiat aperiam reiciendis vero. Inventore quae nostrum sequi sunt id a hic accusamus similique cumque, ut deleniti commodi explicabo quia ea adipisci, iste molestiae esse ullam optio reprehenderit ratione ipsum impedit at sint! Explicabo quod suscipit recusandae perspiciatis hic voluptas quas molestiae alias, provident amet, non beatae incidunt dolore et ex? Iusto, facilis cupiditate dolorem quos est repellat qui quisquam tempora saepe ratione rem dignissimos iure repudiandae magnam dicta commodi odit esse quis velit alias.</p>', '2019-05-02', 1, 0, NULL, NULL, 'images/poster/poster/2019/2019-05-02/20190502205609__MG_3843.JPG', 4, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0),
(8, '2019-05-02 14:00:00', '2019-05-02 14:00:00', 'Adias Alpha bounce Secondhand 99%', 'adias-alpha-bounce-secondhand-99-', 'Adias Alpha bounce Secondhand 99%', 'Adias Alpha bounce Secondhand 99%', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero distinctio, ab officiis nihil veniam molestiae tempore expedita dicta illum aspernatur possimus delectus quam quod explicabo, repellat consequuntur corporis, architecto fugit! Distinctio quas quos quo iure. Nostrum rerum architecto eaque inventore tempore possimus, amet id eos ut velit dolore excepturi repellat unde aspernatur nemo cumque numquam sapiente harum voluptatum qui consequuntur quia delectus quo distinctio? Eaque, necessitatibus. Dolorum tempore, recusandae aut, eaque rerum iusto neque blanditiis expedita maiores, porro esse repudiandae inventore aspernatur. Corporis sequi mollitia nisi fugit ad quis reiciendis, eum ipsum rerum, facilis, expedita aut beatae! Facilis dolorem reiciendis in esse iusto magni incidunt vel odit quis, iste! Quam consectetur quis optio deserunt eligendi? Atque laudantium dolorum totam recusandae facilis esse, ipsum nulla, aperiam asperiores ex, iusto illo eligendi, voluptates facere. Corporis velit, dolorem? Maxime ducimus, ex laudantium? Labore animi rerum suscipit cumque ut modi pariatur cum temporibus, doloremque deserunt, neque quo, nesciunt tenetur. Eum beatae architecto illo necessitatibus, nemo asperiores minima magnam nostrum natus atque iste expedita odit, dolorem quos itaque eius recusandae accusantium libero fuga a animi sed? Recusandae fugiat labore magni ducimus vero officiis asperiores, id nemo laborum architecto accusantium, sunt soluta rerum molestiae. Fuga dolorem nobis obcaecati, doloremque! Est distinctio sequi quis quam laborum, aliquam quibusdam, corporis hic. Labore rerum nisi asperiores sequi, quod iure temporibus est ut quam unde porro, laudantium nostrum nam ab ea vero, aliquam nobis quo ducimus molestiae inventore! Eligendi excepturi saepe libero a, porro quod aspernatur deleniti. Commodi, earum a reprehenderit esse quisquam, itaque, iste sapiente dolores doloribus atque modi voluptatibus aperiam! Aspernatur iure suscipit in consequuntur. Quae ratione, assumenda quod sapiente cupiditate eius esse deleniti nesciunt. Veritatis dolorum ut tempora, fugiat assumenda perspiciatis ducimus saepe hic minus harum eum illum facilis. Rem, harum illum eum culpa incidunt vero expedita repellendus eos at vel explicabo ut reiciendis recusandae soluta nostrum molestias et dicta repudiandae cum ipsam doloremque, ratione beatae unde nihil. Provident corporis ullam minima, aliquid qui cumque! Non dolore et laudantium repellat id perferendis, deleniti assumenda temporibus nihil aperiam. Veniam, dolorum inventore dolore optio illum odio ea, ex omnis pariatur minus nemo, nobis minima necessitatibus voluptate maiores cupiditate ab saepe. Odit optio voluptatibus laudantium, iusto ad maxime libero. Sit ratione et numquam fugiat optio at, voluptatum quam, dolore modi id temporibus vitae blanditiis quod provident, quia est perspiciatis mollitia voluptas laborum molestiae necessitatibus! Tenetur reprehenderit voluptatem tempora saepe officia architecto, ea, culpa ipsum consequuntur reiciendis enim, fuga quos? Optio ab voluptatum voluptatibus atque odit, esse nostrum pariatur alias harum provident quod nesciunt quisquam eum. Laborum, veniam velit blanditiis, sequi, ipsam dolorem ex sit porro possimus, incidunt quas non quos? Nihil rerum vero eligendi. Recusandae possimus architecto voluptates, aliquam dicta consequatur nam illum praesentium excepturi est, esse enim doloremque repudiandae sequi maiores ratione blanditiis et ut suscipit aut neque error quos voluptate obcaecati facilis. Quidem veniam, possimus amet! Quo provident repellendus nemo esse, dignissimos harum atque, delectus numquam recusandae ratione autem dolores sunt tempora assumenda praesentium voluptate nostrum nam ipsa eius magni accusamus quidem ea. Error a nisi repellendus quis aliquam reprehenderit vel expedita, maiores vitae, nostrum libero omnis est cupiditate ducimus, dicta. Voluptates in modi necessitatibus mollitia illum molestias pariatur! Quas necessitatibus, obcaecati mollitia animi enim a placeat minima nostrum voluptatibus, nihil, at consequatur, velit. Beatae maiores, nemo voluptatem commodi accusantium, illum quia ad possimus necessitatibus debitis nostrum aliquam repellendus tempore. Quo dolores sequi molestiae eaque autem vitae distinctio quas, fugit, earum. Veritatis ipsam atque omnis quia optio expedita incidunt accusantium praesentium qui repellat, repudiandae inventore? Vel atque dicta voluptates earum, debitis dolor pariatur doloribus ab repellendus architecto aperiam minus adipisci tempora repudiandae cumque et magnam! Sit inventore facilis, similique suscipit iure reiciendis eveniet voluptatum ipsam ullam, a quos sequi illum cumque corrupti culpa maiores, error alias quo magni officia voluptate temporibus excepturi fuga! Magni quisquam reiciendis excepturi voluptatibus cupiditate nobis, minus repellat dolorem ipsa dolorum voluptas doloremque hic sed, vitae quasi, fugiat adipisci odit amet id eius velit, omnis nihil est consequatur autem. Eveniet eaque, facere quos, quae qui rerum fugit consectetur accusantium vero suscipit aliquid, deserunt in possimus iusto alias voluptas est adipisci. Rerum odio eaque, id, veritatis beatae, ea consectetur molestias nesciunt magni ipsum mollitia, ad! Recusandae odio laborum, dolorum est, alias vitae adipisci? Vitae nisi, illum consequuntur perferendis voluptatem odit debitis porro facere enim quaerat qui incidunt omnis eveniet hic, itaque cumque pariatur inventore, ipsam dignissimos, ad quis. Ullam sit ipsam suscipit, rem provident deleniti facilis sequi aliquid doloremque aspernatur incidunt velit quos perferendis saepe delectus rerum consequuntur ipsum eius exercitationem cupiditate, temporibus culpa, molestias natus. Sunt laudantium esse dolorem, dignissimos praesentium dolorum cumque, nihil beatae dolore velit voluptatibus optio voluptate porro modi in, repellat provident ex magnam, libero aliquam voluptas eaque. Aperiam ipsum reprehenderit, quis eius repellendus veritatis rem maxime a suscipit laboriosam eaque, pariatur maiores quasi alias ducimus cumque consequuntur accusamus ullam amet! Corporis odio ducimus deserunt asperiores tempore, ex, et, obcaecati fuga quasi, laboriosam facere neque commodi! Neque, voluptatem expedita aspernatur autem iure minima inventore vero, eligendi similique asperiores aut id iusto optio officiis consectetur ea tempora corporis dolorem et at? Deleniti cupiditate iste tempora sint voluptas quo aliquam quos quasi aperiam vero, eveniet accusantium dolor fugiat in magnam non odit qui praesentium, laudantium dicta. Molestiae, eum saepe assumenda sapiente natus minus ipsa expedita deserunt minima quidem iusto voluptatibus, odio dicta inventore eaque maxime, in modi sunt quia error, enim eius necessitatibus atque itaque. Eius, ex repudiandae non! Modi impedit laudantium ut quas incidunt nobis, quod natus hic iure, eaque perspiciatis omnis ad fugiat minima quam provident ratione! Fugiat praesentium esse est quos, impedit quasi nesciunt consequatur vitae, exercitationem alias atque repellat eligendi quo modi nihil quis! Quam molestias, sit eius culpa quod non neque pariatur explicabo ratione minima dolorem nam impedit nobis est eligendi, expedita, in aut repudiandae ducimus beatae dignissimos itaque. Modi doloribus, nulla, tempora odio quos sit quidem deserunt nobis cum quisquam rerum labore ex asperiores. Excepturi, perspiciatis, ea. Assumenda, accusantium dolorum commodi corrupti labore officiis modi porro nobis.</p>', '2019-05-02', 1, 0, NULL, NULL, 'images/poster/poster/2019/2019-05-02/20190502210000__MG_3866.JPG', 5, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0),
(9, '2019-05-02 14:04:08', '2019-05-02 14:04:08', 'New Balance - Limited Orange size 8 EU', 'new-balance-limited-orange-size-8-eu', 'New Balance - Limited Orange size 8 EU - Only one', 'New Balance - Limited Orange size 8 EU - Only one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero distinctio, ab officiis nihil veniam molestiae tempore expedita dicta illum aspernatur possimus delectus quam quod explicabo, repellat consequuntur corporis, architecto fugit! Distinctio quas quos quo iure. Nostrum rerum architecto eaque inventore tempore possimus, amet id eos ut velit dolore excepturi repellat unde aspernatur nemo cumque numquam sapiente harum voluptatum qui consequuntur quia delectus quo distinctio? Eaque, necessitatibus. Dolorum tempore, recusandae aut, eaque rerum iusto neque blanditiis expedita maiores, porro esse repudiandae inventore aspernatur. Corporis sequi mollitia nisi fugit ad quis reiciendis, eum ipsum rerum, facilis, expedita aut beatae! Facilis dolorem reiciendis in esse iusto magni incidunt vel odit quis, iste! Quam consectetur quis optio deserunt eligendi? Atque laudantium dolorum totam recusandae facilis esse, ipsum nulla, aperiam asperiores ex, iusto illo eligendi, voluptates facere. Corporis velit, dolorem? Maxime ducimus, ex laudantium? Labore animi rerum suscipit cumque ut modi pariatur cum temporibus, doloremque deserunt, neque quo, nesciunt tenetur. Eum beatae architecto illo necessitatibus, nemo asperiores minima magnam nostrum natus atque iste expedita odit, dolorem quos itaque eius recusandae accusantium libero fuga a animi sed? Recusandae fugiat labore magni ducimus vero officiis asperiores, id nemo laborum architecto accusantium, sunt soluta rerum molestiae. Fuga dolorem nobis obcaecati, doloremque! Est distinctio sequi quis quam laborum, aliquam quibusdam, corporis hic. Labore rerum nisi asperiores sequi, quod iure temporibus est ut quam unde porro, laudantium nostrum nam ab ea vero, aliquam nobis quo ducimus molestiae inventore! Eligendi excepturi saepe libero a, porro quod aspernatur deleniti. Commodi, earum a reprehenderit esse quisquam, itaque, iste sapiente dolores doloribus atque modi voluptatibus aperiam! Aspernatur iure suscipit in consequuntur. Quae ratione, assumenda quod sapiente cupiditate eius esse deleniti nesciunt. Veritatis dolorum ut tempora, fugiat assumenda perspiciatis ducimus saepe hic minus harum eum illum facilis. Rem, harum illum eum culpa incidunt vero expedita repellendus eos at vel explicabo ut reiciendis recusandae soluta nostrum molestias et dicta repudiandae cum ipsam doloremque, ratione beatae unde nihil. Provident corporis ullam minima, aliquid qui cumque! Non dolore et laudantium repellat id perferendis, deleniti assumenda temporibus nihil aperiam. Veniam, dolorum inventore dolore optio illum odio ea, ex omnis pariatur minus nemo, nobis minima necessitatibus voluptate maiores cupiditate ab saepe. Odit optio voluptatibus laudantium, iusto ad maxime libero. Sit ratione et numquam fugiat optio at, voluptatum quam, dolore modi id temporibus vitae blanditiis quod provident, quia est perspiciatis mollitia voluptas laborum molestiae necessitatibus! Tenetur reprehenderit voluptatem tempora saepe officia architecto, ea, culpa ipsum consequuntur reiciendis enim, fuga quos? Optio ab voluptatum voluptatibus atque odit, esse nostrum pariatur alias harum provident quod nesciunt quisquam eum. Laborum, veniam velit blanditiis, sequi, ipsam dolorem ex sit porro possimus, incidunt quas non quos? Nihil rerum vero eligendi. Recusandae possimus architecto voluptates, aliquam dicta consequatur nam illum praesentium excepturi est, esse enim doloremque repudiandae sequi maiores ratione blanditiis et ut suscipit aut neque error quos voluptate obcaecati facilis. Quidem veniam, possimus amet! Quo provident repellendus nemo esse, dignissimos harum atque, delectus numquam recusandae ratione autem dolores sunt tempora assumenda praesentium voluptate nostrum nam ipsa eius magni accusamus quidem ea. Error a nisi repellendus quis aliquam reprehenderit vel expedita, maiores vitae, nostrum libero omnis est cupiditate ducimus, dicta. Voluptates in modi necessitatibus mollitia illum molestias pariatur! Quas necessitatibus, obcaecati mollitia animi enim a placeat minima nostrum voluptatibus, nihil, at consequatur, velit. Beatae maiores, nemo voluptatem commodi accusantium, illum quia ad possimus necessitatibus debitis nostrum aliquam repellendus tempore. Quo dolores sequi molestiae eaque autem vitae distinctio quas, fugit, earum. Veritatis ipsam atque omnis quia optio expedita incidunt accusantium praesentium qui repellat, repudiandae inventore? Vel atque dicta voluptates earum, debitis dolor pariatur doloribus ab repellendus architecto aperiam minus adipisci tempora repudiandae cumque et magnam! Sit inventore facilis, similique suscipit iure reiciendis eveniet voluptatum ipsam ullam, a quos sequi illum cumque corrupti culpa maiores, error alias quo magni officia voluptate temporibus excepturi fuga! Magni quisquam reiciendis excepturi voluptatibus cupiditate nobis, minus repellat dolorem ipsa dolorum voluptas doloremque hic sed, vitae quasi, fugiat adipisci odit amet id eius velit, omnis nihil est consequatur autem. Eveniet eaque, facere quos, quae qui rerum fugit consectetur accusantium vero suscipit aliquid, deserunt in possimus iusto alias voluptas est adipisci. Rerum odio eaque, id, veritatis beatae, ea consectetur molestias nesciunt magni ipsum mollitia, ad! Recusandae odio laborum, dolorum est, alias vitae adipisci? Vitae nisi, illum consequuntur perferendis voluptatem odit debitis porro facere enim quaerat qui incidunt omnis eveniet hic, itaque cumque pariatur inventore, ipsam dignissimos, ad quis. Ullam sit ipsam suscipit, rem provident deleniti facilis sequi aliquid doloremque aspernatur incidunt velit quos perferendis saepe delectus rerum consequuntur ipsum eius exercitationem cupiditate, temporibus culpa, molestias natus. Sunt laudantium esse dolorem, dignissimos praesentium dolorum cumque, nihil beatae dolore velit voluptatibus optio voluptate porro modi in, repellat provident ex magnam, libero aliquam voluptas eaque. Aperiam ipsum reprehenderit, quis eius repellendus veritatis rem maxime a suscipit laboriosam eaque, pariatur maiores quasi alias ducimus cumque consequuntur accusamus ullam amet! Corporis odio ducimus deserunt asperiores tempore, ex, et, obcaecati fuga quasi, laboriosam facere neque commodi! Neque, voluptatem expedita aspernatur autem iure minima inventore vero, eligendi similique asperiores aut id iusto optio officiis consectetur ea tempora corporis dolorem et at? Deleniti cupiditate iste tempora sint voluptas quo aliquam quos quasi aperiam vero, eveniet accusantium dolor fugiat in magnam non odit qui praesentium, laudantium dicta. Molestiae, eum saepe assumenda sapiente natus minus ipsa expedita deserunt minima quidem iusto voluptatibus, odio dicta inventore eaque maxime, in modi sunt quia error, enim eius necessitatibus atque itaque. Eius, ex repudiandae non! Modi impedit laudantium ut quas incidunt nobis, quod natus hic iure, eaque perspiciatis omnis ad fugiat minima quam provident ratione! Fugiat praesentium esse est quos, impedit quasi nesciunt consequatur vitae, exercitationem alias atque repellat eligendi quo modi nihil quis! Quam molestias, sit eius culpa quod non neque pariatur explicabo ratione minima dolorem nam impedit nobis est eligendi, expedita, in aut repudiandae ducimus beatae dignissimos itaque. Modi doloribus, nulla, tempora odio quos sit quidem deserunt nobis cum quisquam rerum labore ex asperiores. Excepturi, perspiciatis, ea. Assumenda, accusantium dolorum commodi corrupti labore officiis modi porro nobis.</p>', '2019-05-02', 1, 0, NULL, NULL, 'images/poster/poster/2019/2019-05-02/20190502210408__MG_3899.JPG', 6, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0),
(10, '2019-05-02 14:38:43', '2019-05-02 14:38:43', 'Nike Men\'s Flyknit Trainer Training Shoe', 'nike-men-s-flyknit-trainer-training-shoe', 'Nike Men\'s Flyknit Trainer Training Shoe', 'As expected (89%). Find the right size for you', '<h2>NIKE FLYKNIT TECHNOLOGYInspired by our most common feedback from runners, Nike engineered a fabric that fits like a sock,<br />\r\nwith the support and durability for sport.</h2>\r\n\r\n<p><img alt=\"Flyknit_Innovation_CDP_P5_Desktop.jpg\" src=\"https://content.nike.com/content/dam/one-nike/en_us/season-2017-fl/home/0929-flyknit-cdp/Flyknit_Innovation_CDP_P5_Desktop.jpg.transform/full-screen/Flyknit_Innovation_CDP_P5_Desktop.jpg\" /></p>\r\n\r\n<h2>WHAT IS NIKE FLYKNIT?A material made up of strong yet lightweight strands of yarn that have been woven<br />\r\ninto a one-piece upper, securing an athlete&rsquo;s foot to the shoe platform.</h2>\r\n\r\n<p><img alt=\"Flyknit_Innovation_CDP_P6_Desktop.jpg\" src=\"https://content.nike.com/content/dam/one-nike/en_us/season-2017-fl/home/0929-flyknit-cdp/Flyknit_Innovation_CDP_P6_Desktop.jpg.transform/full-screen/Flyknit_Innovation_CDP_P6_Desktop.jpg\" /></p>\r\n\r\n<form action=\"https://www.amazon.com/gp/product/handle-buy-box/ref=dp_start-bbf_1_glance\" id=\"twister\" method=\"post\">\r\n<ul>\r\n	<li>\r\n	<p><img alt=\"Velvet Brown/Neutral Olive\" src=\"https://images-na.ssl-images-amazon.com/images/I/41h-g4GR7BL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"White / Gum Light Brown\" src=\"https://images-na.ssl-images-amazon.com/images/I/41gmcmfzmWL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"University Red/Black-white\" src=\"https://images-na.ssl-images-amazon.com/images/I/41Eqy8566QL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"Black/Black-white\" src=\"https://images-na.ssl-images-amazon.com/images/I/41hOInYViqL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"Atmosphere Grey / Thunder Grey-vast Grey\" src=\"https://images-na.ssl-images-amazon.com/images/I/51pTMpZ0WHL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"Black/Anthracite/Black\" src=\"https://images-na.ssl-images-amazon.com/images/I/41karUI0dhL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"Golden Beige/Black-black-gum Light Brown\" src=\"https://images-na.ssl-images-amazon.com/images/I/41Iawf%2B5pDL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"Cirrus Blue/Black\" src=\"https://images-na.ssl-images-amazon.com/images/I/51nKEasM4sL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"Atmosphere Grey/Thunder Grey\" src=\"https://images-na.ssl-images-amazon.com/images/I/51TsNIQmqOL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"Black, Anthracite-black\" src=\"https://images-na.ssl-images-amazon.com/images/I/41karUI0dhL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>\r\n	<p><img alt=\"Red - Red\" src=\"https://images-na.ssl-images-amazon.com/images/I/51nKEasM4sL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"Black/Black/White\" src=\"https://images-na.ssl-images-amazon.com/images/I/31XJA7FrRcL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"Light Armory Blue/Armory Navy-armory Slate\" src=\"https://images-na.ssl-images-amazon.com/images/I/418fyB%2Bg-rL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"Ale Brown/Ale Brown/Blk/Nbl Rd\" src=\"https://images-na.ssl-images-amazon.com/images/I/51nKEasM4sL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"Black/White\" src=\"https://images-na.ssl-images-amazon.com/images/I/41hOInYViqL._SS47_.jpg\" /></p>\r\n	</li>\r\n	<li>&nbsp;</li>\r\n	<li>\r\n	<p><img alt=\"Cirrus Blue/Black/White\" src=\"https://images-na.ssl-images-amazon.com/images/I/51nKEasM4sL._SS47_.jpg\" /></p>\r\n	</li>\r\n</ul>\r\n</form>\r\n\r\n<ul>\r\n	<li>Fabric</li>\r\n	<li>Rubber sole</li>\r\n	<li>Adaptive Flyknit upper for lightweight comfort and unmatched breathability</li>\r\n	<li>Lacing system with Flywire cables provides lightweight support</li>\r\n	<li>Forefoot and heel Zoom Air units for responsive cushioning</li>\r\n	<li>Rubber waffle outsole for durable traction</li>\r\n	<li>Reinforced outsole pods add durability in high-wear areas</li>\r\n</ul>', '2019-05-02', 1, 0, NULL, NULL, 'images/poster/poster/2019/2019-05-02/20190502213843__MG_3904.JPG', 7, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_products_posters_comments`
--

CREATE TABLE `m_products_posters_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `products_posters_id` int(10) UNSIGNED NOT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `context` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_products_posters_details`
--

CREATE TABLE `m_products_posters_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `products_posters_id` int(10) UNSIGNED NOT NULL,
  `products_colours_id` int(10) UNSIGNED NOT NULL,
  `manufactories` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quality` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'New 100%',
  `storage` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `price` int(10) UNSIGNED NOT NULL,
  `max_buying` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `description_short` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keyword` text COLLATE utf8_unicode_ci,
  `seo_description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_products_posters_details`
--

INSERT INTO `m_products_posters_details` (`id`, `created_at`, `updated_at`, `name`, `alias`, `products_posters_id`, `products_colours_id`, `manufactories`, `quality`, `storage`, `price`, `max_buying`, `description_short`, `description`, `ordering`, `published`, `seo_title`, `seo_keyword`, `seo_description`) VALUES
(1, '2019-05-02 13:53:49', '2019-05-02 13:53:49', 'Brown Lighter', 'brown-lighter', 5, 4, 'EU', 'New', 999, 2300000, 1, NULL, NULL, 1, 1, NULL, NULL, NULL),
(2, '2019-05-02 13:54:16', '2019-05-02 13:54:16', 'Brown', 'brown', 5, 1, 'EU', 'New', 500, 3000000, 1, NULL, NULL, 1, 1, NULL, NULL, NULL),
(3, '2019-05-02 13:56:35', '2019-05-02 13:56:35', 'White', 'white', 7, 1, 'EU', 'New', 3, 1999000, 1, NULL, NULL, 1, 1, NULL, NULL, NULL),
(4, '2019-05-02 14:01:55', '2019-05-02 14:01:55', 'Purple 99%', 'purple-99-', 8, 1, NULL, 'SecondHand 99%', 20, 1500000, 1, NULL, NULL, 1, 1, NULL, NULL, NULL),
(5, '2019-05-02 14:02:21', '2019-05-02 14:02:21', 'Purple New', 'purple-new', 8, 1, NULL, 'New', 1, 2500000, 1, NULL, NULL, 1, 1, NULL, NULL, NULL),
(6, '2019-05-02 14:05:29', '2019-05-02 14:05:29', 'Size 8 - Orange', 'size-8-orange', 9, 2, NULL, 'New', 2, 5999000, 1, NULL, NULL, 1, 1, NULL, NULL, NULL),
(7, '2019-05-02 14:39:34', '2019-05-02 14:39:34', 'Red', 'red', 10, 2, NULL, 'New', 100, 1650000, 1, NULL, NULL, 1, 1, NULL, NULL, NULL),
(8, '2019-05-02 14:39:47', '2019-05-02 14:39:47', 'White', 'white', 10, 1, NULL, 'New', 20, 1650000, 1, NULL, NULL, 1, 1, NULL, NULL, NULL),
(9, '2019-05-02 14:40:08', '2019-05-02 14:40:08', 'Blue', 'blue', 10, 3, NULL, 'New', 99, 1650000, 1, NULL, NULL, 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_products_posters_images`
--

CREATE TABLE `m_products_posters_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `products_posters_id` int(10) UNSIGNED NOT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'images/noimages.jpg',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_products_posters_images`
--

INSERT INTO `m_products_posters_images` (`id`, `created_at`, `updated_at`, `products_posters_id`, `customers_id`, `image`, `ordering`, `published`) VALUES
(1, '2019-05-02 13:49:10', '2019-05-02 13:49:10', 5, 1, 'images/products/products/2019/2019-05-02/20190502204910__MG_3799.JPG', 1, 1),
(2, '2019-05-02 13:49:20', '2019-05-02 13:49:20', 5, 1, 'images/products/products/2019/2019-05-02/20190502204920__MG_3802.JPG', 1, 1),
(3, '2019-05-02 13:49:20', '2019-05-02 13:49:20', 5, 1, 'images/products/products/2019/2019-05-02/20190502204920__MG_3818.JPG', 1, 1),
(4, '2019-05-02 13:53:03', '2019-05-02 13:53:03', 5, 1, 'images/products/products/2019/2019-05-02/20190502205303__MG_3813.JPG', 1, 1),
(5, '2019-05-02 13:53:03', '2019-05-02 13:53:03', 5, 1, 'images/products/products/2019/2019-05-02/20190502205303__MG_3815.JPG', 1, 1),
(6, '2019-05-02 13:53:12', '2019-05-02 13:53:12', 5, 1, 'images/products/products/2019/2019-05-02/20190502205312__MG_3816.JPG', 1, 1),
(7, '2019-05-02 13:57:00', '2019-05-02 13:57:00', 7, 1, 'images/products/products/2019/2019-05-02/20190502205700__MG_3843.JPG', 1, 1),
(8, '2019-05-02 13:57:00', '2019-05-02 13:57:00', 7, 1, 'images/products/products/2019/2019-05-02/20190502205700__MG_3845.JPG', 1, 1),
(9, '2019-05-02 13:57:09', '2019-05-02 13:57:09', 7, 1, 'images/products/products/2019/2019-05-02/20190502205709__MG_3846.JPG', 1, 1),
(10, '2019-05-02 13:57:09', '2019-05-02 13:57:09', 7, 1, 'images/products/products/2019/2019-05-02/20190502205709__MG_3850.JPG', 1, 1),
(11, '2019-05-02 13:57:24', '2019-05-02 13:57:24', 7, 1, 'images/products/products/2019/2019-05-02/20190502205724__MG_3851.JPG', 1, 1),
(12, '2019-05-02 14:00:18', '2019-05-02 14:00:18', 8, 1, 'images/products/products/2019/2019-05-02/20190502210018__MG_3866.JPG', 1, 1),
(13, '2019-05-02 14:00:26', '2019-05-02 14:00:26', 8, 1, 'images/products/products/2019/2019-05-02/20190502210026__MG_3861.JPG', 1, 1),
(14, '2019-05-02 14:04:20', '2019-05-02 14:04:20', 9, 1, 'images/products/products/2019/2019-05-02/20190502210420__MG_3899.JPG', 1, 1),
(15, '2019-05-02 14:04:20', '2019-05-02 14:04:20', 9, 1, 'images/products/products/2019/2019-05-02/20190502210420__MG_3900.JPG', 1, 1),
(16, '2019-05-02 14:04:26', '2019-05-02 14:04:26', 9, 1, 'images/products/products/2019/2019-05-02/20190502210426__MG_3903.JPG', 1, 1),
(17, '2019-05-02 14:38:58', '2019-05-02 14:38:58', 10, 1, 'images/products/products/2019/2019-05-02/20190502213858__MG_3904.JPG', 1, 1),
(18, '2019-05-02 14:38:58', '2019-05-02 14:38:58', 10, 1, 'images/products/products/2019/2019-05-02/20190502213858__MG_3907.JPG', 1, 1),
(19, '2019-05-02 14:39:06', '2019-05-02 14:39:06', 10, 1, 'images/products/products/2019/2019-05-02/20190502213906__MG_3908.JPG', 1, 1),
(20, '2019-05-02 14:39:06', '2019-05-02 14:39:06', 10, 1, 'images/products/products/2019/2019-05-02/20190502213906__MG_3909.JPG', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_products_types`
--

CREATE TABLE `m_products_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `products_categories_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'images/noimages.jpg',
  `icon` text COLLATE utf8_unicode_ci,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `description_short` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_products_types`
--

INSERT INTO `m_products_types` (`id`, `created_at`, `updated_at`, `name`, `alias`, `products_categories_id`, `image`, `icon`, `published`, `ordering`, `description_short`, `description`) VALUES
(1, '2019-04-24 06:04:47', '2019-04-24 06:04:47', 'Newest Sneakers', 'newest-sneakers', 1, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(2, '2019-04-24 06:04:52', '2019-04-24 06:04:52', 'Lifestyle', 'lifestyle', 1, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(3, '2019-04-24 06:04:54', '2019-04-24 06:04:54', 'Running', 'running', 1, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(4, '2019-04-24 06:04:57', '2019-04-24 06:04:57', 'Jordan', 'jordan', 1, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(5, '2019-04-24 06:05:00', '2019-04-24 06:05:00', 'Basketball', 'basketball', 1, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(6, '2019-04-24 06:05:04', '2019-04-24 06:05:04', 'Gym & Training', 'gym-training', 1, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(7, '2019-04-24 06:05:06', '2019-04-24 06:05:06', 'Skateboarding', 'skateboarding', 1, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(8, '2019-04-24 06:05:09', '2019-04-24 06:05:09', 'Tennis', 'tennis', 1, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(9, '2019-04-24 06:05:12', '2019-04-24 06:05:12', 'Cricket', 'cricket', 1, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(10, '2019-04-24 06:05:15', '2019-04-24 06:05:15', 'Sandals & Flip Flops', 'sandals-flip-flops', 1, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(11, '2019-04-24 06:05:18', '2019-04-24 06:05:18', 'Customise with Nike By You', 'customise-with-nike-by-you', 1, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(12, '2019-04-24 06:05:32', '2019-04-24 06:05:32', 'Tops & T-Shirts', 'tops-t-shirts', 2, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(13, '2019-04-24 06:05:36', '2019-04-24 06:05:36', 'Jerseys & Kits', 'jerseys-kits', 2, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(14, '2019-04-24 06:05:40', '2019-04-24 06:05:40', 'Hoodies & Sweatshirts', 'hoodies-sweatshirts', 2, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(15, '2019-04-24 06:05:44', '2019-04-24 06:05:44', 'Jackets & Gilets', 'jackets-gilets', 2, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(16, '2019-04-24 06:05:53', '2019-04-24 06:05:53', 'Trousers & Tights', 'trousers-tights', 2, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(17, '2019-04-24 06:05:58', '2019-04-24 06:05:58', 'Compression & Nike Pro', 'compression-nike-pro', 2, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(18, '2019-04-24 06:06:02', '2019-04-24 06:06:02', 'Shorts', 'shorts', 2, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(19, '2019-04-24 06:06:06', '2019-04-24 06:06:06', 'Caps', 'caps', 2, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(20, '2019-04-24 06:06:11', '2019-04-24 06:06:11', 'Socks', 'socks', 2, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL),
(21, '2019-04-24 06:06:15', '2019-04-24 06:06:15', 'Accessories & Equipment', 'accessories-equipment', 2, 'images/noimages.jpg', 'images/noimages.jpg', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_products_videos`
--

CREATE TABLE `m_products_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_short` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keyword` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_products_videos`
--

INSERT INTO `m_products_videos` (`id`, `name`, `alias`, `title`, `video`, `description_short`, `description`, `created_at`, `updated_at`, `customers_id`, `published`, `ordering`, `seo_title`, `seo_keyword`) VALUES
(1, 'ádasdasd', '', 'ádas', 'dấd', NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_searchs`
--

CREATE TABLE `m_searchs` (
  `id` int(10) UNSIGNED NOT NULL,
  `key_word` text COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_slides`
--

CREATE TABLE `m_slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'images/noimages.jpg',
  `summary` text COLLATE utf8_unicode_ci,
  `description_short` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `slides_categories_id` int(10) UNSIGNED NOT NULL,
  `action_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_slides`
--

INSERT INTO `m_slides` (`id`, `name`, `alias`, `url`, `image`, `summary`, `description_short`, `description`, `created_at`, `updated_at`, `published`, `ordering`, `slides_categories_id`, `action_id`) VALUES
(1, 'New collection', 'store_introduction', '', 'images/slides/slide4.jpg', 'Which brings the most wonderful things', NULL, NULL, NULL, NULL, 1, 1, 1, NULL),
(2, 'Women’s clothing', 'store_introduction', '', 'images/slides/slide5.jpg', 'Which brings the most wonderful things', NULL, NULL, NULL, NULL, 1, 1, 1, NULL),
(3, 'New fashion men’s', 'store_introduction', '', 'images/slides/slide6.jpg', 'Which brings the most wonderful things', NULL, NULL, NULL, NULL, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_slides_categories`
--

CREATE TABLE `m_slides_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `width` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '100%',
  `height` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '600px',
  `width_small` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '80%',
  `height_small` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '400px',
  `description_short` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `action_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_slides_categories`
--

INSERT INTO `m_slides_categories` (`id`, `name`, `alias`, `published`, `ordering`, `created_at`, `updated_at`, `width`, `height`, `width_small`, `height_small`, `description_short`, `description`, `action_id`) VALUES
(1, 'Store introduction', 'store_introduction', 1, 0, NULL, NULL, '100%', '600px', '80%', '400px', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_strengs`
--

CREATE TABLE `m_strengs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'realestate@gmail.com', '$2y$10$sZad/PrSl8A0vSIbF6fzL.i5VXUarzivW3fZGCkEf1KN/cgFBTR7m', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_customers`
--
ALTER TABLE `m_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_customers_email_unique` (`email`);

--
-- Indexes for table `m_customers_addresses`
--
ALTER TABLE `m_customers_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_customers_addresses_customers_id_foreign` (`customers_id`);

--
-- Indexes for table `m_customers_carts`
--
ALTER TABLE `m_customers_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_customers_carts_customers_id_foreign` (`customers_id`),
  ADD KEY `m_customers_carts_products_posters_details_id_foreign` (`products_posters_details_id`);

--
-- Indexes for table `m_customers_messages`
--
ALTER TABLE `m_customers_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_customers_messages_customers_id_send_foreign` (`customers_id_send`),
  ADD KEY `m_customers_messages_custommer_id_receive_foreign` (`custommer_id_receive`);

--
-- Indexes for table `m_customers_orders`
--
ALTER TABLE `m_customers_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_customers_orders_order_id_unique` (`order_id`),
  ADD KEY `m_customers_orders_customers_id_foreign` (`customers_id`),
  ADD KEY `m_customers_orders_customers_addresses_id_foreign` (`customers_addresses_id`);

--
-- Indexes for table `m_customers_orders_details`
--
ALTER TABLE `m_customers_orders_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_customers_orders_details_products_posters_details_id_foreign` (`products_posters_details_id`),
  ADD KEY `m_customers_orders_details_customers_orders_id_foreign` (`customers_orders_id`);

--
-- Indexes for table `m_managers`
--
ALTER TABLE `m_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_managers_permissions`
--
ALTER TABLE `m_managers_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_managers_permissions_managers_id_foreign` (`managers_id`),
  ADD KEY `m_managers_permissions_permissions_id_foreign` (`permissions_id`);

--
-- Indexes for table `m_menu_groups`
--
ALTER TABLE `m_menu_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_menu_groups_group_name_unique` (`group_name`);

--
-- Indexes for table `m_menu_items`
--
ALTER TABLE `m_menu_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_menu_items_name_unique` (`name`),
  ADD KEY `m_menu_items_menu_groups_id_foreign` (`menu_groups_id`);

--
-- Indexes for table `m_news`
--
ALTER TABLE `m_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_news_news_categories_id_foreign` (`news_categories_id`);

--
-- Indexes for table `m_news_categories`
--
ALTER TABLE `m_news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_news_comments`
--
ALTER TABLE `m_news_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_news_comments_news_id_foreign` (`news_id`),
  ADD KEY `m_news_comments_customers_id_foreign` (`customers_id`);

--
-- Indexes for table `m_news_images`
--
ALTER TABLE `m_news_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_news_images_news_images_groups_id_foreign` (`news_images_groups_id`);

--
-- Indexes for table `m_news_images_groups`
--
ALTER TABLE `m_news_images_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_news_likes`
--
ALTER TABLE `m_news_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_news_likes_news_id_foreign` (`news_id`),
  ADD KEY `m_news_likes_customers_id_foreign` (`customers_id`);

--
-- Indexes for table `m_permissions`
--
ALTER TABLE `m_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_products`
--
ALTER TABLE `m_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_products_name_unique` (`name`),
  ADD KEY `m_products_products_types_id_foreign` (`products_types_id`),
  ADD KEY `m_products_products_brands_id_foreign` (`products_brands_id`),
  ADD KEY `m_products_customers_id_foreign` (`customers_id`);

--
-- Indexes for table `m_products_brands`
--
ALTER TABLE `m_products_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_products_categories`
--
ALTER TABLE `m_products_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_products_colours`
--
ALTER TABLE `m_products_colours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_products_posters`
--
ALTER TABLE `m_products_posters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_products_posters_products_id_foreign` (`products_id`),
  ADD KEY `m_products_posters_products_videos_id_foreign` (`products_videos_id`),
  ADD KEY `m_products_posters_customers_id_foreign` (`customers_id`);

--
-- Indexes for table `m_products_posters_comments`
--
ALTER TABLE `m_products_posters_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_products_posters_comments_products_posters_id_foreign` (`products_posters_id`),
  ADD KEY `m_products_posters_comments_customers_id_foreign` (`customers_id`);

--
-- Indexes for table `m_products_posters_details`
--
ALTER TABLE `m_products_posters_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_products_posters_details_products_posters_id_foreign` (`products_posters_id`),
  ADD KEY `m_products_posters_details_products_colours_id_foreign` (`products_colours_id`);

--
-- Indexes for table `m_products_posters_images`
--
ALTER TABLE `m_products_posters_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_products_posters_images_products_posters_id_foreign` (`products_posters_id`),
  ADD KEY `m_products_posters_images_customers_id_foreign` (`customers_id`);

--
-- Indexes for table `m_products_types`
--
ALTER TABLE `m_products_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_products_types_products_categories_id_foreign` (`products_categories_id`);

--
-- Indexes for table `m_products_videos`
--
ALTER TABLE `m_products_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_products_videos_customers_id_foreign` (`customers_id`);

--
-- Indexes for table `m_searchs`
--
ALTER TABLE `m_searchs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_slides`
--
ALTER TABLE `m_slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_slides_slides_categories_id_foreign` (`slides_categories_id`);

--
-- Indexes for table `m_slides_categories`
--
ALTER TABLE `m_slides_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_strengs`
--
ALTER TABLE `m_strengs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `m_customers`
--
ALTER TABLE `m_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_customers_addresses`
--
ALTER TABLE `m_customers_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_customers_carts`
--
ALTER TABLE `m_customers_carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_customers_messages`
--
ALTER TABLE `m_customers_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_customers_orders`
--
ALTER TABLE `m_customers_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_customers_orders_details`
--
ALTER TABLE `m_customers_orders_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_managers`
--
ALTER TABLE `m_managers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_managers_permissions`
--
ALTER TABLE `m_managers_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_menu_groups`
--
ALTER TABLE `m_menu_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_menu_items`
--
ALTER TABLE `m_menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_news`
--
ALTER TABLE `m_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_news_categories`
--
ALTER TABLE `m_news_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `m_news_comments`
--
ALTER TABLE `m_news_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_news_images`
--
ALTER TABLE `m_news_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_news_images_groups`
--
ALTER TABLE `m_news_images_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_news_likes`
--
ALTER TABLE `m_news_likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_permissions`
--
ALTER TABLE `m_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_products`
--
ALTER TABLE `m_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `m_products_brands`
--
ALTER TABLE `m_products_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_products_categories`
--
ALTER TABLE `m_products_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_products_colours`
--
ALTER TABLE `m_products_colours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_products_posters`
--
ALTER TABLE `m_products_posters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `m_products_posters_comments`
--
ALTER TABLE `m_products_posters_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_products_posters_details`
--
ALTER TABLE `m_products_posters_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_products_posters_images`
--
ALTER TABLE `m_products_posters_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `m_products_types`
--
ALTER TABLE `m_products_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `m_products_videos`
--
ALTER TABLE `m_products_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_searchs`
--
ALTER TABLE `m_searchs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_slides`
--
ALTER TABLE `m_slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_slides_categories`
--
ALTER TABLE `m_slides_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_strengs`
--
ALTER TABLE `m_strengs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_customers_addresses`
--
ALTER TABLE `m_customers_addresses`
  ADD CONSTRAINT `m_customers_addresses_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `m_customers` (`id`);

--
-- Constraints for table `m_customers_carts`
--
ALTER TABLE `m_customers_carts`
  ADD CONSTRAINT `m_customers_carts_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `m_customers` (`id`),
  ADD CONSTRAINT `m_customers_carts_products_posters_details_id_foreign` FOREIGN KEY (`products_posters_details_id`) REFERENCES `m_products_posters_details` (`id`);

--
-- Constraints for table `m_customers_messages`
--
ALTER TABLE `m_customers_messages`
  ADD CONSTRAINT `m_customers_messages_customers_id_send_foreign` FOREIGN KEY (`customers_id_send`) REFERENCES `m_customers` (`id`),
  ADD CONSTRAINT `m_customers_messages_custommer_id_receive_foreign` FOREIGN KEY (`custommer_id_receive`) REFERENCES `m_customers` (`id`);

--
-- Constraints for table `m_customers_orders`
--
ALTER TABLE `m_customers_orders`
  ADD CONSTRAINT `m_customers_orders_customers_addresses_id_foreign` FOREIGN KEY (`customers_addresses_id`) REFERENCES `m_customers_addresses` (`id`),
  ADD CONSTRAINT `m_customers_orders_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `m_customers` (`id`);

--
-- Constraints for table `m_customers_orders_details`
--
ALTER TABLE `m_customers_orders_details`
  ADD CONSTRAINT `m_customers_orders_details_customers_orders_id_foreign` FOREIGN KEY (`customers_orders_id`) REFERENCES `m_customers_orders` (`order_id`),
  ADD CONSTRAINT `m_customers_orders_details_products_posters_details_id_foreign` FOREIGN KEY (`products_posters_details_id`) REFERENCES `m_products_posters_details` (`id`);

--
-- Constraints for table `m_managers_permissions`
--
ALTER TABLE `m_managers_permissions`
  ADD CONSTRAINT `m_managers_permissions_managers_id_foreign` FOREIGN KEY (`managers_id`) REFERENCES `m_managers` (`id`),
  ADD CONSTRAINT `m_managers_permissions_permissions_id_foreign` FOREIGN KEY (`permissions_id`) REFERENCES `m_permissions` (`id`);

--
-- Constraints for table `m_menu_items`
--
ALTER TABLE `m_menu_items`
  ADD CONSTRAINT `m_menu_items_menu_groups_id_foreign` FOREIGN KEY (`menu_groups_id`) REFERENCES `m_menu_groups` (`id`);

--
-- Constraints for table `m_news`
--
ALTER TABLE `m_news`
  ADD CONSTRAINT `m_news_news_categories_id_foreign` FOREIGN KEY (`news_categories_id`) REFERENCES `m_news_categories` (`id`);

--
-- Constraints for table `m_news_comments`
--
ALTER TABLE `m_news_comments`
  ADD CONSTRAINT `m_news_comments_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `m_customers` (`id`),
  ADD CONSTRAINT `m_news_comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `m_news` (`id`);

--
-- Constraints for table `m_news_images`
--
ALTER TABLE `m_news_images`
  ADD CONSTRAINT `m_news_images_news_images_groups_id_foreign` FOREIGN KEY (`news_images_groups_id`) REFERENCES `m_news_images_groups` (`id`);

--
-- Constraints for table `m_news_likes`
--
ALTER TABLE `m_news_likes`
  ADD CONSTRAINT `m_news_likes_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `m_customers` (`id`),
  ADD CONSTRAINT `m_news_likes_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `m_news` (`id`);

--
-- Constraints for table `m_products`
--
ALTER TABLE `m_products`
  ADD CONSTRAINT `m_products_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `m_customers` (`id`),
  ADD CONSTRAINT `m_products_products_brands_id_foreign` FOREIGN KEY (`products_brands_id`) REFERENCES `m_products_brands` (`id`),
  ADD CONSTRAINT `m_products_products_types_id_foreign` FOREIGN KEY (`products_types_id`) REFERENCES `m_products_types` (`id`);

--
-- Constraints for table `m_products_posters`
--
ALTER TABLE `m_products_posters`
  ADD CONSTRAINT `m_products_posters_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `m_customers` (`id`),
  ADD CONSTRAINT `m_products_posters_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `m_products` (`id`),
  ADD CONSTRAINT `m_products_posters_products_videos_id_foreign` FOREIGN KEY (`products_videos_id`) REFERENCES `m_products_videos` (`id`);

--
-- Constraints for table `m_products_posters_comments`
--
ALTER TABLE `m_products_posters_comments`
  ADD CONSTRAINT `m_products_posters_comments_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `m_customers` (`id`),
  ADD CONSTRAINT `m_products_posters_comments_products_posters_id_foreign` FOREIGN KEY (`products_posters_id`) REFERENCES `m_products_posters` (`id`);

--
-- Constraints for table `m_products_posters_details`
--
ALTER TABLE `m_products_posters_details`
  ADD CONSTRAINT `m_products_posters_details_products_colours_id_foreign` FOREIGN KEY (`products_colours_id`) REFERENCES `m_products_colours` (`id`),
  ADD CONSTRAINT `m_products_posters_details_products_posters_id_foreign` FOREIGN KEY (`products_posters_id`) REFERENCES `m_products_posters` (`id`);

--
-- Constraints for table `m_products_posters_images`
--
ALTER TABLE `m_products_posters_images`
  ADD CONSTRAINT `m_products_posters_images_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `m_customers` (`id`),
  ADD CONSTRAINT `m_products_posters_images_products_posters_id_foreign` FOREIGN KEY (`products_posters_id`) REFERENCES `m_products_posters` (`id`);

--
-- Constraints for table `m_products_types`
--
ALTER TABLE `m_products_types`
  ADD CONSTRAINT `m_products_types_products_categories_id_foreign` FOREIGN KEY (`products_categories_id`) REFERENCES `m_products_categories` (`id`);

--
-- Constraints for table `m_products_videos`
--
ALTER TABLE `m_products_videos`
  ADD CONSTRAINT `m_products_videos_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `m_customers` (`id`);

--
-- Constraints for table `m_slides`
--
ALTER TABLE `m_slides`
  ADD CONSTRAINT `m_slides_slides_categories_id_foreign` FOREIGN KEY (`slides_categories_id`) REFERENCES `m_slides_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
