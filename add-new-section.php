<?php
  $dbconn = mysqli_connect('localhost', '046203317_user', 'pye2n8S54AeCSN8', 'krasalp_test-task-db');
  if (!$dbconn) {
      die('Could not connect: ' . mysqli_error());
  }

  $id_parent = $_GET["id_parent"];
  $name = $_GET["name"];
  $description = $_GET["description"];
      
  $query = "INSERT INTO section (id_parent, name, description, creation_date, modification_date)
                        VALUES ($id_parent, $name, $description, NOW(), NOW());";
  echo($query);

  $result = mysqli_query($dbconn, $query) or die('Ошибка запроса: ' . mysqli_error());

  // Очистка результата
  mysqli_free_result($result);
  // Закрытие соединения
  mysqli_close($dbconn);
?> 