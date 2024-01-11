<?php
session_start();
include '../../connect.php';

if (isset($_GET['id'])) {

    $id = $link->real_escape_string($_GET['id']);
    $query = "SELECT * FROM deployment WHERE id = '$id'";
    $result = $link->query($query);
    while ($row = $result->fetch_assoc()) {
        $select = "SELECT * FROM employees WHERE id = '" . $row['employee_id'] . "'";
        $select_result = $link->query($select);
        while ($select_row = $select_result->fetch_assoc()) {
            $birthday = $select_row['birthday'];
            $timestampbirthday = strtotime($birthday);
            $formattedDatebirthday = date("F d, Y", $timestampbirthday);
            $end_date = $row['loa_end_date'];
            $formattedDate = date('m/d/Y', strtotime($end_date));

            if ($row['employment_status'] === "REGULAR" || $row['employment_status'] === "Regular" || $row['employment_status'] === "regular") {
                $image = imagecreatefrompng("../assets/img/elements/IDRegular2.png");
                $black = imagecolorallocate($image, 0, 0, 0); // Define black color
                $font = "C:\Windows\Fonts\arial.ttf";


                // Define the text to add
                $text = $select_row['firstnameko'] . " " . $select_row['mnko'] . " " . $select_row['lastnameko'];
                $text2 = $row['job_title'];
                $text3 = $row['emp_id'];
                $text4 = $select_row['e_person'];
                $text5 = "    "."   "."    ".$select_row['e_address'];
                $text6 = $select_row['e_number'];
                $text7 = $row['sss'];
                $text8 = $row['tin'];
                $text9 = $row['philhealth'];
                $text10 = $row['pagibig'];
                $text11 = $formattedDatebirthday;


                $newImage = imagecreatefrompng($select_row['photopath']);
                // $newImage = imagecreatefrompng("../../" . $select_row['photopath']);
                $newImageX = 135; // X-coordinate of the top-left corner of the inserted picture
                $newImageY = 150; // Y-coordinate of the top-left corner of the inserted picture
                $destWidth = 205; // Set the desired width of the inserted picture
                $destHeight = 210; // Set the desired height of the inserted picture

                // Use imagecopyresized to resize and copy the image
                imagecopyresized($image, $newImage, $newImageX, $newImageY, 0, 0, $destWidth, $destHeight, imagesx($newImage), imagesy($newImage));

                imagedestroy($newImage);

                 //FULL session_name()
                // Calculate the text box coordinates
                $textBoxX1 = 30; // Adjust as needed
                $textBoxY1 = 430; // Adjust as needed
                $textBoxX2 = imagesx($image) - 490; // Adjust as needed
                $textBoxY2 = 377; // Adjust as needed

                // Position
                // Y is for height
                // x is for width
                $textBoxX12 = 30; // Adjust as needed
                $textBoxY12 = 520; // Adjust as needed 
                $textBoxX22 = imagesx($image) - 490; // Adjust as needed width
                $textBoxY22 = 467; // Adjust as needed start position of height for text box


                // ID Number
                $textBoxX13 = 30; // Adjust as needed
                $textBoxY13 = 695; // Adjust as needed
                $textBoxX23 = imagesx($image) - 490; // Adjust as needed
                $textBoxY23 = 640; // Adjust as needed


                // Contact Person
                $textBoxX14 = 640; // Adjust as needed
                $textBoxY14 = 200; // Adjust as needed
                $textBoxX24 = imagesx($image) - 40; // Adjust as needed
                $textBoxY24 = 150; // Adjust as needed


                // Contact Address
                $textBoxX15 = 510; // Adjust as needed
                $textBoxY15 = 295; // Adjust as needed
                $textBoxX25 = imagesx($image) - 40; // Adjust as needed
                $textBoxY25 = 200; // Adjust as needed


                // Contact Number
                $textBoxX16 = 615; // Adjust as needed
                $textBoxY16 = 348; // Adjust as needed
                $textBoxX26 = imagesx($image) - 40; // Adjust as needed
                $textBoxY26 = 298; // Adjust as needed


                // SSS
                $textBoxX17 = 585; // Adjust as needed
                $textBoxY17 = 402; // Adjust as needed
                $textBoxX27 = imagesx($image) - 40; // Adjust as needed
                $textBoxY27 = 350; // Adjust as needed


                // TIN
                $textBoxX18 = 585; // Adjust as needed
                $textBoxY18 = 452; // Adjust as needed
                $textBoxX28 = imagesx($image) - 40; // Adjust as needed
                $textBoxY28 = 404; // Adjust as needed


                // PHILHEALTH
                $textBoxX19 = 620; // Adjust as needed
                $textBoxY19 = 506; // Adjust as needed
                $textBoxX29 = imagesx($image) - 40; // Adjust as needed
                $textBoxY29 = 455; // Adjust as needed


                // HDMF
                $textBoxX110 = 585; // Adjust as needed
                $textBoxY110 = 560; // Adjust as needed
                $textBoxX210 = imagesx($image) - 40; // Adjust as needed
                $textBoxY210 = 509; // Adjust as needed

                // BIRTHDAY
                $textBoxX111 = 585; // Adjust as needed
                $textBoxY111 = 615; // Adjust as needed
                $textBoxX211 = imagesx($image) - 40; // Adjust as needed
                $textBoxY211 = 560; // Adjust as needed

                // Text box border color (RGB values)
                $borderColor = imagecolorallocate($image, 255, 0, 0); // Red color in this example

                 // Draw borders around text boxes
//full name          imagerectangle($image, $textBoxX1, $textBoxY1, $textBoxX2, $textBoxY2, $borderColor);
//position           imagerectangle($image, $textBoxX12, $textBoxY12, $textBoxX22, $textBoxY22, $borderColor);
//ID Number          imagerectangle($image, $textBoxX13, $textBoxY13, $textBoxX23, $textBoxY23, $borderColor);
 //Contact Person    imagerectangle($image, $textBoxX14, $textBoxY14, $textBoxX24, $textBoxY24, $borderColor);          
//Contact Person     imagerectangle($image, $textBoxX15, $textBoxY15, $textBoxX25, $textBoxY25, $borderColor); 
//Contact Number     imagerectangle($image, $textBoxX16, $textBoxY16, $textBoxX26, $textBoxY26, $borderColor); 
//SSS No.            imagerectangle($image, $textBoxX17, $textBoxY17, $textBoxX27, $textBoxY27, $borderColor); 
//TIN No.            imagerectangle($image, $textBoxX18, $textBoxY18, $textBoxX28, $textBoxY28, $borderColor); 
//PHIL No.           imagerectangle($image, $textBoxX19, $textBoxY19, $textBoxX29, $textBoxY29, $borderColor); 
//HDMF No.           imagerectangle($image, $textBoxX110, $textBoxY110, $textBoxX210, $textBoxY210, $borderColor);
//*BIRTHDAY         imagerectangle($image, $textBoxX111, $textBoxY111, $textBoxX211, $textBoxY211, $borderColor); 


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



                // Split the text into lines that fit within the max width
                $textLines = wordwrap($text, 30, "\n", true);
                $textLines2 = wordwrap($text2, 20, "\n", true);
                $textLines3 = wordwrap($text3, 30, "\n", true);
                $textLines4 = wordwrap($text4, 25, "\n", true);
                $textLines5 = wordwrap($text5, 33, "\n", true);
                $textLines6 = wordwrap($text6, 23, "\n", true);
                $textLines7 = wordwrap($text7, 10, "\n", true);
                $textLines8 = wordwrap($text8, 12, "\n", true);
                $textLines9 = wordwrap($text9, 12, "\n", true);
                $textLines10 = wordwrap($text10, 12, "\n", true);
                $textLines11 = wordwrap($text11, 25, "\n", true);

                // Calculate and set the text position for center alignment
                // Fullname
                $totalTextWidth0 = imagettfbbox(18, 0, $font, $textLines)['2'] - imagettfbbox(18, 0, $font, $textLines)['0'];
                $textX = $textBoxX1 + ($maxLineWidth - $totalTextWidth0) / 2;
                $textY = $textBoxY1;
                $lineHeight1 = -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight1 = count(explode("\n", $textLines)) * $lineHeight1;
                $textY += ($textBoxY2 - $textBoxY1 - $totalTextHeight1) / 2;
                 

                // Position
                //for auto center
                $totalTextWidth2 = imagettfbbox(18, 0, $font, $textLines2)['2'] - imagettfbbox(18, 0, $font, $textLines2)['0'];
                $textX2 = $textBoxX12 + ($maxLineWidth2 - $totalTextWidth2) / 2;
                $textY2 = $textBoxY12;
                $lineHeight2 = -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight2 = count(explode("\n", $textLines2)) * $lineHeight2;
                $textY2 += ($textBoxY22 - $textBoxY12 - $totalTextHeight2) / 2;
    

                // ID Number
                $totalTextWidth3 = imagettfbbox(18, 0, $font, $textLines3)['2'] - imagettfbbox(18, 0, $font, $textLines3)['0'];
                $textX3 = $textBoxX13 + ($maxLineWidth3 - $totalTextWidth3) / 2;
                $textY3 = $textBoxY13;
                $lineHeight3 = -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight3 = count(explode("\n", $textLines3)) * $lineHeight3;
                $textY3 += ($textBoxY23 - $textBoxY13 - $totalTextHeight3) / 2;
               



                // Contact Person
                $totalTextWidth4 = imagettfbbox(14, 0, $font, $textLines4)['2'] - imagettfbbox(14, 0, $font, $textLines4)['0'];
                $textX4 = $textBoxX14 + ($maxLineWidth4 - $totalTextWidth4) / 2;
                $textY4 = $textBoxY14;
                $lineHeight4 = 10; // Adjust as needed for vertical spacing between lines
                $totalTextHeight4 = count(explode("\n", $textLines4)) * $lineHeight4;
                $textY4 += ($textBoxY24 - $textBoxY14 - $totalTextHeight4) / 2;
        

                // Contact Address
                $totalTextWidth5 = imagettfbbox(14, 0, $font, $textLines5)['2'] - imagettfbbox(14, 0, $font, $textLines5)['0'];
                $textX5 = $textBoxX15 + ($maxLineWidth5 - $totalTextWidth5) / 2;
                $textY5 = $textBoxY15;
                $lineHeight5 = 25; // Adjust as needed for vertical spacing between lines
                $totalTextHeight5 = count(explode("\n", $textLines5)) * $lineHeight5;
                $textY5 += ($textBoxY25 - $textBoxY15 - $totalTextHeight5) / 2;
                


                // Contact Number
                 $totalTextWidth6 = imagettfbbox(18, 0, $font, $textLines6)['2'] - imagettfbbox(18, 0, $font, $textLines6)['0'];
                $textX6 = $textBoxX16 + ($maxLineWidth6 - $totalTextWidth6) / 2;
                $textY6 = $textBoxY16;
                $lineHeight6= -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight6 = count(explode("\n", $textLines6)) * $lineHeight6;
                $textY6 += ($textBoxY26 - $textBoxY16 - $totalTextHeight6) / 2;
                


                // SSS
                $totalTextWidth7 = imagettfbbox(18, 0, $font, $textLines7)['2'] - imagettfbbox(18, 0, $font, $textLines7)['0'];
                $textX7 = $textBoxX17 + ($maxLineWidth7 - $totalTextWidth7) / 2;
                $textY7 = $textBoxY17;
                $lineHeight7= -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight7 = count(explode("\n", $textLines7)) * $lineHeight7;
                $textY7 += ($textBoxY27 - $textBoxY17 - $totalTextHeight7) / 2;
                

                // TIN
                $totalTextWidth8 = imagettfbbox(18, 0, $font, $textLines8)['2'] - imagettfbbox(18, 0, $font, $textLines8)['0'];
                $textX8 = $textBoxX18 + ($maxLineWidth8 - $totalTextWidth8) / 2;
                $textY8 = $textBoxY18;
                $lineHeight8= -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight8 = count(explode("\n", $textLines8)) * $lineHeight8;
                $textY8 += ($textBoxY28 - $textBoxY18 - $totalTextHeight8) / 2;
               


                // PHILHEALTH
                $totalTextWidth9 = imagettfbbox(18, 0, $font, $textLines9)['2'] - imagettfbbox(18, 0, $font, $textLines9)['0'];
                $textX9 = $textBoxX19 + ($maxLineWidth9 - $totalTextWidth9) / 2;
                $textY9 = $textBoxY19;
                $lineHeight9= -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight9 = count(explode("\n", $textLines9)) * $lineHeight9;
                $textY9 += ($textBoxY29 - $textBoxY19 - $totalTextHeight9) / 2;
              
                // HDMF
                $totalTextWidth10 = imagettfbbox(18, 0, $font, $textLines10)['2'] - imagettfbbox(18, 0, $font, $textLines10)['0'];
                $textX10 = $textBoxX110 + ($maxLineWidth10 - $totalTextWidth10) / 2;
                $textY10 = $textBoxY110;
                $lineHeight10= -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight10 = count(explode("\n", $textLines10)) * $lineHeight10;
                $textY10 += ($textBoxY210 - $textBoxY110 - $totalTextHeight10) / 2;
                

                // BIRTHDAY
                $totalTextWidth11 = imagettfbbox(18, 0, $font, $textLines11)['2'] - imagettfbbox(18, 0, $font, $textLines11)['0'];
                $textX11 = $textBoxX111 + ($maxLineWidth11 - $totalTextWidth11) / 2;
                $textY11 = $textBoxY111;
                $lineHeight11= -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight11 = count(explode("\n", $textLines11)) * $lineHeight11;
                $textY11 += ($textBoxY211 - $textBoxY111 - $totalTextHeight11) / 2;
              


                
                // Add text lines to the image with center alignment
                foreach (explode("\n", $textLines) as $line) {
                    imagettftext($image, 18, 0, $textX, $textY, $black, $font, $line);
                    $textY += $lineHeight1; // Adjust the line height as needed
                }

              // Draw the text on the image with middle alignment
                foreach (explode("\n", $textLines2) as $line2) {
                 imagettftext($image, 18, 0, $textX2, $textY2, $black, $font, $line2); // Font size is 18, adjust as needed
                $textY2 += $lineHeight2; // Move to the next line// Adjust the line height as needed
                }
                foreach (explode("\n", $textLines3) as $line3) {
                    imagettftext($image, 18, 0, $textX3, $textY3, $black, $font, $line3);
                    $textY3 += $lineHeight3; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines4) as $line4) {
                    imagettftext($image, 14, 0, $textX4, $textY4, $black, $font, $line4);
                    $textY4 += 20; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines5) as $line5) {
                    imagettftext($image, 14, 0, $textX5, $textY5, $black, $font, $line5);
                    $textY5 += 18; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines6) as $line6) {
                    imagettftext($image, 18, 0, $textX6, $textY6, $black, $font, $line6);
                    $textY6 += $lineHeight6; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines7) as $line7) {
                    imagettftext($image, 18, 0, $textX7, $textY7, $black, $font, $line7);
                    $textY7 += $lineHeight7; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines8) as $line8) {
                    imagettftext($image, 18, 0, $textX8, $textY8, $black, $font, $line8);
                    $textY8 += $lineHeight8; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines9) as $line9) {
                    imagettftext($image, 18, 0, $textX9, $textY9, $black, $font, $line9);
                    $textY9 += $lineHeight9; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines10) as $line10) {
                    imagettftext($image, 18, 0, $textX10, $textY10, $black, $font, $line10);
                    $textY10 += $lineHeight10; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines11) as $line11) {
                    imagettftext($image, 18, 0, $textX11, $textY11, $black, $font, $line11);
                    $textY11 += $lineHeight11; // Adjust the line height as needed
                }

                header("Content-Type: image/png");
                imagepng($image);

                // Additional headers for download
                header("Content-Disposition: attachment; filename=Employee_ID.png");
                header("Content-Length: " . ob_get_length());

                // Clean the output buffer and end the script
                ob_end_flush();
            } else {
                $image = imagecreatefrompng("../assets/img/elements/PCNBG2.png");
                $black = imagecolorallocate($image, 0, 0, 0); // Define black color
                $font = "C:\Windows\Fonts\arial.ttf";

                // Define the text to add
                $text = $select_row['firstnameko'] . " " . $select_row['mnko'] . " " . $select_row['lastnameko'];
                $text2 = $row['job_title'];
                $text3 = $row['emp_id'];
                $text4 = $select_row['e_person'];
                $text5 = "    "."   "."    ".$select_row['e_address'];
                $text6 = $select_row['e_number'];
                $text7 = $row['sss'];
                $text8 = $row['tin'];
                $text9 = $row['philhealth'];
                $text10 = $row['pagibig'];
                $text11 = $formattedDatebirthday;
                $text12 = $formattedDate;


                $newImage = imagecreatefrompng($select_row['photopath']);
                $newImageX = 128; // X-coordinate of the top-left corner of the inserted picture
                $newImageY = 153; // Y-coordinate of the top-left corner of the inserted picture
                $destWidth = 205; // Set the desired width of the inserted picture
                $destHeight = 210; // Set the desired height of the inserted picture

                // Use imagecopyresized to resize and copy the image
                imagecopyresized($image, $newImage, $newImageX, $newImageY, 0, 0, $destWidth, $destHeight, imagesx($newImage), imagesy($newImage));

                imagedestroy($newImage);

                 $textBoxX1 = 30; // Adjust as needed
                $textBoxY1 = 434; // Adjust as needed
                $textBoxX2 = imagesx($image) - 483; // Adjust as needed
                $textBoxY2 = 385; // Adjust as needed

                // Position
                // Y is for height
                // x is for width
                $textBoxX12 = 30; // Adjust as needed
                $textBoxY12 = 515; // Adjust as needed 
                $textBoxX22 = imagesx($image) - 483; // Adjust as needed width
                $textBoxY22 = 465; // Adjust as needed start position of height for text box


                // ID Number
                $textBoxX13 = 30; // Adjust as needed
                $textBoxY13 = 685; // Adjust as needed
                $textBoxX23 = imagesx($image) - 709; // Adjust as needed
                $textBoxY23 = 635; // Adjust as needed


                // Contact Person
                $textBoxX14 = 640; // Adjust as needed
                $textBoxY14 = 195; // Adjust as needed
                $textBoxX24 = imagesx($image) - 40; // Adjust as needed
                $textBoxY24 = 150; // Adjust as needed


                // Contact Address
                $textBoxX15 = 510; // Adjust as needed
                $textBoxY15 = 295; // Adjust as needed
                $textBoxX25 = imagesx($image) - 40; // Adjust as needed
                $textBoxY25 = 195; // Adjust as needed


                // Contact Number
                $textBoxX16 = 615; // Adjust as needed
                $textBoxY16 = 348; // Adjust as needed
                $textBoxX26 = imagesx($image) - 40; // Adjust as needed
                $textBoxY26 = 298; // Adjust as needed


                // SSS
                $textBoxX17 = 585; // Adjust as needed
                $textBoxY17 = 402; // Adjust as needed
                $textBoxX27 = imagesx($image) - 40; // Adjust as needed
                $textBoxY27 = 350; // Adjust as needed


                // TIN
                $textBoxX18 = 585; // Adjust as needed
                $textBoxY18 = 452; // Adjust as needed
                $textBoxX28 = imagesx($image) - 40; // Adjust as needed
                $textBoxY28 = 404; // Adjust as needed


                // PHILHEALTH
                $textBoxX19 = 620; // Adjust as needed
                $textBoxY19 = 506; // Adjust as needed
                $textBoxX29 = imagesx($image) - 40; // Adjust as needed
                $textBoxY29 = 455; // Adjust as needed


                // HDMF
                $textBoxX110 = 585; // Adjust as needed
                $textBoxY110 = 560; // Adjust as needed
                $textBoxX210 = imagesx($image) - 40; // Adjust as needed
                $textBoxY210 = 509; // Adjust as needed

                // BIRTHDAY
                $textBoxX111 = 585; // Adjust as needed
                $textBoxY111 = 615; // Adjust as needed
                $textBoxX211 = imagesx($image) - 40; // Adjust as needed
                $textBoxY211 = 560; // Adjust as needed


                 // END DATE
                $textBoxX112 = 255; // Adjust as needed
                $textBoxY112 = 685; // Adjust as needed
                $textBoxX212 = imagesx($image) - 483; // Adjust as needed
                $textBoxY212 = 635; // Adjust as needed

                // Text box border color (RGB values)
                $borderColor = imagecolorallocate($image, 255, 0, 0); // Red color in this example

                 // Draw borders around text boxes
//full name          imagerectangle($image, $textBoxX1, $textBoxY1, $textBoxX2, $textBoxY2, $borderColor);
//position           imagerectangle($image, $textBoxX12, $textBoxY12, $textBoxX22, $textBoxY22, $borderColor);
//          imagerectangle($image, $textBoxX13, $textBoxY13, $textBoxX23, $textBoxY23, $borderColor);
//Contact Person    imagerectangle($image, $textBoxX14, $textBoxY14, $textBoxX24, $textBoxY24, $borderColor);          
//Contact Person     imagerectangle($image, $textBoxX15, $textBoxY15, $textBoxX25, $textBoxY25, $borderColor); 
//Contact Number     imagerectangle($image, $textBoxX16, $textBoxY16, $textBoxX26, $textBoxY26, $borderColor); 
//SSS No.            imagerectangle($image, $textBoxX17, $textBoxY17, $textBoxX27, $textBoxY27, $borderColor); 
//TIN No.            imagerectangle($image, $textBoxX18, $textBoxY18, $textBoxX28, $textBoxY28, $borderColor); 
//PHIL No.           imagerectangle($image, $textBoxX19, $textBoxY19, $textBoxX29, $textBoxY29, $borderColor); 
//HDMF No.           imagerectangle($image, $textBoxX110, $textBoxY110, $textBoxX210, $textBoxY210, $borderColor);
//BIRTHDAY           imagerectangle($image, $textBoxX111, $textBoxY111, $textBoxX211, $textBoxY211, $borderColor);
//END DATE        imagerectangle($image, $textBoxX112, $textBoxY112, $textBoxX212, $textBoxY212, $borderColor); 


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
                // END DATE
                $maxLineWidth12 = $textBoxX212 - $textBoxX112;  

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
                $totalTextWidth0 = imagettfbbox(18, 0, $font, $textLines)['2'] - imagettfbbox(18, 0, $font, $textLines)['0'];
                $textX = $textBoxX1 + ($maxLineWidth - $totalTextWidth0) / 2;
                $textY = $textBoxY1;
                $lineHeight1 = -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight1 = count(explode("\n", $textLines)) * $lineHeight1;
                $textY += ($textBoxY2 - $textBoxY1 - $totalTextHeight1) / 2;
                 

                // Position
                //for auto center
                $totalTextWidth2 = imagettfbbox(18, 0, $font, $textLines2)['2'] - imagettfbbox(18, 0, $font, $textLines2)['0'];
                $textX2 = $textBoxX12 + ($maxLineWidth2 - $totalTextWidth2) / 2;
                $textY2 = $textBoxY12;
                $lineHeight2 = -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight2 = count(explode("\n", $textLines2)) * $lineHeight2;
                $textY2 += ($textBoxY22 - $textBoxY12 - $totalTextHeight2) / 2;
    

                // ID Number
                $totalTextWidth3 = imagettfbbox(18, 0, $font, $textLines3)['2'] - imagettfbbox(18, 0, $font, $textLines3)['0'];
                $textX3 = $textBoxX13 + ($maxLineWidth3 - $totalTextWidth3) / 2;
                $textY3 = $textBoxY13;
                $lineHeight3 = -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight3 = count(explode("\n", $textLines3)) * $lineHeight3;
                $textY3 += ($textBoxY23 - $textBoxY13 - $totalTextHeight3) / 2;
               



                // Contact Person
                $totalTextWidth4 = imagettfbbox(14, 0, $font, $textLines4)['2'] - imagettfbbox(14, 0, $font, $textLines4)['0'];
                $textX4 = $textBoxX14 + ($maxLineWidth4 - $totalTextWidth4) / 2;
                $textY4 = $textBoxY14;
                $lineHeight4 = 10; // Adjust as needed for vertical spacing between lines
                $totalTextHeight4 = count(explode("\n", $textLines4)) * $lineHeight4;
                $textY4 += ($textBoxY24 - $textBoxY14 - $totalTextHeight4) / 2;
        

                // Contact Address
                $totalTextWidth5 = imagettfbbox(14, 0, $font, $textLines5)['2'] - imagettfbbox(14, 0, $font, $textLines5)['0'];
                $textX5 = $textBoxX15 + ($maxLineWidth5 - $totalTextWidth5) / 2;
                $textY5 = $textBoxY15;
                $lineHeight5 = 25; // Adjust as needed for vertical spacing between lines
                $totalTextHeight5 = count(explode("\n", $textLines5)) * $lineHeight5;
                $textY5 += ($textBoxY25 - $textBoxY15 - $totalTextHeight5) / 2;
                


                // Contact Number
                 $totalTextWidth6 = imagettfbbox(18, 0, $font, $textLines6)['2'] - imagettfbbox(18, 0, $font, $textLines6)['0'];
                $textX6 = $textBoxX16 + ($maxLineWidth6 - $totalTextWidth6) / 2;
                $textY6 = $textBoxY16;
                $lineHeight6= -19; // Adjust as needed for vertical spacing between lines
                $totalTextHeight6 = count(explode("\n", $textLines6)) * $lineHeight6;
                $textY6 += ($textBoxY26 - $textBoxY16 - $totalTextHeight6) / 2;
                


                // SSS
                $totalTextWidth7 = imagettfbbox(18, 0, $font, $textLines7)['2'] - imagettfbbox(18, 0, $font, $textLines7)['0'];
                $textX7 = $textBoxX17 + ($maxLineWidth7 - $totalTextWidth7) / 2;
                $textY7 = $textBoxY17;
                $lineHeight7= -19; // Adjust as needed for vertical spacing between lines
                $totalTextHeight7 = count(explode("\n", $textLines7)) * $lineHeight7;
                $textY7 += ($textBoxY27 - $textBoxY17 - $totalTextHeight7) / 2;
                

                // TIN
                $totalTextWidth8 = imagettfbbox(18, 0, $font, $textLines8)['2'] - imagettfbbox(18, 0, $font, $textLines8)['0'];
                $textX8 = $textBoxX18 + ($maxLineWidth8 - $totalTextWidth8) / 2;
                $textY8 = $textBoxY18;
                $lineHeight8= -19; // Adjust as needed for vertical spacing between lines
                $totalTextHeight8 = count(explode("\n", $textLines8)) * $lineHeight8;
                $textY8 += ($textBoxY28 - $textBoxY18 - $totalTextHeight8) / 2;
               


                // PHILHEALTH
                $totalTextWidth9 = imagettfbbox(18, 0, $font, $textLines9)['2'] - imagettfbbox(18, 0, $font, $textLines9)['0'];
                $textX9 = $textBoxX19 + ($maxLineWidth9 - $totalTextWidth9) / 2;
                $textY9 = $textBoxY19;
                $lineHeight9= -19; // Adjust as needed for vertical spacing between lines
                $totalTextHeight9 = count(explode("\n", $textLines9)) * $lineHeight9;
                $textY9 += ($textBoxY29 - $textBoxY19 - $totalTextHeight9) / 2;
              
                // HDMF
                $totalTextWidth10 = imagettfbbox(18, 0, $font, $textLines10)['2'] - imagettfbbox(18, 0, $font, $textLines10)['0'];
                $textX10 = $textBoxX110 + ($maxLineWidth10 - $totalTextWidth10) / 2;
                $textY10 = $textBoxY110;
                $lineHeight10= -19; // Adjust as needed for vertical spacing between lines
                $totalTextHeight10 = count(explode("\n", $textLines10)) * $lineHeight10;
                $textY10 += ($textBoxY210 - $textBoxY110 - $totalTextHeight10) / 2;
                

                // BIRTHDAY
                $totalTextWidth11 = imagettfbbox(18, 0, $font, $textLines11)['2'] - imagettfbbox(18, 0, $font, $textLines11)['0'];
                $textX11 = $textBoxX111 + ($maxLineWidth11 - $totalTextWidth11) / 2;
                $textY11 = $textBoxY111;
                $lineHeight11= -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight11 = count(explode("\n", $textLines11)) * $lineHeight11;
                $textY11 += ($textBoxY211 - $textBoxY111 - $totalTextHeight11) / 2;

                // END DATE
                $totalTextWidth12 = imagettfbbox(18, 0, $font, $textLines12)['2'] - imagettfbbox(18, 0, $font, $textLines12)['0'];
                $textX12 = $textBoxX112 + ($maxLineWidth12 - $totalTextWidth12) / 2;
                $textY12 = $textBoxY112;
                $lineHeight12= -15; // Adjust as needed for vertical spacing between lines
                $totalTextHeight12 = count(explode("\n", $textLines12)) * $lineHeight12;
                $textY12 += ($textBoxY212 - $textBoxY112 - $totalTextHeight12) / 2;

                // Add text lines to the image with center alignment
                foreach (explode("\n", $textLines) as $line) {
                    imagettftext($image, 18, 0, $textX, $textY, $black, $font, $line);
                    $textY += $lineHeight1; // Adjust the line height as needed
                }

              // Draw the text on the image with middle alignment
                foreach (explode("\n", $textLines2) as $line2) {
                 imagettftext($image, 18, 0, $textX2, $textY2, $black, $font, $line2); // Font size is 18, adjust as needed
                $textY2 += $lineHeight2; // Move to the next line// Adjust the line height as needed
                }
                foreach (explode("\n", $textLines3) as $line3) {
                    imagettftext($image, 18, 0, $textX3, $textY3, $black, $font, $line3);
                    $textY3 += $lineHeight3; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines4) as $line4) {
                    imagettftext($image, 14, 0, $textX4, $textY4, $black, $font, $line4);
                    $textY4 += 20; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines5) as $line5) {
                    imagettftext($image, 14, 0, $textX5, $textY5, $black, $font, $line5);
                    $textY5 += 18; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines6) as $line6) {
                    imagettftext($image, 18, 0, $textX6, $textY6, $black, $font, $line6);
                    $textY6 += $lineHeight6; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines7) as $line7) {
                    imagettftext($image, 18, 0, $textX7, $textY7, $black, $font, $line7);
                    $textY7 += $lineHeight7; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines8) as $line8) {
                    imagettftext($image, 18, 0, $textX8, $textY8, $black, $font, $line8);
                    $textY8 += $lineHeight8; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines9) as $line9) {
                    imagettftext($image, 18, 0, $textX9, $textY9, $black, $font, $line9);
                    $textY9 += $lineHeight9; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines10) as $line10) {
                    imagettftext($image, 18, 0, $textX10, $textY10, $black, $font, $line10);
                    $textY10 += $lineHeight10; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines11) as $line11) {
                    imagettftext($image, 18, 0, $textX11, $textY11, $black, $font, $line11);
                    $textY11 += $lineHeight11; // Adjust the line height as needed
                }
                foreach (explode("\n", $textLines12) as $line12) {
                    imagettftext($image, 18, 0, $textX12, $textY12, $black, $font, $line12);
                    $textY12 += $lineHeight12; // Adjust the line height as needed
                }

                header("Content-Type: image/png");
                imagepng($image);

                // Additional headers for download
                header("Content-Disposition: attachment; filename=Employee_ID.png");
                header("Content-Length: " . ob_get_length());

                // Clean the output buffer and end the script
                ob_end_flush();
            }
        }
    }
}
