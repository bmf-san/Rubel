import React, {Component, PropTypes} from 'react';
import {reduxForm, Field, SubmissionError} from 'redux-form';
import {connect} from 'react-redux';
import marked from 'marked';
import hljs from 'highlight.js';
import ReactTags from 'react-tag-autocomplete';
import {createPost} from '../actions/index';
import {Link} from 'react-router';

const validate = props => {
  const errors = {}

  if (!props.title) {
    errors.title = "Required"
  }

  return errors;
}

const renderTitleField = ({
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
)

class NewPost extends Component {
  onSubmit(props) {
    const {createCategory, reset} = this.props;

    return createCategory(props).then((res) => {
      if (res.error) {
        const validation_msg = res.payload.response.data.messages

        throw new SubmissionError({
          title: [validation_msg.title]
        });
      } else {
        reset();
      }
    })
  }

  render() {
    const {handleSubmit} = this.props

    return (
      <div>
        <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
          <Field name="title" type="text" component={renderTitleField} placeholder="Title"/>
          <button type="submit">Submit</button>
        </form>
      </div>
    );
  }
}

const form = reduxForm({form: 'NewPostForm', validate})(NewPost)

export default connect(null, {createPost})(form);
