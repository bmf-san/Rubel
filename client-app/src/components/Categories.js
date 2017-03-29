import React, {Component, PropTypes} from 'react';
import {reduxForm, Field, SubmissionError} from 'redux-form';
import {connect} from 'react-redux';
import {createCategory, deleteCategory, fetchCategories} from '../actions/index';
import {Link} from 'react-router';

const category_id_of_uncategorized = 1

const validate = props => {
  const errors = {}

  if (!props.name) {
    errors.name = 'Required'
  }

  return errors;
}

const renderNameField = ({
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

class Categories extends Component {
  componentWillMount() {
    this.props.fetchCategories();
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

  handleDelete(props) {
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
        <button onClick={this.handleDelete.bind(this, id)}>DELETE</button>
      );
    }
  }

  renderCategories() {
    return this.props.categories.all.map((category) => {
      return (
        <li key={category.id}>
          <div key={category.id}>
            {category.name}
            {this.renderDeleteBtn(category.id)}
          </div>
        </li>
      );
    });
  }

  render() {
    const {handleSubmit} = this.props

    return (
      <div>
        <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
          <Field name="name" type="text" component={renderNameField} placeholder="Category Name"/>
          <button type="submit">Submit</button>
        </form>
        <ul>
          {this.renderCategories()}
        </ul>
      </div>
    );
  }
}

const form = reduxForm({form: 'CategoryForm', validate})(Categories)

function mapStateToProps(state) {
  return {categories: state.categories};
}

export default connect(mapStateToProps, {createCategory, deleteCategory, fetchCategories})(form);
