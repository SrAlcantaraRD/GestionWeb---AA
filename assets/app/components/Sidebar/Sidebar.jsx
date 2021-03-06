import React from 'react';
import PropTypes from 'prop-types';
import {NavLink} from 'react-router-dom';
import cx from 'classnames';
import {
    withStyles,
    Drawer,
    Hidden,
    List,
    ListItem,
    ListItemIcon,
    ListItemText
} from '@material-ui/core';

import {HeaderLinks} from '../../components';

import sidebarStyle from '../../jss/material-dashboard-react/sidebarStyle.jsx';

class Sidebar extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            mobileOpen: false
        };
    }

    // verifies if routeName is the one active (in browser input)
    activeRoute(routeName) {
        return this
            .props
            .location
            .pathname
            .indexOf(routeName) > -1
            ? true
            : false;
    }

    render() {

        const props = this.props;

        const {
            classes,
            color,
            logo,
            image,
            logoText,
            routes
        } = props;

        const imageToRender = image == undefined
            ? null
            : (<div
                className={classes.background}
                style={{
                    backgroundImage: 'url(' + image + ')'
                }}/>
            );

        var links = (
            <List className={classes.list}>
                {routes.map((prop, key) => {
                    if (prop.redirect) 
                        return null;
                    const listItemClasses = cx({
                        [' ' + classes[color]]: this.activeRoute(prop.path)
                    });
                    const whiteFontClasses = cx({
                        [' ' + classes.whiteFont]: this.activeRoute(prop.path)
                    });
                    return (
                        <NavLink
                            to={prop.path}
                            className={classes.item}
                            activeClassName='active'
                            key={key}>
                            <ListItem button className={classes.itemLink + listItemClasses}>
                                <ListItemIcon className={classes.itemIcon + whiteFontClasses}>
                                    <prop.icon/>
                                </ListItemIcon>
                                <ListItemText
                                    primary={prop.sidebarName}
                                    className={classes.itemText + whiteFontClasses}
                                    disableTypography={true}/>
                            </ListItem>
                        </NavLink>
                    );
                })}
            </List>
        );

        var brand = (
            <div className={classes.logo}>
                <a href='https://www.creative-tim.com' className={classes.logoLink}>
                    <div className={classes.logoImage}>
                        <img src={logo} alt='logo' className={classes.img}/>
                    </div>
                    {logoText}
                </a>
            </div>
        );

        return (
            <div>
                <Hidden mdUp>
                    <Drawer variant='temporary' anchor='right' open={props.open} classes={{
                        paper: classes.drawerPaper
                    }} onClose={props.handleDrawerToggle} ModalProps={{
                        keepMounted: true
                    }} // Better open performance on mobile. 
                    >
                        {brand}
                        <div className={classes.sidebarWrapper}>
                            <HeaderLinks/> {links}
                        </div>
                        {imageToRender}
                    </Drawer>
                </Hidden>
                <Hidden smDown>
                    <Drawer
                        anchor='left'
                        variant='permanent'
                        open
                        classes={{
                            paper: classes.drawerPaper
                        }}>
                        {brand}
                        <div className={classes.sidebarWrapper}>{links}</div>
                        {image !== undefined
                            ? (<div
                                className={classes.background}
                                style={{
                                    backgroundImage: 'url(' + image + ')'
                                }}/>
                            )
                            : null}
                    </Drawer>
                </Hidden>
            </div>
        );
    }
}

Sidebar.propTypes = {
    classes: PropTypes.object.isRequired,
    location: PropTypes.object,
};

export default withStyles(sidebarStyle)(Sidebar);
