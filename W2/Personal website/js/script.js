$(window).scroll(function(){
    $(".author").css("right", -$(window).scrollTop() + 30);
});

$(window).scroll(function(){
    $(".authorContent").css("opacity", 1 - $(window).scrollTop()/250);
});

$(window).scroll(function(){
    $(".titleContent1").css("opacity", 1 - $(window).scrollTop()/250);
});

$(window).scroll(function(){
    $(".titleContent2").css("opacity", 1 - $(window).scrollTop()/350);
});


////////////////////exercise table/////////////////////////
