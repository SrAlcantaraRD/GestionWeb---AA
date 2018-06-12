import React from "react";
import PropTypes from "prop-types";
import { List, ListItem, withStyles } from "@material-ui/core";

import footerStyle from "../../jss/material-dashboard-react/footerStyle";

class Footer extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
    };
  }

  render(){
    const { classes } = this.props;
    return (
      <footer className={classes.footer}>
        <div className={classes.container}>
          <div className={classes.left}>
            <List className={classes.list}>
              <ListItem className={classes.inlineBlock}>
                <a href="#home" className={classes.block}>
                  Home
                </a>
              </ListItem>
              <ListItem className={classes.inlineBlock}>
                <a href="#company" className={classes.block}>
                  Company
                </a>
              </ListItem>
              <ListItem className={classes.inlineBlock}>
                <a href="#portfolio" className={classes.block}>
                  Portfolio
                </a>
              </ListItem>
              <ListItem className={classes.inlineBlock}>
                <a href="#blog" className={classes.block}>
                  Blog
                </a>
              </ListItem>
            </List>
          </div>
          <p className={classes.right}>
            <span>
              &copy; {1900 + new Date().getYear()}{" "}
              <a href="https://www.linkedin.com/in/gabrielalcantara/" className={classes.a}>
              Gabriel Alcántaras
              </a>, ft Creative TIM
            </span>
          </p>
        </div>
      </footer>
    );
  }
}

Footer.propTypes = {
  classes: PropTypes.object.isRequired
};

export default withStyles(footerStyle)(Footer);
