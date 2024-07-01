/*
Gasha Consulting, PLC
File: Form wizard Js File
*/


$(function () {
    $("#basic-example").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slide"
    });


    $("#vertical-example").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slide",
        stepsOrientation: "vertical"
    });
});
