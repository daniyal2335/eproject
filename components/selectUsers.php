<?php
include('../adminpanel/php/query.php');


				                    $query=$pdo->query("select lawspeci.*, category.specialization as 'catName' from lawspeci inner join category on lawspeci.c_id = category.id where lawspeci.status = 'active' ");
				                    $allLawyers=$query->fetchAll(PDO::FETCH_ASSOC);
				                    foreach ($allLawyers as $law) {
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="destination-img">
                                            <img class="img-fluid rounded w-100" src="adminpanel/assets/img/<?php echo $law['image']?>" alt="">
                                            <div class="destination-overlay p-4">
                                                <h4 class="text-white mb-2 mt-3"><?php echo $law['name']?></h4>
                                                <a href="viewProfile.php?lpid=<?php echo $law['id']?>" class="btn-hover text-white">View Profile<i class="fa fa-arrow-right ms-2"></i></a>
                                            </div>
                                            <div class="search-icon">
                                                <a href="adminpanel/assets/img/<?php echo $law['image']?>" data-lightbox="destination-5"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>