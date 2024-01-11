<?php
session_start();
include '../../connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <title>LOA Database</title>

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
    <?php
    if (isset($_SESSION['successMessage'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: "<?php echo $_SESSION['successMessage']; ?>",
            })
        </script>
    <?php unset($_SESSION['successMessage']);
    } ?>

    <?php
    if (isset($_SESSION['errorMessage'])) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: "<?php echo $_SESSION['errorMessage']; ?>",
            })
        </script>
    <?php unset($_SESSION['errorMessage']);
    }
    ?>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include '../components/sidebar.php'; ?>

            <!-- Main page -->
            <div class="layout-page">
                <?php include '../components/navbar.php'; ?>

                <!-- Content -->
                <div class="content-wrapper mt-2">
                    <div class="container">
                        <div class="card">
                            <div class="container">
                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto text-center">
                                    <h4 class="fs-4">
                                        DEPLOYMENT LOA DATABASE
                                    </h4>
                                </div>
                                <hr>
                                <table class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>LOA ID</th>
                                            <th>Type</th>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>Project</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Employment Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM deployment";
                                        $result = $link->query($query);
                                        while ($row = $result->fetch_assoc()) {
                                            $start_date = $row['loa_start_date'];
                                            $end_date = $row['loa_end_date'];
                                            $dateObj = date_create_from_format('Y-m-d', $start_date);
                                            $dateObj2 = date_create_from_format('Y-m-d', $end_date);
                                            $formattedDate_start = date_format($dateObj, 'F j, Y');
                                            $formattedDate_end = date_format($dateObj2, 'F j, Y');
                                            $id = $row['employee_id'];
                                            $fetch = "SELECT * FROM employees WHERE id = '$id'";
                                            $retrieved = $link->query($fetch);
                                            while ($fetched = $retrieved->fetch_assoc()) {
                                               

                                                //VARIABLE FOR FILE NAME ON ID CARD IN LOA DATABASE
                                        $name=$fetched['firstnameko'] . " " . $fetched['mnko'] . " " . $fetched['lastnameko']. "-PCN_ID.png";
                                                //END

                                        ?>
                                                <tr>
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['type'] ?></td>
                                                    <td><?php echo $row['category'] ?></td>
                                                    <td><?php echo $fetched['lastnameko'] . ", " . $fetched['firstnameko'] . " " . $fetched['mnko'] ?></td>
                                                    <td><?php echo $row['place_assigned'] ?></td>
                                                    <td><?php echo $formattedDate_start ?></td>
                                                    <td><?php echo $formattedDate_end ?></td>
                                                    <td><?php echo $row['employment_status'] ?></td>
                                                    <td>
                                                        <div class="mb-1">
                                                            <a href="download_loa.php?id=<?php echo $fetched['id'] ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download LOA"><i class="bi bi-cloud-download"></i></a>
                                                        </div>
                                                        <div class="pt-1">
                                                            <a href="print_idcard.php?id=<?php echo $row['id'] ?>" name="name" download="<?php echo $name ?>" class="btn btn-primary" data-id="<?php echo $row['emp_id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download ID"><i class="bi bi-file-earmark-arrow-down"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>


                                <!-- Generating IDs -->
                                <div class="image justify-content-center align-items-center mx-auto" id="image">
                                    <?php
                                    if (isset($_POST['name'])) {
                                        $search_id = $link->real_escape_string($_POST['id']);
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
                                                            <img src="../../<?php echo $fetch_row['photopath'] ?>" id="photoko" alt="">
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
                                                            <img src="../../<?php echo $fetch_row['photopath'] ?>" id="photoko" alt="">
                                                        </div>
                                                        <div class="caption">
                                                            <input type="hidden" id="caption-input" value="<?php echo $name ?>_PCN ID">
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
    <?php include '../components/footer.php'; ?>
</body>

</html>