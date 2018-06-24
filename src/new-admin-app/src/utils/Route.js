import React, {Component, Fragment} from "react";
import PropTypes from "prop-types";

const history = window.history;

class Route extends Component {
  constructor(props) {
    super(props);

    this.handleClick = this.handleClick.bind(this);
  }

  handleClick(event) {
    event.preventDefault();

    const info = {
      "url": event.target.href,
      "path": event.target.pathname
    };

    this.handlePush(info.url);
    this.props.handleRoute(info);
  }

  handlePush(url) {
    history.pushState(null, null, url);
  }

  render() {
    return (<Fragment>
      <a href={this.props.path} onClick={this.handleClick}>{this.props.text}</a>
    </Fragment>);
  }
}

Route.propTypes = {
  handleRoute: PropTypes.func,
  path: PropTypes.string,
  text: PropTypes.string
};

export default Route;
