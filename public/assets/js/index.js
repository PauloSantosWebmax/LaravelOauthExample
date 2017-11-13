
"use strict";

$(".links a").click(function () {
    $.LoadingOverlay("show", {
        color: "rgba(255, 255, 255, 0.8)",
        custom: "",
        fade: true,
        fontawesome: "",
        image: "bower_components/gasparesganga-jquery-loading-overlay/src/loading.gif",
        imagePosition: "center center",
        maxSize: "100px",
        minSize: "20px",
        resizeInterval: 50,
        size: "50%",
        zIndex: 9999
    });
});
