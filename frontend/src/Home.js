import React from 'react';
import ReactDOM from 'react-dom/client';
import './App.css';
import Header from './components/Header';
import Sidebar from './components/Sidebar';

function Home() {
    return(
        <>
            <Header/>
            <div className='App'>
                <Sidebar/>
            </div>
        </>
    )
}

export default Home