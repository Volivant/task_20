<?php
// чтение списка пользователей
function getUsersList()
{
    $json = file_get_contents('user.json');
    $userInfo = json_decode($json, true);
    return $userInfo;
}

// запись пользователей в файл
function setUsersList($userInfo)
{
    $json = json_encode($userInfo, JSON_UNESCAPED_UNICODE);
    file_put_contents('user.json', $json);
}

// проверка пользователя функция переписана в соответсвии с DRY
function existsUser($login)
{
    $userInfo = getUsersList();
	return (array_key_exists($login, $userInfo) ? true : false);
}

// проверка пользователя функция перепеисана в соответствии с DRY
function checkPassword($login, $password)
{
    $userInfo = getUsersList(); // получаем список пользователей
	return ($userInfo[$login]['password'] == sha1($password) ? true : false);
}

//получение текущего пользователя функция переписана в соответствии с DRY
function getCurrentUser()
{
    session_start();
    $auth = $_SESSION['auth'] ?? null;
	
	return ($auth ? $_SESSION['userName'] : "Guest");
}

//получение даты рождения пользователя
function getUserBirthday($login)
{
    $userInfo = getUsersList(); // получаем список пользователей
    return $userInfo[$login]['birthday'];
}

// дней осталось до ДР
function daysLeft($birthday)
{
    //$birthday = 'YYYY-MM-DD';

    $cd = new \DateTime('today'); // Сегодня, время 00:00:00
    $bd = new \DateTime($birthday); // Объект Дата дня рождения
    $bd->setDate($cd->format('Y'), $bd->format('m'), $bd->format('d')); // Устанавливаем текущий год, оставляем месяц и день
    $tmp = $cd->diff($bd); // Разница дат
    if($tmp->invert){ // Если в этом году уже был (разница "отрицательная")
        $bd->modify('+1 year'); // Добавляем год
        $tmp = $cd->diff($bd); // Снова вычисляем разницу
    }
    return $tmp->days; // вывод результата в днях
}

// отсчет персональной скидки
function finalCounDown($enterTime)
{
    $et = new DateTime($enterTime); // Объект время входа
    $cd = new DateTime(); // Сегодня
    $et->modify('+1 day'); // Добавляем 1 день
    $tmp = $et->diff($cd); // Разница дат
    return $tmp->format('До окончания персональной скидки осталось  %H часов %i минут %s секунд');
    //return "До окончания персональной скидки осталось ".$tmp->format('H')." часов ".$tmp->format('i').
    //" минут ".$tmp->format('s')." секунд";
}
