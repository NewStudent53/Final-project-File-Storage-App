import React, { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import axios from 'axios';
import Validation from './LoginValidation';

function Login() {
    const [values, setValues] = useState({
        email: '',
        password: '',
    });
    const navigate = useNavigate();
    const [errors, setErrors] = useState({});

    const handleInput = (event) => {
        const { name, value } = event.target;
        setValues((prev) => ({ ...prev, [name]: value }));
    };

    const handleSubmit = (event) => {
        event.preventDefault();
        setErrors(Validation(values));

        if (!errors.email && !errors.password) {
            axios
                .post('http://localhost:8081/login', values)
                .then((res) => {
                    if (res.data === 'Success') {
                        navigate('/home');
                    } else {
                        alert('Credenciales incorrectas');
                    }
                })
                .catch((err) => console.log(err));
        }
    };

    return (
        <div className="d-flex justify-content-center align-items-center bg-primary vh-100">
            <div className="bg-white p-3 rounded w-25">
                <h2>Inicio de sesión</h2>
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label htmlFor="email">
                            <strong>Email</strong>
                        </label>
                        <input
                            type="email"
                            placeholder="Ingresa tu correo"
                            name="email"
                            onChange={handleInput}
                            className="form-control rounded-0"
                        />
                        {errors.email && (
                            <span className="text-danger">
                                {errors.email}
                            </span>
                        )}
                    </div>
                    <div className="mb-3">
                        <label htmlFor="password">
                            <strong>Contraseña</strong>
                        </label>
                        <input
                            type="password"
                            placeholder="Ingresa tu contraseña"
                            name="password"
                            onChange={handleInput}
                            className="form-control rounded-0"
                        />
                        {errors.password && (
                            <span className="text-danger">
                                {errors.password}
                            </span>
                        )}
                    </div>
                    <button
                        type="submit"
                        className="btn btn-success w-100 rounded-0"
                    >
                        Iniciar sesión
                    </button>
                    <p/>
                    <Link
                        to="/signup"
                        className="btn btn-default border w-100 bg-light rounded-0 text-decoration-none"
                    >
                        Crear cuenta
                    </Link>
                </form>
            </div>
        </div>
    );
}

export default Login;