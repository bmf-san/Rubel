import React, {Component} from "react";
import PropTypes from "prop-types";

class EditSetting extends Component {
  render() {
    return (<div>This is edit tag area. ID{this.props.params.id}</div>);
  }
}

export default EditSetting;

EditSetting.propTypes = {
  params: PropTypes.number
};
