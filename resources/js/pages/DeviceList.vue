<template>
    <div class="row justify-content-center">
     <h1>ipad List</h1>
     <div id="app">
</div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>端末一覧</h2></div>
                <div class="card-body">
                <table class="table">
                <tr><th>端末</th><th>管理番号</th><th>自治体</th><th>状態</th></tr>
                <Device
                	class="grid__item"
                	v-for="device in devices"
                	:key="device.ID.val"
                	:item="device"
                />

                </table>
            </div>
           </div>
        </div>
    </div>
</template>
<script>
	import { OK } from '../util'
	import Device from '../components/Device.vue'
	export default {
  		components: {
    		Device
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
  				devices: [],
  				info: null
  				}
  		},
  		mounted(){

    		axios.get('/api/devices').then(response => {
  			this.devices = response.data.list.item})


  		},

  		methods: {
  			async fetchDevices (){
    		const response = await axios.get('/api/devices')

     		if (response.status !== OK) {
     			this.$store.commit('error/setCode', response.status)
     			return false
        	}
        	this.devices = response.data.list.item
        	}
        }

  	}
  	//confirm(this.response.data)
</script>