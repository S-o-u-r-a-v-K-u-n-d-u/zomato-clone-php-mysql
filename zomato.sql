-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 12:38 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zomato`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `background_img` varchar(255) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `mobile`, `address`, `profile_img`, `background_img`, `menu`) VALUES
(4, 'Subway', 'subway@gmail.com', '12345', '', '', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAScAAACrCAMAAAATgapkAAAAxlBMVEX///8AmUf/ygj/xwAAmUgAlTv9ygD//v/93H0Aljj856OhzrIAkjebza0AlUEAjzW428n811b58s+23cWBxZr+12AAlj/84IyHwZ7I5NCJw5gXn0799dtTrnc2pmDV6dp2vI3r+PD9/vVRrm6v0rz86Kr9zRoAkS/78dHf7uZesHvM4tf65', 'https://b.zmtcdn.com/data/pictures/chains/8/20728/3c7108759d36dbaa8f2ddb9e5ebcf199.jpg?fit=around|771.75:416.25&crop=771.75:416.25;*,*', 'Sandwich,Family Meal,Noodles'),
(5, 'WOW! Momo', 'momo@gmail.com', '12345', '', '', 'https://b.zmtcdn.com/data/brand_creatives/logos/e6a0dc9d06256ffdc331a7d7245fbcc5_1617879709.png?output-format=webp', 'https://b.zmtcdn.com/data/pictures/chains/0/21060/fe92135685160e19b3a464a788876e45.jpg?fit=around|771.75:416.25&crop=771.75:416.25;*,*', 'Fried Momo,PanFried Momo'),
(6, 'KFC', 'kfc@gmail.com', '12345', '', '', 'https://b.zmtcdn.com/data/brand_creatives/logos/560b209a689eefa9feb367b5d5604097_1611382952.png?output-format=webp', 'https://b.zmtcdn.com/data/pictures/chains/7/20287/ab7dc239625ef34124d8a38b57a22e3a.jpg?fit=around|771.75:416.25&crop=771.75:416.25;*,*', 'Bucket,Burger,Rice Bowl, Meal'),
(7, 'Arsalan', 'Arsalan@gmail.com', '12345', '', '', 'https://b.zmtcdn.com/data/brand_creatives/logos/fe5db95ae85292933996d4043f600d3b_1611320738.png?output-format=webp', 'https://b.zmtcdn.com/data/pictures/5/20795/adfd20727edb7545d5452e52dbdcfd83.jpg?fit=around|771.75:416.25&crop=771.75:416.25;*,*', 'Mutton Biryani,Chicken Biryani,Hyderabadi Biryani'),
(8, 'Pizza Hut', 'Pizza Hut@gmail.com', '12345', '', '', 'https://b.zmtcdn.com/data/brand_creatives/logos/c38f7540bcc5a38e918856ac06409056_1504531339.png?output-format=webp', 'https://b.zmtcdn.com/data/pictures/chains/7/20407/4f4440d6f4e39151f92a850c27ac13f7.jpg?fit=around|771.75:416.25&crop=771.75:416.25;*,*', 'Pizza'),
(9, 'Quality Walls', 'kawalitywalls@gmail.com', '12345', '', '', 'https://b.zmtcdn.com/data/brand_creatives/logos/f19569affdf177676dc916015a0a12a2_1617875309.png?output-format=webp', 'https://b.zmtcdn.com/data/pictures/chains/3/19389263/58bab74326008c61f9e1d3a3c6448ca7.jpg?fit=around|771.75:416.25&crop=771.75:416.25;*,*', 'Ice Cream,Cornetto,Cup,Tub');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `date`, `status`, `payment_method`, `amount`, `address`) VALUES
('60fc36d29599b', 8, '2021/07/24 09/20', '1', 'UPI', 360, 31),
('60fcee293f37d', 9, '2021/07/25 10/22', 'pending', '0', 676, 0),
('60fd31c2518f4', 10, '2021/07/25 03/11', '1', 'UPI', 270, 32),
('60fd3341e3282', 10, '2021/07/25 03/17', '1', 'UPI', 450, 32);

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street_address` text NOT NULL,
  `landmark` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `rating` float NOT NULL,
  `location` varchar(255) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `image`, `price`, `catagory`, `type`, `details`, `stock`, `rating`, `location`, `restaurant_name`) VALUES
(1, 'Veg Sandwich', 'https://b.zmtcdn.com/data/pictures/8/20728/75d199829038cdcd50e25bf3f43bc5eb.jpg?fit=around|771.75:416.25&crop=771.75:416.25;*,*', 400, 'Healthy Food, Sandwich, Salad, Wraps, Fast Food', 'veg', 'This gift from the sea is simple, yet sumptuous ensemble of flaked tuna, mixed with mayo, and your choice of fresh vegetables.', 1, 4.5, 'kolkata', 'Subway'),
(2, 'Chicken Sandwich ', 'https://b.zmtcdn.com/data/pictures/chains/8/20728/3c7108759d36dbaa8f2ddb9e5ebcf199.jpg?fit=around|771.75:416.25&crop=771.75:416.25;*,*', 250, 'Healthy Food, Sandwich, Salad, Wraps, Fast Food', 'non veg', 'Succulent chicken breast pieces marinated with yogurt, garlic, ginger and barbecued to get that delightfully unique taste.', 1, 3.2, 'Kolkata', 'Subway '),
(3, 'Chicken Teriyaki sandwich ', 'https://b.zmtcdn.com/data/pictures/chains/8/20728/3c7108759d36dbaa8f2ddb9e5ebcf199.jpg?fit=around|771.75:416.25&crop=771.75:416.25;*,*', 250, 'Healthy Food, Sandwich, Salad, Wraps, Fast Food', 'non veg', 'This gourmet specialty is a flavourful blend of tender teriyaki glazed chicken strips served hot and toasted, on freshly baked bread.', 1, 4.2, 'Kolkata', 'Subway '),
(4, 'Paneer Tikka Sandwich ', 'https://b.zmtcdn.com/data/dish_photos/f3c/c5d434803f6ea90f8ea7fa075d749f3c.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 180, 'Healthy Food, Sandwich, Salad, Wraps, Fast Food', 'veg', 'Cottage cheese slices marinated with barbecue seasoning and roasted to a light crispness.', 1, 4.6, 'Kolkata', 'Subway '),
(5, 'Peri Peri Chicken Sandwich ', 'https://b.zmtcdn.com/data/dish_photos/114/7724d8232293795cf42343c2e28c5114.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 180, 'Healthy Food, Sandwich, Salad, Wraps, Fast Food', 'non veg', 'Sliced Chicken topped with spicy African - bird’s eye chili called Peri-Peri which is served with a choice of crisp veggies on freshly baked bread', 1, 4, 'Kolkata', 'Subway '),
(6, 'Veg Mixed Cantonese Noodles', 'https://b.zmtcdn.com/data/pictures/0/19570490/3a2324334adf8b01658830376649c2a0.jpg?fit=around%7C200%3A200&crop=200%3A200%3B%2A%2C%2A', 150, 'Chinese,Fast food,Noodles', 'veg', 'Noodles in thick white Chinese gravy of assorted vegetables.', 1, 4.3, 'Kolkata', 'Subway '),
(7, 'Chicken Cantonese Noodles', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTopj5J1fOc_u37-OnkwHi8__Up3QjSirOEV-HCODTHFDGXWr2FSfWfGbNmKutzNxYSOgpPXvHxKpdeg&usqp=CAU', 250, 'Chinese,Fast food,Noodles', 'non veg', 'Noodles in thick white Chinese gravy of assorted vegetables.', 1, 4.9, 'Kolkata', 'Subway '),
(8, 'Chicken Chilli Garlic Noodles', 'https://b.zmtcdn.com/data/pictures/0/19570490/4953fd2f2f8fc445df2d6fe1919901ac.png?fit=around%7C200%3A200&crop=200%3A200%3B%2A%2C%2A', 140, 'Chinese,Fast food,Noodles', 'non veg', 'Noodles with fresh vegetables tossed in chilli paste, tomato ketchup flavoured with chopped garlic.', 1, 4.7, 'Kolkata', 'Subway '),
(9, 'Chicken Oriental Noodles', 'https://b.zmtcdn.com/data/pictures/0/19570490/31f47361900c96d6394cfca3d2206c91.jpg?fit=around%7C200%3A200&crop=200%3A200%3B%2A%2C%2A', 160, 'Chinese,Fast food,Noodles', 'nonveg', 'Noodles with fresh vegetables tossed in chilli paste, tomato ketchup flavoured with chopped garlic.', 1, 4.6, 'Kolkata', 'Subway '),
(10, 'Chicken Schezwan Noodles', 'https://b.zmtcdn.com/data/pictures/0/19570490/d9311d3d9df9f2a3d97ee4aa8119a8bd.jpg?fit=around%7C200%3A200&crop=200%3A200%3B%2A%2C%2A', 250, 'Chinese,Fast food,Noodles', 'veg', 'Wok tossed noodles in a peppery schezwan sauce with fresh vegetables.', 1, 4.1, 'Kolkata ', 'Subway '),
(11, 'Veg Family Meal', 'https://b.zmtcdn.com/data/dish_photos/927/453eb356134afa44b35b551720fab927.jpg?fit=around|130:130&crop=130:130;*,*', 900, 'Family meals', 'Veg', 'One Veg Salad+One Veg Footlong [30 cm, 12 inches]+One Veg Signature Wrap+One Veg Choco Truffle Cake+One Lays Maxx Chip+One Pepsi [Pet, 500 ml]', 1, 4.2, 'Kolkata ', 'Subway '),
(12, 'Non Veg Value Family Meal\r\n\r\n', 'https://b.zmtcdn.com/data/dish_photos/960/cea6baa204aaefaf1c67be8901e38960.jpg?fit=around|130:130&crop=130:130;*,*', 899, 'Family meals\r\n', 'Non veg', 'https://b.zmtcdn.com/data/dish_photos/960/cea6baa204aaefaf1c67be8901e38960.jpg?fit=around|130:130&crop=130:130;*,*', 1, 4.5, 'Kolkata', 'Subway '),
(13, 'Non Veg Premium Family Meal\r\n\r\n\r\n', 'https://b.zmtcdn.com/data/dish_photos/7b7/2582ca04eef1b7aeb9116809e88217b7.jpg?fit=around|130:130&crop=130:130;*,*', 949, 'Family meals\r\n', 'Non veg', 'One Non Veg Salad+One Non Veg Footlong [30 cm, 12 inches]+One Non Veg Signature Wrap+One Veg Choco Truffle Cake+One Lays Maxx Chip+One Pepsi [Pet, 500 ml]', 1, 4.4, 'Kolkata', 'Subway '),
(14, 'Classic Burger', 'https://b.zmtcdn.com/data/dish_photos/2cd/554a151953be2415e44e3d561e8742cd.jpg?fit=around|130:130&crop=130:130;*,*', 153, 'Burgers,Fast Food', 'non veg', 'Signature chicken burger made with a crunchy chicken fillet, veggies & a delicious mayo sauce', 1, 4.5, 'Kolkata', 'KFC'),
(15, 'Tandoori Zinger Burger', 'https://b.zmtcdn.com/data/dish_photos/a70/4de046c19b00431989e3d7cc8e6eaa70.jpg?fit=around|130:130&crop=130:130;*,*', 162, 'Burgers,Fast food', 'non veg', 'Chicken zinger with a delicious tandoori sauce', 1, 4.5, 'Kolkata', 'KFC'),
(16, 'Buddy Burger Meal', 'https://b.zmtcdn.com/data/dish_photos/8ff/d5da83718d807d67557effbcc41d98ff.jpg?fit=around|130:130&crop=130:130;*,*', 438, 'Burgers,Fast food', 'non veg', 'Share 2 Classic Chicken Zingers & a Medium Popcorn in this delightful combo for 2', 1, 4.7, 'Kolkata', 'KFC'),
(17, '2 Chicke Burger Krispers Meal', 'https://b.zmtcdn.com/data/dish_photos/741/c473b4763e0d395ffec340eb4c340741.jpg?fit=around|130:130&crop=130:130;*,*', 332, 'Burgers,Fast food', 'non veg', '2 Chicken value burgers, crispy medium fries & 2 delicious dips at a deal price!', 1, 4.8, 'Kolkata', 'KFC'),
(18, 'Ultimate Savings Bucket', 'https://b.zmtcdn.com/data/dish_photos/f3b/68853ca3fac35a5a7c76d74fc945ff3b.jpg?fit=around|130:130&crop=130:130;*,*', 665, 'Snacks ', 'non veg', 'Save 30% with our best-seller bucket of 4pc Hot & crispy chicken, 6 Hot Wings, 4 chicken strips , 3 Dips & a chilled Pepsi PET [serves 2-3 ]', 1, 4.1, 'Kolkata', 'KFC'),
(19, 'Big 8 Bucket', 'https://b.zmtcdn.com/data/dish_photos/1e0/70c96602f2d7ebbf278de5b3789bc1e0.jpg?fit=around|130:130&crop=130:130;*,*', 589, 'Snacks ', 'non veg', 'Save 30% on this variety bucket of 4pc Hot & Crispy chicken & 4pc Smoky Red chicken [serves 2- 3 ]', 1, 4.5, 'Kolkata', 'KFC'),
(20, 'Popcorn Rice Bowl', 'https://b.zmtcdn.com/data/dish_photos/2f6/db4e1b2e3527d1e4139844f3a6f392f6.jpg?fit=around|130:130&crop=130:130;*,*', 152, 'Rice Bowls', 'non veg', 'Bowl of rice with flavorful gravy & crunchy popcorn', 1, 4.7, 'Kolkata', 'KFC'),
(21, 'Veg Rice Bowl', 'https://b.zmtcdn.com/data/dish_photos/f1e/2041779f525124b0932e6df911f06f1e.jpg?fit=around|130:130&crop=130:130;*,*', 132, 'Rice Bowls', 'veg', 'Bowl of rice with flavorful gravy & crunchy popcorn', 1, 4.3, 'Kolkata', 'KFC'),
(22, 'Pasta Pizza Family Treat (Veg)', 'https://b.zmtcdn.com/data/dish_photos/f66/006767f4f431e29b6127017118da4f66.jpg?fit=around|130:130&crop=130:130;*,*', 503, 'pizza,Fast food', 'veg', 'Med Creamy Tomato Pasta Pizza + Garlic Bread + Pepsi', 1, 4.7, 'Kolkata', 'Pizza Hut'),
(23, 'Double Cheese Margherita Pizza', 'https://b.zmtcdn.com/data/dish_photos/f66/006767f4f431e29b6127017118da4f66.jpg?fit=around|130:130&crop=130:130;*,*', 503, 'pizza,Fast food', 'veg', 'A classic delight loaded with extra 100% real mozzarella cheese', 1, 4.4, 'Kolkata', 'Pizza Hut'),
(24, 'Non Veg Supreme Pizza', 'https://b.zmtcdn.com/data/dish_photos/165/658450cb9f05e145d3a9bedec2413165.jpg?fit=around|130:130&crop=130:130;*,*', 319, 'pizza,Fast food', 'non veg', 'Supreme combination of black olives, onion, capsicum, grilled mushroom, pepper barbecue chicken, peri-peri chicken & grilled chicken rashers', 1, 4.5, 'Kolkata', 'Pizza Hut'),
(25, 'Chicken Golden Delight Pizza', 'https://b.zmtcdn.com/data/dish_photos/21e/78a70ba0b889eddef398ebc530e1721e.jpg?fit=around|130:130&crop=130:130;*,*', 249, 'pizza,Fast food', 'non veg', 'Double pepper barbecue chicken, golden corn and extra cheese, true delight', 1, 4.5, 'Kolkata', 'Pizza Hut'),
(26, 'Moroccan Spice Pasta Pizza - Non Veg Pizza', 'https://b.zmtcdn.com/data/dish_photos/a67/d9d8db012462fa5b69a2113ecfb9ea67.jpg?fit=around|130:130&crop=130:130;*,*', 229, 'Pizza,Fast food', 'non veg', 'A pizza loaded with a spicy combination of Harissa sauce, Peri Peri chicken chunks and delicious pasta.', 1, 4.8, 'Kolkata', 'Pizza Hut'),
(27, 'Chicken Pepperoni Pizza', 'https://b.zmtcdn.com/data/dish_photos/374/239089cbab2704d08c570a0d6854e374.png?fit=around|130:130&crop=130:130;*,*', 329, 'Pizza,Fast food', 'non veg', 'A classic American taste! Relish the delectable flavor of Chicken Pepperoni, topped with extra cheese', 1, 4.9, 'Kolkata', 'Pizza Hut'),
(28, 'Creamy Tomato Pasta Pizza - Veg', 'https://b.zmtcdn.com/data/dish_photos/d6d/8e598eaf8cb3a0ec1a0dc974b1358d6d.jpg?fit=around|130:130&crop=130:130;*,*', 250, 'Pizza,Fast food', 'veg', 'Loaded with a delicious creamy tomato pasta topping , green capsicum, crunchy red and yellow bell peppers and black olives', 1, 4.7, 'Kolkata', 'Pizza Hut'),
(29, 'Pepper Barbecue Chicken Pizza', 'https://b.zmtcdn.com/data/dish_photos/bf5/a582280010d84ddc28abd0772c46ebf5.jpg?fit=around|130:130&crop=130:130;*,*', 229, 'Pizza,Fast food', 'non veg', 'Pepper barbecue chicken for that extra zing', 1, 4.6, 'Kolkata', 'Pizza Hut'),
(30, 'Non Veg Loaded Pizza', 'https://b.zmtcdn.com/data/dish_photos/05b/9ad3bf1b3b9680d315d2841c2b71405b.png?fit=around|130:130&crop=130:130;*,*', 165, 'Pizza,Fast food', 'non veg', 'Chicken sausage, pepper barbecue chicken & peri-peri chicken in a fresh pan crust', 1, 4.3, 'Kolkata', 'Pizza Hut'),
(31, 'Chicken Darjeeling Fried Momo', 'https://b.zmtcdn.com/data/dish_photos/1b0/3f04f9701ba241c27043bcd9a99bc1b0.jpg?fit=around|130:130&crop=130:130;*,*', 119, 'Momos, Tibetan, Fast Food\r\n', 'non veg', 'Filled with softy juicy boneless chicken, onion, coriender and mixed with the flavours of Indian masala. To make it crispy dipped in hot oil and served with red authentic darjeeling momo sauce.', 1, 4.8, 'Kolkata', 'WOW! Momo\r\n'),
(32, 'Veg Darjeeling Fried Momo', 'https://b.zmtcdn.com/data/dish_photos/ed3/d5a61d87592a29452fa241b565383ed3.jpg?fit=around|130:130&crop=130:130;*,*', 109, 'Momos, Tibetan, Fast Food\r\n', 'veg', 'Momo stuffed with freshly chopped Vegetable’s (Onion, carrot, cabbage, beans & Coriander), herbs and Tinch of Spices (5 Pcs). To make it crispy Fried in hot oil and Served with Spicy Red Authentic Darjeeling Momo Sauce.', 1, 4.7, 'Kolkata', 'WOW! Momo'),
(33, 'Chicken Schezwan Fried Momo', 'https://b.zmtcdn.com/data/dish_photos/1b0/3f04f9701ba241c27043bcd9a99bc1b0.jpg?fit=around|130:130&crop=130:130;*,*', 169, 'Momos, Tibetan, Fast Food', 'non veg', 'Filled with juicy chicken and mixed with the flavours of Indian masala and comes with the mouth watering schezwan flavour. To make it crispy dipped in hot oil and served with red and green sauce.', 1, 4.8, 'Kolkata', 'WOW! Momo'),
(34, 'Paneer Fried Momo', 'https://b.zmtcdn.com/data/dish_photos/58b/5e8424fcecccb66eff8c6fcd45a0058b.jpg?fit=around|130:130&crop=130:130;*,*', 149, 'Momos, Tibetan, Fast Food', 'non veg', 'Filled with fresh chopped veggies and tender Paneer. Mixed with herbs and fried till Golden brown colour and served with Red & Green Sauce.', 1, 4.4, 'Kolkata', 'WOW! Momo'),
(35, 'Corn & Cheese Fried Momo\r\n\r\n', 'https://b.zmtcdn.com/data/dish_photos/9f0/e320d41ede9543e27f562fcc56c8c9f0.jpg?fit=around|130:130&crop=130:130;*,*', 175, 'Momos, Tibetan, Fast Food', 'veg', 'Filled with shredded cheese and sweet corn and mixed with the flavours of Indian masala. To make it crispy dipped in hot oil and served with red and green sauce.', 1, 4.6, 'Kolkata', 'WOW! Momo'),
(36, 'Veg PanFried Momo', 'https://b.zmtcdn.com/data/dish_photos/0be/cb7819ad8f3be1d032671e31ee5530be.jpg?fit=around|130:130&crop=130:130;*,*', 155, 'Momos, Tibetan, Fast Food', 'veg', 'Crispy Fried Veggie Momo, Tossed in Spicy Schezwan Sauce and Garnished with Coriander.', 1, 4.6, 'Kolkata', 'WOW! Momo'),
(37, 'Chicken & Cheese PanFried Momo', 'https://b.zmtcdn.com/data/dish_photos/cd4/6413916b9177d24706feddc435d09cd4.jpg?fit=around|130:130&crop=130:130;*,*', 190, 'Momos, Tibetan, Fast Food', 'non veg', 'Hot & Crispy Fried Chicken Cheese Momo, Tossed in Spicy Schezwan Sauce and Garnished with Coriander.', 1, 4.7, 'Kolkata', 'WOW! Momo'),
(38, 'Chicken Darjeeling PanFried Momo', 'https://b.zmtcdn.com/data/dish_photos/7a9/ee16bdb0d09dbdc03b847a2dd566a7a9.jpg?fit=around|130:130&crop=130:130;*,*', 135, 'Momos, Tibetan, Fast Food', 'non veg', 'Hot & crispy fried chicken darjeeling momo, tossed in spicy schezwan sauce and garnished with coriander.(5 pcs in one portion)\r\n\r\n', 1, 4.8, 'Kolkata', 'WOW! Momo'),
(40, 'Veg Darjeeling PanFried Momo\r\n\r\n', 'https://b.zmtcdn.com/data/dish_photos/523/a6dafa9145213627f5bf98d69baa8523.jpg?fit=around|130:130&crop=130:130;*,*', 225, 'Momos, Tibetan, Fast Food', 'veg', 'Crispy fried veggie darjeeling momo, tossed in spicy schezwan sauce and garnished with coriander. (5 pcs in one portion)', 1, 3.8, 'Kolkata', 'WOW! Momo'),
(41, 'Mutton Biryani', 'https://b.zmtcdn.com/data/dish_photos/faf/659a76d92493e2e456f6e8f3c1284faf.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 290, 'Biryani, Mughlai, Rolls, North Indian\r\n\r\n\r\n', 'non veg', 'Discovered by the ancestors of Arsalan, this biryani is made with juicy mutton pieces cooked dum style in aromatic rice & bhuna spices.', 1, 4.8, 'Kolkata', 'Arsalan'),
(42, 'Chicken Biryani', 'https://b.zmtcdn.com/data/dish_photos/a57/6cb60dd1f54a659afe0368897bb90a57.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 290, 'Biryani, Mughlai, Rolls, North Indian\r\n\r\n', 'non veg', 'A dish truly fit for a King. Succulent pieces of chicken laid on a bed of long grain rice & slow cooked dum style with the secret Arsalan spices.', 1, 4.5, 'Kolkata', 'Arsalan'),
(43, 'Special Mutton Biryani [2 Pieces]\r\n', 'https://b.zmtcdn.com/data/dish_photos/cc4/23503757770631e257cc0085bc710cc4.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 435, 'Biryani, Mughlai, Rolls, North Indian', 'non veg ', 'Discovered by the ancestors of Arsalan, this biryani is made with juicy mutton [2 pieces] cooked dum style in aromatic rice & bhuna spices.', 1, 4.7, 'Kolkata', 'Arsalan'),
(44, 'Special Chicken Biryani [2 Pieces]', 'https://b.zmtcdn.com/data/dish_photos/911/93afb7380ef925f30239e36e79c35911.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 405, 'Biryani, Mughlai, Rolls, North Indian', 'non veg', 'A dish truly fit for a King. Succulent pieces of chicken [2 pieces] laid on a bed of long grain rice & slow cooked dum style with the secret Arsalan spices.', 1, 4.5, 'Kolkata', 'Arsalan'),
(45, 'Hyderabadi Biryani\r\n\r\n', 'https://b.zmtcdn.com/data/dish_photos/e29/4d39feac249dba98513486c200e26e29.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 300, 'Biryani, Mughlai, Rolls, North Indian', 'non veg', 'Arsalan presents you the taste of Hyderabad in an aromatic, mouth watering and authentic biryani with succulent Mutton in layers of fluffy rice, fragrant spices and caramelized onions.', 1, 4.7, 'Kolkata', 'Arsalan'),
(46, 'Oreo and Cream Cup [100 ml]', 'https://b.zmtcdn.com/data/dish_photos/fb0/e489e37dfc331bebfcf21cd9009cffb0.jpg?fit=around|130:130&crop=130:130;*,*', 50, 'Ice Cream, Desserts', 'veg', 'Vanilla flavour with Oreo chunks.', 1, 4, 'Kolkata', 'Quality Walls'),
(47, 'Tender Coconut Cup [100 ml]', 'https://b.zmtcdn.com/data/dish_photos/3e4/6d2efe0cde78c225caf434087546f3e4.jpg?fit=around|130:130&crop=130:130;*,*', 50, 'Ice Cream, Desserts', 'veg', 'Feel naturally refresehed with Kwality Walls tender coconut. Coconut flavour enhanced with coconut chunks.', 1, 5, 'Kolkata', 'Quality Walls'),
(48, 'Magnum Almond Ice Cream [80 ml]\r\n\r\n', 'https://b.zmtcdn.com/data/dish_photos/75d/5683cd0ec390039c32228877aa63775d.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 90, 'Ice Cream, Desserts', 'veg', 'Expertly crafted ice cream with madagascan vanilla, crunchy australian almonds and Belgian chocolate.', 1, 5, 'Kolkata', 'Quality Walls'),
(49, 'Magnum Brownie Ice Cream [80 ml]\r\n\r\n', 'https://b.zmtcdn.com/data/dish_photos/a82/632a9e265dbef015d117065ce7306a82.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 90, 'Ice Cream, Desserts', 'veg', 'Expertly crafted ice cream with brownie flavour ice cream, crunchy cashews and Belgian chocolate.', 1, 4, 'Kolkata', 'Quality Walls'),
(50, '\r\nMagnum Chocolate Truffle Ice Cream [80 ml]\r\n\r\n', 'https://b.zmtcdn.com/data/dish_photos/115/1e42823d669a051614f23f4e53122115.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 80, 'Ice Cream, Desserts', 'veg', 'Rich Chocolate ice cream with Truffle Sauce wrapped in thick Belgian chocolate', 1, 4, 'Koltata', 'Quality Walls'),
(51, 'Cornetto Butterscotch [105 ml]', 'https://b.zmtcdn.com/data/dish_photos/adc/221a9666a1ac67a48164da42f4c11adc.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 40, 'Ice Cream, Desserts', 'veg', 'Creamy, butterscotch dessert with peices of cashew coated in caramel on the top.', 1, 5, 'Koltata', 'Quality Walls'),
(52, '\r\n\r\nCornetto Disc Oreo [110 ml]\r\n\r\n\r\n', 'https://b.zmtcdn.com/data/dish_photos/dd5/05a690d1f055f7e47307fbbe62538dd5.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 60, 'Ice Cream, Desserts', 'veg', 'Vanilla flavour with Oreo crumbs, chocolate disc and crunchy wafer cone\r\n\r\n', 1, 5, 'Koltata', 'Quality Walls'),
(53, '\r\nCornetto Double Chocolate [105 ml]\r\n', 'https://b.zmtcdn.com/data/dish_photos/2f6/32670b7f03443ee0c8bfd749ebc602f6.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 40, 'Ice Cream, Desserts', 'veg', 'Duo of milk and dark chocolate topped with chocolate sauce and chips.', 1, 4, 'Koltata', 'Quality Walls'),
(54, '\r\nTwice Nice Fruit and Nut [Tub, 700 ml]\r\n\r\n\r\n\r\n', 'https://b.zmtcdn.com/data/dish_photos/136/07185b4ac0a6f59e8103c13ed9e9e136.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 219, 'Ice Cream, Desserts', 'veg', '\r\nCrunchiness of real nuts & delicious raisins', 1, 5, 'Koltata', 'Quality Walls'),
(55, 'Oreo and Cream Premium [Tub, 700 ml]\r\n', 'https://b.zmtcdn.com/data/dish_photos/3ff/dc94c1c7da36d8548b02153fa12493ff.jpg?output-format=webp&fit=around|130:130&crop=130:130;*,*', 265, 'Ice Cream, Desserts', 'veg', 'Oreo cookies crushed into a creamy dessert', 1, 5, 'Koltata', 'Quality Walls');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `background_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
