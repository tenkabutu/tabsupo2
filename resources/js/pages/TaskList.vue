<template>
    <div class="row justify-content-center">
     <h1>task List</h1>
     <div id="app">

</div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>案件一覧</h2></div>
                <div class="card-body">
                <table class="table">
                <tr><th>案件No</th><th>学校名</th><th>案件状態</th><th>担当者</th></tr>
                <Task
                	class="grid__item"
                	v-for="task in tasks"
                	:key="task.案件No.val"
                	:item="task"
                />

                </table>
            </div>
           </div>
        </div>
    </div>
</template>
<script>
	import { OK } from '../util'
	import Task from '../components/Task.vue'
	export default {
  		components: {
    		Task
  		},
  		props: {
  			page: {
  				type: Number,
  				required: false,
  				default: 1
  			}
  		},
  		data () {
  			return {
  				tasks: []
  				}
  		},
  		mounted(){
    		axios.get('/api/tasks').then(response => {
  			this.tasks = response.data.list.item})
  		},

  		methods: {
  			async fetchTasks (){
    		const response = await axios.get('/api/tasks')

     		if (response.status !== OK) {
     			this.$store.commit('error/setCode', response.status)
     			return false
        	}
        	this.tasks = response.data.list.item
        	}
        }

  	}
  	//confirm(this.response.data)
</script>