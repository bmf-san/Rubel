import React, { Component, PropTypes } from 'react';
import { reduxForm } from 'redux-form';
import { connect } from 'react-redux';
import { editTag, fetchTags } from '../actions/index';
import { Link } from 'react-router';

class Tags extends Component {
  onSubmit(props) {
    this.props.editTag(props)
      .then(() => {
        this.context.router.push('/')
      })
  }

  componentWillMount() {
    this.props.fetchTags();
  }

  renderTags() {
    return this.props.tags.map((tag) => {
      return (
        <li key={tag.id}>
          <p>{tag.name}</p>
        </li>
      );
    });
  }

  render() {
    const { fields: {name}, handleSubmit } = this.props;

    return (
      <div>
        <h3>Tags</h3>
        <ul>
          {this.renderTags()}
        </ul>
        <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
          <label>Title</label>
          <input type="text" {...name} />
          <button type="submit">Submit</button>
        </form>
      </div>
    );
  }
}

function mapStateToProps(state) {
  return {
    tags: state.tags.all
  }
}

Tags = reduxForm({
  form: 'EditTagForm',
  fields: ['name']
}, null, {editTag})(Tags);

Tags = connect(mapStateToProps, { fetchTags })(Tags);

export default Tags;
