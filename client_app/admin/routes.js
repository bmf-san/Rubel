import React from 'react';
import { Route, IndexRoute } from 'react-router';

import App from './components/App';
import Home from './containers/Home';
import Posts from './components/Posts';
import NewPost from './components/NewPost';
import EditPost from './components/EditPost';
import Categories from './components/Categories';
import Tags from './components/Tags';
import Config from './components/Config';

export default (
  <Route path="/admin/dashboard" component={App}>
    <IndexRoute component={Home} />
    <Route path="/admin/dashboard/posts" component={Posts} />
    <Route path="/admin/dashboard/new-post" component={NewPost} />
    <Route path="/admin/dashboard/edit-post/:id" component={EditPost} />
    <Route path="/admin/dashboard/categories" component={Categories} />
    <Route path="/admin/dashboard/tags" component={Tags} />
    <Route path="/admin/dashboard/config" component={Config} />
  </Route>
);
