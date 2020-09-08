<!DOCTYPE html>

<?php
  $dbconn = mysqli_connect('localhost', '046203317_user', 'pye2n8S54AeCSN8', 'krasalp_test-task-db');
  if (!$dbconn) {
    die('Could not connect: ' . mysql_error());
  }
?> 

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
  </head>

  <body>
    <!-- Path string -->
    <div class="path">
      <a class="level" href="#">level_one</a>\<a class="level" href="#">level_two</a>\<a class="level" href="#">level_three</a>
    </div>

    <!-- Table -->
    <div class="table-responsive-sm table_container">
      <table id="table" class="table table-borderless table-sm table-hover" cellspacing="0" width="100%">
        <thead id="thead">
          <th class="th-sm"></th>
          <th class="th-sm"><a href="#" onclick="sortEntries('creation_date')">Наименование</a></th>
          <th class="th-sm"><a href="#" onclick="sortEntries('creation_date')">Дата создания</a></th>
          <th class="th-sm">Дата модификации</th>
          <th class="th-sm">Тип</tr>
        </thead>
        <!-- Here must be getTable.php-generated <tbody></tbody> -->
      </table>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
    <script>
        $(".level").on("click", function (e) {
            var $button = $(this);
            console.log("trial_page: ", "level_link is clicked")
        });

        function showContextMenu(type, element){

          var wasThisMenuOpen = hideAnyContextMenu(element);
          if(wasThisMenuOpen)
            return;

          if($(element).hasClass("hidden")){
            var parent = $(element).parents( ".cont" );
            if(type == 'section')
              $(parent).after('<ul class="context_menu", id="context_menu"><li><a href="#">Добавить подраздел</a></li>' +
                                                                          '<li><a href="#">Добавить элемент</a></li>' +
                                                                          '<li><a href="#">Редактировать</a></li>' +
                                                                          '<li><a href="#">Переместить</a></li>' +
                                                                          '<li><a href="#">Удалить</a></li>' +
                                                                          '</ul>');
            if(type == 'element')
              $(parent).after('<ul class="context_menu", id="context_menu"><li><a href="#">Редактировать</a></li>' +
                                                                          '<li><a href="#">Переместить</a></li>' +
                                                                          '<li><a href="#">Удалить</a></li>' +
                                                                          '</ul>');
            $(element).removeClass('hidden');
            console.log("trial_page: ", "menu revealed")
          }
          else{
            hideContextMenu(element);
          }
        }

        function hideContextMenu(element){
          var contextMenu = document.getElementById("context_menu");
          if(contextMenu != null){
            contextMenu.remove(); 
            $(element).addClass('hidden');
            console.log("trial_page: ", "menu unrevealed")
          }
        }

        function hideAnyContextMenu(clickedElement){
          var contextMenu = document.getElementById("context_menu");
          if(contextMenu != null){
            var parent = contextMenu.previousSibling; // .cont
            hideContextMenu(parent.childNodes[0]);
            if(clickedElement === parent.childNodes[0])
              return true;
          }
          return false;
        }

        $(document).ready(function(){
          console.log("trial_page: ", "document ready");
          const homeSectionId = 1;
          displayTable(homeSectionId);
        });


        /*$(".section").on("click", function (e) {
          if (!e.target.classList.contains("context_menu_button") && !(e.target.parentNode.parentNode.className == "context_menu")) {
            var element = $(this);
            var sectionID = element.id;
            console.log("trial_page: ", "row element with id(" + elementID + ")is clicked");
          }
        });*/
            
        $(document).on('click','.section', function(e){
          console.log("trial_page: ", "section is clicked");
          if (!e.target.classList.contains("context_menu_button") && !(e.target.parentNode.parentNode.className == "context_menu")) {
            var elements = $(this);
            var sectionID = elements[0].id.replace(/\D/g, ""); // get first and only id of this .section, then replase non digit symbols with empty str
            displayTable(sectionID);
          }
        });

        $(document).on('click','.element', function(e){
          if (!e.target.classList.contains("context_menu_button") && !(e.target.parentNode.parentNode.className == "context_menu")) {
            var element = $(this);
            var sectionID = element.id;
            console.log("trial_page: ", "element is clicked");
          }
        });

            
        // param: parent node, sort options
        function displayTable(parent_id) {
          delElementByTagName("TBODY");

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              $(document.getElementById("thead")).after( this.responseText );
            }
          };
          xhttp.open("GET", "getTable.php?q=" + parent_id, true);
          xhttp.send();
        }

        function delElementByTagName(tag){
          var element = document.getElementsByTagName(tag)[0];
          if(element)
            element.remove(); 
        }

    </script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
        $(document).on("click", function(event){
          if($(event.target).hasClass('context_menu_button'))
            return;
          var $trigger = $(".context_menu_button");
          if($trigger !== event.target && !$trigger.has(event.target).length){
              hideAnyContextMenu(0);
          } 
        });
    </script>

  </body>

</html>