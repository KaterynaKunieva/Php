<?php
// Завдання 3: Багатосторінковий тест
// Уявімо собі сайт з проходженням тесту: на кожній сторінці знаходиться питання, варіанти відповіді і кнопка "Далі" . 
//Тест містить деяку кількість сторінок (беремо 2). На останній, 3-й сторінці користувач повинен отримати результат тесту. 
// Завдання - створити подібний тест. 
// Підказки для студентів: 
// • Для створення сторінок питань використовуйте форми (з елементами type="radio" ), які будуть відправляти результати на наступну сторінку з питанням або результатами. 
// • Відповіді користувача на питання на попередніх сторінках можна (і потрібно) зберігати в сесії php 
// • Для розрахунку результатів тесту порівняйте відповіді користувача (зберігаються в сесії php) із заздалегідь визначеними правильними
//відповідями (можуть зберігатися, наприклад, в змінних). 
// • Після закінчення тесту сесію слід очистити
session_start();
?>
<html>

<body>
    <form action="<?php
                    if (array_key_exists('language', $_POST)) {
                        $_SESSION['page1Answer'] = $_POST['language'];
                    }

                    ?>" method="POST" onchange="submit()">
        php is:
        <div>
            <label for="programingLanguage">programing language</label>
            <input type="radio" name="language" id="programingLanguage" value="programingLanguage" <?php
                                                                                                    if (array_key_exists('page1Answer', $_SESSION)) {
                                                                                                        if ($_SESSION['page1Answer'] == 'programingLanguage') {
                                                                                                            echo 'checked';
                                                                                                        }
                                                                                                    } ?>>
        </div>
        <div>
            <label for="privateHouseParty">private house party</label>
            <input type="radio" name="language" id="privateHouseParty" value="privateHouseParty" <?php

                                                                                                    if (array_key_exists('page1Answer', $_SESSION)) {
                                                                                                        if ($_SESSION['page1Answer'] == 'privateHouseParty') {
                                                                                                            echo 'checked';
                                                                                                        }
                                                                                                    } ?>>

        </div>
    </form>
    <a href="page2.php">next page</a>
</body>

</html>