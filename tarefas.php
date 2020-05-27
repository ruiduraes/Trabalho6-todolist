<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="tarefas.css"> <!--Juncao com a pagina css-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do</title>
</head>

<body>

  <div class="topnav">
      <a type="button" class="active">Tarefas</a>
      <a type="button" id="btn_perfil" onClick= "location.href='perfil.php'">Perfil</a>
      <a type="button" id="btn_logout" onClick= "location.href='inicio.html'">Logout</a>
    </div>

    <form class="form" id="forma" autocomplete="off"><!--Cria a forma-->       
    <h1>Lista To-Do</h1>
    <div id="myDIV" class="header">
      <input type="text" id="myInput" placeholder="Adicione aqui a sua tarefa...">
      <span onclick="newElement()" type="submit" class="addBtn">Adicionar</span>
    </div>
    <ul id="myUL"><!--Onde as tarefas serão guardadas-->
    </ul>
  </form>
        
    <script src="inicio.js">
    </script>

  </body>
  </html>