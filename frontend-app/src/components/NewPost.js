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
  fetchCategories,
  updateMarkdown
} from '../actions/index';
import {Link} from 'react-router';

class NewPost extends Component {
  componentWillMount() {
    this.props.fetchTags();
    this.props.fetchCategories();
  }

  onSubmit(props) {
    const {createPost, reset} = this.props;

    const data = {
      "title": props.title,
      "tag": this.props.tags.complete_tags,
      "category_id": props.category,
      "content": props.content,
      "publication_status": props.publication_status
    };

    return createPost(data).then((res) => {
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

  renderTitleField({
    input,
    label,
    type,
    meta: {
      touched,
      error
    }
  }) {
    return (
      <div>
        <label>{label}</label>
        <div>
          <input {...input} placeholder={label} type={type}/>{touched && ((error && <span>{error}</span>))}
        </div>
      </div>
    )
  }

  renderContentField({
    input,
    label,
    meta: {
      touched,
      error
    }
  }) {
    return (
      <div>
        <label>{label}</label>
        <div>
          <textarea {...input} placeholder={label} cols="30" rows="10"></textarea>
          {touched && ((error && <span>{error}</span>))}
        </div>
      </div>
    )
  }

  renderPublicationStatusField({input, label}) {
    return (
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
  }

  renderCategoryField({
    input,
    label,
    meta: {
      touched,
      error
    }
  }) {
    return (
      <div>
        <label>{label}</label>
        <div>
          {this.props.categories.all.map((category) => {
            return <div key={category.id}>
              <input type="radio" {...input} value={category.id}/>
              <span>{category.name}</span>
            </div>
          })}
        </div>
      </div>
    )
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
    })

    const html = this.props.posts.markdown;

    return (
      <div>
        <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
          <Field label="Title" name="title" type="text" component={this.renderTitleField} placeholder="Title"/>
          <ReactTags tags={this.props.tags.complete_tags} suggestions={suggestions} handleDelete={this.handleDelete.bind(this)} handleAddition={this.handleAddition.bind(this)} allowNew={true} autofocus={false}/>
          <Field label="Content" onChange={this.handleUpdateMarkdown.bind(this)} name="content" component={this.renderContentField} placeholder="Content"/>
          <div dangerouslySetInnerHTML={{
            __html: html
          }}></div>
          <Field label="Categories" name="category" component={this.renderCategoryField.bind(this)} placeholder="Cateogory"/>
          <Field label="Publication Status" name="publication_status" component={this.renderPublicationStatusField}/>
          <button type="submit">Submit</button>
        </form>
      </div>
    );
  }
}

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

const form = reduxForm({form: 'NewPostForm', validate})(NewPost)

function mapStateToProps(state) {
  return {
    posts: state.posts,
    tags: state.tags,
    categories: state.categories,
    initialValues: {
      publication_status: 'draft'
    }
  }
}

export default connect(mapStateToProps, {
  createPost,
  fetchTags,
  deleteCompleteTags,
  addCompleteTags,
  fetchCategories,
  updateMarkdown
})(form);
