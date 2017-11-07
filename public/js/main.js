$("a[href='#top']").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
})

$(document).ready(function(){
    $('.dropdown-toggle').dropdown()
});
