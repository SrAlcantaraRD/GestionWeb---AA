import React, { Component } from 'react';
import MainPanelLeft from '../containers/MainPanelLeft';
import MainPanelRight from '../containers/MainPanelRight';

class App extends Component {
  render() {
    return (
      <div>
        <MainPanelLeft />
        <MainPanelRight />
      </div>
    );
  }
}

export default App
