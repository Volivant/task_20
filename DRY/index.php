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
<?php include 'process.php';?>
<body>
    <nav class="navbar navbar-expand-lg fixed-top ">
        <a class="navbar-brand" href="#">Home</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-4">
                <li class="nav-item">
                    <a class="nav-link" href="#services">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#promo">Акции</a>
                </li>
                <?php
                    session_start();
                    $auth = $_SESSION['auth'] ?? null;
                    if(!$auth) { // контент для неавторизованного пользователя?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Вход</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="register.php">Регистрация</a>
                        </li>
                <?php } else {// контент для авторизованного пользователя?>
                    <li class="nav-item">
                        <span class="navbar-brand">Вы вошли как <?php echo(getCurrentUser()); ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exit.php">Выход</a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </nav>
    <header class="header">
        <div class="overlay"></div>
        <div class="container">
            <div class="description text-left">
                <h1>Добро пожаловать в наш СПА-салон!</h1>
                <?php
                    session_start();
                    $auth = $_SESSION['auth'] ?? null;
                    if(!$auth) { // контент для неавторизованного пользователя?>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <?php } else {// контент для авторизованного пользователя
                    $dayL = daysLeft(getUserBirthday($_SESSION['userName']));
                    if ($dayL == 0){?>
                        <p>Поздравляем Вас с Днем рождения! И дарим Вам в подарок 5% скидку на все услуги.</p>
                    <?php } else {?>
                        <p>До вашего дня рождения осталось <?php echo($dayL);?> дней.</p>
                <?php }
                    echo(finalCounDown($_SESSION['enterTime']));}?>
                
            </div>
        </div>
    </header>
    <!-- services section -->
    <div class="services" id="services">
	    <div class="container">
	        <h1 class="text-left">Наши услуги</h1>
		    <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 item">
				    <img src="images/massage.jpg" class="img-fluid" alt="services">
				    <div class="des">
				 	    Массаж
				    </div>
				    <span class="text-muted">Массаж бровей и всего тела</span>
			    </div>
			    <div class="col-lg-3 col-md-3 col-sm-12 item">
				    <img src="images/sauna.jpg" class="img-fluid" alt="services">
				    <div class="des">
				 	    Сауна
				    </div>
				    <span class="text-muted">Финская сауна и Русская баня</span>
			    </div>
        	</div>
	    </div>
    </div>
    <!-- promo section -->
    <div class="promo" id="promo">
	    <div class="container">
	        <h1 class="text-left">Скидки и акции</h1>
		    <div class="row">
                
			    <div class="col-lg-3 col-md-3 col-sm-12 item">
				    <img src="images/sauna.jpg" class="img-fluid" alt="promo">
				    <div class="des">
				 	    Согрейся!
				    </div>
				    <span class="text-muted">Температура в сауне повышена на 50%</span>
			    </div>
        	</div>
	    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src='js/main.js'></script>
    <footer>
        <hr>
        <!--Ссылка на авторов изображений-->
        <span>&copy;&nbsp;<a href="https://ru.freepik.com/">Изображения от Freepik</a></span>
    </footer>
</body>

</html>