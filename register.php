<?php 
$page_title = "Registration Form"; 
include('includes/header.php');
include('includes/navbar.php'); 
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow"> 
                    <div class="card-header">
                        <h5>Registration Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method = "POST">
                            <div class="form-group" mb-3>
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" >  
                            </div>
                            
                            <div class="form-group" mb-3>
                                <label for="email_adress">Email Address</label>
                                <input type="text" name="email" class="form-control" >  
                            </div>
                            <div class="form-group" mb-3>
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control" >  
                            <div class="form-group">
                                <button type="submit" name = "register_btn"class="btn btn-primary">Register Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>