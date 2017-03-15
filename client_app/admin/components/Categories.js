import React, { Component, PropTypes } from 'react';
import { reduxForm, Field, resetForm } from 'redux-form';
import { connect } from 'react-redux';
import { createCategory, fetchCategories } from '../actions/index';
import { Link } from 'react-router';

const validate = values => {
  const errors = {}

  if (!values.name) {
    errors.name = 'Required'
  }

  return errors;
}

const renderField = ({ input, label, type, meta: { touched, error} }) => (
  <div>
    <label>{label}</label>
    <div>
      <input {...input} placeholder={label} type={type}/>
      {touched && ((error && <span>{error}</span>))}
    </div>
  </div>
)

class Categories extends Component {
  onSubmit(props) {
    const { createCategory, reset } = this.props;

    createCategory(props)
      .then((res) => {
        console.log('success');

        // -----
        // TODO:
        // + サーバーサイドのバリデーションの実装
        // + クライアントサイドバリデーションの実装　
        // + 条件分岐をつくる
        // + 条件分岐
        //   success
        //   フォームの値を空にする->finished
        //
        //   error
        //   res.data.messages フォームリクエストのエラーが取れる
        // -----

        reset();
        this.props.fetchCategories();
        this.context.router.push('/admin/dashboard/categories');
      })
      .catch((err) => {
        console.log('error');
      });
  }

  componentWillMount() {
    this.props.fetchCategories();
  }

  renderCategories() {
    return this.props.categories.map((category) => {
      return (
        <li key={category.id}>
          {category.name}
        </li>
      );
    });
  }

  render() {
    const { handleSubmit } = this.props

    return (
      <div>
        <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
          <Field name="name" type="text" component={renderField} placeholder="name"/>
          <button type="submit">Submit</button>
        </form>
        {this.renderCategories()}
      </div>
    );
  }
}

Categories.contextTypes = {
  router: PropTypes.object
}

const form = reduxForm({
  form: 'CategoryForm',
  validate
})(Categories)

function mapStateToProps(state) {
  return {
    categories: state.categories.all
  };
}

export default connect(mapStateToProps, { createCategory, fetchCategories })(form);
