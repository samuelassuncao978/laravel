import { createContext } from 'react';

interface EditorContext {
    selected: null | string;
}

export default createContext<EditorContext>({
    selected: null,
});
