<?php

class sender
{
	public function sendEmail ($fromName, $fromEmail, $toEmail, $subject, $emailBody) 
	{		
		require_once('Mailin.php');	
		
		$mailin = new Mailin('https://api.sendinblue.com/v2.0','VhnR3LBzQpbWDJOr');
		
		$data 	= array( 
					"to" => array($toEmail=>$toEmail),
					"from" => array($fromEmail,"Grupo España"),
					"subject" => $subject,
					"html" => $emailBody,
					"headers" => 
						array(
							"Content-Type"=> "text/html; charset=iso-8859-1"
							)
				);

		$mailin->send_email($data);
		
		/*require_once 'mail_api/src/Mandrill.php';
		
		try {
		    $mandrill = new Mandrill('LeW8vQRVdJP5Hmb2QEgQ2Q');
		    $message = array(
		        'html' => $emailBody,
		        'subject' => $subject,
		        'from_email' => $fromEmail,
		        'from_name' => $fromName,
		        'to' => array(
		            array(
		                'email' => $toEmail,
		                'type' => 'to'
		            )
		        ),
		        'headers' => array('Reply-To' => $fromEmail),
		        'important' => false,
		        'track_opens' => null,
		        'track_clicks' => null,
		        'auto_text' => null,
		        'auto_html' => null,
		        'inline_css' => null,
		        'url_strip_qs' => null,
		        'preserve_recipients' => null,
		        'view_content_link' => null,
		        'tracking_domain' => null,
		        'signing_domain' => null,
		        'return_path_domain' => null,
		        'merge' => true,
		        'merge_language' => 'mailchimp'
		    );
		    $async = false;
		    $ip_pool = 'Main Pool';
		    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
		    
		    return true;
		    
		} catch(Mandrill_Error $e) {
		    return false;
		    throw $e;
		}*/
	}
	
	public function readTemplateFile($FileName) {	
		$fp = fopen($FileName,"r") or exit("No se puede abrir el archivo ".$FileName);
		$str = "";
		while(!feof($fp)) {
			$str .= fread($fp,1024);
		}	
		return $str;
	}
	
} // Close class