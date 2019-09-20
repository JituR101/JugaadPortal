<?php
// Start the session
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
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
    require_once "Mail.php";
    foreach ($_POST['email'] as $index => $email) {
        $name=$_POST['name'][$index];
        $from = "E-CELL VNIT <noreply@ecellvnit.org>";    //your mail id
        $to = $email;
        $subject = "Registration successful";
        $body = '
        <!DOCTYPE html>
        <html>
            <head>
                <style>
                    li{
                        padding:10px;
                    }
                    p{
                        font-size:16px;
                    }
                </style>
            </head>
            <body style="width:100%; background-color:#fff; padding:50px 30px; color:1e1e1e; margin-top:100px;font-family:Helvetica,Arial,sans-serif">
            <div style="background-color:#000;width:90%;  padding:10px 30px;"><img src="https://www.ecellvnit.org/img/logo-ecell.png"></div>
                <div style="width:90%; background-color:#f7f9fb; padding:50px 30px;color: #212121;">
                    <h3><b>Hello '.$name.',</b></h3>
                    <p style="font-size:18px;">Thank You for registering with us. Your Unique ID is <b>'.$UNIQUE.'</b><br></p>
                </div>
                <div style="padding:60px 30px; width:90%;color: #212121;">
                    <h4>Team Guidelines for Jugaad 18\'</h4>
                    <ol>
                    <li>Registration will begin at 9 AM.</li>
                    <li>A team registering at the desk will randomly be assigned a mentor. The team leader will receive an automated email with a link. They will share this link with their mentor.</li>
                    <li>The link opens up a transaction database. The mentor will be able to track each transaction simply by refreshing the page.</li>
                    <li>The team leader will also form a WhatsApp group for the team and the mentor in order to facilitate swift communication and sharing of data.</li>
                    <li>The mentor shall demand regular updates from their assigned teams in the form of photographic, videographic or written evidence of each transaction or of the service being sold.</li>
                    <li>All participating teams must finish their sales by 4:30 pm (recommended) so that they can report back to the registration desk as clarified below.</li>
                    <li>All participating teams must report to the registration area by 5 pm. Failing to do so can result in immediate disqualification of the concerned team.</li>
                    <li>In the registration area, a team will approach their mentor and hand over the Rs. 100 component provided to them initially. The team will also give their profits to the mentor for verification.</li>
                    <li>The team will then be returned their team leader\'s ID proof. They will also receive participation certificates for each team member.</li>
                    <li>After final evaluation, teams with the top three highest profits will receive first, second and third position respectively.</li>
                    <li>In order to ensure fair play, a part of the profits of the winning teams will be deducted based on the amount. With a bit of forethought, the underlying reasons for this are clear.</li>
                    <li>The profits of all other teams will be returned in whole. The initial investment component of the team will not be considered for final evaluation. It will be deducted from the total amount to arrive at the profits made.</li>
                    <li>There is a special award known as \'Most Innovative Award\' to recognize creative and out of the box ideas by teams. This award can go to anyone, even if the profits made are comparatively low.</li>
                    <li>The winning teams will receive goodies, internships and many exciting prizes.</li>
                    <li>All participants are welcome to take pictures at the photo booth in the registration area.</li>
                    <li>All members can approach the organizers for doubts and/or assistance.</li>
                    </ol>
                </div>
                <hr>
                <div style="padding:50px 30px; width:90%;color:#fff; background-color:#1e1e1e;">
                    <h5>Contact Us</h5>
                    <p>Lakshya Shukla<br>
                    (Event Manager)</p>
                    <p>+91 77384 46941</p>
                    <p>or</p>
                    <p>Mail Us: contact@ecellvnit.org</p>
                </div>
            </body>
        </html>';
        $host = "smtp.zoho.com";
        $port = "465";
        $username = "jitendra@ecellvnit.org";          //your mail id
        $password = "Webgoogler@18";                      //password of this mail id
        $headers = array('MIME-Version' => '1.0rn',
            'Content-Type' => "text/html; charset=ISO-8859-1rn",
            'From' => $from,
            'To' => $to,
            'Subject' => $subject);
        $smtp = Mail::factory('smtp',
            array('host' => $host,
                'port' => $port,
                'auth' => true,
                'username' => $username,
                'password' => $password));
        $mail = $smtp->send($to, $headers, $body);
    }
    $myFile = "$UNIQUE.php"; // or .php
    $fh = fopen($myFile, 'w'); // or die("error");
    $stringData = file_get_contents("transactions.php");
    fwrite($fh, $stringData);
    fclose($fh);
    // sql to create table
    $sql = "CREATE TABLE $UNIQUE (
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
            <p style="text-align: center; margin-top:20px;">Further Details and Instructions have been mailed to you.<br>ALL THE BEST !!!
                <?php
                if (PEAR::isError($mail)) {
                    // echo("<p>" . $mail->getMessage() . "</p>");
                    echo'<p style="text-align: center;margin-top:10px;">Facing errors while sending mail, please contact our registration desk</p>';
                } else {
                    echo'<p style="text-align: center;margin-top:10px;">Mail successfully sent</p>';
                }
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
