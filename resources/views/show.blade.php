@extends('layouts.layout')
<style>

.form_container {
  text-align: center;
  margin: 50px auto;
  width: 50%;
}

table {
  width:100%;
}

tr {
  line-height: 100px;
}

th{
  width: 40%;
  text-align: left;
}

td {
  width: 60%;
}

.show-btn {
  width: 150px;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  background: #000;
  color: #fff;
  font-size: 16px;
  border-radius: 5px;
  margin-bottom: 10px;
  cursor: pointer;
}

.show-fix {
  font-size: 15px;
  color: #000;
  border-bottom: 1px solid #000;
}




</style>
@section('title','内容確認')

@section('content')
<div class="form_container">
<form action="/complete" method="POST">
  @csrf
    <table>
      <tr>
        <th>お名前</th>
        <td>{{old('lastname')}}{{old('firstname')}}</td>
        <input type="hidden" name="fullname" value="{{old('lastname')}}{{old('firstname')}}">
      </tr>
      <tr>
        <th>性別</th>
        <td>
          @if(old('gender')==='1')
          男性
          @else(old('gender')==='2')
          女性
          @endif
        </td>
        <input type="hidden" name="gender" value="{{old('gender')}}">
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{old('email')}}</td>
        <input type="hidden" name="email" value="{{old('email')}}">
      </tr>
      <tr>
        <th>郵便番号</th>
        <td>{{old('postcode')}}</td>
        <input type="hidden" name="postcode" value="{{old('postcode')}}">
      </tr>
      <tr>
        <th>住所</th>
        <td>{{old('address')}}</td>
        <input type="hidden" name="address" value="{{old('address')}}">
      </tr>
      <tr>
        <th>建物名</th>
        <td>{{old('building_name')}}</td>
        <input type="hidden" name="building_name" value="{{old('building_name')}}">
      </tr>
      <tr>
        <th>ご意見</th>
        <td>{{old('opinion')}}</td>
        <input type="hidden" name="opinion" value="{{old('opinion')}}">
      </tr>
    </table>
  <input type="submit" value="送信" class="show-btn">
</form>
<a class="show-fix" href="" onclick="history.back(-1);return false;">修正する</a>
</div>
@endsection