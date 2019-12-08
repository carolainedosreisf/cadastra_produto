-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Set-2019 às 15:01
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exercicio_02`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `imagem`, `titulo`, `descricao`) VALUES
(11, 'img/paisagem_1.jpg', 'Produto de nÂ° 1 ', '#1 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal d'),
(12, 'img/paisagem_2.jpg', 'Produto de nÂ° 2', '#2 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal ful.'),
(13, 'img/paisagem_3.jpg', 'Produto de nÂ° 3', '#3 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal ful.'),
(14, 'img/paisagem_4.jpg', 'Produto de nÂ° 4', '#4 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal ful.'),
(15, 'img/paisagem_5.jpg', 'Produto de nÂ° 5', '#5 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal ful.'),
(16, 'img/paisagem_6.png', 'Produto de nÂ° 6', '#6 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal ful.'),
(17, 'img/paisagem_7.jpg', 'Produto de nÂ° 7', '#7 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal ful.'),
(18, 'img/paisagem_8.jpg', 'Produto de nÂ° 8', '#8 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal ful.'),
(19, 'img/paisagem_9.jpg ', 'Produto de nÂ° 9 ', '#9 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal ful. '),
(71, 'img/paisagem_13.jpg', 'Produto de nÂ° 13', '#13 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal ful.'),
(44, 'img/paisagem_10.jpg', 'Produto de nÂ° 10', '#10 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.'),
(45, 'img/paisagem_11.jpg', 'Produto de nÂ° 11', '#11 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.'),
(54, 'img/paisagem_12.jpg', 'Produto de nÂ° 12', '#12 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.'),
(72, 'img/paisagem_14.jpg', 'Produto de nÂ° 14', '#14 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal ful.'),
(73, 'img/paisagem_15.jpg', 'Produto de nÂ° 15', '#15 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal ful.'),
(74, 'img/paisagem_16.jpg', 'Produto de nÂ° 16', '#16 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal ful.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `produtos` ADD FULLTEXT KEY `descricao` (`descricao`);
ALTER TABLE `produtos` ADD FULLTEXT KEY `descricao_2` (`descricao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
