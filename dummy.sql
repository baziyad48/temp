-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for afternotes
CREATE DATABASE IF NOT EXISTS `afternotes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `afternotes`;

-- Dumping structure for table afternotes.diary
CREATE TABLE IF NOT EXISTS `diary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `review` text NOT NULL,
  `rating` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_diary_movie` (`judul`),
  KEY `FK_diary_user` (`username`),
  CONSTRAINT `FK_diary_movie` FOREIGN KEY (`judul`) REFERENCES `movie` (`judul`) ON DELETE NO ACTION,
  CONSTRAINT `FK_diary_user` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table afternotes.diary: ~0 rows (approximately)
/*!40000 ALTER TABLE `diary` DISABLE KEYS */;
INSERT INTO `diary` (`id`, `username`, `judul`, `date`, `review`, `rating`) VALUES
	(1, 'baziyad', 'Shazam!', '2019-04-22', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 4),
	(2, 'baziyad', 'The Night Comes for Us', '2019-04-21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 3),
	(3, 'baziyad', 'Be with You', '2019-04-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 4),
	(4, 'baziyad', 'Pengabdi Setan', '2019-04-19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 4),
	(5, 'baziyad', 'Thor: Ragnarok', '2019-04-18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 3),
	(6, 'baziyad', 'Us', '2019-04-17', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 5),
	(7, 'baziyad', 'The Night Comes for Us', '2019-04-16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 4);
/*!40000 ALTER TABLE `diary` ENABLE KEYS */;

-- Dumping structure for table afternotes.movie
CREATE TABLE IF NOT EXISTS `movie` (
  `judul` varchar(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `cast` varchar(255) NOT NULL,
  `sutradara` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `year` varchar(4) NOT NULL,
  `rating` int(10) NOT NULL,
  PRIMARY KEY (`judul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table afternotes.movie: ~12 rows (approximately)
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` (`judul`, `sinopsis`, `cast`, `sutradara`, `genre`, `year`, `rating`) VALUES
	('Alita: Battle Angel', 'When Alita awakens with no memory of who she is in a future world she does not recognize, she is taken in by Ido, a compassionate doctor who realizes that somewhere in this abandoned cyborg shell is the heart and soul of a young woman with an extraordinary past.', 'Rosa Salazar, Christoph Waltz, Jennifer Connelly ', 'Robert Rodriguez', 'Action, Adventure, Sci-Fi', '2019', 3),
	('Be with You', 'Along with his young son, Ji-ho, Woo-jin misses his wife Soo-a, who died after promising to return a year later with the rainy season. Miraculously, they reunite with Soo-a when the rainy season comes around, but she has no memory of her husband and son whom she dearly loved.', 'Ji-seob So, Ye-jin Son, Yoo-ram Bae', 'Jang-Hoon Lee', 'Drama, Fantasy, Romance', '2018', 4),
	('Instant Family', 'When Pete and Ellie decide to start a family, they stumble into the world of foster care adoption. They hope to take in one small child but when they meet three siblings, including a rebellious 15 year old girl, they find themselves speeding from zero to three kids overnight.', 'Mark Wahlberg, Rose Byrne, Isabela Moner', 'Sean Anders', 'Comedy, Drama', '2018', 3),
	('John Wick: Chapter 3 – Parabellum', 'John Wick is on the run for two reasons… he’s being hunted for a global $14 million dollar open contract on his life, and for breaking a central rule: taking a life on Continental Hotel grounds. The victim was a member of the High Table who ordered the open contract. John should have already been executed, except the Continental’s manager, Winston, has given him a one-hour grace period before he’s “Excommunicado” – membership revoked, banned from all services and cut off from other members. John uses the service industry to stay alive as he fights and kills his way out of New York City.', 'Keanu Reeves, Asia Kate Dillon, Jerome Flynn', 'Chad Stahelski', 'Action, Thriller ', '2019', 5),
	('Pengabdi Setan', 'After the death of Rini’s mother, something is disturbing her family.', 'Tara Basro, Bront Palarae, Dimas Aditya', 'Joko Anwar', 'Drama, Horror, Mystery', '2017', 4),
	('Pet Sematary', 'Louis Creed, his wife Rachel and their two children Gage and Ellie move to a rural home where they are welcomed and enlightened about the eerie ‘Pet Sematary’ located nearby. After the tragedy of their cat being killed by a truck, Louis resorts to burying it in the mysterious pet cemetery, which is definitely not as it seems, as it proves to the Creeds that sometimes dead is better.', 'Jason Clarke, Amy Seimetz, John Lithgow', 'Kevin Kölsch, Dennis Widmyer', 'Horror, Mystery, Thriller', '2019', 3),
	('Ready Player One', 'When the creator of a popular video game system dies, a virtual contest is created to compete for his fortune.', 'Tye Sheridan, Olivia Cooke, Ben Mendelsohn', 'Steven Spielberg', 'Action, Adventure, Sci-Fi ', '2018', 3),
	('Shazam!', 'A boy is given the ability to become an adult superhero in times of need with a single magic word.', 'Zachary Levi, Mark Strong, Asher Angel', 'David F. Sandberg', 'Action, Adventure, Comedy', '2019', 4),
	('The Dark Knight', 'Batman raises the stakes in his war on crime. With the help of Lt. Jim Gordon and District Attorney Harvey Dent, Batman sets out to dismantle the remaining criminal organizations that plague the streets. The partnership proves to be effective, but they soon find themselves prey to a reign of chaos unleashed by a rising criminal mastermind known to the terrified citizens of Gotham as the Joker.', 'Christian Bale, Heath Ledger, Aaron Eckhart', 'Christopher Nolan', 'Action, Crime, Drama', '2008', 5),
	('The Night Comes for Us', 'After sparing a girl’s life during a massacre, an elite Triad assassin is targeted by an onslaught of murderous gangsters.', 'Iko Uwais, Joe Taslim, Julie Estelle', 'Timo Tjahjanto', 'Action, Thriller', '2018', 3),
	('Thor: Ragnarok', 'Thor is imprisoned on the other side of the universe and finds himself in a race against time to get back to Asgard to stop Ragnarok, the destruction of his home-world and the end of Asgardian civilization, at the hands of an all-powerful new threat, the ruthless Hela.', 'Chris Hemsworth, Tom Hiddleston, Cate Blanchett', 'Taika Waititi', 'Action, Adventure, Comedy', '2017', 4),
	('Us', 'Husband and wife Gabe and Adelaide Wilson take their kids to their beach house expecting to unplug and unwind with friends. But as night descends, their serenity turns to tension and chaos when some shocking visitors arrive uninvited.', 'Lupita Nyong\'o, Winston Duke, Elisabeth Moss', 'Jordan Peele', 'Horror, Thriller', '2019', 4);
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;

-- Dumping structure for table afternotes.user
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table afternotes.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`username`, `name`, `email`, `password`, `country`, `bio`) VALUES
	('baziyad', 'Baziyad Hummam', 'huhummamalybaziyad@gmail.com', '03051999', 'Indonesia', 'Stan LOONA'),
	('hae', 'Haechal', 'haechal@gmail.com', '1234567890', 'Indonesia', 'Just Do It!');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
