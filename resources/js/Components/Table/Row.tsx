import React from 'react';

import withInteraction from '../../Providers/withInteraction';

interface Props extends React.TdHTMLAttributes<HTMLTableRowElement> {
    action?: VoidFunction | undefined;
}

export default withInteraction(({ children, action }: Props): JSX.Element => {
    return (
        <tr onClick={action} className="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer">
            {children}
        </tr>
    );
});
