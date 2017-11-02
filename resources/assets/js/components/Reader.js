import React, { Component } from 'react'
import ReactDOM from 'react-dom';

import Page from './Page'
import Text from './Text'

export default class Reader extends Component {

    constructor(props) {
        super(props)
        this.state = {
            pageId: 2
        }
        this.handleChoice = this.handleChoice.bind(this)
    }

    handleChoice(choice) {
        this.setState({ pageId: choice.nextPageId })
    }

    render() {
        return (
            <div>
                <Page id={this.state.pageId} handleChoice={this.handleChoice} />
            </div>
        )
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<Reader />, document.getElementById('app'))
}
