<?php
include('components/header.php');
?>              
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <!-- popular lawyer Start -->
 <div class="container-fluid destination py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Lawyers</h5>
                    <h1 class="mb-0">Popular Lawyers</h1>
                </div>
                <div class="tab-class text-center">
                    <!-- <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                <span class="text-dark" style="width: 150px;">All</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#law<?php echo $cat['id']?>">
                                <span class="text-dark" style="width: 150px;"></span>
                            </a>
                        </li>
                    </ul> -->
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4" id="popularLawyers">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- - popular lawyer End -->

        <!-- Services Start -->
        <div class="container-fluid bg-light service py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Services</h5>
                    <h1 class="mb-0">Our Services</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <?php
                            $query = $pdo->query('select * from category');
                            $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($allCategories as $cat){
                            ?>
                            <div class="col-6">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-2 text-uppercase"><?php echo $cat['specialization']?></h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <img src="adminpanel/assets/img/<?php echo $cat['image']?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-center">
                            <!-- <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="services.php">Service More</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services End -->

        <!-- Appointment Booking Start -->
        <div class="container-fluid booking py-5 mb-5" id="bookApp">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h5 class="section-booking-title pe-3">Appointment</h5>
                        <h1 class="text-white mb-4">Make Appointment</h1>
                        <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur maxime ullam esse fuga blanditiis accusantium pariatur quis sapiente, veniam doloribus praesentium? Repudiandae iste voluptatem fugiat doloribus quasi quo iure officia.
                        </p>
                        <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur maxime ullam esse fuga blanditiis accusantium pariatur quis sapiente, veniam doloribus praesentium? Repudiandae iste voluptatem fugiat doloribus quasi quo iure officia.
                        </p>
                        <a href="#" class="btn btn-light text-primary rounded-pill py-3 px-5 mt-2">Read More</a>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="text-white mb-3">Book A Appointment</h1>
                        <form method="post" id="vall">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <?php
                                        if(isset($_SESSION['userEmail'])){
                                        ?>
                                        <input type="text" value="<?php echo $_SESSION['userName']?>" name="aName" class="form-control bg-white border-0" id="" placeholder="Your Name" Required>
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <input type="text" name="aName" class="form-control bg-white border-0" id="mname" placeholder="Your Name" Required>
                                        <?php
                                        }
                                        ?>
                                        <label for="mname">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <?php
                                        if(isset($_SESSION['userEmail'])){
                                        ?>
                                        <input type="email" value="<?php echo $_SESSION['userEmail']?>" name="aEmail" class="form-control bg-white border-0" id="" placeholder="Your Email" Required>
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <input type="email" name="aEmail" class="form-control bg-white border-0" id="memail" placeholder="Your Email" Required>
                                        <?php
                                        }
                                        ?>
                                        <label for="memail">Your Email</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="datetime-local" name="aDateTime" class="form-control bg-white border-0" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" Required/>
                                        <label for="datetime">Date & Time</label>
                                    </div>
                                </div>
                                
                                <div class="form-floating col-md-6" id="City">
                            <select class="form-select userCity" name="aLocation" Required>
                                <option>Select City</option>
                                <option class="karachi" value="karachi">Karachi</option>
                                <option class="lahore" value="lahore">Lahore</option>
                                <option class="islamabad" value="islamabad">Islamabad</option>
                            </select>
                            <label for="City">Select City</label>
                            </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select bg-white border-0 userLaws" id="select1" name="aCat" Required>
                                        <option>Select Category</option>
                                            <?php
                                            $query = $pdo->prepare("select * from category");
                                            $query->execute();
                                            $laws = $query->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($laws as $law){
                                            ?>
                                            <option value="<?php echo $law['id'] ?>"><?php echo $law['specialization'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="select1">Laws</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                    <select class="form-select bg-white border-0 userLawyers" id="SelectPerson" name="aLawyer" Required>
                                        <option value="">First Select Category and City</option>                                           
                                        </select>
                                        <label for="SelectPerson">Lawyers</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <?php
                                        if(isset($_SESSION['userEmail'])){
                                        ?>
                                        <input type="tel" value="<?php echo $_SESSION['userCont']?>" pattern="03[0-9]{9}" name="aCont" class="form-control bg-white border-0" id="cont" placeholder="Your Number" Required>
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <input type="tel" name="aCont" class="form-control bg-white border-0" id="cont" pattern="03[0-9]{9}" placeholder="Your Number" required>
                                        <?php
                                        }
                                        ?>
                                        <label for="cont">Your Number <small>Format: 03123456789</small></label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-white border-0" placeholder="Special Request" id="message" name="aDes" style="height: 100px"></textarea>
                                        <label for="message">Discussion</label>
                                    </div>
                                </div>
                                <div class="col-12" id="bookAppp">
                                    <button class="btn btn-primary text-white w-100 py-3" type="submit" name="makeApp">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Appoinment Booking End -->

        <!-- Testimonial Start -->
        <!-- <div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Testimonial</h5>
                    <h1 class="mb-0">Our Clients Say!!!</h1>
                </div>
                <div class="testimonial-carousel owl-carousel">
                    <div class="testimonial-item text-center rounded pb-4">
                        <div class="testimonial-comment bg-light rounded p-4">
                            <p class="text-center mb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis nostrum cupiditate, eligendi repellendus saepe illum earum architecto dicta quisquam quasi porro officiis. Vero reiciendis,
                            </p>
                        </div>
                        <div class="testimonial-img p-1">
                            <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle" alt="Image">
                        </div>
                        <div style="margin-top: -35px;">
                            <h5 class="mb-0">John Abraham</h5>
                            <p class="mb-0">New York, USA</p>
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item text-center rounded pb-4">
                        <div class="testimonial-comment bg-light rounded p-4">
                            <p class="text-center mb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis nostrum cupiditate, eligendi repellendus saepe illum earum architecto dicta quisquam quasi porro officiis. Vero reiciendis,
                            </p>
                        </div>
                        <div class="testimonial-img p-1">
                            <img src="img/testimonial-2.jpg" class="img-fluid rounded-circle" alt="Image">
                        </div>
                        <div style="margin-top: -35px;">
                            <h5 class="mb-0">John Abraham</h5>
                            <p class="mb-0">New York, USA</p>
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item text-center rounded pb-4">
                        <div class="testimonial-comment bg-light rounded p-4">
                            <p class="text-center mb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis nostrum cupiditate, eligendi repellendus saepe illum earum architecto dicta quisquam quasi porro officiis. Vero reiciendis,
                            </p>
                        </div>
                        <div class="testimonial-img p-1">
                            <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle" alt="Image">
                        </div>
                        <div style="margin-top: -35px;">
                            <h5 class="mb-0">John Abraham</h5>
                            <p class="mb-0">New York, USA</p>
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item text-center rounded pb-4">
                        <div class="testimonial-comment bg-light rounded p-4">
                            <p class="text-center mb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis nostrum cupiditate, eligendi repellendus saepe illum earum architecto dicta quisquam quasi porro officiis. Vero reiciendis,
                            </p>
                        </div>
                        <div class="testimonial-img p-1">
                            <img src="img/testimonial-4.jpg" class="img-fluid rounded-circle" alt="Image">
                        </div>
                        <div style="margin-top: -35px;">
                            <h5 class="mb-0">John Abraham</h5>
                            <p class="mb-0">New York, USA</p>
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Testimonial End -->
        <script>
        $(document).ready(function(){

            let allUsers = () =>{
                $.ajax({
                url : "components/selectUsers.php",
                type : "get",
                success :function(abc){
                   $("#popularLawyers").html(abc);   
                }
            }) 
            }
            allUsers();

        $("#search").keyup(function(){
            let input = $(this).val();
            // alert(input);
     if(input!="" ){
            $.ajax({
                url : "adminpanel/php/query.php",
                type : "post",
                data : {input:input},
                success :function(data){
                   $("#popularLawyers").html(data);   
                }
            })
        }
        else{
            allUsers();

        }


        });


        // dependent dropdown Category And City
        $(document).on('change','.userLaws, .userCity',function(){
        var cat_val = $('.userLaws').val();
        var cat_val1 = $('.userCity').val();
        if(cat_val && cat_val1){
           $.ajax({
                   type:"POST",
                   url:'components/ajax.php',
                   data:{
                       'cat_val' : cat_val,
                       'cat_val1' : cat_val1
                   },
                   success:function(res)
                    {
                        $(".userLawyers").html(res);
                    }
                });
                }
        });
    });

        </script>
        <?php
        include('components/footer.php');
        ?>