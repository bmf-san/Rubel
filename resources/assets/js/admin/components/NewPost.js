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
      title: '',
      markdown: '',
      category: 0,
      categories: [],
      tags: [],
      publication_status: '',
      publication_statuses: ['public', 'private', 'draft']
    }

    this.onChangeTitle = this.onChangeTitle.bind(this);
    this.onChangeCategory = this.onChangeCategory.bind(this);
    this.onChangePublicationStatus = this.onChangePublicationStatus.bind(this);
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

  onChangeTitle(event) {
    this.setState({
      'title': event.target.value
    });
  }

  onChangeCategory(event) {
    this.setState({
      'category': event.target.value
    })
  }

  onChangePublicationStatus(event) {
    this.setState({
      'publication_status': event.target.value
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
        'title': this.state.title,
        'content': this.state.markdown,
        'category': this.state.category,
        'tag': this.state.tags,
        'publication_status': this.state.publication_status
      })
      .end(function (err, res) {
        if (res.ok) {
            // validation messages or success
            console.log(res);
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
          <input type="checkbox" name="category" value={this.state.categories[key].id} checked={this.state.category == this.state.categories[key].id} onChange={this.onChangeCategory} />
          {this.state.categories[key].name}
        </label>
      )
    }

    const publicationStatusList = [];
    for (var i = 0, l = this.state.publication_statuses.length; i < l; i++) {
      publicationStatusList.push(
        <option key={i} value={this.state.publication_statuses[i]}>
          {this.state.publication_statuses[i]}
        </option>
      );
    }

    return (
      <form action="javascript:void(0)" method="POST" onSubmit={this.handleSubmit}>
        <h1>NewPost</h1>
        <input type="text" value={this.state.title} onChange={this.onChangeTitle} />
        {categoryList}
        <ReactTags
          tags={this.state.tags}
          suggestions={this.state.suggestions}
          handleDelete={this.handleDelete}
          handleAddition={this.handleAddition}
          allowNew={true} />
        <TextInput onChange={this.updateMarkdown} />
        <Markdown markdown={this.state.markdown} />
        <select multiple={false} value={this.state.publicationStatus} onChange={this.onChangePublicationStatus}>
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
