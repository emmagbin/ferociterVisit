 <!-- Main Wrapper -->
 <div class="inner-wrapper login-body">
   <div class="login-wrapper">
     <div class="container">
       <div class="loginbox shadow-sm grow">
         <div class="login-left">
           <img class="img-fluid" src="<?php echo $logo; ?>" alt="Logo">

         </div>
         <div class="login-right">
           <div class="login-right-wrap">
             <h1>Login</h1>
             <p class="account-subtitle"><?php echo $company_name ?> Visitors Application</p>

             <?php echo validation_errors(); ?>

             <!-- Form -->
             <?php echo form_open('VerifyLogin/index'); ?>
             <!-- <form method="POST" action="VerifyLogin"> -->
             <div class="form-group">
               <input class="form-control" name="username" type="text" placeholder="Email">
             </div>
             <div class="form-group">
               <input class="form-control" name="password" type="password" placeholder="Password">
             </div>
             <div class="form-group">
               <select class="form-control select" name="where">
                 <option selected disabled>Login To</option>
                 <option value="app">My Profile</option>
                 <option value="booklog">Log Book</option>


               </select>
               <br>

             </div>


             <div class="form-group">

               <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Login</button>
             </div>

             <!-- <button class="login100-form-btn" style="background-color: #1faa45!important;">
               Login
             </button> -->
             </form>
             <!-- /Form -->

             <div class="text-center forgotpass"><a href="reset">Forgot Password?</a>
               <!-- <a href="booklog">booklog</a> -->

             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- /Main Wrapper -->