<html>
    <head>
        <style>
            img {
                width: 80px;
                height: 80px;
                border: 2px solid black;
                border-radius: 10px;
            }
            .con {
                padding: 30px;
                padding-left: 100px;
            }
            .con input {
                font-size: 20px;
                padding: 5px;
                margin-left: 6px;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
<?php
$con = new mysqli("localhost", "root", "", "db");
$id = $_REQUEST['id'] ;
    $i = "SELECT * FROM tab WHERE id = $id";
    $j = mysqli_query($con,$i);
    $k = mysqli_fetch_assoc($j);
?>
<div class="con">
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>"/> <!-- Hidden input for id -->
        <input type="text" placeholder="<?php echo $k['nam']; ?>" name="n"/>
        <input type="text" placeholder="<?php echo $k['email']; ?>" name="e"/>
        <input type="text" placeholder="<?php echo $k['class']; ?>" name="c"/> 
        <input type="number" placeholder="<?php echo $k['age']; ?>" name="a"/> 
        <input type="file" name="i" accept="image/*"/> 
        <input type="submit" name="su" value="Submit" />
    </form>
</div>
<?php
if (isset($_POST['su'])) 
{
    $con = new mysqli("localhost","root","","db");
    $a = $_REQUEST['n'];
    $b = $_REQUEST['e'];
    $c = $_REQUEST['a'];
    $d = $_REQUEST['c'];
    
    $filetemp = $_FILES['i']['tmp_name'];
    $filename = "folder/".$_FILES['i']['name'];
    move_uploaded_file($filetemp,$filename);

$e = "update tab set nam='$a',email='$b',img='$filename',age=$c,class='$d' where id=$id";
$f = mysqli_query($con,$e);

if($f)
{
  header("Location:"."delete.php");
}

}
// if (isset($_POST['su'])) {
//     $con = new mysqli("localhost", "root", "", "db");
//     $a = mysqli_real_escape_string($con, $_REQUEST['n']);
//     $b = mysqli_real_escape_string($con, $_REQUEST['e']);
//     $c = (int)$_REQUEST['a'];
//     $d = mysqli_real_escape_string($con, $_REQUEST['c']);
    
//     $filetemp = $_FILES['i']['tmp_name'];
//     $filename = "folder/" . basename($_FILES['i']['name']);
//     move_uploaded_file($filetemp, $filename);

//     $e = "UPDATE tab SET nam='$a', email='$b', img='$filename', age=$c, `class`='$d' WHERE id=$id";
//     $f = mysqli_query($con, $e);

//     if ($f) {
//         header("Location: delete.php");
//     }
// }

?>
</body>
</html>
