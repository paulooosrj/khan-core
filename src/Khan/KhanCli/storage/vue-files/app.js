import Vue from 'vue';

const app = new Vue({
	el: "#app",
	data: {
		peoples: []
	},
	methods: {
		getPeoples(){
			fetch("./khan-vue/", { method: "GET" })
					 .then(res => res.json())
					 .then(json => this.peoples = json);
		}
	}
});

app.getPeoples();