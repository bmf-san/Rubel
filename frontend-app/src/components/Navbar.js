import React from 'react';
import {Link} from 'react-router';

export default class Navbar extends React.Component {
  render() {
    return (
      <div>
        <ul>
          <li>
            <Link to="/dashboard">Home</Link>
          </li>
          <li>
            <Link to="/dashboard/posts">Posts</Link>
          </li>
          <li>
            <Link to="/dashboard/new-post">NewPost</Link>
          </li>
          <li>
            <Link to="/dashboard/categories">Categories</Link>
          </li>
          <li>
            <Link to="/dashboard/tags">Tags</Link>
          </li>
          <li>
            <Link to="/dashboard/config">Config</Link>
          </li>
        </ul>
      </div>
    )
  }
}
