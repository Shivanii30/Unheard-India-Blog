$(document).ready(function() {

    $.getJSON("blogs.json", function(data) {
    console.log(data)

    $('.heading1').html(data.heading1);
    $('.p1').html(data.p1);

    $('.wall_h').html(data.wall_h);
    $('.wall_p').html(data.wall_p);
    $('.author1').html(data.author1);
    $('.date1').html(data.date1);

    
    

    $('.puri_h').html(data.puri_h);
    $('.puri_p').html(data.puri_p);
    $('.author2').html(data.author2);
    $('.date2').html(data.date2);


    $('.balaji_h').html(data.balaji_h);
    $('.balaji_p').html(data.balaji_p);
    $('.author5').html(data.author5);
    $('.date5').html(data.date5);


    $('.author6').html(data.author6);
    $('.date6').html(data.date6);
    $('.ujjain_h').html(data.ujjain_h);
    $('.ujjain_p').html(data.ujjain_p);


    $('.ranak_h').html(data.ranak_h);
    $('.ranak_p').html(data.ranak_p);
    $('.author3').html(data.author3);
    $('.date3').html(data.date3);


    $('.ajanta_h').html(data.ajanta_h);
    $('.ajanta_p').html(data.ajanta_p);
    $('.author4').html(data.author4);
    $('.date4').html(data.date4);


    $('.para').html(data.para);
    $('.name').html(data.name);
    $('.description').html(data.description);

    $('.far.fa-heart').click(function() {
      $(this).toggleClass('fas fa-heart');
    });



    }). fail(function () {
    console.log("Check your code")
    })

  // jQuery script for adding hover effect to blog items

    $('.blog-img').mouseenter(function () {  //used for event handling
        $(this).css({
            'transform': 'scale(1.03)',
            'border': '1px solid black',
            'transition': 'transform 0.3s ease-in-out, border 0.3s ease-in-out', 
        });
    }).mouseleave(function () {
        $(this).css({
            'transform': 'scale(1)', 
            'border': '1px solid transparent',  
        });
    });

    $('.read-more-btn').click(function() {
        $('.about').fadeOut('slow');
    });
    function changeHeartColor() {
        var heartIcon = document.getElementById('heartIcon');
        if (heartIcon.classList.contains('heart-red')) {
          heartIcon.classList.remove('heart-red');
          heartIcon.classList.add('heart-blue');
        } else if(heartIcon.classList.contains('heart-blue')){
          heartIcon.classList.remove('heart-blue');
          heartIcon.classList.add('heart-red');
        }
      }
})