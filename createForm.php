

  <?php 
  
   $path = realpath(dirname(__FILE__));
  include_once $path . "\\includes\\header.php";  
  ?>
    <div class=" m-5">
    <div class="container">
        <form action="http://localhost/pdo/UsersActions/create.php" method="POST">

            <h1>Register User</h1>

            <?php if (isset($_SESSION["errors"])) {?>
                 <?php foreach($_SESSION["errors"] as $errors){?>
                   <div class="alert alert-danger">
                      <p><?php echo $errors  ?> </p>
                   </div>
                 <?php } ?>
                 <?php session_unset()?>
           <?php } ?>
           
            

        <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput2" placeholder="Email">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Password</label>
                <input  name="password" type="password" class="form-control" id="exampleFormControlInput3" placeholder="password">
            </div>
             
            
            <button name="submit"  type="submit" class="btn btn-primary mb-3">register</button>

        </form>


    </div>

    </div>




    <?php 
 include_once $path . "\\includes\\footer.php";  
 ?>