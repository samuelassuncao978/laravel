interface Props {
    children: JSX.Element;
    expresion: boolean | null | undefined;
}

const Conditional = ({ expresion, children }: Props): JSX.Element | null => {
    return expresion ? children : null;
};

export default Conditional;
