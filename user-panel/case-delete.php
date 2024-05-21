<?php

include('include/config.php');
$case_id = $_GET['cid'];
$query = "DELETE FROM `cases` WHERE id='$case_id'";
$execute = mysqli_query($conn, $query);
if ($execute) {
    ?>
    <script type="text/javascript">
        window.location.href = 'case-management.php';
    </script>
    <?php

} else {
    die('Error : While Removing Case');
}