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
    <form method="get">
<?php
include("connect.php");

$query="SELECT ponatie FROM ponatia ORDER BY ponatie ASC";
$result=mysqli_query($link, $query);
echo '<br>';
for ($i=0; $i < mysqli_num_rows($result); $i++)
{
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$strName = $row['ponatie'];
$strLink = "<a href = 'po_odnomu.php?id=" . $row['nomer'] . "'>" . $strName. "</a>";
echo "<li>" . $strLink . "</li>";


echo '<br>';
}
mysqli_close($db);
?>
</form>
</div>
</html>

