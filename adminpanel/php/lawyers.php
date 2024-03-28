<?php 
include('query.php');
include('sidenav.php');
if(!isset($_SESSION['adminEmail'])){
    echo "<script>location.assign('../../login.php')
    </script>";
}
?>

          
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Lawyers Name</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Specialization</th>
                                    <th scope="col">Experience</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $query=$pdo->query("select * from lawyers");
                                $allLawyers=$query->fetchAll(PDO::FETCH_ASSOC);
                                foreach($allLawyers as $Law){
                                    
                                ?>
                                <tr>
                                    <td><?php echo $Law['law_Name']?></td>
                                    <td><?php echo $Law['contact']?></td>
                                    <td><?php echo $Law['specialization']?></td>
                                    <td><?php echo $Law['Experience']?></td>
                                    <td><?php echo $Law['status']?></td>
                                    <?php
                                    if($Law['status']=='pending'){
                                    ?>
                                    <td>
                                        <form action="email.php" method="post">
                                    <button name="sendEmail" class="btn btn-sm btn-primary"><?php echo $Law['status']?></button>
                                    <input type="hidden" name="lawEmail" value="<?php echo $Law['law_email']?>">
                                    </form>
                                </td>
                                <?php
                                    }
                                    
                                    else{
                                        ?>
                                        <td><?php echo $Law['status']?></td>
                                        <?php
                                    }
                                
                                    ?>
                                </tr>
                              
                               <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
          