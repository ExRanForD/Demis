<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'cf97653_contact');
define('DB_PASSWORD', 'admin123');
define('DB_NAME', 'cf97653_contact');

// Создание подключения к БД
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Проверка подключения
if ($conn->connect_error) {
    die('Ошибка подключения к базе данных: ' . $conn->connect_error);
}

// Получение данных из таблицы news
$sql = "SELECT title, content, publication_date FROM news ORDER BY publication_date ASC LIMIT 5";
$result = $conn->query($sql);

$newsArray = []; // Инициализация массива

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $newsArray[] = $row;
    }
} else {
    echo 'Нет доступных новостей.';
}

$conn->close();

