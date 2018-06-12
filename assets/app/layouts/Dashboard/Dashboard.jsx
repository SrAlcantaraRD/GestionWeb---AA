import React from "react";
import PropTypes from "prop-types";
import { Switch, Route, Redirect } from "react-router-dom";
// creates a beautiful scrollbar
import PerfectScrollbar from "perfect-scrollbar";
import "perfect-scrollbar/css/perfect-scrollbar.css";
import { withStyles } from "@material-ui/core";

import { Header, Footer, Sidebar } from "../../components";

import dashboardRoutes from "../../routes/dashboard.jsx";

import appStyle from "../../jss/material-dashboard-react/appStyle.jsx";

import image from "../../img/sidebar-2.jpg";
import logo from "../../img/reactlogo.png";

const switchRoutes = (
  <Switch>
    {dashboardRoutes.map((prop, key) => {
      if (prop.redirect)
        return <Redirect from={prop.path} to={prop.to} key={key} />;
      return <Route path={prop.path} component={prop.component} key={key} />;
    })}
  </Switch>
);

class App extends React.Component {
    constructor(props) {
        super(props);
        
        this.state = {
            mobileOpen: false
        };
    }

    handleDrawerToggle() {
        this.setState({ mobileOpen: !this.state.mobileOpen });
    };

    componentDidMount() {
        if(navigator.platform.indexOf('Win') > -1){
        // eslint-disable-next-line
        const ps = new PerfectScrollbar(this.refs.mainPanel);
        }
    }

    componentDidUpdate() {
        this.refs.mainPanel.scrollTop = 0;
    }

    render() {
        const classes = this.props.classes;
        const props = this.props;
        return (
            <div className={classes.wrapper}>
                <Sidebar
                routes={dashboardRoutes}
                logoText={"Gestión Web"}
                logo={logo}
                image={image}
                handleDrawerToggle={this.handleDrawerToggle}
                open={this.state.mobileOpen}
                color="blue"
                {...props}
                />
                <div className={classes.mainPanel} ref="mainPanel">
                    <Header
                        routes={dashboardRoutes}
                        handleDrawerToggle={this.handleDrawerToggle}
                        {...props}
                        {...classes}
                    />
                    {/* 
                        On the /maps route we want the map to be on full screen - this is not possible if the content and 
                        conatiner classes are present because they have some paddings which would make the map smaller 
                    */}
                    <div className={classes.content}>
                        <div className={classes.container}>
                            {switchRoutes}
                        </div>
                    </div>
                    <Footer {...classes} />
                </div>
            </div>
        )
    }
}

App.propTypes = {
    classes: PropTypes.object.isRequired
};

export default withStyles(appStyle)(App);
