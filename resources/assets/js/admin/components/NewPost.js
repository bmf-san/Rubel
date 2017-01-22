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
      category: '',
      categories: [],
      tags: [],
      publicationStatus: '',
      publicationStatuses: ['public', 'private', 'draft']
    }

    this.onChangeRadioValues = this.onChangeRadioValues.bind(this);
    this.onChangeSelectValues = this.onChangeSelectValues.bind(this);
    this.handleDelete = this.handleDelete.bind(this);
    this.handleAddition = this.handleAddition.bind(this);
    this.updateMarkdown = this.updateMarkdown.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
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

  onChangeRadioValues(event) {
    this.setState({
      'category': event.target.value
    })
  }

  onChangeSelectValues(event) {
    this.setState({
      'publicationStatus': event.target.value
    });
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

  handleSubmit() {
    request
      .post('api/v1/admin/post/create')
      .send({
        'new_post': ['hoge']
      })
      .end(function (err, res) {
        if (res.ok) {
            // validation messages or success
        } else {
          alert('Error!')
        }
      }.bind(this));
  }

  render() {
    const categoryList = [];
    for (var key in this.state.categories) {
      categoryList.push(
        <label key={key}>
          <input type="checkbox" name="category" value={this.state.categories[key].name} checked={this.state.category === this.state.categories[key].name} onChange={this.onChangeRadioValues} />
          {this.state.categories[key].name}
        </label>
      )
    }

    const publicationStatusList = [];
    for (var i = 0, l = this.state.publicationStatuses.length; i < l; i++) {
      publicationStatusList.push(
        <option key={i} value={this.state.publicationStatuses[i]}>
          {this.state.publicationStatuses[i]}
        </option>
      );
    }

    return (
      <form action="javascript:void(0)" method="POST" onSubmit={this.handleSubmit}>
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
        <select multiple={false} value={this.state.publicationStatus} onChange={this.onChangeSelectValues}>
          {publicationStatusList}
        </select>
        <button type="submit">Save</button>
      </form>
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
