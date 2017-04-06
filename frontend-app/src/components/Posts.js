import React, {Component} from 'react';
import {connect} from 'react-redux';
import {bindActionCreators} from 'redux';
import {fetchPosts, deletePost} from '../actions/index';
import {Link} from 'react-router';

class Posts extends Component {
  componentWillMount() {
    const page = this.props.location.query.page;

    this.props.fetchPosts(page);
  }

  componentDidUpdate(prevProps) {
    const page = this.props.location.query.page;

    if (prevProps.location.query.page === page) {
      return false
    }

    this.props.fetchPosts(page);
  }

  handleDeletePost(id) {
    const page = this.props.location.query.page

    if (window.confirm('Are you sure you want to delete?')) {
      return this.props.deletePost(id).then((res) => {
        if (res.error) {
          console.log('Error!');
        } else {
          this.props.fetchPosts(page);
        }
      })
    }
  }

  renderPosts() {
    return this.props.posts.records.map((post) => {
      let tags = [];

      for (let i in post.tags) {
        tags.push(
          <span key={i}>{post.tags[i].name}</span>
        );
      }

      return (
        <li key={post.id}>
          <Link to={`/dashboard/edit-post/${post.id}`}>
            <h1>Title: {post.title}</h1>
          </Link>
          <p>Category: {post.category.name}</p>
          <p>Tags: {tags}</p>
          <p>Status: {post.publication_status}</p>
          <button onClick={() => {
            this.handleDeletePost(post.id)
          }}>Delete</button>
        </li>
      );
    });
  }

  renderPagination() {
    const pagination = this.props.posts.pagination
    const last_page = pagination.last_page
    const current_page = pagination.current_page

    const pages = [];

    for (let i = 1; i <= last_page; i++) {
      pages.push(i == current_page
        ? <li key={i}>
            Current {i}
          </li>
        : <li key={i}>
          <Link to={`/dashboard/posts?page=${i}`}>{i}</Link>
        </li>);
    }

    const prev = () => {
      if (current_page > 1) {
        return (
          <li>
            <Link to={`/dashboard/posts?page=${pagination.current_page - 1}`}>Prev</Link>
          </li>
        )
      }
    }

    const next = () => {
      if (current_page < last_page) {
        return (
          <Link to={`/dashboard/posts?page=${pagination.current_page + 1}`}>Next</Link>
        )
      }
    }

    return (
      <ul>
        {prev()}
        {pages}
        {next()}
      </ul>
    );
  }

  render() {
    return (
      <div>
        <h3>Posts</h3>
        <ul>
          {this.renderPosts()}
          {this.renderPagination()}
        </ul>
      </div>
    );
  }
}

function mapStateToProps(state) {
  return {posts: state.posts};
}

export default connect(mapStateToProps, {fetchPosts, deletePost})(Posts);
