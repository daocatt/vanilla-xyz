<!DOCTYPE html>
<html lang="{$CurrentLocale.Key}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {asset name="Head"}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,700i" rel="stylesheet">

    <script>
    var _hmt = _hmt || [];
    (function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?7a6273a8c1bfa2c2b5f1bbe187e5829c";
    var s = document.getElementsByTagName("script")[0]; 
    s.parentNode.insertBefore(hm, s);
    })();
    </script>

</head>

{assign
    "linkFormat"
    "<div class='Navigation-linkContainer'>
        <a href='%url' class='Navigation-link %class'>
            %text
        </a>
    </div>"
}
{capture name="menu"}
    {if $User.SignedIn}
        <div class="Navigation-row NewDiscussion">
            <div class="NewDiscussion mobile">
                {module name="NewDiscussionModule" reorder=$DataDrivenTitleBar}
            </div>
        </div>
    {else}
        {if !$DataDrivenTitleBar}
            <div class="Navigation-row">
                <div class="SignIn mobile">
                    {module name="MeModule"}
                </div>
            </div>
        {/if}
    {/if}

    {if !$DataDrivenTitleBar}
        {* {activity_link format=$linkFormat} *}
        {categories_link format=$linkFormat}
        {discussions_link format=$linkFormat}
        {knowledge_link format=$linkFormat}
        {custom_menu format=$linkFormat}


    {/if}
{/capture}

{capture name="navLinks"}
    {if !$DataDrivenTitleBar}
        {* {activity_link format=$linkFormat} *}
        {categories_link format=$linkFormat}
        {discussions_link format=$linkFormat}
        {custom_menu format=$linkFormat}

    {/if}
{/capture}
{assign var="SectionGroups" value=(isset($Groups) || isset($Group))}
{assign var="TemplateCss" value="
    {if $ThemeOptions.Options.hasHeroBanner}
        ThemeOptions-hasHeroBanner
    {/if}

    {if $ThemeOptions.Options.hasFeatureSearchbox}
        ThemeOptions-hasFeatureSearchbox
    {else}
        {if !inSection(["DiscussionList"])}
            hideHomepageTitle
        {/if}
    {/if}

    {if $ThemeOptions.Options.panelToLeft}
        ThemeOptions-panelToLeft
    {/if}

    {if $User.SignedIn}
        UserLoggedIn
    {else}
        UserLoggedOut
    {/if}

    {if inSection('Discussion') and $Page gt 1}
        isNotFirstPage
    {/if}

    {if inSection('Group') && !isset($Group.Icon)}
        noGroupIcon
    {/if}

    locale-{$CurrentLocale.Lang}
"}
<body id="{$BodyID}" class="{$BodyClass}{$TemplateCss|strip:" "}">
<a href="#MainContent" class="Button Primary btn button-skipToContent sr-only SrOnly">{t c="Skip to content"}</a>

    <!--[if lt IE 9]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="Frame">
        {if $DataDrivenTitleBar}
            <header id="titleBar" data-react="title-bar-hamburger" style="display: none!important;" data-unhide="true">
                {$smarty.capture.menu}
            </header>
        {else}
            <div class="Frame-top">
                <div class="Frame-header">
                    <!---------- Main Header ---------->
                    <header id="MainHeader" class="Header">
                        <div class="Container">
                            <div class="row">
                                <div class="Hamburger">
                                    <button class="Hamburger Hamburger-menuXcross" id="menu-button" aria-label="toggle menu">
                                        <span class="Hamburger-menuLines" aria-hidden="true">
                                        </span>
                                        <span class="Hamburger-visuallyHidden sr-only">
                                            toggle menu
                                        </span>
                                    </button>
                                </div>
                                <a href="{home_link format="%url"}" class="Header-logo">
                                    {logo}
                                </a>
                                <a href="{home_link format="%url"}" class="Header-logo mobile">
                                    {mobile_logo}
                                </a>
                                <nav class="Header-desktopNav">
                                     {$smarty.capture.navLinks}
                                </nav>
                                <div class="Header-flexSpacer"></div>
                                <div class="Header-right">
                                    {community_chooser buttonType='titleBarLink' buttonClass='Header-desktopCommunityChooser'}
                                    <div class="MeBox-header">
                                        {module name="MeModule" CssClass="FlyoutRight"}
                                    </div>
                                    {if $User.SignedIn}
                                        <button class="mobileMeBox-button">
                                            <span class="Photo PhotoWrap">
                                                <img src="{$User.Photo|escape:'html'}" class="ProfilePhotoSmall" alt="{t c='Avatar'}">
                                            </span>
                                        </button>
                                    {/if}
                                </div>
                            </div>
                        </div>

                        <!---------- Mobile Navigation ---------->
                        <nav class="Navigation js-nav needsInitialization">
                            <div class="Container">
                                {if $User.SignedIn}
                                    <div class="Navigation-row NewDiscussion">
                                        <div class="NewDiscussion mobile">
                                            {module name="NewDiscussionModule"}
                                        </div>
                                    </div>
                                {else}
                                    <div class="Navigation-row">
                                        <div class="SignIn mobile">
                                            {module name="MeModule"}
                                        </div>
                                    </div>
                                {/if}
                               {$smarty.capture.navLinks}

                                <div class='Navigation-linkContainer'>
                                    {community_chooser buttonType='reset' fullWidth=true buttonClass='Navigation-link'}
                                </div>
                            </div>
                        </nav>
                        <nav class="mobileMebox js-mobileMebox needsInitialization">
                            <div class="Container">
                                {module name="MeModule"}
                                <button class="mobileMebox-buttonClose Close">
                                    <span>×</span>
                                </button>
                            </div>
                        </nav>
                        <!---------- Mobile Navigation END ---------->

                    </header>
                    <!---------- Main Header END ---------->

                </div>
            {/if}
            <div class="Frame-body">

                <!---------- Hero Banner ---------->
                {if $ThemeOptions.Options.hasHeroBanner && inSection(["CategoryList", "DiscussionList", "CategoryDiscussionList"])}
                    <div class="Herobanner">
                        {if {banner_image_url}}
                            <div class="Herobanner-bgImage" style="background-image:url('{banner_image_url}')"></div>
                        {/if}
                        <div class="Container">
                            {if $ThemeOptions.Options.hasFeatureSearchbox}
                                <div class="SearchBox js-sphinxAutoComplete" role="search">
                                    {if $hasAdvancedSearch === true}
                                        {module name="AdvancedSearchModule"}
                                    {else}
                                        {searchbox}
                                    {/if}
                                </div>
                            {else}
                                {if $Category}
                                    <h2 class="H HomepageTitle">{$Category.Name|strip_tags}{follow_button}</h2>
                                    {if $sanitizedDescription}
                                        <p class="P PageDescription">{$sanitizedDescription}</p>
                                    {/if}
                                {elseif $Subcommunity && inSection(["DiscussionList"])}
                                    <h2 class="H HomepageTitle">{$Subcommunity.Name|strip_tags}</h2>
                                {else}
                                    {if {homepage_title} !== ""}
                                        <h2 class="H HomepageTitle">{homepage_title}</h2>
                                    {/if}
                                {/if}
                            {/if}
                        </div>
                    </div>
                {/if}
                <!---------- Hero Banner END ---------->

                <div class="Frame-content">
                    <div class="Container">
                        <div class="Frame-contentWrap">
                            <div class="Frame-details">
                                {if !$isHomepage}
                                    <div class="Frame-row">
                                        <nav class="BreadcrumbsBox">
                                            {breadcrumbs}
                                        </nav>
                                    </div>
                                {/if}
                                {if !$DataDrivenTitleBar}
                                    <div class="Frame-row SearchBoxMobile">
                                        {if !$SectionGroups && !inSection(["SearchResults"])}
                                            <div class="SearchBox js-sphinxAutoComplete" role="search">
                                                {if $hasAdvancedSearch === true}
                                                    {module name="AdvancedSearchModule"}
                                                {else}
                                                    {searchbox}
                                                {/if}
                                            </div>
                                        {/if}
                                    </div>
                                {/if}
                                <div class="Frame-row">

                                    <!---------- Main Content ---------->
                                    <main id="MainContent" class="Content MainContent">
                                        <!---------- Profile Page Header ---------->
                                        {if inSection("Profile")}
                                            <div class="Profile-header">
                                                <div class="Profile-photo">
                                                    <div class="PhotoLarge">
                                                        {module name="UserPhotoModule"}
                                                    </div>
                                                </div>
                                                <div class="Profile-name">
                                                    <div class="Profile-row">
                                                        <h1 class="Profile-username">
                                                            {$Profile.Name|escape:'html'}
                                                        </h1>
                                                    </div>
                                                    <div class="Profile-row">
                                                        {if isset($Rank)}
                                                            <span class="Profile-rank">
                                                                {$Rank.Label}
                                                            </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                        {/if}
                                        <!---------- Profile Page Header END ---------->

                                        {asset name="Content"}
                                    </main>
                                    <!---------- Main Content END ---------->

                                    <!---------- Main Panel ---------->
                                    <aside class="Panel Panel-main">
                                        {if !$SectionGroups && !$DataDrivenTitleBar}
                                            <div class="SearchBox js-sphinxAutoComplete" role="search">
                                                {searchbox}
                                            </div>
                                        {/if}
                                        {asset name="Panel"}
                                    </aside>
                                    <!---------- Main Panel END ---------->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Frame-footer">

            <!---------- Main Footer END ---------->
            <footer class="Footer">
                <div class="Container">
                    <div class="row">
                        <div class="col col-copyRight">
                            <p class="Footer-copyright">
                                {t c="© GTD"} {$smarty.now|date_format:"%Y"}
                                <a href="https://beian.miit.gov.cn" target="_blank">沪ICP备17037942号-3</a>
                            </p>
                        </div>
                        <div class="col col-logo">
                            <div class="Vanilla-logo">
                            
                            
                            <svg width="113px" height="28px" viewBox="0 0 113 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>Page 1</title>
                                <defs>
                                    <linearGradient x1="6.30188936%" y1="49.7248895%" x2="100%" y2="50%" id="linearGradient-1">
                                        <stop stop-color="#989AA0" stop-opacity="0.177342555" offset="0%"></stop>
                                        <stop stop-color="#96989E" offset="100%"></stop>
                                    </linearGradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="footer" transform="translate(-4.000000, 0.000000)">
                                        <g id="logo" transform="translate(4.000000, 0.000000)" fill="#96989E" fill-rule="nonzero">
                                            <path d="M13.4965355,0.00309092587 C16.0620506,-0.05102711 18.4693281,0.60784125 20.5440442,1.79588935 C22.6988911,3.02982294 24.4947518,4.83572583 25.7355443,7.01017561 C25.9139239,7.32332302 25.9927267,7.65659995 25.9920574,7.98108951 C25.9913506,8.32379615 25.9002032,8.65800242 25.7343697,8.94918494 C25.411517,9.51607351 24.8125183,9.91900546 24.0802882,9.91900122 C23.3890418,9.91251837 22.7777218,9.54745265 22.4354442,8.95586246 C20.7059039,5.9255507 17.4842929,3.88638783 13.79081,3.8846031 C10.8304935,3.88281203 8.17163202,5.1912193 6.34714524,7.27027783 C4.54508394,9.32378183 3.55915086,12.1291552 3.89673704,15.1657804 C4.15125816,17.4578404 5.18570475,19.5324903 6.7180999,21.1058547 C8.24911879,22.677806 10.278892,23.7510333 12.5339548,24.0345942 C14.5892364,24.2936272 16.5408263,23.9191612 18.2233029,23.0744211 C19.9881421,22.1883284 21.4567509,20.786864 22.4392434,19.0642143 C22.6082608,18.7664528 22.8478845,18.5249189 23.1284884,18.3576612 C23.4175639,18.185354 23.7501285,18.0910016 24.0987543,18.0939289 C24.8261385,18.0978456 25.4209854,18.4995341 25.7423009,19.063716 C25.9081358,19.3548972 25.999285,19.689101 26,20.0318037 C26.0006687,20.3563236 25.9218412,20.6896232 25.7436264,21.0024853 C24.5319482,23.1306439 22.7849772,24.9056649 20.6881765,26.1352746 C18.6652248,27.3215776 16.3168827,28.0010974 13.8087044,28 C9.8616836,27.9977623 6.30076132,26.3152148 3.78395502,23.6193111 C1.282102,20.9394247 -0.188688779,17.2584316 0.0195223081,13.2314278 C0.206650731,9.61521911 1.78724494,6.34343523 4.21749168,3.9583736 C6.64820521,1.57285386 9.92633112,0.0770328563 13.4965355,0.00309092587 Z" id="Path"></path>
                                            <path d="M37.1411374,7.00000105 C37.780496,6.99898916 38.1951016,7.72800529 37.9065576,8.35003466 L37.9065576,8.35003466 L35.3060932,13.9598867 L37.9020852,19.6425893 C38.1818599,20.2637192 37.7688564,20.9901844 37.1294978,20.9911963 L37.1294978,20.9911963 L29.1907998,20.9998999 C28.988331,21.004081 28.8002461,20.8769756 28.7117101,20.68022 L28.7117101,20.68022 L26.18652,15.1749976 L19.618891,15.1815312 C19.1216005,17.8423406 16.9557528,19.8494717 14.3592514,19.8497204 C11.3968897,19.8544088 8.99569229,17.2445152 9.0000058,14.0246845 C9.00431931,10.8048539 11.4054054,8.19508128 14.3677671,8.19039287 C16.9642685,8.19014419 19.1247476,10.1904282 19.622015,12.8496635 L19.622015,12.8496635 L26.1754359,12.8431524 L28.7189339,7.33376864 C28.8079975,7.13673198 28.9928666,7.012897 29.1988822,7.01257094 L29.1988822,7.01257094 Z M29.8712565,9.33086299 L27.7151626,13.9668284 L29.8571545,18.6704783 L35.2289725,18.6671759 L33.0869805,13.9635261 L35.239515,9.33142951 L29.8712565,9.33086299 Z" id="Combined-Shape"></path>
                                        </g>
                                        <polygon id="Rectangle" fill="url(#linearGradient-1)" transform="translate(80.000000, 14.099284) scale(-1, 1) translate(-80.000000, -14.099284) " points="43 7 113.934682 7.19856867 117 13.9292168 113.934682 21.1985687 43 21 48.8125597 13.9292168"></polygon>
                                    </g>
                                </g>
                            </svg>
                          </div>
                        </div>
                    </div>
                    {asset name="Foot"}
                </div>
            </footer>
            <!---------- Main Footer END ---------->

        </div>
    </div>
    <div id="modals"></div>
    {event name="AfterBody"}
</body>

</html>
