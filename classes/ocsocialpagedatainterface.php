<?php

interface OCPageDataHandlerInterface
{
    public function siteTitle();
    public function siteUrl();
    public function assetUrl();
    public function logoPath();
    public function logoTitle();
    public function logoSubtitle();
    public function headImages();
    public function needLogin();
    public function attributeContacts();
    public function attributeFooter();
    public function textCredits();
    public function googleAnalyticsId();
    public function cookieLawUrl();
    public function menu();
    public function userMenu();
    public function bannerPath();
    public function bannerTitle();
    public function bannerSubtitle();

}