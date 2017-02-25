import React, { Component } from 'react';
import { reduxForm, Field } from 'redux-form';
import { connect } from 'react-redux';
import { createPost } from '../actions/index';
import { Link } from 'react-router';

class NewPost extends Component {
  onSubmit(props) {
    this.props.createPost(props)
      .then(() => {
        this.content.router.push('/');
      })
  }

  render() {
    const { handleSubmit } = this.props

    return (
      <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
        <Field
          name="title"
          component={title =>
            <div>
              <label>Title</label>
              <input type="text" {...title} />
            </div>
          }/>
        <button type="submit">Submit</button>
      </form>
    );
  }
}

const form = reduxForm({
  form: 'NewPostForm'
})(NewPost)

export default connect(null, { createPost })(form)
