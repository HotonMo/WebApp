<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>users information</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
 
</head>
<body>
  <div class="wrapper">
    <form action="index.php" method="post">
    <header>Add Users </header>
     <div class="field user_name">
        <div class="input-area">
          <input type="text" placeholder="Name" name="username" id="username">
          <i class="icon fas fa-user"></i> 
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Name can't be blank</div>
     </div>

      <div class="field email">
        <div class="input-area">
          <input type="text" placeholder="Email Address" name="email" id="email">
          <i class="icon fas fa-envelope"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Email can't be blank</div>
      </div>

      <div class="field phone">
        <div class="input-area">
          <input type="text" placeholder="Phone Number" name="phone" id="phone">
          <i class="icon fas fa-phone"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Phone can't be blank</div>
      </div>
 
      <input type="submit" id="submit" name="submit" value="Add user">
    </form>
  </div>
  <div class="wrapper" style="margin:50px;">
  <header>Users information</header>
  <table>
    <Thead>
     <tr>
       <th>Name:</th>
       <th>Email:</th>
       <th>Phone Number:</th>
    </tr>
    </Thead>

    <tbody>
    <?php
    include "connect.php" ;

    if(isset($_POST['submit'])){
      $name =  filterRequest('username') ;
      $email = filterRequest('email') ;
      $phone = filterRequest('phone') ;
      
      
      $query = "INSERT INTO `users`(`name`, `email`, `phone`) VALUES ('$name','$email','$phone')";
      $stmt = $conn->prepare($query);
      $stmt->execute();
    }



    $query = "SELECT * FROM `users`" ;
    $stmt = $conn->prepare($query);
    $stmt->execute();
    while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "
    <tr>
    <td>".$user["name"]."</td>
    <td>".$user["email"]."</td>
    <td>".$user["phone"]."</td>
    </tr>";
   }
    ?>
    </tbody>
  </table>
</div>
  <script src="script.js"></script>
</body>
</html>





