import React from 'react';
import ReactDOM from 'react-dom';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';

import ItemCard from './components/ItemCard';
import { withStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import Delete from '@material-ui/icons/Delete';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";

class App2 extends React.Component {
  constructor() {
    super();

    this.state = {
      entries: []
    };
  }

  componentDidMount() {
    fetch('/api/data')
      .then(response => response.json())
      .then(entries => {
        this.setState({
          entries
        });
      });
  }

  logOut(){
    
  }
  
  render() {
    return (
      <MuiThemeProvider>
        <div id="admin-container" className="has_top_menu has_main_menu has_footer">
          <div className="page" style={{ display: 'flex' }}>
            {this.state.entries.map(
              ({ id, author, avatarUrl, title, description }) => (
                <ItemCard
                  key={id}
                  author={author}
                  title={title}
                  avatarUrl={avatarUrl}
                  style={{ flex: 1, margin: 10 }}
                >
                  {description}
                </ItemCard>
              )
            )}
          </div>


        <Button variant="raised" color="secondary" path="logout" onClick={this.logOut()}>
          <Router path={'/logout'} exact={true} >
            <Link to={ '/logout' }><span>Logout</span></Link> 
          </Router>
          <Delete />
        </Button>
        </div>
      </MuiThemeProvider>
    );
  }
}

export default App2