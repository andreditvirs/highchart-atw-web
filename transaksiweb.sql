-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2020 at 03:50 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

-- DUMMY DATA
-- Nama DB : transaksiweb
-- Masukkan ke dalam XAMPP dengan versi dijelaskan di atas
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `jumlah_laku` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cat` (`id`, `jumlah_laku`, `tanggal_penjualan`) VALUES
(1, 10, '2020-09-16'),
(2, 20, '2020-09-16'),
(3, 10, '2020-08-05'),
(4, 2, '2020-08-12'),
(5, 30, '2020-08-31'),
(6, 23, '2020-09-23'),
(7, 10, '2020-10-01'),
(8, 5, '2020-10-14'),
(9, 12, '2020-10-30'),
(10, 2, '2020-10-31');

CREATE TABLE `kayu` (
  `id` int(11) NOT NULL,
  `jumlah_laku` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kayu` (`id`, `jumlah_laku`, `tanggal_penjualan`) VALUES
(1, 5, '2020-09-16'),
(2, 6, '2020-09-01'),
(3, 1, '2020-08-01'),
(4, 1, '2020-08-12'),
(5, 2, '2020-10-01'),
(6, 3, '2020-10-02'),
(7, 10, '2020-09-17'),
(8, 1, '2020-09-18');

CREATE TABLE `keterangan_bahan` (
  `id` int(11) NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `keterangan_bahan` (`id`, `nama_bahan`, `satuan`) VALUES
(1, 'cat', 'ember/kaleng'),
(2, 'kayu', 'meter'),
(3, 'pipa', 'meter'),
(4, 'semen', 'sak');

CREATE TABLE `pipa` (
  `id` int(11) NOT NULL,
  `jumlah_laku` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pipa` (`id`, `jumlah_laku`, `tanggal_penjualan`) VALUES
(1, 8, '2020-09-16'),
(2, 8, '2020-08-01'),
(3, 8, '2020-08-14'),
(4, 8, '2020-09-17'),
(5, 9, '2020-10-01'),
(6, 8, '2020-10-15');

CREATE TABLE `semen` (
  `id` int(11) NOT NULL,
  `jumlah_laku` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `semen` (`id`, `jumlah_laku`, `tanggal_penjualan`) VALUES
(1, 1, '2020-09-16'),
(2, 1, '2020-08-01'),
(3, 1, '2020-08-14'),
(4, 2, '2020-09-01'),
(5, 4, '2020-10-01'),
(6, 5, '2020-10-02'),
(7, 1, '2020-08-03'),
(8, 1, '2020-09-30');

ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `kayu`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `keterangan_bahan`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pipa`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `semen`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `kayu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `keterangan_bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `pipa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `semen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;