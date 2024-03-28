<?php
include('query.php');
include('sidenav.php');
include('navbar.php');


?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <!-- Blank Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  mx-0">
                    <div class="col-md-6">
                    <!-- <input type="text" class="form-control" id="search_value" placeholder="search"> -->
                        <h3 class="mt-5">Lawyers view</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Experience</th>
                                    <th>Location</th>
                                    <th>Service</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>
                            </div>
                            </div>
     <script>
      $(document).ready(function(){

      let $allLawyers = () =>{
                $.ajax({
                url : "components/lawajax.php",
                type : "get",
                success :function(abc){
                   $("tbody").html(abc);   
                }
            }) 
            }
            $allLawyers();
     $("#search").keyup(function(){
       let input = $(this).val();
         //alert(input);
        if(input!="" ){
            $.ajax({
            url : "query.php",
            type : "post",
            data : {law:input},
            success :function(data){
               $("tbody").html(data);   
            }
        })
    }
    else{
        $allLawyers();
    }
     });

   });
 
</script>

