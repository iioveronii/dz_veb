<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Тест</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
    </head>
    <style type="text/css">
    body {
    font-family: cursive;
    background-color: #7B68EE;
    font-size: 18px;
    }
    .header {height:30px; padding:5px; text-align:center; vertical-align:top}
    .left_col {width:110px; padding:5px; vertical-align:top}
    .center_col {padding:5px; vertical-align:top}
    .footer {padding:5px; font-size:18px; vertical-align:bottom}
    .form {
	max-width: 100%;
	padding: 0px 10px 10px 10px;
	background: #f4f7f8;
	margin: 5px 5px 5px 5px;
	padding: 1em;
	background: #f4f7f8;
	border-radius: 8px;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
    }
    .form input[name="login"],
    .form input[type="password"],
    .form textarea {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	background: rgba(255,255,255,.1);
	border: none;
	border-radius: 4px;
	font-size: 15px;
	margin: 0;
	outline: 0;
	padding: 5px;
	width: 100%;
	box-sizing: border-box; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box; 
	background-color: #e8eeef;
	color:#8a97a0;
	-webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	margin-bottom: 10px;
}
   
   .btn {
	display: inline-block;	
	box-sizing: border-box;
	padding: 0 25px;
	margin: 0 15px 15px 0;
	outline: none;
	border: 1px solid #fff;
	border-radius: 50px;
	height: 46px;
	line-height: 46px;
	font-size: 16px;
	font-weight: 600;
	text-decoration: none;
	color: #444;
	background-color: #fff;
	box-shadow: 0 4px 6px rgb(65 132 144 / 10%), 0 1px 3px rgb(0 0 0 / 8%);
	cursor: pointer;
	user-select: none;
	appearance: none;
	touch-action: manipulation;  
	vertical-align: top;
	transition: box-shadow 0.2s;
    }
    .btn:focus-visible {
	border: 1px solid #4c51f9;
	outline: none;
    }
    .btn:hover {
	transition: all 0.2s;
	box-shadow: 0 7px 14px rgb(65 132 144 / 10%), 0 3px 6px rgb(0 0 0 / 8%);
    }
    .btn:active {
	background-color: #808080;
    }
    .btn:disabled {
	background-color: #eee;
	border-color: #eee;
	color: #444;
	cursor: not-allowed;
    }
    </style>

<body>
    <?php header('Content-type: text/html; charset=utf-8'); ?>
    <table cellpadding="0" cellspacing="0" width="100%" align="center">
    <tr><td colspan="3" class="header">
    <div class="form">
    <form action="exit.php">
    <?php
    $login=$_SESSION['login'];
    if ($login)
    {
        if ($login=='er login')
    {
    echo '<p>Введён неправильный логин или пароль</p>';
    $_SESSION['login']='';
    }
    else 
    echo "<p>Здравствуйте, $login</p>";
    }
    else 
    echo '<p>Здравствуйте, гость</p>';
    ?>
        <button type="submit" class="btn">Выход</button>
    </tr></td>
    </div>
    </form>

<?php
include_once("connect.php");
$data=$_POST["message"];
    
 
  if(strlen($data) >=3) {
        $query = "INSERT INTO messages(message_text, pub_time) VALUES('$data', NOW())";
        mysqli_query($link, $query);
        header("location: /");
        exit();
    } 

?>
    <tr><td class="left_col">
    <div class="form">
    <p>Авторизация:</p>
    <form action="authorization.php" method="post">
        <input name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <button type="submit" class="btn">Войти</button>
    </div>
    </form>
    <div class="form">
    <p>Регистрация:</p>
    <form action="registration.php" method="post">
        <input name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <button type="submit" class="btn">Зарегистрироваться</button>
    </td>
    </div>
    </form>

    <td class="center_col">
    <div class="form">
    <ul>
        <li> <a href='connect.php'>Проверка подключения</a></li>
        <li> <a href='vivod.php'>Просмотр всех вопросов</a></li>
        <li> <a href='vstavka.php'>Вставка новых вопросов</a></li>
        <li> <a href='poisk1.php'>Поиск вопросов</a></li>  
        <li> <a href='spravochnik.php'>Справочник понятий</a></li>
    </ul>    
    <form action="index.php" method="post" name="form">
        <p class="is-h">Текст сообщения:<br><textarea name="message" rows="5" cols="50" id="message"></textarea></p>
        <input name="js" type="hidden" value="no" id="js">
        <button type="submit" id='click' type="button" class="btn">Отправить</button>
    </tr></td>
    </div>
    </form>
    <div class="clear">

    </div>
    
    <tr><td colspan="3" class="footer">
    <div class="form">
    <p>Комментарии к статье</p>
    <?php
    $select_query= "SELECT * FROM messages ORDER BY pub_time DESC LIMIT 5";

    if ($_POST ['show_all'] == 'yes'){
    $select_query = "SELECT * FROM messages ORDER BY pub_time DESC";
    }
    
    $result = mysqli_query($link, $select_query);
    while($one=mysqli_fetch_array($result)){
    ?>
    
        <div class = "row">
            <div class = "col-xs-2">
                <b><?php echo $one ['pub_time']; ?></b>
            </div>
            <div class = "col-xs-8">
                <b><?php echo $one ['message_text']; ?></b>
            </div>
            <div class = "col-xs-2">
                <a href = "delete.php?id=<?php echo $one['id']; ?>" class="btn btn-danger">Удалить</a>
            </div>
        </div>
        
<?php } ?>

        <hr>
        <div class="col-xs-12 text-xs-center">
            <a href="index.php?show_all=yes" class="btn btn-info">Показать всё</a>
        </div>

    <div id="commentBlock">
    
    </tr></td>
    </div>
    </div>
    </table>
</body>
</html>
