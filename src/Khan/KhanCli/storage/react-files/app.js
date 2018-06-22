import React, { Component } from 'react';
import { render } from 'react-dom';

class App extends React.Component {
  render () {
    return (
    	<div>
    		<center>
    			<img src="https://i.imgur.com/3HuaLEM.png"/>
    			<h1>Hello React init in Khan Framework! 😄</h1>
    		</center>
    	</div>
    );
  }
}

render(<App />, document.getElementById('app'));
