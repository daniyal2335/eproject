<?php 
include('query.php');
include('sidenav.php');
if(isset($_GET['cid'])){
  $id=$_GET['cid'];
  $query=$pdo->prepare("select * from category where id=:cid");
  $query->bindParam('cid',$id);
  $query->execute();
  $cat=$query->fetch(PDO::FETCH_ASSOC);
  }
?>
    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <h3>This is edit category Page</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Specialization</label>
                              <input type="text" name="cSpeci" id="" value="<?php echo $cat['specialization']?>" class="form-control" placeholder="" aria-describedby="helpId">
                         
                            </div>
                            
                            <div class="form-group">
                              <label for="">image</label>
                              <input type="file" name="cImage" id="" value="<?php echo $cat['image']?>" class="form-control" placeholder="" aria-describedby="helpId">
                         
                            </div>
                            
                         
                            <button type="submit" name="updateCategory" class="btn btn-danger">update Category</button>
                        </form>
                        </div>
                </div>
            </div>
