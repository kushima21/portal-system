import React from 'react'
import ReactDOM from 'react-dom/client'

function DefaultLayout() {
    return (
        <>
            <div className='h-screen flex bg-white-100'>

                {/* SIDEBAR */}
                <div className='w-[15%] h-full bg-gray-800 shadow-lg flex flex-col'>

                    {/* LOGO */}
                    <div className="flex items-center justify-center p-4 cursor-pointer">
                        <h2 className="text-2xl font-bold text-blue-600">Placida Connect</h2>
                        <span className="ml-5 text-xs text-gray-200">v1.2026.05</span>
                    </div>

                    {/* USER */}
                    <div className='rounded-lg flex w-max h-max pt-1 pb-1 items-center justify-center gap-6 mt-5 px-4 mx-auto hover:bg-gray-700 cursor-pointer'>
                        <i className="fa-solid fa-user text-2xl text-gray-200"></i>

                        <div>
                            <h2 className='text-sm text-gray-200'>John Mark Hondrada</h2>
                            <h2 className='text-sm text-gray-400'>ID:02231</h2>
                        </div>

                        <i className="fa-solid fa-sort text-sm text-gray-400"></i>
                    </div>

                    {/* SCHOOL OVERVIEW */}
                    <div className='rounded-lg w-[90%] h-[4%] bg-gray-700 flex items-center justify-center mt-5 mx-auto cursor-pointer'>
                        <a href='#'>
                            <h2 className='text-sm text-gray-200'>School Overview</h2>
                        </a>
                    </div>

                    {/* SCROLL AREA */}
                    <div className='flex-1 overflow-y-auto mt-5 px-4'>

                        <h2 className='text-sm text-gray-400 mb-3'>MANAGE</h2>

                        <div className='flex flex-col gap-3'>

                            <div className='w-full rounded-lg hover:bg-gray-700 flex items-center justify-center py-2 cursor-pointer'>
                                <h2 className='text-sm text-gray-200'>Classes</h2>
                            </div>

                            <div className='w-full rounded-lg hover:bg-gray-700 flex items-center justify-center py-2 cursor-pointer'>
                                <h2 className='text-sm text-gray-200'>Classroom</h2>
                            </div>

                            <div className='w-full rounded-lg hover:bg-gray-700 flex items-center justify-center py-2 cursor-pointer'>
                                <h2 className='text-sm text-gray-200'>Class Schedule</h2>
                            </div>

                            <div className='w-full rounded-lg hover:bg-gray-700 flex items-center justify-center py-2 cursor-pointer'>
                                <h2 className='text-sm text-gray-200'>Enrollment</h2>
                            </div>

                            <div className='w-full rounded-lg hover:bg-gray-700 flex items-center justify-center py-2 cursor-pointer'>
                                <h2 className='text-sm text-gray-200'>Program</h2>
                            </div>

                            <div className='w-full rounded-lg hover:bg-gray-700 flex items-center justify-center py-2 cursor-pointer'>
                                <h2 className='text-sm text-gray-200'>Curricula</h2>
                            </div>

                            <div className='w-full rounded-lg hover:bg-gray-700 flex items-center justify-center py-2 cursor-pointer'>
                                <h2 className='text-sm text-gray-200'>Subjects</h2>
                            </div>

                            <div className='w-full rounded-lg hover:bg-gray-700 flex items-center justify-center py-2 cursor-pointer'>
                                <h2 className='text-sm text-gray-200'>Enrollment Archived</h2>
                            </div>

                        </div>

                        {/* SECOND SECTION */}
                        <h2 className='text-sm text-gray-400 mt-6 mb-3'>ACCOUNT</h2>

                        <div className='flex flex-col gap-3'>

                            <div className='w-full rounded-lg hover:bg-gray-700 flex items-center justify-center py-2 cursor-pointer'>
                                <h2 className='text-sm text-gray-200'>Users</h2>
                            </div>

                            <div className='w-full rounded-lg hover:bg-gray-700 flex items-center justify-center py-2 cursor-pointer'>
                                <h2 className='text-sm text-gray-200'>Personnels</h2>
                            </div>

                            <div className='w-full rounded-lg hover:bg-gray-700 flex items-center justify-center py-2 cursor-pointer'>
                                <h2 className='text-sm text-gray-200'>Students</h2>
                            </div>

                        </div>

                    </div>

                </div>

                {/* MAIN CONTENT */}
                <div className='w-[85%] h-full bg-white shadow-xl'>

                    <div className='w-full h-full'>

                        {/* HEADER */}
                        <div className='w-full h-[5%] border-b fixed border-gray-200 bg-white z-50'></div>

                        {/* CONTENT */}
                        <div className='w-full h-full pt-[3%]'>
                            
                        </div>

                    </div>

                </div>

            </div>
        </>
    )
}

ReactDOM.createRoot(document.getElementById('default-layout')).render(<DefaultLayout />)