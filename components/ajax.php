<?php
include('../adminpanel/php/query.php');

if(isset($_POST['cat_val']) && isset($_POST['cat_val1'])){
    $sta = 'active';
    $id = $_POST['cat_val'];
    $id1 = $_POST['cat_val1'];
    
    $query = "SELECT * FROM lawspeci WHERE c_id = :id AND location = :loc AND status = :act";
    $query = $pdo->prepare($query);
    $query->bindParam(':id', $id);
    $query->bindParam(':loc', $id1);
    $query->bindParam(':act', $sta); 
    $query->execute();
    $laws = $query->fetchAll(PDO::FETCH_ASSOC);

    if($laws) {
        foreach($laws as $law) {
?>
            <option value="<?php echo $law['id'] ?>"><?php echo $law['name'] ?></option>
<?php
        }
    } 
    else {
        ?>
        <option><?php echo 'Sorry, lawyers not available at this moment.' ?></option>
        <script>
            document.getElementById('vall').addEventListener('submit', function(event) {
                event.preventDefault();
            });
        </script>
        <?php
    }
} 
else {
    echo "Please provide necessary parameters.";
}
?>
