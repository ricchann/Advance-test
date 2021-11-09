@extends('layouts.layout')
<style>

.form {
  width: 50%;
  margin: 50px auto;
}


.asterisk {
  color: red;
}

tr {
  line-height: 35px;
}

th{
  width: 40%;
  text-align: left;
}

td{
  width: 60%;
}

input, textarea {
  line-height: 30px;
  margin: 20px 0;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.opinion-title {
  vertical-align: top;
}

.lastname,
.firstname {
  width: 45%;
}
.lastname {
  margin-right: 10px;
}

.email,
.address,
.building_name,
.opinion {
  width: 95%;
}

.postcode {
  width: 90%;
}

.form_btn {
  display: block;
  margin: 30px auto 60px;
  width: 150px;
  padding: 10px 10px;
  text-align: center;
  background-color: #222;
  color: #fff;
  font-size: 12px;
  border-radius: 5px;
  cursor: pointer;
}

.sample {
  color: #ccc;
  font-size: 14px;
}

.sample-first {
  margin-left: 170px;
}

.gender-radio {
  position: relative;
  margin: 0.5em 0;
  padding-left: 28px;
  cursor: pointer;
  user-select: none;
}

.gender-radio input {
  display: none;
}

.radio-mark {
  position: absolute;
  top: -3;
  left: 0;
  height: 25px;
  width: 25px;
  border: solid 1px #ccc;
  border-radius: 50%;
  box-sizing: border-box;
}

.radio-mark:after {
    content: "";
    position: absolute;
    background: #000;
    border-radius: 50%;
    top: 5px;
    bottom: 5px;
    left: 5px;
    right: 5px;
    opacity: 0;
}

.gender-radio input:checked + .radio-mark:after {
    opacity: 1;
}

.error_top {
    text-align: center;
    color: red;
    font-weight: bold;
    margin: 30px 0;
}

.error_th {
    color: red;
    font-weight: bold;
}

.error_td {
    color: red;
}



</style>

@section('title','お問い合わせ')

@section('content')
<form class="form" action="/show" method="POST">
  @csrf
  <table>
    <tr>
      <th>お名前 <span class="asterisk">※</span></th>
      <td>
        <input type="text" name="lastname" value="{{old('lastname')}}"  id="lastname" class="lastname">
        <input type="text" name="firstname" value="{{old('firstname')}}"  id="firstname" class="firstname">
        <p class="sample"><span class="sample-last">例）山田</span><span class="sample-first">例）太郎</span></p>
      </td>
    </tr>
    @error('lastname')
    <tr>
      <th class="error_th">ERROR</th>
      <td class="error_td">名前が未入力です。</td>
    </tr>
    @enderror
    @error('firstname')
    <tr>
      <th class="error_th">ERROR</th>
      <td class="error_td">名前が未入力です。</td>
    </tr>
    @enderror

    <tr>
      <th>性別 <span class="asterisk">※</span></th>
      <td>
        <label class="gender-radio">
          <input type="radio" name="gender" checked="checked" class="radio" value="1">
          <span class="radio-mark"></span>
          男性
        </label>
        <label class="gender-radio">
          <input type="radio" name="gender" class="radio" value="2">
          <span class="radio-mark"></span>
          女性
        </label>
      </td>
    </tr>

    <tr>
      <th>メールアドレス <span class="asterisk">※</span></th>
      <td>
        <input type="text" name="email" value="{{old('email')}}" id="email" class="email">
        <p class="sample">例）test@example.com</P>
      </td>
    </tr>
    @error('email')
    <tr>
      <th class="error_th">ERROR</th>
      <td class="error_td">メールアドレスが未入力です。</td>
    </tr>
    @enderror

    <tr>
      <th>郵便番号 <span class="asterisk">※</span></th>
      <td>
        <span class="postal-code">〒</span>
        <input text="text" name="postcode" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" value="{{old('postcode')}}" id="postcode" class="postcode">
        <p class="sample">例）123-4567</p>
      </td>
    </tr>
    @error('postcode')
    <tr>
      <th class="error_th">ERROR</th>
      <td class="error_td">郵便番号が未入力です。</td>
    </tr>
    @enderror
    <tr>
      <th>住所 <span class="asterisk">※</span></th>
      <td>
        <input type="text" name="address" size="60" value="{{old('address')}}" id="address" class="address">
        <p class="sample">例）東京都渋谷区千駄ヶ谷1-2-3</p>
      </td>
    </tr>
    @error('address')
    <tr>
      <th class="error_th">ERROR</th>
      <td class="error_td">住所が未入力です。</td>
    </tr>
    @enderror
    <tr>
      <th>建物名</th>
      <td>
        <input text="text" name="building_name" value="{{old('building_name')}}" id="building_name" class="building_name">
        <p class="sample">例）千駄ヶ谷マンション101</p>
      </td>
    </tr>

    <tr>
      <th class="opinion-title">ご意見 <span class="asterisk">※</span></th>
      <td>
        <textarea id="opinion" class="opinion" name="opinion" rows="4" cols="60">{{old('opinion')}}</textarea>
      </td>
    </tr>
    @error('opinion')
    <tr>
      <th class="error_th">ERROR</th>
      <td class="error_td">ご意見をお願いします。</td>
    </tr>
    @enderror
  </table>
  <input type="submit" class="form_btn" value="確認">
</form>
@endsection('content')