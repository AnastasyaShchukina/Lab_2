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
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Style.css">
		<link rel="icon" href="IMG3.jpg" type="image/x-icon">
		<title>Добавление информации</title>
		<meta charset="UTF-8">
	</head>
	
	<body>
		<header >
			<ul>
				<li><a href="Page1.php">Главная</a></li>
				<li><a href="Page2.php">Добавление информации</a></li>
				<li><a href="Page3.php">Просмотр сведений</a></li>
			</ul>
			<div id='Fon'>
				<img width="78%"  height="35%" src='IMG1.jpg';>
			</div>
		</header>
		
		<div id="Centre">
			<form  method='POST' > 
				<legend>Добавление информации о компаниях</legend>
				<br>
				<label for="Name"><b>Название компании:</b></label> 
				<input name="Name" type="text" required/><br/>
				<br>
				<label for="Country"><b>Страна:</b></label>
				<input name="Country" type="text" required/><br/>
				<br>
				<input name="Next1" type="submit" value="Добавить" >
			</form>
			<?php //Добавление записи в таблицу "Company"
				if (isset($_POST["Next1"])) {
					$Name=$_POST['Name'];
					$comp=mysqli_query($link, "SELECT * FROM `company` WHERE name_company='$Name' ");
					$number=mysqli_num_rows($comp);
					If ($number==0){
						$sql = mysqli_query($link, "INSERT INTO `company` (`name_company`, `country`) VALUES ('{$_POST['Name']}', '{$_POST['Country']}')");
						if ($sql) {
							echo '<p>Данные успешно добавлены в таблицу.</p>';
						} 
						else {
							echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
						}
					}
					else {
						echo '<p>Такая компания уже существует.</p>';
					}
				}
			?>
			<form  method='POST' >
				<legend text-align="center">Добавление информации о марках</legend>
				<br>
				<label for="Name_comp"><b>Компания:</b></label>
				<?php echo "<select name='Name_comp'>";                                //Вставка выплывающего списка
					echo "<option selected='selected'>Выберете компанию</option>";
					$comp = mysqli_query($link, 'SELECT * FROM `company`');
					while ($company = mysqli_fetch_array($comp)){
						echo "<option value='{$company['id_company']}'>{$company['name_company']}</option>";
					}
					echo "</select>";
				?>
				<br><br>
				<label for="Marka"><b>Марка:</b></label>
				<input name="Marka" type="text" /><br/>
				<br>
				<label for="Сharacteristic"><b>Технические характеристики:</b></label>
				<input name="Сharacteristic" type="text" required/><br/>
				<br>
				<label for="Year"><b>Год:</b></label> 
				<input name="Year" type="number" min="2010" max="2020" required/><br/>
				<br>
				<label for="Image"><b>Фото:</b></label>
				<input name="Image" type="text" required/><br/>
				<br>
				<input name="Next2" type="submit" value="Добавить" >
			</form>
			<?php //Добавление записи в таблицу "Marka"
				
				if (isset($_POST["Next2"])) {
				$Name_comp=$_POST['Name_comp'];
				$Marka=$_POST['Marka'];
				$Сharacteristic=$_POST['Сharacteristic'];
				$Year=$_POST['Year'];
					$flag=false;
					$m=mysqli_query($link, 'SELECT * FROM `marka`');
					while ($marka = mysqli_fetch_array ($m)){
						if($marka['id_company']==$Name_comp){
							if ($marka['name_marka'==$Marka]){
								if ($marka['charecter']==$Сharacteristic){
									if ($marka['year']==$Year){
										$flag=true;
									}
								}
							}
						} 
					}
					if ($flag==false){
					$sql = mysqli_query($link, "INSERT INTO `marka` (`id_company`, `name_marka`, `charecter`, `year`, `URL`) VALUES ('{$_POST['Name_comp']}','{$_POST['Marka']}', '{$_POST['Сharacteristic']}', '{$_POST['Year']}', '{$_POST['Image']}')");
					if ($sql) {
						echo '<p>Данные успешно добавлены в таблицу.</p>';
					} 
					else {
						echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
					}
				}
				else {
					echo '<p>Такая марка уже существует.</p>';
				}
			}
				
			mysqli_close($link);
			?>
		</div>
		
		<footer style="margin-left: 18%;margin-right: auto;	width: 60%; padding-left:2%;padding-right:2%; color: white;
		padding-bottom:1%; padding-top:1%;background: #4d4b4b;">&copy;Щукина Анастасия</footer>
	</body>
</html>