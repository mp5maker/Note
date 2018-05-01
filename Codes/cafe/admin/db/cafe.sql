SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `admin` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(50) NOT NULL,
  `pass` VARCHAR(100) NOT NULL,
  `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `admin` (`id`, `email`, `pass`, `date_created`) VALUES
(1, 'khan.photon@gmail.com', '$2y$10$7Rkitkb7LBdrxSasNaARO.KEStzbdcyBpY09T.41Yu8DlrRlPr.iy', '2018-04-24 07:48:46');

CREATE TABLE IF NOT EXISTS `website` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`name` VARCHAR(50) NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `website` (`id`, `name`) VALUES
(1, 'Marz\'s Cafe');


CREATE TABLE IF NOT EXISTS `navigation` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`name` VARCHAR(25) NOT NULL,
  	`src` VARCHAR(50) NOT NULL,
  	`icon` VARCHAR(25) NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `navigation` (`id`, `name`, `src`, `icon`) VALUES
(1, 'Home', '/cafe/home.php', 'icon-home'),
(2, 'Menu', '/cafe/menu.php', 'icon-food'),
(3, 'Contact Us', '/cafe/contact_us.php', 'icon-group');

CREATE TABLE IF NOT EXISTS `logo` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`src` VARCHAR(50) NOT NULL,
  	`alt` VARCHAR(25) NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `logo` (`id`, `src`, `alt`) VALUES
(1, '/cafe/img/marzia.gif', 'Logo');

CREATE TABLE IF NOT EXISTS `brand` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`src` VARCHAR(50) NOT NULL,
  	`alt` VARCHAR(25) NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `brand` (`id`, `src`, `alt`) VALUES
(1, 'icon-coffee', 'Brand');

CREATE TABLE IF NOT EXISTS `footer` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`copy` VARCHAR(50) NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `footer` (`id`, `copy`) VALUES
(1, 'Photon\'s Workshop. All Rights Reserved');

CREATE TABLE IF NOT EXISTS `about` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`title` VARCHAR(50) NOT NULL,
  	`description` MEDIUMTEXT NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `about` (`id`, `title`, `description`) VALUES
(1, 'About Us', 'Marz is a classic and timeless coffee house located in the heart of Baily Road. We pride ourself on being social community meeting place. Marz is the place for you to eat healthy and perform yoga.');


CREATE TABLE IF NOT EXISTS `chart_options` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`title` VARCHAR(50) NOT NULL,
  	`threedee` VARCHAR(50) NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `chart_options` (`id`, `title`, `threedee`) VALUES
(1, 'Why go to Marz\'s Cafe?', 'true');

CREATE TABLE IF NOT EXISTS `chart_data` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`reason` VARCHAR(50) NOT NULL,
  	`percentage` INT NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `chart_data` (`id`, `reason`, `percentage`) VALUES
(1, 'Social Meet up', 45),
(2, 'Coffee', 30),
(3, 'Yoga', 8),
(4, 'Read Books', 9),
(5, 'Study', 9);

CREATE TABLE IF NOT EXISTS `notice` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`open` VARCHAR(50) NOT NULL,
  	`close` VARCHAR(50) NOT NULL,
  	`notice` VARCHAR(50) NOT NULL,
  	`description` MEDIUMTEXT NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `notice` (`id`, `open`, `close`, `notice`, `description`) VALUES
(1, '9:00 AM', '11:00 PM', 'Construction Work', 'Please, be careful near baily road!');

CREATE TABLE IF NOT EXISTS `quote` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`quote` MEDIUMTEXT NOT NULL,
  	`name` VARCHAR(50) NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `quote` (`id`, `quote`, `name`) VALUES
(1, 'Science may never come up with a better office communication system than the coffee break', 'Earl Wilson'),
(2, 'If it wasn\'t for the coffee, I\'d have no identifiable personality whatsover', 'David Letterman');

CREATE TABLE IF NOT EXISTS `service_one` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`title` VARCHAR(50) NOT NULL,
  	`description` VARCHAR(50) NOT NULL,
  	`icon` VARCHAR(50) NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `service_one` (`id`, `title`, `description`, `icon`) VALUES
(1, 'POWER', 'Laptop and internet facilities', 'icon-power-off'),
(2, 'LOVE', 'Made Coffee with love for families and friends', 'icon-heart'),
(3, 'JOB DONE', 'Printing and other facilities', 'icon-lock');


CREATE TABLE IF NOT EXISTS `service_two` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`title` VARCHAR(50) NOT NULL,
  	`description` VARCHAR(50) NOT NULL,
  	`icon` VARCHAR(50) NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `service_two` (`id`, `title`, `description`, `icon`) VALUES
(1, 'GREEN', 'Using recycling products for the cups', 'icon-leaf'),
(2, 'CERTIFIED', 'Food Inspection Certified', 'icon-certificate'),
(3, 'HARD WORK', 'Contantly working hard to improve our customer service', 'icon-wrench');

CREATE TABLE IF NOT EXISTS `portfolio` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`src` VARCHAR(50) NOT NULL,
  	`alt` VARCHAR(50) NOT NULL,
  	`title` VARCHAR(50) NOT NULL,
  	`description` TEXT NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `portfolio` (`id`, `src`, `alt`, `title`, `description`) VALUES
(1, '/cafe/img/photography.jpg', 'Coffee Photograph', 'Photography', 'Yes, we support photography to enable creativity'),
(2, '/cafe/img/coffeeanimated.gif', 'Coffee Animated', 'Artistic', 'We allow artists to enjoy the artwork'),
(3, '/cafe/img/coffeetype.jpg', 'Coffee Types', 'Coffee Types', 'Yes, we consider our customer values to make new types of coffee');

CREATE TABLE IF NOT EXISTS `location` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`latitude` DECIMAL(5,2) NOT NULL,
  	`longitude` DECIMAL(5,2) NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `location` (`id`, `latitude`, `longitude`) VALUES
(1, 23.740935399999998, 90.4122266);

CREATE TABLE IF NOT EXISTS `home` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`title1` VARCHAR(50) NOT NULL,
  	`desc11` MEDIUMTEXT NOT NULL,
  	`desc12` MEDIUMTEXT NOT NULL,
  	`title2` VARCHAR(50) NOT NULL,
  	`desc2` MEDIUMTEXT NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `home` (`id`,`title1`, `desc11`, `desc12`, `title2`, `desc2`) VALUES
(1, 'Welcome to our Coffee House!', 'It is a classic and timeless coffee house located in the heart of Baily Road. We pride ourself on being social community meeting place. It is the place for you to eat and drink healthy', 
	'We\'re so glad you made it. Have a seat. Let me get you a fresh, hot cup o\'Joe. Cream and Sugar? There you go.', 
	'About Marz\'s Cafe', 'Marz\'s Coffee has been selling coffee since 1991. For years, Marz\'s Cafe has been prominently supporting the web developers.');

CREATE TABLE IF NOT EXISTS `reason` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`src` VARCHAR(50) NOT NULL,
  	`description` MEDIUMTEXT NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `reason` (`id`, `src`, `description`) VALUES
(1, '/cafe/img/coffeespark.jpg', 'Spark the day with refreshment!'),
(2, '/cafe/img/coffeelove.jpg', 'Friend, family and the loved ones!'),
(3, '/cafe/img/coffeesplash.jpg', 'Remembering the good old times!');

CREATE TABLE IF NOT EXISTS `promotion` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`name` VARCHAR(50) NOT NULL,
  	`src` MEDIUMTEXT NOT NULL,
  	`price` INT NOT NULL,
  	`sale_price` INT NOT NULL,
  	`description` VARCHAR(50) NOT NULL,
	`date_start` VARCHAR(50) NOT NULL,
	`date_end` VARCHAR(50) NOT NULL,
  	PRIMARY KEY (`id`)
);

INSERT INTO `promotion` (`id`, `name`, `src`, `price`, `sale_price`, `description`, `date_start`, `date_end`) VALUES
(1, 'Couple Platter', '/cafe/img/platter.jpg', 800, 500, 'Enjoy your lovely evening together!', '12-Sep-2018', '9-Nov-2018'),
(2, 'Pizza Festa', '/cafe/img/pizzabuffet.jpeg', 1000, 700, 'Madness will start up your hunger!', '30-Aug-2018', '12-Sep-2018'),
(3, 'Coffee Brain', '/cafe/img/coffeebuffet.jpg', 2500, 2000, 'Hyper Active?', '30-Jun-2018', '30-Aug-2018');

CREATE TABLE IF NOT EXISTS `menu` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`href` VARCHAR(50) NOT NULL,
  	`src` VARCHAR(50) NOT NULL,
  	`name` VARCHAR(50) NOT NULL,
  	`description` MEDIUMTEXT NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `menu` (`id`, `href`, `src`, `name`, `description`) VALUES
(1, 'collapseOne', '/cafe/img/pizza.jpg', 'Pizza', 'none'),
(2, 'collapseTwo', '/cafe/img/lasagne.jpg', 'Lasagne', 'none'),
(3, 'collapseThree', '/cafe/img/coleslaw.jpg', 'Coleslaw', 'none'),
(4, 'collapseFour', '/cafe/img/sandwich.jpg', 'Sandwich', 'none');

CREATE TABLE IF NOT EXISTS `submenu` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`cat_id` INT NOT NULL,
  	`src` VARCHAR(50) NOT NULL,
  	`name` VARCHAR(50) NOT NULL,
  	`description` MEDIUMTEXT NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `submenu` (`id`, `cat_id`, `src`, `name`, `description`) VALUES
(1, 1, '', 'Four Seasons', 'Chicken breast, Beef, Mutton, Shrimp, Mushroom, Onion, Tomatoes, Alfredo sauce & mozzarella cheese'),
(2, 2, '', 'Layer Lasagne', 'Layered lasagne noodles, italian sausage and beef, ricotta cheese, tomato sauce, and baked mozzarella and romano cheese.'),
(3, 3, '', 'Creamy Cole Slaw', 'Our best yet! A crunchy coleslaw of white cabbage, carrot and onion with a chipotle spice in a rich and creamy dressing'),
(4, 4, '', 'King Club', 'Cut the carbs! Double the meat, double the cheeses, double the flavor');

CREATE TABLE IF NOT EXISTS `address` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`address` VARCHAR(50) NOT NULL,
  	`phone` VARCHAR(50) NOT NULL,
  	`email` VARCHAR(50) NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `address` (`id`, `address`, `phone`, `email`) VALUES
(1, 'Dhaka, Bangladesh', '+88017-XXXXXXXX', 'khan.photon@gmail.com');

CREATE TABLE IF NOT EXISTS `reservation` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`date` VARCHAR(50) NOT NULL,
  	`time` VARCHAR(50) NOT NULL,
  	`name` VARCHAR(50) NOT NULL,
  	`reserve` VARCHAR(50) NOT NULL,
  	`description` MEDIUMTEXT NOT NULL,
  	PRIMARY KEY (`id`) 
);

INSERT INTO `reservation` (`id`, `date`, `time`, `name`, `reserve`, `description`) VALUES
(1, '30-Apr-18', '8:00 PM', 'Sam\'s Birthday Party', 'Half', 'Balloons and party poppers allowed!'),
(2, '21-Nov-18', '2:00 PM', 'Dane\'s School Reunion', 'Full', 'Outside Foods are not allowed!');

CREATE TABLE IF NOT EXISTS `email` (
  `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `gender` VARCHAR(50) NOT NULL,
    `question` VARCHAR(50) NOT NULL,
    `description` MEDIUMTEXT NOT NULL,
    PRIMARY KEY (`id`) 
);

INSERT INTO `email` (`id`, `name`, `email`, `gender`, `question`, `description`) VALUES 
(1, 'Photon Khan', 'khan.photon@gmail.com', 'male', 'Complaint', 'Waiters are not serving properly on time');

COMMIT;