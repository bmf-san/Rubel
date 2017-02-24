import React from 'react';
import ReactDOM from 'react-dom';
import { Route, IndexRoute } from 'react-router';

import App from './components/App';
import Home from './containers/Home';
import Posts from './components/Posts';
import NewPost from './components/NewPost';
import EditPost from './components/EditPost';
import Categories from './components/Categories';
import Config from './components/Config';

export default (
  <Route path="/" component={App}>
    <IndexRoute component={Home} />
    <Route path="posts" component={Posts} />
    <Route path="new-post" component={NewPost} />
    <Route path="edit-post/:id" component={EditPost} />
    <Route path="categories" component={Categories} />
    <Route path="config" component={Config} />
  </Route>
);
