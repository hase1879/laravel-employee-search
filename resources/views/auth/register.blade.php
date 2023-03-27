@extends('layouts.app')

 @section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-5">
             <h3 class="mt-3 mb-3">新規社員登録</h3>

             <hr>

             <form method="POST" action="{{ route('register') }}">
                 @csrf

                 {{-- <div class="form-group row">
                    <label for="user_number" class="col-md-5 col-form-label text-md-left">社員番号<span class="ml-1 samuraimart-require-input-label"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input type="text" class="form-control @error('user_number') is-invalid @enderror samuraimart-login-input" name="user_number" required placeholder="09000000">
                    </div>
                </div> --}}

                 <div class="form-group row">
                     <label for="name" class="col-md-5 col-form-label text-md-left">氏名<span class="ml-1 samuraimart-require-input-label"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                     <div class="col-md-7">
                         <input id="name" type="text" class="form-control @error('name') is-invalid @enderror samuraimart-login-input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="田中 太郎">

                         @error('name')
                         <span class="invalid-feedback" role="alert">
                             <strong>氏名を入力してください</strong>
                         </span>
                         @enderror
                     </div>
                 </div>

                 <div class="form-group row">
                    <label for="furigana" class="col-md-5 col-form-label text-md-left">ふりがな<span class="ml-1 samuraimart-require-input-label"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input type="text" class="form-control @error('furigana') is-invalid @enderror samuraimart-login-input" name="furigana" required placeholder="たなか たろう">
                    </div>
                </div>

                 <div class="form-group row">
                     <label for="email" class="col-md-5 col-form-label text-md-left">メールアドレス<span class="ml-1 samuraimart-require-input-label"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                     <div class="col-md-7">
                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror samuraimart-login-input" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="tanaka1217@example.net">

                         @error('email')
                         <span class="invalid-feedback" role="alert">
                             <strong>メールアドレスを入力してください</strong>
                         </span>
                         @enderror
                     </div>
                 </div>

                <div class="form-group row">
                    <label for="age" class="col-md-5 col-form-label text-md-left">年齢<span class="ml-1 samuraimart-require-input-label"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input type="text" class="form-control @error('age') is-invalid @enderror samuraimart-login-input" name="age" required placeholder="37">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date_of_Birth" class="col-md-5 col-form-label text-md-left">生年月日<span class="ml-1 samuraimart-require-input-label"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input type="text" class="form-control @error('date_of_Birth') is-invalid @enderror samuraimart-login-input" name="date_of_Birth" required placeholder="1985年11月11日">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="join_date" class="col-md-5 col-form-label text-md-left">入社年月日<span class="ml-1 samuraimart-require-input-label"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input type="text" class="form-control @error('join_date') is-invalid @enderror samuraimart-login-input" name="join_date" required placeholder="2005年11月10日">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gender" class="col-md-5 col-form-label text-md-left">性別<span class="ml-1 samuraimart-require-input-label"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input type="text" class="form-control @error('gender') is-invalid @enderror samuraimart-login-input" name="gender" required placeholder="男">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone_number" class="col-md-5 col-form-label text-md-left">固定電話<span class="ml-1 samuraimart-require-input-label"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror samuraimart-login-input" name="phone_number" required placeholder="044-904-5818">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mobile_phone_number" class="col-md-5 col-form-label text-md-left">携帯電話<span class="ml-1 samuraimart-require-input-label"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input type="text" class="form-control @error('mobile_phone_number') is-invalid @enderror samuraimart-login-input" name="mobile_phone_number" required placeholder="070-5772-3522">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="zip_code" class="col-md-5 col-form-label text-md-left">郵便番号<span class="ml-1 samuraimart-require-input-label"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror samuraimart-login-input" name="zip_code" required placeholder="152-1725">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="present_address" class="col-md-5 col-form-label text-md-left">住所<span class="ml-1 samuraimart-require-input-label"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input type="text" class="form-control @error('present_address') is-invalid @enderror samuraimart-login-input" name="present_address" required placeholder="東京都中野区中央3-3-104">
                    </div>
                </div>

                    <div class="form-group row">
                     <label for="password" class="col-md-5 col-form-label text-md-left">パスワード<span class="ml-1 samuraimart-require-input-label"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                     <div class="col-md-7">
                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror samuraimart-login-input" name="password" required autocomplete="new-password">

                         @error('password')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                         @enderror
                     </div>
                    </div>

                 <div class="form-group row">
                     <label for="password-confirm" class="col-md-5 col-form-label text-md-left"></label>

                     <div class="col-md-7">
                         <input id="password-confirm" type="password" class="form-control samuraimart-login-input" name="password_confirmation" required autocomplete="new-password">
                     </div>
                 </div>

                 <div class="form-group mt-2">
                     <button type="submit" class="btn samuraimart-submit-button w-100">
                         アカウント作成
                     </button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 @endsection
