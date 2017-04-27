import React, {Component, PropTypes} from 'react';
import {reduxForm, Field, SubmissionError} from 'redux-form';
import {connect} from 'react-redux';
import {editConfig, fetchConfigs} from '../actions/index';
import {Link} from 'react-router';

class Configs extends Component {
  componentWillMount() {
    this.props.fetchConfigs();
  }

  onSubmit(props) {
    const {editConfig, fetchConfigs, reset} = this.props;

    return editConfig(props).then((res) => {
      if (res.error) {
        console.log(res.error);
      } else {
        reset();
        fetchConfigs();
      }
    });
  }

  renderConfigField({
    input,
    label,
    type,
    meta: {
      touched,
      error
    }
  }) {
    return (
      <div className="field">
        <label className="label">{label}</label>
        <div className="control">
          <input {...input} placeholder={label} type={type} className={touched && ((error && "input is-danger is-resizeless")) || 'input is-resizeless'}/>{touched && ((error && <span className="help is-danger">{error}</span>))}
        </div>
      </div>
    )
  }

  render() {
    const {handleSubmit, configs} = this.props

    return (
      <div>
        <div className="title is-2">Config</div>
        <div className="columns">
          <form onSubmit={handleSubmit(this.onSubmit.bind(this))} className="column is-half">
            {configs.all.map((config) => <Field key={config.id} label={config.alias_name} name={config.name} type="text" component={this.renderConfigField} placeholder={config.name}/>)}
            <div className="field is-grouped is-pulled-right">
              <div className="control">
                <button className="button is-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    )
  }
}

const form = reduxForm({form: 'ConfigForm'})(Configs)
function mapStateToProps(state) {
  state.configs.all.map((config) => {
    return {
      [config.name]: [config.value]
    }
  })
  // const ary = [];
  // state.configs.map((config) => {
  //   ary.push({
  //     [config.name]: [config.value]
  //   })
  // })
  //
  // return ary;
  // return {configs: state.configs}
}

export default connect(mapStateToProps, {editConfig, fetchConfigs})(form);
