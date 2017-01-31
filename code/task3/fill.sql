SET NAMES utf8;

INSERT INTO `authors` (`id`, `name`) VALUES
  (1, 'С. Макконнелл'),
  (2, 'Уильям Апдайк'),
  (3, 'Дон Робертс'),
  (4, 'Джон Брант'),
  (5, 'Кент Бек'),
  (6, 'Мартин Фаулер');

INSERT INTO `books` (`id`, `name`) VALUES
  (1, 'Совершенный код'),
  (2, 'Рефакторинг: улучшение существующего кода'),
  (3, 'UML. Основы, 3-е издание');

INSERT INTO `books_authors` (`id`, `book_id`, `author_id`) VALUES
  (1, 1, 1),
  (2, 2, 2),
  (3, 2, 3),
  (4, 2, 4),
  (5, 2, 5),
  (6, 2, 6),
  (7, 3, 6);
