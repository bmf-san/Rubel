import React, { Component } from 'react';
import { reduxForm, Field } from 'redux-form';
import { connect } from 'react-redux';
import { editTag, fetchTags } from '../actions/index';
import { Link } from 'react-router';

class Tags extends Component {
  onSubmit(props) {
    this.props.editTag(props)
      .then(() => {
        this.content.router.push('/');
      })
  }

  componentWillMount() {
    this.props.fetchTags();
  }

  renderTags() {
    return this.props.tags.map((tag) => {
      return (
        <li key={tag.id}>
          {tag.name}
        </li>
      );
    });
  }

  render() {
    const { handleSubmit } = this.props

    return (
      <div>
        <h3>Tags</h3>
        <ul>
          {this.renderTags()}
        </ul>
        <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
          <Field
            name="name"
            component={name =>
              <div>
                <label>Tag</label>
                <input type="text" {...name} />
              </div>
            }/>
          <button type="submit">Submit</button>
        </form>
      </div>
    );
  }
}

const form = reduxForm({
  form: 'TagForm'
})(Tags)

function mapStateToProps(state) {
  return {
    tags: state.tags.all
  }
}

export default connect(mapStateToProps, { editTag, fetchTags })(form);
