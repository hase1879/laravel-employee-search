/**
 * 社員詳細をモーダル表示
 */
// grid.jsは、動的要素の為、documentから読み込む
$(document).on('click', '.employees-show-link', function(){
    console.log(this.getAttribute("href"));
    // クリック時に、URL取得
    const url = $(this).attr("href");

    // 関数実行
    openModalEmployee(url);

    // ページ遷移防止
    return false;
});

function openModalEmployee(url){
    // HTMLデータ取得
    $.get(url, function(res){
        $("#modalEmployee .modal-body").html($(res).find(".modal-view").html());
    });

    // Via JavaScript: JavaScript 1行でモーダルを作成
    const myModal = new bootstrap.Modal(document.getElementById('modalEmployee'), {

    });
    myModal.show();
}



/**
 * 座席表をモーダル表示
 */
$(document).on('click', '.seats-show-link', function(){
    console.log(this.getAttribute("href"));
    // クリック時に、URL取得
    const url = $(this).attr("href");

    // 関数実行
    openModalSeat(url);

    // ページ遷移防止
    return false;
});

function openModalSeat(url){
    // HTMLデータ取得
    $.get(url, function(res){
        $("#modalSeat .modal-body").html($(res).find(".modal-view").html());
    });

    // Via JavaScript: JavaScript 1行でモーダルを作成
    const myModal = new bootstrap.Modal(document.getElementById('modalSeat'), {

    });
    myModal.show();
}
