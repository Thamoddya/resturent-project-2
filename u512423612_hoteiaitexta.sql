-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 25, 2024 at 09:22 AM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u512423612_hoteiaitexta`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `hotel_id`, `created_at`, `updated_at`) VALUES
(1, 'OMLET', 1, '2024-10-19 04:48:59', '2024-10-19 04:48:59'),
(2, 'GRILD', 1, '2024-10-19 04:52:27', '2024-10-19 04:52:27'),
(3, 'BBQ', 1, '2024-10-19 04:53:20', '2024-10-19 04:53:20'),
(4, 'DRINK', 1, '2024-10-19 04:53:31', '2024-10-19 04:53:31'),
(5, 'DESURT', 1, '2024-10-19 04:53:41', '2024-10-19 04:53:41'),
(6, 'CHOPCY', 1, '2024-10-19 04:54:07', '2024-10-19 04:54:07'),
(7, 'RICE&CURRY', 1, '2024-10-19 04:54:17', '2024-10-19 04:54:17'),
(8, 'SALAD', 1, '2024-10-19 04:54:29', '2024-10-19 04:54:29'),
(9, 'SOUP', 1, '2024-10-19 04:54:38', '2024-10-19 04:54:38'),
(10, 'STEW', 1, '2024-10-19 04:54:48', '2024-10-19 04:54:48'),
(11, 'RICE', 1, '2024-10-19 04:54:59', '2024-10-19 04:54:59'),
(12, 'NOODLES', 1, '2024-10-19 04:55:06', '2024-10-19 04:55:06'),
(13, 'NOODLES', 1, '2024-10-19 04:55:06', '2024-10-19 04:55:06'),
(14, 'KOTTU', 1, '2024-10-19 04:55:14', '2024-10-19 04:55:14'),
(15, 'DEVAL', 1, '2024-10-19 04:55:24', '2024-10-19 04:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_email` varchar(255) NOT NULL,
  `hotel_image_path` text DEFAULT NULL,
  `table_count` int(11) DEFAULT 0,
  `hotel_id` varchar(255) NOT NULL,
  `hotel_address` varchar(255) NOT NULL,
  `hotel_mobile` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `hotel_name`, `hotel_email`, `hotel_image_path`, `table_count`, `hotel_id`, `hotel_address`, `hotel_mobile`, `created_at`, `updated_at`) VALUES
(1, 'WALAWA RICH HOTEL AND RESTURANT', 'Naudayanga@gmail.com', '/images/hotels/hotel_1729312990_671338de71dfd.png', 0, '671338de71', 'No 72 ekamuthu Gama sewanagala', '94712638085', '2024-10-19 04:43:10', '2024-10-19 04:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_image_path` varchar(255) NOT NULL,
  `menu_available` int(11) NOT NULL DEFAULT 1,
  `menu_description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `hotel_id`, `category_id`, `menu_name`, `menu_image_path`, `menu_available`, `menu_description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Plain Omlet', '/images/menus/menu1729847205_671b5fa5c21cd.jpeg', 1, 'a dish made from eggs, fried with butter or oil in a frying pan.', '2024-10-19 04:57:08', '2024-10-25 09:06:45'),
(2, 1, 1, 'Omlet Srilanka', '/images/menus/menu1729314193_67133d914e3a5.jpg', 1, 'Sri Lankan omelet is a flavorful dish made with eggs, often enriched with spices, onions, and sometimes green chilies, creating a unique and vibrant taste.', '2024-10-19 05:03:13', '2024-10-19 05:03:13'),
(3, 1, 1, 'Chees Omlet', '/images/menus/menu1729314540_67133eec577b8.jpg', 1, 'A cheese omelet is a fluffy egg dish filled with melted cheese, often seasoned with herbs and spices for added flavor.', '2024-10-19 05:09:00', '2024-10-19 05:09:00'),
(4, 1, 1, 'Chiken Omlet', '/images/menus/menu1729314701_67133f8d0ef2b.jpg', 1, 'A chicken omelet is a hearty dish made with beaten eggs and filled with cooked chicken, often complemented by vegetables and seasonings.', '2024-10-19 05:11:41', '2024-10-19 05:11:41'),
(5, 1, 1, 'seafood omelette', '/images/menus/menu1729315360_6713422087c80.jpg', 1, 'A seafood omelet is a flavorful dish made with beaten eggs and filled with a mix of seafood, such as shrimp, crab, and fish, often seasoned with herbs and spices.', '2024-10-19 05:22:40', '2024-10-19 05:22:40'),
(6, 1, 1, 'Mix Omlet', '/images/menus/menu1729315774_671343be3b65f.jpg', 1, 'A mixed omelet is a versatile dish made with beaten eggs and a combination of various ingredients like vegetables, meats, and cheeses, creating a hearty and flavorful meal.', '2024-10-19 05:29:34', '2024-10-19 05:29:34'),
(7, 1, 1, 'Special Omlet', '/images/menus/menu1729315949_6713446dd2056.webp', 1, 'A special omelet features a unique blend of ingredients such as gourmet cheeses, fresh herbs, and assorted vegetables or meats, elevating the classic egg dish to a delightful gourmet experience.', '2024-10-19 05:32:29', '2024-10-19 05:32:29'),
(9, 1, 2, 'sizziling pork 300g', '/images/menus/menu1729316344_671345f8a9a18.jpg', 1, 'Sizzling pork is a savory dish featuring tender, marinated pork served on a hot plate, often accompanied by vegetables and a flavorful sauce, creating a dramatic presentation and irresistible aroma.', '2024-10-19 05:39:04', '2024-10-19 05:39:04'),
(10, 1, 2, 'sizzling chicken', '/images/menus/menu1729316460_6713466c9112e.jpg', 1, 'Sizzling chicken is a vibrant dish of marinated chicken served on a hot plate, often accompanied by vegetables and a savory sauce, delivering a delightful sizzle and aroma.', '2024-10-19 05:41:00', '2024-10-19 05:41:00'),
(11, 1, 2, 'sizzling beef', '/images/menus/menu1729316720_6713477067727.jpg', 1, 'Sizzling beef is a flavorful dish of tender beef strips cooked to perfection and served on a hot plate, often accompanied by vegetables and a rich sauce that enhances its savory taste.', '2024-10-19 05:45:20', '2024-10-19 05:45:20'),
(12, 1, 2, 'sizzling mixed grill', '/images/menus/menu1729316852_671347f4ce6cb.jpg', 1, 'Sizzling mixed grill is a hearty dish featuring an assortment of marinated meats, such as chicken, beef, and lamb, served on a hot plate with vibrant vegetables, creating a delicious and aromatic meal.', '2024-10-19 05:47:32', '2024-10-19 05:47:32'),
(57, 1, 11, 'vegetable rice', '/images/menus/menu1729847314_671b6012bceb1.jpg', 1, 'Vegetable rice is a flavorful dish made with rice and a mix of fresh vegetables, often seasoned with herbs and spices for a nutritious and colorful meal.', '2024-10-21 06:32:51', '2024-10-25 09:08:34'),
(58, 1, 11, 'chicken rice', '/images/menus/menu1729847361_671b60411d380.jpg', 1, 'Chicken rice is a savory dish consisting of tender poached or roasted chicken served with fragrant rice cooked in chicken broth, often accompanied by flavorful sauces.', '2024-10-21 06:36:25', '2024-10-25 09:09:21'),
(59, 1, 11, 'seafood rice', '/images/menus/menu1729492787_6715f733e9ac3.jpg', 1, 'Seafood rice is a vibrant dish made with a mix of fresh seafood, such as shrimp, mussels, and fish, combined with seasoned rice, often infused with aromatic spices and herbs.', '2024-10-21 06:39:47', '2024-10-21 06:39:47'),
(60, 1, 11, 'mix rice', '/images/menus/menu1729492976_6715f7f0e7951.jpg', 1, 'Mixed rice is a hearty dish that combines various types of rice with an assortment of vegetables, proteins, and spices, creating a colorful and flavorful medley.', '2024-10-21 06:42:56', '2024-10-21 06:42:56'),
(61, 1, 11, 'nasi goreng rice', '/images/menus/menu1729493133_6715f88d04537.jpeg', 1, 'Nasi goreng is a flavorful Indonesian fried rice dish, typically stir-fried with a mix of vegetables, proteins, and seasoned with soy sauce, garlic, and sambal for a spicy kick.', '2024-10-21 06:45:33', '2024-10-21 06:45:33'),
(62, 1, 11, 'fish rice', '/images/menus/menu1729493262_6715f90e9339e.jpg', 1, 'Fish rice is a hearty dish featuring tender fish fillets served over seasoned rice, often accompanied by herbs and spices that enhance the dish\'s flavor.', '2024-10-21 06:47:42', '2024-10-21 06:47:42'),
(63, 1, 11, 'Mongolian rice', '/images/menus/menu1729493400_6715f99867d6f.jpg', 1, 'Mongolian rice is a savory dish made with stir-fried rice, mixed vegetables, and marinated meats, typically seasoned with soy sauce and spices for a delicious, hearty meal.', '2024-10-21 06:50:00', '2024-10-21 06:50:00'),
(64, 1, 11, 'thai fried rice', '/images/menus/menu1729493529_6715fa1992423.jpg', 1, 'Thai fried rice is a fragrant dish featuring stir-fried rice tossed with vegetables, proteins, and Thai herbs, often seasoned with soy sauce and lime for a zesty flavor.', '2024-10-21 06:52:09', '2024-10-21 06:52:09'),
(65, 1, 11, 'dragon rice', '/images/menus/menu1729493657_6715fa99c5dd3.jpg', 1, 'Dragon rice is a vibrant dish typically featuring colorful vegetables, spices, and sometimes seafood or meat, known for its bold flavors and eye-catching presentation.', '2024-10-21 06:54:17', '2024-10-21 06:54:17'),
(66, 1, 11, 'special fried rice', '/images/menus/menu1729493771_6715fb0b633df.jpg', 1, 'Special fried rice is a delicious dish that combines rice with a variety of proteins, vegetables, and seasonings, often topped with a fried egg for added richness.', '2024-10-21 06:56:11', '2024-10-21 06:56:11'),
(67, 1, 12, 'vegetable noodles', '/images/menus/menu1729493892_6715fb8484640.jpg', 1, 'Vegetable noodles are a wholesome dish made with stir-fried or sautéed noodles mixed with a colorful assortment of fresh vegetables and flavored with savory sauces and spices.', '2024-10-21 06:58:12', '2024-10-21 06:58:12'),
(68, 1, 12, 'egg noodles', '/images/menus/menu1729494058_6715fc2a75909.jpg', 1, 'Egg noodles are versatile pasta made with eggs and flour, known for their rich flavor and chewy texture, often used in soups, stir-fries, and casseroles.', '2024-10-21 07:00:58', '2024-10-21 07:00:58'),
(69, 1, 12, 'chicken noodles', '/images/menus/menu1729494337_6715fd41b74f9.jpg', 1, 'Chicken noodles are a hearty dish made with tender chicken and noodles, often stir-fried or served in a savory broth with vegetables and seasonings.', '2024-10-21 07:05:37', '2024-10-21 07:05:37'),
(70, 1, 12, 'seafood noodles', '/images/menus/menu1729494462_6715fdbed1ca4.jpg', 1, 'Seafood noodles are a flavorful dish that combines a variety of seafood, such as shrimp and squid, with noodles stir-fried or served in a rich broth, often seasoned with aromatic herbs and spices.', '2024-10-21 07:07:43', '2024-10-21 07:07:43'),
(71, 1, 12, 'mix noodles', '/images/menus/menu1729494883_6715ff6382313.webp', 1, 'Mixed noodles are a delicious dish featuring a variety of noodles tossed together with an assortment of vegetables, proteins, and savory sauces for a flavorful and satisfying meal.', '2024-10-21 07:14:43', '2024-10-21 07:14:43'),
(72, 1, 14, 'vegetable kottu', '/images/menus/menu1729495484_671601bc9eb2c.jpg', 1, 'Vegetable kottu is a traditional Sri Lankan dish made with chopped roti stir-fried with a mix of vegetables, spices, and aromatic curry flavors, creating a hearty and satisfying meal.', '2024-10-21 07:24:44', '2024-10-21 07:24:44'),
(73, 1, 14, 'egg kottu', '/images/menus/menu1729496221_6716049d70d63.jpg', 1, 'Egg kottu is a flavorful Sri Lankan dish made with chopped roti stir-fried with scrambled eggs, vegetables, and spices, resulting in a hearty and delicious meal.', '2024-10-21 07:37:01', '2024-10-21 07:37:01'),
(74, 1, 14, 'chicken kottu', '/images/menus/menu1729496334_6716050e030a9.jpg', 1, 'Chicken kottu is a popular Sri Lankan dish made with chopped roti stir-fried with tender chicken pieces, vegetables, and aromatic spices for a hearty and flavorful meal.', '2024-10-21 07:38:54', '2024-10-21 07:38:54'),
(75, 1, 14, 'seafood kottu', '/images/menus/menu1729496518_671605c68c70c.jpg', 1, 'Seafood kottu is a delicious Sri Lankan dish made with chopped roti stir-fried with a mix of fresh seafood, vegetables, and fragrant spices, offering a savory and satisfying experience.', '2024-10-21 07:41:58', '2024-10-21 07:41:58'),
(76, 1, 14, 'mix kottu', '/images/menus/menu1729496988_6716079cecc0c.webp', 1, 'Mixed kottu is a flavorful Sri Lankan dish made with chopped roti stir-fried with a combination of meats, vegetables, and spices, creating a hearty and diverse meal.', '2024-10-21 07:49:48', '2024-10-21 07:49:48'),
(77, 1, 14, 'cheese kottu', '/images/menus/menu1729497106_67160812a8f32.jpg', 1, 'Cheese kottu is a decadent twist on the traditional Sri Lankan dish, featuring chopped roti stir-fried with melted cheese, vegetables, and spices for a creamy and flavorful experience.', '2024-10-21 07:51:46', '2024-10-21 07:51:46'),
(78, 1, 14, 'special kottu', '/images/menus/menu1729497256_671608a8e947e.jpg', 1, 'Special kottu is a vibrant Sri Lankan dish that combines chopped roti with a variety of proteins, vegetables, and spices, often topped with a fried egg for an extra layer of flavor.', '2024-10-21 07:54:16', '2024-10-21 07:54:16'),
(79, 1, 15, 'chicken devilled', '/images/menus/menu1729497402_6716093a62dd6.jpg', 1, 'Chicken devilled is a spicy Sri Lankan dish made with tender chicken pieces stir-fried in a tangy sauce with onions, peppers, and aromatic spices for a bold and flavorful experience.', '2024-10-21 07:56:42', '2024-10-21 07:56:42'),
(80, 1, 15, 'pork devilled', '/images/menus/menu1729497476_6716098465b52.jpg', 1, 'Pork devilled is a spicy Sri Lankan dish featuring tender pork pieces stir-fried in a tangy sauce with peppers, onions, and bold spices, offering a deliciously rich flavor profile.', '2024-10-21 07:57:56', '2024-10-21 07:57:56'),
(81, 1, 15, 'beef devilled', '/images/menus/menu1729497555_671609d3111fa.jpg', 1, 'Beef devilled is a flavorful Sri Lankan dish made with tender beef pieces stir-fried in a spicy, tangy sauce with peppers and onions, creating a bold and savory meal.', '2024-10-21 07:59:15', '2024-10-21 07:59:15'),
(82, 1, 15, 'fish devilled', '/images/menus/menu1729497687_67160a57efc07.jpg', 1, 'Fish devilled is a zesty Sri Lankan dish made with marinated fish pieces stir-fried in a spicy, tangy sauce with onions and peppers, delivering a deliciously bold flavor.', '2024-10-21 08:01:27', '2024-10-21 08:01:27'),
(83, 1, 15, 'soseges devilled', '/images/menus/menu1729499703_671612370d3da.webp', 1, 'Sausages devilled is a spicy Sri Lankan dish featuring sliced sausages stir-fried with onions, peppers, and a tangy sauce, creating a flavorful and satisfying meal.', '2024-10-21 08:35:03', '2024-10-21 08:35:03'),
(84, 1, 15, 'Frawns devilled', '/images/menus/menu1729499828_671612b4e490c.webp', 1, 'Prawns devilled is a spicy Sri Lankan dish made with succulent prawns stir-fried in a tangy sauce with onions and peppers, offering a bold and flavorful seafood experience.', '2024-10-21 08:37:08', '2024-10-21 08:37:08'),
(85, 1, 15, 'chicken stew', '/images/menus/menu1729500274_67161472616b7.webp', 1, 'Chicken stew is a comforting dish made with tender chicken simmered in a rich broth with vegetables and aromatic spices, creating a hearty and flavorful meal.', '2024-10-21 08:44:34', '2024-10-21 08:44:34'),
(86, 1, 15, 'pork stew', '/images/menus/menu1729500392_671614e81e5b6.jpg', 1, 'Pork stew is a savory dish made with tender chunks of pork slow-cooked in a flavorful broth with vegetables and herbs, resulting in a rich and hearty meal.', '2024-10-21 08:46:32', '2024-10-21 08:46:32'),
(87, 1, 15, 'beef stew', '/images/menus/menu1729500504_671615588e4c4.jpg', 1, 'Beef stew is a hearty dish featuring tender beef simmered with vegetables and aromatic spices in a rich, savory broth, perfect for a comforting meal.', '2024-10-21 08:48:24', '2024-10-21 08:48:24'),
(88, 1, 15, 'fish stew', '/images/menus/menu1729500721_67161631ec8c5.jpg', 1, 'Fish stew is a flavorful dish made with tender fish simmered in a rich broth with vegetables, herbs, and spices, creating a delicious and comforting meal.', '2024-10-21 08:52:01', '2024-10-21 08:52:01'),
(89, 1, 3, 'BBQ', '/images/menus/menu1729500970_6716172aee471.webp', 1, 'BBQ is a cooking method and culinary style that involves grilling or smoking meat, often marinated or seasoned, and served with tangy sauces, creating a smoky, flavorful experience.', '2024-10-21 08:56:10', '2024-10-21 08:56:10'),
(90, 1, 4, 'lime juice', '/images/menus/menu1729501143_671617d7c2c80.webp', 1, 'Lime juice is a tangy and refreshing liquid extracted from limes, commonly used in beverages, dressings, and marinades to enhance flavors with its bright acidity.', '2024-10-21 08:59:03', '2024-10-21 08:59:03'),
(91, 1, 4, 'watermelon juice', '/images/menus/menu1729501233_6716183154865.jpg', 1, 'Watermelon juice is a refreshing beverage made from pureed watermelon, offering a sweet and hydrating taste that\'s perfect for hot days.', '2024-10-21 09:00:33', '2024-10-21 09:00:33'),
(92, 1, 4, 'avocado juice', '/images/menus/menu1729501689_671619f93fda3.jpg', 1, 'Avocado juice is a creamy and nutritious drink made by blending ripe avocados with water, milk, or juice, often sweetened and flavored for a rich, smooth taste.', '2024-10-21 09:08:09', '2024-10-21 09:08:09'),
(93, 1, 4, 'anoda juice', '/images/menus/menu1729501779_67161a537d64b.jpg', 1, 'Anoda juice, made from the fruit of the anoda tree, offers a sweet and tangy flavor, often enjoyed for its refreshing taste and health benefits.', '2024-10-21 09:09:39', '2024-10-21 09:09:39'),
(94, 1, 4, 'mango juice', '/images/menus/menu1729501857_67161aa1ab14f.jpg', 1, 'Mango juice is a deliciously sweet and tropical beverage made from ripe mangoes, known for its vibrant flavor and refreshing qualities.', '2024-10-21 09:10:57', '2024-10-21 09:10:57'),
(95, 1, 4, 'wood apple juice', '/images/menus/menu1729501957_67161b057d23b.jpg', 1, 'Wood apple juice is a unique beverage made from the pulp of the wood apple fruit, offering a sweet and tangy flavor that is both refreshing and nutritious.', '2024-10-21 09:12:37', '2024-10-21 09:12:37'),
(96, 1, 4, 'orange juice', '/images/menus/menu1729502026_67161b4a762d3.jpg', 1, 'Orange juice is a bright and refreshing beverage made from freshly squeezed oranges, known for its sweet and tangy flavor and rich vitamin C content.', '2024-10-21 09:13:46', '2024-10-21 09:13:46'),
(97, 1, 4, 'Milk shake chokolat', '/images/menus/menu1729502393_67161cb985658.jpeg', 1, 'Chocolate milkshake is a creamy and indulgent drink made by blending milk, ice cream, and chocolate syrup, creating a rich and satisfying treat.', '2024-10-21 09:19:53', '2024-10-21 09:19:53'),
(98, 1, 4, 'Milk shake chokolat vanila', '/images/menus/menu1729502496_67161d200ff7d.jpg', 1, 'Chocolate vanilla milkshake is a delightful blend of creamy vanilla ice cream and rich chocolate syrup, creating a smooth and indulgent treat.', '2024-10-21 09:21:36', '2024-10-21 09:21:36'),
(99, 1, 4, 'mix fruit juice', '/images/menus/menu1729502593_67161d81bb9bb.jpg', 1, 'Mixed fruit juice is a vibrant beverage made from a combination of various fresh fruits, offering a refreshing and flavorful drink packed with vitamins and nutrients.', '2024-10-21 09:23:13', '2024-10-21 09:23:13'),
(100, 1, 5, 'hot ice cream', '/images/menus/menu1729502698_67161dea7ef91.jpg', 1, 'Hot ice cream is a unique dessert that features warm, often gooey toppings or a warm base paired with cold ice cream, creating a delightful contrast of temperatures and flavors.', '2024-10-21 09:24:58', '2024-10-21 09:24:58'),
(101, 1, 5, 'skimmed milk (with kithul paani)', '/images/menus/menu1729502887_67161ea7d859e.jpg', 1, 'Skimmed milk with kithul paani is a refreshing beverage that combines light, creamy skimmed milk with the natural sweetness of kithul treacle, offering a nutritious and flavorful drink.', '2024-10-21 09:28:07', '2024-10-21 09:28:07'),
(102, 1, 5, 'food salad', '/images/menus/menu1729503020_67161f2c0d1ee.jpg', 1, 'Food salad is a colorful dish made with a variety of fresh vegetables, fruits, and proteins, often tossed in a light dressing for a nutritious and refreshing meal.', '2024-10-21 09:30:20', '2024-10-21 09:30:20'),
(103, 1, 5, 'chocolate ice cream', '/images/menus/menu1729503098_67161f7a389c8.jpg', 1, 'Chocolate ice cream is a rich and creamy frozen dessert made with cocoa or melted chocolate, offering a delightful and indulgent treat for chocolate lovers.', '2024-10-21 09:31:38', '2024-10-21 09:31:38'),
(104, 1, 5, 'vanilla ice cream', '/images/menus/menu1729503193_67161fd96ec53.webp', 1, 'Vanilla ice cream is a classic frozen dessert made with creamy dairy and real vanilla extract, known for its smooth texture and subtle, sweet flavor.', '2024-10-21 09:33:13', '2024-10-21 09:33:13'),
(105, 1, 6, 'vegetable chopcy', '/images/menus/menu1729503378_671620920bbdc.jpg', 1, 'Vegetable chopcy is a savory dish made with finely chopped vegetables, stir-fried with spices and seasonings, often served as a flavorful side or filling for wraps and rolls.', '2024-10-21 09:36:18', '2024-10-21 09:36:18'),
(106, 1, 6, 'egg chopcy', '/images/menus/menu1729503685_671621c54a309.png', 1, 'Egg chopcy is a flavorful dish made with chopped eggs sautéed with spices and vegetables, often enjoyed as a filling for wraps or served as a side dish.', '2024-10-21 09:41:25', '2024-10-21 09:41:25'),
(107, 1, 6, 'chicken chopcy', '/images/menus/menu1729503915_671622ab7050b.jpg', 1, 'Chicken chopcy is a savory dish made with finely chopped chicken stir-fried with spices and vegetables, creating a delicious and flavorful meal or filling.', '2024-10-21 09:45:15', '2024-10-21 09:45:15'),
(108, 1, 6, 'sea food chopcy', '/images/menus/menu1729504012_6716230c9f54c.jpg', 1, 'Seafood chopcy is a delectable dish made with finely chopped seafood, such as shrimp and fish, sautéed with spices and vegetables for a flavorful and aromatic meal.', '2024-10-21 09:46:52', '2024-10-21 09:46:52'),
(109, 1, 6, 'mix chopsuey', '/images/menus/menu1729504201_671623c9ec6f3.jpg', 1, 'Mix chopcy is a vibrant dish featuring a combination of chopped meats and vegetables, stir-fried with spices for a flavorful and hearty meal.', '2024-10-21 09:50:01', '2024-10-21 09:50:01'),
(110, 1, 6, 'chopsuey seafood rice', '/images/menus/menu1729504378_6716247ae0dbd.jpg', 1, 'Chopsuey seafood rice is a flavorful dish that combines stir-fried seafood and colorful vegetables over a bed of rice, often enhanced with savory sauces for a delicious meal.', '2024-10-21 09:52:58', '2024-10-21 09:52:58'),
(111, 1, 6, 'chopsuey rice mix', '/images/menus/menu1729504522_6716250ac2657.jpg', 1, 'Chopcy rice mix is a hearty dish made with stir-fried rice combined with finely chopped vegetables and proteins, seasoned with spices for a flavorful and satisfying meal.', '2024-10-21 09:55:22', '2024-10-21 09:55:22'),
(112, 1, 6, 'Walawa reach special uet rice', '/images/menus/menu1729504647_6716258704d5c.jpg', 1, 'Special rice is a fragrant dish featuring a blend of rice cooked with a variety of spices, vegetables, and meats, creating a rich and flavorful meal.', '2024-10-21 09:57:27', '2024-10-21 09:57:27'),
(113, 1, 7, 'vegetable rice and curry', '/images/menus/menu1729504718_671625ce8d635.jpeg', 1, 'Vegetable rice and curry is a wholesome meal consisting of fragrant rice served alongside a flavorful curry made with a variety of fresh vegetables and aromatic spices.', '2024-10-21 09:58:38', '2024-10-21 09:58:38'),
(114, 1, 7, 'egg rice and curry', '/images/menus/menu1729504791_671626175b909.jpg', 1, 'Egg rice and curry is a comforting dish featuring fluffy rice served with a rich and flavorful curry made with boiled or scrambled eggs and spices.', '2024-10-21 09:59:51', '2024-10-21 09:59:51'),
(115, 1, 7, 'fish rice and curry', '/images/menus/menu1729504874_6716266a6c020.jpg', 1, 'Fish rice and curry is a delicious meal that pairs fragrant rice with a spicy, flavorful curry made from tender fish and aromatic spices.', '2024-10-21 10:01:14', '2024-10-21 10:01:14'),
(116, 1, 7, 'chicken rice and curry', '/images/menus/menu1729504974_671626ce0748d.jpg', 1, 'Chicken rice and curry is a hearty dish featuring fragrant rice served with tender chicken cooked in a rich and flavorful curry sauce, often accompanied by aromatic spices.', '2024-10-21 10:02:54', '2024-10-21 10:02:54'),
(117, 1, 7, 'pork rice and curry', '/images/menus/menu1729505081_67162739ad340.jpg', 1, 'Pork rice and curry is a satisfying meal that combines fluffy rice with tender pork cooked in a rich, spicy curry, offering a flavorful and hearty experience.', '2024-10-21 10:04:41', '2024-10-21 10:04:41'),
(118, 1, 7, 'beef rice and curry', '/images/menus/menu1729505231_671627cf9a952.jpg', 1, 'Beef rice and curry is a flavorful dish featuring tender beef simmered in a rich curry sauce, served alongside fragrant rice for a hearty meal.', '2024-10-21 10:07:11', '2024-10-21 10:07:11'),
(119, 1, 8, 'mix salad', '/images/menus/menu1729505346_671628422db32.jpg', 1, 'Mixed salad is a colorful dish made with a variety of fresh vegetables, fruits, and toppings, often tossed with a light dressing for a refreshing and nutritious meal.', '2024-10-21 10:09:06', '2024-10-21 10:09:06'),
(120, 1, 8, 'coleslow salad', '/images/menus/menu1729505429_67162895dfcda.jpg', 1, 'Coleslaw salad is a crunchy side dish made from finely shredded cabbage and carrots, typically dressed in a creamy or tangy dressing for a refreshing and flavorful taste.', '2024-10-21 10:10:29', '2024-10-21 10:10:29'),
(121, 1, 8, 'green salad', '/images/menus/menu1729505502_671628de5fae5.jpg', 1, 'Green salad is a refreshing dish made primarily with fresh leafy greens, such as lettuce and spinach, often complemented by vegetables, fruits, nuts, and a light dressing.', '2024-10-21 10:11:42', '2024-10-21 10:11:42'),
(122, 1, 8, 'cocktail salad', '/images/menus/menu1729505591_6716293783246.jpg', 1, 'Cocktail salad is a vibrant dish featuring a mix of fresh fruits and vegetables, often served in a chilled bowl with a light dressing, perfect for a refreshing appetizer or side.', '2024-10-21 10:13:11', '2024-10-21 10:13:11'),
(123, 1, 9, 'vegetable soup', '/images/menus/menu1729505661_6716297dafd63.jpg', 1, 'Vegetable soup is a hearty and nutritious dish made by simmering a variety of fresh vegetables in a flavorful broth, often seasoned with herbs and spices for added taste.', '2024-10-21 10:14:21', '2024-10-21 10:14:21'),
(124, 1, 9, 'sweet corn soup', '/images/menus/menu1729505876_67162a5473012.jpg', 1, 'Sweet corn soup is a creamy and comforting dish made with pureed sweet corn and broth, often enhanced with seasonings and garnished for a delightful flavor.', '2024-10-21 10:17:56', '2024-10-21 10:17:56'),
(125, 1, 9, 'chicken soup', '/images/menus/menu1729505961_67162aa9a1ff8.jpg', 1, 'Chicken soup is a comforting dish made with tender chicken simmered in broth with vegetables and herbs, known for its soothing and nourishing qualities.', '2024-10-21 10:19:21', '2024-10-21 10:19:21'),
(126, 1, 9, 'egg soup', '/images/menus/menu1729506062_67162b0eb29bf.jpg', 1, 'Egg soup is a light and flavorful dish made by swirling beaten eggs into a warm broth, often enriched with vegetables and seasonings for a comforting meal.', '2024-10-21 10:21:02', '2024-10-21 10:21:02'),
(127, 1, 9, 'tomiyan soup', '/images/menus/menu1729506273_67162be1e12ad.jpg', 1, 'Tom Yum soup is a spicy and tangy Thai broth made with shrimp or other proteins, fragrant herbs, and vegetables, known for its bold flavors and aromatic ingredients.', '2024-10-21 10:24:33', '2024-10-21 10:24:33'),
(128, 1, 10, 'chicken stew', '/images/menus/menu1729506367_67162c3f32eb5.jpg', 1, 'Chicken stew is a hearty dish featuring tender chicken pieces simmered with vegetables and spices in a rich, savory broth, perfect for a comforting meal.', '2024-10-21 10:26:07', '2024-10-21 10:26:07'),
(129, 1, 10, 'pork stew', '/images/menus/menu1729506450_67162c92b7c2e.jpg', 1, 'Pork stew is a flavorful dish made with tender chunks of pork slow-cooked in a savory broth with vegetables and herbs, resulting in a rich and hearty meal.', '2024-10-21 10:27:30', '2024-10-21 10:27:30'),
(130, 1, 10, 'beef stew', '/images/menus/menu1729506654_67162d5e66d4d.jpg', 1, 'Beef stew is a comforting dish made with succulent beef simmered with hearty vegetables and aromatic herbs in a rich, flavorful broth.', '2024-10-21 10:30:54', '2024-10-21 10:30:54'),
(131, 1, 10, 'fish stew', '/images/menus/menu1729506981_67162ea5dc60f.jpg', 1, 'Fish stew is a delicious dish made with tender fish simmered in a flavorful broth with vegetables, herbs, and spices, creating a comforting and hearty meal.', '2024-10-21 10:36:21', '2024-10-21 10:36:21'),
(132, 1, 1, 'Test Menu', '/images/menus/menu1729843423_671b50dfb6d63.png', 1, 'test', '2024-10-25 08:03:43', '2024-10-25 08:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `menu_types`
--

CREATE TABLE `menu_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `type_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_types`
--

INSERT INTO `menu_types` (`id`, `type_name`, `hotel_id`, `menu_id`, `type_price`, `created_at`, `updated_at`) VALUES
(1, 'plain omlet', 1, 1, 500, '2024-10-19 04:58:42', '2024-10-19 04:58:42'),
(2, 'Omlet Srilanka', 1, 2, 600, '2024-10-19 05:04:01', '2024-10-19 05:04:01'),
(3, 'Chees Omlet', 1, 3, 1000, '2024-10-19 05:09:32', '2024-10-19 05:09:32'),
(4, 'Chiken Omlet', 1, 4, 800, '2024-10-19 05:12:01', '2024-10-19 05:12:01'),
(5, 'seafood omelette', 1, 5, 1200, '2024-10-19 05:23:02', '2024-10-19 05:23:02'),
(6, 'Mix Omlet', 1, 6, 1500, '2024-10-19 05:29:57', '2024-10-19 05:29:57'),
(7, 'Special Omlet', 1, 7, 1800, '2024-10-19 05:32:47', '2024-10-19 05:32:47'),
(8, 'sizzling chicken 300g', 1, 10, 2200, '2024-10-19 05:42:42', '2024-10-19 05:42:42'),
(9, 'sizzling Pork 300g', 1, 9, 2200, '2024-10-19 05:43:42', '2024-10-19 05:43:42'),
(10, 'sizzling beef 300g', 1, 11, 2500, '2024-10-19 05:45:51', '2024-10-19 05:45:51'),
(11, 'sizzling mixed grill', 1, 12, 4000, '2024-10-19 05:47:52', '2024-10-19 05:47:52'),
(52, 'vegetable rice Half', 1, 57, 750, '2024-10-21 06:33:28', '2024-10-21 06:33:28'),
(53, 'vegetable rice Full', 1, 57, 1100, '2024-10-21 06:33:53', '2024-10-21 06:33:53'),
(54, 'chicken rice Half', 1, 58, 1000, '2024-10-21 06:36:58', '2024-10-21 06:36:58'),
(55, 'chicken rice Full', 1, 58, 1500, '2024-10-21 06:37:22', '2024-10-21 06:37:22'),
(56, 'seafood rice Half', 1, 59, 1400, '2024-10-21 06:40:18', '2024-10-21 06:40:18'),
(57, 'seafood rice Full', 1, 59, 1800, '2024-10-21 06:41:47', '2024-10-21 06:41:47'),
(58, 'mix rice Half', 1, 60, 1500, '2024-10-21 06:43:25', '2024-10-21 06:43:25'),
(59, 'mix rice Full', 1, 60, 1950, '2024-10-21 06:43:45', '2024-10-21 06:43:45'),
(60, 'nasi goreng rice', 1, 61, 1800, '2024-10-21 06:46:02', '2024-10-21 06:46:02'),
(61, 'fish rice', 1, 62, 1500, '2024-10-21 06:47:57', '2024-10-21 06:47:57'),
(62, 'thai fried rice', 1, 64, 1500, '2024-10-21 06:52:31', '2024-10-21 06:52:31'),
(63, 'dragon rice', 1, 65, 1700, '2024-10-21 06:54:45', '2024-10-21 06:54:45'),
(64, 'special fried rice', 1, 66, 2500, '2024-10-21 06:56:54', '2024-10-21 06:56:54'),
(65, 'vegetable noodles Half', 1, 67, 800, '2024-10-21 06:58:30', '2024-10-21 06:58:30'),
(66, 'vegetable noodles Full', 1, 67, 1200, '2024-10-21 06:58:47', '2024-10-21 06:58:47'),
(67, 'egg noodles Half', 1, 68, 900, '2024-10-21 07:01:33', '2024-10-21 07:01:33'),
(68, 'egg noodles Full', 1, 68, 1300, '2024-10-21 07:02:02', '2024-10-21 07:02:02'),
(69, 'chicken noodles Half', 1, 69, 1000, '2024-10-21 07:06:00', '2024-10-21 07:06:00'),
(70, 'chicken noodles Full', 1, 69, 1400, '2024-10-21 07:06:26', '2024-10-21 07:06:26'),
(71, 'seafood noodles Half', 1, 70, 1300, '2024-10-21 07:11:36', '2024-10-21 07:11:36'),
(72, 'seafood noodles full', 1, 70, 1600, '2024-10-21 07:12:01', '2024-10-21 07:12:01'),
(73, 'mix noodles Half', 1, 71, 1450, '2024-10-21 07:15:09', '2024-10-21 07:15:09'),
(74, 'mix noodles full', 1, 71, 1900, '2024-10-21 07:15:38', '2024-10-21 07:15:38'),
(75, 'vegetable kottu Half', 1, 72, 800, '2024-10-21 07:26:57', '2024-10-21 07:26:57'),
(76, 'vegetable kottu Full', 1, 72, 1100, '2024-10-21 07:27:20', '2024-10-21 07:27:20'),
(77, 'egg kottu Half', 1, 73, 900, '2024-10-21 07:37:25', '2024-10-21 07:37:25'),
(78, 'egg kottu full', 1, 73, 1200, '2024-10-21 07:37:42', '2024-10-21 07:37:42'),
(79, 'chicken kottu Half', 1, 74, 1100, '2024-10-21 07:39:23', '2024-10-21 07:39:23'),
(80, 'chicken kottu full', 1, 74, 1500, '2024-10-21 07:39:45', '2024-10-21 07:39:45'),
(81, 'seafood kottu Half', 1, 75, 1300, '2024-10-21 07:42:18', '2024-10-21 07:42:18'),
(82, 'seafood kottu full', 1, 75, 1700, '2024-10-21 07:42:32', '2024-10-21 07:42:32'),
(83, 'mix kottu Half', 1, 76, 1450, '2024-10-21 07:50:16', '2024-10-21 07:50:16'),
(84, 'mix kottu full', 1, 76, 1900, '2024-10-21 07:50:37', '2024-10-21 07:50:37'),
(85, 'cheese kottu half', 1, 77, 1500, '2024-10-21 07:52:10', '2024-10-21 07:52:10'),
(86, 'cheese kottu full', 1, 77, 2000, '2024-10-21 07:52:23', '2024-10-21 07:52:23'),
(87, 'special kottu', 1, 78, 2500, '2024-10-21 07:54:29', '2024-10-21 07:54:29'),
(88, 'chicken devilled', 1, 79, 1600, '2024-10-21 07:56:58', '2024-10-21 07:56:58'),
(89, 'pork devilled', 1, 80, 1700, '2024-10-21 07:58:12', '2024-10-21 07:58:12'),
(90, 'beef devilled', 1, 81, 1900, '2024-10-21 07:59:41', '2024-10-21 07:59:41'),
(91, 'fish devilled', 1, 82, 1500, '2024-10-21 08:01:42', '2024-10-21 08:01:42'),
(92, 'soseges devilled', 1, 83, 1500, '2024-10-21 08:35:25', '2024-10-21 08:35:25'),
(93, 'Frawns devilled', 1, 84, 2000, '2024-10-21 08:38:00', '2024-10-21 08:38:00'),
(94, 'chicken stew', 1, 85, 1700, '2024-10-21 08:45:04', '2024-10-21 08:45:04'),
(95, 'pork stew', 1, 86, 1800, '2024-10-21 08:46:49', '2024-10-21 08:46:49'),
(96, 'beef stew', 1, 87, 1950, '2024-10-21 08:48:44', '2024-10-21 08:48:44'),
(97, 'fish stew', 1, 88, 1500, '2024-10-21 08:52:21', '2024-10-21 08:52:21'),
(98, 'Pork , Chicken , Sausage , Corn , Mit Salad Garlic Bread', 1, 89, 3500, '2024-10-21 08:56:42', '2024-10-21 08:56:42'),
(99, 'lime juice', 1, 90, 600, '2024-10-21 08:59:24', '2024-10-21 08:59:24'),
(100, 'watermelon juice', 1, 91, 650, '2024-10-21 09:00:47', '2024-10-21 09:00:47'),
(101, 'avocado juice', 1, 92, 650, '2024-10-21 09:08:32', '2024-10-21 09:08:32'),
(102, 'anoda juice', 1, 93, 600, '2024-10-21 09:09:57', '2024-10-21 09:09:57'),
(103, 'mango juice', 1, 94, 600, '2024-10-21 09:11:09', '2024-10-21 09:11:09'),
(104, 'wood apple juice', 1, 95, 500, '2024-10-21 09:12:52', '2024-10-21 09:12:52'),
(105, 'orange juice', 1, 96, 800, '2024-10-21 09:14:00', '2024-10-21 09:14:00'),
(106, 'Milk shake chokolat', 1, 97, 950, '2024-10-21 09:20:06', '2024-10-21 09:20:06'),
(107, 'Milk shake chokolat vanila', 1, 98, 950, '2024-10-21 09:21:52', '2024-10-21 09:21:52'),
(108, 'mix fruit juice', 1, 99, 900, '2024-10-21 09:23:39', '2024-10-21 09:23:39'),
(109, 'hot ice cream', 1, 100, 800, '2024-10-21 09:25:12', '2024-10-21 09:25:12'),
(110, 'skimmed milk with kithul paani', 1, 101, 600, '2024-10-21 09:28:27', '2024-10-21 09:28:27'),
(111, 'food salad', 1, 102, 1000, '2024-10-21 09:30:40', '2024-10-21 09:30:40'),
(112, 'chocolate ice cream', 1, 103, 500, '2024-10-21 09:31:59', '2024-10-21 09:31:59'),
(113, 'vanilla ice cream', 1, 104, 500, '2024-10-21 09:33:31', '2024-10-21 09:33:31'),
(114, 'vegetable chopcy', 1, 105, 800, '2024-10-21 09:36:34', '2024-10-21 09:36:34'),
(115, 'egg chopcy', 1, 106, 900, '2024-10-21 09:41:40', '2024-10-21 09:41:40'),
(116, 'chicken chopcy', 1, 107, 1200, '2024-10-21 09:45:41', '2024-10-21 09:45:41'),
(117, 'sea food chopcy', 1, 108, 1500, '2024-10-21 09:48:00', '2024-10-21 09:48:00'),
(118, 'mix chopsuey', 1, 109, 1700, '2024-10-21 09:50:49', '2024-10-21 09:50:49'),
(119, 'chopsuey seafood rice', 1, 110, 2500, '2024-10-21 09:53:20', '2024-10-21 09:53:20'),
(120, 'chopsuey rice mix', 1, 111, 2800, '2024-10-21 09:55:49', '2024-10-21 09:55:49'),
(121, 'Walawa reach special uet rice', 1, 112, 3000, '2024-10-21 09:57:44', '2024-10-21 09:57:44'),
(122, 'vegetable rice and curry', 1, 113, 800, '2024-10-21 09:58:55', '2024-10-21 09:58:55'),
(123, 'egg rice and curry', 1, 114, 950, '2024-10-21 10:00:05', '2024-10-21 10:00:05'),
(124, 'fish rice and curry', 1, 115, 1100, '2024-10-21 10:01:30', '2024-10-21 10:01:30'),
(125, 'chicken rice and curry', 1, 116, 1300, '2024-10-21 10:03:07', '2024-10-21 10:03:07'),
(126, 'pork rice and curry', 1, 117, 1500, '2024-10-21 10:05:17', '2024-10-21 10:05:17'),
(127, 'beef rice and curry', 1, 118, 1700, '2024-10-21 10:07:31', '2024-10-21 10:07:31'),
(128, 'mix salad', 1, 119, 800, '2024-10-21 10:09:38', '2024-10-21 10:09:38'),
(129, 'coleslow salad', 1, 120, 1300, '2024-10-21 10:10:44', '2024-10-21 10:10:44'),
(130, 'green salad', 1, 121, 1300, '2024-10-21 10:12:03', '2024-10-21 10:12:03'),
(131, 'cocktail salad', 1, 122, 1500, '2024-10-21 10:13:33', '2024-10-21 10:13:33'),
(133, 'vegetable soup', 1, 123, 700, '2024-10-21 10:15:01', '2024-10-21 10:15:01'),
(134, 'sweet corn soup', 1, 124, 950, '2024-10-21 10:18:14', '2024-10-21 10:18:14'),
(135, 'chicken soup', 1, 125, 1000, '2024-10-21 10:19:39', '2024-10-21 10:19:39'),
(136, 'egg soup', 1, 126, 800, '2024-10-21 10:21:17', '2024-10-21 10:21:17'),
(137, 'tomiyan soup', 1, 127, 1500, '2024-10-21 10:24:51', '2024-10-21 10:24:51'),
(138, 'chicken stew', 1, 128, 1700, '2024-10-21 10:26:25', '2024-10-21 10:26:25'),
(139, 'pork stew', 1, 129, 1800, '2024-10-21 10:27:45', '2024-10-21 10:27:45'),
(140, 'beef stew', 1, 130, 1950, '2024-10-21 10:33:37', '2024-10-21 10:33:37'),
(141, 'fish stew', 1, 131, 1500, '2024-10-21 10:36:42', '2024-10-21 10:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_11_000000_create_hotels_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_20_051828_create_permission_tables', 1),
(7, '2024_02_20_054555_create_tables_table', 1),
(8, '2024_02_20_054618_create_orders_table', 1),
(9, '2024_02_20_054651_create_categories_table', 1),
(10, '2024_02_20_054652_create_menus_table', 1),
(11, '2024_02_20_054716_create_orderd_menus_table', 1),
(12, '2024_02_20_054740_create_transactions_table', 1),
(13, '2024_10_07_131928_create_menu_types_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orderd_menus`
--

CREATE TABLE `orderd_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderd_menus`
--

INSERT INTO `orderd_menus` (`id`, `hotel_id`, `order_id`, `menu_id`, `menu_name`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 91, 'watermelon juice', 1, '2024-10-21 11:07:09', '2024-10-21 11:07:09'),
(2, 1, 1, 92, 'avocado juice', 1, '2024-10-21 11:07:09', '2024-10-21 11:07:09'),
(3, 1, 2, 1, 'plain omlet', 1, '2024-10-24 05:51:26', '2024-10-24 05:51:26'),
(4, 1, 2, 7, 'Special Omlet', 1, '2024-10-24 05:51:26', '2024-10-24 05:51:26'),
(5, 1, 3, 9, 'sizzling Pork 300g', 1, '2024-10-24 06:25:53', '2024-10-24 06:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `table_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` varchar(255) NOT NULL,
  `isPaid` int(11) NOT NULL DEFAULT 0,
  `isCompleted` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_mobile` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `completed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `total_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `hotel_id`, `table_id`, `order_id`, `isPaid`, `isCompleted`, `status`, `customer_name`, `customer_mobile`, `customer_email`, `employee_id`, `completed_by`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '1810349345', 2, 1, 1, NULL, NULL, NULL, NULL, 3, 1300.00, '2024-10-21 11:07:09', '2024-10-21 11:12:30'),
(2, 1, 1, '4033256851', 2, 1, 1, 'කුඹුර Resturant', NULL, 'softwaresolutionp@gmail.com', NULL, 3, 2300.00, '2024-10-24 05:51:26', '2024-10-24 05:52:27'),
(3, 1, 2, '3544223314', 1, 1, 1, 'casher', '077524100', 'Naudayanga@gmail.com', 4, 4, 2200.00, '2024-10-24 06:25:53', '2024-10-25 08:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create_hotels', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05'),
(2, 'edit_hotels', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05'),
(3, 'delete_hotel', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05'),
(4, 'manage_users', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05'),
(5, 'manage_hotel_staff', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05'),
(6, 'process_payment', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05'),
(7, 'view_reports', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05'),
(8, 'edit_user_hotel', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05'),
(9, 'edit_reports', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05'),
(10, 'manage_inventory', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super_Admin', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05'),
(2, 'Hotel_Admin', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05'),
(3, 'Hotel_Employee', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05'),
(4, 'Hotel_Casher', 'web', '2024-10-18 18:32:05', '2024-10-18 18:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2),
(4, 1),
(5, 1),
(5, 2),
(6, 4),
(7, 1),
(7, 4),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_id` varchar(255) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `max_seats` int(11) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isReserved` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_id`, `table_name`, `hotel_id`, `max_seats`, `isActive`, `isReserved`, `created_at`, `updated_at`) VALUES
(1, '671339953e00e', 'Table 1', 1, 4, 1, 0, '2024-10-19 04:46:13', '2024-10-25 08:44:29'),
(2, '6713399cdab19', 'Table 2', 1, 4, 1, 0, '2024-10-19 04:46:20', '2024-10-25 08:44:30'),
(3, '671339a7e6634', 'Table 3', 1, 4, 1, 0, '2024-10-19 04:46:31', '2024-10-19 04:46:31'),
(4, '671339b9b9d5f', 'Table 4', 1, 4, 1, 0, '2024-10-19 04:46:49', '2024-10-19 04:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_price` double NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `hotel_id`, `order_id`, `total_price`, `invoice_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 0, 'INV-17297513122636', '2024-10-24 06:28:32', '2024-10-24 06:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_merchant_id` varchar(255) DEFAULT NULL,
  `payment_merchant_secret` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `hotel_id`, `email`, `password`, `mobile`, `nic`, `address`, `payment_merchant_id`, `payment_merchant_secret`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Texta World', NULL, 'texta@hotelaitexta.world', '$2y$12$IKnpj8UbKwAW9qRN3EzRJuyxxmjKPgjJ4oIm3z2Uh1uPHLcMz/JJ.', '0000000000', '0000000000', 'Anuradhapura', NULL, NULL, NULL, '2024-10-18 18:32:05', '2024-10-18 18:32:05'),
(2, 'N A H W chamil udayanga', 1, 'Naudayanga@gmail.com', '$2y$12$V3xRtzLMVBoj3RW3AtTWUuwzsZHefyXoqeWlhU4gEJpbykpzbZDZ6', '0712638085', '940412978V', 'No 72 ekamuthu Gama sewanagala', NULL, NULL, NULL, '2024-10-19 04:45:14', '2024-10-19 04:45:14'),
(3, 'Kitchen', 1, 'Walawarich@gmail.com', '$2y$12$DlF2ld1nIidDnOiKdMF5lOpmIO9Gj17ku5Y8o9e7GMBGHPIbXjlf2', '0771245789', '200007202870', 'No 72 ekamuthu Gama sewanagala', NULL, NULL, NULL, '2024-10-21 10:57:04', '2024-10-21 10:57:04'),
(4, 'casher', 1, 'dinithirajapaksha90@gmail.com', '$2y$12$o.Lf7CI0LeUo4S.dE7HkROgrjia4iKK5u9pMwgzg.Q07g4quYW13C', '0781245789', '200007202878', 'No 72 ekamuthu Gama sewanagala', NULL, NULL, NULL, '2024-10-21 10:58:29', '2024-10-21 10:58:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hotels_hotel_id_unique` (`hotel_id`),
  ADD UNIQUE KEY `hotels_hotel_mobile_unique` (`hotel_mobile`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_hotel_id_foreign` (`hotel_id`),
  ADD KEY `menus_category_id_foreign` (`category_id`);

--
-- Indexes for table `menu_types`
--
ALTER TABLE `menu_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_types_hotel_id_foreign` (`hotel_id`),
  ADD KEY `menu_types_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orderd_menus`
--
ALTER TABLE `orderd_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderd_menus_hotel_id_foreign` (`hotel_id`),
  ADD KEY `orderd_menus_order_id_foreign` (`order_id`),
  ADD KEY `orderd_menus_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_hotel_id_foreign` (`hotel_id`),
  ADD KEY `orders_table_id_foreign` (`table_id`),
  ADD KEY `orders_employee_id_foreign` (`employee_id`),
  ADD KEY `orders_completed_by_foreign` (`completed_by`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tables_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_hotel_id_foreign` (`hotel_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_nic_unique` (`nic`),
  ADD KEY `users_hotel_id_foreign` (`hotel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `menu_types`
--
ALTER TABLE `menu_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orderd_menus`
--
ALTER TABLE `orderd_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `menus_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Constraints for table `menu_types`
--
ALTER TABLE `menu_types`
  ADD CONSTRAINT `menu_types_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_types_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orderd_menus`
--
ALTER TABLE `orderd_menus`
  ADD CONSTRAINT `orderd_menus_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `orderd_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `orderd_menus_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_completed_by_foreign` FOREIGN KEY (`completed_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `orders_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
