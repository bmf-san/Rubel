import React from 'react';
import ReactDOM from 'react-dom';
import { Route, IndexRoute } from 'react-router';

import App from './components/App';
import Home from './components/Home';
import NewPost from './components/NewPost';
import Posts from './components/Posts';
import PostEdit from './components/PostEdit';
import Categories from './components/Categories';
import Config from './components/Config';

export default (
  <Route path="/" component={App}>
    <IndexRoute component={Home} />
    <Route path="/new-post" component={NewPost} />
    <Route path="/posts" component={Posts} />
    <Route path="/post/edit/:post-id" component={PostEdit} />
    <Route path="/categories" component={Categories} />
    <Route path="/config" component={Config} />
  </Route>
);
