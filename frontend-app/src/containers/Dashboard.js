import React from 'react';

export default class Dashboard extends React.Component {
  render() {
    return (
      <section className="hero is-small">
        <div className="hero-body">
          <div className="container">
            <h1 className="title">
              Admin Dashboard
            </h1>
            <h2 className="subtitle">
              A simple admin template
            </h2>
          </div>
        </div>

        <div className="hero-foot">
          <nav className="level">
            <div className="level-item has-text-centered">
              <p className="heading">Tweets</p>
              <p className="title">3,456</p>
            </div>
            <div className="level-item has-text-centered">
              <p className="heading">Following</p>
              <p className="title">123</p>
            </div>
            <div className="level-item has-text-centered">
              <p className="heading">Followers</p>
              <p className="title">456K</p>
            </div>
            <div className="level-item has-text-centered">
              <p className="heading">Likes</p>
              <p className="title">789</p>
            </div>
          </nav>
        </div>
      </section>
    )
  }
}
