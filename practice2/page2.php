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
                    if (array_key_exists('postMethod', $_POST)) {
                        $_SESSION['page2Answer'] = $_POST['postMethod'];
                    }

                    ?>" method="POST" onchange="submit()">
        The POST Method:
        <div>
            <label for="dataFromSpecifiedResource">is used to request data from a specified resource.</label>
            <input type="radio" name="postMethod" id="dataFromSpecifiedResource" value="dataFromSpecifiedResource" <?php
                                                                                                                    if (array_key_exists('page2Answer', $_SESSION)) {
                                                                                                                        if ($_SESSION['page2Answer'] == 'dataFromSpecifiedResource') {
                                                                                                                            echo 'checked';
                                                                                                                        }
                                                                                                                    } ?>>
        </div>
        <div>
            <label for="toServredCreateUpdate">is used to send data to a server to create/update a resource.</label>
            <input type="radio" name="postMethod" id="toServredCreateUpdate" value="toServredCreateUpdate" <?php

                                                                                                            if (array_key_exists('page2Answer', $_SESSION)) {
                                                                                                                if ($_SESSION['page2Answer'] == 'toServredCreateUpdate') {
                                                                                                                    echo 'checked';
                                                                                                                }
                                                                                                            } ?>>

        </div>


    </form> <a href="page1.php">previous page</a>
    <form action=" pageResult.php" method="post">
        <input type="submit" value="Submit">


    </form>
</body>

</html>