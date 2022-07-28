<?php
    require_once 'connect.php';
    $name_err =$year_err=$author_err="";
    if(!empty($_GET["id"])){
        $id=$_GET["id"];
        $sql = "select * from Music where id=".$id;
        if($result=mysqli_query($link,$sql)){
            $row = $result->fetch_assoc();
            $name = $row["name"];
            $author = $row["author"];
            $year = $row["year"];
        }
    }else{
        header("location: error.php");
        exit();
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $post_name =  $_POST["name"];
        $post_author = $_POST["author"];
        $post_year = $_POST["year"];
        $name = $post_name;
        $author = $post_author;
        $year = $post_year;
        //Xử lí lỗi
        $match_name = preg_match("/[\w]+/",$post_name);
        $match_author = preg_match("/[\w]+/",$post_author);
        $match_year = preg_match("/[\d]{4}/",$post_year);
        if(!$match_year){
            $year_err = "Năm không đúng định dạng: YYYY";
        }
        if(!$match_author){
            $author_err = "Không được bỏ trống";
        }
        if(!$match_name){
            $name_err = "Không được bỏ trống";
        }
        //

        if($match_name && $match_author && $match_year){
            $sql = "update Music set name = ?,author = ?, year =? where  id = ?";
            if($stm=mysqli_prepare($link,$sql)){
                mysqli_stmt_bind_param($stm,'ssii',$post_name,$post_author,$post_year,$id);
                if(mysqli_stmt_execute($stm)){
                    header("location: index.php");
                    exit();
                }else{
                    echo "Something went wrong. Please try again later.";
                }
            }
        }

    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <div>
        <h2>Update Record</h2>
        <p>Please edit the ipput values and submit to update the record.</p>
    </div>
    <form action="" method="post">
        <div>
            <label>Name</label>
            <input type="text" name="name" value="<?=$name?>">
            <span style="color: #c72f2f"><?php echo $name_err; ?></span>
        </div>
        <div>
            <label>Author</label>
            <input type="text" name="author" value="<?=$author?>">
            <span style="color: #c72f2f"><?php echo $author_err; ?></span>
        </div>
        <div>
            <label>Year</label>
            <input type="text" name="year" value="<?=$year?>">
            <span style="color: #c72f2f"><?php echo $year_err; ?></span>
        </div>
        <input type="hidden" name="id" value="">
        <input type="submit" value="Submit">
        <a href="index.php">Cancel</a>
    </form>
</div>
</body>
</html>
