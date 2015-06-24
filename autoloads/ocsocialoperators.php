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
        return array(
            'social_pagedata' => array(
                'context' => array( 'type' => 'string', 'required' => false, 'default' => null )
            )
        );
    }

    function modify( $tpl, $operatorName, $operatorParameters, $rootNamespace, $currentNamespace, &$operatorValue, $namedParameters )
    {
        switch ( $operatorName )
        {
            case 'social_pagedata':
            {
                $operatorValue = OCSocialPageDataBase::instance( $namedParameters['context'] );
            } break;

            case 'bracket_to_strong':
            {
                $string = str_replace( '[', '<strong>', $operatorValue );
                $string = str_replace( ']', '</strong>', $string );
                $operatorValue = $string;
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
        return false;
    }
} 