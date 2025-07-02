<?php

require_once 'db_connect.php';
// // Load the database configuration file 
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
if($_GET["file"] == 'weight'){
    if ($_GET["type"] == 'Weighing'){
        $weightStatus = '';
        if($_GET['weightStatus'] != null && $_GET['weightStatus'] != ''){
            $weightStatus = $_GET["weightStatus"];
        }

        $fileName = $weightStatus."-Weight-data_" . date('Y-m-d') . ".xls";
    }else{
        $fileName = "Weight-data_" . date('Y-m-d') . ".xls";
    }
}else{
    $fileName = "Count-data_" . date('Y-m-d') . ".xls";
}

## Search 
$searchQuery = "";

if($_GET['fromDate'] != null && $_GET['fromDate'] != ''){
    $date = DateTime::createFromFormat('d-m-Y', $_GET['fromDate']);
    $formatted_date = $date->format('Y-m-d 00:00:00');

    if($_GET["file"] == 'weight'){
        $searchQuery .= " and Weight.transaction_date >= '".$formatted_date."'";
    }
    else{
        $searchQuery .= " and count.transaction_date >= '".$formatted_date."'";
    }
}

if($_GET['toDate'] != null && $_GET['toDate'] != ''){
    $date = DateTime::createFromFormat('d-m-Y', $_GET['toDate']);
    $formatted_date = $date->format('Y-m-d 23:59:59');

    if($_GET["file"] == 'weight'){
        $searchQuery .= " and Weight.transaction_date <= '".$formatted_date."'";
    }
    else{
        $searchQuery .= " and count.transaction_date <= '".$formatted_date."'";
    }
}

if($_GET['status'] != null && $_GET['status'] != '' && $_GET['status'] != '-'){
    if($_GET["file"] == 'weight'){
        $searchQuery .= " and Weight.transaction_status = '".$_GET['status']."'";
    }
    else{
        $searchQuery .= " and count.transaction_status = '".$_GET['status']."'";
    }	
}

if($_GET['customer'] != null && $_GET['customer'] != '' && $_GET['customer'] != '-'){
    if($_GET["file"] == 'weight'){
        $searchQuery .= " and Weight.customer_code = '".$_GET['customer']."'";
    }
    else{
        $searchQuery .= " and count.customer_code = '".$_GET['customer']."'";
    }
}

if($_GET['vehicle'] != null && $_GET['vehicle'] != '' && $_GET['vehicle'] != '-'){
    if($_GET["file"] == 'weight'){
        $searchQuery .= " and Weight.lorry_plate_no1 = '".$_GET['vehicle']."'";
    }
    else{
        $searchQuery .= " and count.lorry_plate_no1 = '".$_GET['vehicle']."'";
    }
}

if($_GET['weighingType'] != null && $_GET['weighingType'] != '' && $_GET['weighingType'] != '-'){
    if($_GET["file"] == 'weight'){
        $searchQuery .= " and Weight.weight_type like '%".$_GET['weighingType']."%'";
    }
    else{
        $searchQuery .= " and count.weight_type like '%".$_GET['weighingType']."%'";
    }
}

if($_GET['transactionId'] != null && $_GET['transactionId'] != '' && $_GET['transactionId'] != '-'){
    if($_GET["file"] == 'weight'){
        $searchQuery .= " and Weight.transaction_id like '%".$_GET['transactionId']."%'";
    }
    else{
        $searchQuery .= " and count.weight_type like '%".$_GET['weighingType']."%'";
    }
}

if($_GET['product'] != null && $_GET['product'] != '' && $_GET['product'] != '-'){
    if($_GET["file"] == 'weight'){
        $searchQuery .= " and Weight.product_code = '".$_GET['product']."'";
    }
    else{
        $searchQuery .= " and count.product_code = '".$_GET['product']."'";
    }
}

if(isset($_GET['plant']) && $_GET['plant'] != null && $_GET['plant'] != '' && $_GET['plant'] != '-'){
    if($_GET["file"] == 'weight'){
        $searchQuery .= " and Weight.plant_code = '".$_GET['plant']."'";
    }
    else{
        $searchQuery .= " and count.raw_mat_code = '".$_GET['plant']."'";
    }
}

// Column names 
if ($_GET["type"] == 'Weighing'){
    $fields = array('TRANSACTION ID', 'WEIGHT STATUS', 'WEIGHT TYPE', 'VEHICLE', 'GROSS INCOMING (KG)', 'INCOMING DATE', 'TARE OUTGOING (KG)', 
    'OUTGOING DATE', 'NETT WEIGHT (KG)'); 

    // Fetch records from database
    if($_GET["file"] == 'weight'){

        if ($_GET["isMulti"] == 'Y'){
            $ids = $_GET['id'];
            if ($weightStatus == 'Pending'){
                $sql = "select * from Weight WHERE Weight.status = '0' and Weight.is_complete = 'N' and Weight.is_cancel <> 'Y' and id IN ($ids)";
            }elseif ($weightStatus == 'Complete'){
                $sql = "select * from Weight WHERE Weight.status = '0' and Weight.is_complete = 'Y' and Weight.is_cancel <> 'Y' and id IN ($ids)";
            }else{
                $sql = "select * from Weight WHERE Weight.status = '0' and Weight.is_cancel = 'Y' and id IN ($ids)";
            }
        }else{
            if ($weightStatus == 'Pending'){
                $sql = "select * from Weight WHERE Weight.status = '0' and Weight.is_complete = 'N' and Weight.is_cancel <> 'Y'".$searchQuery;
            }elseif ($weightStatus == 'Complete'){
                $sql = "select * from Weight WHERE Weight.status = '0' and Weight.is_complete = 'Y' and Weight.is_cancel <> 'Y'".$searchQuery;
            }else{
                $sql = "select * from Weight WHERE Weight.status = '0' and Weight.is_cancel = 'Y'".$searchQuery;
            }
        }
    }
}else{
    $fields = array('TRANSACTION ID', 'WEIGHT STATUS', 'WEIGHT TYPE', 'TRANSACTION DATE', 'LORRY NO.', 'CUSTOMER CODE', 'CUSTOMER NAME', 
    'SUPPLIER NODE', 'SUPPLIER NAME', 'PRODUCT CODE', 'PRODUCT NAME', 'PRODUCT DESCRIPTION', 'PO NO.', 'DO NO.', 'GROSS WEIGHT', 'TARE WEIGHT', 
    'NETT WEIGHT', 'IN TIME', 'OUT TIME', 'MANUAL', 'WEIGHTED BY'); 

    if($_GET["file"] == 'weight'){
        $sql = "select * from Weight WHERE Weight.status = '0' and Weight.is_complete = 'Y' and Weight.is_cancel <> 'Y'".$searchQuery;
    }
    else{
        $sql = "select count.id, count.serialNo, vehicles.veh_number, lots.lots_no, count.batchNo, count.invoiceNo, count.deliveryNo, 
        count.purchaseNo, customers.customer_name, products.product_name, packages.packages, count.unitWeight, count.tare, count.totalWeight, 
        count.actualWeight, count.currentWeight, units.units, count.moq, count.dateTime, count.unitPrice, count.totalPrice,count.totalPCS, 
        count.remark, count.deleted, status.status from count, vehicles, packages, lots, customers, products, units, status WHERE 
        count.vehicleNo = vehicles.id AND count.package = packages.id AND count.lotNo = lots.id AND count.customer = customers.id AND 
        count.productName = products.id AND status.id=count.status AND units.id=count.unit ".$searchQuery."";
    }
}

// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n";

// Fetch records from database
$query = $db->query($sql);

if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        if ($_GET["type"] == 'Weighing'){
            if($_GET["file"] == 'weight'){
                $lineData = array($row['transaction_id'], $row['transaction_status'], $row['weight_type'], $row['lorry_plate_no1'], $row['gross_weight1'], 
                $row['gross_weight1_date'], $row['tare_weight1'], $row['tare_weight1_date'], $row['nett_weight1']);
            }
        }else{
            if($_GET["file"] == 'weight'){
                $lineData = array($row['transaction_id'], $row['transaction_status'], $row['weight_type'], $row['transaction_date'], $row['lorry_plate_no1'], $row['customer_code'],
                $row['customer_name'], $row['supplier_code'], $row['supplier_name'], $row['product_code'], $row['product_name'], $row['product_description'], $row['purchase_order'],
                $row['delivery_no'], $row['gross_weight1'], $row['tare_weight1'], $row['nett_weight1'], $row['gross_weight1_date'], $row['tare_weight1_date'], $row['manual_weight'], 
                $row['created_by']);
            }else{
                $lineData = array($row['serialNo'], $row['product_name'], $row['units'], $row['unitWeight'], $row['tare'], $row['currentWeight'], $row['actualWeight'],
                $row['totalPCS'], $row['moq'], $row['unitPrice'], $row['totalPrice'], $row['veh_number'], $row['lots_no'], $row['batchNo'], $row['invoiceNo']
                , $row['deliveryNo'], $row['purchaseNo'], $row['customer_name'], $row['packages'], $row['dateTime'], $row['remark'], $row['status'], $deleted);
            }
        }

        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData;
 
exit;
?>