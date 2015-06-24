<?php

class OCSocialPageDataBase implements OCPageDataHandlerInterface
{
    protected $handler;

    protected function __construct( OCPageDataHandlerInterface $handler = null )
    {
        if ( $handler == null )
        {
            $handler = $this;
        }
        $this->handler = $handler;
    }

    public static function findContext()
    {
        if ( eZINI::instance( 'social_design.ini' )->hasVariable( 'GeneralSettings', 'AvailableContext' ) )
        {
            $availableContext = (array)eZINI::instance( 'social_design.ini' )->variable( 'GeneralSettings', 'AvailableContext' );
            foreach ( $availableContext as $context )
            {
                if ( eZINI::instance( 'social_design.ini' )->hasGroup( 'ContextSettings_' . $context ) )
                {
                    $contextSettings = (array)eZINI::instance( 'social_design.ini' )->group( 'ContextSettings_' . $context );
                    $currentSiteAccess = eZSiteAccess::current();
                    if ( strpos( $currentSiteAccess['name'], $contextSettings['MatchSiteaccessName'] ) !== false )
                    {
                        return $contextSettings['Identifier'];
                    }
                }
            }
        }
        return null;
    }

    public static function instance( $context = null )
    {
        $handler = null;
        if ( $context === null )
        {
            $context = self::findContext();
        }
        if ( $context && eZINI::instance( 'social_design.ini' )->hasVariable( 'GeneralSettings', 'PageDataHandler' ) )
        {
            $handlers = eZINI::instance( 'social_design.ini' )->variable( 'GeneralSettings', 'PageDataHandler' );
            if ( isset( $handlers[$context] ) )
            {
                $className = $handlers[$context];
                $handler = new $className();
            }
        }
        return new OCSocialPageDataBase( $handler );
    }

    public function attributes()
    {
        return array(
            'site_title',
            'site_url',
            'asset_url',
            'logo_path',
            'logo_title',
            'logo_subtitle',
            'head_images',
            'need_login',
            'attribute_contacts',
            'attribute_footer',
            'text_credits',
            'google_analytics_id',
            'cookie_law_url',
            'menu',
            'user_menu',
            'banner_path',
            'banner_title',
            'banner_subtitle'
        );
    }

    public function hasAttribute( $name )
    {
        return in_array( $name, $this->attributes() );
    }

    public function attribute( $name )
    {
        if ( $name == 'site_title' )
        {
            return $this->handler->siteTitle();
        }
        elseif( $name == 'asset_url' )
        {
            return $this->handler->assetUrl();
        }
        elseif( $name == 'site_url' )
        {
            return $this->handler->siteUrl();
        }
        elseif( $name == 'logo_path' )
        {
            return $this->handler->logoPath();
        }
        elseif( $name == 'logo_title' )
        {
            return $this->handler->logoTitle();
        }
        elseif( $name == 'logo_subtitle' )
        {
            return $this->handler->logoSubtitle();
        }
        elseif( $name == 'head_images' )
        {
            return $this->handler->headImages();
        }
        elseif( $name == 'need_login' )
        {
            return $this->handler->needLogin();
        }
        elseif( $name == 'attribute_contacts' )
        {
            return $this->handler->attributeContacts();
        }
        elseif( $name == 'attribute_footer' )
        {
            return $this->handler->attributeFooter();
        }
        elseif( $name == 'text_credits' )
        {
            return $this->handler->textCredits();
        }
        elseif( $name == 'google_analytics_id' )
        {
            return $this->handler->googleAnalyticsId();
        }
        elseif( $name == 'cookie_law_url' )
        {
            return $this->handler->cookieLawUrl();
        }
        elseif( $name == 'menu' )
        {
            return $this->handler->menu();
        }
        elseif( $name == 'user_menu' )
        {
            return $this->handler->userMenu();
        }
        elseif( $name == 'banner_path' )
        {
            return $this->handler->bannerPath();
        }
        elseif( $name == 'banner_title' )
        {
            return $this->handler->bannerTitle();
        }
        elseif( $name == 'banner_subtitle' )
        {
            return $this->handler->bannerSubtitle();
        }
        return null;
    }

    public function siteTitle()
    {
        return null;
    }

    public function siteUrl()
    {
        return null;
    }

    public function assetUrl()
    {
        return null;
    }

    public function logoPath()
    {
        return null;
    }

    public function logoTitle()
    {
        return null;
    }

    public function logoSubtitle()
    {
        return null;
    }

    public function headImages()
    {
        return array(
            "apple-touch-icon-114x114-precomposed" => null,
            "apple-touch-icon-72x72-precomposed" => null,
            "apple-touch-icon-57x57-precomposed" => null,
            "favicon" => null
        );
    }

    public function needLogin()
    {
        return null;
    }

    public function attributeContacts()
    {
        return null;
    }

    public function attributeFooter()
    {
        return null;
    }

    public function textCredits()
    {
        return null;
    }

    public function googleAnalyticsId()
    {
        return null;
    }

    public function cookieLawUrl()
    {
        return null;
    }

    public function menu()
    {
        return array(
            array(
                'name' => 'Example',
                'url' => 'Example',
                'highlight' => false,
                'has_children' => true,
                'children' => array(
                    array(
                        'name' => 'Example',
                        'url' => 'Example',
                        'has_children' => false,
                    )
                )
            ),
            array(
                'name' => 'Example',
                'url' => 'Example',
                'highlight' => true,
                'has_children' => false
            )
        );
    }

    public function userMenu()
    {
        return array(
            array(
                'name' => 'Example',
                'url' => 'Example',
                'highlight' => true,
                'has_children' => false
            )
        );
    }

    public function bannerPath()
    {
        return null;
    }

    public function bannerTitle()
    {
        return null;
    }

    public function bannerSubtitle()
    {
        return null;
    }
}