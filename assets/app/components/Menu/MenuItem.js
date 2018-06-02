import React, {PropTypes} from 'react';
import { Link } from 'react-router';

export default class MenuItem extends React.Component {
  handleChange(id) {
    this.props.changeActiveScreen(id);
  }
  render() {
    const link = this.props.link;
    const id = this.props.id;
    const className = this.props.estat + (this.props.active ? " active" : "");
    return (
      <li className={ className } onClick={ () => this.handleChange(link.substring(1))}>
        <Link to={ link } id={ id }><span>{ this.props.title }</span></Link>
      </li>

    );
  }
}

MenuItem.propTypes = {
  link: PropTypes.string,
  id: PropTypes.string,
  active: PropTypes.bool,
  estat: PropTypes.string,
  title: PropTypes.string,
  changeActiveScreen: PropTypes.func.isRequired
};