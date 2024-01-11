<?php
session_start();
include '../../connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/konva@8.3.5/konva.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script> -->
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <title>Document</title>

    <style>
        .name {
            position: sticky;
            margin-top: -22.8rem !important;
            padding-top: 10px;
            margin-left: 2.1rem;
            background-color: transparent;
            width: 410px;
            text-align: center;
            box-shadow: none !important;
        }

        .position {
            position: sticky;
            margin-top: 1.5rem !important;
            padding-top: 10px;
            margin-left: 2.1rem;
            background-color: transparent;
            width: 410px;
            text-align: center;
            box-shadow: none !important;
        }

        .id_no {
            position: sticky;
            margin-top: 7.5rem !important;
            padding-top: 11px;
            margin-left: 1.9rem;
            background-color: transparent;
            width: 190px;
            text-align: center;
            box-shadow: none !important;
        }

        .date_end {
            position: sticky;
            margin-top: -3rem !important;
            padding-top: 10px;
            margin-left: 16rem;
            background-color: transparent;
            width: 190px;
            text-align: center;
            box-shadow: none !important;
        }

        .contact_person {
            position: sticky;
            margin-top: -34rem !important;
            padding-top: 5px;
            margin-left: 38rem;
            background-color: transparent;
            width: 280px;
            height: 50px;
            text-align: center;
            box-shadow: none !important;
        }

        .contact_address {
            position: sticky;
            margin-top: 1rem !important;
            padding-top: 10px;
            margin-left: 32rem;
            background-color: transparent;
            width: 370px;
            height: 80px;
            text-align: center;
            box-shadow: none !important;
        }

        .contact_number {
            position: sticky;
            margin-top: 0rem !important;
            padding-top: 18px;
            margin-left: 38rem;
            background-color: transparent;
            width: 270px;
            height: 55px;
            text-align: center;
            box-shadow: none !important;
        }

        .sss {
            position: sticky;
            margin-top: 0rem !important;
            padding-top: 15px;
            margin-left: 36rem;
            background-color: transparent;
            width: 20%;
            height: 50px;
            text-align: center;
            box-shadow: none !important;
        }

        .philhealth {
            position: sticky;
            margin-top: .1rem !important;
            padding-top: 15px;
            margin-left: 39rem;
            background-color: transparent;
            width: 20.6%;
            height: 50px;
            text-align: center;
            box-shadow: none !important;
        }

        .tin {
            position: sticky;
            margin-top: .3rem !important;
            padding-top: 15px;
            margin-left: 36rem;
            background-color: transparent;
            width: 20.6%;
            height: 50px;
            text-align: center;
            box-shadow: none !important;
        }

        .hdmf {
            position: sticky;
            margin-top: 0rem !important;
            padding-top: 15px;
            margin-left: 36rem;
            background-color: transparent;
            width: 20.6%;
            height: 50px;
            text-align: center;
            box-shadow: none !important;
        }

        .birthday {
            position: sticky;
            margin-top: 0rem !important;
            padding-top: 15px;
            margin-left: 37rem;
            background-color: transparent;
            width: 20.6%;
            height: 55px;
            text-align: center;
            box-shadow: none !important;
        }

        .name h2,
        .position h2,
        .id_no h2,
        .date_end h2 {
            font-size: 24px;
            font-family: 'Arial', sans-serif !important;
            color: black !important;
        }

        .contact_person h2,
        .contact_address h2,
        .contact_number h2,
        .sss h2,
        .tin h2,
        .philhealth h2,
        .hdmf h2,
        .birthday h2 {
            font-size: 20px;
            color: black !important;
        }

        #photo #photoko {
            z-index: 1;
            position: sticky;
            margin-top: -28.5rem;
            margin-left: 8rem;
            width: 203px;
            height: 210px !important;
            background: transparent;
        }

        #photoregular #photoko {
            z-index: 1;
            position: sticky;
            margin-top: -29.1rem;
            margin-left: 8.4rem;
            width: 205px;
            height: 210px !important;
            background: transparent;
        }

        .id_no_regular {
            position: sticky;
            margin-top: 7.5rem !important;
            padding-top: 18px;
            margin-left: 9rem;
            background-color: transparent;
            width: 190px;
            text-align: center;
            box-shadow: none !important;
        }

        .id_no_regular h2 {
            font-size: 24px;
            font-family: 'Arial', sans-serif !important;
            color: black !important;
        }
    </style>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include '../components/sidebar.php'; ?>

            <!-- Main page -->
            <div class="layout-page">
                <?php include '../components/navbar.php'; ?>

                <!-- Content -->
                <div class="content-wrapper">
                    <div class="container">
                        <div class="card">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-group row">
                                <div class="row mt-3 mb-3 mx-3">
                                    <div class="col-md-6">
                                        <input type="search" name="search_id" placeholder="Search..." id="search" class="form-control" required>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" name="search" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                            <div class="justify-content-end align-items-end mb-5 mt-3" style="margin-left: 1rem;">
                                <button class="btn btn-dark" id="download">Print ID Card</button>
                            </div>
                            <div class="image justify-content-center align-items-center mx-auto" id="image">
                                <?php
                                if (isset($_POST['search'])) {
                                    $search_id = $link->real_escape_string($_POST['search_id']);
                                    $html = '';

                                    // Query for Regular Employees
                                    $query = "SELECT * FROM deployment WHERE emp_id LIKE '%" . $search_id . "'";
                                    $result = $link->query($query);

                                    if ($result->num_rows > 0) {
                                        $html .= "";
                                        while ($row = $result->fetch_assoc()) {
                                            $id = $row['employee_id'];

                                            $fetch_employee = "SELECT * FROM employees WHERE id = '$id'";
                                            $fetch_result = $link->query($fetch_employee);
                                            while ($fetch_row = $fetch_result->fetch_assoc()) {
                                                if (empty($fetch_row['mnko']) || $fetch_row['mnko'] === "NA" || $fetch_row['mnko'] === "N/A") {
                                                    $name = $fetch_row['firstnameko'] . " " . $fetch_row['lastnameko'];
                                                } else {
                                                    $name = $fetch_row['firstnameko'] . " " . $fetch_row['mnko'] . " " . $fetch_row['lastnameko'];
                                                }
                                                $position = $row['job_title'];
                                                $id_no = $row['emp_id'];
                                                $end_date = $row['loa_end_date'];
                                                $formattedDate = str_replace('-', '/', $end_date);
                                                $contact_person = $fetch_row['e_person'];
                                                $address = $fetch_row['e_address'];
                                                $contact_number = $fetch_row['e_number'];
                                                $sss = $row['sss'];
                                                $philhealth = $row['philhealth'];
                                                $pagibig = $row['pagibig'];
                                                $tin = $row['tin'];
                                                $birthday = $fetch_row['birthday'];
                                                $timestamp_birthday = strtotime($birthday);
                                                $formattedDate_birthday = date("F d, Y", $timestamp_birthday);

                                                if ($row['employment_status'] === "REGULAR") {

                                ?>
                                                    <img src="../assets/img/elements/IDRegular2.png" alt="ID" class="img-responsive">
                                                    <div class="card name">
                                                        <h2><?php echo $name ?></h2>
                                                    </div>
                                                    <div class="card position">
                                                        <h2><?php echo $position ?></h2>
                                                    </div>
                                                    <div class="card id_no_regular">
                                                        <h2><?php echo $id_no ?></h2>
                                                    </div>

                                                    <div class="card contact_person">
                                                        <h2><?php echo $contact_person ?></h2>
                                                    </div>
                                                    <div class="card contact_address">
                                                        <h2><?php echo $address ?></h2>
                                                    </div>
                                                    <div class="card contact_number">
                                                        <h2><?php echo $contact_number ?></h2>
                                                    </div>
                                                    <div class="card sss">
                                                        <h2><?php echo $sss ?></h2>
                                                    </div>
                                                    <div class="card tin">
                                                        <h2><?php echo $tin ?></h2>
                                                    </div>
                                                    <div class="card philhealth">
                                                        <h2><?php echo $philhealth ?></h2>
                                                    </div>
                                                    <div class="card hdmf">
                                                        <h2><?php echo $pagibig ?></h2>
                                                    </div>
                                                    <div class="card birthday">
                                                        <h2><?php echo $formattedDate_birthday ?></h2>
                                                    </div>

                                                    <div class="card" id="photoregular">
                                                        <img src="<?php echo $fetch_row['photopath'] ?>" id="photoko" alt="">
                                                    </div>
                                                    <div class="caption">
                                                        <input type="hidden" id="caption-input" value="<?php echo $name ?>-PCN ID">
                                                    </div>
                                                    <br><br><br><br><br><br>
                                                <?php

                                                } else { ?>

                                                    <img src="../assets/img/elements/PCNBG2.png" alt="ID" class="img-responsive">
                                                    <div class="card name">
                                                        <h2><?php echo $name ?></h2>
                                                    </div>
                                                    <div class="card position">
                                                        <h2><?php echo $position ?></h2>
                                                    </div>
                                                    <div class="card id_no">
                                                        <h2><?php echo $id_no ?></h2>
                                                    </div>
                                                    <div class="card date_end">
                                                        <h2><?php echo $formattedDate ?></h2>
                                                    </div>

                                                    <div class="card contact_person">
                                                        <h2><?php echo $contact_person ?></h2>
                                                    </div>
                                                    <div class="card contact_address">
                                                        <h2><?php echo $address ?></h2>
                                                    </div>
                                                    <div class="card contact_number">
                                                        <h2><?php echo $contact_number ?></h2>
                                                    </div>
                                                    <div class="card sss">
                                                        <h2><?php echo $sss ?></h2>
                                                    </div>
                                                    <div class="card tin">
                                                        <h2><?php echo $tin ?></h2>
                                                    </div>
                                                    <div class="card philhealth">
                                                        <h2><?php echo $philhealth ?></h2>
                                                    </div>
                                                    <div class="card hdmf">
                                                        <h2><?php echo $pagibig ?></h2>
                                                    </div>
                                                    <div class="card birthday">
                                                        <h2><?php echo $formattedDate_birthday ?></h2>
                                                    </div>

                                                    <div class="card" id="photo">
                                                        <img src="<?php echo $fetch_row['photopath'] ?>" id="photoko" alt="">
                                                    </div>
                                                    <div class="caption">
                                                        <input type="hidden" id="caption-input" value="<?php echo $name ?>-PCN ID">
                                                    </div>
                                                    <br><br><br><br><br><br>
                                <?php }
                                            }
                                        }
                                    } else {
                                        echo "No record found";
                                        exit(0);
                                    }
                                }
                                ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#download").on('click', function() {
                var element = document.getElementById("image");
                var caption = $('#caption-input').val();

                html2canvas(element).then(function(canvas) {
                    var imageData = canvas.toDataURL("image/png");
                    var newData = imageData.replace(/^data:image\/png/, "data:application/octet-stream");

                    var downloadLink = document.createElement('a');
                    downloadLink.href = newData;
                    downloadLink.download = caption + '.png';
                    downloadLink.click();
                });
            });
        });
    </script>



    <?php
    include '../components/footer.php';
    ?>

</body>

</html>