import React, { Component } from 'react'
import ReactDOM from 'react-dom';

import Page from './Page'
import Text from './Text'

export default class App extends Component {

  constructor(props) {
    super(props)
    this.state = {
      page: null
    }
    this.initPage()
  }

  initPage() {
    fetch('/api/pages/2')
    .then((resp) => resp.json()) 
    .then(function(json) {
      this.setState({ page: json })
      console.log(json)
    })
  }

  render() {
    return (
      <div>
        <Page />
      </div>
    )
  }
}

if (document.getElementById('app')) {
  ReactDOM.render(<App />, document.getElementById('app'))
}
