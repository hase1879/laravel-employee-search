

## 座席のデータ(論理)

着席情報
    - 誰(user_id = users.id)
    - どこの席に(seat_id = seats)
    - 何している(status : string)

座席情報(seats)
    - 座席番号(例: A-10)


- A-10, B, 会議中
- A-11, C, 離席中
- A-12, 空き
- A-13, 空き

=> 空きの席に座る(ユースケース)

座席情報マスター(管理画面)
A: 10~30
B: 1-5
C: 1-12



## 座席のデータ(表示)

座席情報(seats)
    - x, y, width, height


issue test2
