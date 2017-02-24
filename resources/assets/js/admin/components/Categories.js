import React, { Component } from 'react';
import { reduxForm } from 'redux-form';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import { createCategory, fetchCategories } from '../actions/index';
import { Link } from 'react-router';

class Categories extends Component {
  onCreateSubmit(props) {
    this.props.createCategory(props)
      .then(() => {
        this.context.router.push('/')
      })
  }

  componentWillMount() {
    this.props.fetchCategories();
  }

  renderCategories() {
    return this.props.categories.map((category) => {
      return (
        <li key={category.id}>
          <p>{category.name}</p>
        </li>
      );
    });
  }

  render() {
    const {fields: {name}, handleCreateSubmit} = this.props;

    return (
      <div>
        <h3>Categories</h3>
        <ul>
          {this.renderCategories()}
        </ul>
        <form onCreateSubmit={handleCreateSubmit(this.onCreateSubmit.bind(this))}>
          <label>Title</label>
          <input type="text" {...name} />
          <button type="submit">Submit</button>
        </form>
      </div>
    )
  }
}

function mapStateToProps(state) {
  return {
    categories: state.categories.all
  };
}

export default reduxForm({
  form: 'CreateCategoryForm',
  fields: ['name']
}, null, {createCategory})(Categories);

export default connect(mapStateToProps, { fetchCategories })(Categories);
