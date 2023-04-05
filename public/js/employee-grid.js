// HTMLからテーブルデータを取得し、grid.jsにて再描画。
document.addEventListener('DOMContentLoaded', function () {
    // Grid.jsコード
    const grid = new gridjs.Grid({
        // from: で、HTMLの<table>タグを変換
          from: document.getElementById("sample-table"),
        //   各種テーブル設定
          pagination: {
              limit: 10
          },
          search: true,
          sort: true,
          fixedHeader: true,
          height: '700px',
          style: {
              td: {
                  border: '1px solid #ccc',
              },
              th: {
                  color: "rgb(0, 0, 0)",
                  border: '1px solid #ccc',
                  'background-color': 'rgba(93, 193, 255, 0.267)',
              },
              table: {
                  'font-size': '15px',
                  'white-space': 'nowrap'
              }
          }
    //   対象のIDへ描画
    }).render(document.getElementById("sample-table-wrapper"));
});
