<template>
	<nav>
		<h4>
			<RouterLink class="navbar__brand" to="/">
			<img width="50" alt="" src="img/tabsapo.png1">タブサポ君2</RouterLink>
		</h4>
		<div class="navbar__menu">
			<div v-if="isLogin" class="navbar__item">
				<div id='account'>
					<table>
						<tr>
							<th colspan='3'>{{ date }}{{ time }}</th>
						</tr>
						<tr>
							<th width='22'>ID</th>
							<th>ユーザー</th>
							<td rowspan='2' width='45'>
								<button v-if="isLogin" class="button button--link"
									@click="logout">Logout</button>
							</td>
						</tr>
						<tr>
							<td>No:{{ id }}</td>
							<td>{{ username }}</td>
						</tr>
					</table>
				</div>
				<div class='side_label'>
					<span>タスク</span>
				</div>
				<ul>
					<RouterLink class="button button--link" to="/reception">
					<li><a>新規登録</a></li>
					</RouterLink>
					<li><a>変更・修正</a></li>
					<RouterLink class="button button--link" to="/task">
					<li><a>一覧</a></li>
					</RouterLink>
				</ul>
				<div class='side_label'>
					<span>端末</span>
				</div>
				<ul>
					<RouterLink class="button button--link" to="/photo">
					<li><a>新規登録</a></li>
					</RouterLink>
					<li><a>変更・修正</a></li>
					<RouterLink class="button button--link" to="/task">
					<li><a>一覧</a></li>
					</RouterLink>
				</ul>
				<button class="button">
					<i class="icon ion-md-add"></i> Submit a photo
				</button>
			</div>
			<div v-else class="navbar__item">
				<RouterLink class="button button--link" to="/login">Login</RouterLink>
			</div>
		</div>
	</nav>
</template>
<script>
import Vue from 'vue'

export default {

	computed: {
    	isLogin () {
      		return this.$store.getters['auth/check']
    	},
    	username () {
      		return this.$store.getters['auth/username']
    	},
    	id () {
      		return this.$store.getters['auth/id']
   		 }
  	},
	data:function() {
		return{
			date: '',
			time: '',
			week: ['(日)', '(月)', '(火)', '(水)', '(木)',  '(金)', '(土)']
		}
	},
	mounted: function(){
		let timerID = setInterval(this.updateTime, 1000);
	},
	methods: {
		updateTime: function() {
			let currentdate = new Date()
			this.time = this.zeroPadding(currentdate.getHours(), 2) + ':' + this.zeroPadding(currentdate.getMinutes(), 2) + ':' + this.zeroPadding(currentdate.getSeconds(), 2)
			this.date = currentdate.getFullYear() + '年' +(currentdate.getMonth()+1) + '月' + currentdate.getDate() + '日' + this.week[currentdate.getDay()]
    	},
    	zeroPadding: function(num, len) {
    		let zero = '';
    		for(var i = 0; i < len; i++) {
      			zero += '0';
      		}
      		return (zero + num).slice(-len);
      	},
      	async logout () {
      		await this.$store.dispatch('auth/logout')
    		if (this.apiStatus) {
       			this.$router.push('/login')
   			}
		}
	}
}


</script>