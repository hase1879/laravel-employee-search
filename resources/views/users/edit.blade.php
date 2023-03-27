@extends('layouts.app')

 @section('content')


<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-5">
             <span>
                 <a href="{{ route('mypage') }}">マイページ</a> > 社員情報の編集
             </span>

             <h1 class="mt-3 mb-3">社員情報の編集</h1>
             <hr>

             <form method="POST" action="{{ route('mypage') }}">
                 @csrf
                 <input type="hidden" name="_method" value="PUT">
                 <div class="form-group">
                     <div class="d-flex justify-content-between">
                         <label for="name" class="text-md-left samuraimart-edit-user-info-label">氏名</label>
                     </div>
                     <div class="collapse show editUserName">
                         <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="田中 太郎">
                         @error('name')
                         <span class="invalid-feedback" role="alert">
                             <strong>氏名を入力してください</strong>
                         </span>
                         @enderror
                     </div>
                 </div>


                 <div class="form-group">
                     <div class="d-flex justify-content-between">
                         <label for="furigana" class="text-md-left samuraimart-edit-user-info-label">ふりがな</label>
                     </div>
                     <div class="collapse show editUserfurigana">
                         <input id="furigana" type="text" class="form-control @error('furigana') is-invalid @enderror" name="furigana" value="{{ $user->furigana }}" required autocomplete="furigana" autofocus placeholder="XXX-XXXX-XXXX">
                         @error('furigana')
                         <span class="invalid-feedback" role="alert">
                             <strong>ふりがなを入力してください</strong>
                         </span>
                         @enderror
                     </div>
                 </div>
                 <br>

                 <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="email" class="text-md-left samuraimart-edit-user-info-label">メールアドレス</label>
                    </div>
                    <div class="collapse show editUserMail">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="samurai@samurai.com">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>メールアドレスを入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>

                 <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="age" class="text-md-left samuraimart-edit-user-info-label">年齢</label>
                    </div>
                    <div class="collapse show editUserage">
                        <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $user->age }}" required autocomplete="age" autofocus placeholder="XXX-XXXX-XXXX">
                        @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>年齢を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="date_of_Birth" class="text-md-left samuraimart-edit-user-info-label">生年月日</label>
                    </div>
                    <div class="collapse show editUserdate_of_Birth">
                        <input id="date_of_Birth" type="text" class="form-control @error('date_of_Birth') is-invalid @enderror" name="date_of_Birth" value="{{ $user->date_of_Birth }}" required autocomplete="date_of_Birth" autofocus placeholder="XXX-XXXX-XXXX">
                        @error('date_of_Birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>生年月日を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="join_date" class="text-md-left samuraimart-edit-user-info-label">入社年月日</label>
                    </div>
                    <div class="collapse show editUserjoin_date">
                        <input id="join_date" type="text" class="form-control @error('join_date') is-invalid @enderror" name="join_date" value="{{ $user->join_date }}" required autocomplete="join_date" autofocus placeholder="XXX-XXXX-XXXX">
                        @error('join_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>入社年月日を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="gender" class="text-md-left samuraimart-edit-user-info-label">性別</label>
                    </div>
                    <div class="collapse show editUsergender">
                        <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $user->gender }}" required autocomplete="gender" autofocus placeholder="XXX-XXXX-XXXX">
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>性別を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="phone_number" class="text-md-left samuraimart-edit-user-info-label">固定電話番号</label>
                    </div>
                    <div class="collapse show editUserphone_number">
                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number }}" required autocomplete="phone_number" autofocus placeholder="XXX-XXXX-XXXX">
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>固定電話番号を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="mobile_phone_number" class="text-md-left samuraimart-edit-user-info-label">携帯電話番号</label>
                    </div>
                    <div class="collapse show editUsermobile_phone_number">
                        <input id="mobile_phone_number" type="text" class="form-control @error('mobile_phone_number') is-invalid @enderror" name="mobile_phone_number" value="{{ $user->mobile_phone_number }}" required autocomplete="mobile_phone_number" autofocus placeholder="XXX-XXXX-XXXX">
                        @error('mobile_phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>携帯電話番号を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="zip_code" class="text-md-left samuraimart-edit-user-info-label">郵便番号</label>
                    </div>
                    <div class="collapse show editUserPhone">
                        <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ $user->zip_code }}" required autocomplete="zip_code" autofocus placeholder="XXX-XXXX">
                        @error('zip_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>郵便番号を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="present_address" class="text-md-left samuraimart-edit-user-info-label">住所</label>
                    </div>
                    <div class="collapse show editUserPhone">
                        <input id="present_address" type="text" class="form-control @error('present_address') is-invalid @enderror" name="present_address" value="{{ $user->present_address }}" required autocomplete="present_address" autofocus placeholder="東京都渋谷区道玄坂X-X-X">
                        @error('present_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>住所を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>

                 <hr>
                 <button type="submit" class="btn samuraimart-submit-button mt-3 w-25">
                     保存
                 </button>
             </form>
         </div>
     </div>
 </div>
 @endsection
