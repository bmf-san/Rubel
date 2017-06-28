import axios from "axios"
export const LOGIN_USER = "LOGIN_USER"
export const CREATE_POST = "CREATE_POST"
export const DELETE_POST = "DELETE_POST"
export const UPDATE_MARKDOWN = "UPDATE_MARKDOWN"
export const INIT_MARKDOWN = "INIT_MARKDOWN"
export const EDIT_POST = "EDIT_POST"
export const FETCH_POSTS = "FETCH_POSTS"
export const FETCH_POST = "FETCH_POST"
export const FETCH_INIT_POST = "FETCH_INIT_POST"
export const CREATE_CATEGORY = "CREATE_CATEGORY"
export const EDIT_CATEGORY = "EDIT_CATEGORY"
export const DELETE_CATEGORY = "DELETE_CATEGORY"
export const FETCH_CATEGORIES = "FETCH_CATEGORIES"
export const CREATE_TAG = "CREATE_TAG"
export const EDIT_TAG = "EDIT_TAG"
export const DELETE_TAG = "DELETE_TAG"
export const FETCH_TAGS = "FETCH_TAGS"
export const FETCH_COMPLETE_TAGS = "FETCH_COMPLETE_TAGS"
export const INIT_COMPLETE_TAGS = "INIT_COMPLETE_TAGS"
export const DELETE_COMPLETE_TAGS = "DELETE_COMPLETE_TAGS"
export const ADD_COMPLETE_TAGS = "ADD_COMPLETE_TAGS"
export const EDIT_CONFIG = "EDIT_CONFIG"
export const FETCH_CONFIGS = "FETCH_CONFIGS"

const jwtKey = process.env.JWT_KEY
const apiDomain = process.env.API_DOMAIN

const protocol = (process.env.APP_ENV === "production")
	? "https"
	: "http"

const api = axios.create({
	baseURL: `${protocol}://${apiDomain}/v1`,
	timeout: 10000,
	headers: {
		"X-Requested-With": "XMLHttpRequest"
	}
})

export function loginUser(props) {
	const request = api.post("/authenticate", props)

	request.then((res) => {
		const jwt = res.data.token

		localStorage.setItem(`${jwtKey}`, jwt)
	})

	return {type: LOGIN_USER, payload: request}
}

export function createPost(props) {
	const request = api.post("/posts", props)

	return {type: CREATE_POST, payload: request}
}

export function deletePost(id) {
	const request = api.delete(`/posts/${id}`)

	return {type: DELETE_POST, payload: request}
}

export function updateMarkdown(props) {
	return {type: UPDATE_MARKDOWN, payload: props}
}

export function initMarkdown() {
	return {type: INIT_MARKDOWN, payload: null}
}

export function editPost(props) {
	const id = props.id
	const request = api.patch(`/posts/${id}`, props)

	return {type: EDIT_POST, payload: request}
}

export function fetchPosts(page) {
	const request = api.get(`/posts?page=${page}`)

	return {type: FETCH_POSTS, payload: request}
}

export function fetchPost(id) {
	const request = api.get(`/posts/${id}`)

	return {type: FETCH_POST, payload: request}
}

export function fetchInitPost(id) {
	const request = api.get(`/posts/${id}`)

	return {type: FETCH_INIT_POST, payload: request}
}

export function createCategory(props) {
	const request = api.post("/categories", props)

	return {type: CREATE_CATEGORY, payload: request}
}

export function editCategory(props) {
	const request = api.patch(`/categories/${id}`, props)

	return {type: EDIT_CATEGORY, payload: request}
}

export function deleteCategory(props) {
	const post_id = props
	const request = api.delete(`/categories/${post_id}`, props)

	return {type: DELETE_CATEGORY, payload: request}
}

export function fetchCategories() {
	const request = api.get("/categories")

	return {type: FETCH_CATEGORIES, payload: request}
}

export function createTag(props) {
	const request = api.post("/tags", props)

	return {type: CREATE_TAG, payload: request}
}

export function editTag(props) {
	const request = api.patch(`/tags/${id}`, props)

	return {type: EDIT_TAG, payload: request}
}

export function deleteTag(props) {
	const post_id = props
	const request = api.delete(`/tags/${post_id}`, props)

	return {type: DELETE_TAG, payload: request}
}

export function fetchTags() {
	const request = api.get("/tags")

	return {type: FETCH_TAGS, payload: request}
}

export function fetchCompleteTags(id) {
	const request = api.get(`/posts/${id}`)

	return {type: FETCH_COMPLETE_TAGS, payload: request}
}

export function initCompleteTags() {
	return {type: INIT_COMPLETE_TAGS, payload: []}
}

export function deleteCompleteTags(props) {
	return {type: DELETE_COMPLETE_TAGS, payload: props}
}

export function addCompleteTags(props) {
	return {type: ADD_COMPLETE_TAGS, payload: props}
}

export function editConfig(props) {
	const request = api.patch("/configs", props)

	return {type: EDIT_CONFIG, payload: request}
}

export function fetchConfigs(props) {
	const request = api.get("/configs")

	return {type: FETCH_CONFIGS, payload: request}
}
