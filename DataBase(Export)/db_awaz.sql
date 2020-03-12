-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2019 at 07:11 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_awaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE `tbl_catagory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`id`, `name`) VALUES
(1, 'সমসাময়িক'),
(2, 'রাজনীতি'),
(3, 'আন্তর্জাতিক'),
(4, 'সামাজিক দৃষ্টিকোন'),
(5, 'খেলা ধুলা'),
(6, 'বিশ্বকাপ ক্রিকেট ২০১৯'),
(7, 'বাংলাদেশের বিশ্বকাপ'),
(8, 'স্বাস্থ্য');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(1, 'ragib chowdhury', 'Protik', 'protikpb@gmail.com', 'Health', 1, '2019-06-03 11:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `footernote` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `footernote`) VALUES
(1, 'Copyright Araf_Hasan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `name`, `body`) VALUES
(4, 'Notice', '<p style=\"text-align: center;\"><span style=\"text-decoration: underline; font-size: medium; color: #ff0000;\"><strong>Attention</strong></span></p>\r\n<p style=\"text-align: center;\">This is a blog site. Develop by Md. Araf Hasan. This site is build up for the educational purpose. Here I need some writer to write blog. So If anyone is interested to write. Then please contact me by the <a href=\"../contact.php\" target=\"_blank\">contact page.</a> Just click on the page and submit your information, the admin will approve you to be an author/editor of this site.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `catagory` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `author` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tags` varchar(255) CHARACTER SET latin1 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vdo` varchar(512) CHARACTER SET latin1 NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `catagory`, `title`, `body`, `image`, `author`, `tags`, `date`, `vdo`, `userid`) VALUES
(1, 7, ' চ্যাম্পিয়নের মতোই খেলেছে বাংলাদেশ', '<p><span>দারুণ উপভোগ করলাম বাংলাদেশের জয়। দেখে মনে হলো আক্ষরিক অর্থেই একটা চ্যাম্পিয়ন দলের খেলা দেখছি। ব্যাটে-বলে অসাধারণ পারফরম্যান্স। সৌম্য সরকার, সাকিব আল হাসান, মুশফিকুর রহিম কিংবা মাহমুদউল্লাহদের ব্যাটিং, মোস্তাফিজ, সাইফউদ্দীন, মিরাজদের বোলিং&mdash;সত্যিই অসাধারণ, আগাগোড়া পেশাদারি। আর মাশরাফি বিন মুর্তজার অধিনায়কত্বের কথা আর কী বলব, তাঁকে কেন অন্যতম সেরা অধিনায়ক বলা হচ্ছে, তার নমুনা তো প্রতি ম্যাচেই তিনি দেখিয়ে চলেছেন। দক্ষিণ আফ্রিকার বিপক্ষেও তিনি ছিলেন অসাধারণ, বুদ্ধিদীপ্ত।</span><br /><br /><span>অধিনায়কত্বের সেরাটাই দেখেছি কাল। মাশরাফি আর মিরাজ মিলে কীভাবে প্রোটিয়া অধিনায়ক ফাফ ডু প্লেসিকে ফাঁদে ফেলা হলো! আগের ওভারগুলোতেই মাশরাফি আর মোসাদ্দেককে মারল ডু প্লেসি। এর পরপরই মাশরাফি কিছুটা ঝুঁকি নিয়েই মিরাজকে আক্রমণে নিয়ে আসে। এরপরই দেখা গেল আসল খেলাটা। মিড অফকে ৩০ গজ বৃত্তের মধ্যে একটু ওপরের দিকে নিয়ে এসে মাশরাফি মিরাজকে অফ স্টাম্পের বাইরে বোলিং করতে বলল। এটা কিন্তু খুব সাহসী ব্যাপার। মিরাজ বোলিংয়ে কিছুটা লুপ দিয়েই ডু প্লেসিকে ভুলটা করতে বাধ্য করে। স্পিনের বিপরীতে খেলতে গিয়ে সে বোল্ড হলো। অসাধারণ অধিনায়কত্ব।</span></p>\r\n<p><span>অধিনায়কত্বের বাইরে আরও একটা ব্যাপার দুর্দান্ত লেগেছে। সেটি হচ্ছে গোটা দলের ধৈর্য। টেস্ট ম্যাচের মতোই দক্ষিণ আফ্রিকান ব্যাটসম্যানদের ভুল করতে বাধ্য করেছে বাংলাদেশি বোলার-ফিল্ডাররা। চরম ধৈর্য ধরে। ব্যাটিংয়ে প্রথম থেকেই দারুণ একটা পরিকল্পনা নিয়ে খেলেছে দল। সাকিব-মুশফিকের রেকর্ড জুটিটা তো রীতিমতো গল্পের মতো। মিরাজের কথা আলাদা করে বলতে হয়। আমরা অসাধারণ একজন খেলোয়াড় পেয়েছি। বোলিং, ব্যাটিং, ফিল্ডিং&mdash;সে একটা কমপ্লিট প্যাকেজ।</span></p>\r\n<p><span>সাকিবকে নিয়ে নতুন করে কিছু বলার নেই। সে আমাদের দুজন খেলোয়াড়ের সমান। দারুণ পরিণত খেলোয়াড় সে এখন। ব্যাটে-বলে সে তার প্রমাণ রেখেছে। মুশফিক বাংলাদেশের অন্যতম সেরা ব্যাটসম্যান। তাঁর ধারাবাহিকতার কোনো তুলনা নেই। আর দক্ষিণ আফ্রিকাকে শুরুতেই ভড়কে দিয়ে সৌম্যর ব্যাট কিন্তু কাল দারুণ ভূমিকা রেখেছে।</span></p>\r\n<p><span><span>বিশ্বকাপের প্রথম ম্যাচে দক্ষিণ আফ্রিকাকে হারিয়ে বাংলাদেশ কিন্তু বড়সড় একটা বার্তা দিয়ে দিল। আমাদের লক্ষ্য এখন আকাশের মতোই বিশাল। অনেক দূর যাওয়ার সামর্থ্য মাশরাফির দলের আছে। কালকের ম্যাচের পর আমরা বিশ্বকাপের বাকি দলগুলোর সমীহ আদায় করে নিলাম। আমাদের সঙ্গে খেলতে নামলে প্রতিটি দলই চাপে থাকবে। টেনশনে থাকবে। এখন বিশ্বকাপের বাকিটা পথ কেবল নিজেদের সামর্থ্য অনুযায়ী দলকে এগিয়ে যেতে হবে।</span><br /><span>মাশরাফির দলকে আবারও অভিনন্দন,শুভেচ্ছা ও শুভ কামনা!</span></span></p>\r\n<p><a href=\"https://www.prothomalo.com/sports/article/1597529/%E0%A6%9A%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%AE%E0%A7%8D%E0%A6%AA%E0%A6%BF%E0%A7%9F%E0%A6%A8%E0%A7%87%E0%A6%B0-%E0%A6%AE%E0%A6%A4%E0%A7%8B%E0%A6%87-%E0%A6%96%E0%A7%87%E0%A6%B2%E0%A7%87%E0%A6%9B%E0%A7%87-%E0%A6%AC%E0%A6%BE%E0%A6%82%E0%A6%B2%E0%A6%BE%E0%A6%A6%E0%A7%87%E0%A6%B6\" target=\"_blank\"><span><span>মুল লেখা</span></span></a></p>', 'upload/post/0463b1b92b.jpg', 'Araf Hasan', 'World cup 2019', '2019-06-03 08:11:59', 'https://www.youtube.com/embed/UhcmNmZppX8', 6),
(2, 7, '‘আমরা বলার চেষ্টা করি, বাইরের লোকেরা পাত্তা দেয় না!’', '<p>কাল ম্যাচ শেষে সংবাদ সম্মেলনে এলেন মাশরাফি বিন মুর্তজা। বিসিবির মিডিয়া ম্যানেজার জানালেন, সাকিব আল হাসানও আসবেন। বিশ্বসেরা অলরাউন্ডার কথা বলবেন মিক্সড জোনে। তাঁর সঙ্গে থাকবেন মেহেদী হাসান মিরাজ। দিনটা বাংলাদেশের&mdash;মাশরাফি-সাকিবদের মনের দুয়ার খুলে দেওয়ার দিন!</p>\r\n<p>কাল ওভালে সাকিব তা দিলেনও। খেলার ক্লান্তি ছাপিয়ে জয়ের আনন্দ তাঁর চোখে&ndash;মুখে। আবেগ প্রকাশে তিনি সব সময়ই পরিমিত। কালও ছিলেন। তবে বড় মঞ্চে জয়ের খুশি কি আর লুকানো যায়! দক্ষিণ আফ্রিকার বিপক্ষে দুর্দান্ত এক জয়ে রেখেছেন গুরুত্বপূর্ণ অবদান। হয়েছেন ম্যাচসেরা। সাকিবের মুখে নেমে এসেছে চাঁদের হাসি। নিজেদের ওপর অযাচিত চাপ না নিতে ম্যাচের আগের দিন অধিনায়ক মাশরাফি বলছিলেন, এ বিশ্বকাপে তো নয়ই, দক্ষিণ আফ্রিকার বিপক্ষেও ফেবারিট নয় বাংলাদেশ। সেই &lsquo;ফেবারিট&rsquo; দক্ষিণ আফ্রিকাকে হারিয়ে বিশ্বকাপের মতো বড় মঞ্চে শুরুটা হয়েছে জয় দিয়ে&mdash;এবার বাংলাদেশকে বিপজ্জনক দল বলা যায়?</p>\r\n<p>এক ম্যাচ জিতেই সেটি বলার সময় হয়নি। তবে জয়ের ধারা রাখতে পারলে যে অনেক দূর যেতে পারেন, সেটিই বললেন সাকিব, &lsquo;সব সময়ই আমরা বলার চেষ্টা করি (বিপজ্জনক দল)। তবে বাইরের দেশের লোকেরা খুব বেশি পাত্তা দেয় না! এ জায়গাগুলোয় আমাদের প্রমাণের সুযোগ আছে। আমাদের শুরুটা ভালো হলো। মনে করি, সবাই খুবই ভালো অবস্থানে আছে, বিশেষ করে মনস্তাত্ত্বিকভাবে। এভাবে যেতে পারলে আমাদের অনেক দূর যাওয়া সম্ভব।&rsquo;</p>\r\n<p>দক্ষিণ আফ্রিকার বিপক্ষে জয় দিয়ে শুরু করায় প্রতিটি প্রতিপক্ষ ভীষণ সতর্ক থাকবে বাংলাদেশকে নিয়ে। প্রতিপক্ষের এই সতর্কতার দুটি দিক দেখছেন সাকিব, &lsquo;আমাদের মাত্র শুরু হলো। আরও আটটা ম্যাচ আছে। আরও কঠিন পরিস্থিতি সামলাতে হবে। এ ম্যাচের পর প্রতিপক্ষ আরও সতর্ক হয়ে খেলবে আমাদের সঙ্গে। আমাদের আরও ভালোভাবে প্রস্তুতি নিতে হবে। আরও ভালোভাবে পরিকল্পনা কাজে লাগাতে হবে। সবাই আমাদের নিয়ে সতর্ক থাকবে, সেটি আমাদের জন্য একদিক দিয়ে ভালো। এতে তাদের টেনশন কিংবা নার্ভাসনেস কাজ করবে (যেটির সুযোগ বাংলাদেশ নেবে)। অন্যদিকে ভীষণ নজর থাকবে (কাজটা আরও কঠিন হবে) আমাদের ওপর।&rsquo;</p>\r\n<p><span>বিশ্বকাপযাত্রা সবে শুরু। বাংলাদেশকে যেতে হবে বহুদূর। শুরুটা ভালো হয়েছে, সাকিবের চাওয়া একটাই, ধারাবাহিকতা ধরে রেখে পৌঁছাতে হবে কাঙ্ক্ষিত লক্ষ্যে।</span></p>\r\n<p><a href=\"https://www.prothomalo.com/sports/article/1597504/%E2%80%98%E0%A6%86%E0%A6%AE%E0%A6%B0%E0%A6%BE-%E0%A6%AC%E0%A6%B2%E0%A6%BE%E0%A6%B0-%E0%A6%9A%E0%A7%87%E0%A6%B7%E0%A7%8D%E0%A6%9F%E0%A6%BE-%E0%A6%95%E0%A6%B0%E0%A6%BF-%E0%A6%AC%E0%A6%BE%E0%A6%87%E0%A6%B0%E0%A7%87%E0%A6%B0-%E0%A6%B2%E0%A7%8B%E0%A6%95%E0%A7%87%E0%A6%B0%E0%A6%BE-%E0%A6%AA%E0%A6%BE%E0%A6%A4%E0%A7%8D%E0%A6%A4%E0%A6%BE-%E0%A6%A6%E0%A7%87%E0%A7%9F\" target=\"_blank\"><span><span>মুল লেখা</span></span></a></p>', 'upload/post/4209c65a13.jpg', 'Araf Hasan', 'World Cup Cricket 2019', '2019-06-03 08:31:51', 'https://www.youtube.com/embed/4p3E4jYSgmg', 6),
(3, 7, ' এ বিশ্বকাপ বাংলাদেশের প্রমাণ করার, বললেন সাকিব', '<p><span>দক্ষিণ আফ্রিকার বিপক্ষে জয়! ম্যান অব দ্য ম্যাচ আর কেউ নন&mdash;সাকিব আল হাসান। ব্যাট হাতে ৭৫ রানের ইনিংস আর ভালো বোলিং। সেই সঙ্গে গুরুত্বপূর্ণ সময়ে আন্দিলে ফিকোয়াওয়ের ক্যাচ। ম্যাচের সেরা তো তিনিই। মুশফিকুর রহিমের সঙ্গে ১৪২ রানের রেকর্ড জুটি গড়ে শুরুতেই বাংলাদেশকে চালকের আসনে বসিয়ে দেওয়ার ব্যাপারটিও তো দুর্দান্ত। সাকিব নিজে বললেন, এটি ক্রিকেটে বাংলাদেশের অন্যতম সেরা জয়। নিজের চতুর্থ বিশ্বকাপে এসেও কথাটা বলার সময় সাকিবের কণ্ঠটা যেন একটু কাঁপল&mdash;অবশ্যই আবেগে। এই বিশ্বকাপে যে অনেক কিছুই প্রমাণ করার বাকি বাংলাদেশের।</span></p>\r\n<p>ম্যাচসেরার পুরস্কারটি হাতে নিয়ে সেটি বললেন সাকিব, &lsquo;আমি মনে করি, এটি আমাদের অন্যতম সেরা জয়। আমরা আগেও বিশ্বকাপে ম্যাচ জিতেছি। আপসেট ঘটিয়েছি। এটা তো আমার চতুর্থ বিশ্বকাপ। এ বিশ্বকাপে আমাদের প্রমাণ করার অনেক কিছুই আছে। আজ আমরা জিতেছি। এভাবেই বিশ্বকাপের শুরুটা করতে চেয়েছিলাম। শুরুটা তো এর চেয়ে দারুণভাবে আর হতে পারত না।&rsquo;</p>\r\n<p>বিশ্বকাপে ভালো কিছু করার বিশ্বাসটা বাংলাদেশ দলের সবার মধ্যেই ছিল। সাকিব আজ সেটি আবার নতুন করেই বললেন, &lsquo;ইংল্যান্ডে আসার আগেই আমাদের মধ্যে একটা বিশ্বাস ছিল। এ ধরনের শুরুটাই আমাদের দরকার ছিল। আমাদের সৌভাগ্য যে আমরা এমন দারুণ একটা শুরু পেয়েছি।&rsquo;</p>\r\n<p>উস্টারশায়ারে দুই মৌসুম খেলার অভিজ্ঞতাটা আজ ওভালে যে দারুণভাবে কাজে লেগেছে, সেটিও জানিয়েছেন সাকিব, &lsquo;উস্টারশায়ারে দুই মৌসুম খেলার অভিজ্ঞতাটা আজ খুব কাজে এসেছে। আমি এ মাঠের কন্ডিশন সম্পর্কে জানতাম। ২০১৭ চ্যাম্পিয়নস ট্রফিতে এখানে খেলেছি। আমরা জানতাম, ওভালের উইকেট ব্যাটিংয়ের জন্য খুব ভালো। মাঠে নেমে কিছুটা এদিক-ওদিক মানিয়ে নিতে হয়েছে। আমাদের হোমওয়ার্কটা তো করা ছিলই।&rsquo;</p>\r\n<p><span>মুশফিকের সঙ্গে ১৪২ রানের জুটিটি বিশ্বকাপে বাংলাদেশের সেরা জুটি&mdash;সাকিব এ ব্যাপারটি জানতেন না। তবে মুশফিকের সঙ্গে জুটিটি যে দারুণ একটা ব্যাপার ছিল, আনন্দের সঙ্গেই বললেন, &lsquo;আমি রেকর্ডের ব্যাপারটি জানতাম না। তবে জুটিটি কিন্তু দলের দারুণ কাজে এসেছে। আমরা দুজন মিলে ইনিংসটাকে আগলে রেখেছিলাম। মনে হয়, সেটি আমরা ভালোভাবেই করতে পেরেছিলাম।&rsquo;</span></p>\r\n<p><span><a href=\"https://www.prothomalo.com/sports/article/1597476/%E0%A6%8F-%E0%A6%AC%E0%A6%BF%E0%A6%B6%E0%A7%8D%E0%A6%AC%E0%A6%95%E0%A6%BE%E0%A6%AA-%E0%A6%AC%E0%A6%BE%E0%A6%82%E0%A6%B2%E0%A6%BE%E0%A6%A6%E0%A7%87%E0%A6%B6%E0%A7%87%E0%A6%B0-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%AE%E0%A6%BE%E0%A6%A3-%E0%A6%95%E0%A6%B0%E0%A6%BE%E0%A6%B0-%E0%A6%AC%E0%A6%B2%E0%A6%B2%E0%A7%87%E0%A6%A8-%E0%A6%B8%E0%A6%BE%E0%A6%95%E0%A6%BF%E0%A6%AC\" target=\"_blank\">মুল লেখা</a></span></p>', 'upload/post/03b73ab050.jpg', 'Araf Hasan', 'World Cup Cricket 2019', '2019-06-03 08:39:38', 'https://www.youtube.com/embed/pbWSX8fiPcA', 6),
(4, 7, ' আমাদের ভাগ্য খারাপ', '<p class=\"TEXT\">বৃষ্টির ওপর কারও নিয়ন্ত্রণ নেই। কালকের ম্যাচটা হলে বাংলাদেশের জন্য খুবই ভালো হতো। আমার কাছে মনে হয় আমাদের কাজটা একটু কঠিন হয়ে গেল। আমাদের ভাগ্যটা খারাপ বলতেই হবে। আবার এসব ম্যাচ খেলা একটু কঠিন হয়। ইংলিশ কন্ডিশন, একটু পরপর বিরতি দিয়ে খেলতে হবে, একটু খেলা হলে আবার কিছুক্ষণ পর দেখা যাবে আবার বৃষ্টি।</p>\r\n<p class=\"TEXT\">শ্রীলঙ্কার বিপক্ষে ম্যাচ পরিত্যক্ত হওয়ায় অনেকেই ভাবছে বাংলাদেশের বিশ্বকাপের সেমিফাইনালে খেলার আশা শেষ। আমি কোনোভাবেই এমন কিছু ভাবছি না। সব ম্যাচের হিসাব&ndash;নিকাশ তো একবারে করে ফেলা যায় না। আর এখনই বেশি দূর চিন্তা করাও ঠিক হবে না। ম্যাচ বাই ম্যাচ চিন্তা করাই উচিত। আর সামনে আমাদের যতগুলো ম্যাচ আছে, সবই বড় ম্যাচ। বিশ্বকাপের মঞ্চে কোনো ছোট-বড় ম্যাচ নেই, সবই বড় ম্যাচ। আমাদের জন্য বিশ্বকাপের শুরু থেকে প্রতিটি ম্যাচই ডু অর ডাই অবস্থা। বলেকয়ে সব কটা ম্যাচ জিতে যাবে বাংলাদেশ, এমন অবস্থায় পৌঁছে যায়নি বাংলাদেশ। প্রতিটি ম্যাচেই সমান গুরুত্ব দিয়ে খেলতে হবে।</p>\r\n<div class=\"common_google_ads in_article_ad\">\r\n<div id=\"div-gpt-ad-1556186500787-0\" data-google-query-id=\"CKiWp5qs4-ICFVOVaAodvk8KMQ\">&nbsp;\r\n<p class=\"TEXT\">বাংলাদেশ দল পরের ম্যাচের আগে ছয় দিন সময় পাবে। ক্রিকেটাররা যথেষ্ট সময় পাবে বিশ্রাম নেওয়ার। ক্রিকেট থেকে দূরে কিছু সময় কাটিয়ে ঝরঝরে মানসিকতা নিয়ে ফিরতে পারবে। এমন লম্বা টুর্নামেন্টে মাঝেমধ্যে ক্লান্তি ধরে যায়। ম্যাচের মাঝে বিরতি থাকলে আবার চাঙা হয়ে ফেরার সুযোগ থাকে।</p>\r\n<p class=\"TEXT\">সাকিবের চোটের খবর পেলাম। পরের ম্যাচের আগে সময় পাওয়ায় সুবিধাই হলো বাংলাদেশ টিম ম্যানেজমেন্টের। সাকিবের ফিটনেস নিয়ে শঙ্কা থাকলে তত দিনে সুস্থ হয়ে ওঠার কথা।</p>\r\n<p class=\"TEXT\">এবারের বিশ্বকাপে মাশরাফির পারফরম্যান্স নিয়ে অনেক কথা হচ্ছে। মাশরাফির নিজেকে প্রমাণ করার কিছু নেই। দলের জন্য মাশরাফি বোঝা হয়ে গেছে, এমন ভাবা উচিত হবে না। একজন ক্রিকেটারের এমন হতেই পারে। চার বছর ধরে প্রতিটা ম্যাচে অবদান রেখে আসছে মাশরাফি। এখন বয়স হয়ে গেছে, ফিটনেসে সমস্যা, তাই প্রতি ম্যাচ ভালো খেলতে হবে? এটা তো কারও পক্ষেই সম্ভব না। উইকেট পাওয়াটা ভাগ্যের ব্যাপার। হতে পারে একটু খারাপ সময় যাচ্ছে। খারাপ সময় বলতে, উইকেটটা পাচ্ছে না। এমন কি একজন ক্রিকেটারের জীবনে হতে পারে না? বয়স হয়েছে বিধায় প্রতি ম্যাচে ভালো করতে হবে, এমন যুক্তি আমার কাছে গ্রহণযোগ্য না। অন্য দলেও তো সবাই তো প্রতিদিন ভালো করছে না।<span>মাশরাফির অবদান পারফরম্যান্সে বিচার করলে চলবে না। আমরা হয়তো চোখে দেখি না, দলের প্রত্যেকের সঙ্গে ওর সম্পর্ক, সেটা অতুলনীয়। প্রত্যেক ক্রিকেটারের জন্য মাশরাফির গুরুত্ব অপরিসীম।</span></p>\r\n</div>\r\n</div>', 'upload/post/a2fea700a2.jpg', 'Araf Hasan', 'World Cup 2019', '2019-06-12 06:56:49', 'None', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `link` varchar(512) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`, `link`) VALUES
(1, 'চ্যাম্পিয়নের মতোই খেলেছে বাংলাদেশ', 'upload/slider/f42c5e3470.jpg', 'http://sparkaraf.000webhostapp.com/post.php?id=1'),
(2, '‘আমরা বলার চেষ্টা করি, বাইরের লোকেরা পাত্তা দেয় না!’', 'upload/slider/ce53f1f7c8.jpg', 'http://sparkaraf.000webhostapp.com/post.php?id=2'),
(3, 'এ বিশ্বকাপ বাংলাদেশের প্রমাণ করার, বললেন সাকিব', 'upload/slider/30235d91c4.jpg', 'http://sparkaraf.000webhostapp.com/post.php?id=3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `ln`, `gp`) VALUES
(1, 'http://facebook.com', 'http://twiter.com', 'http://linkedin.com', 'http://googleplus.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(6, 'Araf Hasan', 'araf', 'ee91594ec8fc096d284f58d7700cabc2', 'hasan.araf15@gmail.com', '<p>Hello, I am Md. Araf Hasan from Bangladesh. I am the Admin of this blog site.. And I am building this blog site..<img title=\"Cool\" src=\"js/tiny-mce/plugins/emotions/img/smiley-cool.gif\" alt=\"Cool\" border=\"0\" /></p>', 0),
(22, 'Ragib Chowdhury protik', 'Protik', '202cb962ac59075b964b07152d234b70', 'protikpb@gmail.com', '<p>Hello I am protik. I am a student of RpMC.</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `image`) VALUES
(1, 'Awaz', 'Raise up your voice', 'upload/logo/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
