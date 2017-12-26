<?php

include_once(dirname(__DIR__)."/model/Team.php");

class Model {
	public function getTeams()
	{
		// here goes some hardcoded values to simulate the database

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_PORT => "8080",
			CURLOPT_URL => "http://159.89.1.213:8080/teams",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"accept: application/x-www-form-urlencoded",
				"cache-control: no-cache",
				"postman-token: a5933d5e-d216-c695-f36d-b47ed399b14b"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$response = json_decode($response);
			return $response;
		}
	}

	public function getTeam($name)
	{

	}


}

?>
