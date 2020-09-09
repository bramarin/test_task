<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
  </head>

  <body>

    <!-- Modal -->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-labelledby="modal_box_label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal_box_label">Заголовок</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="modal-name" class="col-form-label">Название:</label>
                <input type="text" class="form-control" id="modal-name">
              </div>
              <div id="modal-desc-group" class="form-group" style="display: none;">
                <label for="modal-description" class="col-form-label">Описание:</label>
                <textarea class="form-control" id="modal-description"></textarea>
              </div>
              <div id="modal-type-group" class="form-group" style="display: none;">
                <div class="btn-group col-md-12"  style="padding: 0;">
                  <button id="modal-type" type="button" class="btn btn-light dropdown-toggle col-md-12" data-toggle="dropdown">
                    Тип элемента
                  </button>
                  <div class="dropdown-menu col-md-12"  style="padding: 0; text-align: center;">
                    <a class="dropdown-item" href="#">Отзыв</a>
                    <a class="dropdown-item" href="#">Комментарий</a>
                    <a class="dropdown-item" href="#">Новость</a>
                    <a class="dropdown-item" href="#">Статья</a>
                  </div>
                </div>  
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button id="submit_button" type="button" class="btn btn-secondary" data-dismiss="modal">Подтвердить</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->

    <!-- Path string -->
    <div id="path_line"><a id="sec1" class="level" href="#">home</a></div>

    <!-- Table -->
    <div class="table-responsive-sm table_container">
      <table id="table" class="table table-borderless table-sm table-hover" cellspacing="0" width="100%">
        <thead id="thead">
          <th class="th-sm" style="width: 5%"></th>
          <th class="th-sm" style="width: 50%">Наименование</th>
          <th class="th-sm" style="width: 15%">Дата создания</th>
          <th class="th-sm" style="width: 15%">Дата модификации</th>
          <th class="th-sm" style="width: 15%">Тип</tr>
        </thead>
        <!-- Here must be getTable.php-generated <tbody></tbody> -->
      </table>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
    <script>
      $(function(){
        $(".dropdown-menu a").click(function(){
          $(".dropdown-toggle:first-child").text($(this).text());
          $(".dropdown-toggle:first-child").val($(this).text());
        });
      });

      $('#modal_box').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('label')
        var modal = $(this)
        modal.find('.modal-title').text('' + recipient)
        // show
        if(recipient == 'Добавить элемент'){
          document.getElementById("modal-type-group").style.display = "block";
          document.getElementById("modal-desc-group").style.display = "none";
        }
        else if(recipient == 'Добавить подраздел'){
          document.getElementById("modal-type-group").style.display = "none";
          document.getElementById("modal-desc-group").style.display = "block";
        }
        
        if(recipient == 'Редактировать элемент'){
          document.getElementById("modal-type-group").style.display = "block";
          document.getElementById("modal-desc-group").style.display = "none";
          var name = $(document.getElementById("el"+$idClickedRow)).data('name');
          var type = $(document.getElementById("el"+$idClickedRow)).data('type');
          document.getElementById("modal-name").value = name;
          document.getElementById("modal-type").value = name;
          if(type == ""){

          }
          else{
            $(".dropdown-toggle:first-child").text(type);
            $(".dropdown-toggle:first-child").val(type);
          }

        }
        else if(recipient == 'Редактировать раздел'){
          document.getElementById("modal-type-group").style.display = "none";
          document.getElementById("modal-desc-group").style.display = "block";
          var name = $(document.getElementById("sec"+$idClickedRow)).data('name');
          var desc = $(document.getElementById("sec"+$idClickedRow)).data('description');
          document.getElementById("modal-name").value = name;
          document.getElementById("modal-description").value = desc;
        }

        var action = button.data('action')
        if (action == 'Редактировать')
         //$(document.getElementById("submit_button")).addEventListener('click', updateEntry, false);
         document.getElementById("submit_button").onclick = updateEntry;
        else
         //$(document.getElementById("submit_button")).addEventListener('click', addEntry, false);
         document.getElementById("submit_button").onclick = addEntry;

      })


      function addEntry(){
        var id_parent =  $idClickedRow; // $idClickedRow - global var
        var name = '\'' + document.getElementById("modal-name").value + '\'';

        if($(document.getElementById("modal_box_label"))[0].innerText == 'Добавить подраздел'){
          var description = '\'' + document.getElementById("modal-description").value + '\'';
          $.ajax({
            url: "add-new-section.php",
            type: "get",
            data: { 
              id_parent: id_parent,
              name: name,
              description: description
            },
            success: function(data) {
              console.log("trial_page: ", "success: " + data);
            },
            error: function(xhr) {
                console.log("trial_page: ", xhr);
            }
          }); 
        } else if($(document.getElementById("modal_box_label"))[0].innerText == 'Добавить элемент'){
          var type = '\'' + document.getElementById("modal-type").value + '\'';
          $.ajax({
            url: "add-new-element.php",
            type: "get",
            data: { 
              id_parent: id_parent,
              name: name,
              type: type
            },
            success: function(data) {
                console.log("trial_page: ", "success: " + data);
            },
            error: function(xhr) {
                console.log("trial_page: ", xhr);
            }
          }); 
        }
        displayTable($thisSecionId);
      }

      function delElement(){
        var id_element =  $idClickedRow; // $idClickedRow - global var
        $.ajax({
          url: "delete-element.php",
          type: "get",
          data: { 
            id_element: id_element
          },
          success: function(data) {
            console.log("trial_page: ", "success: " + data);
          },
          error: function(xhr) {
              console.log("trial_page: ", xhr);
          }
        }); 
        displayTable($thisSecionId);
      };
      function delSection(){
        var id_element =  $idClickedRow; // $idClickedRow - global var
        $.ajax({
          url: "delete-section.php",
          type: "get",
          data: { 
            id_section: id_element
          },
          success: function(data) {
              console.log("trial_page: ", "success: " + data);
          },
          error: function(xhr) {
              console.log("trial_page: ", xhr);
          }
        }); 
          displayTable($thisSecionId);
      };

      function relocateElement(){
        console.log("trial_page: ", "UNSUPPORTED FUNCTIONALITY: Relocate");
      };
      function relocateSection(){
        console.log("trial_page: ", "UNSUPPORTED FUNCTIONALITY: Relocate");
      };


      function updateEntry(){
        var id =  $idClickedRow; // $idClickedRow - global var
        var name = '\'' + document.getElementById("modal-name").value + '\'';

        if($(document.getElementById("modal_box_label"))[0].innerText == 'Редактировать раздел'){
          var description = '\'' + document.getElementById("modal-description").value + '\'';
          $.ajax({
            url: "update-section.php",
            type: "get",
            data: { 
              id_section: id,
              name: name,
              description: description
            },
            success: function(data) {
                console.log("trial_page: ", "success: " + data);
            },
            error: function(xhr) {
                console.log("trial_page: ", xhr);
            }
          });  
        } else if($(document.getElementById("modal_box_label"))[0].innerText == 'Редактировать элемент'){
          var type = '\'' + document.getElementById("modal-type").value + '\'';
          $.ajax({
          url: "update-element.php",
            type: "get",
            data: { 
              id_element: id,
              name: name,
              type: type
            },
            success: function(data) {
                console.log("trial_page: ", "success: " + data);
            },
            error: function(xhr) {
                console.log("trial_page: ", xhr);
            }
          }); 
        }
        displayTable($thisSecionId);
      }

      $(document).on('click','.level', function(e){
          console.log("trial_page: ", "level_link is clicked");
          
          var elements = $(this);
          var elementId = elements[0].id;
          var sectionID = elementId.replace(/\D/g, ""); // get first and only id of this .section, then replase non digit symbols with empty str
          displayTable(sectionID);

          $('#'+elementId).nextAll().remove();
      });


      $idClickedRow = null;
      function showContextMenu(type, idOfDbEntry, element){
        $idClickedRow=idOfDbEntry;

        var wasThisMenuOpen = hideAnyContextMenu(element);
        if(wasThisMenuOpen)
          return;

        if($(element).hasClass("hidden")){
          var parent = $(element).parents( ".cont" );
          if(type == 'section')
            $(parent).after('<ul class="context_menu", id="context_menu"><li><a href="#" data-toggle="modal" data-target="#modal_box" data-label="Добавить подраздел">Добавить подраздел</a></li>' +
                                                                        '<li><a href="#" data-toggle="modal" data-target="#modal_box" data-label="Добавить элемент">Добавить элемент</a></li>' +
                                                                        '<li><a href="#" data-toggle="modal" data-target="#modal_box" data-label="Редактировать раздел" data-action="Редактировать">Редактировать</a></li>' +
                                                                        '<li><a href="#" onClick="relocateSection()">Переместить</a></li>' +
                                                                        '<li><a href="#" onClick="delSection()">Удалить</a></li>' +
                                                                        '</ul>');
          if(type == 'element')
            $(parent).after('<ul class="context_menu", id="context_menu"><li><a href="#" data-toggle="modal" data-target="#modal_box" data-label="Редактировать элемент" data-action="Редактировать">Редактировать</a></li>' +
                                                                        '<li><a href="#" onClick="relocateElement()">Переместить</a></li>' +
                                                                        '<li><a href="#" onClick="delElement()">Удалить</a></li>' +
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

      $(document).on('click','.section', function(e){
        console.log("trial_page: ", "section is clicked");
        if (!e.target.classList.contains("context_menu_button") && !(e.target.parentNode.parentNode.className == "context_menu")) {
          var elements = $(this);
          var elementId = elements[0].id;
          var sectionID = elementId.replace(/\D/g, ""); // get first and only id of this .section, then replase non digit symbols with empty str
          displayTable(sectionID);

          //add path line
          var sectionName = elements[0].getElementsByClassName("name")[0].innerHTML;
          var pathElement = '<a id="' + elementId + '" class="level" href="#">' + '\\' + sectionName + '</a>';
          var pathLineDock = document.getElementById("path_line");
          $(pathLineDock.lastChild).after(pathElement);
        }
      });

      $(document).on('click','.element', function(e){
        if (!e.target.classList.contains("context_menu_button") && !(e.target.parentNode.parentNode.className == "context_menu")) {
          var elements = $(this);
          var sectionID = elements[0].id;
          console.log("trial_page: ", "element is clicked");
        }
      });


      $thisSecionId = 0; // TODO replace it 
      // param: parent node, sort options
      function displayTable(parent_id) {
        delElementByTagName("TBODY");

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            $(document.getElementById("thead")).after( this.responseText );
          }
        };
        xhttp.open("GET", "get-table.php?q=" + parent_id, true);
        xhttp.send();

        $thisSecionId = parent_id;
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