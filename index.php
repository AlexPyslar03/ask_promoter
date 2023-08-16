<!DOCTYPE html>
<html>
<head>
	<title>opros-php-sql</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
include("connect.php");
setcookie("user_array_answers"); // Создания в cookies массива ответов пользователя
if (isset($_COOKIE["question_number"])) { // Проверка наличия cookies с номером текущего вопроса
	$question_number = $_COOKIE["question_number"]; // Взятие из cookies номера текущего вопроса
	$question_is_end = false; // Проверка закончились ли вопросы
	while ($row = mysqli_fetch_array($result_questions, MYSQLI_ASSOC)) { // Цикл прогонки всех вопросов
		if ($row["id"] == $question_number) { // Сравнее вопроса из бд и текущего вопроса
			$question_is_end = true; // Проверка закончились ли вопросы
			echo '<p id="question_text">Вопрос №'.($question_number + 1).': '.$row["text"].'</p>'; // Вывод текста вопроса
			$question_type = $row["type"]; // Тип вопроса
			if ($question_type == 0) { // Если тип ответа Да Нет
				echo '<input name="answers" type="radio" value="0">Нет';
				echo '<input name="answers" type="radio" value="1">Да';
			}
			if ($question_type == 1) { // Если тип ответа только один вариант
				$array_answers = explode(' ', $row["answers"]); // Массив ID ответов
				$result = connect($sdd_db_host, $sdd_db_user, $sdd_db_pass, $sdd_db_name, "answers");
				while ($row = mysqli_fetch_array($result_answers, MYSQLI_ASSOC)) { // Цикл прогонки по всем ответам
					for ($i = 0; $i < count($array_answers); $i++) { // Цикл прогонки по ответам которые есть в вопросе
						if ($row["id"] == $array_answers[$i]) { // Если id вопроса из таблицы совпал в id вопроса из ответа
							echo '<input name="answers" type="radio" value="answers">';
							echo $row["text"]."<br/>"; // Вывод текста ответа
						}
					}
				}
			}
			if ($question_type == 2) { // Если тип ответа несколько вариантов
				$array_answers = explode(' ', $row["answers"]); // Массив ID ответов
				while ($row = mysqli_fetch_array($result_answers, MYSQLI_ASSOC)) { // Цикл прогонки по всем ответам
					for ($i = 0; $i < count($array_answers); $i++) { // Цикл прогонки по ответам которые есть в вопросе
						if ($row["id"] == $array_answers[$i]) { // Если id вопроса из таблицы совпал в id вопроса из ответа
							echo '<input name="answers" type="checkbox" value="answers">';
							echo $row["text"]."<br/>"; // Вывод текста ответа
						}
					}
				}
			}
			if ($question_type == 3) { // Если тип ответа от 0 до 9
				echo '<input name="answers" type="radio" value="answers"> 0';
				echo '<input name="answers" type="radio" value="answers"> 1';
				echo '<input name="answers" type="radio" value="answers"> 2';
				echo '<input name="answers" type="radio" value="answers"> 3';
				echo '<input name="answers" type="radio" value="answers"> 4';
				echo '<input name="answers" type="radio" value="answers"> 5';
				echo '<input name="answers" type="radio" value="answers"> 6';
				echo '<input name="answers" type="radio" value="answers"> 7';
				echo '<input name="answers" type="radio" value="answers"> 8';
				echo '<input name="answers" type="radio" value="answers"> 9';
			}
			$user_conclusions = explode(' ', $_COOKIE["user_conclusions"]); // Взятие массива ответов пользователя из cookies
			$user_conclusions[$question_number] = $_GET['answers']; // Запись ответа пользователя в массив
			setcookie("user_conclusions", implode(' ', $user_conclusions)); // Запись массива ответов пользователя в cookies
			break;
		}
	}
	if(isset($_POST['button'])) { // Функция нажатия кнопки
		$question_number++; // Увеличение номера текущего вопроса
		setcookie("question_number", $question_number); // Записывание номера текущего вопроса в cookies
	}
	if ($question_is_end == true) { // Если ещё есть вопросы
		echo '<form method="POST">';
		echo '<input type="submit" name="button" value="Далее" />';
		echo '</form>';
	} else { // Вывод результата опроса
		while ($row = mysqli_fetch_array($result_conclusions, MYSQLI_ASSOC)) { // Цикл прогонки по всем выводам
			echo $row["text"]."<br/>"; // Вывод текста ответа
		}
		$user_name = $_COOKIE["user_name"]; 
		echo $user_name;
		$user_array_answers = explode(' ', $_COOKIE["user_array_answers"]); // Взятие массива ответов пользователя из cookies
		for ($i = 0; $i < count($user_array_answers); $i++) echo $user_array_answers[$i];
		unset($_COOKIE['question_number']); // Удаление номера текущего вопроса из cookies
	}
}
else { // Если тест запусакеться в первый раз
	$question_number = 0; // Установление переменной номера вопроса
	setcookie("question_number", $question_number); // Записывание номера текущего вопроса в cookies
	$user_conclusions[0] = 0;
	while ($row = mysqli_fetch_array($result_conclusions, MYSQLI_ASSOC)) { // Цикл прогонки по всем выводам
		$user_conclusions[count($user_conclusions)] = 0;
	}
	setcookie("user_conclusions", (string)$user_conclusions);
	echo '<input type="text" name="user_name" id="user_name"/>';
	if(isset($_POST['user_name_button'])) { // Функция нажатия кнопки
		$user_name = $_GET['user_name']; // Имя пользователя
		setcookie("user_name", $user_name); // Запись имени пользователя пользователя в cookies
	}
	echo '<form method="POST">';
	echo '<input type="submit" name="user_name_button"/>';
	echo '</form>';
}
?>
</body>
</html>