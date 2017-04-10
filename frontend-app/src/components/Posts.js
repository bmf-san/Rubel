import React, {Component} from 'react';
import {connect} from 'react-redux';
import {bindActionCreators} from 'redux';
import {fetchPosts, deletePost} from '../actions/index';
import {Link} from 'react-router';

class Posts extends Component {
  componentWillMount() {
    const page = this.props.location.query.page;

    this.props.fetchPosts(page);
  }

  componentDidUpdate(prevProps) {
    const page = this.props.location.query.page;

    if (prevProps.location.query.page === page) {
      return false
    }

    this.props.fetchPosts(page);
  }

  handleDeletePost(id) {
    const page = this.props.location.query.page

    if (window.confirm('Are you sure you want to delete?')) {
      return this.props.deletePost(id).then((res) => {
        if (res.error) {
          console.log('Error!');
        } else {
          this.props.fetchPosts(page);
        }
      })
    }
  }

  renderPosts() {
    return this.props.posts.records.map((post) => {
      let tags = [];

      for (let i in post.tags) {
        tags.push(
          <span key={i}>{post.tags[i].name}</span>
        );
      }

      return (
        <li key={post.id}>
          <Link to={`/dashboard/edit-post/${post.id}`}>
            <h1>Title: {post.title}</h1>
          </Link>
          <p>Category: {post.category.name}</p>
          <p>Tags: {tags}</p>
          <p>Status: {post.publication_status}</p>
          <button onClick={() => {
            this.handleDeletePost(post.id)
          }}>Delete</button>
        </li>
      );
    });
  }

  renderPagination() {
    const pagination = this.props.posts.pagination
    const last_page = pagination.last_page
    const current_page = pagination.current_page

    const pages = [];

    for (let i = 1; i <= last_page; i++) {
      pages.push(i == current_page
        ? <li key={i}>
            Current {i}
          </li>
        : <li key={i}>
          <Link to={`/dashboard/posts?page=${i}`}>{i}</Link>
        </li>);
    }

    const prev = () => {
      if (current_page > 1) {
        return (
          <li>
            <Link to={`/dashboard/posts?page=${pagination.current_page - 1}`}>Prev</Link>
          </li>
        )
      }
    }

    const next = () => {
      if (current_page < last_page) {
        return (
          <Link to={`/dashboard/posts?page=${pagination.current_page + 1}`}>Next</Link>
        )
      }
    }

    return (
      <ul>
        {prev()}
        {pages}
        {next()}
      </ul>
    );
  }

  render() {
    return (
      <section className="section">
        <div className="container">
          <div className="heading">
            <h1 className="title">Posts</h1>
            <h2 className="subtitle">
              Here is perfomance infomation.
            </h2>
            <div>
              <h3>Posts</h3>
              <ul>
                {this.renderPosts()}
                {this.renderPagination()}
              </ul>
            </div>
            <table className="table">
              <thead>
                <tr>
                  <th>
                    <abbr title="Position">Pos</abbr>
                  </th>
                  <th>Team</th>
                  <th>
                    <abbr title="Played">Pld</abbr>
                  </th>
                  <th>
                    <abbr title="Won">W</abbr>
                  </th>
                  <th>
                    <abbr title="Drawn">D</abbr>
                  </th>
                  <th>
                    <abbr title="Lost">L</abbr>
                  </th>
                  <th>
                    <abbr title="Goals for">GF</abbr>
                  </th>
                  <th>
                    <abbr title="Goals against">GA</abbr>
                  </th>
                  <th>
                    <abbr title="Goal difference">GD</abbr>
                  </th>
                  <th>
                    <abbr title="Points">Pts</abbr>
                  </th>
                  <th>Qualification or relegation</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>
                    <abbr title="Position">Pos</abbr>
                  </th>
                  <th>Team</th>
                  <th>
                    <abbr title="Played">Pld</abbr>
                  </th>
                  <th>
                    <abbr title="Won">W</abbr>
                  </th>
                  <th>
                    <abbr title="Drawn">D</abbr>
                  </th>
                  <th>
                    <abbr title="Lost">L</abbr>
                  </th>
                  <th>
                    <abbr title="Goals for">GF</abbr>
                  </th>
                  <th>
                    <abbr title="Goals against">GA</abbr>
                  </th>
                  <th>
                    <abbr title="Goal difference">GD</abbr>
                  </th>
                  <th>
                    <abbr title="Points">Pts</abbr>
                  </th>
                  <th>Qualification or relegation</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <th>1</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Leicester City</a>
                    <strong>(C)</strong>
                  </td>
                  <td>38</td>
                  <td>23</td>
                  <td>12</td>
                  <td>3</td>
                  <td>68</td>
                  <td>36</td>
                  <td>+32</td>
                  <td>81</td>
                  <td>Qualification for the
                    <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Champions_League#Group_stage" title="2016–17 UEFA Champions League">Champions League group stage</a>
                  </td>
                </tr>
                <tr>
                  <th>2</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Arsenal_F.C." title="Arsenal F.C.">Arsenal</a>
                  </td>
                  <td>38</td>
                  <td>20</td>
                  <td>11</td>
                  <td>7</td>
                  <td>65</td>
                  <td>36</td>
                  <td>+29</td>
                  <td>71</td>
                  <td>Qualification for the
                    <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Champions_League#Group_stage" title="2016–17 UEFA Champions League">Champions League group stage</a>
                  </td>
                </tr>
                <tr>
                  <th>3</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Tottenham_Hotspur_F.C." title="Tottenham Hotspur F.C.">Tottenham Hotspur</a>
                  </td>
                  <td>38</td>
                  <td>19</td>
                  <td>13</td>
                  <td>6</td>
                  <td>69</td>
                  <td>35</td>
                  <td>+34</td>
                  <td>70</td>
                  <td>Qualification for the
                    <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Champions_League#Group_stage" title="2016–17 UEFA Champions League">Champions League group stage</a>
                  </td>
                </tr>
                <tr>
                  <th>4</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Manchester_City_F.C." title="Manchester City F.C.">Manchester City</a>
                  </td>
                  <td>38</td>
                  <td>19</td>
                  <td>9</td>
                  <td>10</td>
                  <td>71</td>
                  <td>41</td>
                  <td>+30</td>
                  <td>66</td>
                  <td>Qualification for the
                    <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Champions_League#Play-off_round" title="2016–17 UEFA Champions League">Champions League play-off round</a>
                  </td>
                </tr>
                <tr>
                  <th>5</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Manchester_United_F.C." title="Manchester United F.C.">Manchester United</a>
                  </td>
                  <td>38</td>
                  <td>19</td>
                  <td>9</td>
                  <td>10</td>
                  <td>49</td>
                  <td>35</td>
                  <td>+14</td>
                  <td>66</td>
                  <td>Qualification for the
                    <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Europa_League#Group_stage" title="2016–17 UEFA Europa League">Europa League group stage</a>
                  </td>
                </tr>
                <tr>
                  <th>6</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Southampton_F.C." title="Southampton F.C.">Southampton</a>
                  </td>
                  <td>38</td>
                  <td>18</td>
                  <td>9</td>
                  <td>11</td>
                  <td>59</td>
                  <td>41</td>
                  <td>+18</td>
                  <td>63</td>
                  <td>Qualification for the
                    <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Europa_League#Group_stage" title="2016–17 UEFA Europa League">Europa League group stage</a>
                  </td>
                </tr>
                <tr>
                  <th>7</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/West_Ham_United_F.C." title="West Ham United F.C.">West Ham United</a>
                  </td>
                  <td>38</td>
                  <td>16</td>
                  <td>14</td>
                  <td>8</td>
                  <td>65</td>
                  <td>51</td>
                  <td>+14</td>
                  <td>62</td>
                  <td>Qualification for the
                    <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Europa_League#Third_qualifying_round" title="2016–17 UEFA Europa League">Europa League third qualifying round</a>
                  </td>
                </tr>
                <tr>
                  <th>8</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Liverpool_F.C." title="Liverpool F.C.">Liverpool</a>
                  </td>
                  <td>38</td>
                  <td>16</td>
                  <td>12</td>
                  <td>10</td>
                  <td>63</td>
                  <td>50</td>
                  <td>+13</td>
                  <td>60</td>
                  <td></td>
                </tr>
                <tr>
                  <th>9</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Stoke_City_F.C." title="Stoke City F.C.">Stoke City</a>
                  </td>
                  <td>38</td>
                  <td>14</td>
                  <td>9</td>
                  <td>15</td>
                  <td>41</td>
                  <td>55</td>
                  <td>−14</td>
                  <td>51</td>
                  <td></td>
                </tr>
                <tr>
                  <th>10</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Chelsea_F.C." title="Chelsea F.C.">Chelsea</a>
                  </td>
                  <td>38</td>
                  <td>12</td>
                  <td>14</td>
                  <td>12</td>
                  <td>59</td>
                  <td>53</td>
                  <td>+6</td>
                  <td>50</td>
                  <td></td>
                </tr>
                <tr>
                  <th>11</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Everton_F.C." title="Everton F.C.">Everton</a>
                  </td>
                  <td>38</td>
                  <td>11</td>
                  <td>14</td>
                  <td>13</td>
                  <td>59</td>
                  <td>55</td>
                  <td>+4</td>
                  <td>47</td>
                  <td></td>
                </tr>
                <tr>
                  <th>12</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Swansea_City_A.F.C." title="Swansea City A.F.C.">Swansea City</a>
                  </td>
                  <td>38</td>
                  <td>12</td>
                  <td>11</td>
                  <td>15</td>
                  <td>42</td>
                  <td>52</td>
                  <td>−10</td>
                  <td>47</td>
                  <td></td>
                </tr>
                <tr>
                  <th>13</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Watford_F.C." title="Watford F.C.">Watford</a>
                  </td>
                  <td>38</td>
                  <td>12</td>
                  <td>9</td>
                  <td>17</td>
                  <td>40</td>
                  <td>50</td>
                  <td>−10</td>
                  <td>45</td>
                  <td></td>
                </tr>
                <tr>
                  <th>14</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/West_Bromwich_Albion_F.C." title="West Bromwich Albion F.C.">West Bromwich Albion</a>
                  </td>
                  <td>38</td>
                  <td>10</td>
                  <td>13</td>
                  <td>15</td>
                  <td>34</td>
                  <td>48</td>
                  <td>−14</td>
                  <td>43</td>
                  <td></td>
                </tr>
                <tr>
                  <th>15</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Crystal_Palace_F.C." title="Crystal Palace F.C.">Crystal Palace</a>
                  </td>
                  <td>38</td>
                  <td>11</td>
                  <td>9</td>
                  <td>18</td>
                  <td>39</td>
                  <td>51</td>
                  <td>−12</td>
                  <td>42</td>
                  <td></td>
                </tr>
                <tr>
                  <th>16</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/A.F.C._Bournemouth" title="A.F.C. Bournemouth">AFC Bournemouth</a>
                  </td>
                  <td>38</td>
                  <td>11</td>
                  <td>9</td>
                  <td>18</td>
                  <td>45</td>
                  <td>67</td>
                  <td>−22</td>
                  <td>42</td>
                  <td></td>
                </tr>
                <tr>
                  <th>17</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Sunderland_A.F.C." title="Sunderland A.F.C.">Sunderland</a>
                  </td>
                  <td>38</td>
                  <td>9</td>
                  <td>12</td>
                  <td>17</td>
                  <td>48</td>
                  <td>62</td>
                  <td>−14</td>
                  <td>39</td>
                  <td></td>
                </tr>
                <tr>
                  <th>18</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Newcastle_United_F.C." title="Newcastle United F.C.">Newcastle United</a>
                    <strong>(R)</strong>
                  </td>
                  <td>38</td>
                  <td>9</td>
                  <td>10</td>
                  <td>19</td>
                  <td>44</td>
                  <td>65</td>
                  <td>−21</td>
                  <td>37</td>
                  <td>Relegation to the
                    <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_Football_League_Championship" title="2016–17 Football League Championship">Football League Championship</a>
                  </td>
                </tr>
                <tr>
                  <th>19</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Norwich_City_F.C." title="Norwich City F.C.">Norwich City</a>
                    <strong>(R)</strong>
                  </td>
                  <td>38</td>
                  <td>9</td>
                  <td>7</td>
                  <td>22</td>
                  <td>39</td>
                  <td>67</td>
                  <td>−28</td>
                  <td>34</td>
                  <td>Relegation to the
                    <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_Football_League_Championship" title="2016–17 Football League Championship">Football League Championship</a>
                  </td>
                </tr>
                <tr>
                  <th>20</th>
                  <td>
                    <a href="https://en.wikipedia.org/wiki/Aston_Villa_F.C." title="Aston Villa F.C.">Aston Villa</a>
                    <strong>(R)</strong>
                  </td>
                  <td>38</td>
                  <td>3</td>
                  <td>8</td>
                  <td>27</td>
                  <td>27</td>
                  <td>76</td>
                  <td>−49</td>
                  <td>17</td>
                  <td>Relegation to the
                    <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_Football_League_Championship" title="2016–17 Football League Championship">Football League Championship</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    );
  }
}

function mapStateToProps(state) {
  return {posts: state.posts};
}

export default connect(mapStateToProps, {fetchPosts, deletePost})(Posts);
