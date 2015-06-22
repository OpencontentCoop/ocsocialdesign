<form action={concat($module.functions.edit.uri,"/",$userID)|ezurl} method="post" name="Edit">


<section class="hgroup">
  <h1>{"Profilo utente"|i18n("social_user/user_edit")}</h1>
</section>

<dl class="dl-horizontal">
  
  <dt>{"Username"|i18n("social_user/user_edit")}</dt>
  <dd>{$userAccount.login|wash}</dd>
  
  <dt>{"Email"|i18n("social_user/user_edit")}</dt>
  <dd>{$userAccount.email|wash()}</dd>
  
  <dt>{"Name"|i18n("social_user/user_edit")}</dt>
  <dd>{$userAccount.contentobject.name|wash}</dd>
  
</dl>
  
  
<input class="button btn btn-info" type="submit" name="EditButton" value="{'Modifica profilo'|i18n('social_user/user_edit')}" />
<input class="button btn btn-info" type="submit" name="ChangePasswordButton" value="{'Cambia la password'|i18n('social_user/user_edit')}" />

</form>
