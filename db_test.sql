-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2024 at 03:56 AM
-- Server version: 8.0.28
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `topic`, `created_at`, `updated_at`) VALUES
(1, 'The Rise of Artificial Intelligence in Tech', 'Artificial Intelligence (AI) is transforming the technology landscape. It is becoming a central pillar in various fields such as robotics, healthcare, transportation, and data analytics. AI algorithms can now analyze data patterns, predict future events, and automate tasks at an unprecedented scale. In this post, we’ll explore how AI is revolutionizing industries, from self-driving cars to medical diagnosis, and discuss the challenges and opportunities it brings for future technologies.', 'Technology', NULL, NULL),
(2, 'The Evolution of Cloud Computing', 'Cloud computing has revolutionized the way businesses and individuals access technology. By providing on-demand access to computing resources over the internet, cloud services have reduced costs, increased scalability, and enhanced collaboration. Companies like AWS, Microsoft Azure, and Google Cloud have dominated the market, making it easier for companies to scale their IT infrastructure without having to own and maintain physical servers. This post delves into the different types of cloud computing models and the growing trend of multi-cloud and hybrid cloud strategies.', 'Technology', NULL, NULL),
(3, 'Blockchain: Beyond Cryptocurrency', 'Blockchain technology, initially popularized by Bitcoin, has grown far beyond the world of cryptocurrency. Its decentralized nature and security features make it ideal for applications in industries like finance, supply chain, healthcare, and government. This post will explore how blockchain is being used for secure data sharing, improving transparency, and enhancing trust in various sectors, while also examining the potential future uses and challenges of this transformative technology.', 'Technology', NULL, NULL),
(4, 'The Role of Machine Learning in Modern Software Development', 'Machine learning (ML) is a subset of artificial intelligence that focuses on developing algorithms that allow computers to learn from and make predictions on data. It has become an essential tool in modern software development, helping to improve applications by enabling automated decision-making, recommendation systems, and predictive analytics. In this post, we explore how ML is being integrated into software development processes and the future impact of ML technologies on the software industry.', 'Technology', NULL, NULL),
(5, 'The Future of 5G Networks and IoT', '5G is set to redefine the way we connect to the internet. With faster speeds, lower latency, and more reliable connections, 5G will unlock the potential of the Internet of Things (IoT) by connecting billions of devices in real time. From smart cities to autonomous vehicles, 5G will enable next-generation innovations that rely on continuous, high-speed data transfer. In this article, we examine how 5G and IoT are working together to reshape industries and improve daily life.', 'Technology', NULL, NULL),
(6, 'The Impact of Virtual Reality on Education', 'Virtual Reality (VR) technology is making waves in the education sector by offering immersive learning experiences that can enhance student engagement, improve retention, and provide hands-on practice in simulated environments. From medical students practicing surgeries to engineering students designing prototypes, VR has the potential to transform the way we teach and learn. This post explores how VR is currently being used in education and its potential for the future of learning.', 'Technology', NULL, NULL),
(7, 'Autonomous Vehicles: The Road Ahead', 'Self-driving cars are one of the most talked-about advancements in the technology world. With major companies like Tesla, Waymo, and Uber investing heavily in autonomous vehicle technology, the transportation industry is on the verge of a revolution. This post explores the current state of autonomous vehicle development, the technologies driving it (such as machine learning, computer vision, and sensor fusion), and the challenges that still lie ahead before self-driving cars become mainstream.', 'Technology', NULL, NULL),
(8, 'The Growing Importance of Cybersecurity in the Digital Age', 'As our world becomes increasingly connected, cybersecurity has never been more important. Cyberattacks are becoming more sophisticated, and the risks to both individuals and organizations are growing. In this post, we’ll explore the importance of cybersecurity, emerging threats, and best practices for protecting data and privacy in an age where personal and business information is more vulnerable than ever.', 'Technology', NULL, NULL),
(9, 'Understanding Augmented Reality and Its Applications', 'Augmented Reality (AR) is a technology that overlays digital content, such as images, sounds, or data, on the real world through a smartphone or wearable device. AR has many applications in industries like gaming, healthcare, retail, and marketing. This article discusses how AR is being used in different sectors, from Pokemon Go to surgery simulation, and explores the potential future uses of AR in creating interactive and immersive experiences.', 'Technology', NULL, NULL),
(10, 'The Role of Big Data in Transforming Businesses', 'Big Data refers to the vast amounts of data that are generated every second from various sources, such as social media, sensors, and transactions. Analyzing this data can uncover valuable insights that help businesses make better decisions, improve customer experiences, and drive innovation. In this post, we dive into how Big Data is being used by businesses to improve operations, target customers more effectively, and stay ahead of the competition.', 'Technology', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
