<?php 
// msg vars
$msg = '';
$msgClass = '';


// check for submit
if(filter_has_var(INPUT_POST, 'submit')){
    echo 'Submitted';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

// Check Required FIelds
    // email exists?
    // this works even without the php isset section, just based on input name:
    if(!empty($email) && !empty($name) && !empty($message)){
        echo 'PASSED';
    // Check Email
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            // failed
            $msg = 'please use a valid email';
            $msgClass = 'alert-danger';
        } else {
            // passed
            $toEmail = 'thelmaijemma@gmail.com';
            $subject = 'Contat Request Form' .$name ;
            $body = '<h2>Contact Request</h2>
            <h4>Name</h4><p>'.$name.'</p>
            <h4>Email</h4><p>'.$email.'</p>
            <h4>Message</h4><p>'.$message.'</p>
            ';

            // Email Headers
            $headers = "MIME-Version: 1.0"."\r\n";
            $headers .="Content-Type: text/html;harset=UTF-8" . "\r\n";

            // Additional Headers
            $headers .="From: " . $name . "<" .$email. ">" . "\r\n";

            if(mail($toEmail, $subject, $body, $headers)){
                // Email Sent
                $msg = 'Your Email has been sent';
                $msgClass = 'alert-success';
            } else {    
                $msg = 'your email was not sent';
                $msgClass = 'alert-danger';

            }

        }
    } else {
        // failed
        $msg = 'please fill in all fields';
        $msgClass = 'alert-danger';
        // this is a boostrap clas to make it red
    }


}


?>


<?php
// test for msg
if($msg != ''):?>
<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
<?php endif; ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control"
    value="<?php echo isset($_POST['name']) ? $name : '' ?>">
    </div>
    <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control"
    value="<?php echo isset($_POST['email']) ? $email : '' ?>">
    </div>
    <div class="form-group">
    <label> Message</label>
    <textarea name="message" class="form-control">
    <?php echo isset($_POST['message']) ? $message : '' ?>
    </textarea>
    </div>
    <br>
    <button type="submit" name="submit" class="btn btn-primary">
    Submit </button>
    </form>
    </div>
