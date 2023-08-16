<?php
// Параметры для подключения к БД
$sdd_db_host="localhost"; // Хост
$sdd_db_user="root"; // Пользователь
$sdd_db_pass=""; // Пароль
$sdd_db_name="db"; // Название БД
// Функция получение данных из таблицы в БД
function connect ($sdd_db_host, $sdd_db_user, $sdd_db_pass, $sdd_db_name, $table) {
	$conn = mysqli_connect($sdd_db_host, $sdd_db_user, $sdd_db_pass, $sdd_db_name); // Коннект с сервером бд
	if(!$conn) throw new Exception('Не удалось подключиться к базе данных! Проверьте параметры подключения');
	$sql = "SELECT * FROM ".$table; // Текст запроса SQL на таблицу из БД
	return $result = mysqli_query($conn, $sql); // Возвращает результат из таблицы БД
}
$result_questions = connect($sdd_db_host, $sdd_db_user, $sdd_db_pass, $sdd_db_name, "questions"); // Таблица вопросов
$result_answers = connect($sdd_db_host, $sdd_db_user, $sdd_db_pass, $sdd_db_name, "answers"); // Таблица ответов
$result_conclusions = connect($sdd_db_host, $sdd_db_user, $sdd_db_pass, $sdd_db_name, "conclusion"); // Таблица направлений
?>