import React from 'react';
import ReactDOM from 'react-dom';

export default class App extends React.Component{
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div>
        <h1>hello react!</h1>
      </div>
    );
  }
}

ReactDOM.render(
  <App />,
  document.getElementById('example')
);
