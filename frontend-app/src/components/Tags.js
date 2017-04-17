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
      <span className="icon" onClick={this.handleTagDelete.bind(this, id)}>
        <i className="fa fa-trash-o"></i>
      </span>
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
    return (
      <div>
        <div className="title is-2">Tags</div>
        <div className="column is-one-third">
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
