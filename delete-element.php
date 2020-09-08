<?php
  $dbconn = mysqli_connect('localhost', '046203317_user', 'pye2n8S54AeCSN8', 'krasalp_test-task-db');
  if (!$dbconn) {
      die('Could not connect: ' . mysql_error());
  }

  $id_element = $_GET["id_element"];
      
  $query = "DELETE FROM element WHERE id_element = $id_element;";
  echo($query);

  $result = mysqli_query($query) or die('Ошибка запроса: ' . mysqli_last_error());

  // Очистка результата
  mysqli_free_result($result);
  // Закрытие соединения
  mysqli_close($dbconn);
?> 