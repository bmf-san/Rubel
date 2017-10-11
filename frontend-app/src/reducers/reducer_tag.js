import { FETCH_TAGS, FETCH_COMPLETE_TAGS, INIT_COMPLETE_TAGS, DELETE_COMPLETE_TAGS, ADD_COMPLETE_TAGS } from "../actions/index"

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
		}

	case FETCH_COMPLETE_TAGS:
		return {
			...state,
			complete_tags: action.payload.data.tags
		}

	case INIT_COMPLETE_TAGS:
		return {
			...state,
			complete_tags: []
		}

	case DELETE_COMPLETE_TAGS:
		state.complete_tags.splice(action.payload, 1)

		return {
			...state,
			complete_tags: state.complete_tags
		}

	case ADD_COMPLETE_TAGS:
		state.complete_tags.push(action.payload)

		return {
			...state,
			complete_tags: state.complete_tags
		}

	default:
		return state
	}
}
