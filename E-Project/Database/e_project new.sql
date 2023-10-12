-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 10:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_Id` int(11) NOT NULL,
  `Admin_Name` varchar(255) NOT NULL,
  `Admin_Email` varchar(255) NOT NULL,
  `Admin_Password` varchar(255) NOT NULL,
  `Admin_Address` varchar(255) NOT NULL,
  `Admin_Cell_No` varchar(255) NOT NULL,
  `Admin_Role` int(11) NOT NULL,
  `Admin_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_Id`, `Admin_Name`, `Admin_Email`, `Admin_Password`, `Admin_Address`, `Admin_Cell_No`, `Admin_Role`, `Admin_Date`) VALUES
(1, 'Mohammad Hassam Farhan', 'hassamfarhan16@gmail.com', 'Hk1996', 'SMCHS Karachi..', '03058850578', 1, '2023-06-24 14:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_Id` int(11) NOT NULL,
  `Category_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_Id`, `Category_Name`) VALUES
(1, 'Body Care'),
(2, 'fragnance'),
(3, 'Hair Care'),
(4, 'Skin Care'),
(5, 'Earrings'),
(6, 'Bangle'),
(7, 'Bracelet'),
(8, 'Necklace');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `Order_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Order_Remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `User_Id`, `product_id`, `product_name`, `product_price`, `product_qty`, `Order_Date`, `Order_Remarks`) VALUES
(1, 3, 7, 'Mist', 2060, 1, '2023-09-25 09:03:43', 'Process'),
(2, 3, 7, 'Mist', 2060, 1, '2023-09-25 09:05:09', 'Process'),
(2, 3, 6, 'Body Spray', 1680, 1, '2023-09-25 09:05:09', 'Process'),
(9, 3, 2, 'Foot Care', 3449, 1, '2023-10-07 13:00:19', 'Process'),
(10, 3, 1, 'Body Scrub', 4400, 1, '2023-10-07 13:48:33', 'Process'),
(10, 3, 8, 'Perfume', 7600, 1, '2023-10-07 13:48:33', 'Process'),
(11, 3, 2, 'Foot Care', 3449, 1, '2023-10-07 14:01:06', 'Process'),
(12, 2, 1, 'Body Scrub', 4400, 1, '2023-10-07 14:04:52', 'Process'),
(12, 2, 6, 'Body Spray', 1680, 1, '2023-10-07 14:04:52', 'Process');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `Order_Detail_Id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_address` varchar(255) NOT NULL,
  `u_phone` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `u_category` varchar(255) NOT NULL,
  `u_remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordersdetail`
--

INSERT INTO `ordersdetail` (`Order_Detail_Id`, `users_id`, `u_name`, `u_address`, `u_phone`, `date_of_birth`, `u_category`, `u_remarks`) VALUES
(1, 0, 'Abc', 'DHA', '45454545', '2023-09-25', 'dfdf', 'hello'),
(2, 0, 'Abc', 'DHA', '45454545', '2023-09-25', 'dfdf', 'hello'),
(3, 0, 'hassan', 'bombay', '8589632765', '2023-10-07', 'cosmetics jewellery', 'good'),
(4, 0, 'hassan', 'bombay', '8589632765', '2023-10-07', 'cosmetics jewellery', 'good'),
(5, 0, 'hassan', 'bombay', '8589632765', '2023-10-11', 'cosmetics jewellery', 'good'),
(6, 0, 'hassan', 'bombay', '8589632765', '2023-10-11', 'cosmetics jewellery', 'good'),
(7, 0, 'hassan', 'bombay', '8589632765', '2023-10-11', 'cosmetics jewellery', 'good'),
(8, 0, 'hassan', 'bombay', '8589632765', '2023-10-11', 'cosmetics jewellery', 'good'),
(9, 0, 'hassan', 'bombay', '8589632765', '2023-10-11', 'cosmetics jewellery', 'good'),
(10, 0, 'gdthc', 'bombay', '8589632765', '2023-11-10', 'cosmetics jewellery', 'good'),
(11, 3, 'hassan', 'karachi', '2522525426', '2023-10-07', 'cosmetics jewellery', 'Completed'),
(12, 2, 'rehman', 'karachi', '2253535664353', '2023-10-07', 'cosmetics', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Product_Description` varchar(255) NOT NULL,
  `Product_Quantity` int(11) NOT NULL,
  `Product_Price` int(11) NOT NULL,
  `Product_Img` varchar(255) NOT NULL,
  `Product_Status` varchar(255) NOT NULL,
  `Product_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Category_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_Id`, `Product_Name`, `Product_Description`, `Product_Quantity`, `Product_Price`, `Product_Img`, `Product_Status`, `Product_Date`, `Category_Id`) VALUES
(1, 'Body Scrub', 'Cleanse and exfoliate your skin with help from nature’s most mouthwatering ingredients like Inspired by delicious homemade jam recipes.', 5, 4400, 'd41d8cd98f00b204e9800998ecf8427e1688606068.jpg', 'deliver', '2023-07-06 10:45:28', 1),
(2, 'Foot Care', 'Feet Up Comfort All Day Refreshing Care Foot Cream is a rich, refreshing cream that smooths and softens dry, rough skin. ', 12, 3449, 'd41d8cd98f00b204e9800998ecf8427e1688606082.jpg', 'deliver', '2023-07-06 10:47:45', 1),
(3, 'Moisturizing Cream', 'Milk & Honey Gold moisturising Hand Cream is a luxuriously fragrant, rich and nourishing hand cream infused with organically sourced extracts of milk and  honey.', 11, 900, 'd41d8cd98f00b204e9800998ecf8427e1688606102.jpg', 'Pending', '2023-07-06 11:13:49', 1),
(4, 'Soap', 'An ultra-creamy soap bar infused with glycerine, talc and organically sourced extracts of milk and honey.', 10, 490, 'd41d8cd98f00b204e9800998ecf8427e1688606123.jpg', 'Pending', '2023-07-06 11:13:08', 1),
(5, 'Body Cream', 'moisturising body cream perfumed with the luminous, floral woody beauty of Giordani Gold Essenza.', 6, 1840, 'd41d8cd98f00b204e9800998ecf8427e1688606800.jpg', 'deliver', '2023-07-06 11:24:30', 2),
(6, 'Body Spray', 'Stay refreshed all day, every day. Get a fresh start on your busy days with this invigorating scent.', 7, 1680, 'd41d8cd98f00b204e9800998ecf8427e1688606778.jpg', 'deliver', '2023-07-06 11:27:35', 2),
(7, 'Mist', 'Immerse in an energising burst of refreshing mint and raspberry with this invigorating and fine-structured fragrance mist', 9, 2060, 'd41d8cd98f00b204e9800998ecf8427e1688608076.jpg', 'Pending', '2023-07-06 11:28:53', 2),
(8, 'Perfume', 'Always with passion, this fragrance is for women who embody style and sophistication.', 5, 7600, 'd41d8cd98f00b204e9800998ecf8427e1688608102.jpg', 'Pending', '2023-07-06 11:29:36', 2),
(9, 'Conditioner', 'Supremely silky and luxurious hair conditioner that nourishes, detangles and protects the hair from breakage.', 4, 2810, 'd41d8cd98f00b204e9800998ecf8427e1688607124.jpg', 'deliver', '2023-07-06 11:33:55', 3),
(10, 'Hair Mask', 'Rich, nourishing hair mask, specially formulated to rejuvenate and revitalise damaged and over-processed hair and encourage a healthy scalp.', 6, 2550, 'd41d8cd98f00b204e9800998ecf8427e1688608150.jpg', 'deliver', '2023-07-06 11:36:39', 3),
(11, 'Oil', 'Treat your hair to this light textured and luxurious hair oil that nourishes, hydrates and adds shine to hair without weighing it down.', 11, 2810, 'download (1).jpg', 'Pending', '2023-07-06 11:41:39', 3),
(12, 'Shampo', 'Specially designed to preserve the brilliance and shine of coloured and highlighted hair, this shampoo cleanses and softens while protecting your colour  from fading.', 3, 1880, 'shampo.jpg', 'Pending', '2023-07-06 11:38:26', 3),
(13, 'Face Mask', 'some of the most effective botanical ingredients known in Sweden, to create tailored skin care ranges with natural Swedish ingredient blends.  Meet the new Optimals!', 4, 2800, 'd41d8cd98f00b204e9800998ecf8427e1688608370.jpg', 'deliver', '2023-07-06 11:47:35', 4),
(14, 'Face Wash', 'Targets existing blemishes and prevents future blemishes Deep cleanses the skin without drying it out With Soothing Complex to help calm the skin', 7, 2000, 'd41d8cd98f00b204e9800998ecf8427e1688608385.jpg', 'deliver', '2023-07-06 11:49:18', 4),
(15, 'Faical Kit', 'Brightens Skin And Provides A Flawless Skin Tone Controls Premature Ageing Of Skin Refresh, Rejuvenate And Detoxifies The Skin', 2, 2000, '61WfDYqFUML.jpg', 'Pending', '2023-07-06 01:55:45', 4),
(16, 'Moisturising Cream', 'Hydrates skin instantly and for up to 24 hours Helps skin appear visibly more radiant Light, non-greasy texture', 4, 2500, 'productImage.jpg', 'Pending', '2023-07-06 01:56:12', 4),
(17, 'Spiral-Diamond-Drop-Earrings', 'Dangles take the drop earring design to the next level. The hanging part of the design is constructed in a way that it sways and dangles below the earlobe.', 12, 13000, 'Spiral-Diamond-Drop-Earrings-2.jpg', 'Pending', '2023-07-06 12:22:53', 5),
(18, 'Elite-Gold-Drop-Earrings', 'This design mostly comprises of two parts. They consist of an attachment to the earlobe and some ornament that hangs from the attachment, giving a drop  look to the piece.', 11, 20000, 'Elite-Golden-Drop-Earrings-3.jpg', 'Pending', '2023-07-06 12:24:02', 5),
(19, 'Yellow-gold-hoops-earrings', 'Possessing the look of a ring, this circular or semicircular design is open and passes through the ear piercings. These are available in a wide variety  of shapes and sizes.', 9, 10000, 'Yellow-gold-hoops-earrings.jpg', 'deliver', '2023-07-06 12:27:19', 5),
(20, 'Dainty-Diamond-Huggies-Earrings', 'This is a variant of the hoop style earring. They are smaller than hoops and thus barely wrap the earlobes, giving a classy touch to your look.', 5, 50000, 'Dainty-Diamond-Huggies-Earrings-2.jpg', 'deliver', '2023-07-06 12:30:23', 5),
(21, 'gold-floral-bangle', 'This golden floral bangle design can be widely worn by  the young age girls for the reason of their fashion and trendy look. ', 7, 8000, 'golden-floral-bangle-design18.jpg', 'deliver', '2023-07-06 12:33:59', 6),
(22, 'Gold Bangle with Butterfly design ', 'Gold bangles with butterfly designs is usually a new one to worn on occasions, these type of bangle is attract girls who like butterfly.', 4, 10000, 'Golf-Bangles-with-Butterfly-design22.jpg', 'deliver', '2023-07-06 12:40:41', 6),
(23, 'Maroon-enameled-Kada-bangle', 'the maroon enameled kada bangles which has maroon color stones  embedded in the gold gives a elegant look and best suits for bridal outfits and functional wears like sarees. Kada is a traditional Indian design', 7, 5000, 'Maroon-enameled-Kada-bangle10.jpg', 'Pending', '2023-07-06 12:43:53', 6),
(24, 'Pink-stone-cartwheel-bangle', 'The bangle has three circular wheel shaped design studded with pink stone and it has a simple and elegant look which suits for day to day wearable  and daily use. ', 12, 3000, 'Pink-stone-cartwheel-bangle23.jpg', 'Pending', '2023-07-06 12:46:07', 6),
(25, 'yellow gold toggle bracelet', 'Charm bracelets come in a wide range of styles, and are a timeless classic as far as bracelets are concerned.', 7, 9000, 'gabriel-co-sterling-18k-yellow-gold-vintage-double-ball-toggle-bracelet-1.jpg', 'deliver', '2023-07-06 12:57:45', 7),
(26, 'gem stones bracelet', 'Gemstone bracelets, as the name suggests, are adorned with gemstones. They are usually metal and will include one or more gemstones embedded in, or  otherwise attached to the bracelet itself.', 5, 5000, '2100821.jpg', 'deliver', '2023-07-06 13:00:35', 7),
(27, 'Link Chain', 'This kind of bracelet is unique as far as bracelets are concerned. Link bracelets are metallic and made by connecting different chains to form a single  piece of jewelry. The chained metallic strands may be made up of small to large-sized links, with some', 12, 4000, '3306426.jpg', 'Pending', '2023-07-06 13:01:56', 7),
(28, 'gabriel yellow-gold tennis-bracelet', 'This kind of bracelet is unique as far as bracelets are concerned. Link bracelets are metallic and made by connecting different chains to form a single  piece of jewelry. The chained metallic strands may be made up of small to large-sized links, with some', 10, 6000, 'gabriel-14k-yellow-gold-bujukan-bead-tennis-bracelet_tb4462y4jjj-1.jpg', 'Pending', '2023-07-06 13:04:29', 7),
(29, 'Classic-Emerald-Necklace', 'Emerald sends out sheer class and royalty with  that royal bright green stone colour. They are best teamed up for an evening party with a gown or are perfect for bridal wear.', 12, 60000, 'Classic-Emerald-Necklaces20..png', 'deliver', '2023-07-06 13:07:29', 8),
(30, 'Filigree-Gold-Necklace', 'Filigree is another gold necklace for women, made from a delicate kind of jewellery with metals like gold and silver usually with threads, beads to form  an intricate pattern or an artistic motif. Filigree work is much in demand for jewellery.', 11, 100000, 'Filigree-Gold-Necklaces14..jpg', 'deliver', '2023-07-06 13:09:04', 8),
(31, 'Nagapadam-Necklace', 'Nagapadam means snake hood. It is called Nagapadam because the shape of the pendant/necklace resembles a serpent. These unique Kerala traditions inspired  gold necklaces to have seven diamonds studded along with blue /green/ red coloured stones in the sha', 14, 150000, 'Nagapadam-Necklaces24..png', 'Pending', '2023-07-06 13:10:47', 8),
(32, 'Polki-Necklace', 'Polki is basically uncut diamonds after mining used exclusively for bridal jewellery. They are bridal jewellery that is heavy and rich. Their hard work  and amazing craftsmanship are reflected in the masterpiece.', 15, 200000, 'Polki-Necklaces21..jpg', 'Pending', '2023-07-06 13:12:02', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `User_Email` varchar(255) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `User_Address` varchar(255) NOT NULL,
  `User_PhoneNumber` varchar(255) NOT NULL,
  `User_Role` int(11) NOT NULL,
  `User_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `User_Name`, `User_Email`, `User_Password`, `User_Address`, `User_PhoneNumber`, `User_Role`, `User_Date`) VALUES
(1, 'Abc', 'Abc@gmail.com', '123', 'Shahrah Faisal', '0303030330', 2, '2023-07-05 13:39:34'),
(2, 'hello', 'hello@gmail.com', '1996', 'karachi', '03048850578', 2, '2023-07-05 14:30:30'),
(3, 'Abc', 'Abc@gmail.com', '123', 'DHA', '03030303033', 2, '2023-09-25 08:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD PRIMARY KEY (`Order_Detail_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  MODIFY `Order_Detail_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
