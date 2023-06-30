import { BanIcon, DatabaseIcon, ShieldExclamationIcon, TrashIcon, ViewBoardsIcon } from '@heroicons/react/outline';

import Actionbar from '../../Components/Actionbar';
import Button from '../../Components/Button';
import Controller from '../../Providers/Controller';
import React from 'react';
import { useParams } from 'react-router-dom';

const Properties = {
    controller: 'App\\Http\\Controllers\\Tenants\\Tenant',
    properties: ['tenantId'],
};

const Overview = Controller(Properties, (): JSX.Element => {
    const { tenantId } = useParams();

    return (
        <>
            <Actionbar.Bar>
                <Actionbar.Item right>
                    <Button size="sm" icon={<DatabaseIcon />}>
                        Access database
                    </Button>
                </Actionbar.Item>
                <Actionbar.Item>
                    <div className="flex space-x-2">
                        <Button size="sm" icon={<BanIcon />} modal={`/tenants/${tenantId}/suspend`}>
                            Suspend
                        </Button>
                        <Button
                            size="sm"
                            icon={<ShieldExclamationIcon />}
                            modal={`/tenants/${tenantId}/enter-maintenance`}
                        >
                            Enter maintenance
                        </Button>
                        <Button size="sm" icon={<TrashIcon />} modal={`/tenants/${tenantId}/delete`}>
                            Delete
                        </Button>
                    </div>
                </Actionbar.Item>
                <Actionbar.Item>
                    <Button size="sm" icon={<ViewBoardsIcon />}>
                        Plan
                    </Button>
                </Actionbar.Item>

                <Actionbar.Item>
                    <Button size="sm" variant="primary">
                        Save changes
                    </Button>
                </Actionbar.Item>
            </Actionbar.Bar>
            Overview
        </>
    );
});

export default Overview;
