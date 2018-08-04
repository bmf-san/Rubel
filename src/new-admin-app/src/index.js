import React, {Component, Fragment} from "react";
import ReactDOM from "react-dom";
import Router from "./utils/Router";
import Route from "./utils/Route";
import {routes} from "./routes";

class App extends Component {
  constructor(props) {
    super(props);

    this.state = {
      "url": "",
      "path": ""
    };

    this.handleRoute = this.handleRoute.bind(this);
  }

  handleRoute(info) {
    this.setState(info);
  }

  render() {
    return (<Fragment>
      <p>Current URL: {this.state.url}</p>
      <p>Current Path: {this.state.path}</p>
      {/* Navigation */}
      <ul>
        <li>
          <Route path="/login" text="Login" handleRoute={this.handleRoute}/>
        </li>
        <li>
          <Route path="/dashboard" text="Dashboard" handleRoute={this.handleRoute}/>
        </li>
        <li>
          <Route path="/posts" text="Posts" handleRoute={this.handleRoute}/>
        </li>
        <li>
          <Route path="/posts/create" text="Create Post" handleRoute={this.handleRoute}/>
        </li>
        <li>
          <Route path="/post/9/edit" text="Edit Post" handleRoute={this.handleRoute}/>
        </li>
        <li>
          <Route path="/categories" text="Categories" handleRoute={this.handleRoute}/>
        </li>
        <li>
          <Route path="/categories/create" text="Create Category" handleRoute={this.handleRoute}/>
        </li>
        <li>
          <Route path="/categories/1/edit" text="Edit Category" handleRoute={this.handleRoute}/>
        </li>
        <li>
          <Route path="/tags" text="Tags" handleRoute={this.handleRoute}/>
        </li>
        <li>
          <Route path="/tags/create" text="Create Tag" handleRoute={this.handleRoute}/>
        </li>
        <li>
          <Route path="/tags/1/edit" text="Edit Tag" handleRoute={this.handleRoute}/>
        </li>
        <li>
          <Route path="/settings" text="Settings" handleRoute={this.handleRoute}/>
        </li>
        <li>
          <Route path="/settings/create" text="Create Setting" handleRoute={this.handleRoute}/>
        </li>
        <li>
          <Route path="/settings/1/edit" text="Edit Setting" handleRoute={this.handleRoute}/>
        </li>
      </ul>
      {/* Router Component */}
      <Router routes={routes} info={this.state}/>
    </Fragment>);
  }
}

ReactDOM.render(<App/>, document.getElementById("root"));
