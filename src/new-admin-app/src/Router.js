import React, {Component} from "react";
import toRegex from "path-to-regexp";

class Router extends Component {
  handleComponent() {
    const routes = this.props.routes;
    const info = this.props.info;

    for (const route of routes) {
      const keys = [];
      const string = new String(route.path);
      const pattern = toRegex(string, keys);
      const match = pattern.exec(info.path);

      if (!match) {
        continue;
      }

      const params = Object.create(null);
      for (let i = 1; i < match.length; i++) {
        params[keys[i - 1].name] = match[i] !== undefined
          ? match[i]
          : undefined;
      }

      if (match) {
        return route.action(Object.assign(info, {"params": params}));
      }
    }

    return "Not Found";
  }

  render() {
    return (this.handleComponent());
  }
}

Router.propTypes = {
  routes: PropTypes.object,
  info: PropTypes.object
};

export default Router;
