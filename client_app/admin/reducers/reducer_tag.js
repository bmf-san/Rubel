import {FETCH_TAGS, DELETE_COMPLETE_TAGS, ADD_COMPLETE_TAGS} from '../actions/index';

const INITIAL_STATE = {
  all: [],
  complete_tags: []
}

export default function(state = INITIAL_STATE, action) {
  switch (action.type) {
    case FETCH_TAGS:
      return {
        ...state,
        all: action.payload.data
      };

    case DELETE_COMPLETE_TAGS:

      return {
        ...state,
        complete_tags: complete_tags
      }

    case ADD_COMPLETE_TAGS:
      state.complete_tags.push(action.payload);

      return {
        ...state,
        complete_tags: state.complete_tags
      }

    default:
      return state;
  }
}
