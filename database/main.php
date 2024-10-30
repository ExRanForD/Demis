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

// Извлечение последних 3 новостей
$sql = "SELECT title, content, publication_date FROM news ORDER BY publication_date DESC LIMIT 3";
$result = $conn->query($sql);

$newsArray = []; // Инициализация массива для хранения новостей

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $newsArray[] = $row; // Добавление каждой строки результата в массив
    }
} else {
    echo 'Нет доступных новостей.';
}

$conn->close();

// Функция для получения первого предложения
function getFirstSentence($text) {
    $sentences = explode('.', $text);
    return $sentences[0] . '.';
}
?>