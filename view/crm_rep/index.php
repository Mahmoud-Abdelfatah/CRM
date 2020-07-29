<?php

 require_once '../../core/init.php';

if (!isset($_SESSION['user_data'])) {
  header('location:../Auth/login.php');
}else
{
      $user = $_SESSION['user_data'];
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>



 <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.0.0/flatly/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="datetime_style/build/css/bootstrap-datetimepicker.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<script src="datetime_style/build/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss'

                });
                $('#datetimepicker2').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss'

                });                
            });
        </script>

<style>
body { background-color: #fafafa; }
.container { margin-top: 150px; }
</style>
</head>
<!-- body -->
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
	<div class="col-md-8 offset-md-2 " style="margin-top: -100px;">
<div class="card" style="border-color: #435d7d;" >
  <div class="card-header" style="background-color: #435d7d; ">
    Report view
  </div>
  <div class="card-body" style="">
           <form action="../../controller/Report_controller.class.php" method="Post">

			<div class="row">

				<div class='col-sm-6'>
					<div class="form-group">
						<label>Start Date</label>
							<input type='text' class="form-control" name="Sdate"  id='datetimepicker1'/>
						</div>
				</div>

				<div class='col-sm-6'>
					<div class="form-group">
						<label>End Date</label>
							<input type='text' class="form-control"  name="Edate" id='datetimepicker2' />
					</div>
				</div>

			</div>
			<div class="row">
				<div class='col-sm-6'>
					<div class="form-group">
						<label>Column Search</label>
						<div class='input-group date' id='datetimepicker1'>
							<select class="selectpicker form-control"  name="options" onchange="get_selected(this.value)">
                 <option>Select Option</option>
                  <option>ANI</option>
                  <option>Booking ID</option>
                  <option>Agent ID</option>
                  <option>Fresh Desk ID</option>  
                  <option>Call Status</option>                                  
                  <option>All Options</option>
							</select >
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>

        <div class='col-sm-6' >
          <div class="form-group">
            <label>ANI Search</label>
            <div class='input-group date' id='datetimepicker1'>
              <input type="text" name="ANI" class="form-control" id="ANI" disabled>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>

			</div>
      <div class="row">
        <div class='col-sm-6'>
          <div class="form-group">
            <label>Booking ID Search</label>
            <div class='input-group date' id='datetimepicker1'>
              <input type="text" name="booking_id" class="form-control" id="booking_id" disabled>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>

        <div class='col-sm-6'>
          <div class="form-group">
            <label>Agent ID Search</label>
            <div class='input-group date' id='datetimepicker1'>
              <input type="text" name="agent_id" class="form-control" id="agent_id" disabled>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class='col-sm-6'>
          <div class="form-group">
            <label>Fresh Desk ID</label>
            <div class='input-group date' id='datetimepicker1'>
              <input type="text" name="fresh_id" class="form-control" id="fresh_id" disabled>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>
        <div class='col-sm-6'>
          <div class="form-group">
            <label>Call Status</label>
            <div class='input-group date' id='datetimepicker1'>
<!--               <input type="text" name="call_status" class="form-control" id="call_status" disabled> -->
            <select name="call_status" class="form-control" id="call_status" disabled>
              <option></option>
              <option>Closed</option>
              <option>Escalated</option>
              <option>Pending for fees</option>
              <option>Pending for Ops reply</option>              
            </select> 
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>

      </div>      
			  <input type="submit" name="call_histo_submit" value="Submit" class="btn btn-primary" style="float: right">
			</form>
  </div>
</div>
</div>
</div>

         <script type="text/javascript">
           function get_selected(data)
               {

                  if(data=='ANI')
                  {
                   document.getElementById("ANI").disabled=false;
                   document.getElementById("booking_id").disabled=true;
                   document.getElementById("agent_id").disabled=true;
                   document.getElementById("fresh_id").disabled=true; 
                   document.getElementById("call_status").disabled=true;                                     
                  }
                  else if(data=='Booking ID')
                  {
                   document.getElementById("ANI").disabled=true;
                   document.getElementById("booking_id").disabled=false;
                   document.getElementById("agent_id").disabled=true;
                   document.getElementById("fresh_id").disabled=true;
                   document.getElementById("call_status").disabled=true;                                                         
                  }else if (data=='Agent ID') 
                  {
                   document.getElementById("ANI").disabled=true;
                   document.getElementById("booking_id").disabled=true;
                   document.getElementById("agent_id").disabled=false;
                   document.getElementById("fresh_id").disabled=true;
                   document.getElementById("call_status").disabled=true;                                      
                  }else if(data=='Fresh Desk ID')
                  {
                   document.getElementById("ANI").disabled=true;
                   document.getElementById("booking_id").disabled=true;
                   document.getElementById("agent_id").disabled=true;
                   document.getElementById("call_status").disabled=true;              
                   document.getElementById("fresh_id").disabled=false;                   
                  }else if(data=='Call Status')
                  {
                   document.getElementById("ANI").disabled=true;
                   document.getElementById("booking_id").disabled=true;
                   document.getElementById("agent_id").disabled=true;
                   document.getElementById("fresh_id").disabled=true;  
                   document.getElementById("call_status").disabled=false; 
                  }
                  else if(data=='All Options')
                  {
                   document.getElementById("ANI").disabled=false;
                   document.getElementById("booking_id").disabled=false;
                   document.getElementById("agent_id").disabled=false;
                   document.getElementById("fresh_id").disabled=false; 
                   document.getElementById("call_status").disabled=false;
                  }


                }
         </script>

    </body>

    </html>
