<html>
<head>
<title>Запись в БД через форму на php</title>
</head>
<body>
<form method="POST" action="">
    <input name="model" type="text" placeholder="Model"/>
    <p>
    <input name="name" type="text" placeholder="Name"/>
    <p>
    <input name="year" type="date" placeholder="Year"/>
    <p>
    <input name="type" type="text" placeholder="Type Of Car">
    <p>
    <input name="power" type="number" placeholder="Car power">
    <p>
    <input name="color" type="text" placeholder="Color">
    <p>
    <input name="price" type="number" placeholder="Price">
    <p>
    <input type="submit" value="Отправить"/>
</form>
</body>
</html>

<?php

if(isset($_POST['model']) && isset($_POST['name']) && isset($_POST['year']) && isset($_POST['type']) && isset($_POST['power']) && isset($_POST['color']) && isset($_POST['price'])){

$model=$_POST['model'];
$name=$_POST['name'];
$year=$_POST['year'];
$type=$_POST['type'];
$power=$_POST['power'];
$color=$_POST['color'];
$price=$_POST['price'];

$db_host = "localhost"; 
$db_user = "root"; // Логин БД
//$db_password = "123"; // Пароль БД
$db_base = 'mydatabase'; // Имя БД
$db_table = "cars";

try {
    // Подключение к базе данных
    $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user);
    // Устанавливаем корректную кодировку
    $db->exec("set names utf8");

    $data = array( 'model'=> $model, 'name' => $name, 'year' => $year, 'type'=>$type, 'power'=>$power, 'color'=>$color, 'price'=>$price); 
    // Подготавливаем SQL-запрос
    $query = $db->prepare("INSERT INTO $db_table ( model, name, year, type, power, color, price ) values (:model, :name, :year, :type, :power, :color, :price)");
    // Выполняем запрос с данными
    $query->execute($data);

    $result = true;


} catch (PDOException $e) {
    // Если есть ошибка соединения, выводим её
    print "Ошибка!: " . $e->getMessage() . "<br/>";
}

if ($result) {
    echo "Успех. Информация занесена в базу данных";
}
}
?>

<table>
	<thead>
		<tr>
			<th>Модель</th>
			<th>Марка</th>
			<th>Рік випуску</th>
			<th>Тип авто</th>
			<th>Потужність</th>
            <th>Коліп</th>
			<th>Ціна</th>
		</tr>
	</thead>
	<tbody>

<?php
try{

    $db_host = "localhost"; 
    $db_user = "root"; // Логин БД
    //$db_password = "123"; // Пароль БД
    $db_base = 'mydatabase'; // Имя БД
    $db_table = "cars";


    $dbh = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user);
    // Устанавливаем корректную кодировку
    $dbh->exec("set names utf8");
    
    $sth = $dbh->prepare("SELECT * FROM cars");
    $sth->execute();

    $list = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Если есть ошибка соединения, выводим её
    print "Ошибка!: " . $e->getMessage() . "<br/>";
}

?>
    <?php foreach ($list as $row): ?>
		<tr>
			<td><?php echo $row['model']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['year']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['power']; ?></td>
            <td><?php echo $row['color']; ?></td>
			<td><?php echo $row['price']; ?> EUR</td>
		</tr>
    <?php endforeach; ?>   

    </tbody>
</table>

