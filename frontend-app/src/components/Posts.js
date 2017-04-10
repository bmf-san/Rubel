import React, {Component, PropTypes} from 'react';
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

      const handleLink = (id) => {
        this.context.router.push(`/dashboard/edit-post/${id}`);
      }

      return (
        <tr key={post.id} onClick={() => {
          handleLink(post.id);
        }}>
          <th>{post.id}</th>
          <td>{post.title}</td>
          <td>{post.category.name}</td>
          <td>{tags}</td>
          <td>{post.publication_status}</td>
          <td>
            <button onClick={(e) => {
              e.stopPropagation();
              e.nativeEvent.stopImmediatePropagation();
              this.handleDeletePost(post.id);
            }}>Delete</button>
          </td>
        </tr>
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
            <Link to={`/dashboard/posts?page=${i}`} className="pagination-link is-current">{i}</Link>
          </li>
        : <li key={i}>
          <Link to={`/dashboard/posts?page=${i}`} className="pagination-link">{i}</Link>
        </li>);
    }

    const prev = () => {
      if (current_page > 1) {
        return (
          <Link to={`/dashboard/posts?page=${pagination.current_page - 1}`} className="pagination-previous">Prev</Link>
        )
      }
    }

    const next = () => {
      if (current_page < last_page) {
        return (
          <Link to={`/dashboard/posts?page=${pagination.current_page + 1}`} className="pagination-next">Next</Link>
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
    );
  }

  render() {
    return (
      <section className="section">
        <div className="container">
          <div className="heading">
            <h1 className="title">Posts</h1>
            <h2 className="subtitle">
              Here is perfomance infomation.
            </h2>
          </div>
        </div>
        <table className="table is-centered">
          <thead>
            <tr>
              <th>ID</th>
              <th>TITLE</th>
              <th>CATEGORIES</th>
              <th>TAGS</th>
              <th>STATUS</th>
              <th>DELETE</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>TITLE</th>
              <th>CATEGORIES</th>
              <th>TAGS</th>
              <th>STATUS</th>
              <th>DELETE</th>
            </tr>
          </tfoot>
          <tbody>
            {this.renderPosts()}
          </tbody>
        </table>
        {this.renderPagination()}
      </section>
    );
  }
}

Posts.contextTypes = {
  router: PropTypes.object
}

function mapStateToProps(state) {
  return {posts: state.posts};
}

export default connect(mapStateToProps, {fetchPosts, deletePost})(Posts);
