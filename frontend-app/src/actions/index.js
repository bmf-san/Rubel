import axios from 'axios';

export const CREATE_POST = "CREATE_POST";
export const DELETE_POST = "DELETE_POST";
export const UPDATE_MARKDOWN = "UPDATE_MARKDOWN";
export const INIT_MARKDOWN = "INIT_MARKDOWN";
export const EDIT_POST = "EDIT_POST";
export const FETCH_POSTS = "FETCH_POSTS";
export const FETCH_POST = "FETCH_POST";
export const FETCH_INIT_POST = "FETCH_INIT_POST";
export const CREATE_CATEGORY = "CREATE_CATEGORY";
export const EDIT_CATEGORY = "EDIT_CATEGORY";
export const DELETE_CATEGORY = "DELETE_CATEGORY";
export const FETCH_CATEGORIES = "FETCH_CATEGORIES";
export const EDIT_TAG = "EDIT_TAG";
export const DELETE_TAG = "DELETE_TAG";
export const FETCH_TAGS = "FETCH_TAGS";
export const FETCH_COMPLETE_TAGS = "FETCH_COMPLETE_TAGS";
export const INIT_COMPLETE_TAGS = "INIT_COMPLETE_TAGS";
export const DELETE_COMPLETE_TAGS = "DELETE_COMPLETE_TAGS";
export const ADD_COMPLETE_TAGS = "ADD_COMPLETE_TAGS";

const ROOT_URL = '/api/v1';

export function createPost(props) {
  const request = axios.post(`${ROOT_URL}/admin/post/create`, props);

  return {type: CREATE_POST, payload: request};
}

export function deletePost(id) {
  const request = axios.post(`${ROOT_URL}/admin/post/${id}/delete`);

  return {type: DELETE_POST, payload: request};
}

export function updateMarkdown(props) {
  return {type: UPDATE_MARKDOWN, payload: props};
}

export function initMarkdown() {
  return {type: INIT_MARKDOWN, payload: null};
}

export function editPost(props) {
  const id = props.id
  const request = axios.post(`${ROOT_URL}/admin/post/${id}/edit`, props);

  return {type: EDIT_POST, payload: request};
}

export function fetchPosts(page) {
  const request = axios.get(`${ROOT_URL}/posts?page=${page}`);

  return {type: FETCH_POSTS, payload: request};
}

export function fetchPost(id) {
  const request = axios.get(`${ROOT_URL}/post/${id}`);

  return {type: FETCH_POST, payload: request};
}

export function fetchInitPost(id) {
  const request = axios.get(`${ROOT_URL}/post/${id}`);

  return {type: FETCH_INIT_POST, payload: request};
}

export function createCategory(props) {
  const request = axios.post(`${ROOT_URL}/admin/category/create`, props);

  return {type: CREATE_CATEGORY, payload: request};
}

export function editCategory(props) {
  const request = axios.post(`${ROOT_URL}/admin/category/${id}/edit`, props);

  return {type: EDIT_CATEGORY, payload: request};
}

export function deleteCategory(props) {
  const post_id = props;
  const request = axios.post(`${ROOT_URL}/admin/category/${post_id}/delete`, props);

  return {type: DELETE_CATEGORY, payload: request};
}

export function fetchCategories() {
  const request = axios.get(`${ROOT_URL}/categories`);

  return {type: FETCH_CATEGORIES, payload: request};
}

export function editTag(props) {
  const request = axios.post(`${ROOT_URL}/tag/${id}/edit`, props);

  return {type: EDIT_TAG, payload: request}
}

export function deleteTag(props) {
  const post_id = props;
  const request = axios.post(`${ROOT_URL}/admin/tag/${post_id}/delete`, props);

  return {type: DELETE_TAG, payload: request};
}

export function fetchTags() {
  const request = axios.get(`${ROOT_URL}/tags`);

  return {type: FETCH_TAGS, payload: request}
}

export function fetchCompleteTags(id) {
  const request = axios.get(`${ROOT_URL}/post/${id}`);

  return {type: FETCH_COMPLETE_TAGS, payload: request};
}

export function initCompleteTags() {
  return {type: INIT_COMPLETE_TAGS, payload: []};
}

export function deleteCompleteTags(props) {
  return {type: DELETE_COMPLETE_TAGS, payload: props}
}

export function addCompleteTags(props) {
  return {type: ADD_COMPLETE_TAGS, payload: props}
}
