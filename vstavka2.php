<html>
    <head>
        <meta charset="utf8">
    </head>
 <style type="text/css">
    body {
    font-family: cursive;
    background-color: #7B68EE;
    font-size: 18px;
    }
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
    .form input[name="ponatie"],
    .form input[name="opredelenie"],
    .form input[name="razdel_disciplini"],
    .form input[name="primeri"],
    .form input[name="illustracia_primerov"],
    .form text {
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
 <div class="form">
    <?php
        include('connect.php');
        $ponatie=$_POST['ponatie'];
        $opredelenie=$_POST['opredelenie'];
        $razdel_disciplini=$_POST['razdel_disciplini'];
        $primeri=$_POST['primeri'];
        $illustracia_primerov=$_POST['illustracia_primerov'];
        echo $ponatie;
        echo $opredelenie;
        echo $razdel_disciplini;
        echo $primeri;
        echo $illustracia_primerov;
        if ($ponatie) {
        $query="INSERT INTO ponatia(ponatie, opredelenie, razdel_disciplini, primeri, illustracia_primerov) VALUES('$ponatie', '$opredelenie', '$razdel_disciplini', '$primeri', '$illustracia_primerov')";
        }
        $result=mysqli_query($link, $query);
        if ($result) {
        echo "Вопрос успешно добавлен";
        }
        mysqli_close($db);
        ?>
</div>
    <div class="form">
    <form name="test1" method="post">
        <p>Понятие <input type="text" name="ponatie"></p>
        <p>Определение <input type="text" name="opredelenie"></p>
        <p>Раздел дисциплины <input type="text" name="razdel_disciplini"</p>
        <p>Пример <input type="text" name="primeri"</p>
        <p>Иллюстрация примера <input type="text" name="illustracia_primerov"</p>
        <button type="submit" class="btn">Внести вопрос в базу</button>
    </div>
    </form>
</body>
</html>
