<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Infoscreen</title>
        <link href="assets/css.css" rel="stylesheet" type="text/css"/>
        <!-- All javascript goes here! -->
        <script>
            function refreshAt(hours, minutes, seconds) {
                var now = new Date();
                var then = new Date();

                if (now.getHours() > hours ||
                        (now.getHours() === hours && now.getMinutes() > minutes) ||
                        now.getHours() === hours && now.getMinutes() === minutes && now.getSeconds() >= seconds) {
                    then.setDate(now.getDate() + 1);
                }
                then.setHours(hours);
                then.setMinutes(minutes);
                then.setSeconds(seconds);

                var timeout = (then.getTime() - now.getTime());
                setTimeout(function () {
                    window.location.reload(true);
                }, timeout);
            }
            refreshAt(00, 01, 0);
            refreshAt(05, 01, 0);
            refreshAt(05, 30, 0);
            refreshAt(06, 01, 0);
            refreshAt(06, 30, 0);
            refreshAt(07, 01, 0);
            refreshAt(07, 30, 0);
            refreshAt(08, 01, 0);
            refreshAt(12, 01, 0);
            refreshAt(13, 01, 0);
            refreshAt(14, 01, 0);
            refreshAt(15, 01, 0);
            refreshAt(16, 01, 0);
            refreshAt(18, 01, 0);
            refreshAt(21, 01, 0);
        </script>
    </head>
    <body onload="startTime(), startDate(), startDay()">
        <div id="left">
            <div class="box">
                <b>Clock and Date</b><br>
                <?php include './clock.php'; ?>
            </div>
            <hr>
            <div class="box">
                <b>Calendar</b><br>
                <?php include './calendar.php'; ?>
            </div>
        </div>
        <div id="center">
            <div class="box">
                <b>Indkøb i dag</b><br>
                <?php include 'indkoeb.php'; makelist(); ?>
            </div>
        </div>
        <div id="right">
            <div class="box">
                <b>Time to update</b><br>
                <?php include './timeleft.php'; ?>
            </div>
            <hr>
            <div class="box">
                <b>Weather</b><br>
                <?php include './weather.php'; ?>
            </div>
        </div>
    </body>
</html>