import React, { Component } from 'react';
import { Switch, Route } from 'react-router';
import PageNotFound from '../components/pageNotFound';

import Header from './Header';
import MainPanelLeft from './MainPanelLeft';

export default class Body extends Component {
  render() {
    return (
      <Switch>
      	<Route path="/Gestion" component={Header}/>
      	<Route path="/logout" component={MainPanelLeft}/>
			<Route path="*" component={PageNotFound}/>
      </Switch>
    );
  }
}
