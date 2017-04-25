import React, {Component, PropTypes} from 'react';
import {reduxForm, Field, SubmissionError} from 'redux-form';
import {connect} from 'react-redux';
import {createTag, editTag, deleteTag, fetchTags} from '../actions/index';
import {Link} from 'react-router';

class Tags extends Component {
  componentWillMount() {
    this.props.fetchTags();
  }

  onSubmit(props) {
    const {createTag, fetchTags, reset} = this.props;

    return createTag(props).then((res) => {
      if (res.error) {
        const validation_msg = res.payload.response.data.messages

        throw new SubmissionError({
          name: [validation_msg.name]
        });
      } else {
        reset();
        fetchTags();
      }
    });
  }

  handleTagDelete(props) {
    const {deleteTag, fetchTags} = this.props;

    if (window.confirm('Are you sure you want to delete this tag?')) {
      // HACK add a error handling
      return deleteTag(props).then((res) => {
        fetchTags();
      });
    }
  }

  renderDeleteBtn(id) {
    return (
      <span className="icon" onClick={this.handleTagDelete.bind(this, id)}>
        <i className="fa fa-trash-o"></i>
      </span>
    )
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
    return (
      <div className="field">
        <label className="label">{label}</label>
        <div className="control">
          <input {...input} placeholder={label} type={type} className={touched && ((error && "input is-danger is-resizeless")) || 'input is-resizeless'}/>{touched && ((error && <span className="help is-danger">{error}</span>))}
        </div>
      </div>
    )
  }

  renderTags() {
    return this.props.tags.all.map((tag) => {
      return (
        <tr key={tag.id}>
          <td>{tag.id}</td>
          <td>{tag.name}</td>
          <td>
            {this.renderDeleteBtn(tag.id)}
          </td>
        </tr>
      );
    });
  }

  render() {
    const {handleSubmit} = this.props

    return (
      <div>
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
      </div>
    );
  }
}

const validate = props => {
  const errors = {}

  if (!props.name) {
    errors.name = 'Requires'
  }

  return errors;
}

const form = reduxForm({form: 'TagForm', validate})(Tags)

function mapStateToProps(state) {
  return {tags: state.tags}
}

export default connect(mapStateToProps, {createTag, editTag, deleteTag, fetchTags})(form);
