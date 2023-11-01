
<?php
include "connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


$name =  filterRequest('username') ;
$email = filterRequest('email') ;
$phone = filterRequest('phone') ;


$query = "INSERT INTO `users`(`name`, `email`, `phone`) VALUES ('$name','$email','$phone')";
$stmt = $conn->prepare($query);
$stmt->execute();

$count = $stmt->rowCount(); 
if ($count > 0){
echo json_encode(array("status" => "success"));
}else{
    echo json_encode(array("status" => "fail"));
}

}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = 'SELECT * FROM `users` ' ;
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($user);
   
}


?>