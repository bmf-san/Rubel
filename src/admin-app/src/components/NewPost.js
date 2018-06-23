import React, {Component} from "react";
import PropTypes from "prop-types";
import {reduxForm, Field, SubmissionError} from "redux-form";
import {connect} from "react-redux";
import ReactTags from "react-tag-autocomplete";
import {
  createPost,
  fetchTags,
  suggestionTags,
  deleteCompleteTags,
  addCompleteTags,
  fetchCategories,
  updateMarkdown,
  initMarkdown,
  initCompleteTags
} from "../actions/index";
import {Link} from "react-router";
import Loader from "../utils/Loader";

class NewPost extends Component {
  componentDidMount() {
    const {fetchTags, fetchCategories, initCompleteTags, initMarkdown} = this.props;

    fetchTags();
    fetchCategories();
    initCompleteTags();
    initMarkdown();
  }

  onSubmit(props) {
    const {tags, posts, createPost, deleteCompleteTags, reset} = this.props;

    const data = {
      "title": props.title,
      "tags": tags.complete_tags,
      "category_id": props.category_id,
      "md_content": props.md_content,
      "html_content": posts.markdown,
      "publication_status": props.publication_status
    };

    return createPost(data).then((res) => {
      if (res.error) {
        const validation_msg = res.payload.response.data.errors;

        throw new SubmissionError(validation_msg);
      } else {
        const id = res.payload.data.id;

        this.context.router.push(`/dashboard/edit-post/${id}`);
      }
    });
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
    return (<div className="field">
      <label className="label">{label}</label>
      <div className="control">
        <input {...input} placeholder={label} type={type} className={touched && ((error && "input is-danger")) || "input"}/>{touched && ((error && <span className="help is-danger">{error}</span>))}
      </div>
    </div>);
  }

  renderCategoryField({
    input,
    label,
    meta: {
      touched,
      error
    }
  }) {
    return (<div className="field">
      <label className="label">{label}</label>
      <div className="control">
        <span className="select">
          <select {...input}>
            {
              this.props.categories.all.map((category) => {
                return <option key={category.id} value={category.id}>{category.name}</option>;
              })
            }
          </select>
        </span>
      </div>
    </div>);
  }

  renderMarkdownField() {
    const {posts} = this.props;

    return (<div className="content markdown-area" dangerouslySetInnerHTML={{
        __html: posts.markdown
      }}></div>);
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
    return (<div className="field">
      <label className="label">{label}</label>
      <div className="control">
        <div className="columns">
          <div className="column is-overflow">
            <textarea {...input} placeholder={label} className={touched && ((error && "input is-danger is-resizeless markdown-area")) || "input is-resizeless markdown-area"}></textarea>{touched && ((error && <span className="help is-danger">{error}</span>))}
          </div>
          <div className="column is-overflow">
            {markdownField}
          </div>
        </div>
      </div>
    </div>);
  }

  renderSubmitBtnField({input}) {
    return (<div className="field is-grouped is-pulled-right">
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
    </div>);
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
    const {tags, handleSubmit, submitting} = this.props;

    const suggestions = tags.all.map((tag) => {
      return {id: tag.id, name: tag.name};
    });

    return (<div>
      {
        submitting
          ? <Loader/>
          : null
      }
      <div className="title is-2">New Post</div>
      <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
        <Field label="Title" name="title" type="text" component={this.renderTitleField} placeholder="Title"/>
        <Field label="Categories" name="category_id" component={this.renderCategoryField.bind(this)} placeholder="Cateogory"/>
        <div className="field">
          <label className="label">Tag</label>
          <div className="control">
            <ReactTags tags={tags.complete_tags} suggestions={suggestions} handleDelete={this.handleDelete.bind(this)} handleAddition={this.handleAddition.bind(this)} allowNew={true} autofocus={false} placeholder="Tags"/>
          </div>
        </div>
        <Field label="Content" onChange={this.handleUpdateMarkdown.bind(this)} name="md_content" component={this.renderContentField} placeholder="Content" markdownField={this.renderMarkdownField()}/>
        <Field name="publication_status" component={this.renderSubmitBtnField}/>
      </form>
    </div>);
  }
}

NewPost.propTypes = {
  fetchTags: PropTypes.func,
  fetchCategories: PropTypes.func,
  initCompleteTags: PropTypes.func,
  initMarkdown: PropTypes.func,
  categories: PropTypes.object,
  tags: PropTypes.object,
  posts: PropTypes.object,
  createPost: PropTypes.func,
  reset: PropTypes.func,
  data: PropTypes.object,
  deleteCompleteTags: PropTypes.func,
  addCompleteTags: PropTypes.func,
  updateMarkdown: PropTypes.func,
  handleSubmit: PropTypes.func,
  submitting: PropTypes.bool
};

NewPost.contextTypes = {
  router: PropTypes.object
};

const validate = props => {
  const errors = {};

  return errors;
};

const form = reduxForm({form: "NewPostForm", validate})(NewPost);

function mapStateToProps(state) {
  return {
    posts: state.posts,
    tags: state.tags,
    categories: state.categories,
    initialValues: {
      category_id: 1,
      publication_status: "draft"
    }
  };
}

export default connect(mapStateToProps, {
  createPost,
  fetchTags,
  deleteCompleteTags,
  addCompleteTags,
  fetchCategories,
  updateMarkdown,
  initMarkdown,
  initCompleteTags
})(form);
