import axios from 'axios';

export const CREATE_POST = "CREATE_POST";
export const EDIT_POST = "EDIT_POST";
export const FETCH_POSTS = "FETCH_POSTS";
export const FETCH_POST = "FETCH_POST";
export const CREATE_CATEGORY = "CREATE_CATEGORY";
export const EDIT_CATEGORY = "EDIT_CATEGORY";
export const FETCH_CATEGORIES = "FETCH_CATEGORIES";

const ROOT_URL = '/laravel-react-blog-boilerplate/public/api/v1';

export function createPost(props) {
  const request = axios.post(`$(ROOT_URL)/admin/post/create`, props);

  return {
    type: CREATE_POST,
    payload: request
  };
}

export function editPost(props) {
  const request = axios.post(`$(ROOT_URL)/admin/post/${id}/edit`, props);

  return {
    type: EDIT_POST,
    payload: request
  };
}

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
  };
}

export function createCategory() {
  const request = axios.post(`$(ROOT_URL)/admin/category/create`, props);

  return {
      type: CREATE_CATEGORY,
      payload: request
  };
}

export function editCategory() {
  const request = axios.post(`$(ROOT_URL)/admin/category/${id}/edit`, props);

  return {
      type: EDIT_CATEGORY,
      payload: request
  };
}

export function fetchCategories() {
  const request = axios.get(`${ROOT_URL}/categories`);

  return {
    type: FETCH_CATEGORIES,
    payload: request
  };
}