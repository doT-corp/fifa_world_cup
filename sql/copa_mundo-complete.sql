-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26-Out-2021 às 17:40
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `copa_mundo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao`
--

DROP TABLE IF EXISTS `cartao`;
CREATE TABLE IF NOT EXISTS `cartao` (
  `jogos_idrodada` int(11) NOT NULL,
  `jogador_idjogador` int(11) NOT NULL,
  `amarelo` tinyint(1) NOT NULL,
  `vermelho` tinyint(1) NOT NULL,
  `tempo` varchar(20) NOT NULL,
  KEY `jogador_idjogador` (`jogador_idjogador`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cartao`
--

INSERT INTO `cartao` (`jogos_idrodada`, `jogador_idjogador`, `amarelo`, `vermelho`, `tempo`) VALUES
(1, 2210, 1, 0, '32:55'),
(1, 2420, 1, 0, '42:11'),
(1, 2440, 1, 0, '71:44'),
(1, 2420, 0, 1, '75:38'),
(2, 2310, 1, 0, '33:27'),
(2, 2520, 0, 1, '61:42'),
(3, 2825, 1, 0, '74:21'),
(4, 2910, 1, 0, '42:10'),
(5, 3210, 1, 0, '19:43'),
(5, 3125, 1, 0, '37:35'),
(5, 3220, 1, 0, '44:09'),
(5, 3210, 0, 1, '57:29'),
(6, 3050, 1, 0, '73:41'),
(7, 3505, 1, 0, '66:31'),
(7, 3420, 1, 0, '78:07'),
(8, 3725, 1, 0, '22:37'),
(8, 3705, 1, 0, '71:38'),
(9, 2425, 1, 0, '09:25'),
(9, 2325, 1, 0, '22:33'),
(9, 2410, 1, 0, '67:32'),
(10, 2520, 1, 0, '73:10'),
(13, 3125, 1, 0, '70:35'),
(16, 3710, 1, 0, '39:18'),
(17, 2505, 1, 0, '27:32'),
(17, 2425, 0, 1, '73:15'),
(18, 2225, 1, 0, '11:40'),
(18, 2305, 1, 0, '21:05'),
(18, 2215, 1, 0, '51:06'),
(18, 2320, 0, 1, '72:36'),
(21, 3225, 1, 0, '62:33'),
(24, 3710, 1, 0, '13:25'),
(24, 3425, 1, 0, '29:19'),
(24, 3720, 0, 1, '65:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estadio`
--

DROP TABLE IF EXISTS `estadio`;
CREATE TABLE IF NOT EXISTS `estadio` (
  `idestadio` int(11) NOT NULL,
  `descricao` varchar(20) DEFAULT NULL,
  `localizacao` varchar(20) DEFAULT NULL,
  `capacidade` int(11) NOT NULL,
  PRIMARY KEY (`idestadio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estadio`
--

INSERT INTO `estadio` (`idestadio`, `descricao`, `localizacao`, `capacidade`) VALUES
(5000, 'Lusaiu Stadium', 'Lusaiu', 80000),
(5100, 'Khalifa Internationa', 'Doha', 50000),
(5200, 'Al Thumama Stadium', 'Al Thumama', 40000),
(5300, 'Al Janoub Stadium', 'Al-Wakrah', 40000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gols`
--

DROP TABLE IF EXISTS `gols`;
CREATE TABLE IF NOT EXISTS `gols` (
  `jogo_idrodada` int(11) NOT NULL,
  `jogador_idjogador` int(11) DEFAULT NULL,
  `tempo` varchar(50) DEFAULT NULL,
  KEY `jogador_idjogador` (`jogador_idjogador`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gols`
--

INSERT INTO `gols` (`jogo_idrodada`, `jogador_idjogador`, `tempo`) VALUES
(1, 2240, '22:15'),
(1, 2245, '51:44'),
(1, 2445, '62:11'),
(2, 2340, '39:25'),
(2, 2540, '50:19'),
(4, 2745, '23:55'),
(4, 2750, '71:37'),
(5, 3145, '58:24'),
(5, 3245, '82:05'),
(6, 3045, '16:42'),
(6, 3035, '42:11'),
(7, 3445, '76:19'),
(9, 2345, '62:32'),
(10, 2235, '33:15'),
(10, 2535, '41:17'),
(10, 2240, '63:13'),
(10, 2540, '74:04'),
(11, 2640, '13:15'),
(11, 2645, '39:45'),
(11, 2745, '51:20'),
(11, 2650, '78:37'),
(12, 2845, '12:15'),
(12, 2940, '43:39'),
(12, 2850, '65:51'),
(13, 3030, '27:18'),
(13, 3035, '44:34'),
(13, 3135, '56:10'),
(13, 3135, '60:26'),
(14, 3245, '10:37'),
(14, 3240, '27:12'),
(14, 3245, '58:51'),
(14, 3345, '77:39'),
(15, 3435, '18:45'),
(15, 3645, '24:11'),
(15, 3440, '44:23'),
(15, 3440, '66:20'),
(16, 3540, '37:46'),
(16, 3750, '73:31'),
(17, 2540, '62:32'),
(17, 2550, '68:49'),
(18, 2240, '27:35'),
(18, 2335, '38:12'),
(18, 2245, '44:49'),
(18, 2350, '71:08'),
(18, 2250, '80:53'),
(19, 2630, '09:33'),
(19, 2635, '30:57'),
(19, 2640, '74:05'),
(20, 2850, '29:12'),
(20, 2735, '40:36'),
(20, 2745, '58:37'),
(21, 3040, '28:15'),
(21, 3245, '67:06'),
(21, 3045, '79:34'),
(22, 3130, '08:10'),
(22, 3135, '27:56'),
(22, 3140, '55:22'),
(23, 3535, '77:13'),
(24, 3435, '41:57'),
(24, 3435, '66:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `idgrupo` char(3) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idgrupo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`idgrupo`, `descricao`) VALUES
('A', 'Grupo A'),
('B', 'Grupo B'),
('C', 'Grupo C'),
('D', 'Grupo D');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

DROP TABLE IF EXISTS `jogador`;
CREATE TABLE IF NOT EXISTS `jogador` (
  `idjogador` smallint(6) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `camisa` int(11) NOT NULL,
  `posicao` varchar(20) DEFAULT NULL,
  `pais_idpais` smallint(6) NOT NULL,
  `situacao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idjogador`),
  KEY `pais_idpais` (`pais_idpais`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogador`
--

INSERT INTO `jogador` (`idjogador`, `nome`, `camisa`, `posicao`, `pais_idpais`, `situacao`) VALUES
(2200, 'Fernando Muslera', 1, 'Goleiro', 1100, 'T'),
(2205, 'Maxi Pereira', 2, 'Lateral Direito', 1100, 'T'),
(2210, 'Diego Godín', 3, 'Central', 1100, 'T'),
(2215, 'Sebastián Coates', 4, 'Central', 1100, 'T'),
(2220, 'Gastón Silva', 6, 'Lateral Esquerdo', 1100, 'T'),
(2225, 'Cristian Rodríguez', 5, 'Meio Campo', 1100, 'T'),
(2230, 'Carlos Sánchez', 8, 'Meio Campo', 1100, 'T'),
(2235, 'Giorgian De Arrascaeta', 10, 'Meio Campo', 1100, 'T'),
(2240, 'Edinson Cavani', 11, 'Atacante', 1100, 'T'),
(2245, 'Luis Suárez', 9, 'Atacante', 1100, 'T'),
(2250, 'Maxi Gómez', 7, 'Atacante', 1100, 'T'),
(2255, 'Martín Silva', 12, 'Goleiro', 1100, 'R'),
(2260, 'Guillermo Varela', 13, 'Central', 1100, 'R'),
(2265, 'Lucas Torreira', 14, 'Meio Campo', 1100, 'R'),
(2270, 'Cristhian Stuani', 15, 'Atacante', 1100, 'R'),
(2300, 'Yuri Dyupin', 1, 'Goleiro', 1110, 'T'),
(2305, 'Dmitriy Chistyakov', 2, 'Lateral Direito', 1110, 'T'),
(2310, 'Igor Diveev', 3, 'Central', 1110, 'T'),
(2315, 'Georgi Dzhikiya', 4, 'Central', 1110, 'T'),
(2320, 'Vyacheslav Karavaev', 6, 'Lateral Esquerdo', 1110, 'T'),
(2325, 'Aleksandr Erokhin', 5, 'Meio Campo', 1110, 'T'),
(2330, 'Aleksei Ionov', 8, 'Meio Campo', 1110, 'T'),
(2335, 'Dmitri Barinov', 10, 'Meio Campo', 1110, 'T'),
(2340, 'Fedor Smolov', 11, 'Atacante', 1110, 'T'),
(2345, 'Konstantin Tyukavin', 9, 'Atacante', 1110, 'T'),
(2350, 'Anton Zabolotny', 7, 'Atacante', 1110, 'T'),
(2355, 'Andrey Lunev', 12, 'Goleiro', 1110, 'R'),
(2360, 'Ilya Samoshnikov', 13, 'Central', 1110, 'R'),
(2365, 'Roman Zobnin', 14, 'Meio Campo', 1110, 'R'),
(2370, 'Rifat Zhemaletdinov', 15, 'Atacante', 1110, 'R'),
(2400, 'Saad Al Sheeb', 1, 'Goleiro', 1120, 'T'),
(2405, 'Ró-Ró', 2, 'Lateral Direito', 1120, 'T'),
(2410, 'Tarek Salman', 3, 'Central', 1120, 'T'),
(2415, 'Ahmed Suhail', 4, 'Central', 1120, 'T'),
(2420, 'Musaab Khidir', 6, 'Lateral Esquerdo', 1120, 'T'),
(2425, 'Mohammed Waad', 5, 'Meio Campo', 1120, 'T'),
(2430, 'Abdelaziz Hatim', 8, 'Meio Campo', 1120, 'T'),
(2435, 'Yusuf Abdurisag', 10, 'Meio Campo', 1120, 'T'),
(2440, 'Ahmed Alaa', 11, 'Atacante', 1120, 'T'),
(2445, 'Mohammed Muntari', 9, 'Atacante', 1120, 'T'),
(2450, 'Hasan Al Haydos', 7, 'Atacante', 1120, 'T'),
(2455, 'Yousof Hassan', 12, 'Goleiro', 1120, 'R'),
(2460, 'Bassam Al Rawi', 13, 'Central', 1120, 'R'),
(2465, 'Assim Madabo', 14, 'Meio Campo', 1120, 'R'),
(2470, 'Almoez Ali', 15, 'Atacante', 1120, 'R'),
(2500, 'Mohamed El Shenawy', 1, 'Goleiro', 1130, 'T'),
(2505, 'Ahmed Tawfik', 2, 'Lateral Direito', 1130, 'T'),
(2510, 'Ahmed Hegazy', 3, 'Central', 1130, 'T'),
(2515, 'Mahmoud Hamdi', 4, 'Central', 1130, 'T'),
(2520, 'Ahmed Fatouh', 6, 'Lateral Esquerdo', 1130, 'T'),
(2525, 'Omar Gaber', 5, 'Meio Campo', 1130, 'T'),
(2530, 'Afsha', 8, 'Meio Campo', 1130, 'T'),
(2535, 'Abdallah Said', 10, 'Meio Campo', 1130, 'T'),
(2540, 'Mohamed Salah', 11, 'Atacante', 1130, 'T'),
(2545, 'Mostafa Mohamed', 9, 'Atacante', 1130, 'T'),
(2550, 'Hussein El Shahat', 7, 'Atacante', 1130, 'T'),
(2555, 'El-Hani Soliman', 12, 'Goleiro', 1130, 'R'),
(2560, 'Ali Gabr', 13, 'Central', 1130, 'R'),
(2565, 'Tarek Hamed', 14, 'Meio Campo', 1130, 'R'),
(2570, 'Ahmed Hassan', 15, 'Atacante', 1130, 'R'),
(2600, 'Hugo Lloris', 1, 'Goleiro', 1140, 'T'),
(2605, 'Lucas Digne', 2, 'Lateral Direito', 1140, 'T'),
(2610, 'Clemént Lenglet', 3, 'Central', 1140, 'T'),
(2615, 'Presnel Kimpembe', 4, 'Central', 1140, 'T'),
(2620, 'Léo Dubois', 6, 'Lateral Esquerdo', 1140, 'T'),
(2625, 'Paul Pogba', 5, 'Meio Campo', 1140, 'T'),
(2630, 'NGolo Kanté', 8, 'Meio Campo', 1140, 'T'),
(2635, 'Adrien Rabiot', 10, 'Meio Campo', 1140, 'T'),
(2640, 'Karim Benzema', 11, 'Atacante', 1140, 'T'),
(2645, 'Kylian Mbappé', 9, 'Atacante', 1140, 'T'),
(2650, 'Antoine Griezmann', 7, 'Atacante', 1140, 'T'),
(2655, 'Mike Maignam', 12, 'Goleiro', 1140, 'R'),
(2660, 'Raphael Varane', 13, 'Central', 1140, 'R'),
(2665, 'Moussa Sissoko', 14, 'Meio Campo', 1140, 'R'),
(2670, 'Olivier Giroud', 15, 'Atacante', 1140, 'R'),
(2700, 'Jesper Hansen', 1, 'Goleiro', 1150, 'T'),
(2705, 'Joachim Andersen', 2, 'Lateral Direito', 1150, 'T'),
(2710, 'Nicolai Boilesen', 3, 'Central', 1150, 'T'),
(2715, 'Andreas Christensen', 4, 'Central', 1150, 'T'),
(2720, 'Simon Kjaer', 6, 'Lateral Esquerdo', 1150, 'T'),
(2725, 'Anders Christiansen', 5, 'Meio Campo', 1150, 'T'),
(2730, 'Mikkel Damsgaard', 8, 'Meio Campo', 1150, 'T'),
(2735, 'Thomas Delaney', 10, 'Meio Campo', 1150, 'T'),
(2740, 'Martin Braithwaite', 11, 'Atacante', 1150, 'T'),
(2745, 'Jacob Bruun Larsen', 9, 'Atacante', 1150, 'T'),
(2750, 'Andreas Cornelius', 7, 'Atacante', 1150, 'T'),
(2755, 'Jonas Lössl', 12, 'Goleiro', 1150, 'R'),
(2760, 'Victor Nelsson', 13, 'Central', 1150, 'R'),
(2765, 'Jesper Lindstrom', 14, 'Meio Campo', 1150, 'R'),
(2770, 'Kasper Dolberg', 15, 'Atacante', 1150, 'R'),
(2800, 'Carlos Cáceda', 1, 'Goleiro', 1160, 'T'),
(2805, 'Luis Abram', 2, 'Lateral Direito', 1160, 'T'),
(2810, 'Luis Advíncula', 3, 'Central', 1160, 'T'),
(2815, 'Alexander Callens', 4, 'Central', 1160, 'T'),
(2820, 'Aldo Corzo', 6, 'Lateral Esquerdo', 1160, 'T'),
(2825, 'Christian Cueva', 5, 'Meio Campo', 1160, 'T'),
(2830, 'Edison Flores', 8, 'Meio Campo', 1160, 'T'),
(2835, 'Raziel García', 10, 'Meio Campo', 1160, 'T'),
(2840, 'Gianluca Lapadula', 11, 'Atacante', 1160, 'T'),
(2845, 'Paolo Guerrero', 9, 'Atacante', 1160, 'T'),
(2850, 'Raúl Ruidíaz', 7, 'Atacante', 1160, 'T'),
(2855, 'José Carvallo', 12, 'Goleiro', 1160, 'R'),
(2860, 'Christian Ramos', 13, 'Central', 1160, 'R'),
(2865, 'Renato Tapia', 14, 'Meio Campo', 1160, 'R'),
(2870, 'André Carrillo', 15, 'Atacante', 1160, 'R'),
(2900, 'Mathew Ryan', 1, 'Goleiro', 1170, 'T'),
(2905, 'Miloš Degenek', 2, 'Lateral Direito', 1170, 'T'),
(2910, 'Brad Smith', 3, 'Central', 1170, 'T'),
(2915, 'Rhyan Grant', 4, 'Central', 1170, 'T'),
(2920, 'Callum Elder', 6, 'Lateral Esquerdo', 1170, 'T'),
(2925, 'Ryan McGowan', 5, 'Meio Campo', 1170, 'T'),
(2930, 'Bailey Wright', 8, 'Meio Campo', 1170, 'T'),
(2935, 'Ajdin Hrustic', 10, 'Meio Campo', 1170, 'T'),
(2940, 'Awer Mabil', 11, 'Atacante', 1170, 'T'),
(2945, 'Adam Taggart', 9, 'Atacante', 1170, 'T'),
(2950, 'Martin Boyle', 7, 'Atacante', 1170, 'T'),
(2955, 'Lawrence Thomas', 12, 'Goleiro', 1170, 'R'),
(2960, 'Harry Souttar', 13, 'Central', 1170, 'R'),
(2965, 'Aaron Mooy', 14, 'Meio Campo', 1170, 'R'),
(2970, 'Mitchell Duke', 15, 'Atacante', 1170, 'R'),
(3000, 'Ivica Ivusic', 1, 'Goleiro', 1180, 'T'),
(3005, 'Borna Barisic', 2, 'Lateral Direito', 1180, 'T'),
(3010, 'Duje Caleta-Car', 3, 'Central', 1180, 'T'),
(3015, 'Josko Gvardiol', 4, 'Central', 1180, 'T'),
(3020, 'Josip Juranovic', 6, 'Lateral Esquerdo', 1180, 'T'),
(3025, 'Marcelo Brozovic', 5, 'Meio Campo', 1180, 'T'),
(3030, 'Luka Ivanusec', 8, 'Meio Campo', 1180, 'T'),
(3035, 'Luka Modric', 10, 'Meio Campo', 1180, 'T'),
(3040, 'Antonio-Mirko Colak', 11, 'Atacante', 1180, 'T'),
(3045, 'Andrej Kramaric', 9, 'Atacante', 1180, 'T'),
(3050, 'Marko Livaja', 7, 'Atacante', 1180, 'T'),
(3055, 'Dominik Livakovic', 12, 'Goleiro', 1180, 'R'),
(3060, 'Mile Skoric', 13, 'Central', 1180, 'R'),
(3065, 'Ivan Perisic', 14, 'Meio Campo', 1180, 'R'),
(3070, 'Mislav Orsic', 15, 'Atacante', 1180, 'R'),
(3100, 'Franco Armani', 1, 'Goleiro', 1190, 'T'),
(3105, 'Juan Foyth', 2, 'Lateral Direito', 1190, 'T'),
(3110, 'Lisandro Martínez', 3, 'Central', 1190, 'T'),
(3115, 'Lucas Martínez Quarta', 4, 'Central', 1190, 'T'),
(3120, 'Nahuel Molina', 6, 'Lateral Esquerdo', 1190, 'T'),
(3125, 'Leandro Paredes', 5, 'Meio Campo', 1190, 'T'),
(3130, 'Exequiel Palacios', 8, 'Meio Campo', 1190, 'T'),
(3135, 'Lionel Messi', 10, 'Meio Campo', 1190, 'T'),
(3140, 'Ángel Di María', 11, 'Atacante', 1190, 'T'),
(3145, 'Sergio Agüero', 9, 'Atacante', 1190, 'T'),
(3150, 'Julián Álvarez', 7, 'Atacante', 1190, 'T'),
(3155, 'Emiliano Martínez', 12, 'Goleiro', 1190, 'R'),
(3160, 'Cristian Romero', 13, 'Central', 1190, 'R'),
(3165, 'Guido Rodríguez', 14, 'Meio Campo', 1190, 'R'),
(3170, 'Paulo Dybala', 15, 'Atacante', 1190, 'R'),
(3200, 'Stanley Nwabili', 1, 'Goleiro', 1200, 'T'),
(3205, 'Olisa Ndah', 2, 'Lateral Direito', 1200, 'T'),
(3210, 'Adeleke Adekunle', 3, 'Central', 1200, 'T'),
(3215, 'Imo Obot', 4, 'Central', 1200, 'T'),
(3220, 'Temitope Olusesi', 6, 'Lateral Esquerdo', 1200, 'T'),
(3225, 'Anayo Iwuala', 5, 'Meio Campo', 1200, 'T'),
(3230, 'Anthony Shimaga', 8, 'Meio Campo', 1200, 'T'),
(3235, 'Seth Mayi', 10, 'Meio Campo', 1200, 'T'),
(3240, 'Sunusi Ibrahim', 11, 'Atacante', 1200, 'T'),
(3245, 'Sunday Adetunji', 9, 'Atacante', 1200, 'T'),
(3250, 'Charles Atshimene', 7, 'Atacante', 1200, 'T'),
(3255, 'John Noble', 12, 'Goleiro', 1200, 'R'),
(3260, 'Oriyomi Murtala', 13, 'Central', 1200, 'R'),
(3265, 'Uche Onwuansanya', 14, 'Meio Campo', 1200, 'R'),
(3270, 'Chinonso Eziekwe', 15, 'Atacante', 1200, 'R'),
(3300, 'Patrik Gunnarsson', 1, 'Goleiro', 1210, 'T'),
(3305, 'Kári Árnason', 2, 'Lateral Direito', 1210, 'T'),
(3310, 'Jón Gudni Fjóluson', 3, 'Central', 1210, 'T'),
(3315, 'Thorir Johann Helgason', 4, 'Central', 1210, 'T'),
(3320, 'Hjörtur Hermannsson', 6, 'Lateral Esquerdo', 1210, 'T'),
(3325, 'Mikkel Anderson', 5, 'Meio Campo', 1210, 'T'),
(3330, 'Andri Fannar Baldursson', 8, 'Meio Campo', 1210, 'T'),
(3335, 'Birkir Bjarnason', 10, 'Meio Campo', 1210, 'T'),
(3340, 'Andri Lucas Gudjohnsen', 11, 'Atacante', 1210, 'T'),
(3345, 'Albert Gudmundsson', 9, 'Atacante', 1210, 'T'),
(3350, 'Vidar Örn Kjartansson', 7, 'Atacante', 1210, 'T'),
(3355, 'Hannes Halldórsson', 12, 'Goleiro', 1210, 'R'),
(3360, 'Ari Skúlason', 13, 'Central', 1210, 'R'),
(3365, 'Victor Palsson', 14, 'Meio Campo', 1210, 'R'),
(3370, 'Jon Dagur Thorsteinsson', 15, 'Atacante', 1210, 'R'),
(3400, 'Ederson', 1, 'Goleiro', 1220, 'T'),
(3405, 'Danilo', 2, 'Lateral Direito', 1220, 'T'),
(3410, 'Thiago Silva', 3, 'Central', 1220, 'T'),
(3415, 'Marquinhos', 4, 'Central', 1220, 'T'),
(3420, 'Daniel Alves', 6, 'Lateral Esquerdo', 1220, 'T'),
(3425, 'Casemiro', 5, 'Meio Campo', 1220, 'T'),
(3430, 'Lucas Paquetá', 8, 'Meio Campo', 1220, 'T'),
(3435, 'Neymar', 10, 'Meio Campo', 1220, 'T'),
(3440, 'Gabriel Jesus', 11, 'Atacante', 1220, 'T'),
(3445, 'Firmino', 9, 'Atacante', 1220, 'T'),
(3450, 'Richarlison', 7, 'Atacante', 1220, 'T'),
(3455, 'Weverton', 12, 'Goleiro', 1220, 'R'),
(3460, 'Militão', 13, 'Central', 1220, 'R'),
(3465, 'Everton Ribeiro', 14, 'Meio Campo', 1220, 'R'),
(3470, 'Gabriel Barbosa', 15, 'Atacante', 1220, 'R'),
(3500, 'Gregor Kobel', 1, 'Goleiro', 1230, 'T'),
(3505, 'Nico Elvedi', 2, 'Lateral Direito', 1230, 'T'),
(3510, 'Jordan Lotomba', 3, 'Central', 1230, 'T'),
(3515, 'Fabian Schär', 4, 'Central', 1230, 'T'),
(3520, 'Silvan Widmer', 6, 'Lateral Esquerdo', 1230, 'T'),
(3525, 'Michel Aebischer', 5, 'Meio Campo', 1230, 'T'),
(3530, 'Christian Fassnacht', 8, 'Meio Campo', 1230, 'T'),
(3535, 'Fabian Frei', 10, 'Meio Campo', 1230, 'T'),
(3540, 'Dan Ndoye', 11, 'Atacante', 1230, 'T'),
(3545, 'Haris Seferovic', 9, 'Atacante', 1230, 'T'),
(3550, 'Andi Zeqiri', 7, 'Atacante', 1230, 'T'),
(3555, 'Yvon Mvogo', 12, 'Goleiro', 1230, 'R'),
(3560, 'Cedric Zesiger', 13, 'Central', 1230, 'R'),
(3565, 'Steven Zuber', 14, 'Meio Campo', 1230, 'R'),
(3570, 'Denis Zakaria', 15, 'Atacante', 1230, 'R'),
(3600, 'Marko Dmitrovic', 1, 'Goleiro', 1240, 'T'),
(3605, 'Nikola Milenkovic', 2, 'Lateral Direito', 1240, 'T'),
(3610, 'Stefan Mitrovic', 3, 'Central', 1240, 'T'),
(3615, 'Filip Mladenovic', 4, 'Central', 1240, 'T'),
(3620, 'Matija Nastasic', 6, 'Lateral Esquerdo', 1240, 'T'),
(3625, 'Veljko Birmancevic', 5, 'Meio Campo', 1240, 'T'),
(3630, 'Filip Djuricic', 8, 'Meio Campo', 1240, 'T'),
(3635, 'Ivan Ili?', 10, 'Meio Campo', 1240, 'T'),
(3640, 'Aleksandar Mitrovic', 11, 'Atacante', 1240, 'T'),
(3645, 'Luka Jovic', 9, 'Atacante', 1240, 'T'),
(3650, 'Dusan Vlahovic', 7, 'Atacante', 1240, 'T'),
(3655, 'Marko Ilic', 12, 'Goleiro', 1240, 'R'),
(3660, 'Milos Veljkovic', 13, 'Central', 1240, 'R'),
(3665, 'Mihailo Ristic', 14, 'Meio Campo', 1240, 'R'),
(3670, 'Dusan Tadic', 15, 'Atacante', 1240, 'R'),
(3700, 'Aaron Cruz', 1, 'Goleiro', 1250, 'T'),
(3705, 'Francisco Calvo', 2, 'Lateral Direito', 1250, 'T'),
(3710, 'Óscar Duarte', 3, 'Central', 1250, 'T'),
(3715, 'Fernán Faerrón', 4, 'Central', 1250, 'T'),
(3720, 'Giancarlo González', 6, 'Lateral Esquerdo', 1250, 'T'),
(3725, 'Ricardo Blanco Mora', 5, 'Meio Campo', 1250, 'T'),
(3730, 'Celso Borges', 8, 'Meio Campo', 1250, 'T'),
(3735, 'David Guzmán', 10, 'Meio Campo', 1250, 'T'),
(3740, 'Bryan Ruiz', 11, 'Atacante', 1250, 'T'),
(3745, 'Joel Campbell', 9, 'Atacante', 1250, 'T'),
(3750, 'Ariel Lassiter', 7, 'Atacante', 1250, 'T'),
(3755, 'Leonel Moreira', 12, 'Goleiro', 1250, 'R'),
(3760, 'Juan Vargas', 13, 'Central', 1250, 'R'),
(3765, 'Gerson Torres', 14, 'Meio Campo', 1250, 'R'),
(3770, 'Kenneth Vargas', 15, 'Atacante', 1250, 'R');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

DROP TABLE IF EXISTS `jogos`;
CREATE TABLE IF NOT EXISTS `jogos` (
  `idrodada` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `estadio_idestadio` int(11) NOT NULL,
  `pais_idpais_1` int(11) NOT NULL,
  `pais_idpais_2` int(11) NOT NULL,
  `gols_idpais_1` int(11) NOT NULL,
  `gols_idpais_2` int(11) NOT NULL,
  `publico` int(11) NOT NULL,
  PRIMARY KEY (`idrodada`),
  KEY `estadio_idestadio` (`estadio_idestadio`),
  KEY `pais_idpais_1` (`pais_idpais_1`),
  KEY `pais_idpais_2` (`pais_idpais_2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`idrodada`, `data`, `estadio_idestadio`, `pais_idpais_1`, `pais_idpais_2`, `gols_idpais_1`, `gols_idpais_2`, `publico`) VALUES
(1, '2020-11-21 20:00:00', 5000, 1100, 1120, 2, 1, 73258),
(2, '2020-11-22 17:00:00', 5200, 1110, 1130, 1, 1, 33456),
(3, '2020-11-22 17:00:00', 5300, 1140, 1160, 0, 0, 31827),
(4, '2020-11-22 20:00:00', 5100, 1150, 1170, 2, 0, 30623),
(5, '2020-11-23 17:00:00', 5300, 1190, 1200, 1, 1, 35392),
(6, '2020-11-23 20:00:00', 5200, 1180, 1210, 2, 0, 32721),
(7, '2020-11-24 17:00:00', 5000, 1220, 1230, 1, 0, 65880),
(8, '2020-11-24 20:00:00', 5200, 1240, 1250, 0, 0, 30268),
(9, '2020-11-25 17:00:00', 5000, 1110, 1120, 1, 0, 71525),
(10, '2020-11-25 20:00:00', 5300, 1100, 1130, 2, 2, 38741),
(11, '2020-11-26 17:00:00', 5100, 1140, 1150, 3, 1, 42183),
(12, '2020-11-26 20:00:00', 5200, 1160, 1170, 2, 1, 33420),
(13, '2020-11-27 17:00:00', 5000, 1180, 1190, 2, 1, 68704),
(14, '2020-11-27 20:00:00', 5300, 1200, 1210, 2, 1, 29732),
(15, '2020-11-28 17:00:00', 5100, 1220, 1240, 3, 1, 48359),
(16, '2020-11-28 20:00:00', 5300, 1230, 1250, 1, 1, 30681),
(17, '2020-11-29 17:00:00', 5000, 1120, 1130, 0, 2, 73086),
(18, '2020-11-29 20:00:00', 5100, 1100, 1110, 3, 2, 44592),
(19, '2020-11-30 17:00:00', 5300, 1140, 1170, 3, 0, 32473),
(20, '2020-11-30 20:00:00', 5200, 1150, 1160, 2, 1, 29686),
(21, '2020-12-01 17:00:00', 5100, 1180, 1200, 2, 0, 39325),
(22, '2020-12-01 20:00:00', 5200, 1190, 1210, 3, 0, 37854),
(23, '2020-12-02 17:00:00', 5300, 1230, 1240, 1, 0, 30542),
(24, '2020-12-02 20:00:00', 5000, 1220, 1250, 2, 0, 66729);

--
-- Acionadores `jogos`
--
DROP TRIGGER IF EXISTS `Atualiza_Pais`;
DELIMITER $$
CREATE TRIGGER `Atualiza_Pais` AFTER INSERT ON `jogos` FOR EACH ROW begin
		-- vitória da seleção 1
		if new.gols_idpais_1 > new.gols_idpais_2 then
				update pais set 
                pais.pontos = pais.pontos + 3, 
                pais.vitorias = pais.vitorias + 1,
                pais.golspro = pais.golspro + new.gols_idpais_1,
                pais.golscontra = pais.golscontra + new.gols_idpais_2
                where pais.idpais = new.pais_idpais_1;
		end if;
		
        -- vitória da seleção 2
        if new.gols_idpais_1 < new.gols_idpais_2 then
				update pais set 
                pais.pontos = pais.pontos + 3, 
                pais.vitorias = pais.vitorias + 1,
                pais.golspro = pais.golspro + new.gols_idpais_2,
                pais.golscontra = pais.golscontra + new.gols_idpais_1
                where pais.idpais = new.pais_idpais_2;
		end if;
		
        -- empate
        if new.gols_idpais_1 = new.gols_idpais_2 then
				update pais set 
                pais.pontos = pais.pontos + 1, 
                pais.empates = pais.empates + 1,
                pais.golspro = pais.golspro + new.gols_idpais_1,
                pais.golscontra = pais.golscontra + new.gols_idpais_2
                where pais.idpais = new.pais_idpais_1 or
                pais.idpais = new.pais_idpais_2;
		end if;
        
        -- derrota da seleção 1
		if new.gols_idpais_1 < new.gols_idpais_2 then
				update pais set
                pais.derrotas = pais.derrotas + 1,
                pais.golspro = pais.golspro + new.gols_idpais_1,
                pais.golscontra = pais.golscontra + new.gols_idpais_2
                where pais.idpais = new.pais_idpais_1;
		end if;
        
        -- derrota da seleção 2
        if new.gols_idpais_1 > new.gols_idpais_2 then
				update pais set
                pais.derrotas = pais.derrotas + 1,
                pais.golspro = pais.golspro + new.gols_idpais_2,
                pais.golscontra = pais.golscontra + new.gols_idpais_1
                where pais.idpais = new.pais_idpais_2;
		end if;
	end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE IF NOT EXISTS `pais` (
  `idpais` int(11) NOT NULL,
  `selecao` varchar(20) DEFAULT NULL,
  `continente` varchar(20) DEFAULT NULL,
  `tecnico` varchar(20) DEFAULT NULL,
  `pontos` int(11) NOT NULL,
  `vitorias` int(11) NOT NULL,
  `empates` int(11) NOT NULL,
  `derrotas` int(11) NOT NULL,
  `golspro` int(11) NOT NULL,
  `golscontra` int(11) NOT NULL,
  `grupo_idgrupo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idpais`),
  KEY `grupo_idgrupo` (`grupo_idgrupo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`idpais`, `selecao`, `continente`, `tecnico`, `pontos`, `vitorias`, `empates`, `derrotas`, `golspro`, `golscontra`, `grupo_idgrupo`) VALUES
(1100, 'Uruguai', 'América', 'Óscar Tabárez', 7, 2, 1, 0, 7, 5, 'A'),
(1110, 'Rússia', 'Europa', 'Valeri Karpin', 4, 1, 1, 1, 4, 4, 'A'),
(1120, 'Catar', 'Ásia', 'José Ricardo', 0, 0, 0, 3, 1, 5, 'A'),
(1130, 'Egito', 'África', 'Carlos Queiroz', 5, 1, 2, 0, 5, 3, 'A'),
(1140, 'França', 'Europa', 'Didier Deschamps', 7, 2, 1, 0, 6, 1, 'B'),
(1150, 'Dinamarca', 'Europa', 'Kasper Hjulmand', 6, 2, 0, 1, 5, 4, 'B'),
(1160, 'Peru', 'América', 'Ricardo Gareca', 4, 1, 1, 1, 3, 3, 'B'),
(1170, 'Austrália', 'Oceania', 'Graham Arnold', 0, 0, 0, 3, 1, 7, 'B'),
(1180, 'Croácia', 'Europa', 'Zlatko Dali?', 9, 3, 0, 0, 6, 1, 'C'),
(1190, 'Argentina', 'América', 'Lionel Scaloni', 4, 1, 1, 1, 5, 3, 'C'),
(1200, 'Nigéria', 'África', 'Gernot Rohr', 4, 1, 1, 1, 3, 4, 'C'),
(1210, 'Islândia', 'Europa', 'Arnar Viðarsson', 0, 0, 0, 3, 1, 7, 'C'),
(1220, 'Brasil', 'América', 'Tite', 9, 3, 0, 0, 6, 1, 'D'),
(1230, 'Suiça', 'Europa', 'Murat Yak?n', 4, 1, 1, 1, 2, 2, 'D'),
(1240, 'Sérvia', 'Europa', 'Dragan Stojkovi?', 1, 0, 1, 2, 1, 4, 'D'),
(1250, 'Costa Rica', 'América', 'Luis Fernando Suárez', 2, 0, 2, 1, 1, 3, 'D');

-- --------------------------------------------------------

--
-- Estrutura da tabela `substituicao`
--

DROP TABLE IF EXISTS `substituicao`;
CREATE TABLE IF NOT EXISTS `substituicao` (
  `jogos_idrodada` int(11) NOT NULL,
  `jogador_idjogador_sai` int(11) DEFAULT NULL,
  `jogador_idjogador_entra` int(11) DEFAULT NULL,
  `tempo` varchar(50) DEFAULT NULL,
  KEY `jogador_idjogador_sai` (`jogador_idjogador_sai`),
  KEY `jogador_idjogador_entra` (`jogador_idjogador_entra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `substituicao`
--

INSERT INTO `substituicao` (`jogos_idrodada`, `jogador_idjogador_sai`, `jogador_idjogador_entra`, `tempo`) VALUES
(1, 2250, 2270, '55:20'),
(1, 2430, 2465, '61:05'),
(2, 2350, 2370, '62:28'),
(2, 2550, 2570, '70:49'),
(3, 2650, 2670, '55:05'),
(3, 2850, 2870, '70:10'),
(8, 3635, 3665, '61:36'),
(8, 3715, 3760, '70:08'),
(8, 3735, 3770, '73:06'),
(14, 3250, 3270, '45:05'),
(14, 3335, 3365, '78:30'),
(16, 3735, 3765, '54:28'),
(17, 2430, 2465, '64:39'),
(24, 3445, 3470, '68:11'),
(24, 3735, 3765, '75:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
