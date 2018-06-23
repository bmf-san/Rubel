import React, {Component} from "react";

class Post extends Component {
  render() {
    return (<div>
      <h1>Post</h1>
      <p>ID{this.props.params.id}</p>
    </div>);
  }
}

Post.propTypes = {
  params: PropTypes.object
};

export default Post;
