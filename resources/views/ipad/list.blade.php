@extends('layouts.submain')

@section('content')
<div class="main_right">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>端末一覧</h2></div>

                <div class="card-body">
                <table class="table">
<tr>
  <th>端末</th>
  <th>管理番号</th>
  <th>自治体</th>
  <th>状態</th>

</tr>
{{-- @foreach ($records as $record) --}}
@foreach ($records as $record)

<tr>
<td>{{ $record["端末種類"]["val"]}}</td>
<td>{{ $record["管理番号"]["val"]}}</td>
<td>{{ $record["自治体"]["val"]}}</td>
<td>{{ $record["状態"]["val"]}}</td>
</tr>





@endforeach
</table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
