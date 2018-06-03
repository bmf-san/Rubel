import React, {Component} from "react";
import PropTypes from "prop-types";
import {connect} from "react-redux";
import {fetchConfigs, logoutUser, isLoginUser} from "../actions/index";
import {Link} from "react-router";

class App extends Component {
  componentDidMount() {
    const {fetchConfigs, isLoginUser} = this.props;

    if (!isLoginUser().payload) {
      this.context.router.push("/login");
    }

    fetchConfigs();
  }

  componentDidMount() {
    // Toggle menu
    const burger = document.querySelector(".nav-toggle");
    const menu = document.querySelector(".nav-menu");

    burger.addEventListener("click", () => {
      burger.classList.toggle("is-active");
      menu.classList.toggle("is-active");
    });
  }

  render() {
    const {config, location, children, logoutUser} = this.props;

    return (<div>
      <nav className="nav is-dark has-shadow" id="top">
        <div className="container">
          <div className="nav-left">
            <a className="nav-item" href="/dashboard">
              <h1 className="title">
                {config.title}
              </h1>
            </a>
          </div>
          <span className="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
          </span>
          <div className="nav-right nav-menu is-hidden-tablet">
            <Link to="/dashboard" className={(
                location.pathname == "/dashboard" || location.pathname == "/dashboard/")
                ? "nav-item is-tab active"
                : "nav-item is-tab"}>
              Dashboard
            </Link>
            <Link to="/dashboard/posts" className={(
                location.pathname == "/dashboard/posts")
                ? "nav-item is-tab active"
                : "nav-item is-tab"}>
              Posts
            </Link>
            <Link to="/dashboard/new-post" className={(
                location.pathname == "/dashboard/new-post/")
                ? "nav-item is-tab active"
                : "nav-item is-tab"}>
              NewPost
            </Link>
            <Link to="/dashboard/categories" className={(
                location.pathname == "/dashboard/categories/")
                ? "nav-item is-tab active"
                : "nav-item is-tab"}>
              Categories
            </Link>
            <Link to="/dashboard/tags" className={(
                location.pathname == "/dashboard/tags/")
                ? "nav-item is-tab active"
                : "nav-item is-tab"}>
              Tags
            </Link>
            <Link to="/dashboard/config" className={(
                location.pathname == "/dashboard/config/")
                ? "nav-item is-tab active"
                : "nav-item is-tab"}>
              Config
            </Link>
            <Link to="/login" onClick={logoutUser} className={(
                location.pathname == "/login")
                ? "nav-item is-tab active"
                : "nav-item is-tab"}>
              Logout
            </Link>
          </div>
        </div>
      </nav>
      <div className="columns">
        <aside className="column is-2 aside hero is-fullheight is-hidden-mobile">
          <div>
            <div className="main">
              <div className="title">Main</div>
              <Link to="/dashboard" className={(
                  location.pathname == "/dashboard" || location.pathname == "/dashboard/")
                  ? "item active"
                  : "item"}>
                <span className="icon">
                  <i className="fa fa-tachometer"></i>
                </span>
                <span className="name">Dashboard</span>
              </Link>
              <Link to="/dashboard/posts" className={(
                  location.pathname == "/dashboard/posts")
                  ? "item active"
                  : "item"}>
                <span className="icon">
                  <i className="fa fa-list"></i>
                </span>
                <span className="name">Posts</span>
              </Link>
              <Link to="/dashboard/new-post" className={(
                  location.pathname == "/dashboard/new-post")
                  ? "item active"
                  : "item"}>
                <span className="icon">
                  <i className="fa fa-pencil"></i>
                </span>
                <span className="name">NewPost</span>
              </Link>
              <Link to="/dashboard/categories" className={(
                  location.pathname == "/dashboard/categories")
                  ? "item active"
                  : "item"}>
                <span className="icon">
                  <i className="fa fa-th-list"></i>
                </span>
                <span className="name">Categories</span>
              </Link>
              <Link to="/dashboard/tags" className={(
                  location.pathname == "/dashboard/tags")
                  ? "item active"
                  : "item"}>
                <span className="icon">
                  <i className="fa fa-tags"></i>
                </span>
                <span className="name">Tags</span>
              </Link>
              <Link to="/dashboard/config" className={(
                  location.pathname == "/dashboard/config")
                  ? "item active"
                  : "item"}>
                <span className="icon">
                  <i className="fa fa-cog"></i>
                </span>
                <span className="name">Config</span>
              </Link>
              <Link to="/login" onClick={logoutUser} className={(
                  location.pathname == "/login")
                  ? "item active"
                  : "item"}>
                <span className="icon">
                  <i className="fa fa-sign-out"></i>
                </span>
                <span className="name">Logout</span>
              </Link>
            </div>
          </div>
        </aside>
        <div className="content column is-10">
          {children}
        </div>
      </div>
      <footer className="footer">
        <div className="container">
          <div className="has-text-centered">
            <p>
              <strong>Rubel</strong>
              by bmf. The source code is licensed
              <a href="http://opensource.org/licenses/mit-license.php">MIT</a>.
            </p>
            <p>
              <a className="icon" href="https://twitter.com/bmf_san">
                <i className="fa fa-twitter"></i>
              </a>
              <a className="icon" href="https://github.com/bmf-san">
                <i className="fa fa-github"></i>
              </a>
            </p>
          </div>
        </div>
      </footer>
    </div>);
  }
}

App.propTypes = {
  fetchConfigs: PropTypes.func,
  location: PropTypes.object,
  config: PropTypes.object,
  children: PropTypes.object,
  logoutUser: PropTypes.func,
  isLoginUser: PropTypes.func
};

App.contextTypes = {
  router: PropTypes.object
};

function mapStateToProps(state) {
  const obj = {};

  state.configs.all.map((config) => {
    obj[config.name] = config.value;
  });

  return {configs: state.configs, config: obj};
}

export default connect(mapStateToProps, {fetchConfigs, logoutUser, isLoginUser})(App);
