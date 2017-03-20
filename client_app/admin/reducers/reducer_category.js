import {FETCH_CATEGORIES, TOGGLE_DISPLAY} from '../actions/index';

const INITIAL_STATE = {
  all: [],
  display: false
}

export default function(state = INITIAL_STATE, action) {
  switch (action.type) {
    case FETCH_CATEGORIES:
      return {
        ...state,
        all: action.payload.data
      };
    case TOGGLE_DISPLAY:
      if (state.display) {
        return {
          ...state,
          display: false
        };
      } else {
        return {
          ...state,
          display: true
        };
      }

    default:
      return state;
  }
}
