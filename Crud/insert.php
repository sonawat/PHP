<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .con{
            padding:30px;
            padding-left:100px;
        }
        .con input{
            font-size :20px;
            padding:5px;
            margin-left:6px;
            margin-top:10px;
        }
        img
       {
            width:50px;
            height:50px;
            border : 2px solid black;
            border-radius : 10px;
        }
    </style>
</head>
<body>
    <div class="con">
    <form method ="POST" enctype="multipart/form-data">
    <input type="text" placeholder="Enter Youy Name" name="n"/>
    <input type="text" placeholder="Enter Youy Email" name="e"/>
    <input type="text" placeholder="Enter Youy Class" name="c"/> 
    <input type="number" placeholder="Enter Youy Age" name="a"/> 
    <input type="file" placeholder="Enter Youy Image" name="i" accept="image/*"/> 
    <input type="submit" name="sub" value="Submit" />
    </form>
    </div>

<?php
$con = new mysqli("localhost","root","","db");

if(isset($_REQUEST['sub']))
{
$a = $_REQUEST['n'];
$b = $_REQUEST['e'];
$c = $_REQUEST['a'];
$d = $_REQUEST['c'];
$e = $_FILES['i']["tmp_name"];
$f = "folder/".$_FILES['i']["name"];
move_uploaded_file($e,$f);


$g = "insert into tab(nam,email,img,age,class)values('$a','$b','$f',$c,'$d')";
$h = mysqli_query($con,$g);
}

$i = "select * from tab";
$j = mysqli_query($con,$i);

?>
    <br><br><br>
    <table width="60%" cellpadding="10px" border="1px" cellspacing="0px" align="center">
        <tr style="background-color:red;color:white;font-size:25px">
            <th>Id</th>
            <th>Name</th>
            <th>Img</th>
            <th>Class</th>
            <th>Age</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    <?php 
        while($k = mysqli_fetch_assoc($j))
        {
    ?>
        <tr>
            <th><?php echo $k['id'] ?></th>
            <th><?php echo $k['nam'] ?></th>
            <th><img src="<?php echo $k['img'] ?>" /></th>
            <th><?php echo $k['email'] ?></th>
            <th><?php echo $k['class'] ?></th>
            <th><?php echo $k['age'] ?></th>
            <th>
            <form action="delete2.php" method="POST">
            <input type="hidden" value="<?php echo $k['id'] ?>" name="id"/>
            <input type="submit" name="sub" value =" Delete" />
            </form>
            </th>

            <th>
            <form action="update2.php" method="POST">
            <input type="hidden" value="<?php echo $k['id'] ?>" name="id"/>
            <input type="submit" name="sub" value =" Update" />
            </form>
            </th>


        </tr>

        <?php } ?>
    </table>

</body>
</html>
