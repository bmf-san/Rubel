import React from 'react';
import ReactDOM from 'react-dom';
import { Router, Route, hashHistory } from 'react-router';
import App from './components/App';
import Home from './components/Home';
import NewPost from './components/NewPost';
import Posts from './components/Posts';
import PostEdit from './components/PostEdit';
import Categories from './components/Categories';
import Config from './components/Config';

export default (
  <Router history={hashHistory}>
    <Route path="/" component={App}>
      <Route path="/home" component={Home} />
      <Route path="/new-post" component={NewPost} />
      <Route path="/posts" component={Posts} />
      <Route path="/post/edit/:post-id" component={PostEdit} />
      <Route path="/categories" component={Categories} />
      <Route path="/config" component={Config} />
    </Route>
  </Router>
);
