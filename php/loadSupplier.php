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
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($db,$_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
  $searchQuery = " and (name like '%".$searchValue."%' or company_reg_no like '%".$searchValue."%' or supplier_code like '%".$searchValue."%')";
}

if ($_SESSION["roles"] != 'SADMIN'){
  $username = implode("', '", $_SESSION['plant_id']);

  $searchQuery .= " and plant IN ('$username')";
}

## Total number of records without filtering
$sel = mysqli_query($db,"select count(*) as allcount from Supplier");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($db,"select count(*) as allcount from Supplier WHERE status = '0'".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from Supplier WHERE status = '0'".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($db, $empQuery);
$data = array();

while($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array( 
      "id"=>$row['id'],
      "supplier_code"=>$row['supplier_code'],
      "name"=>$row['name'],
      "company_reg_no"=>$row['company_reg_no'],
      "new_reg_no"=>$row['new_reg_no'],
      "address_line_1"=>$row['address_line_1'],
      "address_line_2"=>$row['address_line_2'],
      "address_line_3"=>$row['address_line_3'],
      "phone_no"=>$row['phone_no'],
      "fax_no"=>$row['fax_no'],
      "contact_name"=>$row['contact_name'],
      "ic_no"=>$row['ic_no'],
      "tin_no"=>$row['tin_no'],
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