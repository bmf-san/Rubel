import axios from 'axios';

export const FETCH_POSTS = "FETCH_POSTS";
export const FETCH_POST = "FETCH_POST";

const ROOT_URL = '/laravel-react-blog-boilerplate/public/api/v1';

export function fetchPosts() {
  const request = axios.get(`${ROOT_URL}/posts`);

  return {
      type: FETCH_POSTS,
      payload: request
  };
}

export function fetchPost(id) {
  const request = axios.get(`${ROOT_URL}/post/${id}`);

  return {
    type: FETCH_POST,
    payload: request
  }
}
