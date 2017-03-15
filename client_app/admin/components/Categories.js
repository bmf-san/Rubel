import React, { Component, PropTypes } from 'react';
import { reduxForm, Field } from 'redux-form';
import { connect } from 'react-redux';
import { createCategory, fetchCategories } from '../actions/index';
import { Link } from 'react-router';

class Categories extends Component {
  onSubmit(props) {
    this.props.createCategory(props)
      .then((res) => {

        console.log('success');
        // -----
        // TODO:
        // + クライアントサイドバリデーションの実装　
        // + 条件分岐をつくる
        // + 条件分岐
        //   success
        //   フォームの値を空にする
        //
        //   error
        //   res.data.messages フォームリクエストのエラーが取れる
        // -----

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
          <Field name="name" component="input" type="text" placeholder="Category Name"/>
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
  form: 'CategoryForm'
})(Categories)

function mapStateToProps(state) {
  return {
    categories: state.categories.all
  };
}

export default connect(mapStateToProps, { createCategory, fetchCategories })(form);
