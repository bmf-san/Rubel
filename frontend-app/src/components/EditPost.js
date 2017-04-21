import React, {Component, PropTypes} from 'react';
import {reduxForm, Field, SubmissionError} from 'redux-form';
import {connect} from 'react-redux';
import ReactTags from 'react-tag-autocomplete';
import {
  editPost,
  deletePost,
  fetchPost,
  fetchInitPost,
  fetchTags,
  fetchCompleteTags,
  suggestionTags,
  deleteCompleteTags,
  addCompleteTags,
  fetchCategories,
  updateMarkdown
} from '../actions/index';
import {Link} from 'react-router';

class EditPost extends Component {
  componentWillMount() {
    const {initialize, formValues, filtersDefaults} = this.props;
    formValues === undefined && initialize(filtersDefaults);

    const id = this.props.params.id

    this.props.fetchPost(id).then((res) => {
      this.props.updateMarkdown(res.payload.data.md_content);
    });
    this.props.fetchInitPost(id)
    this.props.fetchTags();
    this.props.fetchCompleteTags(id);
    this.props.fetchCategories();
  }

  onSubmit(props) {
    const {editPost, deleteCompleteTags, reset} = this.props;

    const data = {
      "id": this.props.params.id,
      "title": props.title,
      "tags": this.props.tags.complete_tags,
      "category_id": props.category_id,
      "md_content": props.md_content,
      "html_content": this.props.posts.markdown,
      "publication_status": props.publication_status
    };

    return editPost(data).then((res) => {
      if (res.error) {
        const validation_msg = res.payload.response.data.messages
        throw new SubmissionError({
          title: [validation_msg.title],
          md_content: [validation_msg.md_content]
        });
      } else {
        const id = res.payload.data.id
        this.context.router.push(`/dashboard/edit-post/${id}`);
      }
    })
  }

  handleDeletePost() {
    const id = this.props.params.id

    if (window.confirm('Are you sure you want to delete?')) {
      return this.props.deletePost(id).then((res) => {
        if (res.error) {
          console.log('Error!');
        } else {
          this.context.router.push(`/dashboard/posts`);
        }
      })
    }
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
      <div className="field">
        <label className="label">{label}</label>
        <div className="control">
          <input {...input} placeholder={label} type={type} className={touched && ((error && "input is-danger")) || 'input'}/>{touched && ((error && <span className="help is-danger">{error}</span>))}
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
      <div className="field">
        <label className="label">{label}</label>
        <div className="control">
          <span className="select">
            <select {...input}>
              {this.props.categories.all.map((category) => {
                return <option key={category.id} value={category.id}>{category.name}</option>
              })}
            </select>
          </span>
        </div>
      </div>
    )
  }

  renderMarkdownField() {
    const html = this.props.posts.markdown

    return (
      <div className="content markdown-area" dangerouslySetInnerHTML={{
        __html: html
      }}></div>
    )
  }

  renderContentField({
    input,
    label,
    markdownField,
    meta: {
      touched,
      error
    }
  }) {
    return (
      <div className="field">
        <label className="label">{label}</label>
        <div className="control">
          <div className="columns">
            <div className="column is-overflow">
              <textarea {...input} placeholder={label} className={touched && ((error && "input is-danger is-resizeless markdown-area")) || 'input is-resizeless markdown-area'}></textarea>{touched && ((error && <span className="help is-danger">{error}</span>))}
            </div>
            <div className="column">
              {markdownField}
            </div>
          </div>
        </div>
      </div>
    )
  }

  renderSubmitBtnField({input, handleDeletePost}) {
    return (
      <div className="field">
        <div className="field is-grouped is-pulled-left">
          <div className="control">
            <button className="button is-danger" onClick={handleDeletePost}>Delete</button>
          </div>
        </div>
        <div className="field is-grouped is-pulled-right">
          <div className="control">
            <span className="select">
              <select {...input}>
                <option value="draft">Draft</option>
                <option value="public">Public</option>
              </select>
            </span>
          </div>
          <div className="control">
            <button className="button is-primary">Submit</button>
          </div>
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

    return (
      <div>
        <div className="title is-2">Edit Post</div>
        <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
          <Field label="Title" name="title" type="text" component={this.renderTitleField} placeholder="Title"/>
          <Field label="Categories" name="category_id" component={this.renderCategoryField.bind(this)} placeholder="Cateogory"/>
          <div>
            <label className="label">Tag</label>
            <div>
              <ReactTags tags={this.props.tags.complete_tags} suggestions={suggestions} handleDelete={this.handleDelete.bind(this)} handleAddition={this.handleAddition.bind(this)} allowNew={true} autofocus={false} placeholder="Tags"/>
            </div>
          </div>
          <Field label="Content" onChange={this.handleUpdateMarkdown.bind(this)} name="md_content" component={this.renderContentField} placeholder="Content" markdownField={this.renderMarkdownField()}/>
          <Field name="publication_status" component={this.renderSubmitBtnField} handleDeletePost={this.handleDeletePost.bind(this)}/>
        </form>
      </div>
    )
  }
}

EditPost.contextTypes = {
  router: PropTypes.object
}

const validate = props => {
  const errors = {}

  return errors;
}

const form = reduxForm({form: 'NewPostForm', validate})(EditPost)

function mapStateToProps(state) {
  return {posts: state.posts, tags: state.tags, categories: state.categories, initialValues: state.posts.init_post}
}

export default connect(mapStateToProps, {
  editPost,
  deletePost,
  fetchPost,
  fetchInitPost,
  fetchTags,
  fetchCompleteTags,
  deleteCompleteTags,
  addCompleteTags,
  fetchCategories,
  updateMarkdown
})(form);
