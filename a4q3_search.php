<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>search result</title>
    <meta charset="UTF-8">
</head>
<body>
<?php include("a4q3_header.php"); ?>
<?php
$rooms = $_POST['numOfRooms'];
$smoke = $_POST['ifSmoking'];
$beds = $_POST['beds'];
$preLoc = $_POST['preLoc'];
$price = $_POST['price'];
$parking = $_POST['numOfParking'];
$fac = $_POST['specFac'];
$fileName = "a4q3_hotelInfo.txt";



    function validateRooms($hotelRooms, $rooms){
        if ($rooms <= $hotelRooms)
            return 1;
        else
            return 0;
    }
    function validateSmoke($hotelSmk, $smoke){
        if ($smoke == $hotelSmk)
            return 1;
        else
            return 0;
    }
    function validateBeds($hotelBeds, $beds){
        if (in_array($hotelBeds, $beds))
            return 1;
        else
            return 0;
    }
    function validateLoc($hotelLoc, $preLoc){
        if (in_array($hotelLoc, $preLoc) or in_array("noCare",$preLoc))
            return 1;
        else
            return 0;
    }
    function validatePrice($hotelPrice, $price){
        $hotelPrice = (double)$hotelPrice;
        if($price == "<50" and $hotelPrice <= 50)
            return 1;
        elseif($price == "50-100" and $hotelPrice >50 and $hotelPrice <= 100)
            return 1;
        elseif ($price == "101-150" and $hotelPrice >100 and $hotelPrice <= 150)
            return 1;
        elseif($price == "151-200" and $hotelPrice > 150 and $hotelPrice <=200)
            return 1;
        elseif($price == ">200" and $hotelPrice > 200)
            return 1;
        elseif ($price == "nolimit")
            return 1;
        else
            return 0;
    }

    function validateParking($hotelParking, $parking){
        $hotelParking = (int)$hotelParking;
        if ($hotelParking >= $parking)
            return 1;
        else
            return 0;
    }

    function validateFac($hotelFac, $fac){
        if ($fac == array_intersect($hotelFac,$fac))
            return 1;
        else
            return 0;
    }

    $countMatch = 0;
    $hotelArray=array();
    $hotelBriefs = array();
    $hotel = array();
    if(file_exists($fileName) and is_readable($fileName) and is_file($fileName)){
        $readHotel = fopen("$fileName","r") or die("enable to open the file");
        while(!feof($readHotel)){
            //read text as line and convert it to array
            $hotel = explode("*", fgets($readHotel));
            //get hotel name as a string
            $hotelName = substr($hotel[0], (strpos($hotel[0],":")+1));
            //get the number of rooms as a string
            $hotelRooms = substr($hotel[1], (strpos($hotel[1],":")+1));
            //get the smoking permission as a string
            $hotelSmk = substr($hotel[2], (strpos($hotel[2],":")+1));
            //get the bed type as a string
            $hotelBeds = substr($hotel[3], (strpos($hotel[3],":")+1));
            //get the hotel location as a string
            $hotelLoc = substr($hotel[4], (strpos($hotel[4],":")+1));
            //get the hotel price
            $hotelPrice = substr($hotel[5], (strpos($hotel[5],":")+1));
            //get the number of the hotel parking
            $hotelParking = substr($hotel[6], (strpos($hotel[6],":")+1));
            //get the special facilities of the hotel and then convert them to an array
            $hotelFac = substr($hotel[7], (strpos($hotel[7],":")+1));
            $hotelFac = explode(",", $hotelFac);
            //get the hotel address
            $hotelAddress = substr($hotel[8], (strpos($hotel[8],":")+1));
            if (validateRooms($hotelRooms, $rooms) and validateSmoke($hotelSmk, $smoke) and validateBeds($hotelBeds,$beds)
                and validateLoc($hotelLoc, $preLoc) and validatePrice($hotelPrice,$price) and validateParking($hotelParking,$parking)
                and validateFac($hotelFac, $fac)){
                if ($hotelLoc == "dt")
                    $hotelLoc = "Downtown";
                if ($hotelLoc == "east")
                    $hotelLoc = "Montreal East";
                if ($hotelLoc == "west")
                    $hotelLoc = "Montreal West";
                if ($hotelLoc == "air")
                    $hotelLoc = "Near to the airport";
                if ($hotelLoc == "old")
                    $hotelLoc = "Old port";

                $hotelDetail = "<Strong>Hotel Name:</Strong> " . $hotelName .", <Strong>Location:</Strong> ". $hotelLoc .", <Strong>address:</Strong> " . $hotelAddress . ", <Strong>Price:</Strong> CAD" . $hotelPrice;
                $hotelbrief =  "<Strong>Hotel Name: </Strong>*****<strong>address: </strong>*****<Strong>Location:</Strong> ". $hotelLoc;
                $countMatch++;
                array_push($hotelArray,$hotelDetail);
                array_push($hotelBriefs,$hotelbrief);
            }
        }
        fclose($readHotel);



        if (isset($_SESSION['userName']) and !empty($_SESSION['userName'])) {
            if ($countMatch == 0) {
                echo "<p>Sorry, it seems that there is no matching! You could try to modify you search criteria.";
            } else {
                echo "<p>Congratulations! There is(are) " . $countMatch . " hotel(s) match(es) your criteria. The information is blow:<br/>";
                foreach ($hotelArray as $hotelInformation) {
                    echo "<ul><li>" . $hotelInformation . "</li></ul>";
                }
            }
        }else{
            echo "<p>There are " .$countMatch. " hotel(s) matching your criteria: </p>";
            foreach ($hotelBriefs as $hotelinfo){
                echo "<ul><li>" . $hotelinfo . "</li></ul>";
            }
            echo "<br/><br/>";
            echo '<a href="a4q3_login_page.php"><button type="button">Login to show the address</button></a>';
            echo "<br/><br/>";
        }


    }else{
        echo "<p>cannot access the file</p>";
    }

?>
<?php include('a4q3_footer.php'); ?>
</body>
</html>
