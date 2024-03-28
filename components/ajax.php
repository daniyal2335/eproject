<?php
include('../adminpanel/php/query.php');


if(isset($_POST['cat_val']))
$sta = 'active';
$id = $_POST['cat_val'];
$query="SELECT  * from lawspeci WHERE c_id= :id and status = :act";
$query = $pdo->prepare($query);
$query->bindParam('id',$id);
$query->bindParam('act',$sta); 
$query->execute();
$laws = $query->fetchAll(PDO::FETCH_ASSOC);
          foreach($laws as $law){
                                                ?>
    <option value="<?php echo $law['id'] ?>"><?php echo $law['name'] ?></option>
    <?php
    }
    ?>