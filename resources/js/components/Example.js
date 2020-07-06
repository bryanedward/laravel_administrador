 import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Example extends Component{
    constructor(props){
        super(props);
        this.state = {contador : this.props.contadorInicial};
        setInterval(() =>{
            this.setState({contador : this.state.contador + 1})
        },6000)
    }

    
    render(){
        const {
            ciudades,
            numeros,
            title,
            pass } = this.props

        const aprobado = pass ? "Pasamos" : "Perdimos"

        return (
            <div className="container"> 
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">
                            <div>
                                {title}
                                <p>{ciudades.dataOne}</p>   
                                <p>{numeros.join(' ')}</p>
                                <p>{aprobado}</p>
                                <ClaseContador contar = {this.state.contador}/> 
                            </div>
                            
                            </div>
                            <div className="card-body">
                                Hola mi nombre es  Bryan estoy trabajando con laravel y React.js !
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

Example.defaultProps = {
    // valores por defecto de la clase Example
    contadorInicial : 1    
}


class ClaseContador extends Component{    
    render(){
        return (
            <h4>{this.props.contar}</h4>
        )
    }
}


export default class Data extends Component{
    render(){
        return (
            <Example
            numeros = {[2, 3]}
            ciudades = {{ dataOne : 'manta', 
                            dataTwo : 'guayaquil'}}
            nombre = "pablo"
            metooMulti = { function(item){ return item * 3}}
            title = {<h1>Hola mundo !!!</h1>}
            pass = {false}/>                
        )
    }
}



if (document.getElementById('example')) {
    ReactDOM.render(<Data />, document.getElementById('example'));
}
