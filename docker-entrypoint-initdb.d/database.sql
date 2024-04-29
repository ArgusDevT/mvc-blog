-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 30 2024 г., 01:35
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(228) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `pages`) VALUES
(1, 'Марат', 'Отличная статья, я так думаю', 7),
(2, 'Марат', 'Отличная статья, я так думаю', 7),
(3, 'Марат', 'Отличная статья, я так думаю', 7),
(6, 'Эван', 'Согласен с маратом, это просто лучшее', 7),
(7, 'Эван', 'Согласен с маратом, это просто лучшее', 7),
(8, 'Эван', 'Согласен с маратом, это просто лучшее', 7),
(9, 'Мастри', 'Соглфыплфылплфыпл фыэп лфэыпфыпэ', 7),
(10, 'Test12 5', 'Test 12512 512 512 5125  1251 251 2512 51 25', 7),
(11, 'Marat Gasgasg Grood', 'Marat Gasgasg GroodMarat Gasgasg GroodMarat Gasgasg GroodMarat Gasgasg GroodMarat Gasgasg GroodMarat Gasgasg GroodMarat Gasgasg GroodMarat Gasgasg GroodMarat Gasgasg GroodMarat Gasgasg GroodMarat Ga', 7),
(12, 'Marat Gasgasg Grood', 'http://xinoro-blog/api/v1?page=1&method=getNews&crsf_token=4b6fa39bb13cc37a8d8cec4cbeadf44f06037f60038522b8417838c5a944b197', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `body`, `date`) VALUES
(1, 'Титул 1', 'Чендж', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pharetra convallis posuere morbi leo urna molestie at elementum. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Sit amet est placerat in egestas. Senectus et netus et malesuada fames ac turpis egestas sed. Purus ut faucibus pulvinar elementum. Bibendum ut tristique et egestas quis ipsum suspendisse ultrices. Ultrices mi tempus imperdiet nulla. Nunc mattis enim ut tellus. Elit duis tristique sollicitudin nibh sit amet commodo. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec. Amet consectetur adipiscing elit duis.\n\nConvallis a cras semper auctor neque vitae. Diam vulputate ut pharetra sit. Nisi est sit amet facilisis magna etiam tempor orci eu. Nibh mauris cursus mattis molestie. Tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Lacus laoreet non curabitur gravida arcu. A cras semper auctor neque vitae tempus quam pellentesque nec. Tincidunt eget nullam non nisi. Viverra nam libero justo laoreet sit. Augue mauris augue neque gravida in fermentum et.', '2024-04-25 17:53:21'),
(2, 'Титул 2', 'Дескриптион 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Urna nunc id cursus metus aliquam. Cursus mattis molestie a iaculis at. Ultricies mi eget mauris pharetra et ultrices. Diam donec adipiscing tristique risus nec feugiat in. Ac turpis egestas maecenas pharetra. Amet consectetur adipiscing elit pellentesque habitant. Neque vitae tempus quam pellentesque nec nam. In fermentum et sollicitudin ac orci phasellus egestas. Aliquet nec ullamcorper sit amet risus nullam eget felis. Eget gravida cum sociis natoque penatibus et magnis.\r\n\r\nSollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque. Cras adipiscing enim eu turpis egestas pretium aenean pharetra. Blandit turpis cursus in hac. Odio facilisis mauris sit amet massa. Morbi enim nunc faucibus a pellentesque sit amet porttitor. Sapien pellentesque habitant morbi tristique. Est pellentesque elit ullamcorper dignissim cras tincidunt. A scelerisque purus semper eget duis. Hendrerit dolor magna eget est lorem. In metus vulputate eu scelerisque felis. Viverra justo nec ultrices dui sapien eget mi proin. Ut tortor pretium viverra suspendisse potenti nullam ac. Nunc vel risus commodo viverra maecenas accumsan lacus vel. Nisi est sit amet facilisis magna etiam tempor orci eu. Orci ac auctor augue mauris augue. Eleifend mi in nulla posuere sollicitudin aliquam ultrices. Imperdiet nulla malesuada pellentesque elit. Vitae elementum curabitur vitae nunc. Sodales ut etiam sit amet nisl purus in. Id venenatis a condimentum vitae.', '2024-04-25 17:53:21'),
(3, 'Титул 3', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pharetra convallis posuere morbi leo urna molestie at elementum. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Sit amet est placerat in egestas. Senectus et netus et malesuada fames ac turpis egestas sed. Purus ut faucibus pulvinar elementum. Bibendum ut tristique et egestas quis ipsum suspendisse ultrices. Ultrices mi tempus imperdiet nulla. Nunc mattis enim ut tellus. Elit duis tristique sollicitudin nibh sit amet commodo. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec. Amet consectetur adipiscing elit duis.\r\n\r\nConvallis a cras semper auctor neque vitae. Diam vulputate ut pharetra sit. Nisi est sit amet facilisis magna etiam tempor orci eu. Nibh mauris cursus mattis molestie. Tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Lacus laoreet non curabitur gravida arcu. A cras semper auctor neque vitae tempus quam pellentesque nec. Tincidunt eget nullam non nisi. Viverra nam libero justo laoreet sit. Augue mauris augue neque gravida in fermentum et.', '2024-04-25 17:53:21'),
(4, 'Титул 4', 'Дескриптион 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Urna nunc id cursus metus aliquam. Cursus mattis molestie a iaculis at. Ultricies mi eget mauris pharetra et ultrices. Diam donec adipiscing tristique risus nec feugiat in. Ac turpis egestas maecenas pharetra. Amet consectetur adipiscing elit pellentesque habitant. Neque vitae tempus quam pellentesque nec nam. In fermentum et sollicitudin ac orci phasellus egestas. Aliquet nec ullamcorper sit amet risus nullam eget felis. Eget gravida cum sociis natoque penatibus et magnis.\r\n\r\nSollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque. Cras adipiscing enim eu turpis egestas pretium aenean pharetra. Blandit turpis cursus in hac. Odio facilisis mauris sit amet massa. Morbi enim nunc faucibus a pellentesque sit amet porttitor. Sapien pellentesque habitant morbi tristique. Est pellentesque elit ullamcorper dignissim cras tincidunt. A scelerisque purus semper eget duis. Hendrerit dolor magna eget est lorem. In metus vulputate eu scelerisque felis. Viverra justo nec ultrices dui sapien eget mi proin. Ut tortor pretium viverra suspendisse potenti nullam ac. Nunc vel risus commodo viverra maecenas accumsan lacus vel. Nisi est sit amet facilisis magna etiam tempor orci eu. Orci ac auctor augue mauris augue. Eleifend mi in nulla posuere sollicitudin aliquam ultrices. Imperdiet nulla malesuada pellentesque elit. Vitae elementum curabitur vitae nunc. Sodales ut etiam sit amet nisl purus in. Id venenatis a condimentum vitae.', '2024-04-25 17:53:21'),
(5, 'Титул 5', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pharetra convallis posuere morbi leo urna molestie at elementum. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Sit amet est placerat in egestas. Senectus et netus et malesuada fames ac turpis egestas sed. Purus ut faucibus pulvinar elementum. Bibendum ut tristique et egestas quis ipsum suspendisse ultrices. Ultrices mi tempus imperdiet nulla. Nunc mattis enim ut tellus. Elit duis tristique sollicitudin nibh sit amet commodo. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec. Amet consectetur adipiscing elit duis.\r\n\r\nConvallis a cras semper auctor neque vitae. Diam vulputate ut pharetra sit. Nisi est sit amet facilisis magna etiam tempor orci eu. Nibh mauris cursus mattis molestie. Tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Lacus laoreet non curabitur gravida arcu. A cras semper auctor neque vitae tempus quam pellentesque nec. Tincidunt eget nullam non nisi. Viverra nam libero justo laoreet sit. Augue mauris augue neque gravida in fermentum et.', '2024-04-25 17:53:21'),
(6, 'Титул 6', 'Дескриптион 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Urna nunc id cursus metus aliquam. Cursus mattis molestie a iaculis at. Ultricies mi eget mauris pharetra et ultrices. Diam donec adipiscing tristique risus nec feugiat in. Ac turpis egestas maecenas pharetra. Amet consectetur adipiscing elit pellentesque habitant. Neque vitae tempus quam pellentesque nec nam. In fermentum et sollicitudin ac orci phasellus egestas. Aliquet nec ullamcorper sit amet risus nullam eget felis. Eget gravida cum sociis natoque penatibus et magnis.\r\n\r\nSollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque. Cras adipiscing enim eu turpis egestas pretium aenean pharetra. Blandit turpis cursus in hac. Odio facilisis mauris sit amet massa. Morbi enim nunc faucibus a pellentesque sit amet porttitor. Sapien pellentesque habitant morbi tristique. Est pellentesque elit ullamcorper dignissim cras tincidunt. A scelerisque purus semper eget duis. Hendrerit dolor magna eget est lorem. In metus vulputate eu scelerisque felis. Viverra justo nec ultrices dui sapien eget mi proin. Ut tortor pretium viverra suspendisse potenti nullam ac. Nunc vel risus commodo viverra maecenas accumsan lacus vel. Nisi est sit amet facilisis magna etiam tempor orci eu. Orci ac auctor augue mauris augue. Eleifend mi in nulla posuere sollicitudin aliquam ultrices. Imperdiet nulla malesuada pellentesque elit. Vitae elementum curabitur vitae nunc. Sodales ut etiam sit amet nisl purus in. Id venenatis a condimentum vitae.', '2024-04-25 17:53:21'),
(7, 'Титул 7', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pharetra convallis posuere morbi leo urna molestie at elementum. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Sit amet est placerat in egestas. Senectus et netus et malesuada fames ac turpis egestas sed. Purus ut faucibus pulvinar elementum. Bibendum ut tristique et egestas quis ipsum suspendisse ultrices. Ultrices mi tempus imperdiet nulla. Nunc mattis enim ut tellus. Elit duis tristique sollicitudin nibh sit amet commodo. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec. Amet consectetur adipiscing elit duis.\r\n\r\nConvallis a cras semper auctor neque vitae. Diam vulputate ut pharetra sit. Nisi est sit amet facilisis magna etiam tempor orci eu. Nibh mauris cursus mattis molestie. Tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Lacus laoreet non curabitur gravida arcu. A cras semper auctor neque vitae tempus quam pellentesque nec. Tincidunt eget nullam non nisi. Viverra nam libero justo laoreet sit. Augue mauris augue neque gravida in fermentum et.', '2024-04-25 17:53:21'),
(8, 'Титул 8', 'Дескриптион 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Urna nunc id cursus metus aliquam. Cursus mattis molestie a iaculis at. Ultricies mi eget mauris pharetra et ultrices. Diam donec adipiscing tristique risus nec feugiat in. Ac turpis egestas maecenas pharetra. Amet consectetur adipiscing elit pellentesque habitant. Neque vitae tempus quam pellentesque nec nam. In fermentum et sollicitudin ac orci phasellus egestas. Aliquet nec ullamcorper sit amet risus nullam eget felis. Eget gravida cum sociis natoque penatibus et magnis.\r\n\r\nSollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque. Cras adipiscing enim eu turpis egestas pretium aenean pharetra. Blandit turpis cursus in hac. Odio facilisis mauris sit amet massa. Morbi enim nunc faucibus a pellentesque sit amet porttitor. Sapien pellentesque habitant morbi tristique. Est pellentesque elit ullamcorper dignissim cras tincidunt. A scelerisque purus semper eget duis. Hendrerit dolor magna eget est lorem. In metus vulputate eu scelerisque felis. Viverra justo nec ultrices dui sapien eget mi proin. Ut tortor pretium viverra suspendisse potenti nullam ac. Nunc vel risus commodo viverra maecenas accumsan lacus vel. Nisi est sit amet facilisis magna etiam tempor orci eu. Orci ac auctor augue mauris augue. Eleifend mi in nulla posuere sollicitudin aliquam ultrices. Imperdiet nulla malesuada pellentesque elit. Vitae elementum curabitur vitae nunc. Sodales ut etiam sit amet nisl purus in. Id venenatis a condimentum vitae.', '2024-04-25 17:53:21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages` (`pages`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`pages`) REFERENCES `pages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
