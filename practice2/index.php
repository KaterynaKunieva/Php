<html>

<body>
    <!--Практична робота №2
Завдання 1: Робота з формою
Створити веб-сторінку з формою на 7 полів для текстового введення (input, type text) і кнопкою відправки
(Input, type submit). Дані, надіслані формою приводяться до типу integer: використовуємо функцію intval ().
Далі з 7-ми введених в форму значень обчислюються:
• максимальне значення
• мінімальне значення
• середнє арифметичне значення.
Результати виводяться після відправки форми на цій же сторінці.
-->
    <form action="index.php">
        <input type="text" id="first" name="first" placeholder="input first number"><br>
        <input type="text" id="second" name="second" placeholder="input second number"><br>
        <input type="text" id="thirst" name="thirst" placeholder="input thirst number"><br>
        <input type="text" id="fourth" name="fourth" placeholder="input fourth number"><br>
        <input type="text" id="fivth" name="fivth" placeholder="input fivth number"><br>
        <input type="text" id="sixth" name="sixth" placeholder="input sixth number"><br>
        <input type="text" id="seventh" name="seventh" placeholder="input seventh number"><br>
        <input type="submit">
    </form>
    <?php
        $array = array_map('intval', $_GET);
        print '<br>';
        print 'min: ' . min($array);
        print '<br>';
        print 'max: ' . max($array);
        print '<br>';
        print 'avg: ' . array_sum($array) / count($array);
        print '<br>';
    ?>
</body>

</html>