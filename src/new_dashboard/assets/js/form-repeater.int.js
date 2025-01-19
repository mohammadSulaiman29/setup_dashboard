$(document).ready(function () {
    "use strict";
    $(".repeater").repeater({
        show: function () {
            $(this).slideDown()
        },
        hide: function (e) {
            confirm("هل تريد حذف الملف ؟") && $(this).slideUp(e)
        },
        ready: function (e) { }
    }), window.outerRepeater = $(".outer-repeater").repeater({
        show: function () {
            console.log("outer show"), $(this).slideDown()
        },
        hide: function (e) {
            console.log("outer delete"), $(this).slideUp(e)
        },
        repeaters: [{
            selector: ".inner-repeater",
  
            show: function () {
                console.log("inner show"), $(this).slideDown()
            },
            hide: function (e) {
                console.log("inner delete"), $(this).slideUp(e)
            }
        }]
    })
});