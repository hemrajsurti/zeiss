var c = 0;
var level = 0;
var temp = 0;
var pos = null;
var postop = ["15px", "15px", "15px", "15px", "80px", "80px", "80px", "80px", "145px", "145px", "145px", "145px", "210px", "210px", "210px", "210px"];
var posleft = ["5px", "70px", "135px", "200px", "5px", "70px", "135px", "200px", "5px", "70px", "135px", "200px", "5px", "70px", "135px", "200px"];
var hinttop = ["0px", "44px", "135px", "199px", "0px", "62px", "119px", "215px", "0px", "44px", "138px", "198px", "0px", "59px", "118px", "219px"];
var hintleft = ["265px", "265px", "265px", "265px", "385px", "359px", "386px", "356px", "490px", "520px", "495px", "522px", "655px", "629px", "655px", "626px"];
var hintwidth = ["167px", "140px", "169px", "139px", "155px", "208px", "153px", "214px", "218px", "157px", "214px", "152px", "142px", "167px", "141px", "171px"];
var hintheight = ["71px", "118px", "91px", "87px", "91", "84px", "124px", "70px", "73px", "120px", "87px", "87px", "87px", "90px", "127px", "66px"];
var posstorage = new Array(9);
var tparr = ["5", "6", "1", "2", "3","4", "7", "8","9"];
var flag = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0,0,0,0,0];
var gamephase = 0;
var t = 9;
var points=0;
var asd=0;

adminurl="http://avinash.com/zeiss/index.php/";


function getpos(i) {
    pos = Math.floor((Math.random() * 16) + 0);
    if (flag[pos] == 1) {
        getpos(i);
    } else {
        posstorage[i] = pos;
        flag[pos] = 1;
    }
}

function complete(d) {
    if (gamephase == 0) {
        gamephase = 1;
        startInterval();
    }
    changepoints(50);
    console.log(counter);

    flag[d - 1] = 0;
    $(".drag" + d).css("z-index", "0");
    if (c == t) {

        if (counter <= 30) {
            //changepoints(postop.length * 50 * 10);
          points= 9 * 50 * 10 + asd;
        } else if (counter >= 31 && counter <= 60) {
            //changepoints(postop.length * 50 * 5);
            points= 9 * 50 * 5 + asd;
        } else if (counter >= 61 && counter <= 120) {
            //changepoints(postop.length * 50 * 2);
            points= 9 * 50 * 2 +asd;
        }
			else  {
            //changepoints(postop.length * 50 * 2);
            points= 9 * 50 + asd;
        }


        $(".puzzle-body").css("-webkit-animation", "gamebody_inc 3s forwards");
        //$(".dropbox").css("content","url(img/puzzle.png)");
        $(".dropbox").fadeIn("slow");
        $(".dropbox").css("z-index", "2");
        $(".dropbox").addClass("full");
        document.getElementById("clock").innerHTML = "" + counter;
		  document.getElementById("points").innerHTML = "" + points;
        c = 0;
        clearInterval(timer);
        $(".try-again").fadeIn(5000);
        $(".nextlevel").fadeIn(5000);
    }
}

function changepoints(number) {
    $.get(adminurl+"welcome/changepoints",{points:number});
    console.log(number);
    points = parseInt($(".points").text());
    points += number;
    
    $(".points").text(points);
    return points;
};



function hint() {
	$("#ac_img").show();
	asd=-300;
    if (gamephase == 0) {
        gamephase = 1;
        startInterval();
    }
    //counter = counter + 5;




    var points = changepoints(0);
    if (points > 300) {
        $(".hint").css("visibility", "hidden");
        var points = changepoints(-300);


        for (var i = 1; i <= 16; i++) {
            $(".drag" + tparr[i - 1]).css("width", hintwidth[i - 1]);
            $(".drag" + tparr[i - 1]).css("height", hintheight[i - 1]);
            $(".drag" + tparr[i - 1]).animate({
                "top": hinttop[i - 1],
                "left": hintleft[i - 1]
            }, "slow");
        }


        setTimeout(function () {
            $(".hint").css("visibility", "visible");
            for (var i = 1; i <= 9; i++) {
                if (flag[i - 1] == 1) {
                    $(".drag" + i).animate({
                        "top": postop[posstorage[i - 1]],
                        "left": posleft[posstorage[i - 1]]
                    }, "slow");
                    $(".drag" + i).css("width", "55px");
                    $(".drag" + i).css("height", "40px");
                }
            }
        }, 1000);
    }

}
var counter = 0;
var timer = null;

function startInterval() {
    timer = setInterval("clock()", 1000);
}

function clock() {
    counter++;
    document.getElementById("clock").innerHTML = "" + counter;
    if (c == 9) {
        clearInterval(timer);
        counter = 11;
    }
}

function tryagain() {
	 points=0;    
    gamephase = 0;
    c = 0;
    counter = 0;
    clearInterval(timer);
    document.getElementById("clock").innerHTML = "0";
    document.getElementById("points").innerHTML = "0";
    for (var i = 1; i <= 16; i++) {
        flag[i - 1] = 1;

        $(".drag" + i).animate({
            "top": postop[posstorage[i - 1]],
            "left": posleft[posstorage[i - 1]]
        }, "slow");
        $(".drag" + i).css("width", "55px");
        $(".drag" + i).css("height", "40px");
        $(".drag" + i).draggable({
            disabled: false
        });

    }
    $(".puzzle-body").css("-webkit-animation", "gamebody_dec 5s forwards");
    $(".dropbox").css("display", "none");
    $(".dropbox").css("z-index", "0");
    $(".full").attr('class', 'dropbox');
    arrange();
    $(".try-again").fadeOut(100);
    $(".nextlevel").fadeOut(100);
}

function nextlevel() {
    level =level+ 1;
    $.get("index.html",{});
    document.getElementById("level").innerHTML = "" + level;
    gamephase = 0;
    c = 0;
    $(".timercounter").text("0");

   /* arrange();
    for (var i = 1; i <= 9; i++) {
        flag[i - 1] = 1;

        $(".drag" + i).animate({
            "top": postop[posstorage[i - 1]],
            "left": posleft[posstorage[i - 1]]
        }, "slow");
        $(".drag" + i).css("width", "55px");
        $(".drag" + i).css("height", "40px");
        $(".drag" + i).draggable({
            disabled: false
        });

    }
    */
    $(".puzzle-body").css("-webkit-animation", "gamebody_dec 5s forwards");
    $(".dropbox").css("display", "none");
    $(".dropbox").css("z-index", "0");
    $(".full").attr('class', 'dropbox');
    $(".try-again").fadeOut(100);
    $(".nextlevel").fadeOut(100);


}

function arrange() {
    for (var i = 0; i < 16; i++) {
        flag[i] = 0;
    }
    for (var i = 0; i < 16; i++) {

        var piece = ".drag" + (i + 1);
        getpos(i);
        $(piece).css("left", posleft[pos]);
        $(piece).css("top", postop[pos]);
    }

}




$(document).ready(function () {

    level=parseInt($(".level").text());


    $("a.button").hover(function () {
            console.log("Demo");
            $(this).css("-webkit-animation", "");
            $(this).removeClass("wow animated fadeInRightBig");
            $(this).addClass("animated rubberBand");
        },
        function () {
            $(this).removeClass("animated rubberBand");
        });

    $(".forbutton").hover(function () {
            console.log("Demo");
            $(this).css("-webkit-animation", "");
            $(this).removeClass("wow animated fadeInRight");
            $(this).addClass("animated flash");
        },
        function () {
            $(this).removeClass("animated flash");
        });


    $("p").hover(function () {
            console.log("Demo");
            $(this).css("-webkit-animation", "");
            $(this).removeClass("wow animated fadeInRightBig fadeInLeftBig fadeInLeft fadeInRight");
            $(this).addClass("animated pulse");
        },
        function () {
            $(this).removeClass("animated pulse");
        });
    $(".lenses img").hover(function () {
            console.log("Demo");
            $(this).css("-webkit-animation", "");
            $(this).removeClass("wow flipInY animated");
            $(this).addClass("animated tada");
        },
        function () {
            $(this).removeClass("animated tada");
        });
    $(".logo img").hover(function () {
            console.log("Demo");
            $(this).css("-webkit-animation", "");
            $(this).removeClass("wow fadeInRight animated");
            $(this).addClass("animated bounce");
        },
        function () {
            $(this).removeClass("animated bounce");
        });
    $(".drag").hover(function () {
            console.log("Demo");
            $(this).css("-webkit-animation", "");
            $(this).removeClass("wow zoomIn animated");
            $(this).addClass("animated swing");
        },
        function () {
            $(this).removeClass("animated swing");
        });

    new WOW().init();
    arrange();

    $(".drag").draggable({
        revert: "invalid"
    });
    $(".drag5").draggable({
        drag: function () {
            temp = c;
            $(".drag5").css("height", "71px");
            $(".drag5").css("width", "167px");
            $(".drag5").css("z-index", "1");
        },
        stop: function () {
            if (c == temp) {
                $(".drag5").css("height", "40px");
                $(".drag5").css("width", "55px");
            }
        }
    });
    $(".drag6").draggable({
        drag: function () {
            temp = c;
            $(".drag6").css("height", "118px");
            $(".drag6").css("width", "140px");
            $(".drag6").css("z-index", "1");
        },
        stop: function () {
            if (c == temp) {
                $(".drag6").css("height", "40px");
                $(".drag6").css("width", "55px");
            }
        }
    });
    $(".drag1").draggable({
        drag: function () {
            temp = c;
            $(".drag1").css("height", "91px");
            $(".drag1").css("width", "169px");
            $(".drag1").css("z-index", "1");
        },
        stop: function () {
            if (c == temp) {
                $(".drag1").css("height", "40px");
                $(".drag1").css("width", "55px");
            }
        }
    });
    $(".drag3").draggable({
        drag: function () {
            temp = c;
            $(".drag3").css("height", "91px");
            $(".drag3").css("width", "153px");
            $(".drag3").css("z-index", "1");
        },
        stop: function () {
            if (c == temp) {
                $(".drag3").css("height", "40px");
                $(".drag3").css("width", "55px");
            }
        }
    });
    $(".drag16").draggable({
        drag: function () {
            temp = c;
            $(".drag16").css("height", "84px");
            $(".drag16").css("width", "208px");
            $(".drag16").css("z-index", "1");
        },
        stop: function () {
            if (c == temp) {
                $(".drag16").css("height", "40px");
                $(".drag16").css("width", "55px");
            }
        }
    });
    $(".drag15").draggable({
        drag: function () {
            temp = c;
            $(".drag15").css("height", "124px");
            $(".drag15").css("width", "153px");
            $(".drag15").css("z-index", "1");
        },
        stop: function () {
            if (c == temp) {
                $(".drag15").css("height", "40px");
                $(".drag15").css("width", "55px");
            }
        }
    });
    $(".drag4").draggable({
        drag: function () {
            temp = c;
            $(".drag4").css("height", "73px");
            $(".drag4").css("width", "218px");
            $(".drag4").css("z-index", "1");
        },
        stop: function () {
            if (c == temp) {
                $(".drag4").css("height", "40px");
                $(".drag4").css("width", "55px");
            }
        }
    });
    $(".drag7").draggable({
        drag: function () {
            temp = c;
            $(".drag7").css("height", "120px");
            $(".drag7").css("width", "157px");
            $(".drag7").css("z-index", "1");
        },
        stop: function () {
            if (c == temp) {
                $(".drag7").css("height", "40px");
                $(".drag7").css("width", "55px");
            }
        }
    });
    $(".drag8").draggable({
        drag: function () {
            temp = c;
            $(".drag8").css("height", "87px");
            $(".drag8").css("width", "214px");
            $(".drag8").css("z-index", "1");
        },
        stop: function () {
            if (c == temp) {
                $(".drag8").css("height", "40px");
                $(".drag8").css("width", "55px");
            }
        }
    });
   

    $(".drop1").droppable({

        accept: ".drag5",

        drop: function (event, ui) {
            $(".drag5").css("height", "71px");
            $(".drag5").css("width", "167px");
            $(".drag5").css("top", "0px");
            $(".drag5").css("left", "265px");
            $(".drag5").draggable({
                disabled: true
            });
            c++;
            complete(5);
        }
    });

    $(".drop2").droppable({

        accept: ".drag6",

        drop: function (event, ui) {
            $(".drag6").css("top", "52px");
            $(".drag6").css("height", "118px");
            $(".drag6").css("width", "132px");
            $(".drag6").css("left", "265px");
            $(".drag6").draggable({
                disabled: true
            });
            c++;
            complete(6);
        }
    });
    $(".drop3").droppable({

        accept: ".drag1",

        drop: function (event, ui) {
            $(".drag1").css("top", "150px");
            $(".drag1").css("height", "89px");
            $(".drag1").css("width", "167px");
            $(".drag1").css("left", "265px");
            $(".drag1").draggable({
                disabled: true
            });
     
          c++;
           
            complete(1);
        }
    });

    $(".drop4").droppable({

        accept: ".drag3",

        drop: function (event, ui) {
            $(".drag3").css("top", "0px");
            $(".drag3").css("height", "71px");
            $(".drag3").css("width", "153px");
            $(".drag3").css("left", "395px");
            $(".drag3").draggable({
                disabled: true
            });
            c++;
            complete(3);
        }
    });
    $(".drop5").droppable({

        accept: ".drag16",

        drop: function (event, ui) {
            $(".drag16").css("top", "52px");
            $(".drag16").css("height", "118px");
            $(".drag16").css("width", "199px");
            $(".drag16").css("left", "360px");
            $(".drag16").draggable({
                disabled: true
            });
            c++;
            complete(16);
        }
    });
    $(".drop6").droppable({

        accept: ".drag15",

        drop: function (event, ui) {
            $(".drag15").css("top", "150px");
            $(".drag15").css("height", "88px");
            $(".drag15").css("width", "131px");
            $(".drag15").css("left", "394px");
            $(".drag15").draggable({
                disabled: true
            });
            c++;
            complete(15);
        }
    });
    $(".drop7").droppable({

        accept: ".drag4",

        drop: function (event, ui) {
            $(".drag4").css("left", "483px");
            $(".drag4").css("top", "0px");
            $(".drag4").css("height", "71px");
            $(".drag4").css("width", "193px");
            $(".drag4").draggable({
                disabled: true
            });
            c++;
            complete(4);
        }
    });
    $(".drop8").droppable({

        accept: ".drag7",
        drop: function (event, ui) {
            $(".drag7").css("top", "51px");
            $(".drag7").css("height", "120px");
            $(".drag7").css("width", "150px");
            $(".drag7").css("left", "525px");
            $(".drag7").draggable({
                disabled: true
            });
            c++;

            complete(7);
        }
    });
    $(".drop9").droppable({

        accept: ".drag8",
        drop: function (event, ui) {
            $(".drag8").css("top", "150px");
            $(".drag8").css("height", "87px");
            $(".drag8").css("width", "190px");
            $(".drag8").css("left", "484px");
            $(".drag8").draggable({
                disabled: true
            });
            c++;
            complete(9);
        }
    });
});