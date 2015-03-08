<?php
   /* Valores enviados pelo form */
   $nome = utf8_decode(@$_POST['name']);
   $email = utf8_decode(@$_POST['email']);
   $assunto = $_POST['subject'];
   $mensagem = utf8_decode(@$_POST['msg']);
   
   /* Coloquem seu E-mail aqui */
   $para = "tarsila.kruse@gmail.com";
   /* Aqui uma pequena verificação para evitar que enviem E-mails sem valores */
   if ($nome != "" && $email != "" && $mensagem != "") {
      /* Montamos o E-mail */
      $corpo = '<html><head><title>'.$assunto.'</title></head><body>';
      $corpo .= 'Nome: '.$nome.'<br /><br />E-mai: '.$email;
	  $corpo .= '<br /><br />Mensagem: '.$mensagem;
	 
	 //Email q retorna para a pessoa q entrou em contato
	 
	 $subject2 = 'Thank you for contacting Tarsila Kruse';
	 $autoreply = '<html><head><title>Thank you for contacting Tarsila Kruse</title></head><body>';
	 $autoreply .='Thank you for getting in touch.<br /> I will get back to you as soon as possible. <br /><br /><br /><br />';
	 $autoreply .='<a href="http://www.tarsilakruse.com.br">www.tarsilakruse.com.br</a>';
	
      /* Aqui modificamos o tipo de E-mail para o formato HTML */
      $headers = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'From:'. $email . "\r\n";
	
	 $headers2 = 'MIME-Version: 1.0' . "\r\n";
      $headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	 $headers2 .= 'From: tarsile.kruse@gmail.com';//email que responde para quem enviou o contato
	 
	/* Por fim enviamos o E-mail com os dados*/
     $send = mail($para, $assunto, $corpo, $headers);
	 $send2 = mail($email, $subject2, $autoreply, $headers2);
      /* Retornamos um Ok para o Flash */
     if($send){ header("Location: http://www.tarsilakruse.com.br/thankyou"); }
   /* Caso os campos não sejam preenchidos */
   } else {
      /* Retorna o erro ao Flash */
      print 'Please fill in all the fields';
   }
?>