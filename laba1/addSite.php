<?php
//Для того, щоб захистити сайт від SQL-ін'єкцій я виуористала:
//1. метод передачі даних POST, а не GET
//2. привела отримані дані до формату "integer"
//3. використала функцію htmlspecialchars(), яка перетворює "<" та ">" на спеціальні символи
//4. вуикористовувала PDO
$rating = settype($_POST['site_rating'], 'integer');
$site_name = htmlspecialchars($_POST['site_name']);
$site_themes = htmlspecialchars($_POST['site_themes']);
$site_address = htmlspecialchars($_POST['site_address']);
$site_domain = htmlspecialchars($_POST['site_domain']);
$site_author = htmlspecialchars($_POST['site_author']);
$count = 0;
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST["site_address"])) {
    $massage[$count] = "Wrong format of URL";
    $count++;
}
if (empty($site_name) ||
    empty($site_themes) ||
    empty($site_address) ||
    empty($site_domain) ||
    empty($site_author)) {
    $massage[$count] = "All fields are required";
    $count++;
}
$domain = parse_url($_POST['site_address']);
if ($_POST['site_domain'] != $domain['host']) {
    $massage[$count] = "Domain does not match URL";
    $count++;
}
if ($count == 0) {

    try {
        $db = new PDO ('mysql:dbname=sites_info;host=127.0.0.1', 'root', 'root');
        $statement = $db->prepare('INSERT INTO sites (name, themes, address, domain, author, rating)
VALUE(:name, :themes, :address, :domain, :author, :rating )');
        $statement->bindParam(':name', $site_name);
        $statement->bindParam(':themes', $site_themes);
        $statement->bindParam(':address', $site_address);
        $statement->bindParam(':domain', $site_domain);
        $statement->bindParam(':author', $site_author);
        $statement->bindParam(':rating', $rating);
        $statement->execute();
        $id = $db->lastInsertId();
    } catch (PDOException $exception) {
    }

    if (!empty($id)) {
        $success = true;
    } else {
        $success = false;
    }

    echo json_encode(['success' => $success, 'massage' => []]);
} else {
    echo json_encode(['massage' => $massage]);
}