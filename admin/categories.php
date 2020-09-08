<?php include "includes/admin_header.php"  ?>

    <div id="wrapper">

        
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"  ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>

                       

                        <div class="col-xs-6">

                        <!-- Insert Categories in databse -->
                        
                         <?php insert_categories(); ?>
                        
                        <form action="" method="POST">
                        <div class="form-group">
                        <label for="cat-title">Add Category</label>
                        <input class = "form-control" type="text" name = "cat_title">
                        </div>
                        <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value ="Add Category">
                        </form>
                        </div>
                    
                        <hr>

                        <form action="" method="POST">
                        <div class="form-group">
                        <label for="cat-title">Edit Category</label>

                        <?php
                        if (isset($_GET['edit'])){
                            $cat_id =$_GET['edit'];

                            $query = "SELECT*FROM categories WHERE cat_id = $cat_id  ";
                            $select_categories_id = mysqli_query($connection , $query);
    
                            while($row = mysqli_fetch_assoc($select_categories_id)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                                ?>

                            <input value = "<?php if(isset($cat_title)) { echo $cat_title; } ?> " type="text" class="form-control"  name="cat_title">

                            <?php } ?>
                        <?php } ?>
                        

                        
                        </div>
                        <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value ="Update Category">
                        </form>
                        </div>

                        

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                </tr>
                            </thead>

                            <tbody>

                            <!-- Select all categories -->
                            <?php findAllCategories() ?> 
                           

                            <!-- Delete Categories -->
                            <?php deleteCategories(); ?>

                            </tbody>
                        </table>
                        
                        </div>

                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>





        <!-- /#page-wrapper -->
        
        <!-- Footer -->
   <?php include "includes/admin_footer.php" ?>
