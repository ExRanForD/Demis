<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'cf97653_contact');
define('DB_PASSWORD', 'admin123');
define('DB_NAME', 'cf97653_contact');

// Создание подключения к БД
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Проверка подключения
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Ошибка подключения к базе данных']);
    exit;
}

// Передача данных в POST
$name = trim($_POST['name']);
$address = trim($_POST['address']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);

// Проверка на заполнение полей
if (empty($name) || empty($address) || empty($phone) || empty($email)) {
    echo json_encode(['success' => false, 'error' => 'Все поля обязательны для заполнения']);
    exit;
}

// Проверка на корректный E-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'error' => 'Некорректный формат E-mail']);
    exit;
}

// Подготовка SQL запроса
$stmt = $conn->prepare("INSERT INTO contacts (name, address, phone, email) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $address, $phone, $email);

// Выполнение SQL запроса
if ($stmt->execute()) {
    $result = $conn->query("SELECT name, address, phone, email FROM contacts");
    $contacts = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(['success' => true, 'contacts' => $contacts]);
} else {
    echo json_encode(['success' => false, 'error' => 'Ошибка при сохранении данных']);
}

$stmt->close();
$conn->close();
?>