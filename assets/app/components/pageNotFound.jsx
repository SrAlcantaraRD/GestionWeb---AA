import React from 'react';
import {Link} from 'react-router-dom';

class PageNotFound extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <section id='PageNotFound' className='centered'>
                <span className='subtitle'>
                    Codido 404
                </span>
                <h1 className='large thin accent'>
                    Página no encontrada
                </h1>
                <div className='circle_icon incidencia'></div>
                <p>
                    La aplicación no puede dar respuesta a su solicitud. 
                    Si cree que esto es un error de la aplicación puede ponerse en contacto con
                    <a href='mailto:gabrielalcantara.93@gmail.com'>
                        gabrielalcantara.93@gmail.com
                    </a>.
                </p>
                <p>Pot
                    <a href='/'>Volver al inicio</a>
                    o fer servir la barra de navegació per trobar la pàgina que cerca.
                </p>
                <div>
                    <Link to='/' className='btn'>Volver al inicio</Link>
                </div>
            </section>
        );
    }
}

export default(PageNotFound);
