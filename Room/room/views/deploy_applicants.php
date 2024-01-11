<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Deploy Applicant</title>
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
                    <div class="content-wrapper mt-3">
                        <div class="containers">
                            <div class="card">
                                <?php
                                $shortlist_id = $_GET['shortlist_title'];
                                $_SESSION['shortlist_title'] = $_GET['shortlist_title'];
                                ?>
                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto">
                                    <h4 class="fs-4">
                                        Deploy (<?php echo $shortlist_id ?>)
                                    </h4>
                                </div>
                                <hr>
                                <table class="table" id="example" style="font-size: 13px !important;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>App No.</th>
                                            <th>Name</th>
                                            <th>SSS</th>
                                            <th>PagIBIG</th>
                                            <th>PhilHealth</th>
                                            <th>TIN</th>
                                            <th>Birthday</th>
                                            <th>Contact No.</th>
                                            <th>Date Start</th>
                                            <th>Date End</th>
                                            <th>Emp. status</th>
                                            <th>Status</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $queries = "SELECT shortlist.*, employee.* 
                                                    FROM shortlist_master shortlist, employees employee
                                                    WHERE shortlist.employee_id = employee.id 
                                                    AND shortlistnameto = '$shortlist_id'";
                                        $results = $link->query($queries);

                                        while ($rows = $results->fetch_assoc()) {
                                            $birthday = $rows['birthday'];
                                            $timestamp_birthday = strtotime($birthday);
                                            $formattedDate_birthday = date("F d, Y", $timestamp_birthday);
                                            $id = $rows['id'];

                                            // IF DEPLOYED NA
                                            if ($rows['deployment_status'] === 'DEPLOYED') {
                                        ?>
                                        <tr>
                                                <td><?php echo $rows['id'] ?></td>
                                                <td><?php echo $rows['appno'] ?></td>
                                                <td><?php echo $rows['lastnameko'], ", " . $rows['firstnameko'] . " " . $rows['mnko'] ?></td>
                                                <td><?php echo $rows['sssnum'] ?></td>
                                                <td><?php echo $rows['pagibignum'] ?></td>
                                                <td><?php echo $rows['phnum'] ?></td>
                                                <td><?php echo $rows['tinnum'] ?></td>
                                                <td><?php echo $formattedDate_birthday ?></td>
                                                <td><?php echo $rows['cpnum'] ?></td>
                                                <?php
                                                $deployment_query = "SELECT * FROM deployment WHERE employee_id = '$id'";
                                                $deployment_result = $link->query($deployment_query);
                                                $deployment_row = $deployment_result->fetch_assoc();
                                                    $loa_start_date = $deployment_row['loa_start_date'];
                                                    $loa_end_date = $deployment_row['loa_end_date'];
                                                    $dateObj = date_create_from_format('Y-m-d', $loa_start_date);
                                                    $dateObj2 = date_create_from_format('Y-m-d', $loa_end_date);
 
                                                    if ($dateObj !== false && $dateObj2 !== false) {
                                                        $formattedDate_start = date_format($dateObj, 'F j, Y');
                                                        $formattedDate_end = date_format($dateObj2, 'F j, Y');
                                                    } else {
                                                        // Handle the case where date parsing fails
                                                        echo "Date parsing failed for one or both dates.";
                                                    }
                                                ?>
                                                    <td><?php echo $formattedDate_start; ?></td>
                                                    <td><?php echo $formattedDate_end; ?></td>
                                                    <td><?php echo $deployment_row['employment_status']; ?></td>
                                                
                                                <td>DEPLOYED</td>
                                                <td><?php echo $rows['remarks'] ?></td>
                                                <td>
                                                    <?php  if (!empty($rows['ewb_status'])) { ?>
                                                        <div class="mb-1">
                                                            <input type="hidden" name="deployUpdateID" id="deployUpdateID" class="deployUpdateID" value="<?php echo $rows['id'] ?>">
                                                            <button type="button" name="deploy" class="btn btn-primary updateDeployOpenModal" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Update"><i class="bi bi-gear"></i></button>
                                                        </div>
                                                        <div class="mt-1">
                                                            <a href="download_loa.php?id=<?php echo $rows['id'] ?>" name="download_deploy" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download LOA"><i class="bi bi-cloud-download"></i></a>
                                                        </div>

                                                    <?php } else { ?>
                                                        <button type="button" name="deploy" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateDeployModal-<?php echo $rows['id'] ?>" style="visibility: hidden !important;"></button>
                                                    <?php } ?>
                                                </td>
</tr>
                                                <!-- IF HINDI PA NADEDEPLOY -->
                                            <?php
                                            } elseif (trim($rows['deployment_status'] === 'FOR DEPLOYMENT')) { ?>
                                                <tr>
                                                    <td><?php echo $rows['id'] ?></td>
                                                    <td><?php echo $rows['appno'] ?></td>
                                                    <td><?php echo $rows['lastnameko'], ", " . $rows['firstnameko'] . " " . $rows['mnko'] ?></td>
                                                    <td><?php echo $rows['sssnum'] ?></td>
                                                    <td><?php echo $rows['pagibignum'] ?></td>
                                                    <td><?php echo $rows['phnum'] ?></td>
                                                    <td><?php echo $rows['tinnum'] ?></td>
                                                    <td><?php echo $formattedDate_birthday ?></td>
                                                    <td><?php echo $rows['cpnum'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo $rows['ewbdeploy'] ?></td>
                                                    <td><?php echo $rows['remarks'] ?></td>
                                                    <td>
                                                        <?php if (!empty($rows['ewb_status'])) { ?>
                                                            <input type="hidden" name="deployID" id="deployID" class="deployID" value="<?php echo $rows['id'] ?>">
                                                            <button type="button" name="deploy" class="btn btn-primary open-modal" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Deploy and Appoint LOA"><i class="bi bi-folder-check"></i></button>
                                                        <?php } else { ?>
                                                            <button type="button" name="deploy" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deployModal-<?php echo $rows['id'] ?>" style="visibility: hidden !important;">Not empty</button>
                                                        <?php } ?>

                                                    </td>

                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>




                                <!-- Modal for Deployment and Appoint LOA form -->
                                <div class="modal fade" id="deployModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-2" id="exampleModalLabel">LOA</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                            </div>
                                        </div>
                                        <!-- End of Modal -->


                                        <hr>

                                    </div>
                                </div>

                                <!-- Modal for Deployment form -->
                                <div class="modal fade" id="updateDeployModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-2" id="exampleModalLabel">LOA</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <?php include '../components/footer.php'; ?>
    </body>

    </html>
<?php
} else {
    $_SESSION['errorMessage'] = "Hacker ka 'no?";
    header("Location: ../../index.php");
    exit(0);
}
?>