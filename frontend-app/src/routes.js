import React from 'react';
import {Route, IndexRoute} from 'react-router';

import App from './components/App';
import Home from './containers/Home';
import Posts from './components/Posts';
import NewPost from './components/NewPost';
import EditPost from './components/EditPost';
import Categories from './components/Categories';
import Tags from './components/Tags';
import Config from './components/Config';

export default(
  <Route path="/dashboard" component={App}>
    <IndexRoute component={Home}/>
    <Route path="/dashboard/posts" component={Posts}/>
    <Route path="/dashboard/new-post" component={NewPost}/>
    <Route path="/dashboard/edit-post/:id" component={EditPost}/>
    <Route path="/dashboard/categories" component={Categories}/>
    <Route path="/dashboard/tags" component={Tags}/>
    <Route path="/dashboard/config" component={Config}/>
  </Route>
);
