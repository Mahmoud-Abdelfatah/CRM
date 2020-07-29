<?php 

    require_once '../../core/init.php';
 $call_hist_data=$_SESSION['crm_rep'];
$user = $_SESSION['user_data'];

      //    $date =strtotime('2019-12-15');


      // if ( date('Y m d')>=date('Y m d',$date)) {
      //      return header('location:index.php');
      // }

?>
<!DOCTYPE html>
<html>
<head>


  <title></title>
   
       <!-- style links -->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../styless/TableExport-master/src/stable/css/tableexport.css"> 



   <!-- scripts -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>  
  <script src="../styless/jquery-3.4.1.min.js"></script>
  <script src="../styless/Blob.js-master/Blob.js"></script>
  <script src="../styless/js-xlsx-master/xlsx.core.js"></script>
  <script src="../styless/FileSaver.js-master/FileSaver.js"></script>
    <script src="../styless/TableExport-master/src/stable/js/tableexport.js"></script>
        <script type="text/javascript">
    $( document ).ready(function() {
      $("table").tableExport({
  headings: true,                    // (Boolean), display table headings (th/td elements) in the <thead>
  bootstrap: false,                   // (Boolean), style buttons using bootstrap
    footers: true,                     // (Boolean), display table footers (th/td elements) in the <tfoot>
    formats: ["xlsx", "csv", "txt"],    // (String[]), filetypes for the export
    fileName: "id",                    // (id, String), filename for the downloaded file
    
    position: "top",                 // (top, bottom), position of the caption element relative to table
    ignoreRows: null,                  // (Number, Number[]), row indices to exclude from the exported file(s)
    ignoreCols: null,                  // (Number, Number[]), column indices to exclude from the exported file(s)
    ignoreCSS: ".tableexport-ignore",  // (selector, selector[]), selector(s) to exclude from the exported file(s)
    emptyCSS: ".tableexport-empty",    // (selector, selector[]), selector(s) to replace cells with an empty string in the exported file(s)
    trimWhitespace: false              // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s)

});
});

    </script>
</head>
<body style="background-color: #DEDEDE;">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../Clients/index.php">Customer Care</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">

    <ul class="nav navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link " href="../Clients/index.php">Search</a>
      </li>
            <li class="nav-item dropdown " >

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php

            echo $user[0]['user_name'];
          ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../../controller/Auth_controller.class.php?status=logout">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<div class="container" >

    <div class="row">     
      <div class="col-md-12">

        <div class="panel panel-primary">
<!--          <div class="panel-heading">
            <h3 class="panel-title">Call History</h3>
          </div> -->



<br>
          <a href="index.php">Back</a> 
 <table class="table table-hover"  >
  <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Call Start</th>
            <th scope="col">Call End</th>
            <th scope="col">Call DURATION</th>            
            <th scope="col">Agent</th>
            <th scope="col">FULL NAME</th>            
            <th scope="col">Location</th>
            <th scope="col">BID</th>  
            <th scope="col">Type</th> 
            <th scope="col">Stype</th>   
            <th scope="col">Domain Name</th>  
            <th scope="col">Fresh Desk ID</th>  
            <th scope="col">Customer Number</th>
            <th scope="col">Call Status</th>
            <th scope="col">TRACKNUM</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Email</th>                        
                                                                                              
          </tr>
  </thead>
  <tbody>

       <?php

          $counter =0;

if (!empty($call_hist_data)) {


          foreach ($call_hist_data as  $data) {





            echo '<tr>';
            echo '<td>'.++$counter.'</td>';              
            echo '<td>'.$data['START_TIME'].'</td>';
            echo '<td>'.$data['END_TIME'].'</td>'; 
            echo '<td>'.$data['TALK_TIME'].'</td>';                         
            echo '<td>'.$data['AGENT_ID'].'</td>';
            echo '<td>'.$data['FIRST_NAME'].' '.$data['LAST_NAME'].'</td>';             
            switch ($data['DNIS']) {
              case '33473100':
              echo '<td>'.'Egypt'.'</td>';                      
              break;
              case '8080':
              echo '<td>'.'Kuwait'.'</td>';                      
              break;
              case '5191006':
              echo '<td>'.'KSA'.'</td>';                      
              break;
              case '5060':
              echo '<td>'.'UAE'.'</td>';                      
              break; 
              case '33473101':
              echo '<td>'.'Egypt'.'</td>';                      
              break;
                            case '33473103':
              echo '<td>'.'Egypt'.'</td>';                      
              break;
                            case '33473104':
              echo '<td>'.'Egypt'.'</td>';                      
              break;
                            case '33473105':
              echo '<td>'.'Egypt'.'</td>';                      
              break;
                            case '33473106':
              echo '<td>'.'Egypt'.'</td>';                      
              break;
              default:
                echo '<td>'.''.'</td>';
              break;

            }
             echo '<td>'.$data['booking_id'].'</td>';
             echo '<td>'.$data['cat_name'].'</td>';
             echo '<td>'.$data['sub_name'].'</td>'; 
             echo '<td>'.$data['b_location'].'</td>'; 
             echo '<td>'.$data['fdisk_id'].'</td>'; 
             echo '<td>'.$data['ANI'].'</td>';    
             echo '<td>'.$data['call_status'].'</td>';            
             echo '<td>'.$data['TRACKNUM'].'</td>';  
             echo '<td>'.$data['c_name'].'</td>'; 
             echo '<td>'.$data['c_email'].'</td>';                                                 
            echo '</tr>';

          }
}                    


       ?>

  </tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>
