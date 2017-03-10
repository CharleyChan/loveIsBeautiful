/**
 * Created by charley on 17/3/10.
 */

$(document).ready(function () {

    var changeTextColor = function () {
        var colorVal = ['yellowgreen','wheat','violet','pink','thistle','tomato','springgreen','seashell','aqua','yellow'];
        var i = Math.random()*10;
        i = i.toString();
        i = i.split('.')[0];
        $('#myh1').css('color',colorVal[parseInt(i)]);
        if (parseInt(i)!=0) {
            $('#myh1').css('font-size',parseInt(i)*20+'px');
        }

    };

    // var myInterval = setInterval(changeTextColor,1000);
    var stop = true;
    var myInterval;
    $('body').on('click',function () {
       if (stop){

           myInterval = setInterval(changeTextColor,1000);
           stop = false;
       }else {
           clearInterval(myInterval) ;
           stop = true;
       }
    });
});