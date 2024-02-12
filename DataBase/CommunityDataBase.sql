-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 12, 2024 alle 14:08
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `communitydatabase`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `documents`
--

CREATE TABLE `documents` (
  `ID` int(11) NOT NULL,
  `tag` enum('space','it','neuroscience') DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `file_name` varchar(120) NOT NULL,
  `content` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `documents`
--

INSERT INTO `documents` (`ID`, `tag`, `title`, `username`, `path`, `file_name`, `content`) VALUES
(4, 'space', 'nasa missions', 'matteo', 'documents/nasa_missions.php', 'nasa_missions.php', '<p>Missioni della nasa :</p><p><br></p><p>1. Apollo: Una serie di missioni spaziali umane per l&#39;esplorazione lunare, culminate con l&#39;allunaggio dell&#39;Apollo 11 nel 1969.</p><p>2. Mars Rover: Missioni robotiche su Marte per esplorare la superficie del pianeta rosso, studiarne la geologia e cercare segni di vita passata o presente.</p><p>3. Voyager: Sonde spaziali lanciate per esplorare i pianeti esterni e lo spazio interstellare. La Voyager 1 e 2 sono le prime sonde ad aver raggiunto lo spazio interstellare.</p>'),
(5, 'space', 'tempeste solari', 'matteo', 'documents/tempeste_solari.php', 'tempeste_solari.php', '<p><strong>TEMPESTE SOLARI:</strong></p><p>Una tempesta solare &egrave; un disturbo della magnetosfera terrestre, di carattere temporaneo, causato dall&#39;attivit&agrave; solare e rilevabile dai magnetometri in ogni punto della Terra</p>'),
(11, 'it', 'CS', 'matteo', 'documents/cs.php', 'cs.php', '<p>Computer Science Document</p>'),
(12, 'neuroscience', 'Quantum Psicology', 'matteo', 'documents/quantum_psicology.php', 'quantum_psicology.php', '<p><strong>QUANTUM PSICOLOGY DOCUMENT</strong></p>');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`username`, `email`, `password`) VALUES
('matteo', 'cianodmatteo@gmail.com', 'ciao');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `username` (`username`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `documents`
--
ALTER TABLE `documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`username`) REFERENCES `utenti` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
