import React from 'react';
import ReactDOM from 'react-dom';
import {Provider} from 'react-redux';
import {createStore, applyMiddleware} from 'redux';
import {Router, browserHistory} from 'react-router';
import promise from 'redux-promise';

import reducers from './reducers/reducer_root';
import routes from './routes';

require('../node_modules/bulma/css/bulma.css');
require('../node_modules/highlight.js/styles/atom-one-dark.css');

const createStoreWithMiddleware = applyMiddleware(promise)(createStore);

ReactDOM.render(
  <Provider store={createStoreWithMiddleware(reducers)}>
  <Router history={browserHistory} routes={routes}/>
</Provider>, document.getElementById('dashboard'));
