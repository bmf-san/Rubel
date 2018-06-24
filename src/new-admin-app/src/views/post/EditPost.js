import React, {Component} from "react";

class EditPost extends Component {
  render() {
    return (<div>This is edit post area.ID{this.props.params.id}</div>);
  }
}

export default EditPost;
