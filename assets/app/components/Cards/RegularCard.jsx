import React from 'react';
import {withStyles, Card, CardContent, CardHeader, CardActions} from '@material-ui/core';
import PropTypes from 'prop-types';
import cx from 'classnames';

import regularCardStyle from '../../jss/material-dashboard-react/regularCardStyle';

class RegularCard extends React.Component {
    constructor(props) {
        super(props);

        this.state = {};
    }
    render() {
        const {
            classes,
            headerColor,
            plainCard,
            cardTitle,
            cardSubtitle,
            content,
            footer
        } = this.props;
        const plainCardClasses = cx({
            [' ' + classes.cardPlain]: plainCard
        });
        const cardPlainHeaderClasses = cx({
            [' ' + classes.cardPlainHeader]: plainCard
        });
        return (
            <Card className={classes.card + plainCardClasses}>
                <CardHeader
                    classes={{
                        root: classes.cardHeader + ' ' + classes[headerColor + 'CardHeader'] + cardPlainHeaderClasses,
                        title: classes.cardTitle,
                        subheader: classes.cardSubtitle
                    }}
                    title={cardTitle}
                    subheader={cardSubtitle}/>
                <CardContent>{content}</CardContent>
                {footer !== undefined
                    ? (
                        <CardActions className={classes.cardActions}>{footer}</CardActions>
                    )
                    : null}
            </Card>
        );
    }
}

RegularCard.defaultProps = {
    headerColor: 'purple'
};

RegularCard.propTypes = {
    plainCard: PropTypes.bool,
    classes: PropTypes.object.isRequired,
    headerColor: PropTypes.oneOf(['orange', 'green', 'red', 'blue', 'purple']),
    cardTitle: PropTypes.node,
    cardSubtitle: PropTypes.node,
    content: PropTypes.node,
    footer: PropTypes.node
};

export default withStyles(regularCardStyle)(RegularCard);
