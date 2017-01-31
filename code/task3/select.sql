SET NAMES utf8;

SELECT
  b.`name` `book_name`,
  COUNT(ba.`book_id`) `count_authors`
FROM `books_authors` ba
  INNER JOIN `books` b ON b.`id` = ba.`book_id`
GROUP BY ba.`book_id`
HAVING `count_authors` >= 3;