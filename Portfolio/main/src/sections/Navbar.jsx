import React from 'react';

function Navbar(){
    return(
        <header className='fixed top-0 left-0 right-0 z-50 bg-black/90'>
            <div className='max-w-7xl mx-auto'>
                <div className='flex justify-between items-center py-5 nx-auto c-space'>
                    <a href = '/' className='text-neutral-400 fon-bold text-xl hover:text-white transition duration-300'>
                        Abdulsalam
                    </a>
                    <button >
                        <img src= '/assets/menu.svg' alt='toggle' className='w-6 h-6' />
                    </button>
                </div>
            </div>
        </header>
    )
}
export default Navbar;