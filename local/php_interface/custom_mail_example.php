<?
require_once 'Net/SMTP.php';

function custom_mail($to, $subject, $message, $additionalHeaders = '', $additional_parameters = '')
{

   $smtpServerHost         = 'ssl://mail.domain.com'; #Пишем адрес почтового сервера
   $smtpServerHostPort      = 465; #порт для соединения 465
   $smtpServerUser         = 'mail@domain.com'; #Почтовый ящик для входа и отправки писем (должен быть настоящий)
   $smtpServerUserPassword   = 'pass'; #Пароль от ящика

   if (!($smtp = new Net_SMTP($smtpServerHost, $smtpServerHostPort))) {
      return false;
   }
   if (PEAR::isError($e = $smtp->connect())) {
      return false;
   }
   if (PEAR::isError($e = $smtp->auth($smtpServerUser, $smtpServerUserPassword))) {
      return false;
   }

   preg_match('/From: (.+)\n/i', $additionalHeaders, $matches);
   list(, $from) = $matches;

   $smtp->mailFrom($from);
   $smtp->rcptTo($to);

   $eol = CAllEvent::GetMailEOL();

   $additionalHeaders .= $eol . 'Subject: ' . $subject;

   if (PEAR::isError($e = $smtp->data($additionalHeaders . "\r\n\r\n" . $message))) {
      return false;
   }

   $smtp->disconnect();

   return true;
}
?>
