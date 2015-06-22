{ezscript_require(array('cookiechoices.js'))}
<script>
    document.addEventListener('DOMContentLoaded', function(event) {ldelim}
        cookieChoices.showCookieConsentBar(
                "{"I cookie ci aiutano ad erogare servizi di qualità. Utilizzando i nostri servizi, l'utente accetta le nostre modalità d'uso dei cookie."|i18n('ocsocialdesign')}",
                "{'OK'|i18n('ocsocialdesign')}",
                "{'Maggiori informazioni'|i18n('ocsocialdesign')}",
                "{$social_pagedata.cookie_law_url}"
        );
    {rdelim});
</script>