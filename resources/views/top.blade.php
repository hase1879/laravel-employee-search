@extends('layouts.app')

@section('content')
    <div class="firstView-bg-gray-beside">
        <div class="firstView-box-text">
            <h3>
                「今日はどこに座っているの？！！」
                <br>
                と、もう悩まない。
            </h3>

            <p class="mb-4 ">「座席表＋社員名簿」管理、EmployeeSearch</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input type="hidden" name="email" value="demo@example.com" />
                <input type="hidden" name="password" value="demo" />

                <input type="submit" value="ゲストログイン" class="btn btn-primary" />
            </form>
        </div>
        <div class="firstView-pc"></div>
    </div>

    <div class="title">EmployeeSearchとは？</div>

    <div class="two-column">
        <div class="yubiwosasu"></div>
        <div class="box-item">
            <p class="mb-3">
                コロナ渦の中、オフィス環境は大きく変わって来ています。その一つとして、座席のフリーアドレス化です。
            </p>
            <p class="mb-3">
                ここで、問題が出てきました。
                <br>
                <span class="fw-bold ">「A業務について、聞きたいけど、○○課の○○さんってどこにいるの．．．？」</span>
            </p>
            <p class="mb-3">
                この問題をいち早く解決するのが、
                <br>
                <span class="fw-bold ">「&emsp;座席表&emsp;×&emsp;社員名簿&emsp;」</span>と組み合わせた、
                <br>
                "EmployeeSearch"となります。
            </p>
        </div>
    </div>

    <div class="bg-gray-vertical">
        <h4>具体的な使い方</h4>
        <div class="map-question"></div>
    </div>

    <div class="row g-0 py-3 justify-content-center">
        <i class="arrow fas fa-angle-down text-center"></i>
    </div>

    <div class="bg-gray-beside">
        <div class="box-text">
            <h4>
                スマートな<span class="fw-bold fs-2">検索</span>
            </h4>
            <p>
                社員一覧ページで、該当部署の絞り込み、
                <br>
                キーワード検索機能を利用し、
                <br>
                いち早く、社員を見つけます
            </p>
        </div>
        <div class="pc-employee"></div>
    </div>

    <div class="row g-0 py-3 justify-content-center">
        <i class="arrow fas fa-angle-down text-center"></i>
    </div>

    <div class="bg-gray-beside">
        <div class="pc-seat"></div>
        <div class="box-text">
            <h4>
                迅速な<span class="fw-bold fs-2">居場所</span>の把握
            </h4>
            <p>
                該当社員の着席状況をクリックすると、
                <br>
                座席表が開き、居場所を確認できます
            </p>
            <div class="kizuku"></div>
        </div>
    </div>

    <div class="bg-blue py-5">
        <div class="text-start">さあ、EmployeeSearchを初めてみましょう！</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input type="hidden" name="email" value="demo@example.com" />
            <input type="hidden" name="password" value="demo" />

            <input type="submit" value="ゲストログイン" class="btn btn--start btn--radius-start" />
        </form>
    </div>

    {{-- Todo:headへ移動 --}}
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection
