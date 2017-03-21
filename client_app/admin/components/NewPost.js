import React, {Component, PropTypes} from 'react';
import {reduxForm, Field} from 'redux-form';
import {connect} from 'react-redux';
import marked from 'marked';
import hljs from 'highlight.js';
import ReactTags from 'react-tag-autocomplete';
import {createPost} from '../actions/index';
import {Link} from 'react-router';

const validate = props => {
  const errors = {}

  if (!props.title) {
    erros.title = "Required"
  }

  return errors;
}

const renderInputField = ({
  input,
  label,
  type,
  meta: {
    touched,
    error
  }
}) => (
  <div>
    <label>{label}</label>
    <div>
      <input {...input} placeholder={label} type={type}/> {touched && ((error && <span>{error}</span>))}
    </div>
  </div>
);

class NewPost extends Component {
  onSubmit(props) {
    this.props.createPost(props).then(() => {
      // this.context.router.push('/');  // TODO: change this path
    })
  }

  render() {
    const {handleSubmit} = this.props

    return (
      <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
        <Field name="title" component={title => <div>
          <label>Title</label>
          <input type="text" {...title}/>
        </div>}/>
        <Field name="content" component={content => <div>
          <label>Content</label>
          <input type="text" {...content}/>
        </div>}/>
        <Field name="category" component={category => <div>
          <label>Category</label>
          <input type="text" {...category}/>
        </div>}/>
        <Field name="tag" component={tag => <div>
          <label>Tag</label>
          <input type="text" {...tag}/>
        </div>}/>
        <Field name="publication_status" component={publication_status => <div>
          <label>Publication Status</label>
          <input type="text" {...publication_status}/>
        </div>}/>
        <button type="submit">Submit</button>
      </form>
    );
  }
}

const form = reduxForm({form: 'NewPostForm'})(NewPost)

export default connect(null, {createPost})(form)
