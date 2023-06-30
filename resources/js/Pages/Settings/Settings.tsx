import React from 'react';
import { Outlet } from 'react-router-dom';
import Header from '../../Components/Sidebar/Header';
import Sidebar from '../../Components/Sidebar/Sidebar';
import Content from '../../Components/Sidebar/Content';
import Controller from '../../Providers/Controller';
import Tab from '../../Components/Sidebar/Tab';
import Spacer from '../../Components/Sidebar/Spacer';
import {
    BellIcon,
    BookmarkAltIcon,
    CashIcon,
    ColorSwatchIcon,
    DesktopComputerIcon,
    DocumentIcon,
    IdentificationIcon,
    PhotographIcon,
    PuzzleIcon,
    ShieldCheckIcon,
    UsersIcon,
} from '@heroicons/react/outline';

const Properties = {
    controller: 'App\\Http\\Controllers\\Users\\Users',
};
const Component = Controller(Properties, (): JSX.Element => {
    return (
        <>
            <Sidebar>
                <Header title="Settings" />
                <Content>
                    <div className="space-y-2">
                        <Tab
                            to="/settings/account"
                            title="Account"
                            caption="Manage your account"
                            icon={<UsersIcon />}
                        />
                        <Tab
                            to="/settings/billing"
                            title="Billing"
                            caption="Manage your billing &amp; payments"
                            icon={<CashIcon />}
                        />
                        <Tab
                            to="/settings/appointments"
                            title="Appointments"
                            caption="Appointment types &amp; methods"
                            icon={<BookmarkAltIcon />}
                        />
                    </div>
                    <Spacer />
                    <div className="space-y-2">
                        <Tab
                            to="/settings/vouchers"
                            title="Vouchers"
                            caption="Manage your vouchers"
                            icon={<CashIcon />}
                        />
                        <Tab
                            to="/settings/notifications"
                            title="Notifications"
                            caption="Manage your notifications"
                            icon={<BellIcon />}
                        />
                        <Tab
                            to="/settings/appearance"
                            title="Appearance"
                            caption="Manage your appearance"
                            icon={<PhotographIcon />}
                        />
                        <Tab
                            to="/settings/intergrations"
                            title="Intergrations"
                            caption="Manage intergrations"
                            icon={<PuzzleIcon />}
                        />
                        <Tab
                            to="/settings/policies"
                            title="Policies"
                            caption="Manage policies"
                            icon={<ShieldCheckIcon />}
                        />
                    </div>
                    <div className="text-xs font-semibold text-gray-600 uppercase tracking-wide text-left pt-5 ml-3 mr-1 flex items-center">
                        Configuration
                    </div>
                    <div className="space-y-2">
                        <Tab
                            to="/settings/user-roles"
                            title="Roles"
                            caption="Manage roles"
                            icon={<IdentificationIcon />}
                        />
                        <Tab
                            to="/settings/appointment-types"
                            title="Appointment Types"
                            caption="Manage appointment methods"
                            icon={<ColorSwatchIcon />}
                        />
                        <Tab
                            to="/settings/appointment-methods"
                            title="Appointment Methods"
                            caption="Manage appointment types"
                            icon={<DesktopComputerIcon />}
                        />
                        <Tab
                            to="/settings/resources"
                            title="Resources"
                            caption="Manage resources"
                            icon={<DocumentIcon />}
                        />
                    </div>
                </Content>
            </Sidebar>
            <div className="flex-1 flex flex-col overflow-auto">
                <Outlet />
            </div>
        </>
    );
});

const Settings = (): JSX.Element => {
    return <Component />;
};
export default Settings;
