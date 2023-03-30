function setup_seat(box_list, map_image, edit_url){

    for(let box of box_list){
        const $div = $("<div></div>").addClass("box");
        $div.css("width", box.width + "px");
        $div.css("height", box.height + "px");
        $div.css("top", box.top + "px");
        $div.css("left", box.left + "px");
        $div.css("position","absolute")
        if(box.status == "1") {
            $div.css('background-color','rgba(9, 255, 0, 0.461)');
        } else if(box.status == "2") {
            $div.css('background-color','rgba(225, 255, 0, 0.461)');
        } else if(box.status == "3") {
            $div.css('background-color','rgba(174, 0, 255, 0.461)');
        } else {
            $div.css('background-color','rgba(255, 13, 0, 0.461)');
        }

        $div.html(box.label+"<br>"+box.seat_user);
        $div.on("click", () => {
            if(confirm('「' + box.label + '」の着席状況を更新しますか？')) {

                window.location.href =  edit_url + "/" + box.seet_id +"/edit"
            }
        });
        $("#js-map").append($div);
    }
    console.log(box_list);


    // const map_image = @json($map_image);
    console.log(map_image);

    $(".map").css("background-image","url(../" + map_image +".png)");
}
