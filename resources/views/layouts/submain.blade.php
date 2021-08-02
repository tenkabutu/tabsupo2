@extends('layouts.main')

@section('content2')

<div class="main_left">
	<h4><a class="navbar-brand" href="{{ url('/') }}"><img width="50" alt="" src="{{ asset('img/tabsapo.png') }}"> {{ config('app.name','Laravel') }} </a></h4>
	<div id='account'>
		<table>
			<tr>
				<th colspan='3'>@php echo date("Y年m月d日", time()) . "\n"; @endphp <label
					id='Japan'></label></th>
			</tr>
			<tr>
				<th width='22'>ID</th>
				<th>ユーザー</th>
				<td rowspan='2' width='45'>
						<a href="{{ route('logout') }}"
							onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							{{ __('退出') }} </a>

						<form id="logout-form" action="{{ route('logout') }}"
							method="POST" class="d-none">@csrf</form>
					</td>
			</tr>
			<tr>
				<td>No:{{ Auth::user()->id }}</td>
				<td>{{ Auth::user()->name }}</td>
			</tr>
		</table>
	</div>
	<nav>
		<div class='side_label'><span>タスク</span></div>
		<ul>
			<li><a href='task/create'>新規登録</a></li>
            <li><a href='nippoulist.php?area=0&school=0&year=0&month=0&day=0'>変更・修正</a></li>
            <li><a href='task/list'>一覧</a></li>
        </ul>
        <div class='side_label'><span>ユーザー</span></div>
		<ul>
			<li><a href='main.php'>回収待機リスト</a></li>
            <li><a href='nippoulist.php?area=0&school=0&year=0&month=0&day=0'>返却待機リスト</a></li>
            <li><a href='totallist.php'>キッティング待機</a></li>
        </ul>
		<div class='side_label'><span>iPad</span></div>
		<ul>
			<li><a href='ipad/create'>新規登録</a></li>
            <li><a href='nippoulist.php?area=0&school=0&year=0&month=0&day=0'>変更・修正</a></li>
            <li><a href='ipad/list'>一覧</a></li>
        </ul>
	</nav>
<!-- 	<ul class="navbar-nav ml-auto"> -->
		<!-- Authentication Links -->
<!-- 		<li><a id="navbarDropdown" -->
<!-- 			class="nav-link dropdown-toggle" href="#" role="button" -->
<!-- 			data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" -->
<!-- 			v-pre> {{ Auth::user()->name }} </a> -->
<!-- 			<div > -->
<!-- 				<a class="dropdown-item" href="{{ route('logout') }}" -->
<!-- 					onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> -->
<!-- 					{{ __('Logout') }} </a> -->

<!-- 				<form id="logout-form" action="{{ route('logout') }}" method="POST" -->
<!-- 					class="d-none">@csrf</form> -->
<!-- 			</div></li> -->

<!-- 	</ul> -->

</div>
@yield('content')

@endsection
