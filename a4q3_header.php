<!DOCTYPE html>
<html lang="en">
    <head>
        <title>header</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="a4q3_style.css">
    </head>
    <body>
        <table>
            <tr>
                <td><a href = a4q3.php>
                        <img alt="cartoonHotel" src="https://c7.alamy.com/comp/HNKPC6/hotel-on-city-landscape-modern-hotel-building-flat-style-vector-illustration-HNKPC6.jpg" width = "150" height="100">
                    </a>
                </td>

                <td>
                    <h1>Hotel Reservation Form</h1>
                </td>
                <td>
                    <div id="time"></div>
                </td>
            </tr>
        </table>
        <script>
            setInterval("timer()",1000);
            function timer(){
                var currentDate = new Date();
                var year = currentDate.getFullYear();
                var month = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"][currentDate.getMonth()];
                var date = currentDate.getDate();
                var week = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"][currentDate.getDay()];
                var hours = currentDate.getHours();
                var minutes = currentDate.getMinutes();
                var seconds = currentDate.getSeconds();
                if(month < 10)
                    month = "0" + month;
                if(date<10)
                    date = "0" + date;
                if(hours<10)
                    hours = "0" + hours;
                if(minutes<10)
                    minutes = "0" + minutes;
                if(seconds<10)
                    seconds = "0" + seconds;
                document.getElementById("time").innerHTML = date + "-" + month + "-" + year + "   " + hours + ":" + minutes + ":" + seconds + "   " + week;
            }
        </script>
    </body>
</html>