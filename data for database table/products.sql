-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 11:15 PM
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
-- Database: `super-market`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `p_catagory_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_rating` int(11) NOT NULL,
  `p_offer_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `low_stock_threshold` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_catagory_id`, `p_name`, `p_price`, `p_description`, `p_rating`, `p_offer_price`, `stock_status`, `product_quantity`, `low_stock_threshold`, `p_image`, `created_at`, `updated_at`) VALUES
(1, '9', 'Madhur Sugar - Refined, 1 kg Pouch', 65, '<p>Madhur is a brand that follows high quality renditions as a matter of its basic policy. The refined sugar and other products from the premises of Madhur promise you high quality and a commitment to purity.&nbsp;Refined sugar is an everyday product that is used to sweeten tea, coffee and milk. It is also used in desserts, baked goodies, milkshakes and smoothies. It can be sprinkled over various puddings and curd as well. This everyday grain is one that we turn to for a variety of culinary uses.</p>', 4, '58', 'In stock', '500', '10', '244096_6-madhur-sugar-refined.jpg', '2023-08-28 08:00:49', '2023-08-28 08:00:49'),
(2, '9', 'Tata Salt Vacuum Evaporated Iodised Salt', 28, '<p>Desh ki Sehat, Desh ka Namak! Now celebrating 40 years of trust, Tata Salt has pioneered India&rsquo;s largest vacuum evaporation technology. Untouched by hand, Tata Salt offers an assurance of Iodine. With vacuum evaporation technology,&nbsp;<strong>Tata namak offers a hygienic alternative to your regular table salt.&nbsp;</strong><strong>It contains the requisite amount of iodine which is an essential dietary nutrient for humans.</strong>&nbsp;Iodine is required for normal growth, thyroid, and brain function. Add the goodness of Tata Salt to your dietary intake and make your meals delicious and nourishing.</p>\r\n\r\n<p><strong>Storage Instructions:</strong>&nbsp;Store in a cool and dry place.<br />\r\n*It is generally accepted that Iodine helps in the mental development of children.</p>', 5, '24', 'In stock', '500', '5', '1.png', '2023-08-28 10:05:12', '2023-08-28 10:21:21'),
(3, '9', 'Aashirvaad Salt/Nun - Iodised, 1 kg Pouch', 28, '<p>Aashirvaad ensures that only good quality ingredients reach your kitchen and Aashirvaad Iodised Salt stays true to that promise. Made from natural sea salt crystals with a 4-step advantage process, Aashirvaad Iodised Salt ensures that you and your family receive pure goodness of nature, daily.</p>\r\n\r\n<p>Aashirvaad Iodised Salt is obtained by first, evaporating sea water or brine in shallow basins by sunlight and wind for 3 weeks. When the water evaporates, a salt bed forms at the bottom of the basin. This salt is then collected, and put through an elaborate cleansing process and finally, enriched with Iodine to take care of your family&rsquo;s Iodine requirements.</p>\r\n\r\n<p>We take extra care to ensure that only quality salt reaches your home. Simply because we know that it is the only way you would have it!</p>', 4, '22', 'In stock', '5000', '50', '236834_6-aashirvaad-salt-iodised.jpg', '2023-08-28 10:29:27', '2023-08-28 10:30:23'),
(4, '8', 'LALBABA Exclusive Minikit Rice, 10 kg', 800, '<p>LalBaba Exclusive Minikit Rice grains are longer in size and white in colour. This round-grained long rice infuses pleasant flavours into your dish. It has a natural aroma and delicious taste. It is a staple food grain that is very rich in the content of nutrients. It has many health benefits. You can make delicious and different types of rice dishes. We bring the best-selected rice that is hygienically packed with care.</p>\r\n\r\n<p>Benefits:</p>\r\n\r\n<ul>\r\n	<li>Best quality selected rice.&nbsp;</li>\r\n	<li>It is hygienically packed with care.&nbsp;</li>\r\n	<li>It is healthy and has many health benefits.&nbsp;</li>\r\n	<li>Perfect for everyday use.</li>\r\n</ul>', 4, '617', 'In stock', '600', '50', '40225660_2-lalbaba-rice-premium-minikit-rice.jpg', '2023-08-28 12:18:25', '2023-08-29 14:51:26'),
(5, '8', 'Royal Chamonmoni Rice, 5 kg', 450, '<p>Chamonmoni rice&nbsp;is very favourite in Bengali families for its low cooking time and for its white colour. It is slim and short in size and soft in texture. It has been aged to perfection to give the finest quality of rice. It has long, fluffy, lustrous texture grains.</p>\r\n\r\n<p><strong>Nutritional Facts</strong></p>\r\n\r\n<ul>\r\n	<li>Calories: 344</li>\r\n	<li>Carbs: 73g</li>\r\n	<li>Fat: 1g</li>\r\n	<li>Protein: 13g.</li>\r\n</ul>', 4, '328', 'In stock', '5999', '50', '40111567_1-bb-royal-chamonmonichawalmoni-rice.jpg', '2023-08-28 12:22:14', '2023-08-29 15:08:52'),
(6, '10', 'Emami Kachchi Ghani Mustard Oil. 1 L', 155, '<p>The trusted name for High Pungency and Purity! Emami Healthy &amp; Tasty Kachchi Ghani Mustard Oil is made using cold pressed technique to retain its purity, strong flavour &amp; aroma. Emami Healthy &amp; Tasty Kachchi Ghani Mustard Oil adds a nostalgic flavour to your recipes, &acirc;&euro;&oelig;Just like Dadi used to make.&acirc;&euro; Highly Pungent, this Mustard Oil delivers strong flavour &amp; aroma to your meals. Now you can go back to the time when every meal used to taste rich &amp; flavourful. Enriched with nutrients and vitamins like Vitamin A, D &amp; E, Emami Healthy &amp; Tasty Kachchi Ghani Mustard Oil provides several health benefits to keep you fit. It contains the right balance of essential fatty acids to help maintain your optimum health. From keeping your cholesterol levels normal to helping in healthy digestion, this Mustard Oil will surely be your new kitchen staple. With a high smoke point, Emami Healthy &amp; Tasty Kachchi Ghani Mustard Oil is suitable to use for most dishes, thus ideal for everyday use.</p>', 3, '128', 'In stock', '300', '30', '40007923_6-emami-healthy-tasty-kachi-ghani-mustard-oil.jpg', '2023-08-28 12:26:12', '2023-08-28 12:27:51'),
(7, '6', 'Tata Sampann Unpolished Chana Dal, 500 g Pouch', 66, '<p>For most Indians, comfort food is always linked to easy-to-cook homemade meals, and what can be more convenient and quick than preparing a hearty dal meal? Essential in every household, Tata Sampann dals are unpolished and do not undergo any artificial polishing with water, oil or leather, thereby retaining their goodness and wholesome character. The 5-step process ensures that Tata Sampann grains are uniform and of premium quality, giving you an all-natural, authentic taste. A staple in the Indian diet, Chana Dal provides nutrients such as Protein &amp; Fibre. Made of select grains and recommended by Chef Sanjeev Kapoor and Chef Ranveer Brar, Tata Sampann Unpolished Chana Dal makes for a delicious meal choice. So, whenever you are in the mood to cook something easy and delicious, dive into the scrumptious taste of Tata Sampann pulses, and enjoy a lovely meal! Explore Tata Sampann Pulses range - Toor dal, Kala Chana, Moong dal, Moong dal Chilka, Green Moong, Masoor dal, Masoor Small dal, Masoor Whole dal, Kali Masoor dal, Urad dal, Urad Whole dal, Urad Kali, Kabuli Chana, and Rajma.</p>', 5, '0', 'In stock', '5000', '50', '20005212_6-tata-sampann-unpolished-chana-dal.jpg', '2023-08-28 12:30:52', '2023-08-29 15:04:17'),
(8, '11', 'Ganesh Sooji, 200 g', 13, '<p>Ganesh has a strong belief in dishing out the best in terms of quality to its esteemed customers and patrons. Every grain undergoes extensive cleaning process to make it free from dirt and impurities.</p>\r\n\r\n<p><strong>Nutritional Facts</strong></p>\r\n\r\n<ul>\r\n	<li>Energy Valve---372.17kcal</li>\r\n	<li>Total carbohydrates---79.57g</li>\r\n	<li>protein---10.57g</li>\r\n	<li>Crude fat--0.63g</li>\r\n	<li>Total sugar--2.78g</li>\r\n	<li>Sodium---1.75 mg</li>\r\n</ul>', 4, '0', 'In stock', '600', '50', '40053372_3-ganesh-sooji.jpg', '2023-08-29 15:12:36', '2023-08-29 15:12:36'),
(9, '7', 'NUTRI BINGE Premium California Almonds, 500 g', 670, '<p>Historically, almond trees grew in wild and were later cultivated as early as 3000 BC. Almonds are even referenced in the first book of the Bible, Genesis, as a prized food given as gifts. They contribute a whole lot to our body&#39;s health and is the best snacking option to content your crunchy desire of an unhealthy snack. Nutribinge brings to you the most thoroughly checked and certified, hygienic almonds that have benefits that cannot be limited to just a few points.</p>\r\n\r\n<p><strong>How to Use</strong></p>\r\n\r\n<ul>\r\n	<li>Great snack on their own.</li>\r\n	<li>Additionally, you may combine them to make a delectable and nutritious trail mix.</li>\r\n</ul>', 5, '495', 'In stock', '200', '50', '40308958_1-nutri-binge-premium-california-almonds.jpg', '2023-08-29 15:15:36', '2023-08-29 15:15:36'),
(10, '12', 'Pampers Diaper Pants - Anti Rash, XL 56 pcs + Baby Wet Wipes 72 pcs (Pack Of 2), Combo 2 Items', 1897, '<p>Pampers all-around protection pants have ANTI-RASH lotion with aloe vera, to keep your baby&rsquo;s skin protected. Newborn baby diapers containing Lotion with Aloe vera help protect your baby&rsquo;s delicate skin from diaper rash and irritation. Best diapers with Ultra Absorb Core provides your baby a new type of dryness overnight - breathable dryness. Magic gel locks wetness away to provide up to 12 hours of dryness. The new and improved product design enables a comfortable fit, closer to the baby&rsquo;s body and a flexible waistband that adapts to the baby&rsquo;s movements for a comfortable fit. Available in all sizes &ndash; Small diapers, medium diaper pants, large size diaper pants, xl diapers, XXL diapers, XXL diaper pants. A top layer with cotton-like soft material ensures a comfortable night&rsquo;s sleep. Our pants with fun exterior graphics, fun designs and characters ensure you enjoy yourself with your baby.</p>', 4, '1282', 'In stock', '600', '50', '1215023_1-pampers-diaper-pants-anti-rash-xl-56-pcs-baby-wet-wipes-72-pcs-pack-of-2.jpg', '2023-08-29 15:29:50', '2023-08-29 15:29:50'),
(11, '12', 'Bigbasket Baby Wipes - Fresh, No Paraben, Double Moisturising, 80 pcs', 199, '<p>The Baby&#39;s skin is delicate and sensitive. BigBasket Wet Wipes - Fresh is made from the finest quality material which gives it a distinct honeycomb look and leaves a fresh clean look on your baby&#39;s skin. Ingredients used in these wipes are absolutely safe and free from harmful chemicals like paraben and alcohol. It leaves the natural protective skin barrier intact.</p>\r\n\r\n<p>These wipes have aloe vera as a key ingredient which makes them the best choice for baby hygiene, makeup remover, sanitising your face or any other situation where you need a quick hygiene solution. Aloe vera is a natural moisturiser that protects, soothes irritation, cleanses and moisturises the baby&#39;s skin anytime, anywhere.&nbsp;Recommended for babies and children&#39;s daily hygiene.&nbsp;</p>', 5, '105', 'In stock', '50', '20', '40085597_6-bigbasket-baby-wipes-fresh-no-paraben-double-moisturizing.jpg', '2023-08-29 15:32:01', '2023-08-29 15:32:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
