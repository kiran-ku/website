<?php
    function myfputcsv($handle, $array, $delimiter = '#', $enclosure = '"', $eol = "\n") {
        $return = fputcsv($handle, $array, $delimiter, $enclosure);
        if($return !== FALSE && "\n" != $eol && 0 === fseek($handle, -1, SEEK_CUR)) {
            fwrite($handle, $eol);
        }
        return $return;
    }
    if(isset($_POST['mydrivers']))  {  
        $header=array();
        $data=array();
        foreach (array_slice($_POST,0,count($_POST)-1) as $key => $value) {    
            $header[]=$key;
            $data[]=$value;
        }  
        $fp = fopen('admin/drivers.csv', 'a+');
        //fputcsv($fp, $header);
        myfputcsv($fp, $data);
        //echo 'allert(Submitted Successfully)';


        $email_address = $_POST['email'];
	$feedback = $_POST['mesg'];
        $name = $_POST['name'];
        $feedback1 = "Hi $name,

Thank you for getting in touch with us. We will get back to you soon.
Have a great day ahead!

Regards,
Team Kestrel


*This is a system generated email. Please do not reply to this email.";

	function filter_email_header($form_field) {
		return preg_replace('/[\0\n\r\|\!\/\<\>\^\$\%\*\&]+/','',$form_field);
	}
	$email_address = filter_email_header($email_address);
	$headers = "From: $email_address\n";
        $sent = mail('contact@kestrelinnovations.com', 'Contact Form Submission', $feedback, $headers);
	$sent1 = mail($email_address, 'Contact Form Submission', $feedback1, $headers);

        //header("Location:https://www.kestrelinnovations.com");
        fclose($fp);
    }
?>

