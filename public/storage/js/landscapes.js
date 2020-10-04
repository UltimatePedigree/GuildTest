/************************************************************
 * PostProcessing
 * 
 * The way we display the tiles from the json response is, 
 * we loop through the arrays that contains the photographers information, 
 * then we loop though the photos. 
 * First loop is to populate the photographers details replacing text with the
 * text from the response. 
 * Second loop is to populate the photos. 
 * 
 * Since the gallery tiles repeat, we use the string in the JS to insert it. 
 * The photographers details are in the view itself. 
 */

$(document).ready(function(){
    function postProcessing(data) {

        $.each(data, function(index, item) {
            if(index == "album") {
                $.each(item, function(gindex, gitem) {
                    
                    $rawDiv = 
'<div class="imgallerytile">' +
    '<div class="imgallerytileimage" style="background-image:url(\'/{img}\')">'+
        '{title}'+
    '</div>'+
    '<div class="imgallerytilecontent">'+
        '{description}'+
    '</div>'+
    '<div>'+
        '<div style="width:50px;float:left">{featured}</div><div style="width:230px;float:left;text-align:right;padding-right:20px">{date}</div>'+
    '</div>'+
'</div>'
                    ;
                    $.each(gitem, function(sindex, sitem) {
                        if(sindex == 'title') {
                            $rawDiv = $rawDiv.replace('{title}', sitem);
                        }else if(sindex == 'id') {
                        }else if(sindex == 'description') {
                            $rawDiv = $rawDiv.replace('{description}', sitem);
                        }else if(sindex == 'featured') {
                            if(sitem==true) {
                                $rawDiv = $rawDiv.replace('{featured}', '<img style="height:20px" src="/storage/imgs/featured.jpg" alt="red heart" title="featured"/>');
                            }else{
                                $rawDiv = $rawDiv.replace('{featured}', '&nbsp;');
                            }
                        }else if(sindex == 'date') {
                            $rawDiv = $rawDiv.replace('{date}', sitem);
                        }else if(sindex == 'img') {
                            $tmp = sitem;
                            $tmp = $tmp.replace('img/', 'storage/imgs/');
                            $rawDiv = $rawDiv.replace('{img}', $tmp);
                        }else{
                            alert("photo data >> " + sindex + " >> " + sitem);
                        }
                    })

                    $(".imgallery").append($rawDiv);
                })
            }else{
                if(index == 'name') {
                    $nameText = $('.headerDescription').html();
                    $nameText = $nameText.replace('{name}', item);
                    $('.headerDescription').html($nameText);
                }else if(index == 'bio') {
                    $nameText = $('.headerDescription').html();
                    $nameText = $nameText.replace('{bio}', item);
                    $('.headerDescription').html($nameText);
                }else if(index == 'email') {
                    $nameText = $('.headerDetails').html();
                    $nameText = $nameText.replace('{email}', item);
                    $('.headerDetails').html($nameText);
                }else if(index == 'phone') {
                    $nameText = $('.headerDetails').html();
                    $nameText = $nameText.replace('{phone}', item);
                    $('.headerDetails').html($nameText);
                }else if(index = 'img') {
                    $('.headerImage img').attr('src', item.replace('img/', 'storage/imgs/'));
                }else{
                    alert("photographer data >> " + index + " >> " + item);
                }
            }
            //container.append('test1');
        })
    }

    getValues();

    function getValues(){
        $.ajax({
            url: jsonpath,
            type: 'get',
            dataType: 'json',
            cache: false,
            success: postProcessing,
            async:true,
        });
    };
})