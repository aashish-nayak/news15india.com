// Script for Adding Date and Time And Day
var day = new Date();
var myDay = day.getDay();
var date = day.getDate();
var month = day.getMonth();
var year = day.getFullYear();
// Array of days.
var weekday = [
    "रविवार",
    "सोमवार",
    "मंगलवार",
    "बुधवार",
    "गुरूवार",
    "शुक्रवार",
    "शनिवार",
];
// Array of Months
var months = [
    "जनवरी",
    "फ़रवरी",
    "मार्च",
    "अप्रैल",
    "मई",
    "जून",
    "जुलाई",
    "अगस्त",
    "सितम्बर",
    "अक्टूबर",
    "नवम्बर",
    "दिसम्बर",
];
document.getElementById("day").innerHTML =
    weekday[myDay] + " " + date + " " + months[month] + " " + year;

function startTime() {
    var today = new Date();
    var h = today.getHours();

    var prepand = h >= 12 ? "PM " : "AM ";
    h = h >= 12 ? h - 12 : h;
    if (h === 0 && prepand === "PM ") {
        if (m === 0 && s === 0) {
            h = 12;
            prepand = "Noon";
        } else {
            h = 12;
            prepand = "PM";
        }
    }
    if (h === 0 && prepand === "AM ") {
        if (m === 0 && s === 0) {
            h = 12;
            prepand = "Midnight";
        } else {
            h = 12;
            prepand = "AM";
        }
    }
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById("datetime").innerHTML =
        h + ":" + m + ":" + s + prepand;
    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    } // add zero in front of numbers < 10
    return i;
}



