import React, {Component} from 'react';
import {connect} from 'react-redux';
import {bindActionCreators} from 'redux';
import {fetchPosts} from '../actions/index';
import {Link} from 'react-router';

class Posts extends Component {
  componentWillMount() {
    this.props.fetchPosts();
  }

  renderPosts() {
    return this.props.posts.map((post) => {
      let tags = [];

      for (let i in post.tags) {
        tags.push(
          <p key={i}>{post.tags[i].name}</p>
        );
      }

      return (
        <li key={post.id}>
          <Link to={`/edit-post/${post.id}`}>
            <h1>{post.title}</h1>
            <p>{post.publication_date}</p>
            <p>{post.category.name}</p>
            {tags}
          </Link>
        </li>
      );
    });
  }

  render() {
    return (
      <div>
        <h3>Posts</h3>
        <ul>
          {this.renderPosts()}
        </ul>
      </div>
    );
  }
}

function mapStateToProps(state) {
  return {posts: state.posts.all};
}

export default connect(mapStateToProps, {fetchPosts})(Posts);
