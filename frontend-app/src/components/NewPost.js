import React, {Component, PropTypes} from 'react';
import {reduxForm, Field, SubmissionError} from 'redux-form';
import {connect} from 'react-redux';
import ReactTags from 'react-tag-autocomplete';
import {
  createPost,
  fetchTags,
  suggestionTags,
  deleteCompleteTags,
  addCompleteTags,
  updateMarkdown
} from '../actions/index';
import {Link} from 'react-router';

const validate = props => {
  const errors = {}

  if (!props.title) {
    errors.title = "Required"
  }
  if (!props.content) {
    errors.content = "Required"
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
      <input {...input} placeholder={label} type={type}/>{touched && ((error && <span>{error}</span>))}
    </div>
  </div>
)

const renderContentField = ({
  input,
  label,
  meta: {
    touched,
    error
  }
}) => (
  <div>
    <label>{label}</label>
    <div>
      <textarea {...input} placeholder={label} cols="30" rows="10"></textarea>
      {touched && ((error && <span>{error}</span>))}
    </div>
  </div>
)

const renderPublicationStatusField = ({input, label}) => (
  <div>
    <label>{label}</label>
    <div>
      <select {...input}>
        <option value="draft">Draft</option>
        <option value="private">Private</option>
        <option value="public">Public</option>
      </select>
    </div>
  </div>
)

class NewPost extends Component {
  componentWillMount() {
    this.props.fetchTags();
  }

  onSubmit(props) {
    const {createPost, reset} = this.props;

    // formating the data
    const data = {
      "title": props.title,
      "tag": this.props.tags.complete_tags,
      "category": "Here is category",
      "content": props.content,
      "publication_status": props.publication_status
    };

    console.log(data); // TODO: check request data

    return createPost(props).then((res) => {
      // if (res.error) {
      //   const validation_msg = res.payload.response.data.messages
      //
      //   throw new SubmissionError({
      //     title: [validation_msg.title]
      //   });
      // } else {
      //   reset();
      // }
    })
  }

  handleDelete(index) {
    const {deleteCompleteTags} = this.props;

    deleteCompleteTags(index);
  }

  handleAddition(props) {
    const {addCompleteTags} = this.props;

    addCompleteTags(props);
  }

  handleUpdateMarkdown(e) {
    const {updateMarkdown} = this.props;

    updateMarkdown(e.target.value);
  }

  render() {
    const {handleSubmit} = this.props

    const suggestions = this.props.tags.all.map((tag) => {
      return {id: tag.id, name: tag.name}
    });

    const html = this.props.posts.markdown;

    return (
      <div>
        <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
          <Field label="Title" name="title" type="text" component={renderTitleField} placeholder="Title"/>
          <Field label="Tag" name="title" component={({props, label}) => <div>
            <label>{label}</label>
            <div>
              <ReactTags tags={this.props.tags.complete_tags} suggestions={suggestions} handleDelete={this.handleDelete.bind(this)} handleAddition={this.handleAddition.bind(this)} allowNew={true}/>
            </div>
          </div>}/>
          <Field label="Content" onChange={this.handleUpdateMarkdown.bind(this)} name="content" component={renderContentField} placeholder="Content"/>
          <div dangerouslySetInnerHTML={{
            __html: html
          }}></div>
          <Field label="Publication Status" name="publication_status" component={renderPublicationStatusField}/>
          <button type="submit">Submit</button>
        </form>
      </div>
    );
  }
}

const form = reduxForm({form: 'NewPostForm', validate})(NewPost)

function mapStateToProps(state) {
  return {posts: state.posts, tags: state.tags}
}

export default connect(mapStateToProps, {createPost, fetchTags, deleteCompleteTags, addCompleteTags, updateMarkdown})(form);
