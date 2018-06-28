import Vue from 'vue';

const hi = "Ola mundo!!";

new Vue({
	el: "#app",
	template: '<div>{{ hi }}</div>',
	data: { hi }
})