<?php
	include_once('config.php');
	function getResponse ($data) {
		$curl = curl_init(WEB_SERVICE_URL);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));                                                                  
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                                                                                                                                     
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}
?>