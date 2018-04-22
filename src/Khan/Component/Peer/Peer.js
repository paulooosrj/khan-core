"use strict";

window.khan_peer = (function(socket){

	return {
		peer_id: '',
		outher_id: '',
		desktop: null,
		isConnect: false,
		onConn: '',
		connect: (id) => {
			khan_socket.emit('peer-connect-' + id, {
				id: id,
				outherid: khan_peer.peer_id
			});
		},
		new(){ 
			if(this.peer_id === ''){ 
				this.peer_id = Math.floor(Math.random() * 1000000); 
			} 
			var self = this;
			khan_socket.on('peer-connect-' + this.peer_id, function(data){
				if(self.peer_id === data.id && self.isConnect === false){
					self.isConnect = true;
					self.onConn.bind(self)();
					self.outher_id = data.outherid;
					khan_peer.connect(data.outherid);
				}
			});
			return this;
		},
		id(){ return this.peer_id; },
		onConnect(fn){ this.onConn = fn; },
		on(event, call){
			khan_socket.on('peer-channel-id-' + this.peer_id + '-' + event, call);
		},
		emit(event, data){
			khan_socket.emit('peer-channel-id-' +this.outher_id+ '-' + event, data);
		}
	};

})(khan_socket);
