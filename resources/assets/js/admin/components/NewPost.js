import React from 'react';
import marked from 'marked';
import hljs from 'highlight.js';
import ReactTags from 'react-tag-autocomplete';
import request from 'superagent';

export default class NewPost extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      // Validation messages
      message: {
        // TODO: add validation messages...
      },

      // Tag auto-complete
      suggestions: [],

      // Post data
      markdown: '',
      categories: [],
      tags: [],
      publicationStatus: ['public', 'private', 'draft']
    }

    this.handleDelete = this.handleDelete.bind(this);
    this.handleAddition = this.handleAddition.bind(this);
    this.updateMarkdown = this.updateMarkdown.bind(this);
  }

  componentDidMount() {
    request
      .get('api/v1/tags')
      .end(function (err, res) {
        if (err) {
          alert('Error!');
        }
        this.setState({
          suggestions: res.body
        });
      }.bind(this));

    request
      .get('api/v1/categories')
      .end(function (err, res) {
        if (err) {
          alert('Error!');
        }
        this.setState({
          categories: res.body
        });
      }.bind(this));
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
    const categoryList = [];
    for (var key in this.state.categories) {
      categoryList.push(
        <label key={key}>
          <input type="checkbox" name="category" value={this.state.categories[key].id} />
          {this.state.categories[key].name}
        </label>
      )
    }

    const publicationStatusList = [];
    for (var key in this.state.publicationStatus) {
      publicationStatusList.push(
        <option key={key} value={this.status.publicationStatus[key]}>{this.status.publicationStatus[key]}</option>
      )
    }

    return (
      <div>
        {categoryList}
        <h1>NewPost</h1>
        <p>Here is cateogory select btn</p>
        <ReactTags
          tags={this.state.tags}
          suggestions={this.state.suggestions}
          handleDelete={this.handleDelete}
          handleAddition={this.handleAddition}
          allowNew={true} />
        <TextInput onChange={this.updateMarkdown} />
        <Markdown markdown={this.state.markdown} />
        <select multiple={false} onChange={this.onChangeSelectValues}>
          {publicationStatusList}
        </select>
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
