<?php
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
// var_dump($response);exit;
$response = json_decode($response, 1);
$users = $response['data'];
// var_dump($response['data']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset ="UTF-8">
        <title>Users List</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First_name</th>
                <th>LAst_name</th>        
</tr>
</thead>
<tbody>
    <?php foreach ($users as $user): ?>
        <tr> 
            <td>
            <a href="show?<?= $user["id"] ?>">
                         <?= $user["id"] ?>
            </a></td>
            
            <td><?= $user["last_name"] ?></td>
            <td>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $user['id'] ?>">View</button>
            </td>
               </tr>   
                    <div id="myModal<?php echo $user['id'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">Details</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          </div>
                          <div class="modal-body">
                          <h3>First_Name : <?php echo $user['first_name']; ?></h3>
                          <h3>Last_name : <?php echo $user['last_name']; ?></h3>
                          <h3>Email : <?php echo $user['email']; ?></h3>
                          </div>
                      </div>
                    </div>
                  </div>
            <?php            
            ?>                
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</body>
</html>
