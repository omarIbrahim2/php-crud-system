
<?php 

  
   $path = realpath(dirname(__FILE__));
  include_once $path . "\\includes\\header.php"; 
  
  require_once $path . "\\models\\user.php";
    

  $user = new user();
  $uID = $_GET['id'];
   $User =  $user->find($uID);

   if ($User == false) {
      header("location:http://localhost/PDO/index.php");
      exit;
   }


   

  

?>

    <div class=" m-5">
    <div class="container">
        <form action="http://localhost/pdo/UsersActions/update.php" method="POST">

            <h1>update User</h1>

            <?php if (isset($_SESSION["errors"])) {?>
                 <?php foreach($_SESSION["errors"] as $errors){?>
                   <div class="alert alert-danger">
                      <p><?php echo $errors  ?> </p>
                   </div>
                 <?php } ?>
                 <?php session_unset()?>
           <?php } ?>
           
            
            <input name="id" value="<?php echo $User->id ?>" type="hidden">
        <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input  name="name" type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $User->name ?>" placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput2"value="<?php echo $User->email ?>"  placeholder="Email">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Password</label>
                <input  name="password" type="password" class="form-control" id="exampleFormControlInput3"value="<?php echo $User->password  ?>"  placeholder="password">
            </div>
             
            
            <button name="submit"  type="submit" class="btn btn-primary mb-3">Update</button>

        </form>


    </div>

    </div>



<?php  include_once $path . "\\includes\\footer.php";   ?>