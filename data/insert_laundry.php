<?php 
require_once('../class/Laundry.php');
if(isset($_POST['customer'])){
	$customer = $_POST['customer'];
	$priority = $_POST['priority'];
	$weight = $_POST['weight'];
	$types = $_POST['types'];
	$paket = $_POST['paket'];
	$pengambilan = $_POST['pengambilan'];
	$t = [];
	foreach($types as $type){
		$t[] = $laundry->get_type($type)['laun_type_desc'];
	}
	$type = $types[0];
	
	$t = json_encode($t, true);


	$customer = strtolower($customer);
	$customer = ucwords($customer);

	$saveLaundry = $laundry->new_laundry($customer, $priority, $weight, $type, $t, $paket, $pengambilan);
	$return['valid'] = false;
	if($saveLaundry){
		$return['valid'] = true;
		$return['msg'] = 'New Laundry Added Successfully!';
	}
	echo json_encode($return);
}//end isset
$laundry->Disconnect();