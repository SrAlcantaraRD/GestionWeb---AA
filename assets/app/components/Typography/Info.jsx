import React from 'react';
import PropTypes from 'prop-types';
import {withStyles} from '@material-ui/core';

import typographyStyle from '../../jss/material-dashboard-react/typographyStyle.jsx';

class Info extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        const {classes, children} = this.props;
        return (
            <div className={classes.defaultFontStyle + ' ' + classes.infoText}>
                {children}
            </div>
        );
    }
}    

Info.propTypes = {
    classes: PropTypes.object.isRequired,
    children: PropTypes.object.isRequired,
};

export default withStyles(typographyStyle)(Info);

