interface Props {
    prepend?: JSX.Element;
}

export default function Prepend({ prepend }: Props): JSX.Element | null {
    return prepend ? prepend : null;
}
