import React, {Component} from "react";
import PropTypes from "prop-types";

class EditPost extends Component {
  render() {
    return (<div>This is edit post area.ID{this.props.params.id}</div>);
  }
}

export default EditPost;

EditPost.propTypes = {
  params: PropTypes.number
};
