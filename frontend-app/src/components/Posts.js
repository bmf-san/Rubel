import React, {Component} from "react"
import PropTypes from "prop-types"
import {connect} from "react-redux"
import {bindActionCreators} from "redux"
import {fetchPosts, deletePost} from "../actions/index"
import {Link} from "react-router"

class Posts extends Component {
	componentWillMount() {
		const {location, fetchPosts} = this.props

		fetchPosts(location.query.page)
	}

	componentDidUpdate(prevProps) {
		const {location, fetchPosts} = this.props

		if (prevProps.location.query.page === location.query.page) {
			return false
		}

		fetchPosts(location.query.page)
	}

	handleDeletePost(id) {
		const {location, deletePost, fetchPosts} = this.props

		if (window.confirm("Are you sure you want to delete?")) {
			return deletePost(id).then((res) => {
				if (res.error) {
					console.log("Error!")
				} else {
					fetchPosts(location.query.page)
				}
			})
		}
	}

	renderPosts() {
		return this.props.posts.records.map((post) => {
			const handleLink = (id) => {
				this.context.router.push(`/dashboard/edit-post/${id}`)
			}

			const isStatus = (status) => {
				if (status == "draft") {
					return <span className="tag is-warning">{status}</span>
				} else if (status == "public") {
					return <span className="tag is-info">{status}</span>
				}
			}

			return (
				<tr key={post.id} onClick={() => {
					handleLink(post.id)
				}}>
					<th>{post.id}</th>
					<td>{post.title}</td>
					<td>{post.category.name}</td>
					<td>
						{isStatus(post.publication_status)}
					</td>
					<td>
						<span className="icon" onClick={(e) => {
							e.stopPropagation()
							e.nativeEvent.stopImmediatePropagation()
							this.handleDeletePost(post.id)
						}}>
							<i className="fa fa-trash-o"></i>
						</span>
					</td>
				</tr>
			)
		})
	}

	renderPagination() {
		const {posts} = this.props

		const pagination = posts.pagination
		const last_page = pagination.last_page
		const current_page = pagination.current_page

		const pages = []

		for (let i = 1; i <= last_page; i++) {
			pages.push(i == current_page
				? <li key={i}>
					<Link to={`/dashboard/posts?page=${i}`} className="pagination-link is-current">{i}</Link>
				</li>
				: <li key={i}>
					<Link to={`/dashboard/posts?page=${i}`} className="pagination-link">{i}</Link>
				</li>)
		}

		const prev = () => {
			if (current_page > 1) {
				return (
					<Link to={`/dashboard/posts?page=${pagination.current_page - 1}`} className="pagination-previous is-hidden-mobile">Prev</Link>
				)
			} else {
				return (
					<a className="pagination-previous is-hidden-mobile" disabled>Prev</a>
				)
			}
		}

		const next = () => {
			if (current_page < last_page) {
				return (
					<Link to={`/dashboard/posts?page=${pagination.current_page + 1}`} className="pagination-next is-hidden-mobile">Next</Link>
				)
			} else {
				return (
					<a className="pagination-next is-hidden-mobile" disabled>Next</a>
				)
			}
		}

		return (
			<nav className="pagination is-centered">
				{prev()}
				{next()}
				<ul className="pagination-list">
					{pages}
				</ul>
			</nav>
		)
	}

	render() {
		return (
			<div>
				<div className="title is-2">Posts</div>
				<table className="table is-centered">
					<thead>
						<tr>
							<th>ID</th>
							<th>TITLE</th>
							<th>CATEGORIES</th>
							<th>STATUS</th>
							<th>DELETE</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>TITLE</th>
							<th>CATEGORIES</th>
							<th>STATUS</th>
							<th>DELETE</th>
						</tr>
					</tfoot>
					<tbody>
						{this.renderPosts()}
					</tbody>
				</table>
				{this.renderPagination()}
			</div>
		)
	}
}

Posts.propTypes = {
	location: PropTypes.object,
	fetchPosts: PropTypes.func,
	deletePost: PropTypes.func,
	posts: PropTypes.object,
	pagination: PropTypes.object,
	last_page: PropTypes.object,
	current_page: PropTypes.object
}

Posts.contextTypes = {
	router: PropTypes.object
}

function mapStateToProps(state) {
	return {posts: state.posts}
}

export default connect(mapStateToProps, {fetchPosts, deletePost})(Posts)
