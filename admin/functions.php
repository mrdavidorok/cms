<?php 

function confirmQuery($result){

    global $connection;

    if(!$result){

        die("QUERY FAILED".mysqli_error($connection));
    }
}

function insert_categories(){

    GLOBAL $connection;

    if(isset($_POST['submit'])){

        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" or empty($cat_title)){

            echo "<p style= 'color:red'>This field must not be empty</p>";
        } else{

            $query = "INSERT INTO categories(cat_title) VALUES ('$cat_title')";
            $result = mysqli_query($connection, $query); 
        }


        }



}

function findAllCategories(){
    global $connection; 

    $query = "SELECT*FROM categories";
    $select_categories = mysqli_query($connection ,$query);

    while($row = mysqli_fetch_assoc($select_categories)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></button></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></button></td>";
    echo "</tr>";
    }

}

function deleteCategories(){
    global $connection;
    if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
        }


}





?>