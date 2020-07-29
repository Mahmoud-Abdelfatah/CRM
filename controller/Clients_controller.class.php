<?php

/**
 * 
 */
class Clients 
{
	private $_tracknum = null,
          $_ani = null,
          $_agentId = null;
    function index()
    {

        return header('location:views/Clients/index.php');
    }


    function client_search($number,$truknum=null)
    {



        $data=DB::getInstance()->select('*','Clients','client_number="'.$number.'" or client_snumber="'.$number.'"');



//         $call_hist_data=DB::getInstance()->select('*','datamart_call_details LEFT JOIN booking_new
// on datamart_call_details.tracknum=booking_new.tracknum
// LEFT JOIN cats ON cats.id=booking_new.cat_id LEFT JOIN sub_cat ON sub_cat.id=booking_new.sub_id','datamart_call_details.ANI="'.$number.'"  ');
        // $call_hist_details = array();



        if ($data) {
            
              // $_SESSION['call_hist_data']=$call_hist_data;
              $_SESSION['search_data']= $data;
            return header('location:../view/Clients/View_Client.php?tracknum='.$truknum.'');
        }else
        {
            return header('location:../view/Clients/Add_Client_v1.php?ANI='.$number.'&tracknum='.$truknum.'');
        }
    }


    function client_add($f_name,$l_name,$phone,$sphone,$email)
    {


        DB::getInstance()->insert('Clients',array('first_name','last_name','Client_number','Client_snumber','client_email'),array("'$f_name","$l_name","$phone","$sphone","$email'"),'');
    }

    function add_booking_id($booking_id,$Category,$Subcategory,$location,$freshdisk_id,$call_status,$c_email,$c_name,$ANI,$AGINT_ID,$TRACKNUM)
    {


        $num =$TRACKNUM;
         echo 'call_track_num = '.$num.'<br>';
        // $start_time=strtotime($datetime)-10;
        // $end_time=strtotime($datetime)+1;
        // $start_time = date('Y-m-d H:i:s',$start_time);
        // $end_time = date('Y-m-d H:i:s',$end_time);
         // echo 'start time = '.$start_time.' '.'end time = '.$end_time.'<br>';
        // $ANI = $this->_ani;
        // $AGINT_ID = $this->_agentId;
        // $TRACKNUM = $this->_tracknum;

        $call_hist_data=DB::getInstance()->select('*','datamart_agent_details',' EVENT="IN_CALL_INBOUND" and  TRACKNUM="'.$TRACKNUM.'" ');


        if ($call_hist_data) {
                    foreach ($call_hist_data as $call) {
                      $call_time = $call['EVENT_TIME'];
                      DB::getInstance()->insert('booking_new',array('booking_id','call_time','b_ani','agent_id','TRACKNUM','cat_id','sub_id','b_location','call_status','fdisk_id','c_name','c_email'),array("'$booking_id","$call_time","$ANI","$AGINT_ID","$TRACKNUM","$Category","$Subcategory","$location","$call_status","$freshdisk_id","$c_name","$c_email'"),'');
                    }
                }  
                else
                {

                    echo "no call in that time ";
                }      

    }

    function client_edit($client_id)
    {


      $data = DB::getInstance()->select('*','Clients','id="'.$client_id.'"');

      if ($data) {
           $_SESSION['client_edit']=$data;
          return header('location:../view/Clients/Edit_Client.php');
      }
    }

    function client_update($f_name,$l_name,$phone,$sphone,$email,$client_id)
    {


      $update = DB::getInstance()->update('Clients','first_name="'.$f_name.'",last_name="'.$l_name.'",
      Client_number="'.$phone.'",Client_snumber="'.$sphone.'",client_email="'.$email.'" ',' id="'.$client_id.'" ');
    }


}

if (isset($_POST['search_cleint_submit'])) {
  include_once '../core/init.php';
    $client_find = new Clients();
    $client_find->client_search($_POST['Search']);
}

if (isset($_POST['add_client_submit'])) {
    include_once '../core/init.php';
    if (!empty($_POST['f_name']) && !empty($_POST['l_name']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
       $new_client = new Clients();
       $new_client->client_add($_POST['f_name'],$_POST['l_name'],$_POST['phone'],$_POST['sphone'],$_POST['email']);
       // echo $_POST['phone'];
       if (isset($_POST['TRACK_NUM'])) {
       $new_client->client_search($_POST['phone'],$_POST['TRACK_NUM']);
       }else{
       $new_client->client_search($_POST['phone']);

        }  
    }
    else
    {
        return header('location:../view/Clients/Add_Client_v1.php');
    }
}


if(isset($_POST['booking_id_submit']))
{

    include_once '../core/init.php';

    if(!empty($_POST['new_booking_id']) && $_POST['categorys']!='Select Category')
    {

     $new_booking_id= new Clients();
     $new_booking_id->add_booking_id($_POST['new_booking_id'],$_POST['categorys'],$_POST['sub_category'],$_POST['location'],$_POST['new_frechdisk_id'],$_POST['call_status'],$_POST['c_email'],$_POST['c_name'],$_POST['ANI'],$_POST['AGENT_ID'],$_POST['TRACK_NUM']);
    // $new_booking_id->client_search($_SESSION['ANI']);
    }
}

if (isset($_GET['edit'])) {
    include_once '../core/init.php';  

   $client = new Clients();
   $client->client_edit($_GET['edit']); 
}
else if(isset($_GET['ANI']))
{
    include_once '../core/init.php';
    $client_find = new Clients();
    $_SESSION['call_time'] = $_GET['time'];

    $_SESSION['ANI'] = $_GET['ANI']; // cant use session in case of user input to client data at the same time its over write each other 
    $_SESSION['agent_id'] = $_GET['AGENT'];
    $_SESSION['TackNum'] = $_GET['num'];
    // $client_find->_tracknum = $_GET['num'];
    // $client_find->_ani = $_GET['ANI'];
    // $client_find->_agentId = $_GET['AGENT'];
    $client_find->client_search($_GET['ANI'],$_GET['num']);

}

if (isset($_POST['edit_client_submit'])) {
    
    include_once '../core/init.php';


    if (!empty($_POST['f_name']) && !empty($_POST['l_name']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
        $edit_client = new Clients();
        $edit_client->client_update($_POST['f_name'],$_POST['l_name'],$_POST['phone'],$_POST['sphone'],$_POST['email'],$_POST['client_id']);
        $edit_client->client_search($_POST['phone']);
    }
}

