DROP TABLE admin;

CREATE TABLE `admin` (
  `Admin_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_Name` varchar(255) NOT NULL,
  `Admin_Email` varchar(255) NOT NULL,
  `Admin_Password` varchar(255) NOT NULL,
  `Admin_Address` varchar(255) NOT NULL,
  `Admin_Cell_No` varchar(255) NOT NULL,
  `Admin_Role` int(11) NOT NULL,
  `Admin_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Admin_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO admin VALUES("1","Mohammad Hassam Farhan","hassamfarhan16@gmail.com","Hk1996","SMCHS Karachi..","03058850578","1","2023-06-24 19:56:23");



DROP TABLE categories;

CREATE TABLE `categories` (
  `Category_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Category_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO categories VALUES("1","Body Care");
INSERT INTO categories VALUES("2","fragnance");
INSERT INTO categories VALUES("3","Hair Care");
INSERT INTO categories VALUES("4","Skin Care");
INSERT INTO categories VALUES("5","Earrings");
INSERT INTO categories VALUES("6","Bangle");
INSERT INTO categories VALUES("7","Bracelet");
INSERT INTO categories VALUES("8","Necklace");



DROP TABLE orders;

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

INSERT INTO orders VALUES("1","3","7","Mist","2060","1","2023-09-25 14:03:43","Process");
INSERT INTO orders VALUES("2","3","7","Mist","2060","1","2023-09-25 14:05:09","Process");
INSERT INTO orders VALUES("2","3","6","Body Spray","1680","1","2023-09-25 14:05:09","Process");



DROP TABLE ordersdetail;

CREATE TABLE `ordersdetail` (
  `Order_Detail_Id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) NOT NULL,
  `u_address` varchar(255) NOT NULL,
  `u_phone` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `u_category` varchar(255) NOT NULL,
  `u_remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`Order_Detail_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO ordersdetail VALUES("1","Abc","DHA","45454545","2023-09-25","dfdf","hello");
INSERT INTO ordersdetail VALUES("2","Abc","DHA","45454545","2023-09-25","dfdf","hello");
INSERT INTO ordersdetail VALUES("3","hassan","bombay","8589632765","2023-10-07","cosmetics jewellery","good");



DROP TABLE products;

CREATE TABLE `products` (
  `Product_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(255) NOT NULL,
  `Product_Description` varchar(255) NOT NULL,
  `Product_Quantity` int(11) NOT NULL,
  `Product_Price` int(11) NOT NULL,
  `Product_Img` varchar(255) NOT NULL,
  `Product_Status` varchar(255) NOT NULL,
  `Product_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Category_Id` int(11) NOT NULL,
  PRIMARY KEY (`Product_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO products VALUES("1","Body Scrub","Cleanse and exfoliate your skin with help from nature’s most mouthwatering ingredients like Inspired by delicious homemade jam recipes.","5","4400","d41d8cd98f00b204e9800998ecf8427e1688606068.jpg","deliver","2023-07-06 15:45:28","1");
INSERT INTO products VALUES("2","Foot Care","Feet Up Comfort All Day Refreshing Care Foot Cream is a rich, refreshing cream that smooths and softens dry, rough skin. ","12","3449","d41d8cd98f00b204e9800998ecf8427e1688606082.jpg","deliver","2023-07-06 15:47:45","1");
INSERT INTO products VALUES("3","Moisturizing Cream","Milk & Honey Gold moisturising Hand Cream is a luxuriously fragrant, rich and nourishing hand cream infused with organically sourced extracts of milk and  honey.","11","900","d41d8cd98f00b204e9800998ecf8427e1688606102.jpg","Pending","2023-07-06 16:13:49","1");
INSERT INTO products VALUES("4","Soap","An ultra-creamy soap bar infused with glycerine, talc and organically sourced extracts of milk and honey.","10","490","d41d8cd98f00b204e9800998ecf8427e1688606123.jpg","Pending","2023-07-06 16:13:08","1");
INSERT INTO products VALUES("5","Body Cream","moisturising body cream perfumed with the luminous, floral woody beauty of Giordani Gold Essenza.","6","1840","d41d8cd98f00b204e9800998ecf8427e1688606800.jpg","deliver","2023-07-06 16:24:30","2");
INSERT INTO products VALUES("6","Body Spray","Stay refreshed all day, every day. Get a fresh start on your busy days with this invigorating scent.","7","1680","d41d8cd98f00b204e9800998ecf8427e1688606778.jpg","deliver","2023-07-06 16:27:35","2");
INSERT INTO products VALUES("7","Mist","Immerse in an energising burst of refreshing mint and raspberry with this invigorating and fine-structured fragrance mist","9","2060","d41d8cd98f00b204e9800998ecf8427e1688608076.jpg","Pending","2023-07-06 16:28:53","2");
INSERT INTO products VALUES("8","Perfume","Always with passion, this fragrance is for women who embody style and sophistication.","5","7600","d41d8cd98f00b204e9800998ecf8427e1688608102.jpg","Pending","2023-07-06 16:29:36","2");
INSERT INTO products VALUES("9","Conditioner","Supremely silky and luxurious hair conditioner that nourishes, detangles and protects the hair from breakage.","4","2810","d41d8cd98f00b204e9800998ecf8427e1688607124.jpg","deliver","2023-07-06 16:33:55","3");
INSERT INTO products VALUES("10","Hair Mask","Rich, nourishing hair mask, specially formulated to rejuvenate and revitalise damaged and over-processed hair and encourage a healthy scalp.","6","2550","d41d8cd98f00b204e9800998ecf8427e1688608150.jpg","deliver","2023-07-06 16:36:39","3");
INSERT INTO products VALUES("11","Oil","Treat your hair to this light textured and luxurious hair oil that nourishes, hydrates and adds shine to hair without weighing it down.","11","2810","download (1).jpg","Pending","2023-07-06 16:41:39","3");
INSERT INTO products VALUES("12","Shampo","Specially designed to preserve the brilliance and shine of coloured and highlighted hair, this shampoo cleanses and softens while protecting your colour  from fading.","3","1880","shampo.jpg","Pending","2023-07-06 16:38:26","3");
INSERT INTO products VALUES("13","Face Mask","some of the most effective botanical ingredients known in Sweden, to create tailored skin care ranges with natural Swedish ingredient blends.  Meet the new Optimals!","4","2800","d41d8cd98f00b204e9800998ecf8427e1688608370.jpg","deliver","2023-07-06 16:47:35","4");
INSERT INTO products VALUES("14","Face Wash","Targets existing blemishes and prevents future blemishes Deep cleanses the skin without drying it out With Soothing Complex to help calm the skin","7","2000","d41d8cd98f00b204e9800998ecf8427e1688608385.jpg","deliver","2023-07-06 16:49:18","4");
INSERT INTO products VALUES("15","Faical Kit","Brightens Skin And Provides A Flawless Skin Tone Controls Premature Ageing Of Skin Refresh, Rejuvenate And Detoxifies The Skin","2","2000","61WfDYqFUML.jpg","Pending","2023-07-06 06:55:45","4");
INSERT INTO products VALUES("16","Moisturising Cream","Hydrates skin instantly and for up to 24 hours Helps skin appear visibly more radiant Light, non-greasy texture","4","2500","productImage.jpg","Pending","2023-07-06 06:56:12","4");
INSERT INTO products VALUES("17","Spiral-Diamond-Drop-Earrings","Dangles take the drop earring design to the next level. The hanging part of the design is constructed in a way that it sways and dangles below the earlobe.","12","13000","Spiral-Diamond-Drop-Earrings-2.jpg","Pending","2023-07-06 17:22:53","5");
INSERT INTO products VALUES("18","Elite-Gold-Drop-Earrings","This design mostly comprises of two parts. They consist of an attachment to the earlobe and some ornament that hangs from the attachment, giving a drop  look to the piece.","11","20000","Elite-Golden-Drop-Earrings-3.jpg","Pending","2023-07-06 17:24:02","5");
INSERT INTO products VALUES("19","Yellow-gold-hoops-earrings","Possessing the look of a ring, this circular or semicircular design is open and passes through the ear piercings. These are available in a wide variety  of shapes and sizes.","9","10000","Yellow-gold-hoops-earrings.jpg","deliver","2023-07-06 17:27:19","5");
INSERT INTO products VALUES("20","Dainty-Diamond-Huggies-Earrings","This is a variant of the hoop style earring. They are smaller than hoops and thus barely wrap the earlobes, giving a classy touch to your look.","5","50000","Dainty-Diamond-Huggies-Earrings-2.jpg","deliver","2023-07-06 17:30:23","5");
INSERT INTO products VALUES("21","gold-floral-bangle","This golden floral bangle design can be widely worn by  the young age girls for the reason of their fashion and trendy look. ","7","8000","golden-floral-bangle-design18.jpg","deliver","2023-07-06 17:33:59","6");
INSERT INTO products VALUES("22","Gold Bangle with Butterfly design ","Gold bangles with butterfly designs is usually a new one to worn on occasions, these type of bangle is attract girls who like butterfly.","4","10000","Golf-Bangles-with-Butterfly-design22.jpg","deliver","2023-07-06 17:40:41","6");
INSERT INTO products VALUES("23","Maroon-enameled-Kada-bangle","the maroon enameled kada bangles which has maroon color stones  embedded in the gold gives a elegant look and best suits for bridal outfits and functional wears like sarees. Kada is a traditional Indian design","7","5000","Maroon-enameled-Kada-bangle10.jpg","Pending","2023-07-06 17:43:53","6");
INSERT INTO products VALUES("24","Pink-stone-cartwheel-bangle","The bangle has three circular wheel shaped design studded with pink stone and it has a simple and elegant look which suits for day to day wearable  and daily use. ","12","3000","Pink-stone-cartwheel-bangle23.jpg","Pending","2023-07-06 17:46:07","6");
INSERT INTO products VALUES("25","yellow gold toggle bracelet","Charm bracelets come in a wide range of styles, and are a timeless classic as far as bracelets are concerned.","7","9000","gabriel-co-sterling-18k-yellow-gold-vintage-double-ball-toggle-bracelet-1.jpg","deliver","2023-07-06 17:57:45","7");
INSERT INTO products VALUES("26","gem stones bracelet","Gemstone bracelets, as the name suggests, are adorned with gemstones. They are usually metal and will include one or more gemstones embedded in, or  otherwise attached to the bracelet itself.","5","5000","2100821.jpg","deliver","2023-07-06 18:00:35","7");
INSERT INTO products VALUES("27","Link Chain","This kind of bracelet is unique as far as bracelets are concerned. Link bracelets are metallic and made by connecting different chains to form a single  piece of jewelry. The chained metallic strands may be made up of small to large-sized links, with some","12","4000","3306426.jpg","Pending","2023-07-06 18:01:56","7");
INSERT INTO products VALUES("28","gabriel yellow-gold tennis-bracelet","This kind of bracelet is unique as far as bracelets are concerned. Link bracelets are metallic and made by connecting different chains to form a single  piece of jewelry. The chained metallic strands may be made up of small to large-sized links, with some","10","6000","gabriel-14k-yellow-gold-bujukan-bead-tennis-bracelet_tb4462y4jjj-1.jpg","Pending","2023-07-06 18:04:29","7");
INSERT INTO products VALUES("29","Classic-Emerald-Necklace","Emerald sends out sheer class and royalty with  that royal bright green stone colour. They are best teamed up for an evening party with a gown or are perfect for bridal wear.","12","60000","Classic-Emerald-Necklaces20..png","deliver","2023-07-06 18:07:29","8");
INSERT INTO products VALUES("30","Filigree-Gold-Necklace","Filigree is another gold necklace for women, made from a delicate kind of jewellery with metals like gold and silver usually with threads, beads to form  an intricate pattern or an artistic motif. Filigree work is much in demand for jewellery.","11","100000","Filigree-Gold-Necklaces14..jpg","deliver","2023-07-06 18:09:04","8");
INSERT INTO products VALUES("31","Nagapadam-Necklace","Nagapadam means snake hood. It is called Nagapadam because the shape of the pendant/necklace resembles a serpent. These unique Kerala traditions inspired  gold necklaces to have seven diamonds studded along with blue /green/ red coloured stones in the sha","14","150000","Nagapadam-Necklaces24..png","Pending","2023-07-06 18:10:47","8");
INSERT INTO products VALUES("32","Polki-Necklace","Polki is basically uncut diamonds after mining used exclusively for bridal jewellery. They are bridal jewellery that is heavy and rich. Their hard work  and amazing craftsmanship are reflected in the masterpiece.","15","200000","Polki-Necklaces21..jpg","Pending","2023-07-06 18:12:02","8");



DROP TABLE users;

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(255) NOT NULL,
  `User_Email` varchar(255) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `User_Address` varchar(255) NOT NULL,
  `User_PhoneNumber` varchar(255) NOT NULL,
  `User_Role` int(11) NOT NULL,
  `User_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES("1","Abc","Abc@gmail.com","123","Shahrah Faisal","0303030330","2","2023-07-05 18:39:34");
INSERT INTO users VALUES("2","hello","hello@gmail.com","1996","karachi","03048850578","2","2023-07-05 19:30:30");
INSERT INTO users VALUES("3","Abc","Abc@gmail.com","123","DHA","03030303033","2","2023-09-25 13:37:52");



