<?php
$db = new PDO ('mysql:dbname=sites_info;host=127.0.0.1', 'root', 'root');
$stmt = $db->prepare('SELECT * FROM sites ORDER BY domain ASC');
$stmt->execute();
$sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
require_once ('form.html');
