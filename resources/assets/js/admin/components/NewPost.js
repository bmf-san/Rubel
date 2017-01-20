import React from 'react';
import marked from 'marked';
import hljs from 'highlight.js';
import ReactTags from 'react-tag-autocomplete';

export default class NewPost extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      markdown: '',
      tags: [
        { id: 1, name: "Apples" },
        { id: 2, name: "Pears" }
      ],
      suggestions: [
        { id: 3, name: "Bananas" },
        { id: 4, name: "Mangos" },
        { id: 5, name: "Lemons" },
        { id: 6, name: "Apricots" }
      ]
    }

    this.handleDelete = this.handleDelete.bind(this);
    this.handleAddition = this.handleAddition.bind(this);
    this.updateMarkdown = this.updateMarkdown.bind(this);
  }

  handleDelete(i) {
    const tags = this.state.tags
    tags.splice(i, 1)
    this.setState({ tags: tags })
  }

  handleAddition(tag) {
    const tags = this.state.tags
    tags.push(tag)
    this.setState({ tags: tags })
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
        <ReactTags
          tags={this.state.tags}
          suggestions={this.state.suggestions}
          handleDelete={this.handleDelete}
          handleAddition={this.handleAddition}
          allowNew={true} />
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
      highlight: function(code, lang) {
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
