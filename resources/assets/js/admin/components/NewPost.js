import React, { Component } from 'react';
import { reduxForm } from 'redux-form';
import { createPost } from '../actions/index';
import { Link } from 'react-router';

class NewPost extends Component {
  onSubmit(props) {
    this.props.createPost(props)
      .then(() => {
        this.context.router.push('/');
      })
  }

  render() {
    const { fields: {title}, handleSubmit } = this.props;

    return (
      <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
        <label>Title</label>
        <input type="text" {...title} />
        <button type="submit">Submit</button>
      </form>
    );
  }
}

export default reduxForm({
  form: 'NewPostForm',
  fields: ['title']
}, null, {createPost})(NewPost);
