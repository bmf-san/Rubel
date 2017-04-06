import React, {Component} from 'react';
import {connect} from 'react-redux';
import {bindActionCreators} from 'redux';
import {fetchPosts} from '../actions/index';
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

  renderPosts() {
    return this.props.posts.records.map((post) => {
      let tags = [];

      for (let i in post.tags) {
        tags.push(
          <p key={i}>{post.tags[i].name}</p>
        );
      }

      return (
        <li key={post.id}>
          <Link to={`/dashboard/edit-post/${post.id}`}>
            <h1>{post.title}</h1>
          </Link>
          <p>{post.category.name}</p>
          {tags}
        </li>
      );
    });
  }

  renderPagination() {
    const pagination = this.props.posts.pagination

    const pages = [];

    for (let i = 1; i <= pagination.last_page; i++) {
      pages.push(i == pagination.current_page
        ? <li key={i}>
            Current {i}
          </li>
        : <li key={i}>
          <Link to={`/dashboard/posts?page=${i}`}>{i}</Link>
        </li>);
    }

    const prev = () => {
      if (pagination.current_page > 1) {
        return (
          <li>
            <Link to={`/dashboard/posts?page=${pagination.current_page - 1}`}>Prev</Link>
          </li>
        )
      }
    }

    const next = () => {
      if (pagination.current_page < pagination.last_page) {
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

export default connect(mapStateToProps, {fetchPosts})(Posts);
