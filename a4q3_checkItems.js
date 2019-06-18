function check(){
    var dom = document.getElementById("hotel");
    var rooms = dom.numOfRooms.value;
    var warning = "";
    //check room
    if(rooms == 0){
        alert("Please select the number of rooms");
        return false;
    }

    //check smoker
    var smoke = document.getElementsByName("ifSmoking");
    if(!smoke[0].checked && !smoke[1].checked){
        alert("Please select if you are a smoker");
        return false;
    }
    //check beds
    var beds = document.getElementsByClassName("beds");
    var bedsflag = false;
    for (let i = 0; i < beds.length; i++){
        if(beds[i].checked){
            bedsflag = true;
            break;
        }
    }
    if (!bedsflag){
        alert("Please at least select the number of single/double beds");
        return false;
    }


    //check location
    var loc = document.getElementsByClassName("loc");
    var locflag = false;
    for (let i = 0 ; i < loc.length; i++){
        if(loc[i].checked){
            locflag = true;
            break;
        }
    }
    if (!locflag){
        alert("Please at least choose one preferable location");
        return false;
    }

    //check price
    var price = dom.price;
    var priceflag = false;
    for(let i = 0 ; i < price.length; i++){
        if(price[i].selected){
            priceflag = true;
            break;
        }
    }
    if(!priceflag){
        alert("Please choose price range");
        return false;
    }

    //check parking
    var parking = dom.numOfParking;
    var parkingflag = false;
    for (let i = 0 ; i < parking.length; i++){
        if(parking[i].checked){
            parkingflag = true;
            break;
        }
    }
    if(!parkingflag){
        alert("Please choose the number of parking");
        return false;
    }

    //check facilities
    var fac = document.getElementsByClassName("fac");
    var facflag = false;
    for (let i = 0 ; i < fac.length; i++){
        if(fac[i].checked){
            facflag = true;
            break;
        }
    }
    if(!facflag){
        alert("Please choose special facilities");
        return false;
    }
}