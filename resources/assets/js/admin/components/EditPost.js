import React, { Component, PropTypes } from 'react';
import { connect } from 'react-redux';
import { fetchPost } from '../actions/index';
import { Link } from 'react-router';

class EditPost extends Component {
  componentWillMount() {
    this.props.fetchPost(this.props.params.id);
  }

  render() {
    const {post} = this.props;

    if (!post) {
      return <div>loading...</div>;
    }

    console.log(post.tags.name);

    return (
      <div>
        <Link to="/">Back to Home</Link>
        <h1>{post.title}</h1>
        <p>{post.category}</p>
        <p>{post.content}</p>
      </div>
    );
  }
}

function mapStateToProps(state) {
  return {post: state.posts.post}
}

export default connect(mapStateToProps, {fetchPost})(EditPost);
