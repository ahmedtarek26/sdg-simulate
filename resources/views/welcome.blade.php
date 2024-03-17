<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Karbonsoft SDG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    </div>
                </div>
            </div>
        </nav>
        <meta charset="utf-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <script crossorigin="anonymous" src="https://polyfill.io/v3/polyfill.min.js?features=Promise%2CArray.prototype.forEach%2CString.prototype.includes%2CURLSearchParams%2CCustomEvent%2CArray.prototype.includes%2CArray.prototype.filter%2CArray.prototype.some%2CArray.prototype.find%2CArray.prototype.reduce%2CObject.assign%2CArray.isArray%2CObject.values%2CObject.entries%2CArray.from%2CSet%2CArray.prototype.findIndex%2Cfetch"></script>
<script crossorigin="anonymous" src="https://cdnjs.cloudflare.com/ajax/libs/javascript-canvas-to-blob/3.15.0/js/canvas-to-blob.min.js"></script>

        <script>
// This is where we initialise any global variables, namespaced in "Karbonsoftsdg".
var opensdg = {

  // A base URL for asynchronous calls to SDG data.
  remoteDataBaseUrl: 'https://open-sdg.org/open-sdg-data-starter/en',

  chartConfigAlterations: [],
  // A hook which can be used to modify the configuration for Chart.js.
  chartConfigAlter: function(callback) {
    this.chartConfigAlterations.push(callback);
  },

  tableConfigAlterations: [],
  // A hook which can be used to modify the configuration for Datatables.
  tableConfigAlter: function(callback) {
    this.tableConfigAlterations.push(callback);
  },

  // A hook which can be replaced to alter whether/how the values that are
  // displayed on indicator tables/graphs get rounded. A "context" parameter
  // is also passed which contains additional information.
  dataRounding: function(value, context) {
    // Alterations go here.
    return value;
  },

  // A hook which can be used to alter the data before it is displayed on charts/tables.
  dataDisplayAlterations: [],
  dataDisplayAlter: function(callback) {
    this.dataDisplayAlterations.push(callback);
  },

  // Disaggregations which should be ignored on indicator pages.
  ignoredDisaggregations: null,

  language: 'en',

  mapColors: {
    "default": [
        "#c4e1c6",
        "#b0d1b3",
        "#9bc2a1",
        "#87b28f",
        "#74a37c",
        "#60946b",
        "#4d8559",
        "#3a7747",
        "#276836"
    ]
},
};

</script>

        <script>
// JavaScript container for translation data.
var translations = {
  //Javascript version of the "t" filter from jekyll-Karbonsoft-sdg-plugins.
  t: function(key) {

    if (!key || typeof key !== 'string') {
      return '';
    }

    // The majority of uses of this function are to translate disaggregation
    // data. To spare data providers of needing to enter "data." in front of
    // their disaggregation data, we specifically look for that here.
    if (typeof this.data === 'object' && this.data !== null && this.data[key]) {
      return this.data[key];
    }

    var originalKey = key;
    var drilled = this;
    var levelsDrilled = 0;
    var levels = key.split('.');

    for (var level in levels) {
      // If we have drilled down to soon, abort.
      if (typeof drilled !== 'object') {
        break;
      }

      if (levels[level] in drilled) {
        drilled = drilled[levels[level]];
        levelsDrilled += 1;
      }
    }

    // If we didn't drill the right number of levels, return the original string.
    if (levels.length != levelsDrilled) {
      return originalKey;
    }

    // Otherwise we must have drilled all the way.
    return drilled;
  },
};
</script>

        <!-- Basic Page Needs
        ================================================== -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- Mobile Specific Metas
        ================================================== -->
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Title and meta description
        ================================================== -->

        
    <title>Indicators For The Sustainable Development Goals</title>



        
        <meta name="robots" content="noindex, nofollow">
        

        <!--[if IE 9]>
        <script src="/site/assets/js/lib/classList.js"></script>
        <![endif]-->

        <link rel="apple-touch-icon" sizes="180x180" href="/site/assets/img/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/site/assets/img/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/site/assets/img/favicons/favicon-16x16.png">
<link rel="icon" type="image/x-icon" href="/site/assets/img/favicons/favicon.ico" />

        

        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link res="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" crossorigin="">
        <link rel="stylesheet" href="/site/assets/css/style.css?v=20240314081037">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
          integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
          crossorigin=""/>
        <link rel="stylesheet" href="https://cdn.rawgit.com/socib/Leaflet.TimeDimension/master/dist/leaflet.timedimension.control.min.css"  crossorigin=""/>
        <link rel="stylesheet" href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css'  crossorigin=""/>
        <link rel="stylesheet" href="https://bowercdn.net/c/leaflet.zoomhome-latest/dist/leaflet.zoomhome.css"  crossorigin=""/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@2.9.7/dist/leaflet-search.min.css" crossorigin="">
        <link rel="stylesheet" href="https://cdn.kiprotect.com/klaro/v0.7/klaro.min.css" crossorigin=""/>
        

        


        <!--[if IE]>
        <link rel="stylesheet" href="/site/assets/css/ie.css">
        <![endif]-->

        

    </head>
<body class="language-en
layout-frontpage
">
<!-- <div class="container"> -->

<script>translations['header'] = {"alpha":"Alpha","default_contrast":"Default contrast","disable_high_contrast":"Disable high contrast","disclaimer":"This is a development website. We welcome your <a href=\"mailto:%email_contacts.suggestions\">feedback</a>.","enable_high_contrast":"Enable high contrast","hide_menu":"Hide navigation menu","high_contrast":"High contrast","internet_explorer_message":"We have detected that you are using Internet Explorer to visit this website. Internet Explorer is now being phased out by Microsoft. As a result, this website no longer supports any version of Internet Explorer. Some features on this site will not work. You should use a modern browser such as Edge, Chrome, Firefox, or Safari. If you have difficulty installing or accessing a different browser, please contact your IT support team.","internet_explorer_message_title":"This internet browser is no longer supported","logo_title":"Go to homepage","show_menu":"Show navigation menu","skip_link":"Skip to main content","tag_line":"17 Goals to Transform our World","toggle_menu":"Menu toggle. Click to expand or collapse the menu.","toggle_search":"Search toggle. Click to expand or collapse the search bar."};</script>

<a class="sr-only-focusable" id="skiplink" href="#main-content" tabindex="0">Skip to main content</a>
<div class="container internet-explorer-message">
    <h2 class="internet-explorer-message-title">This internet browser is no longer supported</h2>
    <p class="internet-explorer-message-body">We have detected that you are using Internet Explorer to visit this website. Internet Explorer is now being phased out by Microsoft. As a result, this website no longer supports any version of Internet Explorer. Some features on this site will not work. You should use a modern browser such as Edge, Chrome, Firefox, or Safari. If you have difficulty installing or accessing a different browser, please contact your IT support team.</p>
</div>
<div id="disclaimer">
    
<div class="container">
  <div class="disclaimer-alert">
    <strong class="phase-tag">Alpha</strong>
    
    This is a development website. We welcome your <a href="mailto:test@example.com">feedback</a>.
    
  </div>
</div>

</div>

<header role="banner" class="">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light flex-wrap align-items-start">
            <a class="navbar-brand" href="/site/" id="home" aria-label="Go to homepage" title="Go to homepage">
    <img src="G:/Karbonsoft/karbonsoft-sdg/resources/img/SDG_logo.png" alt="Sustainable Development Goals - 17 Goals to Transform our World" />
</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Show navigation menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex flex-wrap w-100 justify-content-between">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav" id="menu"><li class="nav-item active">
    <a class="nav-link" href="/site/">Home</a>
</li><li class="nav-item ">
    <a class="nav-link" href="/site/goals">Goals</a>
</li><li class="nav-item ">
    <a class="nav-link" href="/site/reporting-status">Reporting Status</a>
</li><li class="nav-item ">
    <a class="nav-link" href="/site/news">Updates</a>
</li><li class="nav-item ">
    <a class="nav-link" href="/site/faq">FAQ</a>
</li><li class="nav-item ">
    <a class="nav-link" href="/site/about">About</a>
</li></ul>
    
                </div>
                <div class="header-search-bar">
                    <form class="align-self-lg-end" id="search" action="/site/search/">
    <div class="input-group">
        <label class="visually-hidden" for="indicator_search">Search</label>
        <input class="form-control" type="search" name="q" id="indicator_search" title="Search">
        <span class="input-group-append">
            <button class="btn btn-outline-secondary ms-n5" aria-label="Site search" id="search-btn" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
</form>

                </div>
                <div class="header-toggles d-flex">





  <div class="language-toggle-container">
  
  <div class="btn-group language-toggle-dropdown  dropdown">
    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fa fa-globe"></i>
      English
    </button>
    <ul class="dropdown-menu"><li>
            <a class="dropdown-item" href="/site/es/">
              Español
            </a>
          </li></ul>
  </div>
</div>



                    <span class="no-js-language-toggle"><div class="language-toggle-container d-flex">
    <i class="fa fa-globe language-toggle-globe-links"></i>
    <ul class="language-toggle-links list-unstyled list-inline"><li class="language-option-es list-inline-item">
            <a class="language-toggle-link" href="/site/es/">
                Español
            </a>
        </li></ul>
</div></span><a title="Enable high contrast" aria-label="Enable high contrast"
    data-contrast-switch-to="" role="button" href="javascript:void(0)" data-on="click"
data-event-category="Accessibility"
data-event-action="Change contrast setting"
data-event-label="high"
>A</a>
                </div>
            </div>
        </nav>
    </div>
</header>
<div id="top" tabindex=-1></div>


<div id="main-content" class="container" role="main">

    
    <div class="site-intro">
        <h1>17 goals to transform our world</h1>
        <div class="lead-copy"><p>The <a href="https://www.un.org/sustainabledevelopment/sustainable-development-goals/">Sustainable Development Goals (SDGs)</a> are a universal call to action to end poverty, protect the planet and improve the lives and prospects of everyone, everywhere. The 17 Goals were adopted by all UN Member States in 2015, as part of the <a href="http://www.un.org/ga/search/view_doc.asp?symbol=A/RES/70/1&amp;Lang=E">2030 Agenda for Sustainable Development</a>.</p>
</div>
    </div>
    

    
    <div class="frontpage-goals-grid">

        
        <h2 class="frontpage-goals-grid-title">Australia data for the Sustainable Development Goals</h2>
        

        
        <div class="frontpage-goals-grid-description"><p>Select each goal for indicator data.</p>
</div>
        

        <div class="goal-tiles">
    <div class="row g-2">
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="{{route('goal1.index')}}">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/1.png" id="goal-1" alt="Goal 1 - No poverty" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/2/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/2.png" id="goal-2" alt="Goal 2 - Zero hunger" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/3/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/3.png" id="goal-3" alt="Goal 3 - Good health and well-being" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/4/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/4.png" id="goal-4" alt="Goal 4 - Quality education" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/5/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/5.png" id="goal-5" alt="Goal 5 - Gender equality" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/6/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/6.png" id="goal-6" alt="Goal 6 - Clean water and sanitation" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/7/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/7.png" id="goal-7" alt="Goal 7 - Affordable and clean energy" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/8/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/8.png" id="goal-8" alt="Goal 8 - Decent work and economic growth" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/9/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/9.png" id="goal-9" alt="Goal 9 - Industry, innovation and infrastructure" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/10/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/10.png" id="goal-10" alt="Goal 10 - Reduced inequalities" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/11/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/11.png" id="goal-11" alt="Goal 11 - Sustainable cities and communities" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/12/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/12.png" id="goal-12" alt="Goal 12 - Responsible consumption and production" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/13/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/13.png" id="goal-13" alt="Goal 13 - Climate action" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/14/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/14.png" id="goal-14" alt="Goal 14 - Life below water" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/15/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/15.png" id="goal-15" alt="Goal 15 - Life on land" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/16/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/16.png" id="goal-16" alt="Goal 16 - Peace, justice and strong institutions" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
        <div class="col-4 col-md-2 col-lg-1 goal-tile">
            <a href="/site/17/">
                <img src="https://open-sdg.org/sdg-translations/assets/img/goals/en/17.png" id="goal-17" alt="Goal 17 - Partnerships for the goals" class="goal-icon-image goal-icon-image-"/>
            </a>
        </div>
        
    </div>
</div>
    </div>
    

    
    <div class="frontpage-cards">
    
        

        
        <div class="row">
        

        <div class="col-sm-6 col-md-4">
    <div class="card">
    <div class="card-body">

    
    <h2 class="card-title"
        
        style="border-color: ;"
        
    >Download all data (.zip)</h2>
    
  
    
  
    
      <div class="zip-download-container">
    <a href="https://open-sdg.org/open-sdg-data-starter/en/zip/all_indicators.zip"
       role="button"
       class="btn btn-primary btn-download" aria-describedby="zip-download-info">
        Download all data (.zip)
    </a>
    <div id="zip-download-info">
        Size: 22 Bytes
        
            <br>
            Data last updated - Mar 06, 2024
        
    </div>
</div>

    
  
    

    </div>
  
  </div>
  
  </div>

        

    
        

        

        <div class="col-sm-6 col-md-4">
    <div class="card">
    <div class="card-body">

    
    <h2 class="card-title"
        
        style="border-color: ;"
        
    >Lorem ipsum</h2>
    
  
    
    <div class="card-text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mollis
cursus est sed dapibus.</p>
</div>
    
  
    
  
    
    
    
    
    <a class="btn btn-primary btn-download" href="https://example.com">
      Read more
    </a>
    

    </div>
  
  </div>
  
  </div>

        

    
        

        

        <div class="col-sm-6 col-md-4">
    <div class="card">
    <div class="card-body">

    
    <h2 class="card-title"
        
        style="border-color: ;"
        
    >Nam vestibulum</h2>
    
  
    
    <div class="card-text"><p>Nam vestibulum, purus quis porttitor imperdiet, nisl sem mollis nisl, a
interdum risus enim vitae tortor. Donec feugiat accumsan rutrum.</p>
</div>
    
  
    
  
    
    
    
    
    <a class="btn btn-primary btn-download" href="https://example.com">
      Read more
    </a>
    

    </div>
  
  </div>
  
  </div>

        
        </div>
        

    
    </div>
    

</div>
<footer role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="footerLinks">
                    <ul>
                        <li>
                            <a href="https://open-sdg.org">Built using Karbonsoft SDG</a>
                        </li>
                        
                        <li>
                            <a href="/site/contact-us">Contact us</a>
                            
                        </li>
                        <li>
                            
                            <a href="https://twitter.com/MyTwitterAccount" target="_blank">Twitter</a>
                            
                        </li>
                        <li>
                            
                            <a href="https://facebook.com/MyFacebookAccount" target="_blank">Facebook</a>
                            
                        </li>
                        <li>
                            <a href="/site/about/cookies-and-privacy/">Cookies</a>
                            
                        </li>
                        
                        
                        
                        <li>
                            <a href="/site/config">Configuration</a>
                        </li>
                        </ul>
                </div>
            </div>
        </div>
        
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js" integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js" integrity="sha256-Y26AMvaIfrZ1EQU49pf6H4QzVTrOI8m9wQYKkftBt4s=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/patternomaly@1.3.2/dist/patternomaly.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/autotrack/2.4.1/autotrack.js"></script>
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.3/dist/html2canvas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.2/dist/FileSaver.min.js"></script>







<script>translations['general'] = translations['general'] || {};
    translations['general']['hide'] = 'hide';</script>

<script>translations['search'] = translations['search'] || {};
    translations['search']['search'] = 'Search';</script>

<script src='/site/assets/js/sdg.js?v=20240314081037'></script>


    
    
    <script src="/site/assets/js/custom.js?v=20240314081037"></script><script>
    new indicatorInit();
    new accessibilitySwitcher();
</script>


</body>
</html>