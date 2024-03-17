<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Overview - Karbonsoft SDG data build documentation</title>

    <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/open-sdg/open-sdg-table@0.4.0/open-sdg-table.min.css">
    <style>
        .btn-primary {
            background-color: #00703c;
            padding: 8px 10px 7px;
            border: 2px solid transparent;
            border-radius: 0;
            color: #fff;
            box-shadow: 0 2px 0 #002d18;
            text-decoration: none;
        }
        .btn-primary:visited {
            color: #fff;
        }
        .btn-primary:hover, .btn-primary:not(:disabled):not(.disabled):active {
            background-color: #005a30;
            text-decoration: none;
            border: 2px solid transparent;
        }
        .btn-primary:focus:not(:active):not(:hover) {
            border-color: #fd0;
            color: #0b0c0c;
            background-color: #fd0;
            box-shadow: 0 2px 0 #0b0c0c;
        }
        a {
            color: #1D70B8;
            text-decoration: underline;
        }
        a:hover {
            color: #003078;
        }
        a:visited {
            color: #4c2c92;
        }
        .download-info {
            margin-left: 12px;
        }
        .table-striped tbody tr:nth-of-type(2n+1) {
            background-color: #f3f2f1;
        }
        #skiplink {
            position: absolute;
            top: 0;
            left: 50%;
            z-index: 10000;
            width: 250px;
            margin-left: -125px;
            padding: 10px;
            background: white;
            text-align: center;
            border: 1px solid #0b0c0c;
            color: #0b0c0c;
            display: block;
        }
        .sr-only-focusable:not(:focus):not(:focus-within) {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }
    </style>
</head>
<body>
    <a class="sr-only-focusable" id="skiplink" href="#main-content" tabindex="0">Skip to main content</a>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">SDG data build documentation</a>
        </div>
    </nav>
    <main id="main-content" role="main">
        <div class="container">
            <h1 style="margin:20px 0">Overview</h1>
            <div>
                <p>This is a list of examples of endpoints and output that are available on this service. Click each of the links below for more information on the available output.</p><div class="row">
<div class="col-sm mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Karbonsoft SDG output</h5>
            <p class="card-text">This output includes a variety of endpoints designed to
support the <a href="https://open-sdg.readthedocs.io">Karbonsoft SDG</a>
platform.</p>
            <a href="open-sdg-output.html" class="btn btn-primary">See examples of Karbonsoft SDG output</a>
        </div>
    </div>
</div>

<div class="col-sm mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data packages</h5>
            <p class="card-text">This output produces <a href="https://specs.frictionlessdata.io/data-package/">
data packages</a> for each indicator.</p>
            <a href="data-packages.html" class="btn btn-primary">See examples of Data packages</a>
        </div>
    </div>
</div>

<div class="col-sm mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Disaggregation report</h5>
            <p class="card-text">These tables show information about all the disaggregations used in the data.</p>
            <a href="disaggregations.html" class="btn btn-primary">See disaggregation report</a>
        </div>
    </div>
</div>
</div><div class="row">
<div class="col-sm mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Metadata report</h5>
            <p class="card-text">These tables show information about the indicators.</p>
            <a href="metadata.html" class="btn btn-primary">See metadata report</a>
        </div>
    </div>
</div>
</div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/open-sdg/open-sdg-table@0.4.0/open-sdg-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
    if (typeof sdgBuild !== 'undefined' && sdgBuild.tables) {
        var tableIds = Object.keys(sdgBuild.tables);
        for (var i = 0; i < tableIds.length; i++) {
            var tableId = tableIds[i];
            $('#' + tableId).openSdgTable(sdgBuild.tables[tableId]).find('td').each(function() {
                if (!isNaN($(this).text())) {
                    $(this).css('text-align', 'right');
                }
            })
        }
    }
    </script>
</html>
