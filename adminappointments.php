<!doctype html>
<html lang="en">
  <head>
   <link href="assets/img/180.png" rel="icon">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <title>PhilNance - Messages</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >

  </head>
  <body>
  
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="adminappointments.php"><img src="assets/img/logo3.png" width="250" height="45"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class   ="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        
        <a class="nav-link active" aria-current="page" href="adminappointments.php">All Messages</a>
        
       
      </ul>
        <a class="btn btn-outline-success" href="logout.php" role="button">Logout</a>
    </div>
  </div>
    </nav>
    
    <form action="" method="post">
                <span class="details">&nbsp &nbsp</span>
                <input type="text" id="user" name="user" placeholder="Search Last Name" required>
                <input type="submit" name="submit" value="Search">
    </form>

    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered">
  <thead>
    <h3>Messages</h3>
    <tr class="text-center">
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Message</th>
      <th scope="col">Date Time</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
      
  <?php
        $con= mysqli_connect('localhost', 'root', '','contact');
        if ($con->connect_error)
        {
            die ('Connection failed : ' .$con->connect_error);
        } 


        if(isset($_POST['submit'])){
            $userID = $_POST['user'];
            $searchSql = "SELECT * FROM contact_us WHERE last_name = '".$userID."'";

            $searchResult = $con->query($searchSql);

            if($searchResult->num_rows>0){
              while ($row = $searchResult-> fetch_assoc()){?>
              <tr class="text-center">
                <td> <?php echo $row['id']; ?></td>
                <td> <?php echo $row['first_name']; ?></td>
                <td> <?php echo $row['last_name']; ?></td>
                <td> <?php echo $row['email']; ?></td>
                <td> <?php echo $row['phone']; ?></td>
                <td> <?php echo $row['message']; ?></td>
                <td> <?php echo $row['datetime']; ?></td>
                <td>
                <input type="submit" onclick="approveFunc('<?=$row['id'];?>')" name="Delete" value="delete"/>
                
                </td>
                
                
        <?php
            }
        }
        }else{
          $sql = "SELECT * FROM contact_us";
          
          $result = $con->query($sql);

          $status_id = 0;
          $email_array = [];
          
          if($result->num_rows>0){
              while ($row = $result-> fetch_assoc()){?>
                  
                  <tr class="text-center">
                  <td> <?php echo $row['id']; ?></td>
                <td> <?php echo $row['first_name']; ?></td>
                <td> <?php echo $row['last_name']; ?></td>
                <td> <?php echo $row['email']; ?></td>
                <td> <?php echo $row['phone']; ?></td>
                <td> <?php echo $row['message']; ?></td>
                <td> <?php echo $row['datetime']; ?></td>
                <td>
                <input type="submit" onclick="approveFunc('<?=$row['id'];?>')" name="Delete" value="Delete"/>
                
                </td>
                        
           <?php }
        }
      }
        ?>





</tbody>
    </table>  
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        function approveFunc(id){
          $.ajax({
          type: 'POST',
          url: 'delete.php',
          data: "id=" + id,
          success: function(data) {
              location.reload();
              console.log(data);
            }
          });
        }
        
    </script>
  </body>
</html>