<?php

class APIrequester
{
  public $protocol = "http://";
  public $baseURL = $protocol."devlfcrims.com/";
  public $port;
  public $available = array(
    "login" => array("v1/login/", "GET", array(
      "email",
      "password"
    )),
    "getCompetitors" => array("v1/getcompetitors/", "GET", array(
      "id",
      "range",
      "limit"
    )),
    "teamsInTier" => array("v1/teamsintier/", "GET", array(
      "tier"
    ))
  );

  public function __construct(){return;}

  public function call($whatToDo, $args)
  {
    $curl = curl_init();

    $postelements = "?";
    for($i = 0; $i < count($available[$whatToDo][2]), $i++)
    {
      if(count($args) != count($available[$whatToDo][2]))
        break;
      if($i != 0)
        $postelements .= "&";
      $postelements .= $available[$whatToDo][2][$i]."=";
      $postelements .= $args[$i];
    }

    curl_setopt_array($curl, array(
      CURLOPT_PORT => $port,
      CURLOPT_URL => $baseURL.$available[$whatToDo],
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => $available[$whatToDo][1],
      CURLOPT_POSTFIELDS => $postelements, //information ?name=...&t=...
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 344ce06d-85b9-f536-05c0-19b7e8d6dc87"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err)
      return 0;
    return $response;
  }
}
