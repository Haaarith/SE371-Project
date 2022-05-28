<?php
    function insertCategory() {
        global $connection;
        if(isset($_POST['submit'])) {
        //here it means that we submitted.
        $toAdd = $_POST['cat_title'];
        if($toAdd == '' || empty($toAdd)) {
            echo "This field shouldn't be empty!";
        }
        else{
            $query = "INSERT INTO categories (cat_title) VALUES ('$toAdd')";
            $resultAddingCat = mysqli_query($connection, $query);
            header('Location: '.$_SERVER['PHP_SELF']);
            die;
    
        }
        }
    }
    function deleteCategory() {
        global $connection;
        $cat_id_to_delete = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id={$cat_id_to_delete}";
        $result = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
?>