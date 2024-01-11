<?php
session_start();
include '../../connect.php';
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i:s');

// For creating LOA of Applicants
if (isset($_POST['create_loa'])) {
    $id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['id'])));
    $shortlist_title = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['shortlist_title'])));
    $appno = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['appno'])));
    $date_shortlisted = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['date_shortlisted'])));
    $status = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['status'])));
    $type = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['type'])));
    $start_loa = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['start_loa'])));
    $end_loa = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['end_loa'])));
    $division = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['division'])));
    $category = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['category'])));
    $locator = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['locator'])));
    $client_name = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['client_name'])));
    $place_assigned = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['place_assigned'])));
    $address_assigned = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['address_assigned'])));
    $channel = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['channel'])));
    $department = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['department'])));
    $employment_status = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['employment_status'])));
    $job_title = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['job_title'])));
    $loa_template = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['loa_template'])));
    $basic_salary = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['basic_salary'])));
    $ecola = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['ecola'])));
    $communication_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['communication_allowance'])));
    $transportation_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['transportation_allowance'])));
    $internet_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['internet_allowance'])));
    $meal_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['meal_allowance'])));
    $outbase_meal = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['outbase_meal'])));
    $special_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['special_allowance'])));
    $position_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['position_allowance'])));
    $deployment_remarks = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_remarks'])));
    $no_of_days = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['no_of_days'])));
    $outlet = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['outlet'])));
    $supervisor = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['supervisor'])));
    $field_supervisor = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['field_supervisor'])));
    $field_supervisor_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['field_supervisor_designation'])));
    $deployment_personnel = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_personnel'])));
    $deployment_personnel_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_personnel_designation'])));
    $project_supervisor = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor'])));
    $project_supervisor_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor_designation'])));
    $head = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['head'])));
    $head_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['head_designation'])));
    $loa_id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['loa_id'])));

    $get_data = "SELECT * FROM employees WHERE id = '$id'";
    $get_result = $link->query($get_data);
    $get_row = $get_result->fetch_assoc();
    if (!empty($get_row['mnko']) || $get_row['mnko'] != "NA" || $get_row['mnko'] != "N/A") {
        $fullname = $get_row['lastnameko'] . ", " . $get_row['firstnameko'] . " " . $get_row['mnko'];
    } else {
        $fullname = $get_row['lastnameko'] . ", " . $get_row['firstnameko'];
    }
    $sss = $get_row['sssnum'];
    $pagibig = $get_row['pagibignum'];
    $philhealth = $get_row['phnum'];
    $tin = $get_row['tinnum'];
    $address = $get_row['paddress'];
    $contact_number = $get_row['cpnum'];

    $query = "INSERT INTO `deployment`(`shortlist_title`, `appno`, `date_shortlisted`, `employee_id`, 
        `sss`, `philhealth`, `pagibig`, `tin`, `address`, 
        `contact_number`, `loa_status`, `type`, `loa_start_date`, 
        `loa_end_date`, `division`, `category`, `locator`, `client_name`,
        `place_assigned`, `address_assigned`, `channel`, `department`, 
        `employment_status`, `job_title`, `loa_template`, 
        `basic_salary`, `ecola`, `communication_allowance`, `transportation_allowance`, 
        `internet_allowance`, `meal_allowance`, `outbase_meal`, `special_allowance`, 
        `position_allowance`, `deployment_remarks`, `no_of_days`, `outlet`, 
        `supervisor`, `field_supervisor`, `field_designation`, `deployment_personnel`, 
        `deployment_designation`, `project_supervisor`, `projectSupervisor_deployment`, 
        `head`, `head_designation`, `emp_id`) 
        VALUES ('$shortlist_title', '$appno', '$date_shortlisted', '$id', 
        '$sss', '$philhealth', '$pagibig', '$tin','$address', 
        '$contact_number','$status', '$type', '$start_loa', 
        '$end_loa', '$division', '$category', '$locator', '$client_name',
        '$place_assigned', '$address_assigned', '$channel', '$department', 
        '$employment_status', '$job_title', '$loa_template', 
        '$basic_salary', '$ecola', '$communication_allowance', '$transportation_allowance', 
        '$internet_allowance', '$meal_allowance', '$outbase_meal', '$special_allowance', 
        '$position_allowance', '$deployment_remarks', '$no_of_days', '$outlet', 
        '$supervisor', '$field_supervisor', '$field_supervisor_designation', '$deployment_personnel', 
        '$deployment_personnel_designation', '$project_supervisor', '$project_supervisor_designation', 
        '$head', '$head_designation', '$loa_id')";

    $result = $link->query($query);

    if ($result) {
        $query_history = "INSERT INTO `deployment_history`(`shortlist_title`, `appno`, `employee_name`, `date_shortlisted`, `employee_id`, 
        `sss`, `philhealth`, `pagibig`, `tin`, `address`, 
        `contact_number`, `loa_status`, `type`, `loa_start_date`, 
        `loa_end_date`, `division`, `category`, `locator`, `client_name`,
        `place_assigned`, `address_assigned`, `channel`, `department`, 
        `employment_status`, `job_title`, `loa_template`, 
        `basic_salary`, `ecola`, `communication_allowance`, `transportation_allowance`, 
        `internet_allowance`, `meal_allowance`, `outbase_meal`, `special_allowance`, 
        `position_allowance`, `deployment_remarks`, `no_of_days`, `outlet`, 
        `supervisor`, `field_supervisor`, `field_designation`, `deployment_personnel`, 
        `deployment_designation`, `project_supervisor`, `projectSupervisor_deployment`, 
        `head`, `head_designation`, `emp_id`) 
        VALUES ('$shortlist_title', '$appno', '$fullname', '$date_shortlisted', '$id', 
        '$sss', '$philhealth', '$pagibig', '$tin','$address', 
        '$contact_number','$status', '$type', '$start_loa', 
        '$end_loa', '$division', '$category', '$locator', '$client_name',
        '$place_assigned', '$address_assigned', '$channel', '$department', 
        '$employment_status', '$job_title', '$loa_template', 
        '$basic_salary', '$ecola', '$communication_allowance', '$transportation_allowance', 
        '$internet_allowance', '$meal_allowance', '$outbase_meal', '$special_allowance', 
        '$position_allowance', '$deployment_remarks', '$no_of_days', '$outlet', 
        '$supervisor', '$field_supervisor', '$field_supervisor_designation', '$deployment_personnel', 
        '$deployment_personnel_designation', '$project_supervisor', '$project_supervisor_designation', 
        '$head', '$head_designation', '$loa_id')";

        $result_history = $link->query($query_history);

        if ($result_history) {
            $update_shortlist_query = "UPDATE shortlist_master SET deployment_status = 'DEPLOYED' WHERE employee_id = '$id' AND shortlistnameto = '$shortlist_title'";
            $update_shortlist_result = $link->query($update_shortlist_query);
            if ($update_shortlist_result) {
                $update = "UPDATE shortlist_master SET is_deleted = '1' WHERE employee_id = '$id' AND shortlistnameto != '$shortlist_title'";
                $update_result = $link->query($update);
                if ($update_result) {
                    $_SESSION['successMessage'] = "Create LOA Success";
                } else {
                    $_SESSION['errorMessage'] = "SQL Errorsss: " . $link->error;
                }
            } else {
                $_SESSION['errorMessage'] = "SQL Errorss: " . $link->error;
            }
        } else {
            $_SESSION['errorMessage'] = "SQL Errors: " . $link->error;
        }
    } else {
        $_SESSION['errorMessage'] = "SQL Error: " . $link->error;
    }
    header("Location: deploy_applicants.php?shortlist_title=$shortlist_title");
    exit(0);
}

// For Updating LOA
if (isset($_POST['update_loa'])) {
    $id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['id'])));
    $emp_id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['emp_id'])));
    $shortlist_title = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['shortlist_title'])));
    $appno = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['appno'])));
    $date_shortlisted = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['date_shortlisted'])));
    $status = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['status'])));
    $type = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['type'])));
    $start_loa = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['start_loa'])));
    $end_loa = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['end_loa'])));
    $division = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['division'])));
    $category = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['category'])));
    $locator = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['locator'])));
    $client_name = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['client_name'])));
    $place_assigned = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['place_assigned'])));
    $address_assigned = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['address_assigned'])));
    $channel = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['channel'])));
    $department = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['department'])));
    $employment_status = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['employment_status'])));
    $job_title = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['job_title'])));
    $loa_template = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['loa_template'])));
    $basic_salary = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['basic_salary'])));
    $ecola = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['ecola'])));
    $communication_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['communication_allowance'])));
    $transportation_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['transportation_allowance'])));
    $internet_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['internet_allowance'])));
    $meal_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['meal_allowance'])));
    $outbase_meal = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['outbase_meal'])));
    $special_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['special_allowance'])));
    $position_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['position_allowance'])));
    $deployment_remarks = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_remarks'])));
    $no_of_days = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['no_of_days'])));
    $outlet = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['outlet'])));
    $supervisor = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['supervisor'])));
    $field_supervisor = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['field_supervisor'])));
    $field_supervisor_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['field_supervisor_designation'])));
    $deployment_personnel = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_personnel'])));
    $deployment_personnel_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['deployment_personnel_designation'])));
    $project_supervisor = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor'])));
    $project_supervisor_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['project_supervisor_designation'])));
    $head = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['head'])));
    $head_designation = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['head_designation'])));
    $loa_id = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', ($_POST['loa_id'])));

    $get_data = "SELECT * FROM employees WHERE id = '$emp_id'";
    $get_result = $link->query($get_data);
    $get_row = $get_result->fetch_assoc();
    if (!empty($get_row['mnko']) || $get_row['mnko'] != "NA" || $get_row['mnko'] != "N/A") {
        $fullname = $get_row['lastnameko'] . ", " . $get_row['firstnameko'] . " " . $get_row['mnko'];
    } else {
        $fullname = $get_row['lastnameko'] . ", " . $get_row['firstnameko'];
    }
    $sss = $get_row['sssnum'];
    $pagibig = $get_row['pagibignum'];
    $philhealth = $get_row['phnum'];
    $tin = $get_row['tinnum'];
    $address = $get_row['paddress'];
    $contact_number = $get_row['cpnum'];

    $query = "UPDATE `deployment` 
          SET `shortlist_title` = '$shortlist_title',
              `appno` = '$appno',
              `date_shortlisted` = '$date_shortlisted',
              `sss` = '$sss',
              `philhealth` = '$philhealth',
              `pagibig` = '$pagibig',
              `tin` = '$tin',
              `address` = '$address',
              `contact_number` = '$contact_number',
              `loa_status` = '$status',
              `type` = '$type',
              `loa_start_date` = '$start_loa',
              `loa_end_date` = '$end_loa',
              `division` = '$division',
              `category` = '$category',
              `locator` = '$locator',
              `client_name` = '$client_name',
              `place_assigned` = '$place_assigned',
              `address_assigned` = '$address_assigned',
              `channel` = '$channel',
              `department` = '$department',
              `employment_status` = '$employment_status',
              `job_title` = '$job_title',
              `loa_template` = '$loa_template',
              `basic_salary` = '$basic_salary',
              `ecola` = '$ecola',
              `communication_allowance` = '$communication_allowance',
              `transportation_allowance` = '$transportation_allowance',
              `internet_allowance` = '$internet_allowance',
              `meal_allowance` = '$meal_allowance',
              `outbase_meal` = '$outbase_meal',
              `special_allowance` = '$special_allowance',
              `position_allowance` = '$position_allowance',
              `deployment_remarks` = '$deployment_remarks',
              `no_of_days` = '$no_of_days',
              `outlet` = '$outlet',
              `supervisor` = '$supervisor',
              `field_supervisor` = '$field_supervisor',
              `field_designation` = '$field_supervisor_designation',
              `deployment_personnel` = '$deployment_personnel',
              `deployment_designation` = '$deployment_personnel_designation',
              `project_supervisor` = '$project_supervisor',
              `projectSupervisor_deployment` = '$project_supervisor_designation',
              `head` = '$head',
              `head_designation` = '$head_designation'
          WHERE `id` = '$id'";
    $result = $link->query($query);

    if ($result) {
        $query_history = "INSERT INTO `deployment_history`(`shortlist_title`, `appno`, `employee_name`, `date_shortlisted`, `employee_id`, 
            `sss`, `philhealth`, `pagibig`, `tin`, `address`, 
            `contact_number`, `loa_status`, `type`, `loa_start_date`, 
            `loa_end_date`, `division`, `category`, `locator`, `client_name`,
            `place_assigned`, `address_assigned`, `channel`, `department`, 
            `employment_status`, `job_title`, `loa_template`, 
            `basic_salary`, `ecola`, `communication_allowance`, `transportation_allowance`, 
            `internet_allowance`, `meal_allowance`, `outbase_meal`, `special_allowance`, 
            `position_allowance`, `deployment_remarks`, `no_of_days`, `outlet`, 
            `supervisor`, `field_supervisor`, `field_designation`, `deployment_personnel`, 
            `deployment_designation`, `project_supervisor`, `projectSupervisor_deployment`, 
            `head`, `head_designation`, `emp_id`, `date_updated`) 
            VALUES ('$shortlist_title', '$appno', '$fullname', '$date_shortlisted', '$id', 
            '$sss', '$philhealth', '$pagibig', '$tin','$address', 
            '$contact_number','$status', '$type', '$start_loa', 
            '$end_loa', '$division', '$category', '$locator', '$client_name',
            '$place_assigned', '$address_assigned', '$channel', '$department', 
            '$employment_status', '$job_title', '$loa_template', 
            '$basic_salary', '$ecola', '$communication_allowance', '$transportation_allowance', 
            '$internet_allowance', '$meal_allowance', '$outbase_meal', '$special_allowance', 
            '$position_allowance', '$deployment_remarks', '$no_of_days', '$outlet', 
            '$supervisor', '$field_supervisor', '$field_supervisor_designation', '$deployment_personnel', 
            '$deployment_personnel_designation', '$project_supervisor', '$project_supervisor_designation', 
            '$head', '$head_designation', '$loa_id', '$date')";

        $result_history = $link->query($query_history);

        if ($result_history) {
            $_SESSION['successMessage'] = "Updating LOA success";
        } else {
            $_SESSION['errorMessage'] = "Error in inserting LOA to history";
        }
    } else {
        $_SESSION['errorMessage'] = "Updating LOA error";
    }
    header("Location: deploy_applicants.php?shortlist_title=$shortlist_title");
    exit(0);
}
