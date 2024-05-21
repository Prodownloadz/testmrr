<?php
include('include/config.php');
$case_file_id = $_GET['case-file-id'];
$case_id = $_GET['case-id'];
$query = "DELETE FROM `case_files` WHERE id='$case_file_id'";
$execute = mysqli_query($conn, $query);
if ($execute) {
    ?>
    <script type="text/javascript">
        window.location.href = 'case-details.php?cid=<?php echo $case_id ?>';
    </script>
    <?php
} else {
    die('Error : While Removing Case File');
}