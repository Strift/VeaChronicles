import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';

import PageEditor from './PageEditor'

export default class AdminPanel extends Component {

    render() {
        return (
            <MuiThemeProvider>
                <PageEditor id={1}/>
            </MuiThemeProvider>
        )
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<AdminPanel />, document.getElementById('app'))
}
