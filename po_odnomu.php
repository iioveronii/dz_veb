<?php

// Соединиться с сервером БД

require_once("connect.php");

// Получить данные из БД, в зависимости от значения id в URL
echo $_GET["id"];
$strSQL = "SELECT * FROM ponatia WHERE nomer=" .$_GET["nomer"];

$rs = mysqli_query($link, $strSQL);

// Цикл по $rs

while($row = mysqli_fetch_array($rs, MYSQLI_BOTH)) {

// Записать данные маршрута

echo "<table border=0>";

echo '<tr> <td>';

echo "<dt><b>Название места:</b></dt><dd>" . $row["ponatie"] ."</dd>";

echo '<tr> <td>';

echo "<dt><b>Длина пути:</b></dt><dd>" . $row["opredelenie"] ."</dd>";

echo '<tr> <td>';

echo "<dt><b>Уровень экстрима:</b></dt><dd>" . $row["razdel_disciplini"] . "</dd>";

echo '<tr> <td>';

echo "<dt><b>Краткое описание места:</b></dt><dd>" . $row["primeri"] . "</dd>";

echo '<tr> <td>';

echo '<img src="'.$row['illustacia_primerov'].'" width="600" height="400" align="center"';

echo '</table>';

}

// Закрыть соединение с БД

mysqli_close($link);


?>
