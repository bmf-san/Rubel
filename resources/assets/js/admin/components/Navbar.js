import React from 'react';
import { Link } from 'react-router';

export default class Navbar extends React.Component {
  render() {
    return (
      <div>
        <ul>
          <li><Link to="/admin/dashboard">Home</Link></li>
          <li><Link to="/admin/dashboard/posts">Posts</Link></li>
          <li><Link to="/admin/dashboard/new-post">NewPost</Link></li>
          <li><Link to="/admin/dashboard/categories">Categories</Link></li>
          <li><Link to="/admin/dashboard/tags">Tags</Link></li>
          <li><Link to="/admin/dashboard/config">Config</Link></li>
        </ul>
      </div>
    )
  }
}
