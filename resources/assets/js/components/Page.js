import React, {Component} from 'react'

import Text from './Text'

export default class Page extends Component {

    constructor(props) {
        super(props)
        this.state = {
            texts: [],
            choices: []
        }
        this.load = this.load.bind(this)
        this.handleClick = this.handleClick.bind(this)
    }

    componentDidMount() {
        this.load(this.props.id)
    }

    componentWillReceiveProps(nextProps) {
        if (this.props.id != nextProps.id) {
            this.load(nextProps.id)
        }
    }

    load(pageId) {
        fetch(`/api/pages/${pageId}`)
        .then((resp)  => resp.json())
        .then((json) => {
            this.setState({
                texts: json.data.texts,
                choices: json.data.choices
            })
        })
    }

    handleClick(choice) {
        this.props.handleChoice(choice)
    }

    renderTexts() {
        return this.state.texts.map((text) => <Text key={text.id} content={text.content} delay={text.delay} speed={text.speed} />)
    }

    renderChoices() {
        const choices = this.state.choices.map((choice) => {
            return (
                <li key={choice.id}>
                    <span onClick={(e) => this.handleClick(choice)}>{choice.text}</span>
                </li>
            )
        })
        return <ul>{choices}</ul>
    }

    render() {
        return (
            <div>
                <div className="text-default">
                    {this.renderTexts()}
                </div>
                <div className="text-choices">
                    {this.renderChoices()}
                </div>
            </div>
        )
    }
}
