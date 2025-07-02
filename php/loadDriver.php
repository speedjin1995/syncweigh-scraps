<?php
## Database configuration
include '../layouts/session.php';
require_once 'db_connect.php';
require_once 'requires/lookup.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column driver_name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($db,$_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
  $searchQuery = " and (driver_name like '%".$searchValue."%' or driver_ic like '%".$searchValue."%' or driver_code like '%".$searchValue."%')";
}

if ($_SESSION["roles"] != 'SADMIN'){
  $username = implode("', '", $_SESSION['plant_id']);

  $searchQuery .= " and plant IN ('$username')";
}

## Total number of records without filtering
$sel = mysqli_query($db,"select count(*) as allcount from Driver");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($db,"select count(*) as allcount from Driver WHERE status = '0'".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from Driver WHERE status = '0'".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($db, $empQuery);
$data = array();

while($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array( 
      "id"=>$row['id'],
      "driver_code"=>$row['driver_code'],
      "driver_name"=>$row['driver_name'],
      "driver_ic"=>$row['driver_ic'],
      "driver_phone"=>$row['driver_phone'],
      "plant"=>searchPlantNameById($row['plant'],$db)
    );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);

?>