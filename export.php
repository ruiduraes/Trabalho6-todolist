<?php  
      //export.php  
      session_start();
      $id_user = $_SESSION['id_user'];
      $connect = mysqli_connect("localhost", "root", "", "to-do");
      $output = '';
      if(isset($_POST["export"]))
      {
       $query = "SELECT * FROM tarefa WHERE id_user = '$id_user'";
       $result = mysqli_query($connect, $query);
       if(mysqli_num_rows($result) > 0)
       {
        $output .= '
         <table class="table" bordered="1">  
                          <tr>  
                               <th>ID</th>  
                               <th>Tarefa</th>  
                          </tr>
        ';
        while($row = mysqli_fetch_array($result))
        {
         $output .= '
          <tr>  
                               <td>'.$row["id_tarefa"].'</td>  
                               <td>'.$row["descricao"].'</td>  
                          </tr>
         ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=tarefas.xls');
        echo $output;
       }
      }
 ?>  