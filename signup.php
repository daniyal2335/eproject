<?php
include('adminpanel/php/query.php');
include('components/subheader.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!-- Sign Up Start -->
        <div class="container-fluid py-5">
            <div class="row h-100 align-items-center justify-content-center py-5" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.php" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Lawyers</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                           
                            <input type="text" pattern="[A-Za-z]{3,}" id="name" name="uName" Required class="form-control" id="floatingText" placeholder="jhondoe">
                            <span id="n"></span>
                            <label for="floatingText">Username</label>
                         
                        </div>
                        <div class="form-floating mb-3">
                     
                            <input type="email" Required class="form-control" id="email" name="uEmail" id="floatingInput" placeholder="name@example.com">
                            <span id="e"></span>
                            <label for="floatingInput">Email address</label>
                          
                        </div>
                        <div class="form-floating mb-4">
                       
                            <input type="password" Required class="form-control" id="spassword" name="uPassword" id="floatingPassword" placeholder="Password">
                            <span id="p"></span>
                            <label for="floatingPassword">Password</label>
                         
                        </div>
                        <div class="form-floating mb-4">
                     
                            <input type="password" Required class="form-control" id="confirmpassword"  name="ucPassword" id="floatingPassword" placeholder="Password">
                                <span id="errormsg"></span>
                            <label for="floatingPassword">Confirm Password</label>
                        
                        </div>

                        <div class="form-floating mb-4" id="contact">
                            <input type="tel" Required class="form-control" name="sCont" pattern="03[0-9]{9}" id="contact" placeholder="Format: 03123456789" Required>
                            <label for="contact">
                            Enter number
                            <small>Format: 03123456789</small>
                            </label> 
                        </div>

                        <div class="form-floating mb-4">
                            <select class="form-select" name="sLocation" id="" Required>
                                <option>Select City</option>
                                <option value="karachi">Karachi</option>
                                <option value="lahore">Lahore</option>
                                <option value="islamabad">Islamabad</option>
                            </select>
                            <label for="">Select City</label>
                            </div>

                        <div class="form-floating mb-4">
                        <select Required class="form-select lawCat"  name="roleId" id="selecttt" onchange="userhide()">
                            <option value="">Sign Up as User or Lawyers</option>
                                <?php
                                $query = $pdo->query("select * from role where name != 'admin'");
                                $all = $query->fetchAll(PDO::FETCH_ASSOC); 
                                      foreach($all as $user){                       
                                ?>

                                <option value="<?php echo $user['id'] ?>"><?php echo $user['name'] ?></option>
                                <?php
                                      }
                                ?>
                            </select>
                            <label for="selecttt">Sign Up as User or Lawyers</label>
                            </div>

                          <!-- hidden div start -->
                    <div id="hDiv">
                          <div class="form-floating mb-4">
                         <select class="form-select" id="selectt" name="roleSec" id="">
                          <option value="">Select Role</option>
                          <?php
                          $query = $pdo->query("select * from category");
                          $category = $query->fetchAll(PDO::FETCH_ASSOC);
                          foreach($category as $cat){
                          ?>
                          <option value="<?php echo $cat['id'] ?>"><?php echo $cat['specialization'] ?></option>
                          <?php
                          }
                          ?>
                           </select>
                            <label for="selectt">Select Role</label>
                        </div> 

                        <div class="form-floating mb-4">
                            <input type="number" class="form-control" name="uExp" id="Eexperiance" placeholder="Experiance">
                            <label for="Experiance">Experiance</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="file" name="lawImage" id="image" class="form-control" placeholder="" aria-describedby="helpId"> 
                            <label for="image">image</label>
                            <small>Accept Only: JPG, PNG, WEBP, JPEG</small>
                        </div>

                    </div>

                          <!-- hidden div end -->
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" name="signUp" id="sub" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="login.php">Sign In</a></p>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>
 
    <?php
include('components/footer.php');
?>


<script>
        let userhide = () =>{
                let userType = document.querySelector("#selecttt").value;
                // console.log(userType);
                if(userType == 3){
                    document.querySelector("#hDiv").style.display = "none";
                }
                else if(userType == 2){
                    document.querySelector("#hDiv").style.display = "block";
                }
        }

</script>

<script>
    $(document).ready(function(){
    var error = false; 
    var found= false;
    $('#confirmpassword').keyup(function () {
            var password = $('#spassword').val();
            var cpassword = $('#confirmpassword').val();
            if (password != cpassword) {
                $(this).css({'border':'1px solid red'});
                $(this).next().html('Password is not matched ').css({ 'color':'red'});
            }
            else{
              $(this).css({'border':' ' });
              $("#errormsg").hide();
             $(this).css({'border':'1px solid green', 'margin-bottom': '4%' });
            
            }
        }) 
        // end matching passwords  

        $('#name').keyup(function () {
          var name=$('#name').val();
        if(name.length<3){
        $(this).css({'border':'1px solid red'});
         $(this).next().html('length should be greater than 2').css({ 'color':'red'});
         found= true;

          }
        
          else{
            found = false;
            $(this).css({'border':' ' });
            $("#n").hide();
            $(this).css({'border':'1px solid green', 'margin-bottom': '4%' });
          }
        }) 
        // end length of
        $('#name').click(function () {
          var name=$('#name').val();
        if(name == ""){
    
         $(this).next().html('please fill out this field').css({ 'color':'red'});
         $(this).css({'border':'1px solid red'});
      
      
          }
          else{
            $(this).css({'border':' ' });
            $("#n").hide();
            $(this).css({'border':'1px solid green', 'margin-bottom': '4%' });
          }
        }) 
        // end name
        $('#email').keyup(function () {
          var email=$('#email').val();
        if( email == ""){
    
         $(this).next().html('please fill out this field').css({ 'color':'red'});
         $(this).css({'border':'1px solid red'});
      
      
          }
          else{
            $(this).css({'border':' ' });
            $("#e").hide();
            $(this).css({'border':'1px solid green', 'margin-bottom': '4%' });
          }
        }) 
        // END EMAIL
        $('#spassword').keyup(function () {
          var password=$('#spassword').val();
        if( password == ""){
    
         $(this).next().html('please fill out this field').css({ 'color':'red'});
         $(this).css({'border':'1px solid red'});
      
      
          }
          else{
            $(this).css({'border':' ' });
            $("#p").hide();
            $(this).css({'border':'1px solid green', 'margin-bottom': '4%' });
          }
        }) 
  function emptyfield(id){
  var value= $(id).val();
  if(value==''){
    error= true;
    $(id).css({'border':'1px solid red'});
    $(id).next().html('This field is required').css({ 'color':'red'});

  }
  else{
    error= false;
    
  }
}

      $('#sub').click(function(){
          emptyfield('#name');
          emptyfield('#email');
          emptyfield('#spassword');
          emptyfield('#confirmpassword');
          if(error==true || found ==true){
            return false;
          }
          else{
            return true;
          }

          })
          
    
      
        // if(uerror){
        //   return true;
        // }
      })
        // $('#email'). click(function () {
        //   var email=$('#email').val();
        // if(email.length<=2){
        //  $(this).next().html('length should be greater than 2').css({ 'color':'red'});
        //   }
        //   else{
        //     $("#n").hide();
        //   }
        // }) 
       
</script>