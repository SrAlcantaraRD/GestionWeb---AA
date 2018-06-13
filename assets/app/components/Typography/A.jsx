import React from 'react';
import {withStyles} from '@material-ui/core';
import PropTypes from 'prop-types';

import typographyStyle from '../../jss/material-dashboard-react/typographyStyle.jsx';

class A extends React.Component {
    constructor(props) {
        super(props);
    }

    render(){
        const {classes, children, rest} = this.props;
        return (
            <a {...rest} className={classes.defaultFontStyle + ' ' + classes.aStyle}>
                {children}
            </a>
        );
    }
}

A.propTypes = {
    classes: PropTypes.object.isRequired,
    children: PropTypes.object.isRequired,
    rest: PropTypes.object.isRequired,
};

export default withStyles(typographyStyle)(A);
