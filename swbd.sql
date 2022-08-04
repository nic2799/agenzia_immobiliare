-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ago 04, 2022 alle 11:04
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swbd`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `immobili`
--

CREATE TABLE `immobili` (
  `id_immobile` int(11) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `prezzo` int(11) NOT NULL,
  `descrizione` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `immagine` varchar(500) NOT NULL,
  `stato` enum('nonAcquistata','acquistata') NOT NULL DEFAULT 'nonAcquistata',
  `username_del_proprietario` varchar(255) NOT NULL,
  `data_prenotazione` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `immobili`
--

INSERT INTO `immobili` (`id_immobile`, `indirizzo`, `prezzo`, `descrizione`, `immagine`, `stato`, `username_del_proprietario`, `data_prenotazione`) VALUES
(1, ' San Giovanni a Teduccio, San Giovanni a Teduccio, Napoli', 675000, 'SAN GIOVANNI A TEDUCCIO (Corso) Nel cuore cittadino la So.Ge.Im Immobiliare di Volla propone in vendita elegante ed esclusiva dimora di fine 800 posta al 1° piano di 200 mq abitativi inserita in un rigoglioso giardino piantumato con pregiate essenze arbo', 'https://pwm.im-cdn.it/image/1124784900/cover-m-c.jpg', 'nonAcquistata', 'carlo11', '2022-08-07'),
(2, 'napoli via manzonia', 0, 'villa con piscina', 'https://images-1.casa.it/655x483/listing/6b9c7a1f28a84fbb99c94c7da2b4bc59', 'nonAcquistata', 'paolo22', '2022-08-04'),
(3, 'firenze, via carducci n.3', 200000, 'Villa Latina è un comune della Valle di Comino, legato fisicamente ai comuni di Atina, Picinisco, Sant\'Elia Fiumerapido e San Biagio Saracinisco, un territorio collegato con la S.S. Sora /Cassino e a pochi km dal Parco Nazionale D\'Abruzzo, Lazio e Molise. Si può raggiungere il mare di Formia in soli 50 minuti e i campi da sci di Pescasseroli in soli 35 minuti.', 'https://pwm.im-cdn.it/image/1120874060/cover-m-c.jpg', 'acquistata', 'paolo22', '2022-08-04'),
(4, 'in Via Piana 342 a Lucca', 1000000, 'dimora nobile dei primo del 900 elegante e maestosa si apre con un importante ingresso , subito sulla sinistra uno studio', 'https://images-1.casa.it/655x483/listing/f7bc9ab66067a1f9ca8239cfccc44429', 'acquistata', 'carlo11', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `data` date DEFAULT NULL,
  `idimmobile` int(11) NOT NULL,
  `usernameProp` varchar(255) NOT NULL,
  `clientePrenotato` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prenotazioni`
--

INSERT INTO `prenotazioni` (`data`, `idimmobile`, `usernameProp`, `clientePrenotato`, `cliente`) VALUES
('2022-11-11', 0, '0', '0', ''),
('2022-08-05', 0, '0', '0', ''),
('2022-03-03', 2, '0', '0', ''),
('2022-08-07', 3, '0', '0', ''),
('2022-08-05', 1, '0', '0', ''),
('2022-08-14', 3, '', '0', ''),
('2022-11-11', 1, 'carlo', '0', ''),
('2022-08-04', 1, '', '0', ''),
('2022-08-04', 1, '', '0', ''),
('2022-08-04', 1, 'carlo11', '0', ''),
('2022-08-05', 3, 'paolo22', '0', ''),
('2023-04-27', 3, 'paolo22', '0', ''),
('2023-04-28', 3, 'paolo22', '0', ''),
('2022-08-11', 1, 'carlo11', '', 'fabio99'),
('2022-08-05', 1, 'carlo11', 'fabio99', ''),
('2022-08-26', 3, 'paolo22', 'fabio99', ''),
('2022-08-08', 3, 'paolo22', 'fabio99', ''),
('2022-08-07', 1, 'carlo11', 'fabio99', ''),
('2022-08-23', 1, 'carlo11', 'fabio99', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `role` enum('proprietario','cliente','admin') NOT NULL,
  `ruolo` enum('proprietario','cliente','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`username`, `email`, `password`, `Nome`, `Cognome`, `role`, `ruolo`) VALUES
('aa', 'aaa@cddv', 'aa', 'aa', 'aaa', 'proprietario', 'cliente'),
('aaa', 'aaa@aaa.it', 'aaa', 'aa', 'aaa', 'proprietario', 'proprietario'),
('aaas', 'aaaa@sssa.it', '111', 'sss', 'sss', 'proprietario', 'cliente'),
('aaasas', 'aaaaa@assa', 'aasasa', 'sasasa', 'sasasa', 'proprietario', 'cliente'),
('aasas', 'asasassas@kll', 'aaa', 'aa', 'aaaa', 'proprietario', 'cliente'),
('asaasdddsdss', 'aaa@aaadsdssa.itsdsdsd', 'dddd', 'sssdddss', 'ddd', 'proprietario', 'cliente'),
('asasasnicola', 'aaa@a123aa.it', 'aaa', 'aaa', 'aaa', 'proprietario', ''),
('carlo11', 'carlo@gmail.com', '123', 'carlo', 'test', '', 'proprietario'),
('carlo123', 'pop@pop.pop', '123', 'Nicola', 'Graziano', 'proprietario', 'proprietario'),
('eee', 'aaa@jjj', 'aaaa', 'aa', 'aaa', 'proprietario', 'cliente'),
('eeee', 'sss@aaaa.it', 'aa', 'aa', 'aaa', 'proprietario', 'cliente'),
('ewe', 'wewewww@fggfg', 'sss', 'sss', 'sd', 'proprietario', 'cliente'),
('fabio99', 'fabio@gmail.com', '123', 'fabio', 'test', '', 'cliente'),
('nicola', 'nicola@gmail.com', '123', 'Nicola', 'Graziano', '', 'admin'),
('nicolayes', 'aaa@aaa111111.it', 'qq', 'qqq', 'qqq', 'proprietario', 'cliente'),
('paoli93', 'paolo@jmail.com', '1234', 'paolo', 'formola', 'proprietario', 'cliente'),
('paolo22', 'paolo@gmail.com', '123', 'paolo', 'test', '', 'proprietario'),
('sss', 'sss@aaaaa.it', 'aa', 'aaa', 'aaa', 'proprietario', 'cliente'),
('ssss', 'sss@aassaa.it', 'sss', 'sss', 'sss', 'proprietario', '');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `immobili`
--
ALTER TABLE `immobili`
  ADD PRIMARY KEY (`id_immobile`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `immobili`
--
ALTER TABLE `immobili`
  MODIFY `id_immobile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
