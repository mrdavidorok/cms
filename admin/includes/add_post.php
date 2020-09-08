<?php 

    ob_start(); 
    require "./../vendor/config.php";

    $error = "";

    if(isset($_POST['create_post'])){
                
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('Y-m-d');
        $post_comment_count = 4;


        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = $database->insert("posts", [
            "post_category_id" => $post_category_id,
            "post_title" => $post_title,
            "post_author" => $post_author,
            "post_date" => $post_date, 
            "post_image" => $post_image,
            "post_content" => $post_content, 
            "post_tags" => $post_tags,
            "post_comment_count" => $post_comment_count,
            "post_status" => $post_status 
        ]);

        if ($query->rowCount()) {
            $error = "insert was successful";
        } else {
            $error = "insert was unsuccessful";
        }
         
        /*$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_comment_count}', '{$post_status}') ";
        $create_post_query = mysqli_query($connection, $query);*/   

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">



        <?php 
      
           echo $error;
        
        ?>
    <form action="" class="form-group" method ="POST" enctype= "multipart/form-data">

        <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
        <label for="post_category">Post Category Id</label>
        <input type="text" class="form-control" name="post_category_id">
        </div>

        <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name ="author">
        </div>

        <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
        </div>

        <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
        </div>

        <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
        </div>

        <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name = "post_content" id="" cols="30" rows ="10" >
        </textarea>
        </div>

        <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
        </div>


    </form>


</div>
    
</body>
</html>