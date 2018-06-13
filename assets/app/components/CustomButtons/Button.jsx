import React from 'react';
import {withStyles, Button} from '@material-ui/core';
import PropTypes from 'prop-types';
import cx from 'classnames';

import buttonStyle from '../../jss/material-dashboard-react/buttonStyle';

class RegularButton extends React.Component {
    constructor(props) {
        super(props);

        this.state = {};
    }
    render() {
        const {
            classes,
            color,
            round,
            children,
            fullWidth,
            disabled,
            rest
        } = this.props;
        const btnClasses = cx({
            [classes[color]]: color,
            [classes.round]: round,
            [classes.fullWidth]: fullWidth,
            [classes.disabled]: disabled
        });
        return (
            <Button {...rest} className={classes.button + ' ' + btnClasses}>
                {children}
            </Button>
        );
    }
}

RegularButton.propTypes = {
    classes: PropTypes.object.isRequired,
    children: PropTypes.object,
    rest: PropTypes.object,
    color: PropTypes.oneOf([
        'primary',
        'info',
        'success',
        'warning',
        'danger',
        'rose',
        'white',
        'simple',
        'transparent'
    ]),
    round: PropTypes.bool,
    fullWidth: PropTypes.bool,
    disabled: PropTypes.bool
};

export default withStyles(buttonStyle)(RegularButton);
