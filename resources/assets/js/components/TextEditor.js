import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import { Card, CardHeader, CardText } from 'material-ui/Card'
import TextField from 'material-ui/TextField'
import FlatButton from 'material-ui/FlatButton'

export default class TextEditor extends Component {

    constructor(props) {
        super(props)
        this.state = {
            content: this.props.content,
            delay: this.props.delay,
            speed: this.props.speed,
            order: this.props.order,
            editing: false
        }
        this.load = this.load.bind(this)
        this.update = this.update.bind(this)
        this.handleContentChange = this.handleContentChange.bind(this)
        this.handleDelayChange = this.handleDelayChange.bind(this)
        this.handleSpeedChange = this.handleSpeedChange.bind(this)
        this.handleCancel = this.handleCancel.bind(this)
    }

    componentDidMount() {
        if (this.props.load) {
            this.load()
        }
    }

    load() {
        fetch(`/api/texts/${this.props.id}`)
        .then((resp)  => resp.json())
        .then((json) => {
            this.setState({
                content: json.data.content,
                delay: json.data.delay,
                speed: json.data.speed,
                order: json.data.order
            })
            this.defaultContent = json.data.content
            this.defaultDelay = json.data.delay
        })
    }

    update() {
        this.setState({ editing: false })
        fetch(`/api/texts/${this.props.id}`, {
            method: "PUT",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                content: this.state.content,
                delay: this.state.delay,
                speed: this.state.speed
            })
        })
        .then((res) => res.json())
        .then((json) => {
            console.log(json)
        })
    }

    handleContentChange(event) {
        this.setState({
            editing: true,
            content: event.target.value
        })
    }

    handleDelayChange(event) {
        this.setState({
            editing: true,
            delay: event.target.value
        })
    }

    handleSpeedChange(event) {
        this.setState({
            editing: true,
            speed: event.target.value
        })
    }

    handleCancel() {
        this.setState({
            editing: false,
            content: this.defaultContent
        })
    }

    render() {
        return (
            <div>
                <Card>
                    {this.state.order !== null &&
                        <CardHeader
                            title={`Text n°${this.state.order}`}
                            subtitle={`ID ${this.props.id}`}
                        />
                    }
                    <CardText>
                        {this.state.content &&
                            <TextField
                                floatingLabelText="Content"
                                multiLine={true}
                                fullWidth={true}
                                value={this.state.content}
                                onChange={(event, newValue) => this.handleContentChange(event)}
                            />
                        }
                        {this.state.delay !== null &&
                            <TextField
                                floatingLabelText="Delay"
                                type="number"
                                value={this.state.delay}
                                onChange={(event, newValue) => this.handleDelayChange(event)}
                            />
                        }
                        {this.state.speed !== null &&
                            <TextField
                                floatingLabelText="Speed"
                                type="number"
                                value={this.state.speed}
                                onChange={(event, newValue) => this.handleSpeedChange(event)}
                            />
                        }
                        {this.state.editing &&
                            <div>
                                <FlatButton
                                    label="Cancel"
                                    onClick={() => this.handleCancel()}
                                />
                                <FlatButton
                                    label="Update"
                                    primary={true}
                                    onClick={() => this.update()}
                                />
                            </div>
                        }
                    </CardText>
                </Card>
            </div>
        )
    }
}

TextEditor.defaultProps = {
    load: false
}
