<?php
include('query.php');
include('sidenav.php');

?>

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <h3>This is Add lawyers Page</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" name="lName" id=""pattern="[a-zA-Z\s]{3,12}" class="form-control" placeholder="" aria-describedby="helpId" required>
                            </div>

                            <div class="form-group">
                              <label for="">Email</label>
                              <input type="tel" name="lEmail" id="" pattern="[a-zA-Z0-9]{3,12}[@][a-z]{3,10}[.][a-z]{3}" class="form-control" placeholder="" aria-describedby="helpId" required>
                            </div>
                  
                            <div class="form-group">
                              <label for="">contact</label>
                              <input type="tel" name="lCon" id="" pattern="[0-9]{11}" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                          
                            <div class="form-group">
                              <label for="">Experience</label>
                              <input type="text" name="lexp" id="" pattern="[0-9\s]{2}[a-zA-Z]{5,8}" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>

                            <div class="form-group">
                              <label for="">Select Category</label>
                              <select class="form-control" name="cId" id="">
                                <option>Select Category</option>
                                <?php
                                $query=$pdo->query("select * from category");
                                $allCategories=$query->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($allCategories as $cat) {
                               
                                ?>
                                <option value="<?php echo $cat['id']?>"><?php echo $cat['specialization']?>
                                <?php
                                }
                                ?>
                                </option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="">Select City</label>
                              <select class="form-control" name="lLocation" id="">
                                <option>Select City</option>
                                <option value="karachi">Karachi</option>
                                <option value="lahore">Lahore</option>
                                <option value="islamabad">Islamabad</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="">image</label>
                              <input type="file" name="lImage" id="" class="form-control" placeholder="" aria-describedby="helpId"> 
                            </div>
                              
                         
                            <button type="submit" name="addLawyers" class="btn btn-danger">Add Lawyers</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

