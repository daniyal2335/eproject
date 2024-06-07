<?php
include('dbcon.php');
session_start();

//login
if(isset($_POST['uLogin'])){
    $userEmail=$_POST['uEmail'];
    $userPassword=$_POST['uPassword'];
    // $userRoleId = $_POST['roleId'];
    $query=$pdo->prepare("select * from users where email= :userEmail AND password= :userPassword");
    $query->bindParam('userEmail',$userEmail);
    $query->bindParam('userPassword',$userPassword);
    $query->execute();
    $user=$query->fetch(PDO::FETCH_ASSOC);
   //print_r($user);
   if($user){
    if($user['role_id'] == 1 && $user['status'] == 'active'){
        $_SESSION['adminName']=$user['name'];
        $_SESSION['adminEmail']=$user['email'];
        echo "<script>location.assign('adminpanel/php/index.php')
        </script>";
    }

    elseif ($user['role_id'] == 2 && $user['status'] == 'active') {
        $_SESSION['lawId']=$user['id'];
        $_SESSION['lawName']=$user['name'];
        $_SESSION['lawEmail']=$user['email'];
        echo "<script>location.assign('adminpanel/php/index.php')
        </script>";
    }
    elseif ($user['role_id'] == 3 && $user['status'] == 'active') {
    $_SESSION['userId']=$user['id'];
    $_SESSION['userName']=$user['name'];
    $_SESSION['userEmail']=$user['email'];
    $_SESSION['userCont']=$user['phone'];
    echo "<script>location.assign('index.php')
    </script>";
    } 
    else if($user['status'] == "pending"){
        echo "<script>alert('your status is pending')
        location.assign('index.php')
        </script>"  ; 
    }  
}
else{
    echo "<script>alert ('invalid username or password');</script>";
}
}

//signup
if(isset($_POST['signUp'])){
    $name=$_POST['uName'];
    $email=$_POST['uEmail'];
    $pass=$_POST['uPassword'];
    $cpass=$_POST['ucPassword'];
    $role=$_POST['roleId'];
    $contact = $_POST['sCont'];
    $location = $_POST['sLocation'];

    if($cpass==$cpass){
        $query=$pdo->prepare("SELECT * FROM users where email =:email");
      
        $query->bindParam("email",$email,PDO::PARAM_STR);
     
        $query->execute();
        $user=$query->fetch(PDO::FETCH_ASSOC);
        if(!$user){
        if($role == 3){
        // Insert into users table for role 3
        $query=$pdo->prepare("insert into users(name,email,password, phone, location, role_id)values(:sName,:sEmail,:sPassword, :sPhone, :sLocation, :role)");
        $query->bindParam('sName',$name);
        $query->bindParam('sEmail',$email);
        $query->bindParam('sPassword',$pass);
        $query->bindParam('sPhone',$contact);
        $query->bindParam('sLocation',$location);
        $query->bindParam('role',$role);
        $query->execute();
    echo "<script>alert('register added successfully');location.assign('login.php')</script>";
    }

// role 3 end

    if($role == 2){
        $roleSec = $_POST['roleSec'];
        $exp = $_POST['uExp'];
        $lsImageName=$_FILES['lawImage']['name'];
        $lsImageTmpName=$_FILES['lawImage']['tmp_name'];
        $extension=pathinfo($lsImageName,PATHINFO_EXTENSION);
        $destination="adminpanel/assets/img/".$lsImageName;
        if($extension == "jpg"|| $extension == "png"|| $extension == "jpeg"|| $extension == "webp"){
            if(move_uploaded_file($lsImageTmpName,$destination)){
                // Insert into lawspeci table for role 2
                $query=$pdo->prepare("insert into lawspeci(name,email,password, contact, experience, location, image, c_id)values(:lName,:lEmail,:lPassword, :lContact, :lExp, :lLocation, :lImage, :lcId)");
                $query->bindParam('lName',$name);
                $query->bindParam('lEmail',$email);
                $query->bindParam('lPassword',$pass);
                $query->bindParam('lContact',$contact);
                $query->bindParam('lLocation',$location);
                $query->bindParam('lExp',$exp);
                $query->bindParam('lImage',$lsImageName);
                $query->bindParam('lcId',$roleSec);
                $query->execute();
                
                // Insert into users table for role 2
                $st = "pending";
                $query=$pdo->prepare("insert into users(name,email,password, phone, location, role_id,status)values(:sName,:sEmail,:sPassword, :sPhone, :sLocation, :role , :status)");
                $query->bindParam('sName',$name);
                $query->bindParam('sEmail',$email);
                $query->bindParam('sPassword',$pass);
                $query->bindParam('sPhone',$contact);
                $query->bindParam('sLocation',$location);
                $query->bindParam('role',$role);
                $query->bindParam('status',$st);
                $query->execute();
    echo "<script>alert('register added successfully');location.assign('login.php')</script>";
            }
        }
    }
    // role 2 end
   
}
   
   else{
       echo "<script>alert('email already exist');
       location.assign('login.php');</script>";
   }
      
       

}
   }



//add category
if(isset($_POST['addCategory'])){
    $cSpec=$_POST['cSpeci'];
    $cImageName=$_FILES['cImage']['name'];
    $cImageTmpName=$_FILES['cImage']['tmp_name'];
    $extension=pathinfo($cImageName,PATHINFO_EXTENSION);
    $destination="../assets/img/".$cImageName;
    if($extension == "jpg"|| $extension == "png"|| $extension == "jpeg"|| $extension == "webp"|| $extension == "jfif"){
        if(move_uploaded_file($cImageTmpName,$destination)){
            $query=$pdo->prepare("insert into category(specialization,image)
            values(:cSpeci,:cImage)");
            $query->bindParam('cSpeci',$cSpec);
            $query->bindParam('cImage',$cImageName);
            $query->execute();
            echo "<script>alert('Category added successfully');
        location.assign('viewCategory.php');
        </script>";
        }
    }

}

//update category
if(isset($_POST['updateCategory'])){
    $id=$_GET['cid'];
    $cSpec=$_POST['cSpeci'];
    $query=$pdo->prepare("update category set specialization=:uSpeci where id=:cid");
    if(isset($_FILES['cImage'])){
        $cImageName=$_FILES['cImage']['name'];
        $cImageTmpName=$_FILES['cImage']['tmp_name'];
        $extension=pathinfo($cImageName,PATHINFO_EXTENSION);
        $destination="../assets/img/".$cImageName;
        if($extension == "jpg"|| $extension == "png"|| $extension == "jpeg"|| $extension == "webp"|| $extension == "jfif"){
            if(move_uploaded_file($cImageTmpName,$destination)){
                $query=$pdo->prepare("update category set specialization=:uSpeci,image=:uImage where id=:cid");
                $query->bindParam('uImage',$cImageName);  
    
}
}
            $query->bindParam('cid',$id);
            $query->bindParam('uSpeci',$cSpec);
            $query->execute();
            echo "<script>alert('lawwyers update successfully');
        location.assign('viewCategory.php');
        </script>";
        }


    }

//delete catgeory
if(isset($_GET['cdid'])){
    $did=$_GET['cdid'];
    $query=$pdo->prepare("delete from category where id=:did");
    $query->bindParam('did',$did);
    $query->execute();
    echo "<script>alert('delete category successfully');
    location.assign('viewCategory.php');
    </script>";

}


//add law services
if(isset($_POST['addLawyers'])){
    $lName=$_POST['lName'];
    $lEmail=$_POST['lEmail'];
    $lContact=$_POST['lCon'];
    $lExp=$_POST['lexp'];
    $lLocation=$_POST['lLocation'];
    $cid=$_POST['cId'];
    $lImageName=$_FILES['lImage']['name'];
    $lImageTmpName=$_FILES['lImage']['tmp_name'];
    $extension=pathinfo($lImageName,PATHINFO_EXTENSION);
    $destination="../assets/img/".$lImageName;
    if($extension == "jpg"|| $extension == "png"|| $extension == "jpeg"|| $extension == "webp"|| $extension == "jfif"){
        if(move_uploaded_file($lImageTmpName,$destination)){
            $query=$pdo->prepare("insert into lawspeci(name,email,contact,experience,location,image,c_id)
            values(:lName,:lEmail,:lCon,:lexp,:lLocation,:lImage, :cid)");
            $query->bindParam('lName',$lName);
            $query->bindParam('lEmail',$lEmail);
            $query->bindParam('lCon',$lContact);
            $query->bindParam('lexp',$lExp);
            $query->bindParam('lLocation',$lLocation);
            $query->bindParam('lImage',$lImageName);
            $query->bindParam('cid',$cid);
            $query->execute();
            echo "<script>alert('lawyers added successfully');
        location.assign('viewlawyers.php');
        </script>";
        }
    }

}

//update lawyers
if(isset($_POST['updateLawyers'])){
    $id=$_GET['lid'];
    $lName=$_POST['lName'];
    $lEmail=$_POST['lEmail'];
    $lcontact=$_POST['lCon'];
    $lExp=$_POST['lexp'];
    $lLocation=$_POST['lLocation'];
    $cId=$_POST['cId'];
    $query=$pdo->prepare("update lawspeci set name=:uName,email=:uEmail,contact=:uCon,experience=:uexp,location=:lLocation,c_id=:cId where id=:lid");
    if(isset($_FILES['lImage'])){
        $lImageName=$_FILES['lImage']['name'];
        $lImageTmpName=$_FILES['lImage']['tmp_name'];
        $extension=pathinfo($lImageName,PATHINFO_EXTENSION);
        $destination="../assets/img/".$lImageName;
        if($extension == "jpg"|| $extension == "png"|| $extension == "jpeg"|| $extension == "webp"|| $extension == "jfif"){
            if(move_uploaded_file($lImageTmpName,$destination)){
                $query=$pdo->prepare("update lawspeci set name=:uName,email=:uEmail,contact=:uCon,experience=:uexp,location=:lLocation,image=:uImage,c_id=:cId where id=:lid");
                $query->bindParam('uImage',$lImageName);  
    
}
}
            $query->bindParam('lid',$id);
            $query->bindParam('uName',$lName);
            $query->bindParam('uEmail',$lEmail);
            $query->bindParam('uCon',$lcontact);
            $query->bindParam('uexp',$lExp);
            $query->bindParam('lLocation',$lLocation);
            $query->bindParam('cId',$cId);
            $query->execute();
            echo "<script>alert('lawwyers update successfully');
        location.assign('viewlawyers.php');
        </script>";
        }
    }

//delete lawyers
if(isset($_GET['ldid'])){
    $ldid=$_GET['ldid'];
    $query=$pdo->prepare("delete from lawspeci where id=:ldid");
    $query->bindParam('ldid',$ldid);
    $query->execute();
    echo "<script>alert('delete lawyer successfully');
    location.assign('viewlawyers.php');
    </script>";

}

// Appointment Work

if(isset($_POST['makeApp'])){
    $aName = $_POST['aName'];
    $aEmail = $_POST['aEmail'];
    $aCat = $_POST['aCat'];
    $aLawyer = $_POST['aLawyer'];
    $aLocation = $_POST['aLocation'];
    $aDateTime = $_POST['aDateTime'];
    $aCont = $_POST['aCont'];
    $aDes = $_POST['aDes'];
    $query = $pdo->prepare("insert into appoint(name, email, category, lawyer, location, cdateTime, contact, des) values(:aName, :aEmail, :aCat, :aLaw, :aLoc, :aDt, :aCont, :aDes)");
    $query->bindParam('aName', $aName);
    $query->bindParam('aEmail', $aEmail);
    $query->bindParam('aCat', $aCat);
    $query->bindParam('aLaw', $aLawyer);
    $query->bindParam('aLoc', $aLocation);
    $query->bindParam('aDt', $aDateTime);
    $query->bindParam('aCont', $aCont);
    $query->bindParam('aDes', $aDes);
    $query->execute();
    echo "<script>alert('Thank You For Appointment');
    location.assign('index.php');
    </script>";
}

if(isset($_POST['pBookApp'])){
    $aName = $_POST['paName'];
    $aEmail = $_POST['paEmail'];
    $aCat = $_POST['paCat'];
    $aLawyer = $_POST['paLawyer'];
    $aLocation = $_POST['paLocation'];
    $aDateTime = $_POST['paDateTime'];
    $apCont = $_POST['paCont'];
    $aDes = $_POST['paDes'];
    $query = $pdo->prepare("insert into appoint(name, email, category, lawyer, location, cdateTime, contact, des) values(:aName, :aEmail, :aCat, :aLaw, :aLoc, :aDt, :aCont, :aDes)");
    $query->bindParam('aName', $aName);
    $query->bindParam('aEmail', $aEmail);
    $query->bindParam('aCat', $aCat);
    $query->bindParam('aLaw', $aLawyer);
    $query->bindParam('aLoc', $aLocation);
    $query->bindParam('aDt', $aDateTime);
    $query->bindParam('aCont', $apCont);
    $query->bindParam('aDes', $aDes);
    $query->execute();
    echo "<script>alert('Thank You For Appointment');
    location.assign('index.php');
    </script>";
}

// search work
if(isset($_POST['input'])){
    $val = $_POST['input'];
    $query = $pdo->prepare("select lawspeci.*,category.specialization as cName,c_id as catId from lawspeci inner join category on lawspeci.c_id=category.id where lawspeci.status = 'active' AND name Like :val OR location like :loc OR category.specialization LIKE :ser
    ");
    $val ="%$val%";
    $query->bindParam('val',$val);
    $query->bindParam('loc',$val);
    $query->bindParam('ser',$val);
    $query->execute();
    $allLawyers =$query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($allLawyers as $law) {
        ?>                               
                                    <div class="col-lg-6">
                                        <div class="destination-img">
                                            <img class="img-fluid rounded w-100" src="adminpanel/assets/img/<?php echo $law['image']?>" alt="">
                                            <div class="destination-overlay p-4">
                                                <h4 class="text-white mb-2 mt-3"><?php echo $law['name']?></h4>
                                                <a href="viewProfile.php?lpid=<?php echo $law['id']?>" class="btn-hover text-white">View Profile<i class="fa fa-arrow-right ms-2"></i></a>
                                            </div>
                                            <div class="search-icon">
                                                <a href="adminpanel/assets/img/<?php echo $law['image']?>" data-lightbox="destination-5"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                            </div>
                                        </div>
                                    </div>
        <?php  
    }
        
  
}

// search work view category adminpanel
if(isset($_POST['cat'])){
    $val = $_POST['cat'];
    $query = $pdo->prepare("select * from category Where specialization LIKE :val");
    $val ="%$val%";
    $query->bindParam('val',$val);
    $query->execute();
    $allCategories =$query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($allCategories as $cat) {
        ?>         

                         <tr>
                                    
                             <td><?php echo $cat['specialization']?></td>
                            <td><img height="50px" src="../assets/img/<?php echo $cat['image']?>" alt=""></td>
                            <td><a href="editCategory.php?cid=<?php echo $cat['id']?>" class="btn btn-info">Edit</a></td>
                            <td><a href="?cdid=<?php echo $cat['id']?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                  <?php  
                   }
                   exit();
  
             }
  // search work view lawyers adminpanel
if(isset($_POST['law'])){
    $val = $_POST['law'];
    $query = $pdo->prepare("select lawspeci.*,category.specialization as cName,c_id as catId from lawspeci inner join category on lawspeci.c_id=category.id where name Like :val OR location like :loc OR category.specialization LIKE :ser
    ");
    $val ="%$val%";
    $query->bindParam('val',$val);
    $query->bindParam('loc',$val);
    $query->bindParam('ser',$val);
    $query->execute();
    $allLawyers =$query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($allLawyers as $law) {
        ?>   
                            <tr>
                                    <td><?php echo $law['name']?></td>
                                    <td><?php echo $law['email']?></td>
                                    <td><?php echo $law['contact']?></td>
                                    <td><?php echo $law['experience']?></td>
                                    <td><?php echo $law['location']?></td>
                                    <td><?php echo $law['cName']?></td>
                                    <td><img height="50px" src="../assets/img/<?php echo $law ['image']?>" alt=""></td>
                                    <?php
                                    if($law['status']=='pending'){
                                    ?>
                                    <td>
                                        <form action="components/email.php" method="post">
                                    <button name="sendEmail" class="btn btn-sm btn-primary"><?php echo $law['status']?></button>
                                    <input type="hidden" name="lawsEmail" value="<?php echo $law['email']?>">
                                    </form>
                                </td>
                                <?php
                                    }
                                    else{
                                        ?>
                                        <td><?php echo $law['status']?></td>
                                        <?php
                                    }
                                    ?>
                                    <td><a href="editLawyers.php?lid=<?php echo $law['id']?>" class="btn btn-info">Edit</a></td>
                                    <td><a href="?ldid=<?php echo $law['id']?>" class="btn btn-danger">Delete</a></td>
                            </tr>
     <?php  
      }
        exit();
  
     }


      // search work view appointments adminpanel
if(isset($_POST['appoints'])){
    $val = $_POST['appoints'];
    $query = $pdo->prepare("select appoint.*, category.specialization as 'catName', lawspeci.name as 'lawName' from appoint 
    inner join category on appoint.category = category.id inner join lawspeci on appoint.lawyer = lawspeci.id where name Like :val OR location like :loc OR category.specialization LIKE :ser");
    $val ="%$val%";
    $query->bindParam('val',$val);
    $query->bindParam('loc',$val);
    $query->bindParam('ser',$val);
    $query->execute();
    $allAppoint=$query->fetchAll(PDO::FETCH_ASSOC);
    foreach($allAppoint as $appoint){
        
    ?>
    <tr>
        <td><?php echo $appoint['name']?></td>
        <td><?php echo $appoint['email']?></td>
        <td><?php echo $appoint['catName']?></td>
        <td><?php echo $appoint['lawName']?></td>
        <td><?php echo $appoint['location']?></td>
        <td><?php echo $appoint['cdateTime']?></td>
        <td><?php echo $appoint['contact']?></td>
        <?php
        if($appoint['status']=='pending'){
        ?>
        <td>
            <form action="components/appEmail.php" method="post">
        <button name="appEmail" class="btn btn-sm btn-primary"><?php echo $appoint['status']?></button>
        <input type="hidden" name="appointEmail" value="<?php echo $appoint['email']?>">
        </form>
    </td>
    <?php
        }
        
        else{
            ?>
            <td><?php echo $appoint['status']?></td>
            <?php
        }
    
        ?>
    </tr>
  
   <?php
    }

}
    ?>