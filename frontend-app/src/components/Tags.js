import React, {Component} from "react";
import PropTypes from "prop-types";
import {reduxForm, Field, SubmissionError} from "redux-form";
import {connect} from "react-redux";
import {createTag, editTag, deleteTag, fetchTags} from "../actions/index";
import {Link} from "react-router";
import Loader from "../utils/Loader";

class Tags extends Component {
  constructor(props) {
    super(props);
    const {fetchTags} = this.props;

    fetchTags();
  }

  onSubmit(props) {
    const {createTag, fetchTags, reset} = this.props;

    return createTag(props).then((res) => {
      if (res.error) {
        const validation_msg = res.payload.response.data.errors;

        throw new SubmissionError(validation_msg);
      } else {
        reset();
        fetchTags();
      }
    });
  }

  handleTagDelete(props) {
    const {deleteTag, fetchTags} = this.props;

    if (window.confirm("Are you sure you want to delete this tag?")) {
      // HACK add a error handling
      return deleteTag(props).then((res) => {
        fetchTags();
      });
    }
  }

  renderDeleteBtn(id) {
    return (<span className="icon" onClick={this.handleTagDelete.bind(this, id)}>
      <i className="fa fa-trash-o"></i>
    </span>);
  }

  renderTagField({
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
        <input {...input} placeholder={label} type={type} className={touched && ((error && "input is-danger is-resizeless")) || "input is-resizeless"}/>{touched && ((error && <span className="help is-danger">{error}</span>))}
      </div>
    </div>);
  }

  renderTags() {
    const {tags} = this.props;

    return tags.all.map((tag) => {
      return (<tr key={tag.id}>
        <td>{tag.id}</td>
        <td>{tag.name}</td>
        <td>
          {this.renderDeleteBtn(tag.id)}
        </td>
      </tr>);
    });
  }

  render() {
    const {handleSubmit, submitting} = this.props;

    return (<div>
      {
        submitting
          ? <Loader/>
          : null
      }
      <div className="title is-2">Tags</div>
      <div className="columns">
        <form onSubmit={handleSubmit(this.onSubmit.bind(this))} className="column is-half">
          <Field label="Tag" name="name" type="text" component={this.renderTagField} placeholder="Tag Name"/>
          <div className="field is-grouped is-pulled-right">
            <div className="control">
              <button className="button is-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <div className="columns">
        <div className="column is-half">
          <table className="table is-centered">
            <thead>
              <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DELETE</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DELETE</th>
              </tr>
            </tfoot>
            <tbody>
              {this.renderTags()}
            </tbody>
          </table>
        </div>
      </div>
    </div>);
  }
}

Tags.propTypes = {
  fetchTags: PropTypes.func,
  createTag: PropTypes.func,
  reset: PropTypes.func,
  fetchTags: PropTypes.func,
  deleteTag: PropTypes.func,
  tags: PropTypes.object,
  handleSubmit: PropTypes.func,
  submitting: PropTypes.bool
};

const validate = props => {
  const errors = {};

  return errors;
};

const form = reduxForm({form: "TagForm", validate})(Tags);

function mapStateToProps(state) {
  return {tags: state.tags};
}

export default connect(mapStateToProps, {createTag, editTag, deleteTag, fetchTags})(form);
