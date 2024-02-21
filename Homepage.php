<?php
    /*if(!isset($_SESSION["wid"]))
    {
        header('location:ClientLogin.php');
    }*/
    include_once './include/header.php';
    $con = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($con,"testproject");
    //$query = "SELECT * FROM worker";
?>

<html>
<head>
    <title> E-Home's Services </title>
    <style>
        .btn {
             box-shadow: none;
             width: 100%;
             height: 40px;
             background-color: #138808;
             color: #fff;
             border-radius: 0px;
             box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
             letter-spacing: 1.3px
            }

         .btn:hover {
             background-color: #8cc7512;
         }
    
    </style>
    <link rel = "stylesheet">
</head>
<body background='./IMAGE/mcleran p1 02.jpg'>

<form method="get">
<div class="container" style="margin-top:20px; margin-bottom: 60px;">


    <div class="row">
        <div class="form-group col-5">
            <label for="">City</label>
            <select class="form-field  " style=" width:100%;height: 50px;" name="city" id="city">
                <option value="none">Select City --</option>
                <option value="Ambawadi">Ambawadi </option>
                <option value="Anandnagar">Anandnagar</option>
                <option value="AshramRoad">Ashram Road</option>
                <option value="Ambli">Ambli</option>
                <option value="Bodakdev">Bodakdev</option>
                <option value="Bapunagar">Bapunagar</option>
                <option value="Bopal">Bopal</option>
                <option value="CGRoad">C G Road</option>
                <option value="Chandlodia">Chandlodia</option>
                <option value="DaniLimbada">Dani Limbada</option>
                <option value="Ghatlodia">Ghatlodia</option>
                <option value="GulbaiTekra">Gulbai Tekra</option>
                <option value="Gurukul">Gurukul</option>
                <option value="Hathijan">Hathijan</option>
                <option value="Isanpur">Isanpur</option>
                <option value="Jivrajpark">Jivrajpark</option>
                <option value="Jodhpur">Jodhpur</option>
                <option value="JunaWadaj">Juna Wadaj</option>
                <option value="Mirzapur">Mirzapur</option>
                <option value="Nehrunagar">Nehrunagar</option>
                <option value="Kotarpur">Kotarpur</option>
                <option value="Shilaj">Shilaj</option>
                <option value="Sola">Sola</option>
                <option value="Thaltej">Thaltej</option>
                <option value="Usmanpura">Usmanpura</option>
                <option value="Vastral">Vastral</option>
                <option value="Vejalpur">Vejalpur</option>
            </select>
        </div>

        <div class="form-group col-5">
            <label for="">Who's Required</label>
            <select class="form-field  " style=" width:100%;height: 50px;" name="profession" id="profession">
                <option value="none">Select Profession</option>
                <option value="electrician">Electrician</option>
                <option value="plumber">Plumber</option>
                <option value="Carpainter">Carpainter</option>
            </select>
        </div>

        <div class="form-group col-2">
            <label for="">Action</label>
            <!-- <button id="btnSearch" class="form-control btn btn-success" name = 'btnSearch' type="button">Search</button> -->
         <a href="Homepage.php"> <button class="btn" name="btnSearch">Search</button></a>
        </div>
    </div>

    <div class="table-responsive">
        <br>
    <?php

        if(isset($_GET['btnSearch']))
        {
            $City = $_GET["city"];
            $profession = $_GET["profession"];
            $query = "select * from worker where worker.City = '". $City ."' and worker.profession = '". $profession ."' ";
            
        
    
            $result = mysqli_query($con,$query);
            $row_count = mysqli_num_rows($result);
            
            if($result)
            {
                
                 if ($row_count == 0)
                    {
                        
                        echo "No record found!";
                    
                    }   
                else {

                    echo "<table border='2' align='center' cellspacing='9' cellpadding='10' width='100%' margin-top= '40px'>";
            echo "<tr>
                    <th> Name </th>
                    <th> Area </th>
                    <th> profession </th>
                    <th> charges </th>
                    <th> Action </th>
                </tr>";
                               
                while($row = mysqli_fetch_array($result))
                {
                    
                       
                   
                        echo "<tr>
                        <td> " . $row[2] . " </td>
                        <td> " . $row[10] . " </td>
                        <td> " . $row[11] . " </td>
                        <td> " . $row[12] . " </td>
                        <td><a href='Booking.php?id=".$row[0]."'><button  class='form-control btn btn-success' name='btnBook' type='button' width='50px'>Book</button></a></td>
                        </tr>";     
                   
                }
            }
                
                

                    
            }
            
            /*else 
            {   

                echo "No record found!";
            }*/
                
        }        
            ?>
    </div>

</div>
</form>
</body>
</html>

<?php
    include_once './include/footer.php';
?>