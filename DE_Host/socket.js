var app = require('express')();
var bodyParser = require('body-parser');
var server = require('http').Server(app);
var io = require('socket.io')(server);
var fs = require('fs');
var path = require('path');
var tsv = require('csv-write-stream');
var Particle = require('particle-api-js');
const PORT = 3000;
var sensorData = {};
var redis = require('ioredis');
var Redis = new redis();
var mysql = require('mysql');

/*
 Get the mysql stream
 */
var mysqlconnection = mysql.createConnection({
    host     : 'localhost',
    user     : 'homestead',
    password : 'secret',
    database : 'homestead'
});

mysqlconnection.connect();
function emitDatatoFrontEnd(message){
    io.on('connection', function(){
        io.emit('data', msg);
    });
}

io.on('connection', function(msg){
    msg = 'test';
    setInterval(function(){
        io.emit('data', msg);
    }, 1000);
});
/**
 * Set up a cordination
 * unit millimeter
 */
var sensorCordinate = {
    SensorOne: {x:30, y: 140},
    SensorTwo: {x: 60, y: 130},
    SensorThree: {x: 40, y: 100},
    SensorFour: {x: 60, y: 90},
    SensorFive: {x: 50, y: 40}
}

/**
 * Kill the current thread when something goes wrong
 */
var die = function(msg){
    console.log(msg);
    process.exit(1);
}
/**
 * @type {string[]}
 */
Date.prototype.monthNames = [
    "January", "February", "March",
    "April", "May", "June",
    "July", "August", "September",
    "October", "November", "December"
];
Date.prototype.dayIndex = [
  7,1,2,3,4,5,6
];
Date.prototype.getDayIndex = function(){
  return this.dayIndex[this.getDay()];
}
Date.prototype.getMonthName = function(){
    return this.monthNames[this.getMonth()];
}
Date.prototype.getShortMonthName = function(){
    return this.getMonthName().substr(0, 3);
}

/**
 * Check the exsistence of the file if not then create a new one
 */
/** For Writing the recieve json message to tsv file
 * @param fs
 * @param filePath
 * @param data
 * @param writer
 */
function writeSynFile(filepath, data){
    fs.exists(filepath, function(exists){
        if(exists){
            console.log('yes, the file is here');
            var writableStream = fs.createWriteStream(filepath, {'flags': 'a+'});
            var writer = tsv({seperator: '	', sendHeaders: false});
            writer.pipe(writableStream);
            writer.write(data);
            writer.end();
        }else{
            die('the file does not exist at all, please check');
        }
    })
}

function updateRepeatFile(filepath, data){
    /**
     * Here we update data gathered from the same time stop
     */
}

function dateString() {
    var date = new Date();
    var year  = (Number)(date.getFullYear().toString().substr(2,2));
    var month = date.getShortMonthName();
    var day = date.getDate();
    var hour = date.getHours();
    var outputString = year + '-' + month + '-' + day + '-' + hour;
    return outputString;
}

function CoP(data){
    var centerX = Math.round((data.SensorOne * sensorCordinate.SensorOne.x
        + data.SensorTwo * sensorCordinate.SensorTwo.x
        + data.SensorThree * sensorCordinate.SensorThree.x
        + data.SensorFour * sensorCordinate.SensorFour.x
        + data.SensorFive * sensorCordinate.SensorFive.x) / (data.SensorOne
        + data.SensorTwo + data.SensorThree + data.SensorFour + data.SensorFive));
    var centerY = Math.round((data.SensorOne * sensorCordinate.SensorOne.y
        + data.SensorTwo * sensorCordinate.SensorTwo.y
        + data.SensorThree * sensorCordinate.SensorThree.y
        + data.SensorFour * sensorCordinate.SensorFour.y
        + data.SensorFive * sensorCordinate.SensorFive.y) / (data.SensorOne
        + data.SensorTwo + data.SensorThree + data.SensorFour + data.SensorFive));

    var zone;
    var date = new Date();
    if(centerY >= 0 && centerY <= 60)
        zone = 1;

    if(centerY > 60 && centerY <= 120)
        zone = 2;

    if(centerY > 120)
        zone = 3;
    var result = {
        'day': date.getDayIndex(),
        'hour': date.getHours(),
        'zone': zone
    };
    writeSynFile('public/assets/data/copMap.tsv', result)
}

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
server.listen(PORT, function(){
    console.log('your are on board');
});

var particle = new Particle();
particle.login({username: 'xz14ld@student.ocadu.ca', password: 'Rihanna7'}).then(
    function(data){
        console.log('API call completed on promise resolve: ', data.body.access_token);
    },
    function(err){
        console.log('API call completed on promise fail: ', err);
    }
);

particle.getEventStream({ deviceId: '2b002d000347343138333038', name: 'dataString', auth: '3d405a83ef06902a338842bc0f657e1644ce97ed' })
    .then(function(stream) {
        stream.on('event', function(data) {
            // console.log("Event: " + data.data);
            var stringVal = data.data;
            var tempArray = stringVal.split(" ");
            for(var i = 0; i < tempArray.length; i++){
                tempArray[i] = Number(tempArray[i]);
            }
            var result = {
                'date': dateString(),
                'SensorOne': tempArray[0],
                'SensorTwo': tempArray[1],
                'SensorThree': tempArray[2],
                'SensorFour': tempArray[3],
                'SensorFive': tempArray[4]
            };

            writeSynFile('public/assets/data/sensorData.tsv',result);
            CoP(result);
            writeSynFile('public/assets/data/sensorRear.tsv', {
                date: result.date,
                SensorOne: result.SensorOne,
                SensorTwo: result.SensorTwo
            });
            writeSynFile('public/assets/data/sensorMiddle.tsv', {
                date: result.date,
                SensorThree: result.SensorThree,
                SensorFour: result.SensorFour
            });
            writeSynFile('public/assets/data/sensorHinder.tsv', {
                date: result.date,
                SensorFive: result.SensorFive
            });
        });
});

//setInterval(function(){
//    sensorData = {
//        'date': dateString(),
//        'SensorOne': Math.round(Math.random()*100),
//        'SensorTwo': Math.round(Math.random()*100),
//        'SensorThree': Math.round(Math.random()*100),
//        'SensorFour': Math.round(Math.random()*100),
//        'SensorFive': Math.round(Math.random()*100)
//    }
//    CoP(sensorData);
//    writeSynFile('public/assets/data/sensorData.tsv',sensorData);
//    writeSynFile('public/assets/data/sensorRear.tsv', {
//        date: sensorData.date,
//        SensorOne: sensorData.SensorOne,
//        SensorTwo: sensorData.SensorTwo
//    });
//    writeSynFile('public/assets/data/sensorMiddle.tsv', {
//        date: sensorData.date,
//        SensorThree: sensorData.SensorThree,
//        SensorFour: sensorData.SensorFour
//    });
//    writeSynFile('public/assets/data/sensorHinder.tsv', {
//        date: sensorData.date,
//        SensorFive: sensorData.SensorFive
//    });
//}, 5000);




