import React from 'react';
import ReactDOM from 'react-dom';
import { Router, Route, hashHistory } from 'react-router';
import App from './components/App';
import Posts from './components/Posts';
import Categories from './components/Categories';
import Config from './components/Config';

export default (
  <Router history={hashHistory}>
    <Route path="/" component={App}>
      <Route path="/posts" component={Posts} />
      <Route path="/categories" component={Categories} />
      <Route path="/config" component={Config} />
    </Route>
  </Router>
);
