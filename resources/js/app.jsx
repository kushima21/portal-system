import React from 'react'
import ReactDOM from 'react-dom/client'
import '../css/app.css'

function App() {
    return (
        <div className="min-h-screen flex items-center justify-center bg-gray-100">
            <h1 className="text-4xl font-bold text-blue-600">
                Laravel + React + Tailwind 🚀
            </h1>
        </div>
    )
}

ReactDOM.createRoot(document.getElementById('app')).render(<App />)