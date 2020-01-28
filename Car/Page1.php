<?php
	$host = 'localhost';  // Хост
    $user = 'root';    // Пользователь
    $db_name = 'car';   // Имя базы
	$pass = ''; // Пароль
    $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
	
	 // Ругаемся, если соединение установить не удалось
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }
	
/*Вариант №4. Создать две таблицы в БД: Компании (id, название компании, страна), 
марка машины (id, id_компании, название марки, технические характеристики, год, URLкартинки).
 Реализовать сайт из 3-х страниц: главная, Добавление информации, Просмотр сведений. Главная содержит общую информацию.
 Добавление информации содержит формы для добавления информации об компаниях и марках автомобилей с сохранением в БД. 
 Просмотр сведений содержит поисковую строку для ввода названия марки и реализует вывод соответствующих данных их таблиц БД.*/
?>

<html>
	<head>
		<link rel="stylesheet" href="Style.css" >
		<link rel="icon" href="IMG3.jpg" type="image/x-icon">
		<title>Главная</title>
	</head>
	
	<body>
		<header class="main-header">
			<a id="start1"></a>
				<ul>
					<li><a href="Page1.php">Главная</a></li>
					<li><a href="Page2.php">Добавление информации</a></li>
					<li><a href="Page3.php">Просмотр сведений</a></li>
				</ul>
			<div id='Fon'>
				<img width="78%";  height="35%" src='IMG1.jpg';>
			</div>
		</header>
		
		<div id="Centre">
			<?php 
				$Marka=$_POST['Marka'];
				$M=mysqli_query($link, "SELECT * FROM `marka` WHERE name_marka='$Marka' ");
				$M=mysqli_query($link, "SELECT * FROM `marka` ");
				while ($marka = mysqli_fetch_array($M)) {
				   $id = $marka['id_company'];
				   $query = mysqli_query($link, "SELECT * FROM `company` WHERE company.id_company='$id'");
                   echo "<div style=' width:100%; display: inline-flex; margin-top:10px; border:#FFFFFF solid 2px;'>
				           <img   src='{$marka['URL']}' width='30%' ;>   
						   <p style='margin: 8px;'> Компания: {$company['id_company']}<br><br>
						   Марка: {$marka['name_marka']} </p>";
				   echo "<table border=1>
							<tr>
							   <td> Характеристика:</td>
							   <td> Год:</td>
							</tr>";
						echo "<tr>
							   <td> {$marka['charecter']}</td>
							   <td> {$marka['year']}</td>	
							</tr>";
					echo "</table></div><br>";
				}
				mysqli_close($link);
			?>
		</div>
		
		<footer style="margin-left: 18%;margin-right: auto;	width: 60%; padding-left:2%;padding-right:2%; color: white;
		padding-bottom:1%; padding-top:1%;background: #4d4b4b;">&copy;Щукина Анастасия</footer>
	</body>
</html>

