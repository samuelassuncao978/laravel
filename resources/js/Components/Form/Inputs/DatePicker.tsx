import React, { ReactNode, useContext, useState } from 'react';
import { ControllerContext } from '../../../Providers/Controller';
import InlineErrors from '../InlineErrors';
import Label from '../Label';
import PrivacyBarrier from '../PrivacyBarrier';
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";

interface DatePickerProperties {
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

export default React.forwardRef<HTMLTextAreaElement, DatePickerProperties>((props, ref): JSX.Element => {
    const { bind = (): object => ({}) } = useContext(ControllerContext);
    const { id, name, label, defer = true, placeholder } = props;

    const [startDate, setStartDate] = useState<Date | null>();

    return (
        <>
            <Label>{label}</Label>
            <div className="relative">
                <div className="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg className="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>
                <DatePicker 
                    className="border-2 border-gray-300 rounded p-2 text-sm outline-none bg-transparent flex-1 w-full" 
                    selected={startDate} 
                    onChange={(date) => setStartDate(date)} 
                    placeholderText={placeholder}
                />
            </div>
        </>
    );
});