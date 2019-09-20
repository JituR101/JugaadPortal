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
        <div class="s-promo-block-v3 g-bg-position--center g-fullheight--sm" style=";"id="skew1" >
            <div class="container g-ver-center--sm g-padding-y-125--xs g-padding-y-0--sm">
                <div class="g-margin-t-30--xs g-margin-t-40--sm g-margin-b-30--xs g-margin-b-50--md">
                    <h1 class="g-font-size-40--xs g-font-size-80--sm g-font-size-120--lg g-font-weight--600" style="color:#d43557">JUGAAD'19</h1>

                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-push-4 g-margin-b-50--xs g-margin-b-0--md">
                        <div class="s-promo-block-v3__divider g-display-none--xs g-display-block--md"></div>
                        <div class="row">
                            <div class="col-sm-6 g-margin-b-30--xs g-margin-b-0--md">
                                <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".4s">
                                    <p class="g-font-size-20--xs g-font-size-20--sm g-font-size-30--lg g-font-weight--600 g-color--white">How much can you make with 100 bucks?</p>
                                </div>
                            </div>
                            <div class="col-sm-5 col-sm-offset-1">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
                                            <span class="s-promo-block-v3__date g-font-size-60--xs g-font-size-60--sm g-font-size-100--lg g-font-weight--600" style="color:#d43557;">21<sub class="g-font-size-20--xs g-font-size-30--lg">SEPT</sub></span>
                                        </div>
                                    </div>
                                    <!--<div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">-->
                                    <!--    <span class="s-promo-block-v3__month g-font-size-18--xs g-font-size-22--lg g-font-weight--300 g-color--white-opacity-light">Prize Worth</span>-->
                                    <!--    <span class="s-promo-block-v3__year g-font-size-18--xs g-font-size-22--lg g-font-weight--300 g-color--white-opacity-light">And more!</span>-->
                                    <!--</div>-->
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
        <div class="g-promo-section" id="about">
            <div class="container g-padding-y-10--xs g-padding-y-40--sm">
                <div class="row">
                    <div class="col-md-4 g-margin-t-15--xs g-margin-b-60--xs g-margin-b-0--lg">
                        <!--<p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Ecell</p>-->
                        <br><div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">
                            <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md">ABOUT</h2>
                        </div>
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
                            <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--primary">JUGAAD</h2>
                        </div>
                    </div>
                    <div class="col-md-7 col-md-offset-1">
                        <p class="g-font-size-18--xs g-color--dark">Jugaad is the ability to produce awesome products out of anything. To ignite this spirit, E-Cell organises an event called 'JUGAAD' at <span class="g-font-size-18--xs g-color--dark"><a href="http://vnit.ac.in/"class="g-color--primary" style="text-decoration:underline;">Visvesvaraya National Institute of Technology</a></span> where the partcipipants use their skills, resources, languages and a solid understanding of time to make ginormous profits. </p>
                        <p class="g-font-size-18--xs g-color--dark">Participants are given an initial base investment of INR 100. Teams have full freedom to use that money whichever way they like, to earn maximum profits, through legal means. The event lets participants think different conducts to earn money which have at times resulted in beautiful ideas and products. The winners of the event are given exciting goodies and an internship opportunity at an esteemed organisation. </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- End About -->
        <div style="position:relative;height:0;padding-bottom:56.24%"><iframe src="https://www.youtube.com/embed/zbNeZ2bGJiM?ecver=2&controls=0&showinfo=0&modestbranding=1&vq=highres&rel=0" style="position:absolute;width:100%;height:100%;left:0" width="640" height="360" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>

        <!--========== END PROMO BLOCK ==========-->

        <!--========== PAGE CONTENT ==========-->

        <div class="container g-padding-y-10--xs g-padding-y-40--sm " id="register">
            <div class="col-md-12 g-margin-t-15--xs g-margin-b-60--xs g-margin-b-0--lg">
                    <div class="wow fadeInLeft g-text-center--xs" data-wow-duration=".3" data-wow-delay=".3s">
                        <h2 class="g-font-size-32--xs g-font-size-36--sm g-font-size-36--md ">Register Now</span></h2>
                    </div>
            </div>
            <div class="row">

                    <div class="col-lg-4"></div>
                    <div class="well col-lg-4" style="padding:40px!important;margin-top:30px!important">
                        <center style="color:red;padding-bottom:20px">Registrations Open</center>
                        <p>Please select the team size</p>
                        <form class="form-horizontal" method ="post" action="index.php">
                            <div class="form-group">
                                <select class="form-control s-form-v2__input g-radius--50" name="SIZE" required>
                                    <option value="" default>TEAM SIZE</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <input type="submit"  name="insert" value="NEXT" class="btn btn-info" style="text-align: center">
                                </div>
                            </div>
                            <p class="g-font-size-20--xs g-color--black"><a href="/include/media/jugaad_information_booklet.pdf">Download Brochure</a></p>
                        </form>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
        </div>

        <!-- Sponsors -->

        <div class="jugaad">
                <div class="g-text-center--xs g-margin-b-40--xs">
                    <!--<p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Partners</p>-->
                    <h2 class="g-font-size-24--xs g-font-size-36--md g-color--white">Our Sponsors</h2>
                </div>
                <div class="container g-padding-y-40--xs g-padding-y-40--sm" id="partners">
                    <!-- Swiper Clients -->
                    <div class="container" id="foot">
                        <div class="row">

                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
                                    <img class="s-clients-v1" src="img/clients/swiggy.png" alt="Swiggy Logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".3s">
                                    <img class="s-clients-v1" src="img/clients/radio_mirchi.jpg" alt="Radio Mirchi Logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".4s">
                                    <img class="s-clients-v1" src="img/clients/simple_crm.png" alt="Simple CRM Logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".5s">
                                    <img class="s-clients-v1" src="img/clients/madfries.png" alt="Madfries Logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".2s">
                                    <img class="s-clients-v1" src="img/clients/ictrd.jpg" alt="ICTRD Logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".5s">
                                    <img class="s-clients-v1" src="img/clients/saboo_home_decor.jpg" alt="Saboo Home Decor Logo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Swiper Clients -->
                </div>
            </div>
        <!-- End Sponsors -->
        <!-- Feedback Form -->
        <div class="g-bg-color--sky-light" id="contact">
            <div class="container g-padding-y-0--xs g-padding-y-0--sm">
                <div class="g-text-center--xs g-margin-b-40--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Contact</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md">Mail Us</h2>
                </div>
                <form method="post" action="">
                    <div class="row g-margin-b-40--xs">
                        <div class="col-sm-6 g-margin-b-20--xs g-margin-b-0--md">
                            <div class="g-margin-b-20--xs">
                                <input type="text" name="name" class="form-control s-form-v2__input g-radius--50" placeholder="* Name">
                            </div>
                            <div class="g-margin-b-20--xs">
                                <input type="email" name="email" class="form-control s-form-v2__input g-radius--50" placeholder="* Email">
                            </div>
                            <input type="text" name="phone" class="form-control s-form-v2__input g-radius--50" placeholder="* Phone">
                        </div>
                        <div class="col-sm-6">
                            <textarea class="form-control s-form-v2__input g-radius--10 g-padding-y-20--xs" rows="8" name="message" placeholder="* Your message"></textarea>
                        </div>
                    </div>
                    <div class="g-text-center--xs">
                        <button type="submit" class="text-uppercase s-btn s-btn--md s-btn--primary-bg g-radius--50 g-padding-x-80--xs">Submit</button>
                    </div>
                </form>
                <div class="g-text-center--xs" id="confirm"></div>
                <div class="g-text-center--xs g-margin-b-40--xs">
                    <br><br>
                    <p class="text-uppercase g-font-size-14--xs g-color--dark g-font-weight--400 g-letter-spacing--2 g-margin-b-25--xs">Or Need Any Help? Contact: <a href="team.php">Team</a></p>
                </div>
            </div>
        </div>
        <!-- End Feedback Form -->


        <!-- Patronage -->
            <div class="footer">
                <div class="g-text-center--xs g-margin-b-40--xs">
                    <!--<p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Partners</p>-->
                    <h2 class="g-font-size-24--xs g-font-size-36--md g-color--white">Under patronage of</h2>
                </div>
                <div class="container g-padding-y-40--xs g-padding-y-40--sm" id="partners">
                    <!-- Swiper Clients -->
                    <div class="container" id="foot">
                        <div class="row">

                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
                                    <img class="s-clients-v1" src="img/clients/Make_In_India.png" alt="Clients Logo">
                                </div>
                            </div>


                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".3s">
                                    <img class="s-clients-v1" src="img/clients/TiE.png" alt="Clients Logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".4s">
                                    <img class="s-clients-v1" src="img/clients/CIVN.png" alt="Clients Logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".5s">
                                    <img class="s-clients-v1" src="img/clients/pmyuva.png" alt="Clients Logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".2s">
                                    <img class="s-clients-v1" src="img/clients/digital-india.png" alt="Clients Logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".5s">
                                    <img class="s-clients-v1" src="img/clients/vnit_aa.png" alt="Clients Logo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Swiper Clients -->
                </div>
            </div>
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
