import React, {Component} from "react";
import PropTypes from "prop-types";

class EditCategory extends Component {
  render() {
    return (<div>This is edit category area.ID{this.props.params.id}</div>);
  }
}

export default EditCategory;

EditCategory.propTypes = {
  params: PropTypes.number
};
