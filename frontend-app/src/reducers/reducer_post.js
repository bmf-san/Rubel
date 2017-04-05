import marked from 'marked';
import hljs from 'highlight.js';

import {FETCH_POSTS, FETCH_POST, FETCH_INIT_POST, UPDATE_MARKDOWN, INIT_MARKDOWN} from '../actions/index';

const INITIAL_STATE = {
  all: [],
  post: null,
  init_post: null,
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

    case FETCH_INIT_POST:
      return {
        ...state,
        init_post: {
          id: action.payload.data.id,
          category_id: action.payload.data.category.id,
          title: action.payload.data.title,
          content: action.payload.data.content,
          thumb_img_path: action.payload.data.thumb_img_path,
          publication_status: action.payload.data.publication_status,
          tags: action.payload.data.tags
        }
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

    case INIT_MARKDOWN:
      return {
        ...state,
        markdown: null
      }

    default:
      return state;
  }
}
