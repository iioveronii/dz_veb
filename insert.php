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
    </style>

<!DOCTYPE html>
<html lang="ru">
<div class="form">
<?php
include('connect.php');
$vopros=$_POST['vopros'];
$otvet=$_POST['otvet'];
$variant=$_POST['variant'];
echo $vopros;
echo $otvet;
echo $variant;
$query="INSERT INTO Voprosi(vopros, otvet, nomer_varianta) VALUES('$vopros', '$otvet', '$variant')";
$result=mysqli_query($link, $query);
if ($result) {
    echo "Вопрос успешно добавлен";
}
mysqli_close($db);
?>
</div>
</html>
