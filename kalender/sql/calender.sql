CREATE TABLE `calender` (
  `id` int(11) NOT NULL,
  `naam` varchar(20) NOT NULL,
  `achternaam` varchar(20) NOT NULL,
  `datum` varchar(11) NOT NULL,
  `jaar` int(4) NOT NULL,
  `maand` int(5) NOT NULL,
  `dag` int(5) NOT NULL,
  `datumvandaag` date NOT NULL DEFAULT current_timestamp(),
  `bio` varchar(255) NOT NULL,
  `klas` enum('Shuttle 1','Shuttle 2','Shuttle 3','Shuttle 4','Shuttle 5','Shuttle 6') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `calender`
--

INSERT INTO `calender` (`id`, `naam`, `achternaam`, `datum`, `jaar`, `maand`, `dag`, `datumvandaag`, `bio`, `klas`) VALUES
(3, 'Ersin', 'Karaduman', '19/11/2004', 2004, 11, 19, '2021-11-19', '', 'Shuttle 6'),
(4, 'Ozan', 'Alka', '04/03/1995', 1995, 3, 4, '2021-03-04', '', 'Shuttle 6'),
(5, 'Jayne', 'Kolsteen', '15/10/2004', 2004, 10, 15, '2021-10-15', '', 'Shuttle 6'),
(6, 'Ugur', 'Utar', '22/12/2003', 2003, 12, 22, '2021-12-22', '', 'Shuttle 6'),
(7, 'Giovanni', 'Slagveer', '21/10/2004', 2004, 10, 21, '2021-10-21', '', 'Shuttle 6'),
(8, 'Lara', 'Zegers', '04/11/2004', 2004, 11, 4, '2021-11-04', '', 'Shuttle 6'),
(9, 'Martijn', 'Booij', '15/04/2004', 2004, 4, 15, '2021-04-15', '', 'Shuttle 6'),
(10, 'Tinne', 'Spoel', '02/04/2004', 2004, 4, 2, '2021-04-02', '', 'Shuttle 6'),
(11, 'Dave', 'Havelaar', '02/03/2004', 2004, 3, 2, '2021-03-02', '', 'Shuttle 6'),
(12, 'Daan', 'Dorchholz', '30/11/2004', 2004, 11, 30, '2021-11-30', '', ''),
(13, 'Sezgin', 'Karaduman', '19/11/2004', 2004, 11, 19, '2021-11-19', '', 'Shuttle 6'),
(14, 'Simon', 'Sandberg', '20/01/2004', 2004, 1, 20, '2021-01-20', '', 'Shuttle 6'),
(15, 'Leeroy', 'Prins', '11/01/2004', 2004, 1, 11, '2021-01-11', '', 'Shuttle 6'),
(16, 'Tim', 'Gemert', '10/03/2004', 2004, 3, 10, '2021-03-10', '', 'Shuttle 6'),
(17, 'Tycho', 'Leeuwen', '04/07/2004', 2004, 7, 4, '2021-07-04', '', 'Shuttle 6'),
(18, 'Gadisa', 'Ahmed', '05/01/2004', 2004, 1, 5, '2021-01-05', '', 'Shuttle 6'),
(19, 'Wirin', 'Jawalapersad', '09/02/2004', 2004, 2, 9, '2021-02-09', '', 'Shuttle 6'),
(20, 'Ismail', 'Cetin', '19/06/2004', 2004, 6, 19, '2021-06-19', '', 'Shuttle 6'),
(21, 'Giovanni', 'Todorevic', '05/06/2004', 2004, 6, 5, '2021-06-05', '', 'Shuttle 6'),
(22, 'Adil', 'Misdaq', '01/01/2004', 2004, 1, 1, '2021-01-01', '', 'Shuttle 6'),
(23, 'Azaan', 'Irshad', '24/05/2004', 2004, 5, 24, '2021-05-24', '', 'Shuttle 6'),
(24, 'Chaima', 'Moussaoui', '15/05/2004', 2004, 5, 15, '2021-05-15', '', 'Shuttle 6'),
(25, 'Gilbert', 'Adamowicz', '08/01/2004', 2004, 1, 8, '2021-01-08', '', 'Shuttle 6'),
(26, 'Haytam', 'Lallouchen', '29/05/2004', 2004, 5, 29, '2021-05-29', '', 'Shuttle 6'),
(27, 'Hicham', 'Ourahou', '11/02/2004', 2004, 2, 11, '2021-02-11', '', 'Shuttle 6'),
(28, 'Jean', 'Kalo', '17/10/2004', 2004, 10, 17, '2021-10-17', '', 'Shuttle 6'),
(29, 'Maurro', 'Scheltens', '12/05/2004', 2004, 5, 12, '2021-05-12', '', 'Shuttle 6'),
(30, 'Milan', 'Wijk', '03/02/2004', 2004, 2, 3, '2021-02-03', '', 'Shuttle 6'),
(31, 'Mohammed', 'Baallach', '23/10/2004', 2004, 10, 23, '2021-10-23', '', 'Shuttle 6'),
(32, 'Noah', 'Germann', '01/01/2004', 2004, 1, 1, '2021-01-01', '', 'Shuttle 6'),
(33, 'Rienk', 'Koenders', '01/01/2004', 2004, 1, 1, '2021-01-01', '', 'Shuttle 6'),
(34, 'Terts', 'Diepraam', '07/05/2004', 2004, 5, 7, '2021-05-07', '', 'Shuttle 6'),
(35, 'Joris', 'Schelfhout', '01/01/2004', 2004, 1, 1, '2021-01-01', '', 'Shuttle 6'),
(36, 'Bram', 'Heuvel', '08/01/2004', 2004, 1, 8, '2021-01-08', '', 'Shuttle 6'),
(37, 'Bob', 'Berge', '01/01/2004', 2004, 1, 1, '2021-01-01', '', 'Shuttle 6');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--
