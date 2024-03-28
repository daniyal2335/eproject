<?php
include('../query.php');
                         $query=$pdo->query("select * from category");
                        $allCategories=$query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($allCategories as $cat) {
 
                    ?>
                      <tr>
     
                        <td><?php echo $cat['specialization']?></td>
                        <td><img height="50px" src="../assets/img/<?php echo $cat ['image']?>" alt=""></td>
                        <td><a href="editCategory.php?cid=<?php echo $cat['id']?>" class="btn btn-info">Edit</a></td>
                        <td><a href="?cdid=<?php echo $cat['id']?>" class="btn btn-danger">Delete</a></td>
                       </tr>
                    <?php
                     }
?>