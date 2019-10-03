{ezscript_require(array('cookiechoices.js'))}
<script>
    document.addEventListener('DOMContentLoaded', function(event) {ldelim}
        cookieChoices.showCookieConsentBar(
                "{"Cookies help us to deliver quality services. By using our services, you agree to our use of cookies mode."|i18n('ocsocialdesign')}",
                "{'OK'|i18n('ocsocialdesign')}",
                "{'More information'|i18n('ocsocialdesign')}",
                "{$social_pagedata.cookie_law_url}"
        );
    {rdelim});
</script>