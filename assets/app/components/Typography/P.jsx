import React from 'react';
import {withStyles} from '@material-ui/core';
import PropTypes from 'prop-types';

import typographyStyle from '../../jss/material-dashboard-react/typographyStyle.jsx';

class P extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {

        const {classes, children} = this.props;
        return (
            <p className={classes.defaultFontStyle + ' ' + classes.pStyle}>
                {children}
            </p>
        );
    }
}

P.propTypes = {
    classes: PropTypes.object.isRequired,
    children: PropTypes.object.isRequired,
};

export default withStyles(typographyStyle)(P);
