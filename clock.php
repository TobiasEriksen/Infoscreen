<?php
/*
 * Javascript clock.
 * A digital styled clock with date and weeknumber.
 */
?>
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        h = checkTime(h);
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
        var t = setTimeout(function () {
            startTime()
        }, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        } // add zero in front of numbers < 10
        return i;
    }

    function startDate() {
        var thisday = new Date();
        var d = thisday.getDate();
        var mo = thisday.getMonth() + 1;
        var months = ["January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var y = thisday.getFullYear();
        d = checkTime(d);
        mo = checkTime(mo);
        y = checkTime(y);
        document.getElementById('date').innerHTML = d + ". " + months[mo] + " " + y;
        var t2 = setTimeout(function () {
            startTime()
        }, 500);
    }

    function checkDate(j) {
        if (j < 10) {
            j = "0" + j;
        } // add zero in front of numbers < 10
        return j;
    }

    function startDay() {
        var da = new Date();
        var days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        document.getElementById("day").innerHTML = days[da.getDay()];
    }
</script>
<b id="clock"></b>
<span class="clocktext">&nbsp;-&nbsp;</span>
<b id="day"></b><br>
<b id="date"></b>