import React, {Component, PropTypes} from 'react';
import {reduxForm, Field} from 'redux-form';
import {connect} from 'react-redux';
import {editPost, fetchPost} from '../actions/index';
import {Link} from 'react-router';

class EditPost extends Component {
  onSubmit(props) {
    this.props.editPost(props).then(() => {
      // this.context.router.push('/');  // TODO: change this path.
    })
  }

  componentWillMount() {
    this.props.fetchPost(this.props.params.id);
  }

  render() {
    const {post, handleSubmit} = this.props;

    console.log(post.tags.name);

    return (
      <div>
        <Link to="/">Back to Home</Link>
        <h1>{post.title}</h1>
        <p>{post.category}</p>
        <p>{post.content}</p>

        <form onSubmit={handleSubmit(this.onSubmit.bind(this))}>
          <Field name="title" component={title => <div>
            <label>Title</label>
            <input type="text" {...title}/>
          </div>}/>
          <button type="submit">Submit</button>
        </form>
      </div>
    );
  }
}

EditPost.contextTypes = {
  router: PropTypes.object
}

const form = reduxForm({form: 'EditPostForm'})(EditPost)

function mapStateToProps(state) {
  return {post: state.posts.all}
}

export default connect(mapStateToProps, {fetchPost})(form);
