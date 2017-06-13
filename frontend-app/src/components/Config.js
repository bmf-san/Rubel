import React, {Component, PropTypes} from "react"
import {reduxForm, Field, SubmissionError} from "redux-form"
import {connect} from "react-redux"
import {editConfig, fetchConfigs} from "../actions/index"
import {Link} from "react-router"
import Loader from "../utils/Loader"

class Configs extends Component {
	componentWillMount() {
		const {fetchConfigs} = this.props

		fetchConfigs()
	}

	onSubmit(props) {
		const {editConfig, fetchConfigs, reset} = this.props

		return editConfig(props).then((res) => {
			if (res.error) {
				console.log(res.error)
			} else {
				reset()
				fetchConfigs()
				this.context.router.push("/dashboard/config")
			}
		})
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
					<input {...input} placeholder={label} type={type} className={touched && ((error && "input is-danger is-resizeless")) || "input is-resizeless"}/>{touched && ((error && <span className="help is-danger">{error}</span>))}
				</div>
			</div>
		)
	}

	render() {
		const {handleSubmit, configs, submitting} = this.props

		if (submitting) {
			return (<Loader/>)
		}

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

Configs.contextTypes = {
	router: PropTypes.object
}

const form = reduxForm({form: "ConfigForm", enableReinitialize: true})(Configs)

function mapStateToProps(state) {
	const obj = {}

	state.configs.all.map((config) => {
		obj[config.name] = config.value
	})

	return {configs: state.configs, initialValues: obj}
}

export default connect(mapStateToProps, {editConfig, fetchConfigs})(form)
