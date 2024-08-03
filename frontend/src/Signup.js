import React, { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import Validation from './SignupValidation';
import axios from 'axios';

function Signup() {
    const [values, setValues] = useState({
        name: '',
        email: '',
        password: '',
    });
    const navigate = useNavigate();
    const [errors, setErrors] = useState({});

    const handleInput = (event) => {
        const { name, value } = event.target;
        setValues((prev) => ({ ...prev, [name]: value }));
    };

    const handleSubmit = async (event) => {
        event.preventDefault();
        setErrors(Validation(values));

        if (!errors.name && !errors.email && !errors.password) {
            try {
                await axios.post('http://localhost:8081/signup', values);
                navigate('/');
            } catch (err) {
                console.error('Error signing up:', err);
            }
        }
    };

    return (
        <div className="d-flex justify-content-center align-items-center bg-primary vh-100">
            <div className="bg-white p-3 rounded w-25">
                <h2>Creaci&oacute;n de usuario</h2>
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label htmlFor="name">
                            <strong>Nombre</strong>
                        </label>
                        <input
                            type="text"
                            placeholder="Enter Name"
                            name="name"
                            onChange={handleInput}
                            className="form-control rounded-0"
                        />
                        {errors.name && (
                            <span className="text-danger">{errors.name}</span>
                        )}
                    </div>
                    <div className="mb-3">
                        <label htmlFor="email">
                            <strong>Email</strong>
                        </label>
                        <input
                            type="email"
                            placeholder="Enter Email"
                            name="email"
                            onChange={handleInput}
                            className="form-control rounded-0"
                        />
                        {errors.email && (
                            <span className="text-danger">{errors.email}</span>
                        )}
                    </div>
                    <div className="mb-3">
                        <label htmlFor="password">
                            <strong>Contrase&ntilde;a</strong>
                        </label>
                        <input
                            type="password"
                            placeholder="Enter Password"
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
                        <strong>Crear usuario</strong>
                    </button>
                    <p/>
                    <Link
                        to="/"
                        className="btn btn-default border w-100 bg-light rounded-0 text-decoration-none"
                    >
                        Inicio de sesi&oacute;n
                    </Link>
                </form>
            </div>
        </div>
    );
}

export default Signup;