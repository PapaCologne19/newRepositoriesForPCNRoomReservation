<?php
session_start();
include '../../connect.php';
require 'PHPWord.php';

if (isset($_POST['xletter1'])) {
    $appno = $_POST['applicant_no'];
    $reason_x1 = $_POST['reason_x'];
    $created_by = $_SESSION['lastname'] . ", " . $_SESSION['firstname'];
    // If success
    $resultemp = mysqli_query($link, "INSERT INTO excuse_letter(app_number, excuse_remarks, created_by) VALUES('$appno', '$reason_x1', '$created_by')");
    $resultemp = mysqli_query($link, "INSERT INTO excuse_letter_history(app_number, excuse_remarks, created_by) VALUES('$appno', '$reason_x1', '$created_by')");

    $resultem = mysqli_query($link, "SELECT * FROM employees WHERE appno = '$appno'");
    while ($rowem = mysqli_fetch_assoc($resultem)) {
        $lname = $rowem['lastnameko'];
        $fname = $rowem['firstnameko'];
        $mname = $rowem['mnko'];
        if (!empty($rowem['mnko'])) {
            $fullname = $lname . ", " . $fname . " " . $mname;
        } else {
            $fullname = $lname . ", " . $fname;
        }



        // Fetch Data in Deployment Table
        $deployment = "SELECT * FROM deployment WHERE appno = '$appno'";
        $deployment_result = $link->query($deployment);
        $fetch = $deployment_result->fetch_assoc();

        $client_name = $fetch['client_name'];
        $outlet = $fetch['outlet'];
        $deployment_personnel = $fetch['deployment_personnel'];
        $deployment_designation = $fetch['deployment_designation'];

        $template = "excuse_letter_template/excuse.docx";
        $filenamenya = "excuse_letter_template/";


        $date_now = date('F d, Y');

        // PHP Word Initialization
        $PHPWord = new PhpWord();
        $document = $PHPWord->loadTemplate($template);

        $document->setValue('Value1', $fullname);
        $document->setValue('Value11a', $outlet);
        $document->setValue('Value35', $client_name);
        $document->setValue('Value14', $date_now);
        $document->setValue('Value36', $reason_x1);
        $document->setValue('Value20', $deployment_personnel);
        $document->setValue('Value21', $deployment_designation);

        // Save the document
        $document->save($filenamenya . 'Excuse_letter_file.docx');
    }

    // Once all processing is done, initiate the download
    header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
    header("Content-Disposition: attachment; filename=Excuse_letter_file.docx");
    readfile($filenamenya . 'Excuse_letter_file.docx');
}
