<?php
include('../query.php');
                               $query=$pdo->query("select lawspeci.*,category.specialization as cName,c_id as catId from lawspeci inner join category on 
                               lawspeci.c_id=category.id");
                               $allLawyers=$query->fetchAll(PDO::FETCH_ASSOC);
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
                               ?>