SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automotriz`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--
CREATE DATABASE IF NOT EXISTS automotriz;
USE automotriz;

CREATE TABLE `auto` (
  `id_auto` int(100) NOT NULL,
  `modelo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `anio` varchar(4) NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `id_marca` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`id_auto`, `modelo`, `anio`, `img`, `id_marca`) VALUES
(5, 'Ford Fiesta Ambiente', '2010', '', 4),
(6, 'Ford Fiesta Ambiente XDi', '2010', '', 4),
(7, 'fiat taurus ', '2019', '', 2),
(8, 'volkswagen polo ', '2011', '', 1),
(12, 'fiat spazio 128', '2001', 'img/auto/617b2dd513aec5.61179938.jpg', 2),
(14, 'Ford mustang 34', '1997', 'img/auto/617b3386673761.47373708.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE `comentario` (
  `id` int(100) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `puntuacion` int(5) NOT NULL,
  `id_usuario` int(50) NOT NULL,
  `id_auto` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(50) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `origen` varchar(18) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre`, `origen`) VALUES
(1, 'volkswagen', 'Alemania'),
(2, 'Fiat', 'Italia'),
(3, 'Audi', 'Alemania'),
(4, 'Ford', 'Estados Unidos'),
(5, 'Toyota', 'Japon');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(30) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contraseña` varchar(60) NOT NULL,
  `permisos` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `email`, `contraseña`, `permisos`) VALUES
(1, 'Axel Luguercio', 'axelluguercio@gmail.com', '$2y$10$45cyCAFM1GO4pd/zs6KlIO0Ejcyo53wGYaOdbKoL/RUeam1SSqWcu', 'U'),
(4, 'Romina Alvarado', 'romina@gmail.com', '$2y$10$3jGq93BvUwyHQh8vpA0q3eMSpNQPxr4ENsldrSV50/5uP4veSsMbi', 'U'),
(5, 'brisa', 'brisa@gmail.com', '$2y$10$EAbERJY0qCmewDkSKXE0LOfwGQCOUR65SlWnqdXobAJHnO.YDxUFO', 'U'),
(6, 'admin', 'admin@admin.com', 'password', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id_auto`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_auto` (`id_auto`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto`
--
ALTER TABLE `auto`
  MODIFY `id_auto` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON UPDATE CASCADE;

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_auto`) REFERENCES `auto` (`id_auto`) ON UPDATE CASCADE;
