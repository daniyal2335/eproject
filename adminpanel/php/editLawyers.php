<?php 
include('query.php');
include('sidenav.php');
if(isset($_GET['lid'])){
  $id=$_GET['lid'];
  $query=$pdo->prepare("select lawspeci .*,category.specialization as cName, category.id as catId from
  lawspeci inner join category on lawspeci.c_id=category.id where lawspeci.id=:lid");
  $query->bindParam('lid',$id);
  $query->execute();
  $law=$query->fetch(PDO::FETCH_ASSOC);
  }
?>
    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <h3>This is edit lawyer Page</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" name="lName" value="<?php echo $law['name']?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                            </div>
                          
                            <div class="form-group">
                              <label for="">Email</label>
                              <input type="tel" name="lEmail" id="" value="<?php echo $law['email']?>"  class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                              <label for="">contact</label>
                              <input type="tel" name="lCon" id="" value="<?php echo $law['contact']?>"  class="form-control" placeholder="" aria-describedby="helpId">
                         
                            </div>
                          
                            <div class="form-group">
                              <label for="">Experience</label>
                              <input type="text" name="lexp" id="" value="<?php echo $law['experience']?>" class="form-control" placeholder="" aria-describedby="helpId">
                         
                            </div>
                            <div class="form-group">
                              <label for="">image</label>
                              <input type="file" name="lImage" id="" value="<?php echo $law['image']?>" class="form-control" placeholder="" aria-describedby="helpId">
                         
                            </div>

                            
                            <div class="form-group">
                              <label for="">Select City</label>
                              <select class="form-control" name="lLocation" value="<?php echo $law['location']?>"  id="">
                                <option>Select City</option>
                                <option value="karachi">Karachi</option>
                                <option value="lahore">Lahore</option>
                                <option value="islamabad">Islamabad</option>
                              </select>
                            </div>
                            <div class="form-group">
                             <label for="">select category</label>
                             <select class="form-control" name="cId" id="">
                               <option value="<?php echo $law['catId']?>"><?php echo $law['cName']?></option>
                               <?php 
                               $query=$pdo->prepare("select * from category where specialization != :catName");
                               $query->bindParam('catName',$law['cName']);
                               $query->execute();
                               $allCategories=$query->fetchAll(PDO::FETCH_ASSOC);
                               foreach ($allCategories as $cat) {
                                ?>
                               <option value="<?php echo $cat['id']?>"><?php echo $cat['specialization']?></option>
                               <?php
                               }
                               ?>
                          
                             </select>
                            
                           </div>
                            
                         
                            <button type="submit" name="updateLawyers" class="btn btn-danger">update Lawyers</button>
                        </form>
                        </div>
                </div>
            </div>
