<?php
include 'process.php';
if(isset($_POST['userName'])) {
    if(checkPassword($_POST['userName'], $_POST['inputPassword'])) {
        session_start();//старт сессии
        $_SESSION['auth'] = true; //авторизовались
        $_SESSION['userName'] = $_POST['userName'];
        $_SESSION['enterTime'] = date('d-m-Y H:i:s');
        header("Location: /");// ссылка на страницу, которая откроется после входа
    }else {
        //Invalid Login
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>СПА салон</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    
    <body>
        <div class="container">
            <?php if($_SESSION['userName']): ?>
                <p>Вы вошли как <?=$_SESSION['userName']?></p>
            <?php endif; ?>
            <form method="post" action="" name="signin-form">
                <div class="form-group">
                    <label for="userName">Имя пользователя</label>
                    <input type="text" class="form-control" id="userName" name="userName"  pattern="[a-zA-Z0-9]+" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Пароль</label>
                    <input type="password" class="form-control" name="inputPassword" id="inputPassword" required>
                </div>
                <button type="submit" class="btn btn-primary" name="login" value="login">Войти</button>
            </form>
        </div>
        

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>

</html>