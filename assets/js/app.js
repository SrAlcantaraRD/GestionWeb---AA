import React from 'react';
import ReactDOM from 'react-dom';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';

import ItemCard from './Components/ItemCard';
import { withStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import Delete from '@material-ui/icons/Delete';

class App extends React.Component {
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

  handleOpen() {
    <Route path='/about' component={About} />
    alert("Al");
  }

  render() {
    return (
      <MuiThemeProvider>
        <div style={{ display: 'flex' }}>
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

      <Button variant="raised" color="secondary" onClick={this.handleOpen} path="logout">
        Logout
        <Delete />
      </Button>
      </MuiThemeProvider>
    );
  }
}

ReactDOM.render(<App />, document.getElementById('root'));