<?php error_reporting(0); ?> 
<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://reqres.in/api/users',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
var_dump($response);exit;

$response = json_decode($response, 1);
$user = $response['data'];
//var_dump($response['data']);
?>
   
    <h1>User Details</h1>
    
    <dl>
      
        <dt>User ID</dt>
        <dd><?= $user["id"] ?></dd>
        <dt>FirstName</dt>
        <dd><?= $user["first_name"] ?></dd>
        <dt>LastName</dt>
        <dd><?= $user["last_name"]?></dd>
        <dt>Email</dt>
        <dd><?= htmlspecialchars($user["email"]) ?></dd> 
    </dl>
    