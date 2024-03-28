<?php
include('adminpanel/php/query.php');
include('components/subheader.php');
?>
        <!-- About Start -->
        <div class="container-fluid about py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5">
                        <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                            <img src="img/about4.avif" class="img-fluid w-100 h-100" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                        <h5 class="section-about-title pe-3">About Us</h5>
                        <h1 class="mb-4">Welcome to <span class="text-primary">Laws</span></h1>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, dolorum, doloribus sunt dicta, officia voluptatibus libero necessitatibus natus impedit quam ullam assumenda? Id atque iste consectetur. Commodi odit ab saepe!</p>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quos voluptatem suscipit neque enim, doloribus ipsum rem eos distinctio, dignissimos nisi saepe nulla? Libero numquam perferendis provident placeat molestiae quia?</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Travel Guide Start -->
        <div class="container-fluid guide py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Lawyers</h5>
                    <h1 class="mb-0">Meet Our Laywers</h1>
                </div>
                <div class="row g-4">
                    <?php
                    $query = $pdo->prepare("select lawspeci.*, category.id as 'catId', category.specialization as 'catName' from lawspeci inner join category on lawspeci.c_id = category.id");
                    $query->execute();
                    $laww = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($laww as $ablaw){
                    ?>
                    <div class="col-md-6 col-lg-3">
                        <a href="viewProfile.php?lpid=<?php echo $ablaw['id']?>">
                            <div class="guide-item">
                                <div class="guide-img">
                                    <div class="guide-img-efects">
                                        <img src="adminpanel/assets/img/<?php echo $ablaw['image']?>" class="img-fluid w-100 rounded-top" alt="Image">
                                    </div>
                                    <div class="guide-icon rounded-pill p-2">
                                        <a class="btn btn-square btn-primary rounded-circle mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square btn-primary rounded-circle mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square btn-primary rounded-circle mx-1" href="#"><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square btn-primary rounded-circle mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                                <a href="viewProfile.php?lpid=<?php echo $ablaw['id']?>">
                                    <div class="guide-title text-center rounded-bottom p-4">
                                        <div class="guide-title-inner">
                                            <h4 class="mt-3"><?php echo $ablaw['name'] ?></h4>
                                            <p class="mb-0"><?php echo $ablaw['catName'] ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Travel Guide End -->


<?php
include('components/footer.php');
?>