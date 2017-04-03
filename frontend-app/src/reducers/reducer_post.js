import marked from 'marked';
import hljs from 'highlight.js';

import {FETCH_POSTS, FETCH_POST, UPDATE_MARKDOWN} from '../actions/index';

const INITIAL_STATE = {
  all: [],
  post: null,
  markdown: null
}

export default function(state = INITIAL_STATE, action) {
  switch (action.type) {
    case FETCH_POSTS:
      return {
        ...state,
        all: action.payload.data
      };

    case FETCH_POST:
      return {
        ...state,
        post: action.payload.data
      };

    case UPDATE_MARKDOWN:
      const marked_request = marked.setOptions({
        highlight: function(code, lang) {
          return hljs.highlightAuto(code, [lang]).value;
        }
      });

      const html = marked(action.payload);

      return {
        ...state,
        markdown: html
      }

    default:
      return state;
  }
}
