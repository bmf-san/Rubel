import React, {Component} from "react";
import PropTypes from "prop-types";
import {reduxForm, Field, SubmissionError} from "redux-form";
import {connect} from "react-redux";
import {loginUser, isLoginUser} from "../actions/index";
import {Link} from "react-router";
import Loader from "../utils/Loader";

class Login extends Component {
  constructor(props) {
    super(props);
    const {isLoginUser} = this.props;

    if (isLoginUser().payload) {
      this.context.router.push("/dashboard");
    }
  }

  onSubmit(props) {
    const {loginUser} = this.props;

    return loginUser(props).then((res) => {
      if (res.error) {
        const validation_msg = res.payload.response.data.errors;

        if (validation_msg) {
          throw new SubmissionError(validation_msg);
        }
      } else {
        this.context.router.push("/dashboard");
      }
    });
  }

  renderEmailField({
    input,
    label,
    type,
    meta: {
      touched,
      error
    }
  }) {
    return (<div className="field">
      <label className="label">{label}</label>
      <div className="control">
        <input {...input} placeholder={label} type={type} className={touched && ((error && "input is-danger is-resizeless")) || "input is-resizeless"}/>{touched && ((error && <span className="help is-danger">{error}</span>))}
      </div>
    </div>);
  }

  renderPasswordField({
    input,
    label,
    type,
    meta: {
      touched,
      error
    }
  }) {
    return (<div className="field">
      <label className="label">{label}</label>
      <div className="control">
        <input {...input} placeholder={label} type={type} className={touched && ((error && "input is-danger is-resizeless")) || "input is-resizeless"}/>{touched && ((error && <span className="help is-danger">{error}</span>))}
      </div>
    </div>);
  }

  render() {
    const {handleSubmit, submitting} = this.props;

    return (<div className="columns login-column">
      {
        submitting
          ? <Loader/>
          : null
      }
      <div className="column is-offset-one-third is-one-third">
        <h1 className="title has-text-centered">Login</h1>
        <form onSubmit={handleSubmit(this.onSubmit.bind(this))} className="column">
          <Field label="Email" name="email" type="email" component={this.renderEmailField} placeholder="Email"/>
          <Field label="Password" name="password" type="password" component={this.renderPasswordField} placeholder="Password"/>
          <div className="field is-grouped is-pulled-right">
            <div className="control">
              <button className="button is-primary">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>);
  }
}

Login.propTypes = {
  loginUser: PropTypes.func,
  isLoginUser: PropTypes.func,
  handleSubmit: PropTypes.func,
  submitting: PropTypes.bool
};

Login.contextTypes = {
  router: PropTypes.object
};

const validate = props => {
  const errors = {};

  if (!props.email) {
    errors.email = "Requires";
  } else if (!props.password) {
    errors.password = "Requires";
  }
};

const form = reduxForm({form: "LoginForm", validate})(Login);

function mapStateToProps(state) {
  return {};
}

export default connect(mapStateToProps, {loginUser, isLoginUser})(form);
