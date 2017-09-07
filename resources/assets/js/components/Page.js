import React, {Component} from 'react'

export default class Page extends Component {

/*  constructor(props) {
  }*/

  handleClick(event) {
    this.props.onEnd()
  }

  renderChoices() {
    const choices = this.props.choices.map((choice) => {
      return (
        <li key={choice}>
          <a href="#" onClick={this.handleClick}>"{choice}"</a>
        </li>
      )
    })

    return (
      <div>
        <p className="text-before-choices">Répondre :</p>
        <ul>{choices}</ul>
      </div>
    )
  }

  render() {
    return (
      <div>
        <p className="text-default">
          {this.props.content}
        </p>
        {this.props.choices && this.renderChoices()}
      </div>
    )
  }
}
