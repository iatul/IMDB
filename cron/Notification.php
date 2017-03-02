<?php
Class Notification{
	function __construct(){
		$this->sendNotification();
	}

	private function getData{
		$query = "SELECT s.name, s.email, m.name as movie_name
 		  FROM notification as n
 		  JOIN movie as m ON (n.mid == m.id)
 		  JOIN subscriber as s ON (n.sid == s.id)
 		  WHERE from_unixtime(m.release_date, '%Y-%m-%d') = ?	";
 		$date = date('Y-m-d', time());  
		$result = Query::doSelect( $query, array ($date), 'slave', false);
		return $result;
	}
	
	private function sendMail($name, $email, $movie){
		$msg = "<!DOCTYPE html>
                <html><body>
                	<p>Hi ". $name .", </p>
                    <p>". $movie. " movie has been released today</p>
                    <p> Plese hurry and rush to nearby cinema.</p>
                    <br><p>Best regards,<br>Team IMDB</p> 
                </body></html>";
		#send($email, $msg); Utility Needed for this
	}

	private function sendNotification(){
		$data = $this->getData();

		foreach ($data as $details) {
			$this->sendMail($details['name'], $details['email'], $details['movie_name'])
		 } 
	}
}

$obj = new Notification();

?> 

