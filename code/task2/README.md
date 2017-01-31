# Задание 2.
Создать скрипт, который в папке /datafiles найдет все файлы, имена которых состоят из цифр и букв латинского алфавита, имеют расширение ixt и выведет на экран имена этих файлов, упорядоченных по имени. Задание должно быть выполнено с использованием регулярных выражений. Весь код должен быть прокомментирован в стиле PHPDocumentor'а.

## Запуск приложения

    make task2
    
или

    docker exec -it php7 php code/task2/src/index.php
    
## Запуск тестов
    make task2-test
    
или

    docker exec -i php7 phpunit --bootstrap code/task2/vendor/autoload.php code/task2/tests
    