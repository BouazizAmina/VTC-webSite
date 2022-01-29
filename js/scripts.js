window.onload =function(){
    document.getElementById("trans").style.display="none";
    document.getElementById('demande').style.display = 'none';
}

function showTransOui(){
     document.getElementById("trans").style.display="block";
     document.getElementById("wilaya").required = true;
     document.getElementById("oui2").required = true;
}

function showTransNon(){
    document.getElementById('trans').style.display = 'none';
    document.getElementById("wilaya").required = false;
    document.getElementById("oui2").required = false;
}

function showDemOui(){
    document.getElementById('demande').style.display = 'block';
}

function showDemNon(){
    document.getElementById('demande').style.display = 'none';
}


$(document).ready(function(){
    $("#mycarousel").carousel( { interval: 3000 } );
    $("#carouselButton").click(function(){
        if ($("#carouselButton").children("span").hasClass('fa-pause')) {
            $("#mycarousel").carousel('pause');
            $("#carouselButton").children("span").removeClass('fa-pause');
            $("#carouselButton").children("span").addClass('fa-play');
        }
        else if ($("#carouselButton").children("span").hasClass('fa-play')){
            $("#mycarousel").carousel('cycle');
            $("#carouselButton").children("span").removeClass('fa-play');
            $("#carouselButton").children("span").addClass('fa-pause');                    
        }
    });
    $('select').selectpicker();
    $("#login").click(function(){
        $('#loginModal').modal('toggle');
    });  
});

