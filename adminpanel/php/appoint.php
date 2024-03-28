<?php 
include('query.php');
include('sidenav.php');
include('navbar.php');
if(!isset($_SESSION['adminEmail']) && !isset($_SESSION['lawEmail'])){
    echo "<script>location.assign('../../login.php')</script>";
  }
?>

          
<div class="container-fluid pt-4 px-4 ">
                <div class="row vh-100 bg-light rounded  mx-0">
                    <div class="col-md-10">
                    <!-- <input type="text" class="form-control" id="search" placeholder="search"> -->
                        <h3 class="mt-5">Category view</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Services</th>
                                    <th scope="col">Lawyer</th>
                                    <th scope="col">location</th>
                                    <th scope="col">DateTime</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                if(isset($_SESSION['adminEmail'])){
                                $query=$pdo->prepare("select appoint.*, category.specialization as 'catName', lawspeci.name as 'lawName' from appoint 
                                inner join category on appoint.category = category.id inner join lawspeci on appoint.lawyer = lawspeci.id");
                             $query->execute();
                                // print_r($query);
                                $allAppoint=$query->fetchAll(PDO::FETCH_ASSOC);
                                // print_r($allAppoint);
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
                                }}
                                ?>
                            </tbody>


                            <tbody>
                                <?php 
                                if(isset($_SESSION['lawEmail'])){
                                    // echo $_SESSION['lawId'];
                                $sName = $_SESSION['lawName'];
                                $query=$pdo->prepare("select appoint.*, category.specialization as 'catName', lawspeci.name as 'lawName' from appoint 
                                inner join category on appoint.category = category.id inner join lawspeci on appoint.lawyer = lawspeci.id  where lawspeci.name = :sName");
                                $query->bindParam('sName',$sName);
                             $query->execute();
                                // print_r($query);
                                $allAppoint=$query->fetchAll(PDO::FETCH_ASSOC);
                                // print_r($allAppoint);
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
                                }}
                                ?>
                            </tbody>
                    </table>
                                 </div>
                            </div>
            </div>
      
            <script>
      $(document).ready(function(){

      let $allAppoints = () =>{
                $.ajax({
                url : "components/appointajax.php",
                type : "get",
                success :function(abc){
                   $("tbody").html(abc);   
                }
            }) 
            }
            $allAppoints();
     $("#search").keyup(function(){
       let input = $(this).val();
         //alert(input);
        if(input!="" ){
            $.ajax({
            url : "query.php",
            type : "post",
            data : {appoint:input},
            success :function(data){
               $("tbody").html(data);   
            }
        })
    }
    else{
        $allAppoints();
    }
     });

   });
 
</script>