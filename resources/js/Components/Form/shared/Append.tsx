interface Props {
    append?: JSX.Element;
}

export default function Append({ append }: Props): JSX.Element | null {
    return append ? append : null;
}
