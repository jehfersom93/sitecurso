<?php
//if "email" variable is filled out, send email
  if (isset($_POST['contactForm']))  {
  
  //Email information
  $admin_email = "jehfersom@gmail.com";
  $email = $_POST['contactEmail'];
  $subject = $_POST['contactSubject'];
  $comment = $_POST['contactMessage'];
  
  //send email
  mail($admin_email, "$subject", $comment, "From:" . $email);
  
  //Email response
  echo "Mensagem enviada com sucesso!";
  }
  
  //if "email" variable is not filled out, display the form
  else  {
  
      echo 'Mensagem não enviada';

  }
?>