import React, {Component} from "react";
import PropTypes from "prop-types";

class EditTag extends Component {
  render() {
    return (<div>This is edit tag area. ID{this.props.params.id}</div>);
  }
}

export default EditTag;

EditTag.propTypes = {
  params: PropTypes.number
};
