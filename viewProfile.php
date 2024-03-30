<?php
include('adminpanel/php/query.php');
include('components/subheader.php');
if(isset($_GET['lpid'])){
    $lpId = $_GET['lpid'];
    $query = $pdo->prepare("select lawspeci.*, category.specialization as 'catName', category.id as 'catId' from lawspeci inner join category on lawspeci.c_id = category.id where lawspeci.id = :lpId");
    $query->bindParam('lpId', $lpId);
    $query->execute();
    $plaw = $query->fetch(PDO::FETCH_ASSOC);
}
?>
        <!-- Tour Booking Start -->
        <div class="container-fluid booking py-5 mt-5 mb-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <img src="adminpanel/assets/img/<?php echo $plaw['image']?>" class="img-fluid rounded-top rounded-bottom" width="400" alt="Lawyers">
</div>
                    <div class="col-lg-6">

                        <h3 class="text-white mb-4 mt-4 text-capitalize">Name: <?php echo $plaw['name']?></h3>
                        <h3 class="text-white mb-4 mt-4 text-capitalize">Service: <?php echo $plaw['catName']?></h3>
                        <h3 class="text-white mb-4 mt-4 text-capitalize">Location: <?php echo $plaw['location']?></h3>
                        <h3 class="text-white mb-4 mt-4">Experience: <?php echo $plaw['experience']?> Years</h3>
</div>
                        <div class="col-lg-12">
                        <p class="text-white mb-4">Lawyers typically do the following: Advise and represent clients in criminal or civil proceedings and in other legal matters.
                        </p>
                        <p class="text-white mb-4">Communicate with clients, colleagues, judges, and others involved in a case. Conduct research and analysis of legal issues.
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="text-white mb-3">Book A Appointment</h1>
                        <form method="post">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <?php
                                        if(isset($_SESSION['userEmail'])){
                                        ?>
                                        <input type="text" value="<?php echo $_SESSION['userName']?>" name="paName" class="form-control bg-white border-0" id="" placeholder="Your Name" Required>
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <input type="text" name="paName" class="form-control bg-white border-0" id="pmname" placeholder="Your Name" Required>
                                        <?php
                                        }
                                        ?>
                                        <label for="pmname">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <?php
                                        if(isset($_SESSION['userEmail'])){
                                        ?>
                                        <input type="email" value="<?php echo $_SESSION['userEmail']?>" name="paEmail" class="form-control bg-white border-0" id="" placeholder="Your Email" Required>
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <input type="email" name="paEmail" class="form-control bg-white border-0" id="pmemail" placeholder="Your Email" Required>
                                        <?php
                                        }
                                        ?>
                                        <label for="pmemail">Your Email</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="datetime-local" name="paDateTime" class="form-control bg-white border-0" id="pdatetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" Required/>
                                        <label for="pdatetime">Date & Time</label>
                                    </div>
                                </div>
                                
                                <div class="form-floating col-md-6" id="pCity">
                                    <select class="form-select" name="paLocation" Required>
                                        <option value="<?php echo $plaw['location']?>"><?php echo $plaw['location']?></option>
                                    </select>
                            <label for="pCity">Select City</label>
                            </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select bg-white border-0 userLaws" id="pselect1" name="paCat" Required>
                                        <option value="<?php echo $plaw['catId']?>"><?php echo $plaw['catName']?></option>
                                        </select>
                                        <label for="pselect1">Laws</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                    <select class="form-select bg-white border-0 pUserLawyers" id="pSelectPerson" name="paLawyer" Required>
                                        <option value="<?php echo $plaw['id']?>"><?php echo $plaw['name']?></option>                                           
                                        </select>
                                        <label for="pSelectPerson">Lawyers</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <?php
                                        if(isset($_SESSION['userEmail'])){
                                        ?>
                                        <input type="tel" value="<?php echo $_SESSION['userCont']?>" pattern="03[0-9]{9}" name="paCont" class="form-control bg-white border-0" id="pCont" placeholder="Your Number" Required>
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <input type="tel" name="paCont" class="form-control bg-white border-0" id="pCont" pattern="03[0-9]{9}" placeholder="Your Number" required>
                                        <?php
                                        }
                                        ?>
                                        <label for="pCont">Your Number <small>Format: 03123456789</small></label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-white border-0" placeholder="Special Request" id="pmessage" name="paDes" style="height: 100px"></textarea>
                                        <label for="pmessage">Discussion</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary text-white w-100 py-3" type="submit" name="pBookApp">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tour Booking End -->

        <?php
include('components/footer.php');
?>