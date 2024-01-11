<?php
session_start();
include '../../connect.php';

$deploy_id = $_POST['id'];
$query = "SELECT shortlist.*, employee.* 
FROM shortlist_master shortlist, employees employee
WHERE shortlist.employee_id = employee.id 
AND shortlistnameto = '" . $_SESSION['shortlist_title'] . "' AND employee.id = '$deploy_id'";
$result = $link->query($query);

if (!$result) {
    die("SQL Error: " . mysqli_error($link));
}

$row = $result->fetch_assoc();
?>

<div class="container-fluid">
    <!-- Start of Form -->
    <form action="action.php" method="POST">
        <?php
        $id =  $row['id'];
        $data = $_SESSION['shortlist_title'];

        $query_show = "SELECT shortlist.*, employee.* 
            FROM shortlist_master shortlist, employees employee
            WHERE shortlist.employee_id = employee.id 
            AND shortlistnameto = '$data' AND employee.id = '$id'";
        $query_result = $link->query($query_show);
        $query_row = $query_result->fetch_assoc();
        $appno = $query_row['appno'];
        ?>

        <input type="hidden" name="id" value="<?php echo $query_row["id"] ?>" />
        <input type="hidden" name="appno" value="<?php echo $query_row["appno"] ?>" />
        <input type="hidden" name="shortlist_title" value="<?php echo $data ?>" />
        <input type="hidden" name="date_shortlisted" value="<?php echo $query_row["dateto"] ?>" />
        <input type="hidden" name="status" id="status" class="form-control" value="DEPLOYED">

        <div class="row mt-3 form-group">
            <div class="col-md-3">
                <label for="" class="form-label">Type</label>
            </div>
            <div class="col-md-9">
                <select name="type" id="type" class="form-select">
                    <option value=""> Select</option>
                    <option value="NEW">NEW</option>
                    <option value="RENEWAL">RENEWAL</option>
                    <option value="REHIRED">REHIRED (new)</option>
                </select>
            </div>
        </div>

        <div class="row mt-3 form-group">
            <div class="col-md-3">
                <label for="" class="form-label">LOA Start Date</label>
            </div>
            <div class="col-md-9">
                <input type="date" name="start_loa" id="myDate" placeholder="Select start date" class="form-control" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <label for="" class="form-label">LOA End Date</label>
            </div>
            <div class="col-md-9">
                <input type="date" name="end_loa" id="myDate" placeholder="Select end date" class="form-control" required>
            </div>
        </div>
        <?php
        $shortlist_title = $query_row['shortlistnameto'];
        $queries = "SELECT * FROM shortlist_details WHERE shortlistname = '$shortlist_title'";
        $result_queries = $link->query($queries);
        while ($fetch_row = $result_queries->fetch_assoc()) {
            $project_title = $fetch_row['project'];
            $mrf_tracking = $fetch_row['mrf_tracking'];
        ?>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Division</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $mrf_query1 = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                    $mrf_result1 = $link->query($mrf_query1);
                    while ($mrf_row1 = $mrf_result1->fetch_assoc()) {
                    ?>
                        <input type="text" name="division" id="division" class="form-control" value="<?php echo $mrf_row1['division'] ?>" readonly>
                    <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Category</label>
                </div>
                <div class="col-md-9">
                    <select name="category" id="category" class="form-select" required>
                        <option value="">Select</option>
                        <?php
                        $querys = "SELECT * FROM categories";
                        $results = $link->query($querys);
                        while ($rowsss = $results->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $rowsss['description'] ?>"><?php echo $rowsss['description'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Locator</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $locator = '';
                    $querys_locator = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                    $result_locator = $link->query($querys_locator);
                    while ($row_locator = $result_locator->fetch_assoc()) {
                        $division = $row_locator['division'];
                        $year = date("Y");
                        $locator = $year . "_" . $division . "_" . $appno;
                    }

                    ?>
                    <input type="text" name="locator" id="locator" class="form-control" value="<?php echo $locator; ?>" readonly>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                </div>
                <div class="col-md-9">
                    <?php
                    $querys_emp_stat = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                    $result_emp_stat = $link->query($querys_emp_stat);
                    while ($row_emp_stat = $result_emp_stat->fetch_assoc()) {
                        $employment_status = $row_emp_stat['client'];
                    }

                    ?>
                    <input type="hidden" name="client_name" id="client_name" class="form-control" value="<?php echo $employment_status; ?>" readonly>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Place Assigned</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                    $mrf_result = $link->query($mrf_query);
                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                    ?>
                        <input type="text" name="place_assigned" id="place_assigned" value="<?php echo $mrf_row['project_title'] ?>" class="form-control" readonly>
                    <?php } ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Address Assigned</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                    $mrf_result = $link->query($mrf_query);
                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                    ?>
                        <input type="text" name="address_assigned" id="address_assigned" value="<?php echo $mrf_row['client_address'] ?>" class="form-control" readonly>
                    <?php } ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Channel</label>
                </div>
                <div class="col-md-9">
                    <select name="channel" id="channel" class="form-select" required>
                        <option value="">Select</option>
                        <?php
                        $channel_query = "SELECT * FROM channels";
                        $channel_result = $link->query($channel_query);
                        while ($channel_rows = $channel_result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $channel_rows['description'] ?>"><?php echo $channel_rows['description'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Department</label>
                </div>
                <div class="col-md-9">
                    <select name="department" id="department" class="form-select" required>
                        <option value="">Select</option>
                        <?php
                        $mrf_query = "SELECT * FROM department";
                        $mrf_result = $link->query($mrf_query);
                        while ($mrf_row = $mrf_result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $mrf_row['description'] ?>"><?php echo $mrf_row['description'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Employment Status</label>
                </div>
                <div class="col-md-9">
                    <select name="employment_status" id="employment_status" class="form-select" required>
                        <?php
                        $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                        $mrf_result = $link->query($mrf_query);
                        while ($mrf_row = $mrf_result->fetch_assoc()) {
                            $status = ucwords(strtolower($mrf_row['employment_stat']));
                        ?>
                            <option value="<?php echo ucwords(strtolower($mrf_row['employment_stat'])); ?>"><?php echo $status; ?></option>
                        <?php } ?>
                        <?php
                        $emp_query = "SELECT * FROM employment_status";
                        $emp_result = $link->query($emp_query);
                        while ($emp_row = $emp_result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo ucwords(strtolower($emp_row['name'])) ?>"><?php echo ucwords(strtolower($emp_row['name'])) ?></option>
                        <?php } ?>
                    </select>

                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Job Title</label>
                </div>
                <div class="col-md-9">
                    <select name="job_title" id="job_title" class="form-select" required>
                        <?php
                        $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                        $mrf_result = $link->query($mrf_query);
                        while ($mrf_row = $mrf_result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $mrf_row['position'] ?>"><?php echo $mrf_row['position'] ?></option>
                        <?php } ?>
                        <?php
                        $job_title_query = "SELECT * FROM job_title";
                        $job_title_result = $link->query($job_title_query);
                        while ($job_title_row = $job_title_result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $job_title_row['description'] ?>"><?php echo $job_title_row['description'] ?></option>
                        <?php } ?>
                    </select>

                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">LOA Template</label>
                </div>
                <div class="col-md-9">
                    <select name="loa_template" id="loa_template" class="form-select" required>
                        <option value="">Select</option>
                        <?php
                        $select_loa = "SELECT loa_main.*, loa_files.*
                                                                                                FROM loa_maintenance_word loa_main, loa_files loa_files
                                                                                                WHERE loa_files.loa_main_id = loa_main.id AND status = '1'";
                        $seleted_loa_result = $link->query($select_loa);
                        while ($selected_loa_row = $seleted_loa_result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $selected_loa_row['id'] ?>"><?php echo $selected_loa_row['loa_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Basic Salary</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                    $mrf_result = $link->query($mrf_query);
                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                    ?>
                        <input type="text" name="basic_salary" id="basic_salary" class="form-control" value="<?php echo $mrf_row['basic_salary'] ?>" required>
                    <?php } ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Ecola</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="ecola" id="ecola" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Communication Allowance</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                    $mrf_result = $link->query($mrf_query);
                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                    ?>
                        <input type="text" name="communication_allowance" id="communication_allowance" class="form-control" value="<?php echo $mrf_row['comm'] ?>">
                    <?php } ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Transportation</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                    $mrf_result = $link->query($mrf_query);
                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                    ?>
                        <input type="text" name="transportation_allowance" id="transportation_allowance" class="form-control" value="<?php echo $mrf_row['transpo'] ?>">
                    <?php } ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Internet Allowance</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="internet_allowance" id="internet_allowance" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Meal Allowance</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                    $mrf_result = $link->query($mrf_query);
                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                    ?>
                        <input type="text" name="meal_allowance" id="meal_allowance" class="form-control" value="<?php echo $mrf_row['meal'] ?>">
                    <?php } ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Outbase Meal</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="outbase_meal" id="outbase_meal" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Special Allowance</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="special_allowance" id="special_allowance" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Position Allowance</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="position_allowance" id="position_allowance" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Deployment Remarks</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="deployment_remarks" id="deplyment_remarks" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">No. of Days work</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                    $mrf_result = $link->query($mrf_query);
                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                    ?>
                        <input type="text" name="no_of_days" id="no_of_days" class="form-control" value="<?php echo $mrf_row['work_days'] ?>">
                    <?php } ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Outlet</label>
                </div>
                <div class="col-md-9">
                    <?php
                    $mrf_query = "SELECT * FROM mrf WHERE tracking = '$mrf_tracking'";
                    $mrf_result = $link->query($mrf_query);
                    while ($mrf_row = $mrf_result->fetch_assoc()) {
                    ?>
                        <input type="text" name="outlet" id="outlet" class="form-control" value="<?php echo $mrf_row['outlet'] ?>">
                    <?php } ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Supervisor</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="supervisor" id="supervisor" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Field Supervisor</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="field_supervisor" id="field_supervisor" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Designation</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="field_supervisor_designation" id="field_supervisor_designation" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Deployment Personnel</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="deployment_personnel" id="deployment_personnel" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Designation</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="deployment_personnel_designation" id="deployment_personnel_designation" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Project Supervisor</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="project_supervisor" id="project_supervisor" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Designation</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="project_supervisor_designation" id="project_supervisor_designation" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Head</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="head" id="head" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Designation</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="head_designation" id="head_designation" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="" class="form-label">ID#</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="loa_id" id="loa_id" class="form-control">
                </div>
            </div>

        <?php }
        ?>

<button type="button" class="btn btn-secondary mt-5" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary mt-5" name="create_loa">Save changes</button>
</form>
<!-- End of Form -->
</div>