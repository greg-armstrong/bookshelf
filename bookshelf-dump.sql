-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.46-0ubuntu0.14.04.2 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for bookshelf
CREATE DATABASE IF NOT EXISTS `bookshelf` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bookshelf`;

-- Dumping structure for table bookshelf.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `author` varchar(100) DEFAULT NULL,
  `read_status` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COMMENT='This is where we will stor information on the books in our bookshelf';

-- Dumping data for table bookshelf.books: ~3 rows (approximately)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `title`, `description`, `author`, `read_status`) VALUES
	(1, 'Mort', 'Mort is a Discworld novel by Terry Pratchett. Published in 1987, it is the fourth Discworld novel and the first to focus on the character Death, who only appeared as a side character in the previous novels. The title is the name of its main character and also a play on words: in French, mort means "death". The French language edition is titled Mortimer.', 'Terry Pratchett', b'0'),
	(2, 'The Hobbit', 'The Hobbit, or There and Back Again is a children\'s fantasy novel by English author J. R. R. Tolkien. It was published on 21 September 1937 to wide critical acclaim, being nominated for the Carnegie Medal and awarded a prize from the New York Herald Tribune for best juvenile fiction. The book remains popular and is recognized as a classic in children\'s literature.', 'J.R.R Tolkein', b'1'),
	(3, 'Dune', 'Dune is a 1965 epic science fiction novel by American author Frank Herbert, originally published as two separate serials in Analog magazine. It tied with Roger Zelazny\'s This Immortal for the Hugo Award in 1966,[3] and it won the inaugural Nebula Award for Best Novel.[4] It is the first installment of the Dune saga, and in 2003 was cited as the world\'s best-selling science fiction novel.', 'Frank Herbert', b'1'),
	(23, 'To Kill A Mockingbird', 'To Kill a Mockingbird is a novel by Harper Lee published in 1960. It was immediately successful, winning the Pulitzer Prize, and has become a classic of modern American literature. The plot and characters are loosely based on Lee\'s observations of her family, her neighbors and an event that occurred near her hometown of Monroeville, Alabama, in 1936, when she was 10 years old.', 'Harper Lee', b'0'),
	(24, 'The Great Gatsby', 'The Great Gatsby is a 1925 novel written by American author F. Scott Fitzgerald that follows a cast of characters living in the fictional town of West Egg on prosperous Long Island in the summer of 1922. The story primarily concerns the young and mysterious millionaire Jay Gatsby and his quixotic passion and obsession for the beautiful former debutante Daisy Buchanan. Considered to be Fitzgerald\'s magnum opus, The Great Gatsby explores themes of decadence, idealism, resistance to change, social upheaval, and excess, creating a portrait of the Jazz Age or the Roaring Twenties that has been described as a cautionary tale regarding the American Dream.', 'F. Scott Fitzgerald', b'1'),
	(25, '1984', 'Nineteen Eighty-Four, often published as 1984, is a dystopian novel published in 1949 by English author George Orwell.[2][3] The novel is set in Airstrip One (formerly known as Great Britain), a province of the superstate Oceania in a world of perpetual war, omnipresent government surveillance, and public manipulation. The superstate and its residents are dictated to by a political regime euphemistically named English Socialism, shortened to "Ingsoc" in Newspeak, the government\'s invented language. The superstate is under the control of the privileged elite of the Inner Party, a party and government that persecutes individualism and independent thinking as "thoughtcrime", which is enforced by the "Thought Police".[4]', 'George Orwell', b'0'),
	(26, 'Lord Of The Flies', 'Lord of the Flies is a 1954 novel by Nobel Prize-winning British author William Golding. The book focuses on a group of British boys stranded on an uninhabited island and their disastrous attempt to govern themselves.', 'William Golding', b'0');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
