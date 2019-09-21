<?php session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $SIZE=htmlspecialchars($_POST['SIZE']);
    $_SESSION['SIZE'] = $SIZE;
    header('Location: members.php');
    exit;
}
?>

<?php
if ( isset( $_POST['submitexpo'] ) ) {
    $con = mysqli_connect("localhost:3306", "conso", "Conso123@", "conso");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


    $email=$_POST['emailexpo'];


    $query = mysqli_query($con, "INSERT into expo (EMAIL) values('$email')");
     mysqli_close($con);
}
?>




<!DOCTYPE html>
<html lang="en" class="no-js">

    <?php include("head.php");?>
    <!-- Body -->
    <body id="main">

        <?php include("header.php");?>
        <!--========== PROMO BLOCK ==========-->
        <div class="s-promo-block-v3 g-bg-position--center g-fullheight--xs" style=";"id="skew1" >
            <div class="container g-ver-center--sm g-padding-y-0--xs g-padding-y-0--sm">
                <div class="g-margin-t-30--xs g-margin-t-40--sm g-margin-b-30--xs g-margin-b-50--md">
                    <h1 class="g-font-size-60--xs g-font-size-80--sm g-font-size-120--lg g-font-weight--600" style="color:#d43557">JUGAAD<sup class="g-font-size-30--xs g-font-size-60--md g-color--white">'19</sup></h1>

                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-push-4 g-margin-b-50--xs g-margin-b-0--md">
                        <div class="s-promo-block-v3__divider g-display-none--xs g-display-block--md"></div>
                        <div class="row">
                            <div class="col-sm-6 g-margin-b-30--xs g-margin-b-0--md">
                                <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".4s">
                                    <p class="g-font-size-30--xs g-font-size-30--sm g-font-size-30--lg g-font-weight--600 g-color--white">How much can you make with 100 bucks?</p>
                                </div>
                            </div>
                            <div class="col-sm-5 col-sm-offset-1">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
                                            <span class="s-promo-block-v3__date g-font-size-80--xs g-font-size-60--sm g-font-size-100--lg g-font-weight--600" style="color:#d43557;">21<sub class="g-font-size-30--xs g-font-size-30--lg">SEPT</sub></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-pull-8">
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".5s">
                            <a href=#register>
                                <i class="s-icon s-icon--lg s-icon--white-bg g-radius--circle ti-arrow-right"></i>
                                <span class="text-uppercase g-font-size-25--xs g-color--white g-padding-x-15--xs"><b>Register Now</b></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About -->
        <div class="g-promo-section g-bg-color--dark" id="about">
            <div class="container g-padding-y-10--xs g-padding-y-60--sm">
                <div class="row">
                    <div class="col-md-3 g-margin-t-15--xs g-margin-b-60--xs g-margin-b-0--lg">
                        <!--<p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Ecell</p>-->
                        <br><div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">
                            <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white">ABOUT</h2>
                        </div>
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
                            <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--primary">JUGAAD</h2>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-1">
                        <p class="g-font-size-18--xs g-color--white">Jugaad is the ability to produce awesome products out of anything. To ignite this spirit, E-Cell organises an event called 'JUGAAD' at <span class="g-font-size-18--xs g-color--dark"><a href="http://vnit.ac.in/"class="g-color--primary" style="text-decoration:underline;">Visvesvaraya National Institute of Technology</a></span> where the partcipipants use their skills, resources, languages and a solid understanding of time to make ginormous profits. </p>
                        <p class="g-font-size-18--xs g-color--white">Participants are given an initial base investment of INR 100. Teams have full freedom to use that money whichever way they like, to earn maximum profits, through legal means. The event lets participants think different conducts to earn money which have at times resulted in beautiful ideas and products. The winners of the event are given exciting goodies and an internship opportunity at an esteemed organisation. </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- End About -->
        <div style="position:relative;height:0;padding-bottom:56.24%"><iframe style="position:absolute;width:100%;height:100%;left:0" width="640" height="360" frameborder="0" allow="autoplay; encrypted-media"  src="https://www.youtube.com/embed/zbNeZ2bGJiM" allowfullscreen></iframe></div>


        <!--========== END PROMO BLOCK ==========-->

        <!--========== PAGE CONTENT ==========-->

        <div class="container g-padding-y-10--xs g-padding-y-40--sm g-bg-color--dark" id="register">
            <div class="col-md-12 g-margin-t-15--xs g-margin-b-60--xs g-margin-b-0--lg">
                    <div class="wow fadeInLeft g-text-center--xs" data-wow-duration=".3" data-wow-delay=".3s">
                        <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Get Started</p>
                        <h2 class="g-font-size-32--xs g-font-size-36--sm g-font-size-36--md g-color--white">Register Now</span></h2>
                        <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Registrations are closed</p>
                    </div>
            </div>
            <div class="row">


                    <div class="col-md-6 col-md-offset-3" style="padding:40px!important; background: transparent;">

                        <p class="g-color--white g-font-size-16--xs">Please select the team size</p>
                        <form class="form-horizontal" method ="post" action="index.php">
                            <div class="form-group">
                                <select class="form-control s-form-v2__input g-radius--50" disabled name="SIZE" required style="color:#fff !important;background: rgba(255,255,255,0.2)!important; border:1px white solid !important">
                                    <option value="" default>TEAM SIZE</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <br>
                            <div class="row">

                                <div class="g-text-center--xs">
                                    <button type="submit" class="text-uppercase s-btn s-btn--md s-btn--primary-bg g-radius--50 g-padding-x-80--xs">Submit</button>
                                </div>
                            </div>
                            <p class="g-font-size-20--xs g-color--black"><a href="/include/media/brochure19.pdf">Download Brochure</a></p>
                        </form>
                    </div>

                </div>
        </div>

        <!-- Sponsors -->

        <div class="jugaad">
                <div class="g-text-center--xs g-margin-b-40--xs">
                    <!--<p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Partners</p>-->
                    <h2 class="g-font-size-24--xs g-font-size-36--md g-color--dark g-margin-t-35--xs g-margin-t-55--md">Our Sponsors</h2>
                </div>
                <div class="container g-padding-y-40--xs g-padding-y-40--sm" id="partners">
                    <!-- Swiper Clients -->
                    <div class="container" id="foot">
                        <div class="row">

                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
                                    <img class="s-clients-v1" src="img/clients/titan.jpg" alt="Titan">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".3s">
                                    <img class="s-clients-v1" src="img/clients/raio-mirchi.png" alt="Radio Mirchi Logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".4s">
                                    <img class="s-clients-v1" src="img/clients/olive.jpg" alt="Simple CRM Logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".5s">
                                    <img class="s-clients-v1" src="img/clients/STARTUP.png" alt="Madfries Logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".2s">
                                    <img class="s-clients-v1" src="img/clients/Make_In_India.png" alt="ICTRD Logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".5s">
                                    <img class="s-clients-v1" src="img/clients/vnit_aa.png" alt="Saboo Home Decor Logo">
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Swiper Clients -->
                </div>
            </div>
        <!-- End Sponsors -->
        <!-- Feedback Form -->

        <!-- End Feedback Form -->


        <!-- Patronage -->

            <!-- End Patronage -->

        <!--========== END PAGE CONTENT ==========-->

        <!--========== FOOTER ==========-->
        <?php include("footer.php");?>
        <!--========== END FOOTER ==========-->

        <!--</div>-->

        <?php include("scripts.php");?>


    </body>
    <!-- End Body -->
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo("
<script type=\"text/javascript\">
    $('#confirm').append('<br><p class=\"text-uppercase g-font-size-14--xs g-font-weight--400 g-letter-spacing--2 g-margin-b-25--xs\">Plz! Fill the form</p>');
    location.replace(\"#contact\");
</script>
");

   return false;
   }

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

require_once "Mail.php";
#include("Mail.php");
$from = "E-CELL VNIT <noreply@ecellvnit.org>";    //your mail id
$to = "<contact@ecellvnit.org>";
$subject = "Website Contact Form:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$host = "ssl://sharedlinux.cloudhostdns.net";
$port = "465";
$username = "noreply@ecellvnit.org";          //your mail id
$password = "Ecellvnit123@";                      //password of this mail id

$headers = array ('From' => $from,
'To' => $to,
'Subject' => $subject);
$smtp = Mail::factory('smtp',
array ('host' => $host,
'port' => $port,
'auth' => true,
'username' => $username,
'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
} else {
   echo("
<script type=\"text/javascript\">
    $('#confirm').append('<br><p class=\"text-uppercase g-font-size-14--xs g-font-weight--400 g-letter-spacing--2 g-margin-b-25--xs\">Your Message Sent!</p>');
</script>
");
}

$from = "E-CELL VNIT <noreply@ecellvnit.org>";    //your mail id
$to = $email_address;
$subject = "Thank You For Contacting us";
$body = "Thank You $name for Contacting us.\n\nWe will surely contact you soon.\n\nFor instant support contact\nName: Meghna Bhave\nEmail: meghna.bhave@gmail.com\nPhone: 8368255076";
$host = "ssl://sharedlinux.cloudhostdns.net";
$port = "465";
$username = "noreply@ecellvnit.org";          //your mail id
$password = "Ecellvnit123@";                      //password of this mail id

$headers = array ('From' => $from,
'To' => $to,
'Subject' => $subject);
$smtp = Mail::factory('smtp',
array ('host' => $host,
'port' => $port,
'auth' => true,
'username' => $username,
'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
}
}
?>
