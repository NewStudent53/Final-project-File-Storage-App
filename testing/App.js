import Login from './login'
import Register from './register'
import Switchform from './switchform'
import {BrowserRouter, Routes, Route} from 'react-router-dom'

function App() {
    return(
        <BrowserRouter>
            <Routes>
                <Route path='/' element={<Login/>}></Route>
                <Route path='/register' element={<Register/>}></Route>
                <Route path='/home' element={<Home/>}></Route>
            </Routes>
        </BrowserRouter>
    )
}

export default App