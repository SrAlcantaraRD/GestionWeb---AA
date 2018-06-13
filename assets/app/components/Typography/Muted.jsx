import React from 'react';
import PropTypes from 'prop-types';
import {withStyles} from '@material-ui/core';

import typographyStyle from '../../jss/material-dashboard-react/typographyStyle.jsx';

class Muted extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {

        const {classes, children} = this.props;
        return (
            <div className={classes.defaultFontStyle + ' ' + classes.mutedText}>
                {children}
            </div>
        );
    }
}

Muted.propTypes = {
    children: PropTypes.object.isRequired,
    classes: PropTypes.object.isRequired,
};

export default withStyles(typographyStyle)(Muted);
