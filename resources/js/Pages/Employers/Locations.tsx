import { Actionbar, Button, ConclusionBar, Field, Filter, Status, Table } from '../../Components';
import { ClipboardCopyIcon, DocumentAddIcon, QrcodeIcon } from '@heroicons/react/outline';
import Controller, { ControllerProperties } from '../../Providers/Controller';

import React from 'react';
import { ShowDeletedModalsToggle } from '../../Blocks';
import { TrashIcon } from '@heroicons/react/solid';
import { useParams } from 'react-router-dom';

const Properties = {
    controller: 'App\\Http\\Controllers\\Employers\\Locations',
    parameters: ['employerId'],
};

const Locations = Controller(Properties, ({ state }: ControllerProperties): JSX.Element => {
    const { employerId } = useParams();
    return (
        <>
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
                    <Button size="sm" icon={<DocumentAddIcon />} modal={`/employers/${employerId}/locations/create`}>
                        New location
                    </Button>
                </Actionbar.Item>
            </Actionbar.Bar>

            <Table.Table>
                <Table.Thead>
                    <tr className="text-gray-400 bg-white z-10 sticky">
                        <Table.Th></Table.Th>
                        <Table.Th>Name</Table.Th>
                        <Table.Th>Clients</Table.Th>
                        <Table.Th>Status</Table.Th>
                        <Table.Th />
                    </tr>
                </Table.Thead>
                <Table.Tbody>
                    {(state?.locations ?? []).map((location: any) => (
                        <Table.Row key={location.id} to={`/employers/${state?.employer?.id}/locations/${location.id}`}>
                            <Table.Td collapsed clickThrough>
                                <span className="flex items-center w-32 space-x-1">
                                    <Button
                                        size="xs"
                                        variant="flat-primary"
                                        modal={`/employers/${state?.employer?.id}/locations/${location.id}/share`}
                                        icon={<QrcodeIcon />}
                                    ></Button>
                                    <span className="text-xs flex px-2 pr-1 flex-grow py-1 group   hover:bg-gray-600 hover:text-white rounded">
                                        <span className="select-all truncate">2355-1654</span>
                                        <span className="h-4 w-4 ml-1 flex-shrink-0 opacity-0 group-hover:opacity-100">
                                            <ClipboardCopyIcon />
                                        </span>
                                    </span>
                                </span>
                            </Table.Td>
                            <Table.Td>{location.name}</Table.Td>
                            <Table.Td collapsed clickThrough>
                                <Button
                                    size="xs"
                                    variant="flat-primary"
                                    modal={`/employers/${state?.employer?.id}/locations/${location.id}/share`}
                                >
                                    <span className="flex font-normal space-x-1">
                                        <span className="font-bold">0</span>
                                        <span>Clients</span>
                                    </span>
                                </Button>
                            </Table.Td>
                            <Table.Td collapsed clickThrough>
                                <Button
                                    size="xs"
                                    variant="flat-primary"
                                    modal={`/employers/${state?.employer?.id}/locations/${location.id}/status`}
                                >
                                    <Status label="Active" variant="green" size="xs" />
                                </Button>
                            </Table.Td>
                            <Table.Td collapsed clickThrough>
                                <Button
                                    size="xs"
                                    variant="flat-destructive"
                                    modal={`/employers/${state?.employer?.id}/locations/${location.id}/delete`}
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
        </>
    );
});

export default Locations;
