import {FETCH_CATEGORIES, TOGGLE_DISPLAY} from '../actions/index';

const INITIAL_STATE = {
  all: [],
  target_id: 1, // FIXME
  display: true
}

export default function(state = INITIAL_STATE, action) {
  switch (action.type) {
    case FETCH_CATEGORIES:
      return {
        ...state,
        all: action.payload.data
      };
    case TOGGLE_DISPLAY:
      if (state.target_id = action.payload) {
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
