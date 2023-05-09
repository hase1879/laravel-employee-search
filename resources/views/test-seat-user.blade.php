<p style="font-weight:bold;">・座席表内の社員を検索した際に、ヒットしたら赤字に変更する機能</p>

<br>

<label>座席表内の社員を検索:</label>
<input type="text" id="keyUser" placeholder="名前を入力">
<button id="submit">送信</button>

<div class="text">田口 舞子</div>
<div class="text">八尾 努</div>
<div class="text">吉田 亮佑</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- 現在のURLにパラメータ追加する機能 --}}
<script>
    $(function() {
        $('#submit').click(function() {
            var text = $('#keyUser').val();
            if (text !== '') {
                var url = new URL(window.location.href);
                //urlにパラメータを追加
                url.searchParams.set('name', text);
                window.location.href = url.toString();
            }
        });
    });
</script>

{{-- パラメータ(name)を取得 --}}
@php
    $data = [
        'target' => isset($_GET['name']) ? $_GET['name'] : null,
    ];
@endphp

{{-- パラメータが取れているか確認 --}}
<h4>パラメータ(name):{{ $data['target'] }}</h4>

{{-- パラメータに一致する全ての名前を装飾 --}}
<script>
    // パラメータ
    var target = "{{ $data['target'] }}";
    // テキストの要素を取得
    const texts = document.getElementsByClassName('text');
    // テキスト内の一致する文字列を赤字にする
    for (let i = 0; i < texts.length; i++) {
        const text = texts[i].innerHTML;
        // 置換したデータをビュー側へ反映
        const newText = text.replace(new RegExp(target, 'g'), `<span style="color: red; font-weight:bold;">${target}</span>`);
        texts[i].innerHTML = newText;
    }
</script>









