import React, {Component} from 'react'

export default class Message extends Component {

  constructor(props) {
    super(props)
    this.state = {
      visible: this.props.delay > 0 ? false : true,
      visibleChars: this.props.speed > 0 ? 0 : this.props.content.length
    }
    this.initDelay()
    this.initPrinting()
  }

  initDelay() {
    if (this.props.delay > 0) {
      setTimeout(this.handleTimeout, this.props.delay)
    }
  }
  
  initPrinting() {
    if (this.props.speed > 0 && this.state.visible) {
      setTimeout(this.handlePrinting, this.props.speed)
    }
  }

  handleTimeout() {
    this.setState({ visible: true })
    this.initPrinting()
  }
  
  handlePrinting() {
    const count = this.state.visibleChars
    this.setState({ visibleChars: count + 1 })
    if (count+1 < this.props.content.length) {
      setTimeout(this.handlePrinting, this.props.speed)
    }
  }

  renderContent() {
    return <span>{this.props.content.substring(0, this.state.visibleChars)}</span>
  }

  render() {
    return <span>{this.state.visible && this.renderContent()}</span>
  }
}

Message.defaultProps = {
  delay: 0,
  speed: 0
}