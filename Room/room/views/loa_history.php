<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>LOA History</title>
    </head>

    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <?php include '../components/sidebar.php'; ?>

                <!-- Main page -->
                <div class="layout-page">
                    <?php include '../components/navbar.php'; ?>

                    <!-- Content -->
                    <div class="content-wrapper mt-3">
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
                                                $query = "SELECT * FROM deployment_history WHERE is_deleted = '0'";
                                                $result = $link->query($query);
                                                while($row = $result->fetch_assoc()){
                                                    $start_date = $row['loa_start_date'];
                                                    $end_date = $row['loa_end_date'];
                                                    $dateObj = date_create_from_format('Y-m-d', $start_date);
                                                    $dateObj2 = date_create_from_format('Y-m-d', $end_date);
                                                    $formattedDate_start = date_format($dateObj, 'F j, Y');
                                                    $formattedDate_end = date_format($dateObj2, 'F j, Y');
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id']?></td>
                                                <td><?php echo $row['type']?></td>
                                                <td><?php echo $row['category']?></td>
                                                <td><?php echo $row['employee_name']?></td>
                                                <td><?php echo $row['place_assigned']?></td>
                                                <td><?php echo $formattedDate_start?></td>
                                                <td><?php echo $formattedDate_end?></td>
                                                <td><?php echo $row['employment_status']?></td>
                                                <td>
                                                    <a href="download_loa_history.php?id=<?php echo $row['employee_id'] ?>" name="download_deploy" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download LOA"><i class="bi bi-cloud-download"></i></a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
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