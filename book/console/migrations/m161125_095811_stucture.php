<?php

use yii\db\Migration;

class m161125_095811_stucture extends Migration
{
    public function up()

    { $hash='$2y$13$CYsH2/tL5mLsdfkgnXIpBeF8ww/qsq39gruLmjfCbXhCuA8sao1/i';
		
$this->execute("

--
-- Структура таблицы `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `author` text NOT NULL,
  `publishing_house` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `publishing_house`, `status`) VALUES
(2, 'Ловец снов', 'Стивен Кинг', 'Амфора', 1),
(4, '10 негритят', 'Агата Кристи', 'Ромашка', 1),
(8, 'Мастер и Маргарита', 'Булгаков', 'Ромашка', 0),
(9, 'Кэрри', 'Стивен Кинг', 'Амфора', 1),
(10, 'Над пропостью во ржи', 'Селенджер', 'Ромашка', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Client`
--

CREATE TABLE IF NOT EXISTS `Client` (
  `id` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `patronymic` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Client`
--

INSERT INTO `Client` (`id`, `address`, `first_name`, `last_name`, `patronymic`, `status`) VALUES
(1, 'Фрунзе 10', 'Попов', 'Константин', 'Игоревич', 1),
(9, 'Каменская 54 ', 'Печкин', 'Иван', 'Иванович', 1),
(12, 'Каменская 51', 'Трошина', 'Алена', 'Давидовна', 1),
(13, 'Крылова 29 -6', 'Новикова', 'Ирина', 'Андреевна', 1),
(14, 'Солнечная 1', 'Попов', 'Константин ', 'Игоревич', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `issuing_books`
--

CREATE TABLE IF NOT EXISTS `issuing_books` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `date_issuing` date NOT NULL,
  `return_date` date NOT NULL,
  `the_actual_date_of_return` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `issuing_books`
--

INSERT INTO `issuing_books` (`id`, `id_client`, `id_book`, `date_issuing`, `return_date`, `the_actual_date_of_return`) VALUES
(20, 1, 2, '2016-12-17', '2016-12-24', '2016-12-24'),
(21, 12, 8, '2016-12-17', '2016-12-24', NULL);

-- --------------------------------------------------------

--
-- 


--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'April', 'QwUMBDOXpqNzRhztqFmHlnBYE0q48NMM', '$hash', NULL, 'aprillinnova@gmail.com', 10, 1481092655, 1481092655);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `issuing_books`
--
ALTER TABLE `issuing_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_book` (`id_book`);

--

--


--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `Client`
--
ALTER TABLE `Client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `issuing_books`
--
ALTER TABLE `issuing_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа таблицы `issuing_books`
--
ALTER TABLE `issuing_books`
  ADD CONSTRAINT `issuing_books_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `Client` (`id`),
  ADD CONSTRAINT `issuing_books_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id`);

");
    }

    public function down()
    {
        echo "m161125_095811_stucture cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
