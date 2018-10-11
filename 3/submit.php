<!DOCTYPE html>
<?php
$servername = "localhost:3306";
$username="vipul2";
$password="Ecellvnit123@";
$dbname="jugaad";

$NAME="";
$COLLEGE="";
$CONTACT="";
$EMAIL="";

$UNIQUE="";
$PREFIX="J17";
$teamsize="3";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try{
    $conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
    echo("error in connecting");
}

if (isset($_POST["submit"])){
    $UNIQUE=uniqid($PREFIX);
    $TEAMNAME=$_POST['teamname'];
    foreach ($_POST['name'] as $index => $name) {
        $data1 = mysqli_real_escape_string($conn,$name);
        $data2 = mysqli_real_escape_string($conn,$_POST['college'][$index]);
        $data3 = mysqli_real_escape_string($conn,$_POST['contact'][$index]);
        $data4 = mysqli_real_escape_string($conn,$_POST['email'][$index]);
        mysqli_query($conn, "INSERT INTO `3` (`UNIQUE_ID` ,`TEAMNAME`,`NAME`, `COLLEGE`, `CONTACT`, `EMAIL`) VALUES ('$UNIQUE','$TEAMNAME','$data1', '$data2', '$data3', '$data4')") or die(mysqli_error($conn));
    }
}

require_once "Mail.php";
foreach ($_POST['email'] as $index => $email) {
    $name=$_POST['name'][$index];


    $from = "E-CELL VNIT <noreply@ecellvnit.org>";    //your mail id
    $to = $email;
    $subject = "Registration successful";
    $body = "Thank You $name for registering with us.\n\nYour Unique ID is $UNIQUE\n\nYour Unique Link is jugaad.ecellvnit.org/$teamsize/$UNIQUE.php\n\n
                Team Guidelines for Jugaad 17'\n\n

A participating team will comprise 3-5 members.\n
Registration will begin at 9 AM.\n
A team registering at the desk will randomly be assigned a mentor. The team will fill an offline form as well as an online form. The team leader will receive an automated email with a link. They will share this link with their mentor.\n
The link opens up a transaction database. The mentor will be able to track each transaction simply by refreshing the page.\n
The team leader will also form a WhatsApp group for the team and the mentor in order to facilitate swift communication and sharing of data.\n
The mentor shall demand regular updates from their assigned teams in the form of photographic, videographic or written evidence of each transaction or of the service being sold.\n
All participating teams must finish their sales by 4 pm (recommended) so that they can report back to the registration desk as clarified below.\n
All participating teams must report to the registration area by 4:30 pm. Failing to do so can result in immediate disqualification of the concerned team.\n
In the registration area, a team will approach their mentor and hand over the Rs. 100 component provided to them initially. The team will also give their profits to the mentor for verification.\n
The team will then be returned their team leader's ID proof. They will also receive participation certificates for each team member.\n
After final evaluation, teams with the top three highest profits will receive first, second and third position respectively.\n
In order to ensure fair play, a part of the profits of the winning teams will be deducted based on the amount. With a bit of forethought, the underlying reasons for this are clear.\n
The profits of all other teams will be returned in whole.\n
The initial investment component of the team will not be considered for final evaluation. It will be deducted from the total amount to arrive at the profits made.\n
There is a special award known as 'Most Innovative Award' to recognize creative and out of the box ideas by teams. This award can go to anyone, even if the profits made are comparatively low.\n
The team winning FIRST position will have an internship opportunity with Ola Cabs. Selection: Each member of the winning team will sit for a personal interview. One person will be finalized for the internship role.\n
The winning teams will receive goodies.\n
All participants are welcome to take pictures at the photo booth in the registration area.\n
All members can approach the organizers for doubts and/or assistance.";
    $host = "ssl://sharedlinux.cloudhostdns.net";
    $port = "465";
    $username = "noreply@ecellvnit.org";          //your mail id
    $password = "Ecellvnit123@";                      //password of this mail id

    $headers = array('From' => $from,
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
$stringData = file_get_contents("../transactions.php");
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

$query = mysqli_query($conn, "INSERT into $UNIQUE (DETAILS, INFLOW, OUTFLOW ) values('Investment by E-cell','0','100')");

$profitquery=mysqli_query($conn,"INSERT into `profit` (UNIQUE_ID, TEAMNAME, PROFIT ) values('$UNIQUE','$TEAMNAME','-100')");

?>




<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="JUGAAD'17 REGISTRATION">
    <meta name="author" content="Vipul Wairagade">
    <title>JUGAAD'17</title>
    <link href="../img/logo%20vnit.png" rel="shortcut icon">
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container" >
    <div class="well">
        <h4 style="text-align:center">Your Form Submitted Successfully</h4>
        <p style="text-align: center;">Further Details and Instructions have been mailed to you.<br><br>ALL THE BEST !!!
            <?php
            if (PEAR::isError($mail)) {
                echo("<p>" . $mail->getMessage() . "</p>");
            } else {
                echo("<p>Mail successfully sent</p>");
            }

            if ($tablequery) {
                echo '<p style="text-align: center;">Transaction Link created successfully</p>';
            } else {
                echo "Error creating Transaction Link: " . mysqli_error($conn);
            }
            if ($query) {
                echo '<p style="text-align: center;">Transaction of RS 100 done Successfully</p>';
            } else {
                echo("Error description: " . mysqli_error($con));
                echo '<p>Error In doing Transaction</p>';
            }
            
            mysqli_close($conn);
            ?>

        </p>
    </div>
</div>
<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>