$(document).ready(function() {

    $.getJSON("blogs.json", function(data) {
    console.log(data)

    $('.title1').html(data.title1);
    $('.author1').html(data.author1);
    $('.date1').html(data.date1);
    }). fail(function () {
    console.log("Check your code")
    })

    $('.title3').html(data.title1);
    $('.author3').html(data.author1);
    $('.date3').html(data.date1);

    
    $('.title3').html(data.title1);
    $('.author3').html(data.author1);
    $('.date3').html(data.date1);
})
