<?php
  $dbconn = mysqli_connect('localhost', '046203317_user', 'pye2n8S54AeCSN8', 'krasalp_test-task-db');
  if (!$dbconn) {
      die('Could not connect: ' . mysqli_error($dbconn));
  }

  $id_section = $_GET["id_section"];
  $name = $_GET["name"];
  $description = $_GET["description"];
      
  $query = "UPDATE section SET 
              name = $name,
              description = $description,
              modification_date = NOW()
              WHERE id_section = $id_section;";

  echo($query);

  $result = mysqli_query($dbconn, $query) or die('Ошибка запроса: ' . mysqli_error($dbconn));

  // Очистка результата
  mysqli_free_result($result);
  // Закрытие соединения
  mysqli_close($dbconn);
?> 