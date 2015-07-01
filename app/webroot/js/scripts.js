function preAction(section,f0cus)
{
    jQuery(section).show();
    jQuery('html,body,div').animate({
        scrollTop:jQuery(section).offset().top
        },2000);
    jQuery(f0cus).focus();

		
}
function loginForm()
{
    preAction("#log_in_panel","#username");
    jQuery('#log_in_panel').slideDown(3000);
}