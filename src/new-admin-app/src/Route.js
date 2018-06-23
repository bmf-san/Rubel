import React, {Component} from "react";
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
    return (<React.Fragment>
      <a href={this.props.path} onClick={this.handleClick}>{this.props.text}</a>
    </React.Fragment>);
  }
}

Route.propTypes = {
  handleRoute: propTypes.func,
  path: propTypes.object,
  text: propTypes.object
};

export default Route;
