//var promodiag;


$(document).ready(function () {
    //$("#lstFocusFilm .item:first").addClass("active");
    //$("#mainFilm .img").hover(function () { $(".iconPlayL", this).show() }, function () { $(".iconPlayL", this).hide() })

    $("div id*=[foo]").removeClass("lstFilm").removeClass("h500");
    

    $("#home").addClass("active");
    $("#lstBaner").carouFredSel({
    	items: {
    		visible: 5,
    		width: 196
    	},
    	width: 980,
        auto: {
            pauseDuration: 10000,
            pauseOnHover: true
        },
        prev: {
            button: "#prevbannerdiv"
        },
        next: {
            button: "#nextbannerdiv"
        }
    });
    $("#prevbannerdiv", this).hide();
    $("#nextbannerdiv", this).hide();
    $(".lstBaner").hover(function () {
        $("#prevbannerdiv", this).show();
        $("#nextbannerdiv", this).show();

    }, function () {
        $("#prevbannerdiv", this).hide();
        $("#nextbannerdiv", this).hide();

    });
	
	/*
    $("#lstBaner").each(function () {
        $(".hidden-tip", $(this)).each(function () {
            var fID = $(this).attr("fID");
            $(".img").easyTooltip({
                useElement: "hidden-tip"
            });
        });
    });
	*/
    
});
