/**
 * Created by GaryZren on 2016-02-14.
 */
$(document).ready(function(){

    document.getElementById("postTestBtn").onclick = function () {
            console.log("yes");
            $.ajax({
                type: "POST",
                url: "sensorData",
                dataType: "json",
                data: {
                    "user": "Gary Agos",
                    "sensor_one": 90,
                    "sensor_two": 80,
                    "sensor_three": 60,
                    "sensor_four": 45,
                    "sensor_five": 50
                },
                success: function (data) {
                    console.log('message is already sent');
                },
                failure: function (errMsg) {
                    alert(errMsg);
                }
                ,
            });
    }

});