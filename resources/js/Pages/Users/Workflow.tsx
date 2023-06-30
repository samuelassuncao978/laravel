import React, { useContext } from 'react';
import { Context, Controller } from '@sihq/ui-components';

import Link from '../../Components/Link';
import Logo from '../../Components/Logo';
import Field from '../../Components/Form/Field';
import Button from '../../Components/Button';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Workflow',
};

const UserWorkflow = Controller(Properties, (): JSX.Element => {
    const { state } = useContext(Context);
    const user = (state.user as any) ?? {};
    return (
        
        <div className="flex flex-col items-center justify-center w-full h-screen bg-blue-500">
            <div className="w-14 h-14 md:h-auto absolute top-8" style={{ filter: 'brightness(0) invert(1)' }}>
                <Logo />
            </div>
            <div className="flex flex-row items-end mb-6 gap-6">
                <h1 className="text-3xl text-white text-center">Welcome, {user?.first_name}!</h1>
                <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20.5" cy="20" r="20" fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M27.1538 20.3385L28.5967 18.8956C28.878 18.6143 29.0275 18.2242 29.0122 17.8111C28.9969 17.398 28.8182 16.9958 28.5153 16.6929C28.2339 16.4114 27.7026 16.1072 27.0623 16.3105L27.922 15.4578C28.0612 15.3185 28.1717 15.1532 28.2471 14.9712C28.3225 14.7892 28.3613 14.5942 28.3613 14.3972C28.3613 14.2002 28.3225 14.0051 28.2471 13.8231C28.1717 13.6412 28.0612 13.4758 27.922 13.3365C27.7827 13.1972 27.6173 13.0867 27.4353 13.0113C27.2533 12.936 27.0583 12.8972 26.8613 12.8972C26.6643 12.8972 26.4693 12.936 26.2873 13.0113C26.1053 13.0867 25.9399 13.1972 25.8006 13.3365L24.8454 14.2994C24.9462 14.095 25 13.8684 25 13.6362C25 13.2384 24.8419 12.8569 24.5606 12.5756C24.2793 12.2943 23.8978 12.1362 23.5 12.1362C23.1021 12.1362 22.7206 12.2943 22.4393 12.5756L17.136 17.8789L17.2964 17.9591L16.9642 17.8789L16.9642 15.8C16.964 15.3838 16.8247 14.9796 16.5685 14.6517C16.3122 14.3237 15.9538 14.0908 15.55 13.9898C15.171 13.8949 14.77 13.9516 14.4322 14.1479C14.0944 14.3441 13.8465 14.6644 13.7412 15.0406C12.7081 18.731 12.1326 20.8551 12.0145 21.4144C11.9897 21.5313 11.9651 21.6482 11.9409 21.7652C11.7406 22.7384 11.785 23.7462 12.0704 24.698C12.3555 25.6492 12.8723 26.5147 13.5743 27.2169L13.5758 27.2184L14.8429 28.4855C15.9681 29.6107 17.4942 30.2429 19.0855 30.2429C20.6768 30.2429 22.203 29.6107 23.3282 28.4855L29.3386 22.4751C29.6199 22.1938 29.7779 21.8123 29.7779 21.4144C29.7779 21.0166 29.6199 20.6351 29.3386 20.3538C29.0573 20.0725 28.6757 19.9144 28.2779 19.9144C27.8801 19.9144 27.4986 20.0725 27.2173 20.3538L27.1538 20.3385Z" fill="#4B84EE" />
                </svg>
            </div>
            <div className="bg-white rounded-2xl border shadow-xl p-8 max-w-lg">
                <div className="flex flex-col items-center space-y-4">
                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="40" cy="40" r="40" fill="#E6EEFD" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M43.6692 23.9743C42.2258 20.8419 37.7742 20.8419 36.3308 23.9743C35.4483 25.8896 33.241 26.8038 31.2627 26.0736C28.0272 24.8793 24.8794 28.0271 26.0737 31.2626C26.804 33.2409 25.8897 35.4482 23.9744 36.3307C20.842 37.7741 20.842 42.2257 23.9744 43.6691C25.8897 44.5516 26.804 46.7589 26.0737 48.7372C24.8794 51.9727 28.0272 55.1205 31.2627 53.9262C33.2411 53.1959 35.4483 54.1102 36.3308 56.0255C37.7742 59.1579 42.2258 59.1579 43.6692 56.0255C44.5517 54.1102 46.759 53.1959 48.7374 53.9262C51.9728 55.1205 55.1207 51.9727 53.9263 48.7372C53.1961 46.7589 54.1103 44.5516 56.0256 43.6691C59.158 42.2257 59.158 37.7741 56.0256 36.3307C54.1103 35.4482 53.1961 33.2409 53.9263 31.2626C55.1207 28.0271 51.9728 24.8793 48.7374 26.0736C46.759 26.8038 44.5517 25.8896 43.6692 23.9743ZM39.9999 47.034C43.8847 47.034 47.0339 43.8847 47.0339 39.9999C47.0339 36.115 43.8847 32.9658 39.9999 32.9658C36.115 32.9658 32.9658 36.115 32.9658 39.9999C32.9658 43.8847 36.115 47.034 39.9999 47.034Z" fill="#4B84EE" />
                    </svg>

                    <h1 className="text-2xl text-black w-4/6 text-center">Set up your profile now</h1>
                    <p className="text-base text-gray-500 text-center w-2/3">So that you can start accepting appointments. Or you can do it later!</p>
                    <div className="flex flex-row-reverse mt-14 items-end gap-6">
                        <button className="text-blue-500 bg-blue-100 py-3 w-40 rounded">
                            <Link variant="primary" to="/">Skip</Link>
                        </button>
                        <button className="bg-blue-500 py-3 w-40 text-white rounded">
                            <Link variant="standard" to="/user-workflow">Set up now</Link>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
});

export default UserWorkflow;