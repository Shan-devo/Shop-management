<?php
session_start();
$_SESSION["refresh"]="no";
    $host=" ";
        $dbusername=" ";
        $dbpassword=" ";
        $dbname=" ";

$conn = mysqli_connect("$host","$dbusername","$dbpassword","$dbname");

if(!$conn)
{
    echo " Error in connection";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/normalized.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/interface.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar nabvar-expand-md navbar-dark navbar-custom sticky-top">
        <div class="container-fluid">
         
            <a class="navbar-brand" href="../index.html" >Shop management</a>   
        <a  href="../html/interface.html" style="margin-left: 30%; color: white;"> Home </a>        

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="../php/logout.php"> Log out </a> </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid bg">
        <div class="row">
           <div class="col-2">
           <ul class="list-group list-group-item-action sidebar">
           <li class="list-group-item"><a href="profile.php"> Profile</a> 
            <li class="list-group-item"><a href="../html/Add.html"> Add Items</a></li>
            <li class="list-group-item"><a href="delete.php"> Delete Items</a></li>
            <li class="list-group-item"><a href="../html/interface.html">Home</a></li>
            <li class="list-group-item"><a href="../html/contact.html">Contact</a></li>

           
        </ul>
          </div>     
         
        <div class="col-8 action">     
       
        <?php
           $sql="SHOW TABLES FROM $dbname";
           $result=mysqli_query($conn ,$sql);
           while($row= mysqli_fetch_row($result))
         { 
             ?>
              
            <h1 class="display1 text-center" style="border: 1px solid black; background:black; color:white;">  <?php  echo "$row[0]";?> </h1>
              <table class="table table-light table-hover">
                <tr>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Price in Rs </th>
                    <th> Quantity</th>
                    <th> Date </th>
                    <th> Total </th>
                    <th class="float-right"> Delete </th>
                </tr> 
        </table>
         
          <?php     /*$arr = array($row[0]);
               echo implode(",",$arr);*/
            $sql2="SELECT * FROM $row[0]";
            $result2=mysqli_query($conn,$sql2);
           while($row2=mysqli_fetch_array($result2))
          {  
            ?>     
             <form action="../php/updatedata.php" method="post">   
             <input type="hidden" name="table" value="<?php echo $row[0]?>">
                <table class="table table-light table-hover">
                     <tr scope="row">
                     <td class="text-center" width="50px"><?php echo $row2[0] ?> </td>
                     <td class="text-center" width="120px"><?php echo $row2[1] ?> </td>
                     <td class="text-center" width="200px"><input style="width:70px;" type="text" name="price" value="<?php echo $row2[2] ?>"> </td>
                     <td class="text-center" width="130px"><input style="width:50px;" type="text" name="quantity" value="<?php echo $row2[3] ?>"></td>
                     <td class="text-center" width="100px"><input style="width:100px;"type="text" name="date" value="<?php echo $row2[4] ?>"></td>
                     <td class="text-center" width="100px"><?php echo $row2[5] ?> </td>
                    <input type="hidden" name="id" value="<?php echo $row2[0]?>">
                    <td>  <button type="submit" name="submit" class="btn text-dark float-right btn-primary" style="background:white; border:1px solid black;">Update</button> </td>                  
                     </tr>
                     </form>
              </table>
           <?php          
           }
        }?>
     
    </div>
  </div>
  </div>
</body>
</html>
