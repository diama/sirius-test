CREATE TABLE IF NOT EXISTS `books` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
  PRIMARY KEY (`id`)
) COLLATE='utf8_unicode_ci' ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `authors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(25) NOT NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
  PRIMARY KEY (`id`)
) COLLATE='utf8_unicode_ci' ENGINE=InnoDB;

CREATE TABLE `books_authors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `book_id` INT(11) NOT NULL,
  author_id INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `book_author_ids` (`book_id`, author_id)
) COLLATE='utf8_unicode_ci' ENGINE=InnoDB;