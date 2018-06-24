import React, {Component} from "react";

class EditTag extends Component {
  render() {
    return (<div>This is edit tag area. ID{this.props.params.id}</div>);
  }
}

export default EditTag;
