import React, {Component} from 'react'
import ReactDOM from 'react-dom'

import TextEditor from './TextEditor'

export default class extends Component {

    constructor(props) {
        super(props)
        this.state = {
            texts: []
        }
        this.load = this.load.bind(this)
    }

    componentDidMount() {
        this.load(this.props.id)
    }

    load(pageId) {
        fetch(`/api/pages/${pageId}`)
        .then((resp)  => resp.json())
        .then((json) => {
            this.setState({
                texts: json.data.texts
            })
            console.log(json.data.texts)
        })
    }

    renderTextEditors() {
        return this.state.texts.map((text) => {
            return (
                <TextEditor
                    key={text.id}
                    id={text.id}
                    content={text.content}
                    delay={text.delay}
                    speed={text.speed}
                    order={text.order}
                />
            )
        })
    }

    render() {
        return (
            <div>
                {this.state.texts && this.renderTextEditors()}
            </div>
        )
    }
}
