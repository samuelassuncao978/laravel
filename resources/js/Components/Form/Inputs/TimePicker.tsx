import React, { ReactNode, useContext, useState } from 'react';
import { ControllerContext } from '../../../Providers/Controller';
import InlineErrors from '../InlineErrors';
import Label from '../Label';
import PrivacyBarrier from '../PrivacyBarrier';
import DatePicker from "react-datepicker";
import { ClockIcon } from '@heroicons/react/outline';
import "react-datepicker/dist/react-datepicker.css";

interface TimePickerProperties {
    id?: string;
    label?: string;
    name: string;
    type: string;
    defer?: boolean;
    prepend?: ReactNode;
    append?: ReactNode;
    size?: string;
    variant?: string;
    placeholder? : string;
}

export default React.forwardRef<HTMLTextAreaElement, TimePickerProperties>((props, ref): JSX.Element => {
    const { bind = (): object => ({}) } = useContext(ControllerContext);
    const { id, name, label, defer = true, placeholder } = props;

    const [startDate, setStartDate] = useState<Date | null>();

    return (
        <>
            <Label>{label}</Label>
            <div className="relative">
                <DatePicker 
                    className="border-2 border-gray-300 rounded p-2 text-sm outline-none bg-transparent flex-1 w-full" 
                    selected={startDate} 
                    onChange={(date) => setStartDate(date)} 
                    showTimeSelect
                    showTimeSelectOnly
                    timeIntervals={60}
                    timeCaption="Time"
                    dateFormat="h:mm aa"
                    placeholderText={placeholder}
                />
            </div>
        </>
    );
});
