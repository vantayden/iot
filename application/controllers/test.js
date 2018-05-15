(function($) {



    $("#target").click(function() {
        $('div#mdl_01_d1').find("div").removeClass('switch-on');
        //el.replaceClass('switch-on','switch-off');
        $('div#mdl_01_d1').find("div").addClass('switch-off');
    });


}(jQuery));



(function($) {
    $("div#mdl_01_d1").find("span").click(function() {
        console.log("oke");
    });
}(jQuery));

(function($) {
    var myEl = document.getElementById('span.mdl_01_d1');
    myEl.addEventListener('click', function() {
        alert('Hello world');
    }, false);

}(jQuery));



(function($) {
    var myEl = document.getElementById('span.mdl_01_d1');
    myEl.addEventListener('click', function() {
        alert('Hello world');
    }, false);

}(jQuery));