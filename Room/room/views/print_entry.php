<?php
session_start();
include '../../connect.php';

if (isset($_POST['printemp'])) {
    $appnoto1 = $_POST['applicant_no'];

    $_SESSION["appnoto1"] = $appnoto1;

    header("location:printemp.php");
}

if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Print an Entry</title>
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
                                            PRINT AN ENTRY
                                        </h4>
                                    </div>
                                    <hr>
                                    <form action="" method="POST"><br>
                                        <div class="form-group">
                                        <label class="form-label"> Shortlist Name</label>
                                            <center>
                                                <select class="form-select" name="applicant_no" required>
                                                    <option value="">Select Employee Name</option>
                                                    <?php
                                                    $resultpro = mysqli_query($link, "SELECT * FROM deployment WHERE is_deleted != '1'");
                                                    while ($rowpro = mysqli_fetch_assoc($resultpro)) {
                                                        $resultpro1 = mysqli_query($link, "SELECT * FROM employees WHERE appno = '" . $rowpro['appno'] . "'");
                                                        while ($rowpro1 = mysqli_fetch_array($resultpro1)) {
                                                            echo '<option  value="' . $rowpro1['appno'] . '">' . $rowpro1['lastnameko'] . ", " . $rowpro1['firstnameko'] . " " . $rowpro1['mnko'] . ' </option> ';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </center>
                                        </div>
                                        <div class="modal-footer mt-3">
                                            <input type="submit" name="printemp" value="Okay" class="btn btn-info">
                                    </form>
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