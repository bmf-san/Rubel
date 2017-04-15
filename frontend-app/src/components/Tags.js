import React, {Component, PropTypes} from 'react';
import {reduxForm, Field} from 'redux-form';
import {connect} from 'react-redux';
import {editTag, deleteTag, fetchTags} from '../actions/index';
import {Link} from 'react-router';

class Tags extends Component {
  handleTagDelete(props) {
    const {deleteTag, fetchTags} = this.props;

    if (window.confirm('Are you sure you want to delete this tag?')) {
      // HACK add a error handling
      return deleteTag(props).then((res) => {
        fetchTags();
      });
    }
  }

  componentWillMount() {
    this.props.fetchTags();
  }

  renderDeleteBtn(id) {
    return (
      <button onClick={this.handleTagDelete.bind(this, id)}>DELETE</button>
    )
  }

  renderTags() {
    return this.props.tags.all.map((tag) => {
      return (
        <li key={tag.id}>
          <div key={tag.id}>
            {tag.name}
            {this.renderDeleteBtn(tag.id)}
          </div>
        </li>
      );
    });
  }

  render() {
    return (
      <div>
        <div className="title is-2">Tags</div>
        {this.renderTags()}
      </div>
    );
  }
}

Tags.contextTypes = {
  router: PropTypes.object
}

function mapStateToProps(state) {
  return {tags: state.tags}
}

export default connect(mapStateToProps, {editTag, deleteTag, fetchTags})(Tags);
