import React, {Component, PropTypes} from 'react';
import {reduxForm, Field, SubmissionError} from 'redux-form';
import {connect} from 'react-redux';
import {createCategory, deleteCategory, fetchCategories} from '../actions/index';
import {Link} from 'react-router';

const category_id_of_uncategorized = 1

class Categories extends Component {
  componentWillMount() {
    const {fetchCategories} = this.props

    fetchCategories();
  }

  onSubmit(props) {
    const {createCategory, fetchCategories, reset} = this.props;

    return createCategory(props).then((res) => {
      if (res.error) {
        const validation_msg = res.payload.response.data.messages

        throw new SubmissionError({
          name: [validation_msg.name]
        });
      } else {
        reset();
        fetchCategories();
      }
    });
  }

  handleCategoryDelete(props) {
    const {deleteCategory, fetchCategories} = this.props;

    if (window.confirm('Are you sure you want to delete this category?')) {
      // HACK add a error handling
      return deleteCategory(props).then((res) => {
        fetchCategories();
      });
    }
  }

  renderDeleteBtn(id) {
    if (id !== category_id_of_uncategorized) {
      return (
        <div className="control">
          <span className="icon" onClick={this.handleCategoryDelete.bind(this, id)}>
            <i className="fa fa-trash-o"></i>
          </span>
        </div>
      );
    }
  }

  renderCategoryField({
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

  renderCategories() {
    const {categories} = this.props

    return categories.all.map((category) => {
      return (
        <tr key={category.id}>
          <td>
            {category.id}
          </td>
          <td>
            {category.name}
          </td>
          <td>
            {this.renderDeleteBtn(category.id)}
          </td>
        </tr>
      );
    });
  }

  render() {
    const {handleSubmit} = this.props

    return (
      <div>
        <div className="title is-2">Categories</div>
        <div className="columns">
          <form onSubmit={handleSubmit(this.onSubmit.bind(this))} className="column is-half">
            <Field label="Category" name="name" type="text" component={this.renderCategoryField} placeholder="Category Name"/>
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
                {this.renderCategories()}
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
    errors.name = 'Required'
  }

  return errors;
}

const form = reduxForm({form: 'CategoryForm', validate})(Categories)

function mapStateToProps(state) {
  return {categories: state.categories};
}

export default connect(mapStateToProps, {createCategory, deleteCategory, fetchCategories})(form);
