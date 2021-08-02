<template>
	<div class="row justify-content-center">
		<h1>新規作成</h1>
		<div class="col-sm-6">
			<form>
				<div class="form-group row">
					<label for="content" class="col-sm-3 col-form-label">Content</label>
					<input type="text" class="col-sm-9 form-control" id="content">
				</div>
				<div class="form-group row">
					<label for="person-in-charge" class="col-sm-3 col-form-label">Person
						In Charge</label> <input type="text" class="col-sm-9 form-control"
						id="person-in-charge">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<form class="cdb-part-card" action="">
				<div class="taskblock">
					<div class="taskcell">
						<label class="">受付日</label>
						<input type="date" class="cdb-date-input jcdb-style-target"
							autocomplete="off" name="受付日">
						<label for="jcdb-part-item17a13ae88c750ed">受付担当者名</label>
							<input type="text" :value="username">

					</div>
					<div class="taskcell" data-field-id="104">
						<label for="jcdb-part-item17a13ae88ca7a9b">学校名</label>
<!-- 						<select v-model ="selectschool2" class="parent" name="val"> -->
						<select @change="onSchool" class="parent" name="val">
							<option value=0 selected="selected">地方を選択</option>
							<option value="1">あ行</option>
							<option value="2">か行</option>
							<option value="3">さ行</option>
							<option value="4">た行</option>
							<option value="5">な行</option>
							<option value="6">は行</option>
							<option value="7">ま行</option>
							<option value="8">や行</option>
							<option value=9>ら行</option>
							<option value=10>わ行</option>
						</select>
						<select @change="onChange" v-show="schools">
							<option value=0>学校を選択</option>
							<option v-for="school in schooldata" :key="school.id" :value="school.schoolid" :data-name="school.schoolname">
								{{ school.schoolname }}
							</option>
						</select>
						<label for="">依頼者</label>
						<input type="text" name="name" list="teachers">
						<datalist id="teachers">
							<option v-for="teacher in teacherdata" :key="teacher.id" :value="teacher.teachername"></option>
						</datalist>

					</div>
					<div class="taskcell">
						<label for="">自治体:</label>{{ jititai }}


						<label for="jcdb-part-item17a13ae88cb6797">デバイス名</label>
						<div v-if="jititai===''" class="navbar__item">
							学校未選択
						</div>
						<div v-else class="navbar__item">
						<vue-simple-suggest v-model="selected":list="simpleSuggestionList":filter-by-query="true"></vue-simple-suggest></div>
					</div>

				</div>
				<div class="taskblock">
					<label class="app-input-field-required">区分</label>
					<div class="cdb-part-item" data-field-id="105" data-type="select" data-readonly="false">
						<a href="#"><span>(未選択)</span><span></span></a>
						<script type="text/x-neo-tmpl"><li><a href="#" class="" data-value=""></a></li></script>
					</div>
					<div class="cdb-part-item" data-field-id="106" data-type="select" data-readonly="false">
						<label>項目</label> <a href="#"> <span>(未選択)</span> <span></span></a>
						<script type="text/x-neo-tmpl"><li><a href="#" class="" data-value=""></a></li></script>
					</div>
					<label for="jcdb-part-item17a13ae88c934e1">項目内容</label>
					<div class="cdb-part-item jcdb-browse-rel-key" data-field-id="107"
						data-type="textbox" data-readonly="false">
						<div class="cdb-part-rel-key-item">
							<input type="text" name="項目内容" id="jcdb-part-item17a13ae88c934e1">
							<div class="cdb-browse-rel-key-buttonpane">
								<a href="#" class="app-text-icon search jcdb-choose-button"
									title="選択"></a><a href="#"
									class="app-text-icon remove jcdb-clear-button" title="クリア"></a>
							</div>
						</div>
					</div>
				</div>
				<div class="taskblock">
					<label>故障破損</label>
					<div class="cdb-part-item" data-field-id="143" data-type="select"
						data-readonly="false">
						<a href="#"><span
							class="neo-select-menu-text app-user-data-s-line"
							style="width: 84px;">(未選択)</span><span
							class="app-text-icon drop-down"></span></a>
						<script type="text/x-neo-tmpl"><li><a href="#" class="" data-value=""></a></li></script>
					</div>

				</div>

				<label>案件状態</label>
				<div class="cdb-part-item" data-field-id="146" data-type="radio"
					data-readonly="false">
					<div
						class="cdb-part-scrollable cdb-part-check-list cdb-part-radio jcdb-style-target">
						<div class="cdb-part-scrollable-inner jcdb-choice-root">
							<label class="cdb-part-check-item app-user-data-s-line "><input
								type="radio" name="案件状態17a13ae88c76326" value="1.受付"><span
								class="cdb-part-check-item-icon"></span><span
								class="cdb-part-check-item-value">1.受付</span></label><label
								class="cdb-part-check-item app-user-data-s-line "><input
								type="radio" name="案件状態17a13ae88c76326" value="2.回収待ち"><span
								class="cdb-part-check-item-icon"></span><span
								class="cdb-part-check-item-value">2.回収待ち</span></label><label
								class="cdb-part-check-item app-user-data-s-line "><input
								type="radio" name="案件状態17a13ae88c76326" value="3.回収済"><span
								class="cdb-part-check-item-icon"></span><span
								class="cdb-part-check-item-value">3.回収済</span></label><label
								class="cdb-part-check-item app-user-data-s-line "><input
								type="radio" name="案件状態17a13ae88c76326" value="4.修理"><span
								class="cdb-part-check-item-icon"></span><span
								class="cdb-part-check-item-value">4.修理</span></label><label
								class="cdb-part-check-item app-user-data-s-line "><input
								type="radio" name="案件状態17a13ae88c76326" value="5.代替機待ち"><span
								class="cdb-part-check-item-icon"></span><span
								class="cdb-part-check-item-value">5.代替機待ち</span></label><label
								class="cdb-part-check-item app-user-data-s-line "><input
								type="radio" name="案件状態17a13ae88c76326" value="6.連絡待ち"><span
								class="cdb-part-check-item-icon"></span><span
								class="cdb-part-check-item-value">6.連絡待ち</span></label><label
								class="cdb-part-check-item app-user-data-s-line "><input
								type="radio" name="案件状態17a13ae88c76326" value="7.交換待ち"><span
								class="cdb-part-check-item-icon"></span><span
								class="cdb-part-check-item-value">7.交換待ち</span></label><label
								class="cdb-part-check-item app-user-data-s-line "><input
								type="radio" name="案件状態17a13ae88c76326" value="8.配達待ち"><span
								class="cdb-part-check-item-icon"></span><span
								class="cdb-part-check-item-value">8.配達待ち</span></label><label
								class="cdb-part-check-item app-user-data-s-line "><input
								type="radio" name="案件状態17a13ae88c76326" value="9.完了"><span
								class="cdb-part-check-item-icon"></span><span
								class="cdb-part-check-item-value">9.完了</span></label>
						</div>
						<script type="text/x-neo-tmpl"><label class="cdb-part-check-item app-user-data-s-line"><input type="radio" name="" value=""><span class="cdb-part-check-item-icon"></span><span class="cdb-part-check-item-value"></span></label></script>
					</div>
				</div>

				<label for="jcdb-part-item17a13ae88cc9bcd">デバイス名2台目</label>
				<div class="cdb-part-item" data-field-id="134" data-type="textbox"
					data-readonly="false">
					<input type="text" class="cdb-text-input jcdb-style-target"
						name="デバイス名2台目" id="jcdb-part-item17a13ae88cc9bcd"
						style="border-color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); border-style: solid; width: 120px;">
				</div>

				<label for="jcdb-part-item17a13ae88cdf2ec">デバイス名3台目</label>
				<div class="cdb-part-item" data-field-id="135" data-type="textbox"
					data-readonly="false">
					<input type="text" class="cdb-text-input jcdb-style-target"
						name="デバイス名3台目" id="jcdb-part-item17a13ae88cdf2ec"
						style="border-color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); border-style: solid; width: 120px;">
				</div>
				<label for="jcdb-part-item17a13ae88ce42f2">台数</label>
				<div class="cdb-part-item" data-field-id="109" data-type="number"
					data-readonly="false">
					<div
						class="cdb-part-number cdb-part-number-input jcdb-style-target">
						<input type="number" step="any" class="cdb-number-value-field"
							name="台数" id="jcdb-part-item17a13ae88ce42f2">
					</div>
				</div>

				<label>学年</label>
				<div class="cdb-part-item" data-field-id="153" data-type="select"
					data-readonly="false">
					<a href="#"
						class="neo-select-menu cdb-part-select jcdb-style-target"><span
						class="neo-select-menu-text app-user-data-s-line"
						style="width: 56px;">不明</span><span
						class="app-text-icon drop-down"></span></a>
					<script type="text/x-neo-tmpl"><li><a href="#" class="" data-value=""></a></li></script>
				</div>

				<label>発生した場所</label>
				<div class="cdb-part-item" data-field-id="154" data-type="select"
					data-readonly="false">
					<a href="#"
						class="neo-select-menu cdb-part-select jcdb-style-target"><span
						class="neo-select-menu-text app-user-data-s-line"
						style="width: 71px;">不明</span><span
						class="app-text-icon drop-down"></span></a>
					<script type="text/x-neo-tmpl"><li><a href="#" class="" data-value=""></a></li></script>
				</div>

				<label for="jcdb-part-item17a13ae88d06185">依頼内容</label>
				<div class="cdb-part-item" data-field-id="125" data-type="textarea"
					data-readonly="false">
					<div
						class="cdb-part-scrollable cdb-part-m-line-text-item cdb-part-textarea-input jcdb-style-target"
						style="width: 380px; height: 80px; background-color: rgb(255, 255, 255); border-style: solid; border-color: rgb(0, 0, 0);">
						<textarea class="cdb-part-scrollable-inner cdb-text-input"
							name="依頼内容" id="jcdb-part-item17a13ae88d06185" cols="" rows=""></textarea>
					</div>
				</div>

				<label for="jcdb-part-item17a13ae88d26ae7">訪問日(回収、現地交換)</label>
				<div class="cdb-part-item" data-field-id="137" data-type="date"
					data-readonly="false">
					<div class="cdb-part-date">
						<input type="text" data-type="date"
							class="cdb-date-input jcdb-style-target hasDatepicker"
							autocomplete="off" id="jcdb-part-item17a13ae88d26ae7"><input
							type="date" class="cdb-date-input jcdb-style-target"
							autocomplete="off" name="訪問日(回収、現地交換)"
							id="jcdb-part-item17a13ae88d26ae7">
					</div>
				</div>
				<label for="jcdb-part-item17a13ae88d26aee">再訪問日(返却)</label>
				<div class="cdb-part-item" data-field-id="138" data-type="date"
					data-readonly="false">
					<div class="cdb-part-date">
						<input type="text" data-type="date"
							class="cdb-date-input jcdb-style-target hasDatepicker"
							autocomplete="off" id="jcdb-part-item17a13ae88d26aee"> <input
							type="date" class="cdb-date-input jcdb-style-target"
							autocomplete="off" name="再訪問日(返却)"
							id="jcdb-part-item17a13ae88d26aee">
					</div>
				</div>

				<label>対応者</label>
				<div class="cdb-part-item" data-field-id="148" data-type="select"
					data-readonly="false">
					<a href="#"
						class="neo-select-menu cdb-part-select jcdb-style-target"><span
						class="neo-select-menu-text app-user-data-s-line"
						style="width: 56px;">(未選択)</span><span
						class="app-text-icon drop-down"></span></a>
					<script type="text/x-neo-tmpl"><li><a href="#" class="" data-value=""></a></li></script>
				</div>

				<label>時刻</label>
				<div class="cdb-part-item" data-field-id="139" data-type="time"
					data-readonly="false">
					<span class="neo-time-input jcdb-style-target"><input
						type="time" name="時刻"><span
						class="neo-time-input-component neo-time-input-hour"><select><option
									value="">--</option>
								<option value="0">00</option>
								<option value="1">01</option>
								<option value="2">02</option>
								<option value="3">03</option>
								<option value="4">04</option>
								<option value="5">05</option>
								<option value="6">06</option>
								<option value="7">07</option>
								<option value="8">08</option>
								<option value="9">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option></select><span class="neo-time-input-value">--</span></span><span
						class="neo-time-input-separator">:</span><span
						class="neo-time-input-component neo-time-input-minute"><select><option
									value="">--</option>
								<option value="0">00</option>
								<option value="1">01</option>
								<option value="2">02</option>
								<option value="3">03</option>
								<option value="4">04</option>
								<option value="5">05</option>
								<option value="6">06</option>
								<option value="7">07</option>
								<option value="8">08</option>
								<option value="9">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
								<option value="32">32</option>
								<option value="33">33</option>
								<option value="34">34</option>
								<option value="35">35</option>
								<option value="36">36</option>
								<option value="37">37</option>
								<option value="38">38</option>
								<option value="39">39</option>
								<option value="40">40</option>
								<option value="41">41</option>
								<option value="42">42</option>
								<option value="43">43</option>
								<option value="44">44</option>
								<option value="45">45</option>
								<option value="46">46</option>
								<option value="47">47</option>
								<option value="48">48</option>
								<option value="49">49</option>
								<option value="50">50</option>
								<option value="51">51</option>
								<option value="52">52</option>
								<option value="53">53</option>
								<option value="54">54</option>
								<option value="55">55</option>
								<option value="56">56</option>
								<option value="57">57</option>
								<option value="58">58</option>
								<option value="59">59</option></select><span class="neo-time-input-value">--</span></span></span>
				</div>

				<label for="jcdb-part-item17a13ae88d4ec7d">完了日</label>
				<div class="cdb-part-item" data-field-id="112" data-type="date"
					data-readonly="false">
					<div class="cdb-part-date">
						<input type="text" data-type="date"
							class="cdb-date-input jcdb-style-target hasDatepicker"
							autocomplete="off" id="jcdb-part-item17a13ae88d4ec7d"
							style="border-color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); border-style: solid;"><input
							type="date" class="cdb-date-input jcdb-style-target"
							autocomplete="off" name="完了日" id="jcdb-part-item17a13ae88d4ec7d"
							style="border-color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); border-style: solid; display: none;">
					</div>
				</div>

				<label for="jcdb-part-item17a13ae88d4321a">対応内容</label>
				<div class="cdb-part-item" data-field-id="111" data-type="textarea"
					data-readonly="false">
					<div
						class="cdb-part-scrollable cdb-part-m-line-text-item cdb-part-textarea-input jcdb-style-target">
						<textarea class="cdb-part-scrollable-inner cdb-text-input"
							name="対応内容" id="jcdb-part-item17a13ae88d4321a" cols="" rows=""></textarea>
					</div>
				</div>

				<label>添付ファイル</label>
				<div class="cdb-part-item cdb-part-has-text-color"
					data-field-id="128" data-type="files" data-readonly="false"
					data-cdb-src-type="url" data-cdb-part-play-video="true">
					<div class="cdb-part-files cdb-editable">
						<div class="app-localized-string co-attach-ng-msg">添付ファイルの使用が制限されているため、アップロード・ダウンロードは行えません。</div>
						<div class="cdb-part-buttonpane">
							<button type="button"
								class="co-attach-btn cdb-part-choose-button jcdb-file-upload-button">選択</button>
						</div>
						<div
							class="app-uploader-file-list cdb-part-scrollable jcdb-style-target empty">
							<div class="cdb-part-scrollable-inner">
								<ul class="app-file-list-items editable"></ul>
								<div class="cdb-part-files-no-data-message"></div>
							</div>
						</div>
					</div>
				</div>

				<label for="jcdb-part-item17a13ae88d6eaea">備考</label>
				<div class="cdb-part-item" data-field-id="114" data-type="textarea"
					data-readonly="false">
					<div
						class="cdb-part-scrollable cdb-part-m-line-text-item cdb-part-textarea-input jcdb-style-target">
						<textarea name="備考" id="jcdb-part-item17a13ae88d6eaea" cols=""
							rows=""></textarea>
					</div>
				</div>

				<label for="jcdb-part-item17a13ae88d69ed2">回収担当者</label>
				<div class="cdb-part-item" data-field-id="155" data-type="textarea"
					data-readonly="false">
					<div
						class="cdb-part-scrollable cdb-part-m-line-text-item cdb-part-textarea-input jcdb-style-target">
						<textarea class="cdb-part-scrollable-inner cdb-text-input"
							name="回収担当者" id="jcdb-part-item17a13ae88d69ed2" cols="" rows=""></textarea>
					</div>
				</div>

				<label for="jcdb-part-item17a13ae88d77222">作業担当者</label>
				<div class="cdb-part-item" data-field-id="156" data-type="textarea"
					data-readonly="false">
					<div
						class="cdb-part-scrollable cdb-part-m-line-text-item cdb-part-textarea-input jcdb-style-target">
						<textarea class="cdb-part-scrollable-inner cdb-text-input"
							name="作業担当者" id="jcdb-part-item17a13ae88d77222" cols="" rows=""></textarea>
					</div>
				</div>

				<label for="jcdb-part-item17a13ae88d7aa5f">返却担当者</label>
				<div class="cdb-part-item" data-field-id="157" data-type="textarea"
					data-readonly="false">
					<div
						class="cdb-part-scrollable cdb-part-m-line-text-item cdb-part-textarea-input jcdb-style-target"
						style="width: 140px; height: 60px; border-style: solid; border-color: rgb(0, 0, 0);">
						<textarea class="cdb-part-scrollable-inner cdb-text-input"
							name="返却担当者" id="jcdb-part-item17a13ae88d7aa5f" cols="" rows=""></textarea>
					</div>
				</div>
			</form>
		</div>
	</div>

</template>

<script>
import VueSimpleSuggest from 'vue-simple-suggest'
import 'vue-simple-suggest/dist/styles.css'

    export default {
		components: {
	    	VueSimpleSuggest
	    },
    	computed: {
        	isLogin () {
          		return this.$store.getters['auth/check']
        	},
        	username () {
          		return this.$store.getters['auth/username']
        	},
        	id () {
          		return this.$store.getters['auth/id']
       		},



      	},
    	data:function() {
    		return{
    			date: '',
    			time: '',
    			jititai:'学校未選択',
    			schools:{school:[]},
    			devices:{device:[]},
    			teachers:{teacher:[]},
    			teacherdata:{teacher:[]},
    			schooldata:{school:[]},
    			week: ['(日)', '(月)', '(火)', '(水)', '(木)',  '(金)', '(土)'],
    			selected:null,
    			simpleSuggestionList: []
    		}
    	},
        props: {
            schoolid: String
        },
        methods: {
        	async loadschool () {
           		const response = await axios.get(`/api/school`)
           		this.schools = response.data
            },
            async loadteacher () {
           		const response = await axios.get(`/api/teacher`)
           		this.teachers = response.data
            },
            onSchool: function(val) {
                this.schooldata = Object.values(this.schools).filter(function(school){
       				return school.index50 === parseInt(val.target.value)
       			})
            },
            onChange: function(val) {
                this.onTeacher(val)
                this.onJititai(val)
                //this.onDevice(val)
            },
            onTeacher: function(val) {
                this.teacherdata = Object.values(this.teachers).filter(function(teacher){

       				return teacher.schoolid === parseInt(val.target.value)
       			})
            },
            onJititai:async function (val) {

       				console.log(val.target.options[event.target.options.selectedIndex].text.slice( 0, 3 ))
       				this.jititai=val.target.options[event.target.options.selectedIndex].text.slice( 0, 3 )
       				if(this.jititai=='熊本市'){

       					const response = await axios.get(`/api/devicesSuggest1`)
       					this.simpleSuggestionList = response.data
       					//console.log(this.simpleSuggestionList)

       				}else{
       					this.jititai=this.schooldata.find((v)=>v.schoolid===parseInt(val.target.value)).jititai
       					const response = await axios.get(`/api/devicesSuggest2`)

       					this.simpleSuggestionList = response.data

       				}


       				//this.selected=this.schooldata.find((v)=>v.schoolid===parseInt(val.target.value))
       				//this.jititai=this.schooldata.find((v)=>v.schoolid===parseInt(val.target.value)).jititai
       				//return teacher.schoolid === parseInt(val.target.value.slice( 0, -3 ))
       		//	})
            },
            onSuggest:function(){

            }

        },
        watch: {
            $route: {
              async handler () {
                await this.loadschool()
                await this.loadteacher()
              },
              immediate: true
            }
          }
    }
</script>