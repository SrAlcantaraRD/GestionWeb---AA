import React from 'react';
import {Link } from "react-router-dom";

class PageNotFound extends React.Component {

  render() {
      return (
        <section id="PageNotFound" className="centered">
          <span className="subtitle">Codi 404</span>
          <h1 className="large thin accent">Pàgina no trobada</h1>
          <div className="circle_icon incidencia"></div>
          <p>L'aplicatiu ha trobat un problema amb la seva sol·licitud. Si creu que es tracta d'un error de l'aplicatiu pot contactar amb <a href="mailto:admin@marquesines.cat">admin@marquesines.cat</a>.</p>
          <p>Pot <a href="/">tornar a l'inici</a> o fer servir la barra de navegació per trobar la pàgina que cerca.</p>
          <div><Link to="/" className="btn">Tornar a l'inici</Link></div>
        </section>
      );
  }
}

export default (PageNotFound);
