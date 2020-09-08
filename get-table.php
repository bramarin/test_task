<?php
    $dbconn = mysqli_connect('localhost', '046203317_user', 'pye2n8S54AeCSN8', 'krasalp_test-task-db');
    if (!$dbconn) {
        die('Could not connect: ' . mysql_error());
    }

    $parent_id = $_GET['q'];

    echo '
        <tbody>';
            
    $sql = 'SELECT * FROM section WHERE id_parent = ' . $parent_id;
    $result = mysqli_query($dbconn, $sql);

    while ($line = mysqli_fetch_array($result)) {
        $id_section = $line["id_section"];
        echo  '
        <tr id="sec' .  $line["id_section"] . '" class="clickable-row section">
            <td class="cont"><button type="button" class="btn btn-teal btn-rounded btn-sm m-0 context_menu_button hidden" 
                id="context_menu_button" onclick="showContextMenu(\'section\', this)">&#8278;</button></td>
            <td class="section_name"><div class="name">' . $line["name"] . '</div><span class="section_info">' . $line["description"] . '</span></td>
            <td>' .  $line["creation_date"] . '</td>
            <td>' .  $line["modification_date"] . '</td>
            <td></td>
            </tr>';
    }
    mysqli_free_result($result);
            
    $sql = 'SELECT * FROM element WHERE id_parent = ' . $parent_id;
    $result = mysqli_query($dbconn, $sql);

    while ($line = mysqli_fetch_array($result)) {
        $id_element = $line["id_element"];
        echo '
        <tr id="el' .  $line["id_element"] . '" class="clickable-row element">
            <td class="cont"><button type="button" class="btn btn-teal btn-rounded btn-sm m-0 context_menu_button hidden" 
                id="context_menu_button" onclick="showContextMenu(\'element\', this)">&#8278;</button></td>
            <td class="section_name">' .  $line["name"] . '</td>
            <td>' .  $line["creation_date"] . '</td>
            <td>' .  $line["modification_date"] . '</td>
            <td>' .  $line["type"] . '</td>
            </tr> ';
            
    }
    mysqli_free_result($result);
    mysqli_close($dbconn);
    
?>  