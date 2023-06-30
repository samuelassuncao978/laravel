import { BrowserRouter, Route, Routes, useLocation } from 'react-router-dom';

import Account from './Pages/Settings/Account';
import Admin from './Layouts/Admin';
import Appointments from './Pages/Settings/Appointments';
import Appointment from './Pages/Appointment/Appointment';
import Authentication from './Layouts/Authentication';
import Billing from './Pages/Settings/Billing';
import Calendar from './Pages/Calendar/Calendar';
import ClientFiles from './Pages/Files/ClientFiles';
import Create from './Pages/Users/Create';
import CreateVoucher from './Pages/Vouchers/Create';
import Dashboard from './Pages/Dashboard/Dashboard';
import UserWorkflow from './Pages/Users/UserWorkflow';
import DocumentStep from './Pages/Users/DocumentStep';
import BillingStep from './Pages/Users/BillingStep';
import AvailabilityStep from './Pages/Users/AvailabilityStep';
import DoneStep from './Pages/Users/DoneStep';
import Delete from './Pages/Users/Delete';
import E404 from './Errors/404';
import Edit from './Pages/Users/Edit';
// Employers
import Employers from './Pages/Employers/Employers';
import EmployersCreate from './Pages/Employers/Create';
import EmployersEmployer from './Pages/Employers/Employer';
import EmployersLocations from './Pages/Employers/Locations';
import Files from './Pages/Files/Files';
import { Helmet } from 'react-helmet';
import LocationsCreate from './Pages/Locations/Create';
// Locations
import LocationsDelete from './Pages/Locations/Delete';
import LocationsShare from './Pages/Locations/Share';
import LocationsStatus from './Pages/Locations/Status';
import Login from './Pages/Authentication/Login';
import Logout from './Pages/Authentication/Logout';
import MyFiles from './Pages/Files/MyFiles';
import Notes from './Pages/Notes/Notes';
import Note from './Pages/Notes/Note';
import NoteEdit from './Pages/Notes/NoteEdit';
import NoteCreate from './Pages/Notes/NoteCreate';
import NoteDelete from './Pages/Notes/Delete';
import Preview from './Pages/Settings/Preview';
import React from 'react';
import { Reactive } from '@sihq/ui-components';
import Reports from './Pages/Reports/Reports';
import Resources from './Pages/Settings/Resources';
// Resources
import ResourcesCreate from './Pages/Resources/Create';
// Settings
import Settings from './Pages/Settings/Settings';
import Tenant from './Pages/Tenants/Tenant';
import TenantInvoices from './Pages/Tenants/Invoices';
import TenantOverview from './Pages/Tenants/Overview';
import TenantSettings from './Pages/Tenants/Settings';
// Tenants
import Tenants from './Pages/Tenants/Tenants';
import TenantsCreate from './Pages/Tenants/Create';
import TenantsDelete from './Pages/Tenants/Delete';
import TenantsEnterMaintenance from './Pages/Tenants/EnterMaintenance';
import TenantsSuspend from './Pages/Tenants/Suspend';
// Users
import Users from './Pages/Users/Users';
import Vouchers from './Pages/Settings/Vouchers';
import Workflow from './Pages/Users/Workflow';



const Router = (): JSX.Element => {
    const location = useLocation();
    const { from } = (location?.state as any) ?? {};
    return (
        <>
            <Routes location={from || location}>
                <Route path="/" element={<Authentication />}>
                    <Route path="login" element={<Login />} />
                    <Route path="logout" element={<Logout />} />
                </Route>
                <Route path="workflow" element={<Workflow />} />
                <Route path="/" element={<Admin />}>
                    <Route path="user-workflow" element={<UserWorkflow />} />
                    <Route path="done-step" element={<DoneStep />} />

                    <Route path="employers" element={<Employers />}>
                        <Route path=":employerId" element={<EmployersEmployer />}>
                            <Route path="locations" element={<EmployersLocations />} />
                            <Route path="delete" element={<Delete />} />
                        </Route>
                    </Route>
                    <Route path="users" element={<Users />}>
                        <Route path="create" element={<Create />} />
                        <Route path=":userId" element={<Edit />}>
                            <Route path="delete" element={<Delete />} />
                        </Route>
                    </Route>
                    <Route path="tenants" element={<Tenants />}>
                        <Route path=":tenantId" element={<Tenant />}>
                            <Route index element={<TenantOverview />} />
                            <Route path="invoices" element={<TenantInvoices />} />
                            <Route path="settings" element={<TenantSettings />} />
                            <Route path="plugins" element={<TenantOverview />} />
                        </Route>
                    </Route>
                    <Route index element={<Dashboard />} />
                    <Route path="/calendar" element={<Calendar />} />
                    <Route path="/appointments" element={<Appointment />} />
                    <Route path="/files/*" element={<Files />}>
                        <Route index element={<MyFiles />} />
                        <Route path="client-files" element={<ClientFiles />} />
                    </Route>
                    <Route path="notes" element={<Notes />}>
                        <Route path=":noteId" element={<Note />}>
                            <Route path="edit" element={<NoteEdit />} />
                            <Route path="delete" element={<Delete />} />
                        </Route>
                    </Route>
                    <Route path="/reports" element={<Reports />} />
                    <Route path="/settings" element={<Settings />}>
                        <Route path="account" element={<Account />} />
                        <Route path="billing" element={<Billing />} />
                        <Route path="appointments" element={<Appointments />} />
                        <Route path="vouchers" element={<Vouchers />} />
                        <Route path="notifications" element={<ClientFiles />} />
                        <Route path="appearance" element={<ClientFiles />} />
                        <Route path="intergrations" element={<ClientFiles />} />
                        <Route path="policies" element={<ClientFiles />} />
                        <Route path="user-roles" element={<ClientFiles />} />
                        <Route path="appointment-types" element={<ClientFiles />} />
                        <Route path="appointment-methods" element={<ClientFiles />} />
                        <Route path="resources" element={<Resources />} />
                    </Route>
                </Route>

                <Route path="/preview" element={<Preview />} />
                <Route path="*" element={<E404 />} />
            </Routes>
            {/* Modals */}
            <Routes>
                <Route path="/users/create" element={<Create />} />
                <Route path="/settings/vouchers/create" element={<CreateVoucher />} />
                <Route path="/settings/resources/create" element={<ResourcesCreate />} />
                <Route path="/settings/resources/:resourceId" element={<ResourcesCreate />} />
                <Route path="/employers/create" element={<EmployersCreate />} />
                <Route path="/employers/:employerId/locations/create" element={<LocationsCreate />} />

                <Route path="/employers/:employerId/locations/:locationId/delete" element={<LocationsDelete />} />
                <Route path="/employers/:employerId/locations/:locationId/share" element={<LocationsShare />} />
                <Route path="/employers/:employerId/locations/:locationId/status" element={<LocationsStatus />} />

                <Route path="/tenants/create" element={<TenantsCreate />} />
                <Route path="/tenants/:tenantId/suspend" element={<TenantsSuspend />} />
                <Route path="/tenants/:tenantId/enter-maintenance" element={<TenantsEnterMaintenance />} />
                <Route path="/tenants/:tenantId/delete" element={<TenantsDelete />} />

                <Route path="/notes/create" element={<NoteCreate />} />
                <Route path="/notes/:noteId/edit" element={<NoteEdit />} />
                <Route path="/notes/:noteId/delete" element={<NoteDelete />} />
            </Routes>
        </>
    );
};
export default (): JSX.Element => {
    return (
        <BrowserRouter>
            <Helmet>
                <link rel="icon" type="image/png" href="favicon.ico" sizes="16x16" />
                <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
                <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
                <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
                <link rel="manifest" href="/site.webmanifest" />
                <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5" />
                <meta name="msapplication-TileColor" content="#ffffff" />
                <meta name="theme-color" content="#ffffff" />
            </Helmet>
            <Reactive debug={true}>
                <Router />
            </Reactive>
        </BrowserRouter>
    );
};
