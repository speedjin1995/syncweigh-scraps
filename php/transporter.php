<?php
require_once 'db_connect.php';

session_start();

if(!isset($_SESSION['id'])){
	echo '<script type="text/javascript">location.href = "../login.php";</script>'; 
} else{
	$username = $_SESSION["username"];
}
// Check if the user is already logged in, if yes then redirect him to index page
$id = $_SESSION['id'];

// Processing form data when form is submitted
if (isset($_POST['transporterCode'])) {

    if (empty($_POST["id"])) {
        $transporterId = null;
    } else {
        $transporterId = trim($_POST["id"]);
    }

    if (empty($_POST["transporterCode"])) {
        $transporterCode = null;
    } else {
        $transporterCode = trim($_POST["transporterCode"]);
    }

    if (empty($_POST["companyRegNo"])) {
        $companyRegNo = null;
    } else {
        $companyRegNo = trim($_POST["companyRegNo"]);
    }

    if (empty($_POST["newRegNo"])) {
        $newRegNo = null;
    } else {
        $newRegNo = trim($_POST["newRegNo"]);
    }

    if (empty($_POST["companyName"])) {
        $companyName = null;
    } else {
        $companyName = trim($_POST["companyName"]);
    }

    if (empty($_POST["addressLine1"])) {
        $addressLine1 = null;
    } else {
        $addressLine1 = trim($_POST["addressLine1"]);
    }

    if (empty($_POST["addressLine2"])) {
        $addressLine2 = null;
    } else {
        $addressLine2 = trim($_POST["addressLine2"]);
    }

    if (empty($_POST["addressLine3"])) {
        $addressLine3 = null;
    } else {
        $addressLine3 = trim($_POST["addressLine3"]);
    }

    if (empty($_POST["phoneNo"])) {
        $phoneNo = null;
    } else {
        $phoneNo = trim($_POST["phoneNo"]);
    }

    if (empty($_POST["faxNo"])) {
        $faxNo = null;
    } else {
        $faxNo = trim($_POST["faxNo"]);
    }

    if (empty($_POST["contactName"])) {
        $contactName = null;
    } else {
        $contactName = trim($_POST["contactName"]);
    }

    if (empty($_POST["icNo"])) {
        $icNo = null;
    } else {
        $icNo = trim($_POST["icNo"]);
    }

    if (empty($_POST["tinNo"])) {
        $tinNo = null;
    } else {
        $tinNo = trim($_POST["tinNo"]);
    }
    
    if (empty($_POST["plant"])) {
        $plant = null;
    } else {
        $plant = trim($_POST["plant"]);
    }

    if(! empty($transporterId))
    {
        // $sql = "UPDATE Customer SET company_reg_no=?, name=?, address_line_1=?, address_line_2=?, address_line_3=?, phone_no=?, fax_no=?, created_by=?, modified_by=? WHERE customer_code=?";
        $action = "2";
        if ($update_stmt = $db->prepare("UPDATE Transporter SET transporter_code=?, company_reg_no=?, new_reg_no=?, name=?, address_line_1=?, address_line_2=?, address_line_3=?, phone_no=?, fax_no=?, contact_name=?, ic_no=?, tin_no=?, plant=?, created_by=?, modified_by=? WHERE id=?")) 
        {
            $update_stmt->bind_param('ssssssssssssssss', $transporterCode, $companyRegNo, $newRegNo, $companyName, $addressLine1, $addressLine2, $addressLine3, $phoneNo, $faxNo, $contactName, $icNo, $tinNo, $plant, $username, $username, $transporterId);

            // Execute the prepared query.
            if (! $update_stmt->execute()) {
                echo json_encode(
                    array(
                        "status"=> "failed", 
                        "message"=> $update_stmt->error
                    )
                );
            }
            else{

                if ($insert_stmt = $db->prepare("INSERT INTO Transporter_Log (transporter_id, transporter_code, company_reg_no, new_reg_no, name, address_line_1, address_line_2, address_line_3, phone_no, fax_no, contact_name, ic_no, tin_no, plant, action_id, action_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
                    $insert_stmt->bind_param('ssssssssssssssss', $transporterId, $transporterCode, $companyRegNo, $newRegNo, $companyName, $addressLine1, $addressLine2, $addressLine3, $phoneNo, $faxNo, $contactName, $icNo, $tinNo, $plant, $action, $username);
        
                    // Execute the prepared query.
                    if (! $insert_stmt->execute()) {
                        // echo json_encode(
                        //     array(
                        //         "status"=> "failed", 
                        //         "message"=> $insert_stmt->error
                        //     )
                        // );
                    }
                    else{
                        $insert_stmt->close();
                        
                        // echo json_encode(
                        //     array(
                        //         "status"=> "success", 
                        //         "message"=> "Added Successfully!!" 
                        //     )
                        // );
                    }

                    $update_stmt->close();
                    $db->close();

                    echo json_encode(
                        array(
                            "status"=> "success", 
                            "message"=> "Updated Successfully!!" 
                        )
                    );
                }
            }
        }
    }
    else
    {
        $action = "1";
        if ($insert_stmt = $db->prepare("INSERT INTO Transporter (transporter_code, company_reg_no, new_reg_no, name, address_line_1, address_line_2, address_line_3, phone_no, fax_no, contact_name, ic_no, tin_no, plant, created_by, modified_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssssssssssssss', $transporterCode, $companyRegNo, $newRegNo, $companyName, $addressLine1, $addressLine2, $addressLine3, $phoneNo, $faxNo, $contactName, $icNo, $tinNo, $plant, $username, $username);

            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                echo json_encode(
                    array(
                        "status"=> "failed", 
                        "message"=> $insert_stmt->error
                    )
                );
            }
            else{
                echo json_encode(
                    array(
                        "status"=> "success", 
                        "message"=> "Added Successfully!!" 
                    )
                );

                $sel = mysqli_query($db,"select count(*) as allcount from Transporter");
                $records = mysqli_fetch_assoc($sel);
                $totalRecords = $records['allcount'];

                if ($insert_log = $db->prepare("INSERT INTO Transporter_Log (transporter_id, transporter_code, company_reg_no, new_reg_no, name, address_line_1, address_line_2, address_line_3, phone_no, fax_no, contact_name, ic_no, tin_no, plant, action_id, action_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
                    $insert_log->bind_param('ssssssssssssssss', $totalRecords, $transporterCode, $companyRegNo, $newRegNo, $companyName, $addressLine1, $addressLine2, $addressLine3, $phoneNo, $faxNo, $contactName, $icNo, $tinNo, $plant, $action, $username);
        
                    // Execute the prepared query.
                    if (! $insert_log->execute()) {
                        // echo json_encode(
                        //     array(
                        //         "status"=> "failed", 
                        //         "message"=> $insert_stmt->error
                        //     )
                        // );
                    }
                    else{
                        $insert_log->close();
                        // echo json_encode(
                        //     array(
                        //         "status"=> "success", 
                        //         "message"=> "Added Successfully!!" 
                        //     )
                        // );
                    }
                }

                $insert_stmt->close();
                $db->close();
                
            }
        }
    }
    
}
else
{
    echo json_encode(
        array(
            "status"=> "failed", 
            "message"=> "Please fill in all the fields"
        )
    );
}
?>