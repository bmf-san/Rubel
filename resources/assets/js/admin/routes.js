import React from 'react';
import ReactDOM from 'react-dom';
import { Route, IndexRoute } from 'react-router';

import App from './components/App';
import Home from './containers/Home';
import Posts from './components/Posts';
import Config from './components/Config';

export default (
  <Route path="/" component={App}>
    <IndexRoute component={Home} />
    <Route path="/posts" component={Posts} />
    <Route path="/config" component={Config} />
  </Route>
);
