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
      this.props.updateMarkdown(res.payload.data.content);
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
      "content": props.content,
      "publication_status": props.publication_status
    };

    return editPost(data).then((res) => {
      if (res.error) {
        const validation_msg = res.payload.response.data.messages
        throw new SubmissionError({
          title: [validation_msg.title],
          content: [validation_msg.content]
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
              <input type="radio" {...input} value={category.id} defaultChecked={category.id == input.value
                ? "checked"
                : ''}/>
              <span>{category.name}</span>
            </div>
          })}
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
        <button onClick={this.handleDeletePost.bind(this)}>Delete</button>
        <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
          <Field label="Title" name="title" type="text" component={this.renderTitleField} placeholder="Title"/>
          <div>
            <label>Tag</label>
            <div>
              <ReactTags tags={this.props.tags.complete_tags} suggestions={suggestions} handleDelete={this.handleDelete.bind(this)} handleAddition={this.handleAddition.bind(this)} allowNew={true} autofocus={false}/>
            </div>
          </div>
          <Field label="Content" onChange={this.handleUpdateMarkdown.bind(this)} name="content" component={this.renderContentField} placeholder="Content"/>
          <div dangerouslySetInnerHTML={{
            __html: html
          }}></div>
          <Field label="Categories" name="category_id" component={this.renderCategoryField.bind(this)} placeholder="Cateogory"/>
          <Field label="Publication Status" name="publication_status" component={this.renderPublicationStatusField}/>
          <button type="submit">Submit</button>
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
