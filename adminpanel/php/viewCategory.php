<?php
include('query.php');
include('sidenav.php');
include('navbar.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

 <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4 ">
                <div class="row vh-100 bg-light rounded  mx-0">
                    <div class="col-md-10">
                    <!-- <input type="text" class="form-control" id="search" placeholder="search"> -->
                        <h3 class="mt-5">Category view</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
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
        let allCategories = () =>{
                $.ajax({
                url : "components/catajax.php",
                type : "get",
                success :function(abc){
                   $("tbody").html(abc);   
                }
            }) 
            }
            allCategories();
     $("#search").keyup(function(){
       let input = $(this).val();
         //alert(input);
        if(input!="" ){
            $.ajax({
            url : "query.php",
            type : "post",
            data : {cat:input},
            success :function(data){
               $("tbody").html(data);   
            }
        })
    }
    else{
        allCategories();
    }


   });
 });
</script>
