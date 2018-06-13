import React from 'react';
import PropTypes from 'prop-types';
import {Menu} from '@material-ui/icons';
import {
    withStyles,
    AppBar,
    Toolbar,
    IconButton,
    Hidden,
    Button
} from '@material-ui/core';
import cx from 'classnames';

import headerStyle from '../../jss/material-dashboard-react/headerStyle.jsx';

import HeaderLinks from './HeaderLinks';

class Header extends React.Component {
    constructor(props) {
        super(props);

        console.log('this.props');
        console.log(this.props);
        this.state = {};
    }

    makeBrand() {
        var name;
        const props = this.props;
        props
            .routes
            .map((route) => {
                if (route.path === props.location.pathname) {
                    name = route.navbarName;
                }
                return null;
            });
        return name;
    }

    render() {
        const {classes, color} = this.props;
        const appBarClasses = cx({
            [' ' + classes[color]]: color
        });
        console.log('header');
        console.log(classes);
        return (
            <AppBar className={classes.appBar + appBarClasses}>
                <Toolbar className={classes.container}>
                    <div className={classes.flex}>
                        {/* Here we create navbar brand, based on route name */}
                        <Button href='#' className={classes.title}>
                            {this.makeBrand()}
                        </Button>
                    </div>
                    <Hidden smDown implementation='css'>
                        <HeaderLinks/>
                    </Hidden>
                    <Hidden mdUp>
                        <IconButton
                            className={classes.appResponsive}
                            color='inherit'
                            aria-label='open drawer'
                            onClick={this.props.handleDrawerToggle}>
                            <Menu/>
                        </IconButton>
                    </Hidden>
                </Toolbar>
            </AppBar>
        );
    }
}

Header.propTypes = {
    classes: PropTypes.object.isRequired,
    handleDrawerToggle: PropTypes.func,
    color: PropTypes.oneOf(['primary', 'info', 'success', 'warning', 'danger'])
};

export default withStyles(headerStyle)(Header);
