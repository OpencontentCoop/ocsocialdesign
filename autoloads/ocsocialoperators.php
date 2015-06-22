<?php

class OCSocialOperators
{
    function operatorList()
    {
        return array(
            'social_pagedata',
            'objectstate_by_id',
            'bracket_to_strong'
        );
    }

    function namedParameterPerOperator()
    {
        return true;
    }

    function namedParameterList()
    {
        return array();
    }

    function modify( $tpl, $operatorName, $operatorParameters, $rootNamespace, $currentNamespace, &$operatorValue, $namedParameters )
    {
        switch ( $operatorName )
        {
            case 'social_pagedata':
            {
                $operatorValue = OCSocialPageDataBase::instance();
            } break;

            case 'bracket_to_strong':
            {
                $operatorValue = ObjectHandlerServiceControlSensor::replaceBracket( $operatorValue );
            } break;

            case 'objectstate_by_id';
            {
                $id = $operatorValue;
                $state = eZContentObjectState::fetchById( $id );
                if ( $state instanceof eZContentObjectState )
                {
                    $operatorValue = $state;
                }
            } break;
        }
    }
} 