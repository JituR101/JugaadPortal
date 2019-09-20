<?php
// Start the session

session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
$SIZE = $_SESSION['SIZE'];
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $servername = "localhost:3306";
    $username="jugaad";
    $password="VNIT@123";
    $dbname="jugaad19";
    $NAME="";
    $COLLEGE="";
    $CONTACT="";
    $EMAIL="";
    $UNIQUE="";
    $PREFIX="J19";
    $teamsize=$SIZE;
    error_reporting(E_ERROR | E_PARSE);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    //connect to mysql database
    try{
        $conn = mysqli_connect($servername,$username,$password,$dbname);
    }catch(MySQLi_Sql_Exception $ex){
        echo("<p>Error in connecting</p>");
    }
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS profit(UNIQUE_ID varchar(255), TEAMNAME varchar(255),profit varchar(255))");
    if (isset($_POST["submit"])){
        $UNIQUE=uniqid($PREFIX);
        $TEAMNAME=$_POST['teamname'];
        if($teamsize == 3){$teamsize = 'Three';}
        if($teamsize == 4){$teamsize = 'Four';}
        if($teamsize == 5){$teamsize = 'Five';}
        mysqli_query($conn, "CREATE TABLE IF NOT EXISTS $teamsize(UNIQUE_ID varchar(255), TEAMNAME varchar(255),NAME varchar(255), COLLEGE varchar(255), CONTACT varchar(255),EMAIL varchar(255))");
        foreach ($_POST['name'] as $index => $name) {
            $data1 = mysqli_real_escape_string($conn,$name);
            $data4 = mysqli_real_escape_string($conn,$_POST['email'][$index]);
            $data2 = mysqli_real_escape_string($conn,$_POST['college'][$index]);
            $data3 = mysqli_real_escape_string($conn,$_POST['contact'][$index]);
            mysqli_query($conn, "INSERT INTO $teamsize(`UNIQUE_ID` ,`TEAMNAME`,`NAME`, `COLLEGE`, `CONTACT`, `EMAIL`) VALUES ('$UNIQUE','$TEAMNAME','$data1', '$data2', '$data3', '$data4')") or die(mysqli_error($conn));
        }
    }
    $myFile = "$UNIQUE.php"; // or .php
    $fh = fopen($myFile, 'w'); // or die("error");
    $stringData = file_get_contents("transactions.php");
    fwrite($fh, $stringData);
    fclose($fh);
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS $UNIQUE (
    ID INT(6) AUTO_INCREMENT PRIMARY KEY,
    DETAILS VARCHAR(255) NOT NULL,
    INFLOW VARCHAR(255) NOT NULL,
    OUTFLOW VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
    )";
    $tablequery=mysqli_query($conn, $sql);
    $query = mysqli_query($conn, "INSERT into $UNIQUE (DETAILS, INFLOW, OUTFLOW ) values('Investment by E-cell','100','0')");
    $profitquery=mysqli_query($conn,"INSERT into `profit` (UNIQUE_ID, TEAMNAME, PROFIT ) values('$UNIQUE','$TEAMNAME','100')");
}
?>



<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include("head.php");?>

<body id="main">

    <?php include("header.php");?>

            <!--========== PROMO BLOCK ==========-->
    <div class="g-bg-position--center js__parallax-window" style="background: black 50% 0 no-repeat fixed;">
        <div class="g-container--md g-text-center--xs g-padding-y-100--xs">
            <h1 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white g-letter-spacing--1">
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'):?>
                Submitted Successfully!!
                <?php else:?>
                505 ERROR!!
                <?php endif;?>
            </h1>
        </div>
    </div>


    <!--========== END PROMO BLOCK ==========-->
    <div class="container" >
        <div style="width:100%; background:#fff;padding:60px 50px">

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'):?>
            <p style="text-align: center; margin-top:20px;">Further Details and Instructions will be mailed to you.<br>ALL THE BEST !!!
                <?php
                // if (PEAR::isError($mail)) {
                //     // echo("<p>" . $mail->getMessage() . "</p>");
                //     echo'<p style="text-align: center;margin-top:10px;">Facing errors while sending mail, please contact our registration desk</p>';
                // } else {
                //     echo'<p style="text-align: center;margin-top:10px;">Mail successfully sent</p>';
                // }
                if ($tablequery) {
                    echo '';
                } else {
                    echo "Error creating Transaction Link: " . mysqli_error($conn);
                }
                if ($query) {
                    echo '<a href="http://jugaad.ecellvnit.org">GO BACK</a>';
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo '<p>Error</p>';
                }
                mysqli_close($conn);
                ?>

            </p>
            <?php else:?>

            <p style="text-align: center; margin-top:20px;"><a href="http://jugaad.ecellvnit.org">GO BACK</a></p>
            <?php endif;?>


        </div>
    </div>
    <?php include("footer.php");?>
    <?php include("scripts.php");?>
</body>
</html>
