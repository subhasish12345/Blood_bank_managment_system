<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include("config/connection.php");
include("includes/fetch_users_info.php");
include("includes/time_function.php");
include("includes/num_k_m_count.php");

// Ensure the user is logged in, otherwise redirect to index page
if (!isset($_SESSION['Username'])) {
    header("location: index");
    exit();
}

// Define the path for images (assuming it's needed later in the code)
$check_path = "";
if (is_dir("imgs/")) {
    $check_path = "";
} elseif (is_dir("../imgs/")) {
    $check_path = "../";
} elseif (is_dir("../../imgs/")) {
    $check_path = "../../";
}
?>

<!-- Start of HTML content -->
<p class="BB"><?php echo lang('recently_starts_from'); ?></p>

<?php
// Get the session user's ID
$mYiD = $_SESSION['user'];

// Correct the SQL query to fetch the most recent logins for the session user
$getS_sql = "SELECT * FROM login WHERE user = :mYiD ORDER BY id DESC LIMIT 5";
$getS = $conn->prepare($getS_sql);
$getS->bindParam(':mYiD', $mYiD, PDO::PARAM_INT);
$getS->execute();

// Fetch and display the recent logins
while ($getS_row = $getS->fetch(PDO::FETCH_ASSOC)) {
    $getuserid = $getS_row['u_id'];

    // Fetch the username associated with the user ID
    $getuser_sql = "SELECT user FROM login WHERE id = :user";
    $getuser = $conn->prepare($getuser_sql);
    $getuser->bindParam(':user', $getuserid, PDO::PARAM_INT);
    $getuser->execute();

    while ($getuser_row = $getuser->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <a href="u/<?php echo $getuser_row['user']; ?>">
            <p class="<?php echo lang('HLP_b'); ?>"><?php echo $getuser_row['user']; ?></p>
        </a>
        <?php
    }
}
?>

<!-- Link to the user's profile -->
<a href="./u/<?php echo $_SESSION['user']; ?>&ut=stars">
    <p class="<?php echo lang('HLP_b'); ?>">Your Profile</p>
</a>
