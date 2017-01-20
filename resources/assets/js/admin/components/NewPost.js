import React from 'react';
import marked from 'marked';
import hljs from 'highlight.js';

export default class NewPost extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      markdown: ''
    }

    this.updateMarkdown = this.updateMarkdown.bind(this);
  }

  updateMarkdown(markdown) {
    this.setState({
      markdown: markdown
    });
  }

  render() {
    return (
      <div>
        <h1>NewPost</h1>
        <TextInput onChange={this.updateMarkdown} />
        <Markdown markdown={this.state.markdown} />
      </div>
    )
  }
}

class TextInput extends React.Component {
    constructor(props) {
      super(props);

      this._onChange = this._onChange.bind(this);
    }

    _onChange(event) {
      this.props.onChange(event.target.value);
    }

    render() {
      return (
        <textarea onChange={this._onChange}></textarea>
      )
    }
}

class Markdown extends React.Component {
  constructor(props) {
    super(props);
  }

  componentDidUpdate() {
    marked.setOptions({
      hljs: function(code, lang) {
        return hljs.highlightAuto(code, [lang]).value;
      }
    });
  }

  render() {
    var html = marked(this.props.markdown);

    return (
      <div dangerouslySetInnerHTML={{__html: html}}></div>
    )
  }
}
