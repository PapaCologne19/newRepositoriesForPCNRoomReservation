<?php
session_start();
include '../../connect.php';

    $image = imagecreatefrompng("../assets/img/elements/PCNBG2.png");
    $black = imagecolorallocate($image, 0, 0, 0); // Define black color
    $font = "C:\Windows\Fonts\arial.ttf";

    $query = "SELECT * FROM deployment WHERE id = '7'";
    $result = $link->query($query);
    while($row = $result->fetch_assoc()){
        $select = "SELECT * FROM employees WHERE id = '3'";
        $select_result = $link->query($select);
        while($select_row = $select_result->fetch_assoc()){
            $birthday = $select_row['birthday'];
            $timestampbirthday = strtotime($birthday);
            $formattedDatebirthday = date("F d, Y", $timestampbirthday); 
            $end_date = $row['loa_end_date'];
            $formattedDate = str_replace('-', '/', $end_date);

    // Define the text to add
    $text = $select_row['firstnameko'] . " " . $select_row['mnko'] . " " . $select_row['lastnameko'];
    $text2 = $row['job_title'];
    $text3 = $row['emp_id'];
    $text4 = $select_row['e_person'];
    $text5 = $select_row['e_address'];
    $text6 = $select_row['e_number'];
    $text7 = $row['sss'];
    $text8 = $row['tin'];
    $text9 = $row['philhealth'];
    $text10 = $row['pagibig'];
    $text11 = $formattedDatebirthday;
    $text12 = $formattedDate;


    $newImage = imagecreatefrompng("../../".$select_row['photopath']);
    $newImageX = 128; // X-coordinate of the top-left corner of the inserted picture
    $newImageY = 153; // Y-coordinate of the top-left corner of the inserted picture
    $destWidth = 205; // Set the desired width of the inserted picture
    $destHeight = 210; // Set the desired height of the inserted picture

    // Use imagecopyresized to resize and copy the image
    imagecopyresized($image, $newImage, $newImageX, $newImageY, 0, 0, $destWidth, $destHeight, imagesx($newImage), imagesy($newImage));

    imagedestroy($newImage);

    // Calculate the text box coordinates
    $textBoxX1 = -280; // Adjust as needed
    $textBoxY1 = 420; // Adjust as needed
    $textBoxX2 = imagesx($image) - 50; // Adjust as needed
    $textBoxY2 = 200; // Adjust as needed
    // Position
    $textBoxX12 = -350; // Adjust as needed
    $textBoxY12 = 500; // Adjust as needed
    $textBoxX22 = imagesx($image) - 50; // Adjust as needed
    $textBoxY22 = 200; // Adjust as needed
    // ID Number
    $textBoxX13 = -600; // Adjust as needed
    $textBoxY13 = 670; // Adjust as needed
    $textBoxX23 = imagesx($image) - 50; // Adjust as needed
    $textBoxY23 = 200; // Adjust as needed
    // Contact Person
    $textBoxX14 = 750; // Adjust as needed
    $textBoxY14 = 190; // Adjust as needed
    $textBoxX24 = imagesx($image) - 50; // Adjust as needed
    $textBoxY24 = 200; // Adjust as needed
    // Contact Address
    $textBoxX15 = 710; // Adjust as needed
    $textBoxY15 = 245; // Adjust as needed
    $textBoxX25 = imagesx($image) - 50; // Adjust as needed
    $textBoxY25 = 200; // Adjust as needed
    // Contact Number
    $textBoxX16 = 650; // Adjust as needed
    $textBoxY16 = 330; // Adjust as needed
    $textBoxX26 = imagesx($image) - 50; // Adjust as needed
    $textBoxY26 = 200; // Adjust as needed
    // SSS
    $textBoxX17 = 650; // Adjust as needed
    $textBoxY17 = 380; // Adjust as needed
    $textBoxX27 = imagesx($image) - 50; // Adjust as needed
    $textBoxY27 = 200; // Adjust as needed
    // TIN
    $textBoxX18 = 650; // Adjust as needed
    $textBoxY18 = 440; // Adjust as needed
    $textBoxX28 = imagesx($image) - 50; // Adjust as needed
    $textBoxY28 = 200; // Adjust as needed
    // PHILHEALTH
    $textBoxX19 = 700; // Adjust as needed
    $textBoxY19 = 490; // Adjust as needed
    $textBoxX29 = imagesx($image) - 50; // Adjust as needed
    $textBoxY29 = 200; // Adjust as needed
    // HDMF
    $textBoxX110 = 650; // Adjust as needed
    $textBoxY110 = 540; // Adjust as needed
    $textBoxX210 = imagesx($image) - 50; // Adjust as needed
    $textBoxY210 = 200; // Adjust as needed
    // BIRTHDAY
    $textBoxX111 = 650; // Adjust as needed
    $textBoxY111 = 590; // Adjust as needed
    $textBoxX211 = imagesx($image) - 50; // Adjust as needed
    $textBoxY211 = 200; // Adjust as needed
    // DATE END
    $textBoxX112 = -230; // Adjust as needed
    $textBoxY112 = 670; // Adjust as needed
    $textBoxX212 = imagesx($image) - 50; // Adjust as needed
    $textBoxY212 = 200; // Adjust as needed

    // Calculate the maximum line width within the text box
    $maxLineWidth = $textBoxX2 - $textBoxX1;
    // Position
    $maxLineWidth2 = $textBoxX22 - $textBoxX12;
    // ID Number
    $maxLineWidth3 = $textBoxX23 - $textBoxX13;
    // Contact Person
    $maxLineWidth4 = $textBoxX24 - $textBoxX14;
    // Contact Address
    $maxLineWidth5 = $textBoxX25 - $textBoxX15;
    // Contact Number
    $maxLineWidth6 = $textBoxX26 - $textBoxX16;
    // SSS
    $maxLineWidth7 = $textBoxX27 - $textBoxX17;
    // TIN
    $maxLineWidth8 = $textBoxX28 - $textBoxX18;
    // PHILHEALTH
    $maxLineWidth9 = $textBoxX29 - $textBoxX19;
    // HDMF
    $maxLineWidth10 = $textBoxX210 - $textBoxX110;
    // BIRTHDAY
    $maxLineWidth11 = $textBoxX211 - $textBoxX111;
    // DATE END
    $maxLineWidth12 = $textBoxX212 - $textBoxX12;



    // Split the text into lines that fit within the max width
    $textLines = wordwrap($text, 30, "\n", true);
    $textLines2 = wordwrap($text2, 30, "\n", true);
    $textLines3 = wordwrap($text3, 30, "\n", true);
    $textLines4 = wordwrap($text4, 35, "\n", true);
    $textLines5 = wordwrap($text5, 40, "\n", true);
    $textLines6 = wordwrap($text6, 40, "\n", true);
    $textLines7 = wordwrap($text7, 40, "\n", true);
    $textLines8 = wordwrap($text8, 40, "\n", true);
    $textLines9 = wordwrap($text9, 40, "\n", true);
    $textLines10 = wordwrap($text10, 40, "\n", true);
    $textLines11 = wordwrap($text11, 40, "\n", true);
    $textLines12 = wordwrap($text12, 40, "\n", true);

    // Calculate and set the text position for center alignment
    // Fullname
    $textX = $textBoxX1 + ($maxLineWidth - imagettfbbox(24, 0, $font, $textLines)['2']) / 2;
    $textY = $textBoxY1;
    // Position
    $textX2 = $textBoxX12 + ($maxLineWidth2 - imagettfbbox(24, 0, $font, $textLines2)['2']) / 2;
    $textY2 = $textBoxY12;
    // ID Number
    $textX3 = $textBoxX13 + ($maxLineWidth3 - imagettfbbox(24, 0, $font, $textLines3)['2']) / 2;
    $textY3 = $textBoxY13;
    // Contact Person
    $textX4 = $textBoxX14 + ($maxLineWidth4 - imagettfbbox(24, 0, $font, $textLines4)['2']) / 2;
    $textY4 = $textBoxY14;
    // Contact Address
    $textX5 = $textBoxX15 + ($maxLineWidth5 - imagettfbbox(24, 0, $font, $textLines5)['2']) / 2;
    $textY5 = $textBoxY15;
    // Contact Number
    $textX6 = $textBoxX16 + ($maxLineWidth6 - imagettfbbox(24, 0, $font, $textLines6)['2']) / 2;
    $textY6 = $textBoxY16;
    // SSS
    $textX7 = $textBoxX17 + ($maxLineWidth7 - imagettfbbox(24, 0, $font, $textLines7)['2']) / 2;
    $textY7 = $textBoxY17;
    // TIN
    $textX8 = $textBoxX18 + ($maxLineWidth8 - imagettfbbox(24, 0, $font, $textLines8)['2']) / 2;
    $textY8 = $textBoxY18;
    // PHILHEALTH
    $textX9 = $textBoxX19 + ($maxLineWidth9 - imagettfbbox(24, 0, $font, $textLines9)['2']) / 2;
    $textY9 = $textBoxY19;
    // HDMF
    $textX10 = $textBoxX110 + ($maxLineWidth10 - imagettfbbox(24, 0, $font, $textLines10)['2']) / 2;
    $textY10 = $textBoxY110;
    // BIRTHDAY
    $textX11 = $textBoxX111 + ($maxLineWidth11 - imagettfbbox(24, 0, $font, $textLines11)['2']) / 2;
    $textY11 = $textBoxY111;
    // DATE END
    $textX12 = $textBoxX112 + ($maxLineWidth12 - imagettfbbox(24, 0, $font, $textLines12)['2']) / 2;
    $textY12 = $textBoxY112;

    // Add text lines to the image with center alignment
    foreach (explode("\n", $textLines) as $line) {
        imagettftext($image, 18, 0, $textX, $textY, $black, $font, $line);
        $textY += 30; // Adjust the line height as needed
    }

    foreach (explode("\n", $textLines2) as $line2) {
        imagettftext($image, 18, 0, $textX2, $textY2, $black, $font, $line2);
        $textY2 += 30; // Adjust the line height as needed
    }
    foreach (explode("\n", $textLines3) as $line3) {
        imagettftext($image, 18, 0, $textX3, $textY3, $black, $font, $line3);
        $textY3 += 30; // Adjust the line height as needed
    }
    foreach (explode("\n", $textLines4) as $line4) {
        imagettftext($image, 15, 0, $textX4, $textY4, $black, $font, $line4);
        $textY4 += 30; // Adjust the line height as needed
    }
    foreach (explode("\n", $textLines5) as $line5) {
        imagettftext($image, 15, 0, $textX5, $textY5, $black, $font, $line5);
        $textY5 += 30; // Adjust the line height as needed
    }
    foreach (explode("\n", $textLines6) as $line6) {
        imagettftext($image, 15, 0, $textX6, $textY6, $black, $font, $line6);
        $textY6 += 30; // Adjust the line height as needed
    }
    foreach (explode("\n", $textLines7) as $line7) {
        imagettftext($image, 15, 0, $textX7, $textY7, $black, $font, $line7);
        $textY7 += 30; // Adjust the line height as needed
    }
    foreach (explode("\n", $textLines8) as $line8) {
        imagettftext($image, 15, 0, $textX8, $textY8, $black, $font, $line8);
        $textY8 += 30; // Adjust the line height as needed
    }
    foreach (explode("\n", $textLines9) as $line9) {
        imagettftext($image, 15, 0, $textX9, $textY9, $black, $font, $line9);
        $textY9 += 30; // Adjust the line height as needed
    }
    foreach (explode("\n", $textLines10) as $line10) {
        imagettftext($image, 15, 0, $textX10, $textY10, $black, $font, $line10);
        $textY10 += 30; // Adjust the line height as needed
    }
    foreach (explode("\n", $textLines11) as $line11) {
        imagettftext($image, 15, 0, $textX11, $textY11, $black, $font, $line11);
        $textY11 += 30; // Adjust the line height as needed
    }
    foreach (explode("\n", $textLines12) as $line12) {
        imagettftext($image, 15, 0, $textX12, $textY12, $black, $font, $line12);
        $textY12 += 30; // Adjust the line height as needed
    }

    header("Content-Type: image/png");
    imagepng($image);

    // Additional headers for download
    header("Content-Disposition: attachment; filename=TEXT-ADDED.png");
    header("Content-Length: " . ob_get_length());

    // Clean the output buffer and end the script
    ob_end_flush();
}
}