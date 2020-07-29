<?php

class Report{





  public function get_calls_histo($sdate,$edate,$options=array())
  {
    $data='';
if (!empty($sdate) && empty($options)) { //only date
  $data = DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
on datamart_call_details.tracknum=booking_new.tracknum
LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id left join cfg_person on datamart_call_details.AGENT_ID=cfg_person.LOGIN_ID','START_TIME>="'.$sdate.'" and START_TIME<="'.$edate.'" and datamart_call_details.direction="inbound" ');
  if (!$data) {
    echo 'No data Found';
  }

}else if (empty($sdate) && !empty($options)) { // only options

      if (!empty($options['ANI']) && !empty($options['booking_id']) && !empty($options['agent_id']) && !empty($options['fresh_id']) && !empty($_POST['call_status'])) // all options selected
      {

        $data =DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
on datamart_call_details.tracknum=booking_new.tracknum
LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id left join cfg_person on datamart_call_details.AGENT_ID=cfg_person.LOGIN_ID','datamart_call_details.ANI="'.$options['ANI'].'"  and booking_new.booking_id="'.$options['booking_id'].'" and datamart_call_details.AGENT_ID="'.$options['agent_id'].'" and booking_new.fdisk_id ="'.$options['fresh_id'].'" and booking_new.call_status="'.$options['call_status'].'" and datamart_call_details.direction="inbound" ');
          if (!$data) {
    echo 'No data Found';
  }

      }else if(!empty($options['ANI']) && empty($options['booking_id']) && empty($options['agent_id']) && empty($options['fresh_id']) && empty($_POST['call_status'])) // ANI only selected 
      {
        $data =DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
on datamart_call_details.tracknum=booking_new.tracknum
LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id left join cfg_person on datamart_call_details.AGENT_ID=cfg_person.LOGIN_ID','datamart_call_details.ANI="'.$options['ANI'].'" and datamart_call_details.direction="inbound" ');
          if (!$data) {
    echo 'No data Found';
  }

      }else if (empty($options['ANI']) && !empty($options['booking_id']) && empty($options['agent_id']) && empty($options['fresh_id']) && empty($_POST['call_status']))  // Booking Id only selected
       {
        $data =DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
on datamart_call_details.tracknum=booking_new.tracknum
LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id left join cfg_person on datamart_call_details.AGENT_ID=cfg_person.LOGIN_ID','booking_new.booking_id="'.$options['booking_id'].'" and datamart_call_details.direction="inbound" ');

          if (!$data) {
    echo 'No data Found';
  }

      }else if (empty($options['ANI']) && empty($options['booking_id']) && !empty($options['agent_id']) && empty($options['fresh_id']) && empty($_POST['call_status'])) // Agent Id only selected
      {
        $data =DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
on datamart_call_details.tracknum=booking_new.tracknum
LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id left join cfg_person on datamart_call_details.AGENT_ID=cfg_person.LOGIN_ID','datamart_call_details.AGENT_ID="'.$options['agent_id'].'" and datamart_call_details.direction="inbound" ');

          if (!$data) {
    echo 'No data Found';
  }

      }else if(empty($options['ANI']) && empty($options['booking_id']) && empty($options['agent_id']) && !empty($options['fresh_id']) && empty($_POST['call_status'])) // Fresh Id only selected
      {
        $data =DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
on datamart_call_details.tracknum=booking_new.tracknum
LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id left join cfg_person on datamart_call_details.AGENT_ID=cfg_person.LOGIN_ID','booking_new.fdisk_id="'.$options['fresh_id'].'"  and datamart_call_details.direction="inbound" ');
          if (!$data) {
    echo 'No data Found';
  }        

      }else if(empty($options['ANI']) && empty($options['booking_id']) && empty($options['agent_id']) && empty($options['fresh_id']) && !empty($_POST['call_status'])) // Call Status
      {
        $data =DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
on datamart_call_details.tracknum=booking_new.tracknum
LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id left join cfg_person on datamart_call_details.AGENT_ID=cfg_person.LOGIN_ID','booking_new.call_status="'.$options['call_status'].'" and datamart_call_details.direction="inbound" ');
          if (!$data) {
    echo 'No data Found';
  }         
      }


}else  // all date
{
        if (!empty($options['ANI']) && !empty($options['booking_id']) && !empty($options['agent_id']) && !empty($options['fresh_id']) && !empty($_POST['call_status'])) // all options with date
          {

        $data =DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
on datamart_call_details.tracknum=booking_new.tracknum
LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id left join cfg_person on datamart_call_details.AGENT_ID=cfg_person.LOGIN_ID','datamart_call_details.ANI="'.$options['ANI'].'"  and booking_new.booking_id="'.$options['booking_id'].'" and datamart_call_details.AGENT_ID="'.$options['agent_id'].'"  and booking_new.fdisk_id ="'.$options['fresh_id'].'" and booking_new.call_status="'.$_POST['call_status'].'" and START_TIME>="'.$sdate.'" and START_TIME<="'.$edate.'" and datamart_call_details.direction="inbound" ');
          if (!$data) {
    echo 'No data Found';
  }
      }else if(!empty($options['ANI']) && empty($options['booking_id']) && empty($options['agent_id']) && empty($options['fresh_id']) && empty($_POST['call_status'])) // only ANI with date
      {
        $data =DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
on datamart_call_details.tracknum=booking_new.tracknum
LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id left join cfg_person on datamart_call_details.AGENT_ID=cfg_person.LOGIN_ID','datamart_call_details.ANI="'.$options['ANI'].'" and datamart_call_details.START_TIME>="'.$sdate.'" and datamart_call_details.START_TIME<="'.$edate.'" and datamart_call_details.direction="inbound" ');

          if (!$data) {
    echo 'No data Found';
  }

      }else if (empty($options['ANI']) && !empty($options['booking_id']) && empty($options['agent_id']) && empty($options['fresh_id']) && empty($_POST['call_status']))  // only Booking with date 
      {
        $data =DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
on datamart_call_details.tracknum=booking_new.tracknum
LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id left join cfg_person on datamart_call_details.AGENT_ID=cfg_person.LOGIN_ID','booking_new.booking_id="'.$options['booking_id'].'" and START_TIME>="'.$sdate.'" and START_TIME<="'.$edate.'" and datamart_call_details.direction="inbound"');

          if (!$data) {
    echo 'No data Found';
  }

      }else if (empty($options['ANI']) && empty($options['booking_id']) && !empty($options['agent_id']) && empty($options['fresh_id']) && empty($_POST['call_status']))  // only Agent Id with date 
      {
        $data =DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
on datamart_call_details.tracknum=booking_new.tracknum
LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id left join cfg_person on datamart_call_details.AGENT_ID=cfg_person.LOGIN_ID','datamart_call_details.AGENT_ID="'.$options['agent_id'].'" and START_TIME>="'.$sdate.'" and START_TIME<="'.$edate.'" and datamart_call_details.direction="inbound" ');
          if (!$data) {
    echo 'No data Found';
  }
  
      }else if(empty($options['ANI']) && empty($options['booking_id']) && empty($options['agent_id']) && !empty($options['fresh_id']) && empty($_POST['call_status'])) // only Fresh Id with date 
      {
        $data =DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
on datamart_call_details.tracknum=booking_new.tracknum
LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id left join cfg_person on datamart_call_details.AGENT_ID=cfg_person.LOGIN_ID','booking_new.fdisk_id="'.$options['fresh_id'].'" and START_TIME>="'.$sdate.'" and START_TIME<="'.$edate.'" and datamart_call_details.direction="inbound" ');      	

                  if (!$data) {
    echo 'No data Found';
  }

      }else if(empty($options['ANI']) && empty($options['booking_id']) && empty($options['agent_id']) && empty($options['fresh_id']) && !empty($_POST['call_status'])) // only Call Status with date 
      {
        $data =DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
on datamart_call_details.tracknum=booking_new.tracknum
LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id left join cfg_person on datamart_call_details.AGENT_ID=cfg_person.LOGIN_ID','booking_new.call_status="'.$options['call_status'].'" and START_TIME>="'.$sdate.'" and START_TIME<="'.$edate.'" and datamart_call_details.direction="inbound" ');       

                  if (!$data) {
    echo 'No data Found';
  }
  
      }

}


if ($data) {
  $_SESSION['crm_rep'] = $data;
  return header('location:../view/crm_rep/view_data.php');
}

}

}


if (isset($_POST['call_histo_submit'])) {
  require_once '../core/init.php';
  $new_report = new Report();
  $options = array();
  if ((empty($_POST['Sdate']) || empty($_POST['Edate'])) && (!empty($_POST['ANI']) || !empty($_POST['booking_id']) || !empty($_POST['agent_id']) || !empty($_POST['fresh_id']) || !empty($_POST['call_status']) ))  ///no date selected but one option selected
   {
    $options['ANI']=$_POST['ANI'];
    $options['booking_id']=$_POST['booking_id'];
    $options['agent_id']=$_POST['agent_id'];
    $options['fresh_id']=$_POST['fresh_id']; 
    $options['call_status']=$_POST['call_status'];  
    $new_report->get_calls_histo('','',$options);

  }else if((empty($_POST['ANI']) && empty($_POST['booking_id']) && empty($_POST['agent_id']) && empty($_POST['fresh_id']) && empty($_POST['call_status'])) && !empty($_POST['Sdate']) && !empty($_POST['Edate'])) // no options selected but date selected
  {
    $new_report->get_calls_histo($_POST['Sdate'],$_POST['Edate'],'');

  }else if((!empty($_POST['ANI']) || !empty($_POST['booking_id']) || !empty($_POST['agent_id']) || !empty($_POST['fresh_id']) || !empty($_POST['call_status'])) && !empty($_POST['Sdate']) && !empty($_POST['Edate'])) // one option select and date select 
  {
    $options['ANI']=$_POST['ANI'];
    $options['booking_id']=$_POST['booking_id'];
    $options['agent_id']=$_POST['agent_id'];  
    $options['fresh_id']=$_POST['fresh_id']; 
    $options['call_status']=$_POST['call_status'];         
    $new_report->get_calls_histo($_POST['Sdate'],$_POST['Edate'],$options);
  }
  else if((empty($_POST['ANI']) && empty($_POST['booking_id']) && empty($_POST['agent_id']) && empty($_POST['fresh_id']) && empty($_POST['call_status'])) && empty($_POST['Sdate']) && empty($_POST['Edate'])) // no option or date selected 
  {
    echo "wrong values enterd";
  }else if((empty($_POST['Sdate']) || empty($_POST['Edate'])) && (empty($_POST['ANI']) && empty($_POST['booking_id']) && empty($_POST['agent_id']) && empty($_POST['fresh_id']) && empty($_POST['call_status'])))   // start date or end date but not both  and no option selected 
  {
    echo "wrong values enterd";
  }

// $report = new Report();
// $report_data=array();

// foreach ($_POST['queue'] as  $queue) {

// 	$report_data []= $report->get_queue_report($_POST['Sdate'],$_POST['Edate'],$queue);

// }
// $_SESSION['get_queue_report_data'] = $report_data;
// return header('location:../view/queue/view_data.php');



}





