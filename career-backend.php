<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);              --->    this is error handling code 
// error_reporting(E_ALL);

include('swiftmailer/vendor/autoload.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // echo "<pre>";
    // print_r($_POST);

    // exit;

    $data = '<table border="1" bordercolor="#ccc" align="center" width="650" style="width:650px;" cellpadding="10" cellspacing="0">';

    $data .= '<tr><td colspan="2" align="center" style="font-size:15px; font-weight:600;">Career Form Enquiry Details :-</td></tr>';/* field name */


    $data .= '<tr><td>Name</td><td>' . htmlspecialchars($_POST['name']) . '</td></tr>';

    $data .= '<tr><td>Email</td><td>' . htmlspecialchars($_POST['email']) . '</td></tr>';

    $data .= '<tr><td>Phone No</td><td>' . htmlspecialchars($_POST['phone']) . '</td></tr>';

    $data .= '<tr><td>City</td><td>' . htmlspecialchars($_POST['city']) . '</td></tr>';

    $data .= '<tr><td>Exprience</td><td>' . htmlspecialchars($_POST['experience']) . '</td></tr>';

    $data .= '<tr><td>Role</td><td>' . htmlspecialchars($_POST['role']) . '</td></tr>';

    $data .= '<tr><td>Current Company</td><td>' . htmlspecialchars($_POST['current-company']) . '</td></tr>';

    $data .= '<tr><td>Designation</td><td>' . htmlspecialchars($_POST['designation']) . '</td></tr>';

    $data .= '<tr><td>Preferred Location</td><td>' . htmlspecialchars($_POST['pre-location']) . '</td></tr>';

    $data .= '<tr><td>Message</td><td>' . htmlspecialchars($_POST['message']) . '</td></tr>';

    $data .= '<tr><td>IP Address</td><td>' . $_SERVER['REMOTE_ADDR'] . '</td></tr>';

    $data .= '</table>';



    $message = $data;
    // Create the Transport
    $transport = (new Swift_SmtpTransport('mail.avantikahr.com', 465, 'ssl'))  // 465 is a port number okay
        ->setUsername('noreply@avantikahr.com')          // c-penal : id or password
        ->setPassword('B4Y}x8(o0kQk');

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = (new Swift_Message())
        ->setSubject('career Form Enquiry')
        ->setFrom(['noreply@avantikahr.com' => 'career Form Enquiry'])       // company name
        ->setTo(['anil@avantikahr.com' => 'career Form Enquiry'])      // Your email id 
        ->setBody($data)
        ->setContentType("text/html")
        ->attach(Swift_Attachment::fromPath($_FILES['document1']['tmp_name'])->setFilename($_FILES['document1']['name']));   // document1 : file name , tmp_name : kisi bhi file choose kiye hue uska naam , name : this is using for file name okay   and and aap iske sath another attechment file bhi use kar sakte ho , , laga ke or last me ;



    // Send the message
    $result = $mailer->send($message);
    /*var_dump($result);exit;*/

    if ($result) { ?>

        <script>
            window.location.href = 'success.php';
        </script>

    <?php
    } else { ?>

        <script>
            window.location.href = 'failed.php';
        </script>

<?php }
}

?>