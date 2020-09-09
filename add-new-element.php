<?php
  $dbconn = mysqli_connect('localhost', '046203317_user', 'pye2n8S54AeCSN8', 'krasalp_test-task-db');
  if (!$dbconn) {
      die('Could not connect: ' . mysql_error());
  }

  $id_parent = $_GET["id_parent"];
  $name = $_GET["name"];
  $type = $_GET["type"];
      
  $query = "INSERT INTO element (id_parent, name, type, creation_date, modification_date)
                        VALUES ($id_parent, $name, $type, NOW(), NOW());";
  echo($query);

  $result = mysqli_query($dbconn, $query) or die('Ошибка запроса: ' . mysqli_error());

  // Очистка результата
  mysqli_free_result($result);
  // Закрытие соединения
  mysqli_close($dbconn);
?> 