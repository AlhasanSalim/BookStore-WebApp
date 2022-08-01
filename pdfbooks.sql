-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 07:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdfbooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `adminPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminName`, `adminEmail`, `adminPassword`) VALUES
(1, 'Alhasan', 'alhasan1997@hotmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_title` varchar(200) NOT NULL,
  `author_name` varchar(200) NOT NULL,
  `book_categories` varchar(100) NOT NULL,
  `book_cover` varchar(200) NOT NULL,
  `book` varchar(200) NOT NULL,
  `book_content` varchar(10000) NOT NULL,
  `book_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `author_name`, `book_categories`, `book_cover`, `book`, `book_content`, `book_date`) VALUES
(12, 'المحاسن و الأضداد', 'الجاحظ المعتزلي', 'كتب الأدب العربي', '209_6_المحاسن والأضداد.jpg', '977_المحاسن والأضداد.pdf', 'بأسلوبِهِ المُتميزِ بالتراكيبِ اللغويةِ الثَّريةِ المُعقدةِ والسهلةِ الفَهمِ في آنٍ واحد، يَجمعُ «الجاحظ» في هذا الكتابِ فضائلَ الأشياءِ وعُيوبَها، فيَذكرُ العاداتِ الاجتماعيةَ والصِّفاتِ البشريَّة، كالذَّكاءِ والدَّهاءِ والبلاغةِ والحُمق، والمَشاعرَ كحُبِّ الوطن، وغيرَها منَ الصِّفاتِ والأفعالِ والقرائنِ التي من المُمكنِ أن تَحمِلَ الخيرَ والشرَّ في آنٍ واحد. كلُّ ذلكَ يَجِدُهُ القارئُ بأسلوبِ الحَكيِ القَصصيِّ الذي تَفرَّد بهِ «الجاحظ»، ووضَعَ بطريقةِ تقسيمِه له أسلوبًا جديدًا اتَّبعَه الأدباءُ بعد ذلك؛ فهو بذلك كتابٌ يَحتوِي على إبداعٍ لُغويٍّ مُتميِّز، ونوادِرَ تاريخية، وطرائفَ خيالية، ومواقفَ اجتماعيةٍ عُرِضَت بأفضَلِ ما يكون، عن العصرِ الذي عاشَ فيهِ العبقرِيُّ العربِيُّ «الجاحظ».', '2022-06-01'),
(15, 'التربيع و التّدوير', 'الجاحظ المعتزلي', 'كتب الأدب العربي', '938_180_التربيع والتدوير.jpg', '642_التربيع والتدوير.pdf', 'يَهجو «الجاحظ» غريمَه «أحمد بن عبد الوهاب» في رسالةِ «التربيع والتدوير» بأسلوبٍ ساخرٍ ومُمتع، راسمًا بلُغتِه المُتميِّزةِ صورةً كوميديةً له. يستعينُ «الجاحظ» بكافَّةِ ما يُمكِنُ مِنَ الصِّيَغِ البلاغيةِ للنَّيلِ من عدوِّه، ولا يتورَّعُ عن ذِكرِ كلِّ الحُججِ التي تنتقصُ مِنه وتُقنعُ القارئَ بأنَّ كلَّ ما يَذكُرُه مِن مُبالَغاتٍ في ذمِّهِ هيَ حقيقةٌ واقِعة؛ دونَ أن يتخلَّى عن رشاقةِ الكلمةِ وجمالِ الأسلوب. وقد أبدَعَ «الجاحظ» كعادتِهِ في التصويرِ حتَّى وصَلَ بالقارئِ إلى تخيُّلِ شكلِ غريمِه وكأنَّهُ أمامَه، فاعتمَدَ على إهانتِه بوصْفِه الحسيِّ القَبيح، وبوصفِ أخلاقِهِ بأشنَعِ النُّعوت، مُستشهِدًا بأبياتِ الشِّعرِ وآياتٍ مِنَ القرآنِ الكريم؛ كلُّ ذلكَ بطريقةٍ غايةٍ في الهزليةِ جعَلَتْ من الكتابِ رسْمًا كاريكاتوريًّا طريفًا يُوضِّحُ بلاغةَ «الجاحظ» وموهبتَه، ويُمتِعُ القارئَ وهو يَنتقلُ معَهُ إلى العصرِ الذهبيِّ الذي شهِدَ إبداعاتِ العربِ الفريدةِ في فنونِ الكلامِ والتلاعُبِ باللُّغة.\r\n\r\n', '2022-06-02'),
(16, 'التاريخ الإسلامي', 'محمود شاكر', 'كتب تاريخ', '559_التاريخ الإسلامي.jpg', '415_التاريخ الإسلامي - محمود شاكر - قبل البعثه.pdf', 'يقع الكتاب في 16 مجلداً\r\nنبذة النيل والفرات:\r\nإن للتاريخ الإسلامي سمته الخاصة والذي عكف الكاتب في هذا المؤلف المكون من اثني وعشرين جزءاً على أبرزها من خلال دراسة للتاريخ الإسلامي والتي جاءت على النحو التالي: 1-قبل البعثة، 2-السيرة، 3-الخلفاء الراشدون، 4-الحكومة الإسلامية، 5-العهد الأموي، 6-العهد العباسي، 7-عصر المماليك، 8-الدولة العثمانية، 9-العصر الحديث. وقد نهج المؤلف منهجاً علمياً في دراسته تلك حيث لم يتقيد بالروايات التاريخية المتشعبة التي وردت في بطون أمهات الكتب، حيث أتت في بعض الأحيان متناقضة أو ذات أهداف غير معلنة، إنما عمد إلى تنقيح هذه الروايات فقام على تحقيقها وتدقيقها، وتطبيق منهج علماء الحديث على الرواة، حيث سرد كل ما طبق على الروايات من هذا المنهج بأسلوب علمي توخياً للدقة والأمانة التاريخية.\r\n', '2022-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(200) NOT NULL,
  `categoryDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `categoryDate`) VALUES
(1, 'كتب آثار', '2022-05-30'),
(4, 'كتب عقيدة', '2022-05-30'),
(8, 'كتب تراجم', '2022-05-31'),
(9, 'كتب الأدب العربي', '2022-05-31'),
(10, 'كتب لغة عربية ', '2022-05-31'),
(12, 'كتب علوم سياسة', '2022-05-31'),
(13, 'كتب تاريخ', '2022-05-31'),
(14, 'كتب علوم اقتصاد', '2022-05-31'),
(15, 'كتب علوم حاسب', '2022-05-31'),
(16, 'كتب حديث', '2022-05-31'),
(18, 'كتب ابن القيّم ', '2022-05-31'),
(19, 'كتب برمجة الويب', '2022-05-31'),
(20, 'كتب برمجة تطبيقات الجوال', '2022-05-31'),
(21, 'كتب في الإختراق', '2022-05-31'),
(22, 'كتب ابن تيميّة', '2022-06-01'),
(23, 'كتب محمّد بن عبد الوهّاب', '2022-06-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
