# Задание 1.

Написать класс init, от которого нельзя сделать наследника, состоящий из 3 методов:
 
 + create() - доступен только для методов класса, создает таблицу test, содержащую 5 полей:
  
     * id целое, автоинкрементарное
     * script_name строковое, длиной 25 символов      
     * start_time timestamp с автозаполнением
     * sort_index целое (значения не превышают 3-х разрядов)
     * result один вариант из 'normal', 'illegal', 'failed', 'success'
 
  
 + fill() -  доступен только для методов класса, заполняет таблицу случайными данными
        
 + get() - доступен извне класса, выбирает из таблицы test, данные по критерию: result среди значений 'normal' и 'success'
                
В конструкторе выполняются методы create() и fill(). Весь код должен быть прокомментирован в стиле PHPDocumentor'а.

## Запуск приложения

    make task1
    
или

    docker exec -it php7 php code/task1/src/index.php
    
## Запуск тестов
    make task1-test
    
или

    docker exec -i php7 phpunit --bootstrap code/task1/vendor/autoload.php code/task1/tests
    