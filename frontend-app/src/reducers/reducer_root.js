import {combineReducers} from 'redux';
import PostReducer from './reducer_post';
import CategoryReducer from './reducer_category';
import TagReducer from './reducer_tag';
import {reducer as formReducer} from 'redux-form';

const rootReducer = combineReducers({posts: PostReducer, categories: CategoryReducer, tags: TagReducer, form: formReducer});

export default rootReducer;
