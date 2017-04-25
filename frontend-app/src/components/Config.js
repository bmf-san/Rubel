import React, {Component, PropTypes} from 'react';
import {reduxForm, Field, SubmissionError} from 'redux-form';
import {connect} from 'react-redux';
import {createTag, editTag, deleteTag, fetchTags} from '../actions/index';
import {Link} from 'react-router';

export default class Config extends React.Component {
  render() {
    return (
      <div>
        <div className="title is-2">Config</div>
      </div>
    )
  }
}
