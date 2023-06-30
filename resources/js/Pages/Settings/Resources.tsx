import { Actionbar, Button, ConclusionBar, Field, Filter, Page, PageHeader, Status, Table } from '../../Components';
import Controller, { ControllerProperties } from '../../Providers/Controller';

import { DocumentAddIcon } from '@heroicons/react/outline';
import React from 'react';
import { ShowDeletedModalsToggle } from '../../Blocks';
import { TrashIcon } from '@heroicons/react/solid';

const Properties = {
    controller: 'App\\Http\\Controllers\\Settings\\Resources',
};

const Resources = Controller(Properties, ({ state }: ControllerProperties): JSX.Element => {
    return (
        <Page>
            <PageHeader title="Resources" description="Manage your resources" />

            <Actionbar.Bar>
                <Actionbar.Item title="Find:">
                    <Field name="test" type="search" variant="opaque-rounded" size="xs" />
                </Actionbar.Item>
                <Actionbar.Item title="Group:">
                    <Filter
                        name="text"
                        options={[
                            { text: 'None', value: 'none' },
                            { text: 'Month', value: 'month' },
                            { text: 'Type', value: 'type' },
                            { text: 'Method', value: 'method' },
                            { text: 'Status', value: 'status' },
                        ]}
                    />
                </Actionbar.Item>
                <ShowDeletedModalsToggle />

                <Actionbar.Item right>
                    <Button size="sm" icon={<DocumentAddIcon />} modal="/settings/resources/create">
                        New resource
                    </Button>
                </Actionbar.Item>
            </Actionbar.Bar>

            <Field name="xx" type="transfer" options={[{ text: 'hello', value: 'hello' }]} />

            <Table.Table>
                <Table.Thead>
                    <tr className="text-gray-400 bg-white z-10 sticky">
                        <Table.Th>Name</Table.Th>
                        <Table.Th>Status</Table.Th>
                        <Table.Th />
                    </tr>
                </Table.Thead>
                <Table.Tbody>
                    {(state?.resources ?? []).map((resource: any) => (
                        <Table.Row key={resource.id} modal={`/settings/resources/${resource.id}`}>
                            <Table.Td>{resource.name}</Table.Td>

                            <Table.Td collapsed clickThrough>
                                <Button
                                    size="xs"
                                    variant="flat-primary"
                                    modal={`/settings/resources/${resource.id}/status`}
                                >
                                    <Status label="Active" variant="green" size="xs" />
                                </Button>
                            </Table.Td>
                            <Table.Td collapsed clickThrough>
                                <Button
                                    size="xs"
                                    variant="flat-destructive"
                                    modal={`/settings/resources/${resource.id}/delete`}
                                    icon={<TrashIcon />}
                                ></Button>
                            </Table.Td>
                        </Table.Row>
                    ))}
                </Table.Tbody>
            </Table.Table>

            <ConclusionBar.Bar>
                <ConclusionBar.Item title={<Status label="Active:" variant="green" size="xs" />}>
                    <div>0</div>
                </ConclusionBar.Item>
                <ConclusionBar.Item title={<Status label="Closed:" variant="gray" size="xs" />}>
                    <div>0</div>
                </ConclusionBar.Item>
            </ConclusionBar.Bar>
        </Page>
    );
});

export default Resources;
