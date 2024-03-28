<?php
include('query.php');
include('sidenav.php');
?>

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <h3>This is Add category Page</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                           
                          
                            <div class="form-group">
                              <label for="">Specialization</label>
                              <input type="text" name="cSpeci" pattern="[a-zA-Z]{4,}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                            </div>
                           
                            <div class="form-group">
                              <label for="">image</label>
                              <input type="file" name="cImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                            </div>
                         
                            <button type="submit" name="addCategory" class="btn btn-danger">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

